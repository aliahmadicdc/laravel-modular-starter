<?php

use Illuminate\Support\Facades\Route;
use Modules\Sample\Front\Http\Controllers\FrontModelController;

Route::prefix(API_VERSION_PREFIX)->name(API_VERSION_NAME)->group(function () {
    Route::prefix(FRONTEND_PREFIX)->name(FRONTEND_NAME)->group(function () {
        Route::prefix('models')->name('models.')->group(function () {
            Route::get('/models', [FrontModelController::class, 'index'])->name('index');
        });
    });
});
