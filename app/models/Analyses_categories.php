<?php

class Arrets_categories extends \Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'ba_arrets_categories';
}