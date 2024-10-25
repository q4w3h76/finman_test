<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;

Route::prefix('transactions')
    ->middleware('auth')
    ->resource(
        'transactions', 
        TransactionController::class,
        ['except' => ['show']]
    );

Route::controller(RegisterController::class)
    ->prefix('register')
    ->name('register.')
    ->middleware('guest')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

Route::controller(AuthController::class)
    ->name('auth.')
    ->group(function () {
        Route::prefix('login')
            ->name('login.')
            ->middleware('guest')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'login')->name('login');
            });
        Route::middleware('auth')
            ->post('/logout', 'logout')
            ->name('logout');
    });

Route::middleware('auth')->get('/', function () {
    return redirect()->route('transactions.index');
});