<?php

use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;

use Droit\Service\Form\Adresse\AdresseValidator as AdresseValidator;

use Droit\Repo\UserSpecialisation\UserSpecialisationInterface;
use Droit\Repo\UserMembre\UserMembreInterface;

class AdresseController extends BaseController {

	protected $user;
	
	protected $adresse;
	
	/*  Members and specialisations  */	
	protected $userspecialisation;
	
	protected $usermembre;

	/* Inject dependencies */
	public function __construct( UserInfoInterface $user , AdresseInterface $adresse , UserSpecialisationInterface $userspecialisation , UserMembreInterface $usermembre )
	{

		$this->user        = $user;
		
		$this->adresse     = $adresse;
		
		$this->usermembre  = $usermembre;		
		
		$this->userspecialisation = $userspecialisation;
				
		// Custom helper				
		$this->custom      = new \Custom;
		
		// shared variables and list for selects	
		$shared = $this->custom->sharedVariables();
		
		View::share( $shared );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
        return View::make('admin.adresses.index');
	}
	
	/**
	 * Display a listing of all adresses.
	 *
	 * @return Response
	 */
	public function getAllAdresse()
	{

        $sSearch = NULL;
        
        if(Input::get('sSearch'))
        {
	        $sSearch = Input::get('sSearch');
        }

        $sEcho          = Input::get('sEcho');      
        $iDisplayStart  = Input::get('iDisplayStart');
        $iDisplayLength = Input::get('iDisplayLength');
        
        return $this->adresse->get_ajax( $sEcho , $iDisplayStart , $iDisplayLength , $sSearch );
        
	}
	
	
	/**
	 * change livraison adresse
	*/		
	public function changeLivraison(){
		
		echo '<pre>';
		print_r(Input::all());
		echo '</pre>';
		exit();
		
		if ($this->adresse->changeLivraison($id,$type))
		{			
			return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse supprimé') ); 		
		}	
		
		return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') ); 
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id = null)
	{
		// creation is used for new simple adress and new user adress
		
		$infos = $this->adresse->infosIfUser($id);	
		
		return View::make('admin.adresses.create')->with( $infos );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function store()
	{			
		$redirectTo = Input::get('redirectTo');
		$user_id    = Input::get('user_id');

		$adresseValidator = AdresseValidator::make( Input::all() );
		
		if ($adresseValidator->passes()) 
		{
			$this->adresse->create( Input::all() );
			
			if(!empty($redirectTo))
			{
				return Redirect::to('admin/'.$redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse crée') ); 
			}
			
			// Get last inserted
			$id  = $this->adresse->getLast(1)->first()->id;
			
			return Redirect::to('admin/adresses/'.$id)->with( array('status' => 'success' , 'message' => 'Adresse crée') ); 
		}
		
		$where = ( $user_id > 0 ? '/'.$user_id : '');
		
		return Redirect::to('admin/adresses/create'.$where)->withErrors( $adresseValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Show the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{		
		$data = $this->adresse->show($id);
		
		if($data['type'] != 1)
		{
			$contact  = $this->user->findAdresseContact($id , true); // return only id with true
	        
	        if($contact)
	        {
		        $data['membres']         = $this->adresse->members($contact);
				$data['specialisations'] = $this->adresse->specialisations($contact); 
	        }
		}

        return View::make('admin.adresses.show')->with( $data );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$redirectTo       = Input::get('redirectTo');
		
		$adresseValidator = AdresseValidator::make( Input::all() );
		
		if ($adresseValidator->passes()) 
		{
			$this->adresse->update( Input::all() );
			
			if($redirectTo)
			{
				return Redirect::to('admin/'.$redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse mise à jour') ); 
			}
			
			return Redirect::to('admin/adresses/'.$id)->with( array('status' => 'success' , 'message' => 'Adresse mise à jour') ); 
		}
		
		return Redirect::to('admin/adresses/'.$id)->withErrors( $adresseValidator->errors() )
												  ->with( array('status' => 'danger' , 'message' => 'Problème avec la mise à jour') )
												  ->withInput( Input::all() ); 
	}	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,$user = NULL)
	{
		
		$redirectTo = ( $user ? 'admin/users/'.$user : 'admin/adresses' );
		
		if ($this->adresse->delete($id))
		{			
			return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse supprimé') ); 		
		}	
		
		return Redirect::to('admin/adresses/'.$id)->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') ); 
        
	}

	/**
	 * Add specialisation for user
	 *
	 * @param  int  $user_id , specialisation_id
	 * @return Response
	 */	
	public function specialisation(){
	
		$adresse_id = Input::get('adresse_id');
		$user_id    = Input::get('user_id');
		
		$redirectTo = ( $user_id ? 'admin/users/'.$user_id : 'admin/adresses/'.$adresse_id );	
		
		if( !empty( $adresse_id ) && ($adresse_id != 0))
		{					
			if( $this->userspecialisation->addToUser(Input::get('specialisation_id') , Input::get('adresse_id')) )
			{				
				return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'La spécialisation a été ajouté') );
			}

			return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'L\'utilisateur à déjà la spécialisation') );
		}

		return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Veuillez créer un adresse pour l\'utilisateur d\'abord ') );		
	}

	/**
	 *  Add membre for user
	 *
	 * @param  int  $user_id , $membre_id
	 * @return Response
	 */	
	public function membre(){
		
		$adresse_id = Input::get('adresse_id');
		$user_id    = Input::get('user_id');	

		$redirectTo = ( $user_id ? 'admin/users/'.$user_id : 'admin/adresses/'.$adresse_id );		
		
		if( !empty( $adresse_id ) && ($adresse_id != 0))
		{					
			if( $this->usermembre->addToUser(Input::get('membre_id') , Input::get('adresse_id')) )
			{	
				return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'L\'appartenance comme membre a été ajouté') ); 
			}
		
			return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'L\'utilisateur à déjà l\'appartenance comme membre') ); 
		}	

		return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Veuillez créer un adresse pour l\'utilisateur d\'abord ') );				
	}
	
	/**
	 * Remove specialisation for user
	 *
	 * @param  int  $user_id , specialisation_id
	 * @return Response
	 */	
	public function removeSpecialisation(){
	
		$adresse_id = Input::get('adresse_id');
		$user_id    = Input::get('user_id');
		$id         = Input::get('id');	
		
		$redirectTo = ( $user_id != 0 ? 'admin/users/'.$user_id : 'admin/adresses/'.$adresse_id );	
		
		if ( $this->userspecialisation->delete($id) )
		{
            return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'La spécialisation a été supprimé')); 
        }

        return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') );				
	}

	/**
	 * Remove membre for user
	 *
	 * @param  int  $user_id , $membre_id
	 * @return Response
	 */	
	public function removeMembre(){
	
		$adresse_id = Input::get('adresse_id');
		$user_id    = Input::get('user_id');
		$id         = Input::get('id');	
		
		$redirectTo = ( $user_id != 0 ? 'admin/users/'.$user_id : 'admin/adresses/'.$adresse_id );	

		if ( $this->usermembre->delete($id) )
		{
            return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'Le membre a été supprimé')); 
        }

        return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') );			
	}	
	
}
