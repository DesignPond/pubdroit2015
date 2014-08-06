<?php namespace Droit\Calculette\Entities;

use Droit\Common\BaseModel as BaseModel;

class Calculette_ipc extends BaseModel { 

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $table = 'calculette_ipc';
	
}
