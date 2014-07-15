<?php 
/**
 * Service provider for common tasks
 */
 
namespace Droit;

use Illuminate\Support\ServiceProvider;

use Files as F;

/**
 *  DroitServiceProvider
 */
class DroitServiceProvider extends ServiceProvider {

	/**
	 * Register binding interface to implementation 
	 */
    public function register()
    {         	
		$this->registerFileService();
		$this->registerUploadService();	
		$this->registerGenerateService();
		$this->registerSearchService();
    }

	/**
	 * File service
	 */      
    protected function registerFileService(){

	    $this->app->bind('Droit\Repo\File\FileInterface', function()
        {
            return new \Droit\Repo\File\FileEloquent( new F );
        });        
    }

	/**
	 * Upload service
	 */     
    protected function registerUploadService(){
    
	    $this->app->bind('Droit\Service\Upload\UploadInterface', function()
        {
            return new \Droit\Service\Upload\UploadWorker();
        });        
    }

	/**
	 * Generate service
	 */  	        
    protected function registerGenerateService(){

	    $this->app->bind('Droit\Service\Generate\GenerateInterface', function()
        {
            return new \Droit\Service\Generate\GenerateWorker( 
            	\App::make('Droit\Repo\Price\PriceInterface') , 
            	\App::make('Droit\Repo\Compte\CompteInterface') , 
            	\App::make('Droit\Repo\File\FileInterface') ,
            	\App::make('Droit\Repo\User\UserInfoInterface')
            );
        });        
    }

	/**
	 * Search service
	 */      
    protected function registerSearchService(){
    
	    $this->app->bind('Droit\Repo\Search\SearchInterface', function()
        {
            return new \Droit\Repo\Search\SearchEloquent( \App::make('Droit\Repo\User\UserInfoInterface') , \App::make('Droit\Repo\Adresse\AdresseInterface') );
        });       
    } 
    
}