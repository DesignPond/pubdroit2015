<?php

use Droit\User\Repo\UserInfoInterface;

class AdminUserController extends BaseController {

	protected $user;

	/**
	 * Instantiate a new UserController
	 */
	public function __construct( UserInfoInterface $user )
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
        return View::make('admin.users.index');
	}

	/**
	 * Display a listing of all users.
	 *
	 * @return Response
	 */
	public function getAllUser()
	{

        $columns = array('email','prenom','nom','activated'); 
        
        $sSearch = NULL;
        
        if(Input::get('sSearch'))
        {
	        $sSearch = Input::get('sSearch');
        }

        $sEcho          = Input::get('sEcho');      
        $iDisplayStart  = Input::get('iDisplayStart');
        $iDisplayLength = Input::get('iDisplayLength');
        
        return $this->user->get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch );
        
	}
	

}
