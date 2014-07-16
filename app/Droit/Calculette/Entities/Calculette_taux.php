<?php namespace Droit\Calculette\Entities;

use Eloquent;

class Calculette_taux extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	
	protected $table = 'calculette_taux';
	
}
