<?php namespace Droit\Event\Entities;

use Eloquent;

class Event_specialisations extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
 
}
