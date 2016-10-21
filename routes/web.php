<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/', ['as' => 'pages.home', 'uses' => 'PageController@home']);
Route::get('pages', ['as' => 'pages.index', 'uses' => 'PageController@index']);

Route::resource('events', 'EventsController');

Route::resource('categories', 'CategoryController', ['except' => ['create', 'show']]);

Route::resource('subcategories', 'SubcategoryController', ['except' => ['create', 'show']]);

Route::resource('places', 'PlacesController');