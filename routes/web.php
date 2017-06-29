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

Route::get('/', function () {
    return view('home');
});

Route::get('/tickets', 'TicketController@getTickets');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'LoginController@showLogin');
Route::post('/login', 'LoginController@doLogin');

Route::get('/verkoop', 'TicketController@verkoop');
