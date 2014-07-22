<?php

use Droit\User\Repo\SpecialisationInterface;

use Droit\User\Entities\Event_specialisations as ES;

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
            Input::only('titreSpecialisation')
        );

        return Redirect::to('admin/pubdroit/specialisation')->with( array('status' => 'success' , 'message' => 'La spécialisation a été crée' ) );
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
            Input::only('id','titreSpecialisation')
        );

        return Redirect::to('admin/pubdroit/specialisation')->with( array('status' => 'success' , 'message' => 'La spécialisation a été modifiée' ) );

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
	
	/* Link to events */

    /**
     * AddA specialisation to an event
     *
     * @return response
     */
    public function addToEvent()
    {
        return View::make('admin.specialisation.add');
    }
	
	public function linkEvent(){
	
		$specialisation = Input::get('specialisation_id');
		$event          = Input::get('event_id');
		
		if( $this->specialisation->linkEvent($specialisation,$event) )
		{
			return Redirect::to('admin/pubdroit/event/'.$event.'/edit')->with( array('status' => 'success') );
		}
		
		return Redirect::back()->with('status', 'Problème avec l\'ajout');
	}
	
	public function unlinkEvent($id){
	
		//$event_id = ES::find($id)->event_id;
		
		$event = ES::find($id);
		
		$event_id  = $event->event_id;
		
		if( $this->specialisation->unlinkEvent($id) )
		{
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'La spécialisation a été supprimée') );
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
