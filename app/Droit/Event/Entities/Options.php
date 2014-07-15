<?php namespace Droit\Event\Entities;

use Eloquent;

class Options extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
}
