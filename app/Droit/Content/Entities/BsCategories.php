<?php namespace Droit\Content\Entities;

use Eloquent;

class BsCategories extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $table = 'bs_categories';
}
