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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth','UserController@login');

Route::get('user/{id}','UserController@getUser');

Route::get('users','UserController@getUsers');

Route::post('user/{id}','UserController@editUser');

Route::post('book','RideController@book');


