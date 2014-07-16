<?php 
/**
 * Service provider for users and addresses
 */
 
namespace Droit\User;

use Illuminate\Support\ServiceProvider;

use Droit\User\Entities\User as User;
use Droit\User\Entities\Adresses as AD;
use Droit\User\Entities\Professions as P;
use Droit\User\Entities\User_specialisations as US;
use Droit\User\Entities\User_membres as UM;
use Droit\User\Entities\Specialisations as S;
use Droit\User\Entities\Membres as M;

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
    	$this->registerProfessionService();		
    	$this->registerUserSpecialisationService();
    	$this->registerUserMembreService();
    	$this->registerSpecialisationService();	
    	$this->registerMembreService();			
    }
    
	/**
	 * Users service
	 */    
    protected function registerUserService(){
    
	    $this->app->bind('Droit\User\Repo\UserInfoInterface', function()
        {
            return new \Droit\User\Repo\UserInfoEloquent( new User );
        });       
    }  
      
	/**
	 * Adresses service
	 */    
    protected function registerAdresseService(){
    
	    $this->app->bind('Droit\User\Repo\AdresseInterface', function()
        {
            return new \Droit\User\Repo\AdresseEloquent( new AD );
        });       
    } 
      
	/**
	 * Professions service
	 */     
    public function registerProfessionService(){
		
		$this->app->bind('Droit\User\Repo\ProfessionInterface', function()
        {
            return new \Droit\User\Repo\ProfessionEloquent( new P );
        });
        
	}		
      
	/**
	 * User Specialisation service
	 */ 
    protected function registerUserSpecialisationService(){

	    $this->app->bind('Droit\User\Repo\UserSpecialisationInterface', function()
        {
            return new \Droit\User\Repo\UserSpecialisationEloquent( new US );
        });
        
    }
       
	/**
	 * User Membre service
	 */    
    protected function registerUserMembreService(){

	    $this->app->bind('Droit\User\Repo\UserMembreInterface', function()
        {
            return new \Droit\User\Repo\UserMembreEloquent( new UM );
        });
        
    } 
    
	/**
	 * Specialisations service
	 */     
    protected function registerSpecialisationService(){
    
	    $this->app->bind('Droit\User\Repo\SpecialisationInterface', function()
        {
            return new \Droit\User\Repo\SpecialisationEloquent( new S );
        });        
    } 
      
	/**
	 * Membres service
	 */     
    public function registerMembreService(){
		
		$this->app->bind('Droit\User\Repo\MembreInterface', function()
        {
            return new \Droit\User\Repo\MembreEloquent( new M );
        });
        
	}   
}