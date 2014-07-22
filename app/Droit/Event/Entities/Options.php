<?php namespace Droit\Event\Entities;

use Droit\Common\BaseModel as BaseModel;

class Options extends BaseModel {

	protected $guarded   = array('id');
	public $timestamps   = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titreOption' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titreOption.required' => 'Le champs titre est requis'
    );

    /**
     * Options for event
     *
     * @var collection
     */
    public function event_options()
    {
        return $this->belongsTo('Events', 'event_id');
    }
}
