<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Event_files extends BaseModel {

	protected $guarded   = array('id');
	
	/*
	 * Validation rules
	*/	
	protected static $rules = array(
		'typeFile' => 'required',
		'event_id' => 'integer|required'
	);
	
	/*
	 * Validation messages
	*/
	protected static $messages = array(
		'typeFile.required' => 'Le type est obligatoire',
		'event_id.required' => 'L\'id du colloque est obligatoire'
	);
	
	public $timestamps = false;
	
	public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
	
}
