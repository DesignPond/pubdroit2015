<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_factures extends BaseModel {

	protected $guarded   = array('id');

    protected $dates = array('created_at','payed_at');

    /**
     * Validation rules for facture creation
     *
     * @var array
     */
    protected static $rules = array(
        'colloque_id'       => 'required',
        'user_id'           => 'required',
        'colloque_price_id' => 'required',
        'numero'            => 'required'
    );

    /**
     * Validation messages for facture creation
     *
     * @var array
     */
    protected static $messages = array(
        'colloque_id.required'       => 'L\'id du colloque est requis',
        'user_id.required'           => 'L\'id de l\'utilisateur est requis',
        'colloque_price_id.required' => 'L\'id du prix est requis',
        'numero.required'            => 'Le numéro d\'inscription est requis'
    );

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
