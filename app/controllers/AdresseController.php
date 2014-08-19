<?php

use Droit\User\Repo\UserInfoInterface;
use Droit\User\Repo\AdresseInterface;
use Droit\User\Repo\UserSpecialisationInterface;
use Droit\User\Repo\UserMembreInterface;

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
		$this->custom = new \Custom;

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
        $iSortCol_0     = Input::get('iSortCol_0');
        $sSortDir_0     = Input::get('sSortDir_0');

        return $this->adresse->get_ajax( $sEcho , $iDisplayStart , $iDisplayLength , $sSearch, $iSortCol_0, $sSortDir_0 );
        
	}
	
	
	/**
	 * change livraison adresse
     *
     * @param  int  $id, int $user_id, int $livraison
     * @return Response
     */
	public function changeLivraison(){

        $user_id    = Input::get('user_id');
        $adresse    = Input::get('id');

        if ( $this->adresse->changeLivraison($adresse , $user_id) )
        {
            return Redirect::to('admin/users/'.$user_id)->with( array('status' => 'success' , 'message' => 'L\'adresse a été changé en adresse de livraison'));
        }

        return Redirect::to('admin/users/'.$user_id)->with( array('status' => 'danger' , 'message' => 'Problème avec le changement') );
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id = null)
	{
		// creation is used for new simple adresse and new user adresse
		
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

        $adresse = $this->adresse->create(
            Input::all()
        );

        if(!empty($redirectTo))
        {
            return Redirect::to('admin/'.$redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse crée') );
        }

        return Redirect::to('admin/adresses/'.$adresse->id)->with( array('status' => 'success' , 'message' => 'Adresse crée') );

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

		$redirectTo = Input::get('redirectTo');
		$backTo     = 'adresses/'.$id ;
		$redirect   = ( $redirectTo ? $redirectTo : $backTo);
		
		$address = $this->adresse->update( Input::all() );

		return Redirect::to('admin/'.$redirect)->with( array('status' => 'success' , 'message' => 'Adresse mise à jour') );

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

		$user_id    = Input::get('user_id');
		
		$redirectTo = ( $user_id ? 'admin/users/'.$user_id : 'admin/adresses/'.Input::get('adresse_id') );

        if( $this->adresse->addSpecialisation(Input::get('specialisation_id') , Input::get('adresse_id')) )
        {
            return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'La spécialisation a été ajouté') );
        }

        return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'L\'utilisateur à déjà la spécialisation') );
	}

	/**
	 *  Add membre for user
	 *
	 * @param  int  $user_id , $membre_id
	 * @return Response
	 */	
	public function membre(){

		$user_id  = Input::get('user_id');

		$redirectTo = ( $user_id ? 'admin/users/'.$user_id : 'admin/adresses/'.Input::get('adresse_id') );

        if( $this->adresse->addMembre(Input::get('membre_id') , Input::get('adresse_id')) )
        {
            return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'L\'appartenance comme membre a été ajouté') );
        }

        return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'L\'utilisateur à déjà l\'appartenance comme membre') );

	}
	
	/**
	 * Remove specialisation for user
	 *
	 * @param  int  $user_id , specialisation_id
	 * @return Response
	 */	
	public function removeSpecialisation(){

		$user_id = Input::get('user_id');
		
		$redirectTo = ( $user_id != 0 ? 'admin/users/'.$user_id : 'admin/adresses/'.Input::get('adresse_id') );

		$this->adresse->removeSpecialisation(Input::get('specialisation_id'),Input::get('adresse_id'));

        return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'La spécialisation a été supprimé'));

	}

	/**
	 * Remove membre for user
	 *
	 * @param  int  $user_id , $membre_id
	 * @return Response
	 */	
	public function removeMembre(){

		$user_id    = Input::get('user_id');

		$redirectTo = ( $user_id != 0 ? 'admin/users/'.Input::get('user_id') : 'admin/adresses/'.Input::get('adresse_id') );

		if ( $this->adresse->removeMembre(Input::get('membre_id'),Input::get('adresse_id')) )
		{
            return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'Le membre a été supprimé')); 
        }

        return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') );			
	}

	
}
