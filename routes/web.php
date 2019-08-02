<?php

Route::get('/', 'SiteController@index');

Route::get('/publications', 'PublicationController@index');
Route::get('/publications/{publication}', 'PublicationController@show');

Route::get('/locations', 'LocationController@index');
Route::get('/locations/{location}', 'LocationController@show');

Route::get('/map', 'MapController@index');
