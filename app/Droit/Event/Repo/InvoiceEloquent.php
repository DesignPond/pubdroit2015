<?php namespace Droit\Event\Repo;

use Droit\Event\Repo\InvoiceInterface;
use Droit\Event\Entities\Invoices as M;

class InvoiceEloquent implements InvoiceInterface {

	protected $invoice;
	
	// Class expects an Eloquent model
	public function __construct(M $invoice)
	{
		$this->invoice = $invoice;	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function find($id){
		
		return $this->invoice->where('id', '=' ,$id)->with( array('prices','users') )->get();		
	}
	
	public function getEvent($event){
		
		return $this->invoice
			->join('users','users.id','=','invoices.user_id')
			->join('adresses','users.id','=','adresses.user_id')
			->join('prices','prices.id','=','invoices.price_id')
			->where('invoices.event_id', '=' ,$event)
			->where('adresses.type', '=' ,1)
			->get();
	
	}
	
	public function create(array $data){
		
		$invoice = $this->invoice->create(array(
			'event_id'        => $data['event_id'],
			'user_id'         => $data['user_id'],
			'price_id'        => $data['price_id'],
			'invoiceNumber'   => $data['invoiceNumber'],
			'dateinvoice'     => $data['dateinvoice']
		));
		
		if( ! $invoice )
		{
			return false;
		}
		
		return true;
	}
	
	public function update(array $data){
		
		$invoice = $this->invoice->find($data['id']);
		
		if( ! $invoice )
		{
			return false;
		}

		$invoice->user_id     = $data['user_id'];
		$invoice->event_id    = $data['event_id'];
		$invoice->price_id    = $data['price_id'];
		$invoice->noinvoice   = $data['noinvoice'];
		$invoice->dateinvoice = $data['dateinvoice'];

		$invoice->save();	
		
		return true;

	}
	
}

