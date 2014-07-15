<?php namespace Droit\User\Entities;

use Eloquent;

class Event_options_user extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'event_option_user';	
				
    public function user_options()
    {     
        return $this->belongsTo('Users', 'user_id');
    }
    
    public function event_options()
    {     
        return $this->belongsTo('Event_options', 'event_option_id');
    }
	
}
