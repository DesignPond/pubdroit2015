<?php namespace Droit\User\Repo;

use Droit\User\Repo\SpecialisationInterface;
use Droit\User\Entities\Specialisations as M;
use Droit\User\Entities\Event_specialisations as ES;

class SpecialisationEloquent implements SpecialisationInterface {
	
	protected $specialisation;
	
	// Class expects an Eloquent model
	public function __construct(M $specialisation)
	{
		$this->specialisation = $specialisation;	
	}
	
	public function getAll(){
		
		return $this->specialisation->all();
		
	}
	
	public function droplist(){
	
		return $this->specialisation->lists('titreSpecialisation', 'id');
	}
	
	public function find($id){
	
		return $this->specialisation->findOrFail($id);	
		
	}
	
	public function delete($id){
	
		$specialisation = $this->specialisation->find($id);

		return $specialisation->delete();
		
	}
	
	public function create(array $data)
	{
		$specialisation = $this->specialisation->create(array(
			'titreSpecialisation' => $data['titreSpecialisation']
		));
		
		if( ! $specialisation )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$specialisation = $this->specialisation->findOrFail($data['id']);	
		
		if( ! $specialisation )
		{	
			return false;
		}
		
		$specialisation->titreSpecialisation  = $data['titreSpecialisation'];
		
		$specialisation->save();	
		
		return true;		
	}
	
	public function linkEvent($specialisation,$event){
	
		$link = ES::create(array(
			'event_id'          => $event,
			'specialisation_id' => $specialisation
		));
		
		if( ! $link )
		{
			return false;
		}
		
		return true;	
	}
	
	public function unlinkEvent($id){
		
		$link = ES::find($id);

		return $link->delete();
	}
	
}