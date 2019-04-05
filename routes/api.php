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

    //Route::post('addproject', 'Api\ProjectController@addProject');

});


Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');   
Route::post('addproject', 'Api\ProjectController@addProject');
Route::post('updateproject', 'Api\ProjectController@updateProject');
Route::post('deleteproject', 'Api\ProjectController@deleteProject');
Route::post('showProjectByUserId', 'Api\ProjectController@showProjectByUserId');
