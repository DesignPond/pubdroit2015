<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Seminaires extends BaseModel {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $table = 'bs_seminaires';
    
	public function seminaires_subjects()
    {     
        return $this->belongsToMany('Subjects', 'seminaires_bs_subjects', 'seminaires_id', 'subject_id');
    }
    
}
