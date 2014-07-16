<?php namespace Droit\Content\Repo;

use Droit\Content\Repo\AnalyseInterface;
use Illuminate\Database\Eloquent\Model as M;

class AnalyseEloquent implements AnalyseInterface {

	protected $analyse;
	
	// Class expects an Eloquent model
	public function __construct(M $analyse)
	{
		$this->analyse = $analyse;	
	}
	
	public function getAll( $pid ){
	
		return $this->analyse->where('pid','=',$pid)->where('deleted', '=', 0)->with( array('analyses_categories','arrets_analyses' => function($query)
		{
		    $query->where('ba_arrets.deleted', '=', 0);
		  
		}) )->orderBy('pub_date', 'DESC')->get();	
	}
	
	public function getAllArrets($pid){
		
		return $this->analyse->where('ba_analyses.pid','=',$pid)
				    ->join('ba_analyses_arrets', function($join)
			        {
			          $join->on('ba_analyses.id', '=', 'ba_analyses_arrets.analyse_id');
			          
			        })
			        ->join('ba_arrets', function($join)
			        {
			          $join->on('ba_arrets.id', '=', 'ba_analyses_arrets.arret_id');
			          
			        })
			        ->where('ba_analyses.deleted', '=', 0)
			        ->get();			 
	}
	
	public function analysesArretsById($array){
		
		$analysesArrets = array();
		
		foreach($array as $arrets){
			$analysesArrets[$arrets->arret_id][] = $arrets;
		}
		
		return $analysesArrets;
		
	}
	
	public function find($id){
		
		return $this->analyse->where('id','=',$id)->with( array('analyses_categories','arrets_analyses') )->get();	
	}
	
	public function create(array $data)
	{
	
		$categories = $data['categories'];
		$arrets     = $data['arrets'];
				
		$analyse = $this->analyse->create(array(
			'pid'            => $data['pid'],
			'cruser_id'      => $data['cruser_id'],
			'authors'        => $data['authors'],
			'pub_date'       => $data['pub_date'],
			'pub_date_temp'  => $data['pub_date'], // to change
			'abstract'       => $data['abstract'],
			'pub_text'       => $data['pub_text'],
			'file'           => $data['file'],
			'categories'     => count($data['categories']),
			'arrets'         => count($data['arrets'])
		));
		
		if( ! $analyse )
		{
			return false;
		}
		
		// Categories insert in ba_analyses_categories table		
		if(!empty($categories))
		{
			foreach($categories as $index => $categorie)
			{
				$analyse_categorie = new \Analyses_categories;
				
				$analyse_categorie->analyse_id   = $analyse->id;
				$analyse_categorie->categorie_id = $categorie;
				$analyse_categorie->sorting      = $index;
						
				$analyse_categorie->save();
			}
		}
	
		// Arrets insert in ba_analyses_arrets table		
		if(!empty($arrets))
		{
			foreach($arrets as $index => $arret)
			{
				$analyse_arret = new \Analyses_arrets;
				
				$analyse_arret->analyse_id = $analyse->id;
				$analyse_arret->arret_id   = $arret;
				$analyse_arret->sorting    = $index;
						
				$analyse_arret->save();
			}
		}

		return true;			
	}
	
	public function update(array $data)
	{
		
	}
	
}