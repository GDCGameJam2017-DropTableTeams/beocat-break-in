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

Route::get('/test', function(){return "Hello, World!";});
Route::post('/begin', 'APIController@Begin');
Route::post('/play', 'APIController@Play');
Route::post('/end', 'APIController@End');
