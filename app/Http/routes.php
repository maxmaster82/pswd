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

Route::get('/', 'HomeController@index')->name('home');

Route::get('password/reset', function(){
    abort(404);
});

Route::auth();

Route::group(['namespace' => 'Auth','middleware'=> 'pswd.key'], function(){
    Route::post('login', 'AuthController@postLogin');
    Route::post('register', 'AuthController@postRegister');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('account', 'AccountController@create')->name('account::create');
    Route::post('account', 'AccountController@store');
    Route::get('account/{account}', 'AccountController@edit')->name('account::edit');
    Route::post('account/{account}', 'AccountController@update');
    Route::delete('account/{account}', 'AccountController@destroy');
});



