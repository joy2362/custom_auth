<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('admin.login');

//->middleware('guest')
Route::post('/login', [AuthController::class , 'login'])->name('admin.login');
Route::post('/logout', [AuthController::class , 'logout'])->name('admin.logout');

Route::get('/home', function () {
    return view('admin.home');
})->name('admin.home')->middleware('auth:admin');
