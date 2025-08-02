<?php

use Illuminate\Support\Facades\Route;
use Luska066\LaravelAsaas\Http\Controllers\Customer\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your SDK. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

Route::prefix('v1')->group(function () {
    Route::apiResource('customers', CustomerController::class);

    // Additional customer-specific routes can be added here
    // Example: Route::post('customers/{id}/restore', [CustomerController::class, 'restore']);
});
