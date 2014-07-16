<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Inscriptions extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $dates     = array('inscription_at');
	
	public function prices(){
    	
    	return $this->belongsTo('Droit\Event\Entities\Prices', 'price_id');
 	}
 	
    public function event()
    {
        return $this->belongsTo('Droit\Event\Entities\Events', 'event_id');
    }
    
    public function users()
    {
        return $this->belongsTo('Droit\User\Entities\User', 'user_id');
    } 

}
