<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

class User_specialisations extends BaseModel {

	protected $guarded   = array('id');

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titre'      => 'required',
        'adresse_id' => 'required|not_in:0'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titre.required' => 'Le champs titre est requis',
        'adresse_id'     => 'Veuillez créer un adresse pour l\'utilisateur d\'abord'
    );

	public $timestamps   = false;
	
}
