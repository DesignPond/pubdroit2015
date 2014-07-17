<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Event_options extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;	
    
	public function event_options()
    {
        return $this->belongsTo('Events', 'event_id');
    }
      
}
