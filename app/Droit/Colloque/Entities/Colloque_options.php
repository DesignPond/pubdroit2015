<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_options extends BaseModel {

	protected $guarded   = array('id');
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

	public function colloque_options()
    {
        return $this->belongsTo('Colloques', 'colloque_id');
    }
      
}
