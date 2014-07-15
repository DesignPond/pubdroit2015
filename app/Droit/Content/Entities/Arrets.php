<?php

class Arrets extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $dates = array('pub_date');
	
	protected $table = 'ba_arrets';
	
	public function arrets_categories()
    {     
        return $this->belongsToMany('BaCategories', 'ba_arrets_categories', 'arret_id', 'categorie_id');
    }

	public function arrets_analyses()
    {     
        return $this->belongsToMany('Analyses', 'ba_analyses_arrets', 'analyse_id', 'arret_id');
    }
    
}
