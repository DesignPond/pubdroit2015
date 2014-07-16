<?php 
/**
 * Service provider for content
 */
 
namespace Droit\Content;

use Illuminate\Support\ServiceProvider;

use Droit\Content\Entities\Arrets as A;
use Droit\Content\Entities\Analyses as AN;
use Droit\Content\Entities\Auteur as AU;
use Droit\Content\Entities\Seminaires as SM;
use Droit\Content\Entities\Subjects as SU;
use Droit\Content\Entities\BaCategories as BA;
use Droit\Content\Entities\BsCategories as BS;

/**
 *  ContentServiceProvider
 */
class ContentServiceProvider extends ServiceProvider {

	/**
	 * Register binding interface to implementation 
	 */
    public function register()
    {         	
    	$this->registerArretService();	
    	$this->registerAnalyseService();	
    	$this->registerSeminaireService();	
    	$this->registerSubjectService();	
    	$this->registerAuteurService();	
    	$this->registerCategorieService();
    	$this->registerBSCategorieService();	    			
    }

	/**
	 * Arrets service
	 */  
    public function registerArretService(){
		
		$this->app->bind('Droit\Content\Repo\ArretInterface', function()
        {
            return new \Droit\Content\Repo\ArretEloquent( new A );
        });        
	}

	/**
	 * Analyses service
	 */ 
    public function registerAnalyseService(){
		
		$this->app->bind('Droit\Content\Repo\AnalyseInterface', function()
        {
            return new \Droit\Content\Repo\AnalyseEloquent( new AN );
        });       
	}

	/**
	 * Seminaires service
	 */ 	
    public function registerSeminaireService(){
		
		$this->app->bind('Droit\Content\Repo\SeminaireInterface', function()
        {
            return new \Droit\Content\Repo\SeminaireEloquent( new SM );
        });        
	}

	/**
	 * Subjects service
	 */ 	
    public function registerSubjectService(){
		
		$this->app->bind('Droit\Content\Repo\SubjectInterface', function()
        {
            return new \Droit\Content\Repo\SubjectEloquent( new SU );
        });        
	}	

	/**
	 * Auteurs service
	 */ 	
    public function registerAuteurService(){
		
		$this->app->bind('Droit\Content\Repo\AuteurInterface', function()
        {
            return new \Droit\Content\Repo\AuteurEloquent( new AU );
        });        
	}			

	/**
	 * Bail Arrets Categories service
	 */ 
    public function registerCategorieService(){
		
		$this->app->bind('Droit\Content\Repo\CategorieInterface', function()
        {
            return new \Droit\Content\Repo\CategorieEloquent( new BA );
        });        
	}

	/**
	 * Bail Seminaire Categories service
	 */ 
    public function registerBSCategorieService(){
		
		$this->app->bind('Droit\Content\Repo\BSCategorieInterface', function()
        {
            return new \Droit\Content\Repo\BSCategorieEloquent( new BS );
        });        
	}	
		        
}