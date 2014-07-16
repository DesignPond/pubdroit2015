<?php namespace Droit\Content\Entities;

use Eloquent;

class Authors extends Eloquent {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $table = 'bs_authors';	
    
}
