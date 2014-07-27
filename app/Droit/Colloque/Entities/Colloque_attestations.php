<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_attestations extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'lieu'         => 'required',
        'organisateur' => 'required',
        'signature'    => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'lieu.required'         => 'Le champs lieu est requis',
        'organisateur.required' => 'Le champs organisateur est requis',
        'signature.required'    => 'Le champs signature est requis'
    );

}
