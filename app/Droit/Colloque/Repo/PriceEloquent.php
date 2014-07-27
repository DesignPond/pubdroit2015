<?php namespace Droit\Colloque\Repo;

use Droit\Colloque\Repo\PriceInterface;
use Droit\Colloque\Entities\Colloque_prices as Colloque_prices;

class PriceEloquent implements PriceInterface {
	
	protected $price;

	public function __construct(Colloque_prices $price)
	{
		$this->price = $price;	
	}
	
	public function getAll($colloque){
		
		return $this->price->where('colloque_id' ,'=', $colloque )->get();	
	}
	
	public function find($id){
	
		return $this->price->findOrFail($id);	
		
	}
	
	public function delete($id){
	
		$price = $this->price->find($id);

		return $price->delete();		
	}
	
	public function create(array $data)
	{
		$price = $this->price->create(array(
			'remarque'    => $data['remarque'],
			'price'       => $data['price'],
			'rang'        => $data['rang'],
			'type'        => $data['type'],
			'colloque_id' => $data['colloque_id']
		));
		
		if( ! $price )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$price = $this->price->findOrFail($data['id']);	
		
		if( ! $price )
		{	
			return false;
		}
		
		$price->remarque    = $data['remarque'];
		$price->price       = $data['price'];
		$price->rang        = $data['rang'];
		$price->type        = $data['type'];
		$price->colloque_id = $data['colloque_id'];
		
		$price->save();	
		
		return true;		
	}
	
}