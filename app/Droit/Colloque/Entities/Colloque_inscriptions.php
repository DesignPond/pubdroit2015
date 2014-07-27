<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloque_inscriptions extends BaseModel {

	protected $guarded   = array('id');

    /**
     * Validation rules for event creation
     *
     * @var array
     */
    protected static $rules = array(
        'event_id'  => 'required',
        'user_id'   => 'required',
        'prix_id'   => 'required',
        'numero '   => 'required'
    );

    protected static $messages = array(
        'event_id.required'  => 'L\'id du colloque est requis',
        'user_id.required'   => 'L\'id de l\'utilisateur est requis',
        'prix_id.required'   => 'L\'id du prix est requis',
        'numero.required'    => 'Le numéro d\'inscription est requis'
    );

    public function colloques()
    {
        return $this->belongsTo('Droit\Colloque\Entities\Colloques', 'colloque_id');
    }
    
    public function users()
    {
        return $this->belongsTo('Droit\User\Entities\User', 'user_id');
    }

    public function colloque_prices(){

        return $this->belongsTo('Droit\Colloque\Entities\Colloque_prices', 'colloque_price_id');
    }

}
