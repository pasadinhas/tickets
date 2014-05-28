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

Route::get('/', function()
{
	return View::make('hello');
});

Route::pattern('id', '[0-9]+');
Route::pattern('code', '[0-9a-zA-Z]+');

Route::get('/places', array('as'=>'places','uses'=>'PlaceController@getIndex'));
Route::get('/place/{id}', array('as'=>'place','uses'=>'PlaceController@getPlace'));

Route::get('/place/{id}/tickets', array('as'=>'placeTickets','uses'=>'TicketController@getTicketsForPlace'));
Route::get('/place/{id}/tickets/waiting', array('as'=>'placeWaitingTickets','uses'=>'TicketController@getTicketsWaitingForPlace'));
Route::get('/place/{id}/tickets/next', array('as'=>'placeNextTicket','uses'=>'TicketController@getNextTicketForPlace'));
Route::get('/place/{id}/tickets/request', array('as'=>'placeRequestTicket','uses'=>'TicketController@getNewTicketForPlace'));

Route::get('/tickets', array('as'=>'tickets','uses'=>'TicketController@getIndex'));
Route::get('/ticket/{id}', array('as'=>'ticket','uses'=>'TicketController@getTicket'));

Route::get('/services', array('as'=>'services','uses'=>'ServiceController@getIndex'));
Route::get('/service/{id}', array('as'=>'service','uses'=>'ServiceController@getService'));
Route::get('/service/{id}/finish', array('as'=>'service','uses'=>'ServiceController@getFinishService'));
Route::get('/services/employee/{code}', array('as'=>'servicesEmployee','uses'=>'ServiceController@getServicesForEmployee'));

// FIXME: debug
Route::get('/debug', 'BaseController@debug');
Route::get('/debug/{id}', 'BaseController@debug');
Route::get('/debug/{code}', 'BaseController@debug');