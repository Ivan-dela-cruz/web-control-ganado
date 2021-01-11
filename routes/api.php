<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('logout', 'AuthController@logout');
    Route::post('save-profile-user', 'AuthController@profileUser')->name('save-profile-user')->middleware('jwtAuth');
    Route::get('profile','AuthController@getProfile')->name('profile')->middleware('jwtAuth');
    Route::post('change-password','AuthController@ChangePassword')->name('change-password')->middleware('jwtAuth');

    //RUTAS PARA EL 
    Route::get('estates','EstateController@index')->name('estates');
    Route::get('estates/info/{id}','EstateController@genaralInformation');
    Route::get('estates/employes/{id}','EstateController@employesByEstate');
    Route::get('estates/veterinaries/{id}','EstateController@veterinariesByEstate');
    Route::get('estates/animals/production/{id}','EstateController@AnimalsProductionByEstate');

});
