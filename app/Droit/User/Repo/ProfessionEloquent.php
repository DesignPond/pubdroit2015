<?php namespace Droit\User\Repo;

use Droit\User\Repo\ProfessionInterface;
use Droit\User\Entities\Professions as M;

class ProfessionEloquent implements ProfessionInterface {
	
	protected $profession;
	
	// Class expects an Eloquent model
	public function __construct(M $profession)
	{
		$this->profession = $profession;	
	}
	
	public function getAll(){
		
		return $this->profession->all();
		
	}
	
	public function find($id){
	
		return $this->profession->findOrFail($id);	
		
	}
	
	public function delete($id){
	
		$profession = $this->profession->find($id);

		return $profession->delete();
		
	}
	
	public function create(array $data)
	{
		$profession = $this->profession->create(array(
			'titreProfession' => $data['titreProfession']
		));
		
		if( ! $profession )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$profession = $this->profession->findOrFail($data['id']);	
		
		if( ! $profession )
		{	
			return false;
		}
		
		$profession->titreProfession  = $data['titreProfession'];
		
		$profession->save();	
		
		return true;		
	}
	
}