<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AffiliatesController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\HomeController;
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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('', [HomeController::class, 'index'])->name('home.index');

    /**
     * File Routes
     */
    Route::get('files/read', [FilesController::class, 'read'])->name('files.read');
    Route::post('files/read', [FilesController::class, 'store'])->name('files.store');

    /**
     * Affiliate Routes
     */
    Route::get('affiliates', [AffiliatesController::class, 'index'])->name('affiliates.index');
    Route::get('affiliates/{distance_km}', [AffiliatesController::class, 'searchAPI'])
        ->whereNumber('distance_km')
        ->name('affiliates.search');

    /**
     * About Routes
     */
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
});
