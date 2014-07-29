<?php namespace Droit\Colloque\Repo;

use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Entities\Colloque_inscriptions as Colloque_inscriptions;
use Droit\Colloque\Events\InscriptionWasCreated;
use Droit\Colloque\Events\InscriptionWasUpdated;


class InscriptionEloquent implements InscriptionInterface {

	protected $inscription;
	
	// Class expects an Eloquent model
	public function __construct(Colloque_inscriptions $inscription)
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
		
		return $this->inscription->with( array('colloque_prices','users') )->get();
	}
		
	public function find($id){

        return $this->inscription->where('colloque_inscriptions.id', '=' ,$id)->with( array('colloque_prices', 'users' ))->get()->first();
	}
	
	public function getEvent($event){
		
		return $this->inscription
					->join('users','users.id','=','colloque_inscriptions.user_id')
					->join('adresses','users.id','=','adresses.user_id')
					->join('colloque_prices','colloque_prices.id','=','colloque_inscriptions.colloque_price_id')
					->where('colloque_inscriptions.colloque_id', '=' ,$event)
					->where('adresses.type', '=' ,1)
					->get();
	}
	
	public function getForUser($user){
					
		return $this->inscription->where('user_id', '=' ,$user)->with( array('colloque_prices','users' ,'colloques') )->get();
	}

    public function newNumber($inscrits,$colloque_id){

        $inscrits = $inscrits + 1;
        $year     = date('Y');

        return $colloque_id.'-'.$year.'/'.$inscrits;
    }

	public function create(array $data){
		
		// Create the article
		$inscription = $this->inscription->create(array(
			'colloque_id'       => $data['colloque_id'],
			'user_id'           => $data['user_id'],
			'colloque_price_id' => $data['colloque_price_id'],
			'numero'            => $data['numero'],
            'created_at'        => date('Y-m-d G:i:s'),
            'updated_at'        => date('Y-m-d G:i:s')
		));
		
		if( ! $inscription )
		{
			return false;
		}

        // Raise event when new inscription is created
        $inscription->raise(new InscriptionWasCreated($inscription));
		
		return $inscription;
	}
	
	public function update(array $data){
		
		$inscription = $this->inscription->find($data['id']);
		
		if( ! $inscription )
		{
			return false;
		}

		$inscription->user_id            = $data['user_id'];
		$inscription->colloque_id        = $data['colloque_id'];
		$inscription->colloque_price_id  = $data['colloque_price_id'];
		$inscription->updated_at         = date('Y-m-d G:i:s');

		$inscription->save();

        // Raise event when new inscription is created
        $inscription->raise(new InscriptionWasUpdated($inscription));
		
		return $inscription;

	}
	
}