<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', [AccountController::class, 'Test']);
Route::post('/save', [AccountController::class, 'index']);
Route::get('/accounts', [AccountController::class, 'GetAll']);
Route::get('/remove-data', [AccountController::class, 'RemoveData']);
Route::post('/IsMpinExists', [AccountController::class, 'IsMpinExists']);
Route::post('/update-card-status', [AccountController::class, 'update_card_status']);
Route::post('/profileupload', [AccountController::class, 'ProfileImageUpload']);