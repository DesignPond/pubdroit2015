<?php

use Droit\Repo\Inscription\InscriptionInterface;
use Droit\Repo\Event\EventInterface;

use Droit\Service\Form\Inscription\InscriptionValidator as InscriptionValidator;

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
		//
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
