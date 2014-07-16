<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Events extends BaseModel{

	/*
	 * Fields guarded
	*/	
	protected $guarded   = array('id');
			
	/*
	 * Validation rules
	*/	
	protected static $rules = array(
		'organisateur'   => 'required',
		'titre'          => 'required',
		'sujet'          => 'required',
		'endroit'        => 'required',
		'dateDebut'      => 'required|date_format:Y-m-d',
		'dateDelai'      => 'required|date_format:Y-m-d'
	);
	
	/*
	 * Validation messages
	*/
	protected static $messages = array(
		'organisateur.required'   => 'Le champ organisateur est requis',
		'titre.required'          => 'Le champ titre est requis',
		'sujet.required'          => 'Le champ sujet est requis',
		'endroit.required'        => 'Le champ endroit est requis',
		'dateDebut.required'      => 'Le champ date de début est requis',
		'dateDelai.required'      => 'Le champ délai d\'inscription est requis'
	);
	
	
	
	public function compte()
    {
        return $this->hasOne('Droit\Event\Entities\Compte');
    }
    
    public function prices(){
    	
    	return $this->hasMany('Droit\Event\Entities\Prices', 'event_id');
 	}
 	
    public function event_options()
    {
        return $this->hasMany('Droit\Event\Entities\Event_options', 'event_id');
    }
    
    public function event_specialisations()
    {     
        return $this->belongsToMany('Droit\User\Entities\Specialisations', 'event_specialisations', 'event_id', 'specialisation_id')->withPivot(array('id'));
    }
 	
    public function files(){
    	
    	return $this->hasMany('Droit\Event\Entities\Event_files', 'event_id');
 	}
 	
 	public function event_config(){
 	
	 	return $this->hasOne('Droit\Event\Entities\Event_config', 'event_id');
 	}
 	
	public function emails(){
	
		return $this->hasOne('Droit\Event\Entities\Event_emails', 'event_id');
	}
 	
	public function emailDefaut(){
	
		return $this->hasOne('Droit\Event\Entities\Event_emails', 'event_id');
	}
		
	public function attestation(){
		
		return $this->hasOne('Droit\Event\Entities\Event_attestations', 'event_id');
	}
	
}
