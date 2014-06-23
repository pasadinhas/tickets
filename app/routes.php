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

Route::get('/', function(){return View::make('hello');});

#Route::pattern('id', '[0-9]+');
#Route::pattern('code', '[0-9a-zA-Z]+');

Route::resource('place', 'PlaceController',
    array('only' => array('index', 'show')));

//Route::get('ticket/last', 'TicketController@showLast');

Route::resource('ticket', 'TicketController',
    array('only' => array('index', 'show', 'store')));


Route::resource('service', 'ServiceController',
    array('only' => array('index', 'show', 'store', 'update')));
