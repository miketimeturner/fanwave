<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', ApplicationController::class)->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/{any?}', ApplicationController::class)
    ->middleware('auth:sanctum')
    ->where('any', '^(?!_).*$')
    ->name('application');
