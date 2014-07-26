<?php namespace Droit\User\Entities;

use Droit\Common\BaseModel as BaseModel;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Columns guarded
	 */	
	protected $guarded   = array('id');

	/**
	 * Columns fillable
	 */	
	protected $fillable  = array('prenom', 'nom' , 'email' ,'password', 'activated');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/**
	* Activate soft delete
	*
	* @var boolean
	*/	
	protected $dates = ['deleted_at'];

    /**
     * Validation rules for event creation
     *
     * @var array
     */
    protected static $rules = array(
        'prenom'                => 'required',
        'nom'                   => 'required',
        'email'                 => 'required|email',
        'password'              => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'email.required'     => 'Le champ email est requis',
        'email.unique'       => 'Cet email est déjà utilisé',
        'email.email'        => 'Merci d\'indiquer un email valide',
        'prenom.required'    => 'Le champ prénom est requis',
        'nom.required'       => 'Le champ nom est requis',
        'password.required'  => 'Le champ mot de passe est requis',
        'password.confirmed' => 'Le mot de passe ne correspond pas'
    );

	/**
	* Get the addresses for user
	*
	* @return object
	*/
	public function adresses() 
	{
		return $this->hasMany('Droit\User\Entities\Adresses' ,'user_id'); 
	}
		
	/**
	* Get all inscriptions for user
	*/	
	public function inscription(){
		
		return $this->hasMany('Droit\Event\Entities\Inscriptions' ,'user_id'); 
	}

	/**
	* Get group for user
	*/	    
/*
	public function groups() 
	{
		return $this->belongsToMany('Groups', 'users_groups', 'user_id', 'group_id');
	}
*/

}
