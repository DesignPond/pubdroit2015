<?php 

/**
 * Service provider for Inscriptions on publications-droit.ch
 */

namespace Droit\Inscriptions;

use Illuminate\Support\ServiceProvider;
use Droit\Inscriptions\Entities\Inscriptions as I;

/**
 *  EventServiceProvider
 */
class InscriptionServiceProvider extends ServiceProvider {

	/**
	 * Register all bindings interface to implementation 
	 */
    public function register()
    {

        $this->registerInscriptionService();
        $this->registerInscriptionWorkerService();

    }

	/**
	 * Inscriptions service
	 */    
    protected function registerInscriptionService(){
    
	    $this->app->bind('Droit\Inscriptions\Repo\InscriptionInterface', function()
        {
            return new \Droit\Inscriptions\Repo\InscriptionEloquent( new I );
        });        
    }

	/**
	 * Inscriptions Worker service
	 */      
    protected function registerInscriptionWorkerService(){
    
	    $this->app->bind('Droit\Inscriptions\Worker\InscriptionServiceInterface', function()
        {
            return new \Droit\Inscriptions\Worker\InscriptionServiceWorker(
	           		\App::make('Droit\Event\Repo\FileInterface') , 
	            	\App::make('Droit\Inscriptions\Repo\InscriptionInterface') ,
	            	\App::make('Droit\Event\Repo\OptionInterface') 
            );
        });        
    }    

    
}