<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class BsCategories extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $table = 'bs_categories';
}
