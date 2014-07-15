<?php

class Event_config extends Eloquent {
	
	protected $table     = 'event_config';
	protected $guarded   = array('id');
	public $timestamps   = false;
	public static $rules = array();
}
