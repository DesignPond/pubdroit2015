<?php namespace Droit\Colloque\Repo;

use Droit\Colloque\Repo\InvoiceInterface;
use Droit\Colloque\Entities\Colloque_factures as Colloque_factures;

class InvoiceEloquent implements InvoiceInterface {

	protected $invoice;
	
	// Class expects an Eloquent model
	public function __construct(Colloque_factures $invoice)
	{
		$this->invoice = $invoice;	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function find($id){
		
		return $this->invoice->where('id', '=' ,$id)->with( array('colloque_prices','users') )->get();
	}
	
	public function getColloque($colloque){
		
		return $this->invoice
			->join('users','users.id','=','colloque_factures.user_id')
			->join('adresses','users.id','=','adresses.user_id')
			->join('colloque_prices','colloque_prices.id','=','colloque_factures.colloque_price_id')
			->where('colloque_factures.colloque_id', '=' ,$colloque)
			->where('adresses.type', '=' ,1)->get();
	
	}
	
	public function create(array $data){
		
		$invoice = $this->invoice->create(array(
			'colloque_id'       => $data['colloque_id'],
			'user_id'           => $data['user_id'],
			'colloque_price_id' => $data['colloque_price_id'],
			'numero'            => $data['numero'],
            'created_at'        => date('Y-m-d G:i:s'),
			'updated_at'        => date('Y-m-d G:i:s')
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

		$invoice->user_id           = $data['user_id'];
		$invoice->colloque_id       = $data['colloque_id'];
		$invoice->colloque_price_id = $data['colloque_price_id'];
		$invoice->numero            = $data['numero'];
		$invoice->updated_at        = date('Y-m-d G:i:s');

		$invoice->save();	
		
		return true;

	}
	
}

