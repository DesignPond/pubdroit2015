<?php namespace Droit\Content\Entities;

use Eloquent;

class Seminaires extends Eloquent {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $table = 'bs_seminaires';
    
	public function seminaires_subjects()
    {     
        return $this->belongsToMany('Subjects', 'bs_seminaires_subjects', 'seminaire_id', 'subject_id');
    }
    
}
