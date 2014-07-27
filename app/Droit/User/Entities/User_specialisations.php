<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class User_specialisations extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	
}
