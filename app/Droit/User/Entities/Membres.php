<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class Membres extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titreMembre' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titreMembre.required' => 'Le champs titre est requis'
    );
}
