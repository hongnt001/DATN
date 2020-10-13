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
