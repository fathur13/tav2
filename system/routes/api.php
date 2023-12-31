<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sensor', [ApiController::class, 'allData']);
Route::get('/sensor/{id}', [ApiController::class, 'show']);
Route::get('/sensors/latest', [ApiController::class, 'latest']);
Route::get('/sensors/date_range', [ApiController::class, 'getByDateRange']);

Route::get('/locations', [ApiController::class, 'getLocations']);

Route::post('/sensorpost', [ApiPostController::class, 'storeOrUpdate']);