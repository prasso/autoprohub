<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for the AutoProHub package.
| These routes are loaded by the AutoProHubServiceProvider within a group which
| is assigned the "api" middleware group and the "autoprohub" prefix.
|
*/

Route::prefix('autoprohub')->middleware('api')->group(function () {
    // Define your API routes here
    // Example: Route::get('/customers', [CustomerController::class, 'index']);
});
