<?php

use App\Http\Controllers\Manager\AuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| manager Routes
|--------------------------------------------------------------------------
|
| Here is where you can register manager routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('manager.auth.login');
})->name('manager.login')->middleware('guest');

Route::post('/login', [AuthController::class , 'login'])->name('manager.login');
Route::post('/logout', [AuthController::class , 'logout'])->name('manager.logout');

Route::get('/home', function () {
    return view('manager.home');
})->name('manager.home')->middleware('auth:manager');
