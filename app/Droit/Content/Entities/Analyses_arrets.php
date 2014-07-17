<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Analyses_arrets extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'arrets_ba_analyses';
}