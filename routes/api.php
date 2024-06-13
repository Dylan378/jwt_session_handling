<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login'])->name('api.login');
    Route::post('register', [AuthController::class, 'register'])->name('api.register');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('api.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    
    Route::get('user', function (Request $request) {
        return $request->user();
    });

});