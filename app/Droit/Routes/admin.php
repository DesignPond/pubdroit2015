<?php

/**
 * Routes for Administration
 * all routes have a prefix of admin
 */

Route::group(array('prefix' => 'admin'), function()
{

	// Index administration
    Route::get('/', array('uses' => 'AdminController@index'));
   
    // Arrets for bail and droit matrimonial
    Route::get('arrets/create/{pid}', array('uses'  => 'ArretsController@create'));
    Route::resource('arrets', 'ArretsController');
    
    // Analyse for bail and droit matrimonial
    Route::get('analyses/create/{pid}', array('uses'  => 'AnalysesController@create'));
    Route::resource('analyses', 'AnalysesController');
    
    Route::get('search', array('uses'  => 'SearchController@index'));
    Route::post('search', array('uses' => 'SearchController@index'));
    
    // Upload file
	Route::post('upload', array('uses' => 'UploadController@store'));
	Route::get('files',  array('uses'  => 'AdminController@files'));
	Route::get('pdf',  array('uses'    => 'AdminController@pdf'));
		
	// Users and adresses
	Route::get('users', 'AdminUserController@index');
	Route::post('users/changeColumn', 'UserController@changeColumn');

	Route::get('users/create', 'UserController@create');	
	Route::get('users/{user}', 'UserController@show');
	Route::get('users/{user}/edit', 'UserController@edit');
	Route::get('users/{user}/destroy', 'UserController@destroy');
	Route::get('users/{user}/active', 'UserController@active');
	Route::post('users', 'UserController@store');	

	/* member and specialisation */
	Route::post('adresses/removeMembre', 'AdresseController@removeMembre');
	Route::post('adresses/removeSpecialisation', 'AdresseController@removeSpecialisation');
	Route::post('adresses/membre', 'AdresseController@membre');
	Route::post('adresses/specialisation', 'AdresseController@specialisation');
	Route::post('adresses/changeLivraison', 'AdresseController@changeLivraison');
	
	Route::get('adresses/user/{id}/adresse', 'AdresseController@create');
	Route::get('adresses/delete/{id}/{user?}', 'AdresseController@destroy');	
	
	Route::resource('adresses', 'AdresseController');
	
	Route::get('getAllUser',    'AdminUserController@getAllUser');
	Route::get('getAllAdresse', 'AdresseController@getAllAdresse');

    
    // Pubdroit in admin
    Route::group(array('prefix' => 'pubdroit'), function()
	{
		// Colloques
	    Route::get('/', array('uses' => 'ColloqueController@index'));	    
	    Route::get('lists', array('uses' => 'ColloqueController@lists'));
	    Route::get('archives', array('uses' => 'ColloqueController@archives'));	    
	    Route::get('colloque', array('uses' => 'ColloqueController@index'));
	    Route::post('colloque/upload', array('uses' => 'ColloqueController@upload'));
	    Route::get('colloque/{id}/destroy_file', array('uses' => 'ColloqueController@destroy_file')); 
	    Route::post('colloque/pivot', array('uses' => 'ColloqueController@pivot'));	
	    Route::post('colloque/email', array('uses' => 'ColloqueController@email'));
	    Route::post('colloque/attestation', array('uses' => 'ColloqueController@attestation'));	    
	    Route::resource('colloque', 'ColloqueController');

		// Inscriptions
	    Route::get('inscription/colloque/{colloque}', array('uses' => 'InscriptionController@colloque'));	      
	    Route::resource('inscription', 'InscriptionController');

		// Invoices
	    Route::get('invoice/colloque/{colloque}', array('uses' => 'InvoiceController@colloque'));	      
	    Route::resource('invoice', 'InvoiceController');
	    	    
	    // Options colloques
	    Route::get('option/{option}/delete', array('uses' => 'OptionController@destroy'));
	    Route::get('option/create/{colloque}', array('uses' => 'OptionController@create'));
	    Route::resource('option', 'OptionController');

	    // Prix colloques
	    Route::get('price/{price}/delete', array('uses' => 'PriceController@destroy'));
	    Route::get('price/create/{colloque}', array('uses' => 'PriceController@create'));
	    Route::resource('price', 'PriceController');
	    
	    // Spécialisations users and colloques
	    Route::get('specialisation/{specialisation}/delete', array('uses' => 'SpecialisationController@destroy'));
	    Route::get('specialisation/create/{colloque}', array('uses' => 'SpecialisationController@create'));
        Route::get('specialisation/addToColloque/{colloque}', array('uses' => 'SpecialisationController@addToColloque'));
	    Route::post('specialisation/linkColloque', array('uses' => 'SpecialisationController@linkColloque'));
	    Route::get('specialisation/{id}/unlinkColloque', array('uses' => 'SpecialisationController@unlinkColloque'));
	    Route::resource('specialisation', 'SpecialisationController');
	    
	    // Membres users
	    Route::get('membre/{membre}/delete', array('uses' => 'MembreController@destroy'));
	    Route::resource('membre', 'MembreController');
	    
	    // Professions users
	    Route::get('profession/{profession}/delete', array('uses' => 'ProfessionController@destroy'));
	    Route::resource('profession', 'ProfessionController');
	    
	});
	
    Route::group(array('prefix' => 'bail'), function()
	{
	    Route::get('arrets' , array('uses'  => 'BailController@arrets'));	 
	    Route::get('analyses', array('uses' => 'BailController@analyses'));	    
	});
	
	Route::group(array('prefix' => 'matrimonial'), function()
	{
		Route::get('arrets',  array('uses'  => 'MatrimonialController@arrets'));
		Route::get('analyses', array('uses' => 'MatrimonialController@analyses'));		
	});
        
});