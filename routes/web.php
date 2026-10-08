<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'home'])
    ->name('home');

Route::get('/portfolio/create', [PortfolioController::class, 'create'])
    ->name('portfolio.create');

Route::post('/portfolio', [PortfolioController::class, 'store'])
    ->name('portfolio.store');


/*
|--------------------------------------------------------------------------
| Template Selection
|--------------------------------------------------------------------------
*/

Route::get('/portfolio/{id}/templates', [PortfolioController::class, 'templates'])
    ->name('portfolio.templates');

Route::get('/portfolio/{id}/simple', [PortfolioController::class, 'simple'])
    ->name('portfolio.simple');

Route::get('/portfolio/{id}/modern', [PortfolioController::class, 'modern'])
    ->name('portfolio.modern');

Route::get('/portfolio/{id}/creative', [PortfolioController::class, 'creative'])
    ->name('portfolio.creative');


/*
|--------------------------------------------------------------------------
| Portfolio Preview
|--------------------------------------------------------------------------
*/

Route::get('/portfolio/{id}/preview', [PortfolioController::class, 'preview'])
    ->name('portfolio.preview');


/*
|--------------------------------------------------------------------------
| Portfolio Management
|--------------------------------------------------------------------------
*/

Route::get('/portfolio/manage', [PortfolioController::class, 'manage'])
    ->name('portfolio.manage');

Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'edit'])
    ->name('portfolio.edit');

Route::put('/portfolio/{id}', [PortfolioController::class, 'update'])
    ->name('portfolio.update');

Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])
    ->name('portfolio.destroy');