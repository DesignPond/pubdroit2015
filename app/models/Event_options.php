<?php

class Event_options extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;	
    
	public function event_options()
    {
        return $this->belongsTo('Events', 'event_id');
    }
      
}
