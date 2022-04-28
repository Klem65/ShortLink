<?php

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

Route::get('/', [\App\Http\Controllers\UrlController::class, 'index'])->name('index');

Route::post('url', [\App\Http\Controllers\UrlController::class, 'url'])->name('url');

Route::get('short/{code}', [\App\Http\Controllers\UrlController::class, 'redirect'])->name('short_url');
