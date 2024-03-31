<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class,'login'])->name('api.auth.login');
    Route::post('/logout', [AuthController::class,'logout'])->name('api.auth.logout');
    Route::post('/refresh', [AuthController::class,'refresh'])->name('api.auth.refresh');
    Route::get('/me', [AuthController::class,'me'])->name('api.auth.me');
});
