<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Use HomeController@index for all routes except '/'
Route::get('/{any}', 'HomeController@index')->where('any', '^(?!$).*$');

// Use a separate route for the root URL '/'
Route::get('/', function () {
    return view('welcome');
});
