<?php

use Droit\Repo\Inscription\InscriptionInterface;
use Droit\Repo\Event\EventInterface;
use Droit\Repo\Invoice\InvoiceInterface;

class InvoiceController extends BaseController {

	protected $inscription;
	
	protected $event;
	
	protected $invoice;
	
	public function __construct( InscriptionInterface $inscription , InvoiceInterface $invoice , EventInterface $event )
	{
		
		$this->inscription = $inscription;
		
		$this->event       = $event;
		
		$this->invoice     = $invoice;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.facture.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.facture.create');
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
		
		$event    = $this->event->find($id);
		$invoices = $this->invoice->getEvent($id);
		
		return View::make('admin.invoice.index')->with( array('invoices' => $invoices , 'event' => $event ));

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
