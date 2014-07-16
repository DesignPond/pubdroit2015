<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Event_emails extends BaseModel {

	protected $guarded   = array();
	public $timestamps   = false;
			
	/*
	 * Validation rules
	*/		
	protected static $rules = array(
        'message' => 'required'
    );
    
	/*
	 * Validation messages
	*/
    protected static $messages = array(
        'message.required' => 'Le champs message est requis'
    );
	
}
