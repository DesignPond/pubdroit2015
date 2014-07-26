<?php namespace Droit\User\Repo;

use Droit\User\Repo\AdresseInterface;
use Droit\User\Repo\UserInfoInterface;

use Droit\User\Entities\Adresses as M;
use Droit\User\Entities\User_membres as UM;
use Droit\User\Entities\User_specialisations as US;

class AdresseEloquent implements AdresseInterface{

	protected $adresse;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $adresse)
	{
		$this->adresse = $adresse;
		
		$this->custom  = new \Custom;
	}
	
	public function getAll(){
		
		return $this->adresse->where('user_id','=',0)->take(10)->skip(0)->get();	
	}
		
	public function getLast($nbr){
	
		return $this->adresse->orderBy('id', 'DESC')->take($nbr)->skip(0)->get();	
	}
	
	public function get_ajax( $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL){
			
		
		$iTotal = $this->adresse->where('user_id','=',0)->get()->count();
		
		if($sSearch)
		{
			$data = $this->adresse->where('user_id','=',0)
								  ->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								  ->take($iDisplayLength)
								  ->skip($iDisplayStart)
								  ->get();
								    
			$iTotalDisplayRecords = $this->adresse->where('user_id','=',0)
								  ->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								  ->get()
								  ->count();	
		}
		else
		{
			$data = $this->adresse->where('user_id','=',0)->take($iDisplayLength)->skip($iDisplayStart)->get();
			
			$iTotalDisplayRecords = $iTotal;	
		}

		$output = array(
			"sEcho"                => $sEcho,
			"iTotalRecords"        => $iTotal,
			"iTotalDisplayRecords" => $iTotalDisplayRecords,
			"aaData"               => array()
		);
		
		$adresses = $data->toArray();
		
		foreach($adresses as $adresse)
		{
			$row = array();
		
			$row['prenom']  = $this->custom->format_name($adresse['prenom']);
			$row['nom']     = $this->custom->format_name($adresse['nom']);
			$row['email']   = "<a href=".url('admin/adresses/'.$adresse['id']).">".$adresse['email'].'</a>';
			$row['adresse'] = $this->custom->format_name($adresse['adresse']);
			$row['ville']   = $this->custom->format_name($adresse['ville']);
			
			$row['options'] = '<a class="btn btn-info edit_btn" type="button" href="'.url('admin/adresses/'.$adresse['id']).'">&Eacute;diter</a> ';
			// Reste keys
			$row = array_values($row);

			$output['aaData'][] = $row;
		}
		
		return json_encode( $output );
		
	}
	
	/**
	 * Return all adresse of the user 
	 *
	 * @return stdObject users
	 */
	public function find($id){
				
		return $this->adresse->where('id','=',$id)->with(array('user'))->get()->first();													
	}
	
	/**
	 * Return all infos for adrese to show
	 * We need:
	 * Adresse
	 * if it's an user adresse: user infos
	 * Specialisation
	 * Members
	 * 
	 * @return array
	*/
	public function show($id){
						
        $adresse = $this->find($id);
        $type    = $this->typeAdresse($id);
      
        $membres         = array();
        $specialisations = array();
        
        if($type == 1)
        {
       	 	$membres          = $this->members($id);
	   	 	$specialisations  = $this->specialisations($id);	        
        }
	
		return array( 'adresse' => $adresse , 'membres' => $membres , 'specialisations' => $specialisations , 'type' => $type );
	}

	/**
	 * Return if adresse is linked to user
	 *
	 * @return user id
	 */	
	public function isUser($adresse){
		
		$infos = $this->adresse->findOrFail($adresse);
		
		return $infos->user_id;			
	}

	/**
	 * Return type of adresse
	 *
	 * @return  stdObject Collection of adresse
	 */		
	public function typeAdresse($adresse){
	
		$infos = $this->adresse->findOrFail($adresse);
		
		return $infos->type;			
	}

	/**
	 * Return all adresse for user
	 *
	 * @return stdObject Collection of adresse
	 */			
	public function adresseUser($user_id){
	
		return $this->adresse->where('user_id','=',$user_id)->get();
	}

	/**
	 * Return all adresse for user
	 *
	 * @return array with infos from user , type of adresses already or not for select type adresse during creation
	 */		
	public function infosIfUser($id = null){
		
		$nametypes = \Droit\User\Entities\Adresse_types::all()->lists('type','id');
		$types     = $nametypes;
		
		if( $id )
		{
			$data['user_id'] = $id;
			$adresses_user   = $this->adresseUser($id);
			$adresses        = $adresses_user->lists('type','id');
			
			if(!empty($adresses))
			{
				foreach($adresses as $adresse)
				{
					unset($types[$adresse]);
				}
				
				$data['adresses']  = $adresses;
				$data['types']     = $types;
				$data['livraison'] = 0;
			}
			else
			{
				$data['types']     = array( 1 => 'Contact');
				$data['livraison'] = 1;
			}
		}
		else
		{
			$data['adresses']  = array();
			$data['user_id']   = 0;	
			$data['types']     = array( 1 => 'Contact');
			$data['livraison'] = 0;
		}		
		
		return $data;
	}
		
	/**
	 * Return all memberships for adresse
	 *
	 * @return stdObject Collection of users
	 */	
	public function members($id){
				
		return UM::where( 'adresse_id', '=' , $id)->join('membres', function($join)
        {
            $join->on('user_membres.membre_id', '=', 'membres.id');
        })->select('user_membres.*' , 'membres.*','user_membres.id as idmem')->get();													
	}
	
	/**
	 * Return all memberships for adresse
	 *
	 * @return stdObject Collection of users
	 */	
	public function specialisations($id){
				
		return US::where( 'adresse_id', '=' , $id)->join('specialisations', function($join)
        {
            $join->on('user_specialisations.specialisation_id', '=', 'specialisations.id');
        })->select('user_specialisations.*','specialisations.*','user_specialisations.id as idspec')->get();														
	}
	
	public function create(array $data){

		$adresse = $this->adresse->create(array(
			'civilite'   => $data['civilite'],
			'prenom'     => $this->custom->format_name($data['prenom']),
			'nom'        => $this->custom->format_name($data['nom']),
			'email'      => $data['email'],
			'entreprise' => $data['entreprise'],
			'fonction'   => $data['fonction'],
			'profession' => $data['profession'],
			'telephone'  => $data['telephone'],
			'mobile'     => $data['mobile'],
			'fax'        => $data['fax'],
			'adresse'    => $data['adresse'],
			'cp'         => $data['cp'],
			'complement' => $data['complement'],
			'npa'        => $data['npa'],
			'ville'      => $data['ville'],
			'canton'     => $data['canton'],
			'pays'       => $data['pays'],
			'type'       => $data['type'],
			'user_id'    => $data['user_id'],
			'livraison'  => $data['livraison'],
			'created_at' => date('Y-m-d G:i:s'),
			'updated_at' => date('Y-m-d G:i:s')
		));
		
		if( ! $adresse )
		{
			return false;
		}
		
		return $adresse;
		
	}
	
	public function update(array $data){
		
		$adresse = $this->adresse->findOrFail($data['id']);	
		
		if( ! $adresse )
		{
			return false;
		}
		
		// Général
		$adresse->civilite    = $data['civilite'];
		$adresse->prenom      = $this->custom->format_name($data['prenom']);
		$adresse->nom         = $this->custom->format_name($data['nom']);
		$adresse->email       = $data['email'];
		$adresse->entreprise  = $data['entreprise'];
		$adresse->fonction    = $data['fonction'];
		$adresse->profession  = $data['profession'];
		$adresse->telephone   = $data['telephone'];
		$adresse->mobile      = $data['mobile'];
		$adresse->fax         = $data['fax'];
		$adresse->adresse     = $data['adresse'];
		$adresse->cp          = $data['cp'];
		$adresse->complement  = $data['complement'];
		$adresse->npa         = $data['npa'];
		$adresse->ville       = $data['ville'];
		$adresse->canton      = $data['canton'];
		$adresse->pays        = $data['pays'];
		$adresse->type        = $data['type'];
		$adresse->user_id     = $data['user_id'];
		$adresse->updated_at  = date('Y-m-d G:i:s');	
		
		$adresse->save();	
		
		return $adresse;
	}

	public function delete($id){
	
		$adresse = $this->adresse->find($id);

		return $adresse->delete();
		
	}

					
}
