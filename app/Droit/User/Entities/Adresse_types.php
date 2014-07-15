<?php namespace Droit\User\Entities;

use Eloquent;

class Adresse_types extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;

}
