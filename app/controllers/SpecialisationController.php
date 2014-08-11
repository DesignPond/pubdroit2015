<?php

use Droit\User\Repo\SpecialisationInterface;

class SpecialisationController extends BaseController {

	protected $specialisation;
	
	// Class expects an Eloquent model
	public function __construct(SpecialisationInterface $specialisation)
	{
		$this->specialisation = $specialisation;	
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$specialisations = $this->specialisation->getAll();
		
        return View::make('admin.specialisation.index')->with( array('specialisations' => $specialisations ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.specialisation.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $specialisation  = $this->specialisation->create(
            Input::only('titre')
        );

        return Redirect::to('admin/specialisation')->with( array('status' => 'success' , 'message' => 'La spécialisation a été crée' ) );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.specialisation.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$specialisation = $this->specialisation->find($id);
		
        return View::make('admin.specialisation.edit')->with( array('specialisation' => $specialisation ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        $specialisation  = $this->specialisation->update(
            Input::only('id','titre')
        );

        return Redirect::to('admin/specialisation')->with( array('status' => 'success' , 'message' => 'La spécialisation a été modifiée' ) );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $message = ( $this->specialisation->delete($id) ? array('status' => 'success','message' => 'La spécialisation a été supprimée') : array('status' => 'error','message' => 'Problème avec la suppression') );

        return Redirect::back()->with( $message );

	}
	
	/* Link to colloques */

    /**
     * Add a specialisation to an colloque
     *
     * @return response
     */
    public function addToColloque($id)
    {
        $specialisations = $this->specialisation->droplist();
        $specialisations = ['' => 'Choix'] + $specialisations;

        return View::make('admin.specialisation.add')->with(array('colloque_id' => $id , 'specialisations' => $specialisations ));
    }
	
	public function linkColloque()
    {

		$colloque_id       = Input::get('colloque_id');
		
		$specialisation = $this->specialisation->linkColloque( Input::all() );

		return Redirect::to('admin/colloque/'.$colloque_id.'/edit')->with( array('status' => 'success' , 'message' => 'La spécialisation a été lié' ) );

	}
	
	public function unlinkColloque($id)
    {

        $message = ( $this->specialisation->unlinkColloque($id) ? array('status' => 'success','message' => 'La spécialisation a été delié') : array('status' => 'error','message' => 'Problème avec la suppression') );

        return Redirect::back()->with( $message );

	}

}
