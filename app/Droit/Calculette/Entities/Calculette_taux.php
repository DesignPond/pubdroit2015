<?php namespace Droit\Calculette\Entities;

use Droit\Common\BaseModel as BaseModel;

class Calculette_taux extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $table = 'calculette_taux';
	
}
