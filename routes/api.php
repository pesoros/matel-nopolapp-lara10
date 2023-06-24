<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\NopolController;
use App\Http\Controllers\API\DbCopyController;

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

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::middleware('auth:sanctum')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('access', 'access');
    });
    Route::controller(NopolController::class)->group(function(){
        Route::get('nopol/search', 'getNopol');
        Route::get('nopol/truncate', 'truncateNopol');
        Route::post('nopol/import', 'importNopol');
        Route::post('nopol/importloop', 'importNopolLoop');
    });
    Route::controller(DbCopyController::class)->group(function(){
        Route::get('db/checkversion', 'checkVersion');
        Route::get('db/copy', 'copyingDB');
    });
});