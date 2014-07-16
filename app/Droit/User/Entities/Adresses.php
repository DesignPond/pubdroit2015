<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Adresses extends BaseModel {

	use SoftDeletingTrait;

	protected $guarded   = array('id');
	
    protected static $rules = array(
        'civilite'   => 'required',
		'prenom'     => 'required',
		'nom'        => 'required',
		'email'      => 'required',
		'profession' => 'required',
		'adresse'    => 'required',
		'npa'        => 'required',
		'ville'      => 'required',
		'pays'       => 'required',
		'type'       => 'required'
    );

    protected static $messages = array(
        'civilite.required'   => 'Le champ civilité est requis',
		'prenom.required'     => 'Le champ prénom est requis',
		'nom.required'        => 'Le champ nom est requis',
		'email.required'      => 'Le champ email est requis',
		'profession.required' => 'Le champ profession est requis',
		'adresse.required'    => 'Le champ adresse est requis',
		'npa.required'        => 'Le champ npa est requis',
		'ville.required'      => 'Le champ ville est requis',
		'pays.required'       => 'Le champ pays est requis',
		'type.required'       => 'Le champ type d\'adresse est requis'
    );
	
	/**
	* Activate soft delete
	*
	* @var boolean
	*/	
	protected $dates = ['deleted_at'];
	
		
	public function membres(){
    	
    	return $this->belongsToMany('Droit\User\Entities\Membres', 'user_membres', 'membre_id', 'adresse_id')->withPivot('id');
 	}
 	
	public function specialisations(){

    	return $this->belongsToMany('Droit\User\Entities\Specialisations', 'user_specialisations', 'specialisation_id', 'adresse_id')->withPivot('id');
 	}
 	
	public function user()
    {
        return $this->belongsTo('Droit\User\Entities\User','user_id');
    }
}
