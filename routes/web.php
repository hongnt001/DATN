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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('Auth/login');
});
Route::get('/user/create', 'App\Http\Controllers\UserController@showRegistrationForm')->name('add_user');
Route::post('/user/create', 'App\Http\Controllers\UserController@create')->name('create_user');
Route::get('/user/list',
    [
        'uses' => 'App\Http\Controllers\UserController@getList']
)->name('list_user');

Route::get('/forgot-password', function () {
    return view('Auth/forgot-pass');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/decision', function () {
    return view('decision');
})->name('decision');
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
