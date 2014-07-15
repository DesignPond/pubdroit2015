<?php

use Droit\Repo\Profession\ProfessionInterface;
use Droit\Service\Form\Profession\ProfessionValidator as ProfessionValidator;

class ProfessionController extends BaseController {

	protected $profession;
	
	// Class expects an Eloquent model
	public function __construct(ProfessionInterface $profession)
	{
		$this->profession = $profession;	
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$professions = $this->profession->getAll();
		
        return View::make('admin.profession.index')->with( array('professions' => $professions ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.profession.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$professionValidator = ProfessionValidator::make(Input::all());
		
		if ($professionValidator->passes()) 
		{
			$this->profession->create(Input::all());
			
			return Redirect::to('admin/pubdroit/profession')->with( array('status' => 'success' , 'message' => 'La profession à été crée' ) );
		}
		
		return Redirect::to('admin/pubdroit/profession/create')->withErrors( $professionValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.profession.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$profession = $this->profession->find($id);
		
        return View::make('admin.profession.edit')->with( array('profession' => $profession ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$professionValidator = ProfessionValidator::make(Input::all());
		
		if ($professionValidator->passes()) 
		{
			$this->profession->update(Input::all());
			
			return Redirect::to('admin/pubdroit/profession')->with( array('status' => 'success' , 'message' => 'La profession a été modifiée' ) );
		}
		
		return Redirect::to('admin/pubdroit/profession/'.$id.'/edit')->withErrors( $professionValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if( $this->profession->delete($id) )
		{
			return Redirect::to('admin/pubdroit/profession')->with( array('status' => 'success' , 'message' => 'La profession a été supprimée') );
		}
		
		return Redirect::to('admin/pubdroit/profession')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
