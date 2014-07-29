<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_option_users extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'colloque_option_id' => 'required',
        'user_id' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'colloque_option_id.required' => 'Le champs titre est requis',
        'user_id.required'            => 'Le champs user est requis'
    );

}
