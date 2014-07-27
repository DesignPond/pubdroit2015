<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class Groups extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	
}
