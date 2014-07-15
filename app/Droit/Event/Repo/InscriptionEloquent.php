<?php namespace Droit\Event\Repo;

use Droit\Event\Repo\InscriptionInterface;
use Droit\Event\Entities\Inscriptions as M;

class InscriptionEloquent implements InscriptionInterface {

	protected $inscription;
	
	// Class expects an Eloquent model
	public function __construct(M $inscription)
	{
		$this->inscription = $inscription;	
	}
	
	public function getLast($nbr){
	
		return $this->inscription->orderBy('id', 'DESC')->take($nbr)->skip(0)->get();	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		return $this->inscription->with( array('prices','users') )->get();		
	}
		
	public function find($id){
		
		return $this->inscription->where('id', '=' ,$id)->with( array('prices','users') )->get();		
	}
	
	public function getEvent($event){
		
		return $this->inscription
					->join('users','users.id','=','inscriptions.user_id')
					->join('adresses','users.id','=','adresses.user_id')
					->join('prices','prices.id','=','inscriptions.price_id')
					->where('inscriptions.event_id', '=' ,$event)
					->where('adresses.type', '=' ,1)
					->get();
	}
	
	public function getForUser($user){
					
		return $this->inscription->where('user_id', '=' ,$user)->with( array('prices','users','event') )->get();		
	}

	public function create(array $data){
		
		// Create the article
		$inscription = $this->inscription->create(array(
			'event_id'        => $data['event_id'],
			'user_id'         => $data['user_id'],
			'price_id'        => $data['price_id'],
			'noInscription'   => $data['noInscription'],
			'dateInscription' => $data['dateInscription']
		));
		
		if( ! $inscription )
		{
			return false;
		}
		
		return true;
	}
	
	public function update(array $data){
		
		$inscription = $this->inscription->find($data['id']);
		
		if( ! $inscription )
		{
			return false;
		}

		$inscription->user_id         = $data['user_id'];
		$inscription->event_id        = $data['event_id'];
		$inscription->price_id        = $data['price_id'];
		$inscription->noInscription   = $data['noInscription'];
		$inscription->dateInscription = $data['dateInscription'];

		$inscription->save();	
		
		return true;

	}
	
}

