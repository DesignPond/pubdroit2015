<?php namespace Droit\Event\Entities;

use Eloquent;

class Event_emails extends Eloquent {

	protected $guarded   = array();
	public $timestamps   = false;
	public static $rules = array();
	
}
