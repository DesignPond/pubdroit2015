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
        'titreSpecialisation' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titreSpecialisation.required' => 'Le champs titre est requis'
    );
}
