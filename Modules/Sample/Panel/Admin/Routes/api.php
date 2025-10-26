<?php

use Illuminate\Support\Facades\Route;
use Modules\Sample\Panel\Admin\Http\Controllers\AdminModelController;

Route::prefix(API_VERSION_PREFIX)->name(API_VERSION_NAME)->group(function () {
    Route::prefix(BACKEND_PREFIX)->name(BACKEND_NAME)->middleware(DEFAULT_AUTH_MIDDLEWARES)->group(function () {
        Route::prefix(ADMIN_PREFIX)->name(ADMIN_NAME)->middleware(DEFAULT_ADMIN_MANAGER_MIDDLEWARES)->group(function () {
            Route::prefix('models')->name('models.')->group(function () {
                Route::get('/models', [AdminModelController::class, 'index'])->name('index');
                Route::post('/models', [AdminModelController::class, 'store'])->name('store');
                Route::get('/models/{model}', [AdminModelController::class, 'show'])->name('show');
                Route::match(['put', 'patch'], '/models/{model}', [AdminModelController::class, 'update'])->name('update');
                Route::delete('/models/{model}', [AdminModelController::class, 'destroy'])->name('destroy');
            });
        });
    });
});
