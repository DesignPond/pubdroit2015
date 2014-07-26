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

Route::get('test', array('uses' => 'TestController@index'));

/**
 * Password reminder
 */
Route::controller('password', 'RemindersController');

/**
 * BAIL Routes 
 */

include __DIR__ .'/Droit/Routes/bail.php';


/**
 * Publications-droit Routes
 */

include __DIR__ .'/Droit/Routes/pubdroit.php';


/**
 * Droit-matrimonial Routes
 */

include __DIR__ .'/Droit/Routes/matrimonail.php';


/**
 * Administration Routes
 */
	
include __DIR__ .'/Droit/Routes/admin.php';
