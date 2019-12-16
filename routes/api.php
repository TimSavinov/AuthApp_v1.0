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

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('user/verify/{token}', 'AuthController@verifyEmail');
    Route::get('user', 'AuthController@user');  


        Route::group(['middleware' => 'auth:api'], function(){
    
        Route::post('logout', 'AuthController@logout');
        });
});
