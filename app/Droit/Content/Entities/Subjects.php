<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Subjects extends BaseModel {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $table = 'bs_subjects'; 
    
	public function subjects_categories()
    {     
        return $this->belongsToMany('BsCategories', 'subjects_bs_category', 'subjects_id', 'category_id');
    } 

	public function subjects_authors()
    {     
        return $this->belongsToMany('Authors', 'subjects_abs_uthors', 'subjects_id', 'author_id');
    } 
    
	public function subjects_seminaires()
    {     
        return $this->belongsToMany('Seminaires', 'seminaires_bs_subjects', 'seminaires_id', 'subject_id');
    } 
    
}
