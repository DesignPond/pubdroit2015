<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_options_user extends BaseModel {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	protected $table     = 'colloque_option_user';	
				
    public function user_options()
    {     
        return $this->belongsTo('Users', 'user_id');
    }
    
    public function colloque_options()
    {     
        return $this->belongsTo('Colloque_options', 'colloque_option_id');
    }
	
}
