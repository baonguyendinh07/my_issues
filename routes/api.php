<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/logout', [LogoutController::class, 'logout']);
});

// Register route
Route::post('/registrations', [RegisterController::class, 'register'])->middleware('throttle:5,1');
Route::get('/sendVerifyEmail', [RegisterController::class, 'sendVerifyEmail'])->middleware('throttle:2,1');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifiedEmail'])->name('verification.verify')->middleware('throttle:5,1');

Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
