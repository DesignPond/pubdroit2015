<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Authors extends BaseModel {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $table = 'bs_authors';	
    
}
