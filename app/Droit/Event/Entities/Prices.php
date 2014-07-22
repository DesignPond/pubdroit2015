<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Prices extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'remarquePrice' => 'required',
        'price'         => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'remarquePrice.required' => 'Le champs titre est requis',
        'price.required'         => 'Le champs prix est requis'
    );
	
	public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
}
