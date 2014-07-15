<?php 

/**
 * Service provider for Events on publications-droit.ch
 */

namespace Droit;

use Illuminate\Support\ServiceProvider;

use Events as E;
use Inscriptions as I;
use Invoices as IN;
use Comptes as C;
use Options as O;
use Prices as PR;

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
    }

	/**
	 * Events service
	 */
    protected function registerEventService(){
    
	    $this->app->bind('Droit\Repo\Event\EventInterface', function()
        {
            return new \Droit\Repo\Event\EventEloquent( new E );
        });        
    }

	/**
	 * Inscriptions service
	 */    
    protected function registerInscriptionService(){
    
	    $this->app->bind('Droit\Repo\Inscription\InscriptionInterface', function()
        {
            return new \Droit\Repo\Inscription\InscriptionEloquent( new I );
        });        
    }

	/**
	 * Inscriptions Worker service
	 */      
    protected function registerInscriptionWorkerService(){
    
	    $this->app->bind('Droit\Service\Inscription\InscriptionServiceInterface', function()
        {
            return new \Droit\Service\Inscription\InscriptionServiceWorker(
	           		\App::make('Droit\Repo\File\FileInterface') , 
	            	\App::make('Droit\Repo\Inscription\InscriptionInterface') , 
	            	\App::make('Droit\Repo\Option\OptionInterface') 
            );
        });        
    }    

	/**
	 * Invoices service
	 */          
    protected function registerInvoiceService(){
    
	    $this->app->bind('Droit\Repo\Invoice\InvoiceInterface', function()
        {
            return new \Droit\Repo\Invoice\InvoiceEloquent( new IN );
        });        
    }
    
	/**
	 * Comptes service
	 */       
    protected function registerCompteService(){
    
	    $this->app->bind('Droit\Repo\Compte\CompteInterface', function()
        {
            return new \Droit\Repo\Compte\CompteEloquent( new C );
        });        
    }
    
	/**
	 * Options service
	 */      
    protected function registerOptionService(){
    
	    $this->app->bind('Droit\Repo\Option\OptionInterface', function()
        {
            return new \Droit\Repo\Option\OptionEloquent( new O );
        });        
    }
    
	/**
	 * Prices service
	 */  	
	public function registerPriceService(){
	
		$this->app->bind('Droit\Repo\Price\PriceInterface', function()
        {
            return new \Droit\Repo\Price\PriceEloquent( new PR );
        });        
	}
    
}