<?php namespace Droit\Colloque\Repo;

use Droit\Colloque\Repo\ColloqueInterface;
use Droit\Colloque\Entities\Colloques as Colloques;
use Droit\Colloque\Entities\Colloque_emails as EM;
use Droit\Colloque\Entities\Colloque_attestations as EA;

class ColloqueEloquent implements ColloqueInterface {

	protected $colloque;
	
	protected $today;
	
	// Class expects an Eloquent model
	public function __construct(Colloques $colloque)
	{
		$this->colloque = $colloque;	
		
		$this->today = date("Y-m-d");	
	}
	
	public function getLast($nbr){
	
		return $this->colloque->orderBy('id', 'DESC')->take($nbr)->skip(0)->get();	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getActifs(){
		
		return $this->colloque->where('dateDebut','>=',$this->today)->get();		
	}
	
		
	public function getArchives(){
		
		return $this->colloque->where('dateDebut','<',$this->today)->get();		
	}
		
	public function find($id){
		
		return $this->colloque->with( array('colloque_attestations','colloque_emails','colloque_prices'=> function($query)
            {
                $query->orderBy('colloque_prices.rang');
            }, 'colloque_options','colloque_specialisations','colloque_files','colloque_config','colloque_compte') )
            ->findOrFail($id);
	}
	
	public function create(array $data){

		$colloque = $this->colloque->create(array(
			'organisateur' => $data['organisateur'],
			'titre'        => $data['titre'],
			'soustitre'    => $data['soustitre'],
			'sujet'        => $data['sujet'],
			'endroit'      => $data['endroit'],
			'dateDebut'    => $data['dateDebut'],
			'dateFin'      => $data['dateFin'],
			'dateDelai'    => $data['dateDelai'],
			'remarques'    => $data['remarques']
		));
		
		if( ! $colloque )
		{
			return false;
		}
		
		return $colloque;

	}
	
	public function update(array $data){
		
		$colloque = $this->colloque->findOrFail($data['id']);	
		
		if( ! $colloque )
		{
			return false;
		}
		
		// Général
		$colloque->organisateur = $data['organisateur'];
		$colloque->titre        = $data['titre'];
		$colloque->soustitre    = $data['soustitre'];
		$colloque->sujet        = $data['sujet'];
		$colloque->endroit      = $data['endroit'];
		$colloque->dateDebut    = $data['dateDebut'];
		$colloque->dateFin      = $data['dateFin'];
		$colloque->dateDelai    = $data['dateDelai'];
		$colloque->remarques    = $data['remarques'];
        $colloque->type         = $data['type'];
        $colloque->compte_id    = $data['compte_id'];
        $colloque->visible      = $data['visible'];
        $colloque->centres      = ( isset($data['centres']) ? implode(',' , $data['centres']) : '');

		$colloque->save();	
		
		return $colloque;
	}

    public function addInscription($id){

        $colloque = $this->colloque->findOrFail($id);

        $colloque->inscriptions = $colloque->inscriptions + 1;

        $colloque->save();

        return $colloque;

    }

    /**
     * Attach specialisation to colloque
     *
     * @return boolean
     */
    public function addSpecialisation($specialisation,$colloque_id)
    {
        $this->colloque->find($colloque_id)->colloque_specialisations()->attach($specialisation);

        return true;
    }

    /**
     * Detach specialisation from colloque
     *
     * @return boolean
     */
    public function removeSpecialisation($specialisation,$colloque_id)
    {
        return $this->colloque->find($colloque_id)->colloque_specialisations()->detach($specialisation);
    }

	// Emails
	
	public function getEmail($type,$id){

        return EM::where('type','=',$type)->where('colloque_id', $id)->first();

	}
	
	public function createEmail($data){

        $email = EM::create(array(
            'type'        => $data['type'],
            'message'     => $data['message'],
            'colloque_id' => $data['colloque_id']
        ));

        if( ! $email )
        {
            return false;
        }

        return $email;
	}

    public function updateEmail($data){

        $email = EM::findOrFail($data['id']);

        if( ! $email )
        {
            return false;
        }

        $email->message = $data['message'];

        $email->save();

        return $email;

    }
	
	public function getAttestation($colloque){
	
		return EA::where('colloque_id','=',$colloque)->first();		
	}
	
	public function createAttestation($data){

        $attestation = EA::create(array(
            'lieu'           => $data['lieu'],
            'organisateur'   => $data['organisateur'],
            'remarque'       => $data['remarque'],
            'signature'      => $data['signature'],
            'responsabilite' => $data['responsabilite'],
            'colloque_id'    => $data['colloque_id']
        ));

        if( ! $attestation )
        {
            return false;
        }

        return true;

    }

    public function updateAttestation($data){

        $attestation = EA::findOrFail($data['id']);

        if( ! $attestation )
        {
            return false;
        }

        $attestation->lieu           = $data['lieu'];
        $attestation->organisateur   = $data['organisateur'];
        $attestation->remarque 	     = $data['remarque'];
        $attestation->signature      = $data['signature'];
        $attestation->responsabilite = $data['responsabilite'];
        $attestation->colloque_id    = $data['colloque_id'];

        $attestation->save();

        return true;

    }
	
	public function delete($id){
	
		$colloque = $this->colloque->findOrFail($id);
		
		if( ! $colloque )
		{
			return false;
		}	

		return $colloque->delete();		
	}
	
}