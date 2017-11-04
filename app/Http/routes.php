<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('user/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/* Authenticated users */
Route::group(['middleware' => 'auth'], function()
{
    Route::get('user/withdraw','WithdrawController@index');
    Route::post('user/withdraw','WithdrawController@withdraw');
    
    Route::get('user/deposit','DepositController@index');
    Route::post('user/deposit','DepositController@deposit');
     
    Route::get('user/transfer', array('as'=>'transfer', function()
	{
	return View('user.transfer');
	}));
    Route::post('user/transfer','TransferController@transfer');
    
    Route::get('user/dashboard','DashboardController@index');
    
    
});


Route::get('/','HomeController@index');

