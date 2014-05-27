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

Route::get('/places', array('as'=>'','uses'=>'PlaceController@getIndex'));
Route::get('/place/{id}', array('as'=>'','uses'=>'PlaceController@getPlace'));
Route::get('/place/{id}/tickets', array('as'=>'','uses'=>'TicketController@getTickets'));
Route::get('/place/{id}/tickets/next', array('as'=>'','uses'=>'PlaceController@getNextTicketForPlace'));
Route::get('/place/{id}/tickets/waiting', array('as'=>'','uses'=>'PlaceController@getHasWaitingTickets'));
Route::get('/place/{id}/tickets/request', array('as'=>'','uses'=>'TicketController@getNewTicket'));

Route::get('/services', array('as'=>'','uses'=>'ServiceController@getIndex'));
Route::get('/services/open', array('as'=>'','uses'=>'ServiceController@getOpenServices'));
Route::get('/services/employee/{id}', array('as'=>'','uses'=>'ServiceController@getServicesForEmployee'));
Route::get('/services/employee/{id}/open', array('as'=>'','uses'=>'ServiceController@getOpenServicesForEmployee'));
