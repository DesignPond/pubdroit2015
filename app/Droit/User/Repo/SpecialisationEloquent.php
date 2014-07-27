<?php namespace Droit\User\Repo;

use Droit\User\Repo\SpecialisationInterface;
use Droit\User\Entities\Specialisations as Specialisations;
use Droit\Colloque\Entities\Colloque_specialisations as ES;

class SpecialisationEloquent implements SpecialisationInterface {
	
	protected $specialisation;
	
	// Class expects an Eloquent model
	public function __construct(Specialisations $specialisation)
	{
		$this->specialisation = $specialisation;	
	}
	
	public function getAll(){
		
		return $this->specialisation->all();
		
	}
	
	public function droplist(){
	
		return $this->specialisation->lists('titre', 'id');
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
			'titre' => $data['titre']
		));
		
		if( ! $specialisation )
		{
			return false;
		}
		
		return $specialisation;
	}
	
	public function update(array $data)
	{
		$specialisation = $this->specialisation->findOrFail($data['id']);	
		
		if( ! $specialisation )
		{	
			return false;
		}
		
		$specialisation->titreSpecialisation  = $data['titre'];
		
		$specialisation->save();	
		
		return $specialisation;
	}
	
	public function linkColloque($data){
	
		$link = ES::create(array(
			'colloque_id'       => $data['colloque_id'],
			'specialisation_id' => $data['specialisation_id']
		));
		
		if( ! $link )
		{
			return false;
		}
		
		return $link;
	}
	
	public function unlinkColloque($id){
		
		$link = ES::find($id);

		return $link->delete();
	}
	
}