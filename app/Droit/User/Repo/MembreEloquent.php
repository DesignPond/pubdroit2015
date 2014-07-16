<?php namespace Droit\User\Repo;

use Droit\User\Repo\MembreInterface;
use Droit\User\Entities\Membres as M;

class MembreEloquent implements MembreInterface {
	
	protected $membre;
	
	// Class expects an Eloquent model
	public function __construct(M $membre)
	{
		$this->membre = $membre;	
	}
	
	public function getAll(){
		
		return $this->membre->all();
		
	}
	
	public function find($id){
	
		return $this->membre->findOrFail($id);	
		
	}
	
	public function delete($id){
	
		$membre = $this->membre->find($id);

		return $membre->delete();
		
	}
	
	public function create(array $data)
	{
		$membre = $this->membre->create(array(
			'titreMembre' => $data['titreMembre']
		));
		
		if( ! $membre )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$membre = $this->membre->findOrFail($data['id']);	
		
		if( ! $membre )
		{	
			return false;
		}
		
		$membre->titreMembre  = $data['titreMembre'];
		
		$membre->save();	
		
		return true;		
	}
	
}