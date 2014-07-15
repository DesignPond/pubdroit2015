<?php

class Analyses extends Eloquent {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $dates = array('pub_date');
	
	protected $table = 'ba_analyses';
	
	public function analyses_categories()
    {     
        return $this->belongsToMany('BaCategories', 'ba_analyses_categories', 'categorie_id', 'analyse_id');
    }
    
	public function arrets_analyses()
    {     
        return $this->belongsToMany('Arrets', 'ba_analyses_arrets', 'analyse_id', 'arret_id');
    }

	public function analyses_arrets()
    {     
        return $this->belongsToMany('Arrets', 'ba_analyses_arrets', 'arret_id', 'analyse_id');
    }
    
}
