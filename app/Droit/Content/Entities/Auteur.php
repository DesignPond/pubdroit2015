<?php namespace Droit\Content\Entities;

use Eloquent;

class Auteur extends \Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'bs_authors';
	
}