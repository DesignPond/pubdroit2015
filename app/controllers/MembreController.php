<?php

use Droit\Repo\Membre\MembreInterface;
use Droit\Service\Form\Membre\MembreValidator as MembreValidator;

class MembreController extends BaseController {

	protected $membre;
	
	// Class expects an Eloquent model
	public function __construct(MembreInterface $membre)
	{
		$this->membre = $membre;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$membres = $this->membre->getAll();
		
        return View::make('admin.membre.index')->with( array('membres' => $membres ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.membre.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$membreValidator = MembreValidator::make(Input::all());
		
		if ($membreValidator->passes()) 
		{
			$this->membre->create(Input::all());
			
			return Redirect::to('admin/pubdroit/membre')->with( array('status' => 'success' , 'message' => 'Le membre à été crée' ) );
		}
		
		return Redirect::to('admin/pubdroit/membre/create')->withErrors( $membreValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('membre.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$membre = $this->membre->find($id);
		
        return View::make('admin.membre.edit')->with( array('membre' => $membre ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$membreValidator = MembreValidator::make(Input::all());
		
		if ($membreValidator->passes()) 
		{
			$this->membre->update(Input::all());
			
			return Redirect::to('admin/pubdroit/membre')->with( array('status' => 'success' , 'message' => 'Le membre a été modifié' ) );
		}
		
		return Redirect::to('admin/pubdroit/membre/'.$id.'/edit')->withErrors( $membreValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if( $this->membre->delete($id) )
		{
			return Redirect::to('admin/pubdroit/membre')->with( array('status' => 'success' , 'message' => 'Le membre a été supprimé') );
		}
		
		return Redirect::to('admin/pubdroit/membre')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
