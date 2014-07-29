<?php namespace Droit\Colloque\Repo;

use Droit\Colloque\Repo\FactureInterface;
use Droit\Colloque\Entities\Colloque_factures as Colloque_factures;
use Droit\Colloque\Events\FactureWasCreated;

class FactureEloquent implements FactureInterface {

	protected $facture;
	
	// Class expects an Eloquent model
	public function __construct(Colloque_factures $facture)
	{
		$this->facture = $facture;	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function find($id){
		
		return $this->facture->where('id', '=' ,$id)->with( array('colloque_prices','users') )->get();
	}
	
	public function getColloque($colloque){
		
		return $this->facture
			->join('users','users.id','=','colloque_factures.user_id')
			->join('adresses','users.id','=','adresses.user_id')
			->join('colloque_prices','colloque_prices.id','=','colloque_factures.colloque_price_id')
			->where('colloque_factures.colloque_id', '=' ,$colloque)
			->where('adresses.type', '=' ,1)->get();
	
	}
	
	public function create(array $data){
		
		$facture = $this->facture->create(array(
			'colloque_id'       => $data['colloque_id'],
			'user_id'           => $data['user_id'],
			'colloque_price_id' => $data['colloque_price_id'],
			'numero'            => $data['numero'],
            'created_at'        => date('Y-m-d G:i:s'),
			'updated_at'        => date('Y-m-d G:i:s')
		));
		
		if( ! $facture )
		{
			return false;
		}

        // Raise event when new facture is created
        $facture->raise(new FactureWasCreated($facture));
		
		return $facture;
	}
	
	public function update(array $data){
		
		$facture = $this->facture->find($data['id']);
		
		if( ! $facture )
		{
			return false;
		}

		$facture->user_id           = $data['user_id'];
		$facture->colloque_id       = $data['colloque_id'];
		$facture->colloque_price_id = $data['colloque_price_id'];
		$facture->numero            = $data['numero'];
		$facture->updated_at        = date('Y-m-d G:i:s');

		$facture->save();	
		
		return $facture;

	}
	
}

