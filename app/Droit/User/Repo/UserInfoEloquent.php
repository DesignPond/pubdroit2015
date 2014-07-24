<?php namespace Droit\User\Repo;

use Droit\User\Repo\UserInfoInterface;
use Droit\User\Entities\User as M;
use Droit\User\Entities\Civilites as Civilites;
use Droit\User\Entities\Event_options_user;

class UserInfoEloquent implements UserInfoInterface{

	protected $user;
	
	protected $custom;

	/**
	 * Construct 
	 */
	public function __construct(M $user)
	{
		$this->user   = $user;
		
		$this->custom = new \Custom;
	}
	
	public function getAll(){
		
		return $this->user->with( array('adresses') )->get();
	}
		
	public function getLast($nbr){
	
		return $this->user->orderBy('id', 'DESC')->take($nbr)->skip(0)->get();	
	}
	
	public function activate($id){
	
		$user = $this->user->findOrFail($id);	
		
		if( ! $user )
		{
			return false;
		}

		$user->activated = ( $user->activated ? 0 : 1);
		
		$user->save();	
		
		return true;		
	}
		
	/*
	 * Ajax call for datatable
	 *
	*/
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL ){
		
		$iTotal   = $this->user->get()->count();
		
		if($sSearch)
		{
			$data = $this->user->with( array('adresses') )
							   ->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" )')
							   ->take($iDisplayLength)
							   ->skip($iDisplayStart)
							   ->get();
								    
			$iTotalDisplayRecords = $this->user->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" )')->get()->count();	
		}
		else
		{
			$data = $this->user->with( array('adresses') )->take($iDisplayLength)->skip($iDisplayStart)->get();
			
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
			
			foreach($adresse as $info)
			{
				$row['email']  = "<a href=".url('admin/users/'.$adresse['id']).">".$adresse['email'].'</a>';
				$row['prenom'] = $this->custom->format_name($adresse['prenom']);
				$row['nom']    = $this->custom->format_name($adresse['nom']);
				
				$row['activated'] = ( $adresse['activated'] == 1 ? 'Active' : 'Inactive' );
				
				$options = '';
				
				if( isset($adresse['adresses']) )
				{
				
						$options .= '<div class="list-group">';
						
						foreach($adresse['adresses'] as $adre)
						{
						
							if($adre['type'] == '1'){
								$options .= '<a href="'.url('admin/adresses/'.$adre['id']).'" class="list-group-item"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contact</a>';
							}
							
							if($adre['type'] == '2'){
								$options .= '<a href="'.url('admin/adresses/'.$adre['id']).'" class="list-group-item"><i class="fa fa-home"></i>&nbsp;&nbsp;Privé</a>';
							}
							
							if($adre['type'] == '3'){
								$options .= '<a href="'.url('admin/adresses/'.$adre['id']).'" class="list-group-item"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Professionnelle</a>';
							}							
						}
						
						$options .= '</div>';
				}				
				
				$row['adresses'] = $options;
				$row['options']  = '<a class="btn btn-info edit_btn" type="button" href="'.url('admin/users/'.$adresse['id']).'">&Eacute;diter</a> ';
			}
			
			$row = array_values($row);

			$output['aaData'][] = $row;
		}
		
		return json_encode( $output );
		
	}

	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id){
				
		return $this->user->where('id','=',$id)->with( array('adresses') )->first();														
	}
	
	/**
	 * Get value for column.
	*/
	public function getColumnValue($column,$value){
		
		return $this->user->where($column,'=',$value)->get();	
	}
	
	/**
	 *  Update a column
	*/	
	public function updateColumn($id , $column , $value){

		$user = $this->user->findOrFail($id);
		
		if( ! $user )
		{
			return false;
		}
		
		if($column == 'password')
		{
			$value = \Hash::make($value);
		}

		$user->$column = $value;
		$user->save();	
		
		return true;		
	}
	

	/**
	 * Return adresse id type contact
	 *
	 * @return stdObject Collection of users
	 */
	public function findAdresseContact($id , $onlyId = null){

		$contact = $this->user->where('users.id','=',$id)
							  ->join('adresses', function($join)
						      {
						          $join->on('users.id', '=', 'adresses.user_id')->where('adresses.type', '=', 1);
						          
						      })->get();	
					      
		if($onlyId && !$contact->isEmpty() )
		{
			return $contact->first()->id;
		}		
		
		return $contact;												
	}
				
	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function findWithInscription($id,$event){
				
		return $this->user
					->where('id','=',$id)
					->with( array('inscription' => function($query)use($event,$id){ 
										$query->where('inscriptions.event_id','=',$event)->where('inscriptions.user_id','=',$id); },
								  'adresses'    => function($query){ 
										$query->where('adresses.livraison','=',1); }) )
					->first();													
	}

	/**
	 * Return all options for user for an event
	 *
	 * @return stdObject Collection
	 */		
	public function eventOptions($user,$event){
		
		return \Event_options_user::join('event_options', 'event_options.id', '=','event_option_user.event_option_id')
									->where('event_options.event_id','=',$event)
									->where('user_id','=',$user)
									->get();
	}

	/**
	 * Create a new user
	 *
	 * @return boolean
	*/	
	public function create(array $data){

		$user = $this->user;
		
		$user->prenom      = $this->custom->format_name($data['prenom']);
		$user->nom         = $this->custom->format_name($data['nom']);
        $user->name        = $this->custom->format_name($data['prenom']).' '.$this->custom->format_name($data['nom']);
		$user->email       = $data['email'];
		$user->username    = $data['email'];
		$user->password    = \Hash::make($data['password']);
		$user->updated_at  = date('Y-m-d G:i:s');	
		
		$user->save();	
		
		if( ! $user )
		{
			return false;
		}
		
		return $user;
		
	}

	/**
	 * Update a new user
	 *
	 * @return boolean
	*/		
	public function update(array $data){
		
		$user = $this->user->findOrFail($data['id']);	
		
		if( ! $user )
		{
			return false;
		}
		
		$user->prenom      = $this->custom->format_name($data['prenom']);
		$user->nom         = $this->custom->format_name($data['nom']);
		$user->email       = $data['email'];
		$user->password    = \Hash::make($data['password']);
		$user->updated_at  = date('Y-m-d G:i:s');	
		
		$user->save();	
		
		return $user;
	}
	
	
	/**
	 * Delete a user by id.
	*/
	public function delete($id){
	
		$user = $this->user->findOrFail($id);

		$user->delete();
		
		return true;
	}
	
}
