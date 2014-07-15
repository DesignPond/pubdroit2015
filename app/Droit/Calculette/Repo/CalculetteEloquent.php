<?php namespace Droit\Repo\Calculette;

use Droit\Repo\Calculette\CalculetteInterface;
use Calculette_ipc as CI;
use Calculette_taux as CT;
use Carbon\Carbon;

class CalculetteEloquent implements CalculetteInterface {

	protected $taux;
	protected $ipc;
	
	// Class expects an Eloquent model
	public function __construct(CT $taux , CI $ipc)
	{
		$this->taux = $taux;
		$this->ipc  = $ipc;	
	}
	
	public function calculer($canton, $date , $loyer){
			
		$taux_depart  = $this->taux_depart($date,$canton);
		$taux_actuel  = $this->taux_actuel();
		$taux_date    = $this->taux_date_actuel();
		$ipc_depart   = $this->ipc_depart($date);
		$ipc_actuel   = $this->ipc_actuel();
		$ipc_date     = $this->ipc_date_actuel();		
		$new          = $this->calcul($canton, $date , $loyer); 
		
		$newloyer   = number_format($new,2,'.',"'");
		$difference = number_format($newloyer-$loyer,2,'.',"'");
		
		setlocale(LC_ALL, 'fr_FR');  
		$taux_date = Carbon::createFromTimeStamp($taux_date)->formatLocalized('%B %Y'); 
		$ipc_date = Carbon::createFromTimeStamp($ipc_date)->formatLocalized('%B %Y'); 
		
		$calcul = array(
			'taux_depart' => $taux_depart,
			'taux_actuel' => $taux_actuel,
			'taux_date'   => $taux_date,
			'ipc_depart'  => $ipc_depart,
			'ipc_actuel'  => $ipc_actuel,
			'ipc_date'    => $ipc_date,
			'difference'  => $difference,
			'loyer'       => $newloyer,
			'result'      => 'ok'
		);
		
		return $calcul;
	}
	
	public function calcul($canton, $date_depart, $loyer_actuel){
	
		// taux départ,taux actuel 
		$taux_depart = $this->taux_depart($date_depart,$canton); 
		$taux_actuel = $this->taux_actuel();
		
		// ipc départ, ipc actu
		$ipc_depart = $this->ipc_depart($date_depart);
		$ipc_actuel = $this->ipc_actuel();
		
		// calcul		
		$taux_variation_ipc = (($ipc_actuel-$ipc_depart)*100)/$ipc_depart;
		$augmentation_ipc   = $loyer_actuel * ($taux_variation_ipc/100) * 0.4;
		$loyer_augmente_ipc = $loyer_actuel + $augmentation_ipc;
		
		$nouveau_loyer = $loyer_augmente_ipc;
		
		$tDepart = $taux_depart;
		$tActuel = $taux_actuel;
		
		$tFinal20 = 0;
		$tFinal25 = 0;
		$tFinal30 = 0;
		
		if($tDepart != $tActuel) 
		{
			$tMax = max($tDepart,$tActuel)*4;
			$tMin = min($tDepart,$tActuel)*4;

			$tMax1 = $tMax-20;
			$tMin1 = $tMin-20;
			$tDif1 = $tMax1-$tMin1;
			
			if($tMin1<0 && $tMax1<0) {
				$tFinal30 = $tDif1;
			} 
			else 
			{
				if($tMin1<0) 
				{
					$tFinal30 = $tMin1*-1;
					$tMin1 = 0;
				}
				
				$tMax2 = $tMax1-4;
				$tMin2 = $tMin1-4;
				$tDif2 = $tMax2-$tMin2;
				
				if($tMin2<0 && $tMax2<0) {
					$tFinal25 = $tDif2;
				} 
				else 
				{
					if($tMin2<0) 
					{
						$tFinal25 = $tMin2*-1;
						$tFinal20 = $tMax2;
					} 
					else 
					{
						$tFinal20 = $tDif2;
					}
				}
			}
			
			$tauxFinal = $tFinal20*2+$tFinal25*2.5+$tFinal30*3;
			
			$isBaisse = ($tDepart > $tActuel) ? true : false;
			
			if($isBaisse) 
			{
				$tauxFinal = ($tauxFinal*100)/($tauxFinal+100);
				$tauxFinal = $tauxFinal*-1;
			}
			
			$nouveau_loyer += $nouveau_loyer*($tauxFinal/100);
		}
		
		return $nouveau_loyer;	

	}

	public function taux_depart($date_depart,$canton){
		
		 return $this->taux->where('date_debut','<=',$date_depart)
						   ->where(function($query) use ($canton)
				            {
				                $query->where('canton', '=', $canton)->orWhere('canton', '=', 'u');
				            })
				            ->orderBy('date_debut', 'DESC')
				            ->take(1)
				            ->pluck('taux');			
	}
	
	public function taux_actuel(){
	
		  return $this->taux->where('canton', '=', 'u')
				            ->orderBy('date_debut', 'DESC')
				            ->take(1)
				            ->pluck('taux');			
	}
	
	public function taux_date_actuel(){
	
		  return $this->taux->where('canton', '=', 'u')
				            ->orderBy('date_debut', 'DESC')
				            ->take(1)
				            ->pluck('date_debut');			
	}
	
	public function ipc_depart($date_depart){

		  return $this->ipc->where('date_debut','<=',$date_depart)
				           ->orderBy('date_debut', 'DESC')
				           ->take(1)
				           ->pluck('indice');			
	}
	
	public function ipc_actuel(){
	
		  return $this->ipc->orderBy('date_debut', 'DESC')
				           ->take(1)
				           ->pluck('indice');			
	}
	
	public function ipc_date_actuel(){
	
		  return $this->ipc->orderBy('date_debut', 'DESC')
				           ->take(1)
				           ->pluck('date_debut');			
	}

}

