<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API for event
    Route::get('event','ApiEventController@index');
  
    Route::get('event/{id}',['as' => 'api.events.show', 'uses' => 'ApiEventController@show']);
      
    Route::post('event', ['as' => 'api.events.create', 'uses' => 'ApiEventController@create']);
      
    Route::put('event/{id}', ['as' => 'api.events.update', 'uses' => 'ApiEventController@update']);
      
    Route::delete('event/{id}', ['as' => 'api.events.delete', 'uses' => 'ApiEventController@delete']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
