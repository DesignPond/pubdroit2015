<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class Specialisations extends BaseModel {

	protected $guarded   = array();
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titre' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titre.required' => 'Le champs titre est requis'
    );
}
