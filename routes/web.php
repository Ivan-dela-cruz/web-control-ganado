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

Auth::routes();

Route::namespace('Admin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('dashboard/deliveries','DashboardController@deliveries')->name('deliveries');
        Route::get('dashboard/roles','DashboardController@roles')->name('roles');
        Route::get('dashboard/students','DashboardController@students')->name('students');

        Route::get('dashboard/companies','DashboardController@companies')->name('companies');
        Route::get('dashboard/levels','DashboardController@levels')->name('levels');

        Route::get('dashboard/files','DashboardController@files')->name('files');

        Route::get('dashboard/estates','DashboardController@estates')->name('estates');
        Route::get('dashboard/users','DashboardController@users')->name('users');
        Route::get('dashboard/employes','DashboardController@employes')->name('employes');

        Route::get('dashboard/veterinaries','DashboardController@veterinaries')->name('veterinaries');
        Route::get('dashboard/treatments','DashboardController@Treatments')->name('treatments');
        Route::get('dashboard/diseases','DashboardController@Diseases')->name('diseases');
        Route::get('dashboard/animals','DashboardController@Animals')->name('animals');
        Route::get('dashboard/mastitis','DashboardController@Mastitis')->name('mastitis');
        Route::get('dashboard/animals/production','DashboardController@animalProduction')->name('animalprodcution');

        //code
        Route::get('dashboard/purchases','DashboardController@Purchases')->name('purchase');
        Route::get('dashboard/purchases/list','DashboardController@List_purchases')->name('purchases.list');
        Route::get('dashboard/sales','DashboardController@Sales')->name('sales');
        Route::get('dashboard/sales/list','DashboardController@List_sales')->name('sales.list');


        ///CHEQUEOS
        Route::get('dashboard/checkups','DashboardController@checkups')->name('checkups');


        //PRODUCTION
        Route::get('dashboard/production/animals','DashboardController@aminalProductions')->name('production-animal');
        Route::get('dashboard/production/milkings','DashboardController@milkingList')->name('milking-list');

        //empleados
        Route::get('dashboard/employee/tasks','DashboardController@tasks_employees')->name('tasks');
        
        //reportes

        Route::get('dashboard/report/income/{id}','DashboardController@getPdfIncome')->name('report-income');
        
        Route::get('dashboard/report/incomes/lists','DashboardController@getPdfListIncomes')->name('report-list-income');
        Route::get('dashboard/report/week/tasks/{id}','DashboardController@getWeekTaskByEmploye')->name('report-week-task');
});
});

Route::get('download-apk','Admin\DashboardController@downloadapk')->name('download-apk');