<?php

use Droit\Inscriptions\Repo\InscriptionInterface;
use Droit\Event\Repo\EventInterface;

class InscriptionController extends BaseController {

	protected $inscription;	
	
	protected $event;
	
	public function __construct( InscriptionInterface $inscription , EventInterface $event )
	{
		
		$this->inscription = $inscription;
		
		$this->event       = $event;

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.inscription.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Command new inscription creation and dispatch events
        $inscription = $this->execute('Droit\Inscriptions\Commands\CreateInscriptionCommand');

        return Redirect::to('admin/pubdroit/inscription/'.$inscription->id)->with( array('status' => 'success' , 'message' => 'Inscription crée') );
	}
	
	public function event($id){
		
		$event        = $this->event->find($id);
		$inscriptions = $this->inscription->getEvent($id);
		
		return View::make('admin.inscription.index')->with( array('inscriptions' => $inscriptions , 'event' => $event ));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.inscription.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admin.inscription.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
