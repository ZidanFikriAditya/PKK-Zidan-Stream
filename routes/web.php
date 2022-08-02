<?php

use App\Http\Controllers\Auth\AuthController;
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
    return view('Homepage', [
        'title' => 'Home'
    ]);
});

// Login
Route::resource('/login', \App\Http\Controllers\Auth\AuthController::class)->middleware('guest');
// Register
Route::resource('/register', \App\Http\Controllers\Auth\RegisterController::class)->middleware('guest');


Route::group(['middleware' => 'auth'], function () {

});
