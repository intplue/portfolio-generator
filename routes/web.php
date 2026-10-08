<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [PortfolioController::class, 'home'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| Portfolio Information
|--------------------------------------------------------------------------
*/

Route::get('/portfolio/create', [PortfolioController::class, 'create'])
    ->name('portfolio.create');


/*
|--------------------------------------------------------------------------
| Save Portfolio
|--------------------------------------------------------------------------
*/

Route::post('/portfolio', [PortfolioController::class, 'store'])
    ->name('portfolio.store');


/*
|--------------------------------------------------------------------------
| Template Selection
|--------------------------------------------------------------------------
*/

Route::get('/portfolio/{id}/templates', [PortfolioController::class, 'templates'])
    ->name('portfolio.templates');


/*
|--------------------------------------------------------------------------
| Portfolio Templates
|--------------------------------------------------------------------------
*/

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
| Edit Portfolio
|--------------------------------------------------------------------------
*/

Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'edit'])
    ->name('portfolio.edit');


/*
|--------------------------------------------------------------------------
| Update Portfolio
|--------------------------------------------------------------------------
*/

Route::put('/portfolio/{id}', [PortfolioController::class, 'update'])
    ->name('portfolio.update');


/*
|--------------------------------------------------------------------------
| Manage Portfolio
|--------------------------------------------------------------------------
*/

Route::get('/portfolio/manage', [PortfolioController::class, 'manage'])
    ->name('portfolio.manage');


/*
|--------------------------------------------------------------------------
| Delete Portfolio
|--------------------------------------------------------------------------
*/

Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])
    ->name('portfolio.destroy');