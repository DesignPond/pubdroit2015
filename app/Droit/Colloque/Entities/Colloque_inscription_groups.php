<?php namespace Droit\Inscriptions\Entities;

use Droit\Common\BaseModel as BaseModel;

class Inscription_groups extends BaseModel {

    protected $guarded   = array('id');
    public static $rules = array();
    public $timestamps   = false;

    public function users()
    {
        return $this->belongsTo('Droit\User\Entities\User', 'user_id');
    }

}
