<?php 

/**
 * Service provider for Events on publications-droit.ch
 */

namespace Droit\Event;

use Illuminate\Support\ServiceProvider;

use Droit\Event\Entities\Events as E;
use Droit\Event\Entities\Inscriptions as I;
use Droit\Event\Entities\Invoices as IN;
use Droit\Event\Entities\Comptes as C;
use Droit\Event\Entities\Options as O;
use Droit\Event\Entities\Prices as PR;
use Droit\Event\Entities\Event_files as F;

/**
 *  EventServiceProvider
 */
class EventServiceProvider extends ServiceProvider {

	/**
	 * Register all bindings interface to implementation 
	 */
    public function register()
    {     
    	$this->registerEventService();
    	$this->registerInscriptionService();
    	$this->registerInscriptionWorkerService();
    	$this->registerInvoiceService();	
    	$this->registerCompteService();	
    	$this->registerOptionService();	
    	$this->registerPriceService();	
		$this->registerGenerateService();
		$this->registerFileService();  
		$this->registerEventWorkerService();    			
    }

	/**
	 * Events service
	 */
    protected function registerEventService(){
    
	    $this->app->bind('Droit\Event\Repo\EventInterface', function()
        {
            return new \Droit\Event\Repo\EventEloquent( new E );
        });        
    }

	/**
	 * Inscriptions service
	 */    
    protected function registerInscriptionService(){
    
	    $this->app->bind('Droit\Event\Repo\InscriptionInterface', function()
        {
            return new \Droit\Event\Repo\InscriptionEloquent( new I );
        });        
    }

	/**
	 * Inscriptions Worker service
	 */      
    protected function registerInscriptionWorkerService(){
    
	    $this->app->bind('Droit\Event\Worker\InscriptionServiceInterface', function()
        {
            return new \Droit\Event\Worker\InscriptionServiceWorker(
	           		\App::make('Droit\Event\Repo\FileInterface') , 
	            	\App::make('Droit\Event\Repo\InscriptionInterface') , 
	            	\App::make('Droit\Event\Repo\OptionInterface') 
            );
        });        
    }    

	/**
	 * Invoices service
	 */          
    protected function registerInvoiceService(){
    
	    $this->app->bind('Droit\Event\Repo\InvoiceInterface', function()
        {
            return new \Droit\Event\Repo\InvoiceEloquent( new IN );
        });        
    }
    
	/**
	 * Comptes service
	 */       
    protected function registerCompteService(){
    
	    $this->app->bind('Droit\Event\Repo\CompteInterface', function()
        {
            return new \Droit\Event\Repo\CompteEloquent( new C );
        });        
    }
    
	/**
	 * Options service
	 */      
    protected function registerOptionService(){
    
	    $this->app->bind('Droit\Event\Repo\OptionInterface', function()
        {
            return new \Droit\Event\Repo\OptionEloquent( new O );
        });        
    }
    
	/**
	 * Prices service
	 */  	
	public function registerPriceService(){
	
		$this->app->bind('Droit\Event\Repo\PriceInterface', function()
        {
            return new \Droit\Event\Repo\PriceEloquent( new PR );
        });        
	}

	/**
	 * Generate service
	 */  	        
    protected function registerGenerateService(){

	    $this->app->bind('Droit\Event\Worker\GenerateInterface', function()
        {
            return new \Droit\Event\Worker\GenerateWorker( 
            	\App::make('Droit\Event\Repo\PriceInterface') , 
            	\App::make('Droit\Event\Repo\CompteInterface') , 
            	\App::make('Droit\Event\Repo\FileInterface') ,
            	\App::make('Droit\User\Repo\UserInfoInterface')
            );
        });        
    }
    
	/**
	 * File service
	 */      
    protected function registerFileService(){

	    $this->app->bind('Droit\Event\Repo\FileInterface', function()
        {
            return new \Droit\Event\Repo\FileEloquent( new F );
        });        
    }
    
    /**
	 * Event worker
	 */      
    protected function registerEventWorkerService(){

	    $this->app->bind('Droit\Event\Worker\EventWorkerInterface', function()
        {
            return new \Droit\Event\Worker\EventWorker(
                \App::make('Droit\Event\Repo\EventInterface') ,
                \App::make('Droit\Event\Repo\CompteInterface') ,
                \App::make('Droit\Event\Repo\FileInterface'),
                \App::make('Droit\User\Repo\SpecialisationInterface')
            );
        });        
    }
    
}