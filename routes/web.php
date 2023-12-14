<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', WelcomeController::class)->name('welcome');

Route::view('license','license')->name('license');
Route::view('terms','terms')->name('terms');

Route::controller(ImageController::class)->prefix('/images')->name('images.')
    ->group(function () {
        Route::post('/fetch', 'fetch')->name('fetch');
    });

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ImageController::class)->prefix('images')->name('images.')->group(function () {
       Route::get('/upload', 'create')->name('upload');
       Route::post('/upload', 'store')->name('upload.store');
       Route::get('/buy/{image}', 'buy')->name('buy');
       Route::post('/purchase/{image}', 'purchase')->name('purchase');
       Route::get('/download/{image}', 'download')->name('download');
    });
});

require __DIR__.'/auth.php';
