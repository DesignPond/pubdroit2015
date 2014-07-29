<?php namespace Droit\Colloque\Entities;

use Droit\Common\BaseModel as BaseModel;

class Colloques extends BaseModel{

    /**
     * Fields guarded
     *
     * @var array
     */
	protected $guarded   = array('id');

    /**
     * Validation rules for colloque creation
     *
     * @var array
     */
    protected static  $rules = array(
        'organisateur'   => 'required',
        'titre'          => 'required',
        'sujet'          => 'required',
        'endroit'        => 'required',
        'dateDebut'      => 'required|date_format:Y-m-d',
        'dateDelai'      => 'required|date_format:Y-m-d',
        'compte_id'      => 'required_if:type,1|required_if:type,2'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'organisateur.required'   => 'Le champ organisateur est requis',
        'titre.required'          => 'Le champ titre est requis',
        'sujet.required'          => 'Le champ sujet est requis',
        'endroit.required'        => 'Le champ endroit est requis',
        'dateDebut.required'      => 'Le champ date de début est requis',
        'dateDelai.required'      => 'Le champ délai d\'inscription est requis',
        'compte_id.required_if'   => 'Un numéro de compte doit être indiqué pour la facture'
    );

    public function compte()
    {
        return $this->hasOne('Droit\Colloque\Entities\Compte');
    }
    
    public function colloque_prices(){
    	
    	return $this->hasMany('Droit\Colloque\Entities\Colloque_prices', 'colloque_id');
 	}
    
    public function colloque_specialisations()
    {     
        return $this->belongsToMany('Droit\User\Entities\Specialisations', 'colloque_specialisations', 'colloque_id', 'specialisation_id')->withPivot(array('id'));
    }
 	
    public function colloque_files(){
    	
    	return $this->hasMany('Droit\Colloque\Entities\Colloque_files', 'colloque_id');
 	}
 	
 	public function colloque_config(){
 	
	 	return $this->hasMany('Droit\Colloque\Entities\Colloque_config', 'colloque_id');
 	}
 	
	public function colloque_emails(){
	
		return $this->hasOne('Droit\Colloque\Entities\Colloque_emails', 'colloque_id');
	}
		
	public function colloque_attestations(){
		
		return $this->hasOne('Droit\Colloque\Entities\Colloque_attestations', 'colloque_id');
	}

    public function colloque_compte()
    {
        return $this->belongsTo('Droit\Colloque\Entities\Comptes', 'compte_id', 'id');
    }

    public function colloque_options()
    {
        return $this->hasMany('Droit\Colloque\Entities\Colloque_options', 'colloque_id', 'id');
    }
	
}
