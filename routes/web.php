<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

Route::get('/', HomeController::class);

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])
    ->name('portfolio.index');

Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])
    ->name('portfolio.show');
Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/services/{slug}', [ServiceController::class, 'show'])
    ->name('services.show');
    Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');
