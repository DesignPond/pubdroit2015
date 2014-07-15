<?php namespace Droit\User\Entities;

use Eloquent;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
	protected $fillable  = array('prenom', 'nom', 'username' , 'email' ,'password' , 'activated');

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
	* Get the addresses for user
	*
	* @return object
	*/
	public function adresses() 
	{
		return $this->hasMany('Adresses' ,'user_id'); 
	}
		
	/**
	* Get all inscriptions for user
	*/	
	public function inscription(){
		
		return $this->hasMany('Inscriptions' ,'user_id'); 
	}

	/**
	* Get group for user
	*/	    
	public function groups() 
	{
		return $this->belongsToMany('Groups', 'users_groups', 'user_id', 'group_id');
	}

}
