<?php namespace Droit\User\Entities;

use Eloquent;

class User_membres extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	
}
