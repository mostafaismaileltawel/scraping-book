<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapingController;
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


// Route::get('/scraping', [ScrapingController::class, 'frist_scraping'])->name('scraping');
Route::get('/', [ScrapingController::class, 'index'])->name('all');
Route::get('/data2', [ScrapingController::class, 'get_scraping'])->name('more');
