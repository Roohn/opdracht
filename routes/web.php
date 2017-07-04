<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(array('before' => 'csrf'), function() {
    Route::get('/', 'LoginController@home');

    Route::get('/login', 'LoginController@showLogin');
    Route::post('/login', 'LoginController@doLogin');
    Route::get('/logout', 'LoginController@logout');

    Route::get('/verkoop', 'TicketController@verkoop');
    Route::post('/verkoop', 'TicketController@addVerkoop');

    Route::get('/koopTicket/{id}', 'TicketController@koopTickets');
});