<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Arrets extends BaseModel{

	protected $guarded   = array('id');
	
	protected $dates = array('pub_date');
	
	protected $table = 'ba_arrets';
	
	protected static $rules = array(
        'reference' => 'required',
        'pub_date'  => 'required',
        'abstract'  => 'required',
        'pub_text'  => 'required'    
    );

    protected static $messages = array(
        'reference.required' => 'Le champ référence est requis',
        'pub_date.required'  => 'Le champ date de publication est requis',
        'abstract.required'  => 'Le résumé est requis',
        'pub_text.required'  => 'Le texte est requis'
    );
	
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
