<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

// Register route
Route::post('/registrations', [RegisterController::class, 'register'])->middleware('throttle:5,1');
Route::get('/sendVerifyEmail', [RegisterController::class, 'sendVerifyEmail'])->middleware('throttle:1,2');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifiedEmail'])->name('verification.verify')->middleware('throttle:5,1');;
