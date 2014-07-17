<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Prices extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

	public static $rules = array();
	
	public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
}
