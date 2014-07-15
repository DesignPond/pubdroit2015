<?php 

/**
 * Service provider for calculette on bail.ch
 */

namespace Droit\Calculette;

use Illuminate\Support\ServiceProvider;

use Droit\Calculette\Entities\Calculette_ipc  as CI;
use Droit\Calculette\Entities\Calculette_taux as CT;

/**
 *  CalculetteServiceProvider
 */
class CalculetteServiceProvider extends ServiceProvider {

	/**
	 * Register binding interface to implementation 
	 */
    public function register()
    {     
		$this->registerCalculetteService();
    }
    
    /**
	 * Events service
	 */
    protected function registerCalculetteService(){
    
		$this->app->bind('Droit\Calculette\Repo\CalculetteInterface', function()
        {
            return new \Droit\Calculette\Repo\CalculetteEloquent( new CT , new CI );
        });        
    }
        
}