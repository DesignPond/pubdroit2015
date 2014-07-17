<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Event_config extends BaseModel {
	
	protected $table     = 'event_config';
	protected $guarded   = array('id');
	public $timestamps   = false;
	public static $rules = array();
}
