<?php 
/**
 * Service provider for content
 */
 
namespace Droit;

use Illuminate\Support\ServiceProvider;

use Arrets as A;
use Analyses as AN;
use Auteur as AU;
use Seminaires as SM;
use Subjects as SU;
use BaCategories as BA;
use BsCategories as BS;

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
		
		$this->app->bind('Droit\Repo\Arret\ArretInterface', function()
        {
            return new \Droit\Repo\Arret\ArretEloquent( new A );
        });        
	}

	/**
	 * Analyses service
	 */ 
    public function registerAnalyseService(){
		
		$this->app->bind('Droit\Repo\Analyse\AnalyseInterface', function()
        {
            return new \Droit\Repo\Analyse\AnalyseEloquent( new AN );
        });       
	}

	/**
	 * Seminaires service
	 */ 	
    public function registerSeminaireService(){
		
		$this->app->bind('Droit\Repo\Seminaire\SeminaireInterface', function()
        {
            return new \Droit\Repo\Seminaire\SeminaireEloquent( new SM );
        });        
	}

	/**
	 * Subjects service
	 */ 	
    public function registerSubjectService(){
		
		$this->app->bind('Droit\Repo\Subject\SubjectInterface', function()
        {
            return new \Droit\Repo\Subject\SubjectEloquent( new SU );
        });        
	}	

	/**
	 * Auteurs service
	 */ 	
    public function registerAuteurService(){
		
		$this->app->bind('Droit\Repo\Auteur\AuteurInterface', function()
        {
            return new \Droit\Repo\Auteur\AuteurEloquent( new AU );
        });        
	}			

	/**
	 * Bail Arrets Categories service
	 */ 
    public function registerCategorieService(){
		
		$this->app->bind('Droit\Repo\Categorie\CategorieInterface', function()
        {
            return new \Droit\Repo\Categorie\CategorieEloquent( new BA );
        });        
	}

	/**
	 * Bail Seminaire Categories service
	 */ 
    public function registerBSCategorieService(){
		
		$this->app->bind('Droit\Repo\BSCategorie\BSCategorieInterface', function()
        {
            return new \Droit\Repo\BSCategorie\BSCategorieEloquent( new BS );
        });        
	}	
		        
}