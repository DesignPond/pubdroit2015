<?php

/**
 * Route File
 * Site www.bail.ch
 */

Route::group(array('prefix' => 'bail'), function()
{

    Route::get('/', array('uses' => 'BailController@index'));	   
    Route::get('lois', array('uses' => 'BailController@lois'));	    
    Route::get('jurisprudence', array('uses' => 'BailController@jurisprudence'));	
    Route::get('doctrine', array('uses' => 'BailController@doctrine'));	       
    Route::get('calcul', array('uses' => 'BailController@calcul'));	    
    Route::post('loyer', array('uses' => 'BailController@loyer'));	   
    
});