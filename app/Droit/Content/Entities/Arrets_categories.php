<?php namespace Droit\Content\Entities;

use Eloquent;

class Analyses_categories extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'ba_analyses_categories';
}