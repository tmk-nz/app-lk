<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SiteController@index');

Route::get('/publications', 'PublicationController@index');
Route::get('/publications/{publication}', 'PublicationController@show');

Route::get('/locations', 'LocationController@index');
Route::get('/locations/{location}', 'LocationController@show');

Route::get('/map', 'MapController@index');

// Auth::routes(); // Not now!
