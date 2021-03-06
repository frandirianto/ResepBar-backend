<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'prefix' => 'web'
], function () {
    
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('/user', 'AuthController@user');
        Route::get('/logout', 'AuthController@logout');

        Route::get('/get-all-recipe', 'RecipeController@getAll');
    });
});