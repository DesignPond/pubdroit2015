<?php

/**
 * Route File
 * Site www.publications-droit.ch
 */

Route::group(array('prefix' => 'pubdroit'), function()
{

    Route::get('/', array('uses' => 'PublicationController@index'));
    
    Route::get('profil', array('before' => 'auth' , 'uses' => 'PublicationController@profil'));

	Route::get('colloque', array('uses' => 'PublicationController@colloque'));
		
	// Search and info API	
	Route::post('api', array('uses' => 'SearchController@index'));

});
