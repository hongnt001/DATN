<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;

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


Route::get('/login', [ 'uses' => 'App\Http\Controllers\LoginController@getLogin'])->name('getLogin');
Route::post('/login', [ 'uses' => 'App\Http\Controllers\LoginController@postLogin'])->name('postLogin');
Route::get('/forgot-password',[ 'uses' => 'App\Http\Controllers\LoginController@forgotPassword'])->name('forgot');

Route::get('/logout', [ 'uses' => 'App\Http\Controllers\LoginController@getLogout'])->name('logout');


Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function() {
    Route::get('/home',  [ 'uses' => 'HomeController@getListDevices'])->name('home');

    Route::get('/user/create', 'UserController@showRegistrationForm')->name('add_user');
    Route::post('/user/create', 'UserController@create')->name('create_user');
    Route::get('/user/list', [ 'uses' => 'UserController@getList'])->name('list_user');

    Route::get('/device/create', 'DeviceController@showForm')->name('add_device');
    Route::post('/device/create', 'DeviceController@create')->name('create_device');


    Route::get('/inventory/create', 'InventoryController@showFormCreatGroup')->name('form_group_inven');
    Route::post('/inventory/create', 'InventoryController@createGroup')->name('create_group');


    Route::get('/inventory/list', 'InventoryController@getList')->name('get_list_inven');
    Route::get('/inventory/active/{id_inventory}', 'InventoryController@invenActive')->name('active');






    Route::get('/inventory', function () {
        return view('inventory');
    })->name('inventory');
    Route::get('/rate', function () {
        return view('rate');
    })->name('rate');
    Route::get('/plan', function () {
        return view('plan');
    })->name('plan');
    Route::get('/report', function () {
        return view('report');
    })->name('report');
    Route::get('/listuser', function () {
        return view('listuser');
    })->name('listuser');
    Route::get('/createuser', function () {
        return view('createuser');
    })->name('createuser');
});



