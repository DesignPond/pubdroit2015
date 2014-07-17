<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Analyses extends BaseModel {

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
        return $this->belongsToMany('Droit\Content\Entities\Arrets', 'arrets_ba_analyses', 'ba_analyses_id', 'arrets_id');
    }

	public function analyses_arrets()
    {     
        return $this->belongsToMany('Droit\Content\Entities\Arrets', 'arrets_ba_analyses', 'arrets_id', 'ba_analyses_id');
    }
    
}
