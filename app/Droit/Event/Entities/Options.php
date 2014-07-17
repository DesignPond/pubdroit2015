<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Options extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
}
