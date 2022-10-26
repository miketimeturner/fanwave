<?php

use App\Http\Controllers\GetFixturesController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('fixtures/{service}', GetFixturesController::class)->name('fixtures');
});
