<?php

class Calculette_ipc extends Eloquent { 

	protected $guarded   = array('id');
	public static $rules = array(); 
	public $timestamps   = false;
	
	protected $table = 'calculette_ipc';
	
}
