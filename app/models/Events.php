<?php

class Events extends Eloquent {

	protected $guarded   = array('id');
	//protected $dates     = array('dateDebut','dateFin','dateDelai');
	public static $rules = array();
	
	public function compte()
    {
        return $this->hasOne('Compte');
    }
    
    public function prices(){
    	
    	return $this->hasMany('Prices', 'event_id');
 	}
 	
    public function event_options()
    {
        return $this->hasMany('Event_options', 'event_id');
    }
    
    public function event_specialisations()
    {     
        return $this->belongsToMany('Specialisations', 'event_specialisations', 'event_id', 'specialisation_id')->withPivot(array('id'));
    }
 	
    public function files(){
    	
    	return $this->hasMany('Files', 'event_id');
 	}
 	
 	public function event_config(){
 	
	 	return $this->hasOne('Event_config', 'event_id');
 	}
 	
	public function emails(){
	
		return $this->hasOne('Event_emails', 'event_id');
	}
 	
	public function emailDefaut(){
	
		return $this->hasOne('Event_emails', 'event_id');
	}
		
	public function attestation(){
		
		return $this->hasOne('Event_attestations', 'event_id');
	}
	
}
