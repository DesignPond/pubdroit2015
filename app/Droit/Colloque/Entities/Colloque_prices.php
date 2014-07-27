<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_prices extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'remarque' => 'required',
        'price'    => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'remarque.required' => 'Le champs titre est requis',
        'price.required'    => 'Le champs prix est requis'
    );
	
	public function colloques()
    {
        return $this->belongsTo('colloques', 'colloque_id');
    }
}
