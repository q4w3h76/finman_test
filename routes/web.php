<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::prefix('transactions')->resource('transactions', TransactionController::class);
