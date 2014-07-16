<?php namespace Droit\Content\Entities;

use Eloquent;

class Analyses extends Eloquent {

	protected $guarded   = array();
	public static $rules = array();
	
	protected $dates = array('pub_date');
	
	protected $table = 'ba_analyses';
	
	public function analyses_categories()
    {     
        return $this->belongsToMany('Droit\Content\Entities\BaCategories', 'arrets_ba_categories','id','ba_categories_id');
    }
    
	public function arrets_analyses()
    {     
        return $this->belongsToMany('Droit\Content\Entities\Arrets', 'ba_analyses_arrets', 'analyse_id', 'arret_id');
    }

	public function analyses_arrets()
    {     
        return $this->belongsToMany('Droit\Content\Entities\Arrets', 'ba_analyses_arrets', 'arret_id', 'analyse_id');
    }
    
}
