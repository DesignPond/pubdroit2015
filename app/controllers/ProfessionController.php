<?php

use Droit\User\Repo\ProfessionInterface;

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
        $profession  = $this->profession->create(
            Input::only('titreProfession')
        );

        return Redirect::to('admin/pubdroit/profession')->with( array('status' => 'success' , 'message' => 'La profession a été crée' ) );
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

        $profession  = $this->profession->update(
            Input::only('id','titreProfession')
        );

        return Redirect::to('admin/pubdroit/profession')->with( array('status' => 'success' , 'message' => 'La profession a été modifiée' ) );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$message = ( $this->profession->delete($id) ? array('status' => 'success','message' => 'La profession a été supprimée') : array('status' => 'error','message' => 'Problème avec la suppression') );

		return Redirect::back()->with( $message );
	}

}
