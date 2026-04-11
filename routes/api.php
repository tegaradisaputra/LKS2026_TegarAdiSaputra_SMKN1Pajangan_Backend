<?php

use App\Http\Controllers\Api\ApplicationLogsController;
use App\Http\Controllers\Api\BusinessVerificationController;
use App\Http\Controllers\Api\FinancingApplicationController;
use App\Http\Controllers\Api\InstallmentsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth
Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

Route::apiResource('/users', UserController::class);
Route::apiResource('/business-verifications', BusinessVerificationController::class);
Route::apiResource('/financing-applications', FinancingApplicationController::class);
Route::apiResource('/installments', InstallmentsController::class);
Route::apiResource('/application-logs', ApplicationLogsController::class);