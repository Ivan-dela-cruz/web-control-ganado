<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard/courses','Admin\DashboardController@courses')->name('courses');
Auth::routes();
Route::get('dashboard/periods','Admin\DashboardController@periods')->name('periods');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
Route::get('dashboard/deliveries','Admin\DashboardController@deliveries')->name('deliveries');
Route::get('dashboard/roles','Admin\DashboardController@roles')->name('roles');
Route::get('dashboard/students','Admin\DashboardController@students')->name('students');

Route::get('dashboard/companies','Admin\DashboardController@companies')->name('companies');
Route::get('dashboard/levels','Admin\DashboardController@levels')->name('levels');
Route::get('dashboard/tasks','Admin\DashboardController@tasks')->name('tasks');
Route::get('dashboard/files','Admin\DashboardController@files')->name('files');

Route::get('dashboard/estates','Admin\DashboardController@estates')->name('estates');
Route::get('dashboard/users','Admin\DashboardController@users')->name('users');
Route::get('dashboard/employes','Admin\DashboardController@employes')->name('employes');

Route::get('dashboard/veterinaries','Admin\DashboardController@veterinaries')->name('veterinaries');
Route::get('dashboard/treatments','Admin\DashboardController@Treatments')->name('treatments');
Route::get('dashboard/diseases','Admin\DashboardController@Diseases')->name('diseases');
Route::get('dashboard/animals','Admin\DashboardController@Animals')->name('animals');
Route::get('dashboard/mastitis','Admin\DashboardController@Mastitis')->name('mastitis');
Route::get('dashboard/animals/production','Admin\DashboardController@animalProduction')->name('animalprodcution');

//code
Route::get('dashboard/purchases','Admin\DashboardController@Purchases')->name('purchase');
Route::get('dashboard/purchases/list','Admin\DashboardController@List_purchases')->name('purchases.list');
Route::get('dashboard/sales','Admin\DashboardController@Sales')->name('sales');
Route::get('dashboard/sales/list','Admin\DashboardController@List_sales')->name('sales.list');


///CHEQUEOS
Route::get('dashboard/checkups','Admin\DashboardController@checkups')->name('checkups');