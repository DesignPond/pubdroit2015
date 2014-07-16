<?php namespace Droit\Content\Entities;

use Eloquent;

class BaCategories extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $table = 'ba_categories';
}
