<?php

/**
 * Routes for Administration
 * all routes have a prefix of admin
 */

Route::group(array('prefix' => 'admin'), function()
{

	// Index administration
    Route::get('/', array('uses' => 'AdminController@index'));
    
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
    Route::post('users/convert', 'UserController@convert');
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

    // Colloques
    Route::get('colloque', array('uses' => 'ColloqueController@index'));
    Route::get('colloque/archives', array('uses' => 'ColloqueController@archives'));
    Route::post('colloque/upload', array('uses' => 'ColloqueController@upload'));
    Route::get('colloque/{id}/destroy_file', array('uses' => 'ColloqueController@destroy_file'));
    Route::get('colloque/email/{colloque_id}', array('uses' => 'ColloqueController@email'));
    Route::get('colloque/attestation/{colloque_id}', array('uses' => 'ColloqueController@attestation'));
    Route::post('colloque/edit_email', array('uses' => 'ColloqueController@edit_email'));
    Route::post('colloque/edit_attestation', array('uses' => 'ColloqueController@edit_attestation'));
    Route::get('specialisation/addToColloque/{colloque}', array('uses' => 'SpecialisationController@addToColloque'));
    Route::post('colloque/specialisation', array('uses' => 'ColloqueController@specialisation'));
    Route::get('colloque/removeSpecialisation/{specialisation_id}/{colloque_id}', array('uses' => 'ColloqueController@removeSpecialisation'));
    Route::resource('colloque', 'ColloqueController');

    // Options colloques
    Route::get('option/{option}/delete', array('uses' => 'OptionController@destroy'));
    Route::get('option/create/{colloque}', array('uses' => 'OptionController@create'));
    Route::resource('option', 'OptionController');

    // Prix colloques
    Route::get('price/{price}/delete', array('uses' => 'PriceController@destroy'));
    Route::get('price/create/{colloque}', array('uses' => 'PriceController@create'));
    Route::resource('price', 'PriceController');

    // Inscriptions
    Route::get('inscription/colloque/{colloque}', array('uses' => 'InscriptionController@colloque'));
    Route::resource('inscription', 'InscriptionController');

    // Invoices
    Route::get('invoice/colloque/{colloque}', array('uses' => 'FactureController@colloque'));
    Route::resource('invoice', 'FactureController');

    // Spécialisations users and colloques
    Route::get('specialisation/{specialisation}/delete', array('uses' => 'SpecialisationController@destroy'));
    Route::get('specialisation/create/{colloque}', array('uses' => 'SpecialisationController@create'));
    Route::resource('specialisation', 'SpecialisationController');

    // Membres users
    Route::get('membre/{membre}/delete', array('uses' => 'MembreController@destroy'));
    Route::resource('membre', 'MembreController');

    // Professions users
    Route::get('profession/{profession}/delete', array('uses' => 'ProfessionController@destroy'));
    Route::resource('profession', 'ProfessionController');


    // Arrets for bail and droit matrimonial
    Route::get('arrets/create/{pid}', array('uses'  => 'ArretsController@create'));
    Route::resource('arrets', 'ArretsController');

    // Analyse for bail and droit matrimonial
    Route::get('analyses/create/{pid}', array('uses'  => 'AnalysesController@create'));
    Route::resource('analyses', 'AnalysesController');

    // Pubdroit in admin
    Route::group(array('prefix' => 'pubdroit'), function()
	{

	});

    // Bail in admin
    Route::group(array('prefix' => 'bail'), function()
	{

	});

    // Matrimonial in admin
	Route::group(array('prefix' => 'matrimonial'), function()
	{

	});
        
});