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




Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth.basic'], function ()
{

    Route::resource('caldos','CaldosController');
    Route::resource('calientes', 'CalientesController');
    Route::resource('frias', 'FriasController');
    Route::resource('otras', 'OtrasController');
    Route::resource('postres', 'PostresController');
    Route::resource('tamales', 'TamalesController');
    Route::resource('temporada','TemporadaController');

});

