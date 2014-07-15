<?php namespace Droit\User\Entities;

use Eloquent;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Adresses extends Eloquent {

	use SoftDeletingTrait;

	protected $guarded   = array('id');
	public static $rules = array();
	
	/**
	* Activate soft delete
	*
	* @var boolean
	*/	
	protected $dates = ['deleted_at'];
	
		
	public function membres(){
    	
    	return $this->belongsToMany('Membres', 'user_membres', 'membre_id', 'adresse_id')->withPivot('id');
 	}
 	
	public function specialisations(){

    	return $this->belongsToMany('Specialisations', 'user_specialisations', 'specialisation_id', 'adresse_id')->withPivot('id');
 	}
 	
	public function user()
    {
        return $this->belongsTo('User','user_id');
    }
}
