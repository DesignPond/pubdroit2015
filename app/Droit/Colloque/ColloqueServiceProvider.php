<?php 

/**
 * Service provider for Colloques on publications-droit.ch
 */

namespace Droit\Colloque;

use Illuminate\Support\ServiceProvider;

use Droit\Colloque\Entities\Colloques as Colloques;
use Droit\Colloque\Entities\Colloque_factures as Colloque_factures;
use Droit\Colloque\Entities\Comptes as Comptes;
use Droit\Colloque\Entities\Colloque_options as Colloque_options;
use Droit\Colloque\Entities\Colloque_prices as Colloque_prices;
use Droit\Colloque\Entities\Colloque_files as Colloque_files;
use Droit\Colloque\Entities\Colloque_inscriptions as Colloque_inscriptions;

/**
 *  ColloqueServiceProvider
 */
class ColloqueServiceProvider extends ServiceProvider {

	/**
	 * Register all bindings interface to implementation 
	 */
    public function register()
    {     
    	$this->registerColloqueService();
    	$this->registerInvoiceService();	
    	$this->registerCompteService();	
    	$this->registerOptionService();	
    	$this->registerPriceService();	
		$this->registerGenerateService();
        $this->registerDocumentService();
		$this->registerFileService();  
		$this->registerColloqueWorkerService();

        $this->registerInscriptionService();
        $this->registerInscriptionWorkerService();
    }

	/**
	 * Colloques service
	 */
    protected function registerColloqueService(){
    
	    $this->app->bind('Droit\Colloque\Repo\ColloqueInterface', function()
        {
            return new \Droit\Colloque\Repo\ColloqueEloquent( new Colloques );
        });        
    }

	/**
	 * Invoices service
	 */          
    protected function registerInvoiceService(){
    
	    $this->app->bind('Droit\Colloque\Repo\FactureInterface', function()
        {
            return new \Droit\Colloque\Repo\FactureEloquent( new Colloque_factures );
        });        
    }
    
	/**
	 * Comptes service
	 */       
    protected function registerCompteService(){
    
	    $this->app->bind('Droit\Colloque\Repo\CompteInterface', function()
        {
            return new \Droit\Colloque\Repo\CompteEloquent( new Comptes );
        });        
    }
    
	/**
	 * Options service
	 */      
    protected function registerOptionService(){
    
	    $this->app->bind('Droit\Colloque\Repo\OptionInterface', function()
        {
            return new \Droit\Colloque\Repo\OptionEloquent( new Colloque_options );
        });        
    }
    
	/**
	 * Prices service
	 */  	
	public function registerPriceService(){
	
		$this->app->bind('Droit\Colloque\Repo\PriceInterface', function()
        {
            return new \Droit\Colloque\Repo\PriceEloquent( new Colloque_prices );
        });        
	}

	/**
	 * Generate service
	 */  	        
    protected function registerGenerateService(){

	    $this->app->bind('Droit\Colloque\Worker\GenerateInterface', function()
        {
            return new \Droit\Colloque\Worker\GenerateWorker( 
            	\App::make('Droit\Colloque\Repo\PriceInterface') , 
            	\App::make('Droit\Colloque\Repo\CompteInterface') , 
            	\App::make('Droit\Colloque\Repo\FileInterface') ,
            	\App::make('Droit\User\Repo\UserInfoInterface')
            );
        });        
    }

    /**
     * Document generator
     */
    public function registerDocumentService()
    {
        $this->app->bind('Droit\Colloque\Worker\DocumentInterface', function()
        {
            return new \Droit\Colloque\Worker\DocumentWorker(
                \App::make('Droit\Colloque\Repo\ColloqueInterface') ,
                \App::make('Droit\Colloque\Repo\OptionInterface'),
                \App::make('Droit\Colloque\Repo\FileInterface')
            );
        });
    }

	/**
	 * File service
	 */      
    protected function registerFileService(){

	    $this->app->bind('Droit\Colloque\Repo\FileInterface', function()
        {
            return new \Droit\Colloque\Repo\FileEloquent( new Colloque_files );
        });        
    }
    
    /**
	 * Colloque worker
	 */      
    protected function registerColloqueWorkerService(){

	    $this->app->bind('Droit\Colloque\Worker\ColloqueWorkerInterface', function()
        {
            return new \Droit\Colloque\Worker\ColloqueWorker(
                \App::make('Droit\Colloque\Repo\ColloqueInterface') ,
                \App::make('Droit\Colloque\Repo\CompteInterface') ,
                \App::make('Droit\Colloque\Repo\FileInterface'),
                \App::make('Droit\User\Repo\SpecialisationInterface')
            );
        });        
    }

    /**
     * Inscriptions service
     */
    protected function registerInscriptionService(){

        $this->app->bind('Droit\Colloque\Repo\InscriptionInterface', function()
        {
            return new \Droit\Colloque\Repo\InscriptionEloquent( new Colloque_inscriptions );
        });
    }

    /**
     * Inscriptions Worker service
     */
    protected function registerInscriptionWorkerService(){

        $this->app->bind('Droit\Colloque\Worker\InscriptionServiceInterface', function()
        {
            return new \Droit\Colloque\Worker\InscriptionServiceWorker(
                \App::make('Droit\Colloque\Repo\FileInterface') ,
                \App::make('Droit\Colloque\Repo\InscriptionInterface') ,
                \App::make('Droit\Colloque\Repo\OptionInterface')
            );
        });
    }

}