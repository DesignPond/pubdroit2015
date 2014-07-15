<?php 
/**
 * Service provider for common tasks in admin
 */
 
namespace Droit\Admin;

use Illuminate\Support\ServiceProvider;

/**
 *  AdminServiceProvider
 */
class AdminServiceProvider extends ServiceProvider {

	/**
	 * Register binding interface to implementation 
	 */
    public function register()
    {         	
		$this->registerSearchService();
    }

	/**
	 * Search service
	 */      
    protected function registerSearchService(){
    
	    $this->app->bind('Droit\Admin\Repo\SearchInterface', function()
        {
            return new \Droit\Admin\Repo\SearchEloquent( \App::make('Droit\User\Repo\UserInfoInterface') , \App::make('Droit\User\Repo\AdresseInterface') );
        });       
    } 
    
}