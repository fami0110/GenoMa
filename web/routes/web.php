<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CulinaryController;
use App\Http\Controllers\CulturesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MsmesController;
use App\Http\Controllers\TourismController;
use App\Models\Culinary;
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

Route::middleware('localization')->group(function() {

    Route::get('/', [HomeController::class, 'index']);
    
    Route::get('/tourism', [TourismController::class, 'index']);
    Route::get('/tourism/{id}', [TourismController::class, 'show']);
    
    Route::get('/msmes', [MsmesController::class, 'index']);
    Route::get('/msmes/{id}', [MsmesController::class, 'show']);
    
    Route::get('/cultures', [CulturesController::class, 'index']);
    Route::get('/cultures/{id}', [CulturesController::class, 'show']);
    
    Route::get('/culinary ', [CulinaryController::class, 'index']);
    Route::get('/culinary/{id}', [CulinaryController::class, 'show']);

    Route::get('/locale/{lang}', [LocalController::class, 'change']);

    Route::get('/logout', [LoginController::class, 'logout'])->middleware('admin');
    
    Route::middleware('guest')->group(function() {
        Route::get('/login', [LoginController::class, 'index']); 
        Route::post('/login', [LoginController::class, 'process']); 
    });

    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'process']);
    
    Route::prefix('admin')->group(function () {
        Route::middleware('admin')->group(function () {

            Route::get('/tourism', [TourismController::class, 'admin']);
            Route::post('/tourism/{id}', [TourismController::class, 'store']);
            Route::put('/tourism/{id}', [TourismController::class, 'update']);
            Route::delete('/tourism/{id}', [TourismController::class, 'delete']);
            
            Route::get('/msmes', [MsmesController::class, 'admin']);
            Route::post('/msmes/{id}', [MsmesController::class, 'store']);
            Route::put('/msmes/{id}', [MsmesController::class, 'update']);
            Route::delete('/msmes/{id}', [MsmesController::class, 'delete']);
            
            Route::get('/cultures', [CulturesController::class, 'admin']);
            Route::post('/cultures/{id}', [CulturesController::class, 'store']);
            Route::put('/cultures/{id}', [CulturesController::class, 'update']);
            Route::delete('/cultures/{id}', [CulturesController::class, 'delete']);
            
            Route::get('/culinary ', [CulinaryController::class, 'admin']);
            Route::post('/culinary/{id}', [CulinaryController::class, 'store']);
            Route::put('/culinary/{id}', [CulinaryController::class, 'update']);
            Route::delete('/culinary/{id}', [CulinaryController::class, 'delete']);
        });

    });
});


