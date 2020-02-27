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
Route::post('/v1/login', 'UsersController@login');
Route::post('/v1/register', 'UsersController@register');

Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth:api'
], function () {
    Route::get('/logout', 'UsersController@logout');
    Route::post('/book/create','BookController@store');
    Route::post('/book/update/{id}','BookController@update');
    Route::post('/book/delete/{id}','BookController@destroy');
    Route::get('/book/{id}','BookController@show');
    Route::get('/book','BookController@index');
});
