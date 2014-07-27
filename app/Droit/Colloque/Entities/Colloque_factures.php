<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_factures extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	
	public function colloque_prices(){
    	
    	return $this->belongsTo('colloque_prices', 'colloque_price_id');
 	}
 	
    public function colloque()
    {
        return $this->belongsTo('Colloques', 'colloque_id');
    }
    
    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }  
    
}
