<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Analyses_categories extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'categories_ba_analyses';
}