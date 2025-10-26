<?php

use Illuminate\Support\Facades\Route;
use Modules\Sample\Panel\User\Http\Controllers\UserModelController;

Route::prefix(API_VERSION_PREFIX)->name(API_VERSION_NAME)->group(function () {
    Route::prefix(BACKEND_PREFIX)->name(BACKEND_NAME)->middleware(DEFAULT_AUTH_MIDDLEWARES)->group(function () {
        Route::prefix(USER_PREFIX)->name(USER_NAME)->middleware(DEFAULT_USER_MIDDLEWARES)->group(function () {
            Route::prefix('models')->name('models.')->group(function () {
                Route::get('/models', [UserModelController::class, 'index'])->name('index');
            });
        });
    });
});
