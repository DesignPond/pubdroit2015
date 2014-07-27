<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_config extends BaseModel {
	
	protected $table     = 'colloque_config';
	protected $guarded   = array('id');
	public $timestamps   = false;
	public static $rules = array();
}
