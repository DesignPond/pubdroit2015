<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class Cantons extends BaseModel {
	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
}
