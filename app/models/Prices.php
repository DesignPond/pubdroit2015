<?php

class Prices extends Eloquent {

	protected $guarded   = array('id');
	public $timestamps   = false;

	public static $rules = array();
	
	public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
}
