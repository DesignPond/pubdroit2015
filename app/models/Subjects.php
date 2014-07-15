<?php

class Subjects extends Eloquent {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $table = 'bs_subjects'; 
    
	public function subjects_categories()
    {     
        return $this->belongsToMany('BsCategories', 'bs_subjects_category', 'subject_id', 'category_id');
    } 

	public function subjects_authors()
    {     
        return $this->belongsToMany('Authors', 'bs_subjects_authors', 'subject_id', 'author_id');
    } 
    
	public function subjects_seminaires()
    {     
        return $this->belongsToMany('Seminaires', 'bs_seminaires_subjects', 'seminaire_id', 'subject_id');
    } 
    
}
