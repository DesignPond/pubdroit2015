<?php

class Inscriptions extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $dates     = array('inscription_at');
	
	public function prices(){
    	
    	return $this->belongsTo('Prices', 'price_id');
 	}
 	
    public function event()
    {
        return $this->belongsTo('Events', 'event_id');
    }
    
    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    } 

}
