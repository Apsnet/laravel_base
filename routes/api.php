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
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::get('/user', 'UsersController@show');
    Route::get('/auth-request', function () { return response(['status' => true], 200); });
});


Route::group(['prefix' => 'v1', 'middleware' => ['auth:api', 'role'], 'role' => 'admin'], function () {
    Route::post('/create-users', 'UsersController@store');
    Route::get('/roles', 'RolesController@index');
    Route::get('/user/{id}', 'UsersController@show');
});

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api', 'role'], 'role' => 'sudo'], function () {

});

Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', 'UsersController@store');
});
// Rotas externas
