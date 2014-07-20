<?php namespace Droit\Event\Entities;

use Eloquent;

class Events extends Eloquent{

	/*
	 * Fields guarded
	*/	
	protected $guarded   = array('id');
	
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
