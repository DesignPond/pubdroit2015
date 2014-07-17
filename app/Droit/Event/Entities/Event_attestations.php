<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Event_attestations extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;
	public static $rules = array();
}
