<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Invoices extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $dates     = array('payed_at');
	
	
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
