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

Route::prefix('v1')->group(function () {
    Route::get('todo', 'TodoController@index');
    Route::post('todo', 'TodoController@store');
    Route::get('todo/{id}', 'TodoController@show');
    Route::put('todo/{id}', 'TodoController@update');
    Route::delete('todo/{id}', 'TodoController@destroy');
});

