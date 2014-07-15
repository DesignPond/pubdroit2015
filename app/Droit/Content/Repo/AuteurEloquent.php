<?php namespace Droit\Repo\Auteur;

use Droit\Repo\Auteur\AuteurInterface;
use Illuminate\Database\Eloquent\Model as M;

class AuteurEloquent implements AuteurInterface {

	protected $auteur;
	
	// Class expects an Eloquent model
	public function __construct(M $auteur)
	{
		$this->auteur = $auteur;	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		return $this->auteur->orderBy('name', 'asc')->get();		
	}
		
	public function find($id){
		
		return $this->auteur->findOrFail($id);			
	}
	
	public function create(array $data){
/*

		$auteur = $this->auteur->create(array(
			'adressesauteur' => $data['adressesauteur'],
			'motifauteur'    => $data['motifauteur'],
			'infoauteur'     => $data['infoauteur']
		));
		
		if( ! $auteur )
		{
			return false;
		}
		
		return true;
*/

	}
	
	public function update(array $data){
		
/*
		$auteur = $this->auteur->find($data['id']);
		
		if( ! $auteur )
		{
			return false;
		}
		
		$auteur->adressesauteur = $data['adressesauteur'];
		$auteur->motifauteur    = $data['motifauteur'];
		$auteur->infoauteur     = $data['infoauteur'];	
		
		$auteur->save();	
		
		return true;
*/
	}
	
}

