<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_files extends BaseModel {

	protected $guarded   = array('id');
	
	/*
	 * Validation rules
	*/	
	protected static $rules = array(
		'type'        => 'required',
		'colloque_id' => 'integer|required'
	);
	
	/*
	 * Validation messages
	*/
	protected static $messages = array(
		'type.required'        => 'Le type est obligatoire',
		'colloque_id.required' => 'L\'id du colloque est obligatoire'
	);
	
	public $timestamps = false;
	
	public function colloque()
    {
        return $this->belongsTo('colloques', 'colloque_id');
    }
	
}
