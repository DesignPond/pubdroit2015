<?php namespace Droit\Content\Entities;

use Eloquent;

class Arrets extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	protected $dates = array('pub_date');
	
	protected $table = 'ba_arrets';
	
	public function arrets_categories()
    {     
        //return $this->belongsToMany('BaCategories', 'ba_arrets_categories', 'arret_id', 'categorie_id');
        return $this->belongsToMany('Droit\Content\Entities\BaCategories', 'arrets_ba_categories','id','ba_categories_id');
    }

	public function arrets_analyses()
    {     
        return $this->belongsToMany('Droit\Content\Entities\Analyses', 'arrets_ba_analyses', 'id', 'ba_analyses_id');
    }
    
}
