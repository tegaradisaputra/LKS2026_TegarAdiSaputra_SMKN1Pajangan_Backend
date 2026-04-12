<?php

use App\Http\Controllers\Api\ApplicationLogsController;
use App\Http\Controllers\Api\BusinessVerificationController;
use App\Http\Controllers\Api\FinancingApplicationController;
use App\Http\Controllers\Api\InstallmentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Authentication routes
    Route::post('auth/register', RegisterController::class);
    Route::post('auth/login', LoginController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('auth/logout', LogoutController::class);

        // Resource routes

        // Business Verification
        Route::apiResource('business-verifications', BusinessVerificationController::class)
            ->only(['index', 'store', 'show']);
        Route::patch('business-verifications/{businessVerification}/approve', [BusinessVerificationController::class, 'approve']);
        
        // Financing Application
        Route::apiResource('financing-applications', FinancingApplicationController::class)
            ->only(['index', 'store', 'show']);
        Route::patch('financing-applications/{financingApplication}/analyze', [FinancingApplicationController::class, 'analyze']);
        Route::patch('financing-applications/{financingApplication}/approve', [FinancingApplicationController::class, 'approve']);

        // Nested resource for installments under financing applications - read only
        Route::get('financing-applications/{financingApplication}/installments', [InstallmentsController::class, 'index']);
        Route::get('financing-applications/{financingApplication}/logs', [ApplicationLogsController::class, 'index']);

    });
});