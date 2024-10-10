<?php

use App\Http\Controllers\HomeController;
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


Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/tourism', [HomeController::class, 'index']);
    Route::get('/tourism/{id}', [HomeController::class, 'index']);

    Route::get('/msmes', [HomeController::class, 'index']);
    Route::get('/msmes/{id}', [HomeController::class, 'index']);

    Route::get('/cultures', [HomeController::class, 'index']);
    Route::get('/cultures/{id}', [HomeController::class, 'index']);

    Route::get('/cuisines ', [HomeController::class, 'index']);
    Route::get('/cuisines/{id}', [HomeController::class, 'index']);

    Route::get('/contact', [HomeController::class, 'index']);
    Route::post('/contact', [HomeController::class, 'index']);

    Route::get('/', [HomeController::class, 'index']);
});

Route::prefix('admin')->group(function () {
    
});
