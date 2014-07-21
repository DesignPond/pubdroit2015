<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class Professions extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titreProfession' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titreProfession.required' => 'Le champs titre est requis'
    );

}
