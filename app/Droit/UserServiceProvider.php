<?php 
/**
 * Service provider for users and addresses
 */
 
namespace Droit;

use Illuminate\Support\ServiceProvider;

use User as User;
use Adresses as AD;
use Specialisations as S;
use Membres as M;
use Professions as P;
use User_specialisations as US;
use User_membres as UM;

/**
 *  UserServiceProvider
 */
class UserServiceProvider extends ServiceProvider {

	/**
	 * Register binding interface to implementation 
	 */
    public function register()
    {   
        $this->registerUserService();
    	$this->registerAdresseService();      	
    	$this->registerSpecialisationService();	
    	$this->registerMembreService();
    	$this->registerProfessionService();		
    	$this->registerUserSpecialisationService();
    	$this->registerUserMembreService();   			
    }
    
	/**
	 * Users service
	 */    
    protected function registerUserService(){
    
	    $this->app->bind('Droit\Repo\User\UserInfoInterface', function()
        {
            return new \Droit\Repo\User\UserInfoEloquent( new User );
        });       
    }  
      
	/**
	 * Adresses service
	 */    
    protected function registerAdresseService(){
    
	    $this->app->bind('Droit\Repo\Adresse\AdresseInterface', function()
        {
            return new \Droit\Repo\Adresse\AdresseEloquent( new AD );
        });       
    } 
      
	/**
	 * Specialisations service
	 */     
    protected function registerSpecialisationService(){
    
	    $this->app->bind('Droit\Repo\Specialisation\SpecialisationInterface', function()
        {
            return new \Droit\Repo\Specialisation\SpecialisationEloquent( new S );
        });        
    } 
      
	/**
	 * Membres service
	 */     
    public function registerMembreService(){
		
		$this->app->bind('Droit\Repo\Membre\MembreInterface', function()
        {
            return new \Droit\Repo\Membre\MembreEloquent( new M );
        });
        
	}
      
	/**
	 * Professions service
	 */     
    public function registerProfessionService(){
		
		$this->app->bind('Droit\Repo\Profession\ProfessionInterface', function()
        {
            return new \Droit\Repo\Profession\ProfessionEloquent( new P );
        });
        
	}		
      
	/**
	 * User Specialisation service
	 */ 
    protected function registerUserSpecialisationService(){

	    $this->app->bind('Droit\Repo\UserSpecialisation\UserSpecialisationInterface', function()
        {
            return new \Droit\Repo\UserSpecialisation\UserSpecialisationEloquent( new US );
        });
        
    }
       
	/**
	 * User Membre service
	 */    
    protected function registerUserMembreService(){

	    $this->app->bind('Droit\Repo\UserMembre\UserMembreInterface', function()
        {
            return new \Droit\Repo\UserMembre\UserMembreEloquent( new UM );
        });
        
    }    
}