<?php

use Illuminate\Support\Facades\Route;

Route::prefix(API_VERSION)->name(API_VERSION)->group(function () {
    Route::prefix(BACKEND_PREFIX)->name(BACKEND_PREFIX)->middleware(['auth:sanctum','auth.userStatus'])->group(function () {
        Route::prefix(ADMIN_PREFIX)->name(ADMIN_PREFIX)->middleware(['auth.adminOrManager'])->group(function () {

        });

        Route::prefix(USER_PREFIX)->name(USER_PREFIX)->middleware(['auth.user'])->group(function () {

        });
    });

    Route::prefix(FRONTEND_PREFIX)->name(FRONTEND_PREFIX)->group(function () {

    });
});
