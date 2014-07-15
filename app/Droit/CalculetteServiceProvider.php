<?php 

/**
 * Service provider for calculette on bail.ch
 */

namespace Droit;

use Illuminate\Support\ServiceProvider;

use Calculette_ipc  as CI;
use Calculette_taux as CT;

/**
 *  CalculetteServiceProvider
 */
class CalculetteServiceProvider extends ServiceProvider {

	/**
	 * Register binding interface to implementation 
	 */
    public function register()
    {     
		$this->app->bind('Droit\Repo\Calculette\CalculetteInterface', function()
        {
            return new \Droit\Repo\Calculette\CalculetteEloquent( new CT , new CI );
        });  
    }
        
}