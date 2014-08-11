<?php namespace Droit\User\Repo;

use Droit\User\Repo\UserSpecialisationInterface;
use Droit\User\Entities\User_specialisations as M;

class UserSpecialisationEloquent implements UserSpecialisationInterface {
	
	protected $userspecialisation;
	
	// Class expects an Eloquent model
	public function __construct(M $userspecialisation)
	{
		$this->userspecialisation = $userspecialisation;	
	}
	
	public function find($specialisation,$adresse_id){
		
		return $this->userspecialisation->where('specialisation_id' , '=' , $specialisation)->where('adresse_id' , '=' , $adresse_id)->get();		
	}
	
	public function delete($id){
	
		$userspecialisation = $this->userspecialisation->findOrFail($id);

		return $userspecialisation->delete();
	}
		
}