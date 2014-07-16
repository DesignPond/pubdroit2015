<?php namespace Droit\Content\Entities;

use Eloquent;

class Analyses_arrets extends \Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'ba_analyses_arrets';
}