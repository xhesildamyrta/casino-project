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

Route::get('/',[App\Http\Controllers\CasinoController::class, 'index'])->name('home');
Route::post('/save-click', [App\Http\Controllers\CasinoController::class, 'saveLogAndDB'])->name('saveClick');

Route::middleware('guest')->group(function () {
    Route::get('/login',[App\Http\Controllers\HomeController::class, 'showLogin'])->name('login');
    Route::post('/login',[App\Http\Controllers\HomeController::class, 'loginAction'])->name('custom.login');
});

Route::middleware('userLoggedIn')->group(function () {
    Route::get('/dashboard',[App\Http\Controllers\HomeController::class, 'showDashboard'])->name('dashboard');
    Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logOut'])->name('logout');
    Route::get('/filter',  [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');
});

