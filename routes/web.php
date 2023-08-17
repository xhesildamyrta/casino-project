<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/',[App\Http\Controllers\CasinoController::class, 'index'])->name('casino');
Route::post('/save-click', [App\Http\Controllers\CasinoController::class, 'saveLogAndDB'])->name('saveClick');

Route::get('/admin',[App\Http\Controllers\HomeController::class, 'showLogin'])->name('login');
Route::post('/admin',[App\Http\Controllers\HomeController::class, 'loginAction'])->name('custom.login');


