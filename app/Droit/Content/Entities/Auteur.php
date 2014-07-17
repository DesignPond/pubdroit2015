<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Auteur extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'bs_authors';
	
}