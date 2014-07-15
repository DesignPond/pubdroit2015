<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Tests Routes
 */
Route::get('/', function()
{
	return View::make('hello');
});


/**
 * BAIL Routes 
 */

include __DIR__ .'/Droit/Routes/site-bail.php';


/**
 * Publications-droit Routes
 */

include __DIR__ .'/Droit/Routes/site-pubdroit.php';


/**
 * Droit-matrimonial Routes
 */

include __DIR__ .'/Droit/Routes/site-matrimonail.php';


/**
 * Administration Routes
 */
	
include __DIR__ .'/Droit/Routes/admin.php';
