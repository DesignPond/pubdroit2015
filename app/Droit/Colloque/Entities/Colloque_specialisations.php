<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_specialisations extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'specialisation_id' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'specialisation_id.required' => 'Le champs spécialisation est requis'
    );

    /**
     * Options for event
     *
     * @var collection
     */
    public function colloque_options()
    {
        return $this->belongsTo('Colloques', 'colloque_id');
    }
 
}
