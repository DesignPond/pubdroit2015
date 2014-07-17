<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Event_specialisations extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
 
}
