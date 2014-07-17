<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class BaCategories extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $table = 'ba_categories';
}
