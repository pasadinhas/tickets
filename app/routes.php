<?php

// FIXME - header allows all
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: OPTIONS, POST, GET, PUT, DELETE, PATCH');

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

Route::resource('place', 'PlaceController',
    array('only' => array('index', 'show')));

Route::resource('ticket', 'TicketController',
    array('only' => array('index', 'show', 'store')));

Route::resource('service', 'ServiceController',
    array('only' => array('index', 'show', 'store', 'update')));
