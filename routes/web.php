<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'home'])
    ->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/shared/{token}', [PortfolioController::class, 'publicPortfolio'])
    ->name('portfolio.public');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('portfolio.manage');
    })->name('dashboard');

    Route::get('/portfolio/create', [PortfolioController::class, 'create'])
        ->name('portfolio.create');

    Route::post('/portfolio', [PortfolioController::class, 'store'])
        ->name('portfolio.store');

    Route::get('/portfolio/{id}/templates', [PortfolioController::class, 'templates'])
        ->name('portfolio.templates');

    Route::get('/portfolio/{id}/simple', [PortfolioController::class, 'simple'])
        ->name('portfolio.simple');

    Route::get('/portfolio/{id}/modern', [PortfolioController::class, 'modern'])
        ->name('portfolio.modern');

    Route::get('/portfolio/{id}/creative', [PortfolioController::class, 'creative'])
        ->name('portfolio.creative');

    Route::get('/portfolio/{id}/customize', [PortfolioController::class, 'customize'])
        ->name('portfolio.customize');

    Route::post('/portfolio/{id}/customize', [PortfolioController::class, 'saveCustomization'])
        ->name('portfolio.saveCustomization');

    Route::get('/portfolio/{id}/preview', [PortfolioController::class, 'preview'])
        ->name('portfolio.preview');

    Route::get('/portfolio/manage', [PortfolioController::class, 'manage'])
        ->name('portfolio.manage');

    Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'edit'])
        ->name('portfolio.edit');

    Route::put('/portfolio/{id}', [PortfolioController::class, 'update'])
        ->name('portfolio.update');

    Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])
        ->name('portfolio.destroy');

    Route::post('/portfolio/{id}/share', [PortfolioController::class, 'toggleShare'])
        ->name('portfolio.share');
});