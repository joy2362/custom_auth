<?php

use App\Http\Controllers\User\AuthController;
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

Route::get('/login', function () {
    return view('user.auth.login');
})->name('user.login')->middleware('guest');

Route::post('/login', [AuthController::class , 'login'])->name('login');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('/home', function () {
    return view('user.home');
})->name('user.home')->middleware('auth:web');

