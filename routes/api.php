<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\DataPenerbanganController;
use App\Http\Controllers\API\MitraController;
use App\Http\Controllers\API\PenggunaController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\DataHotelController;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [AuthenticationController::class, 'index']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', [AuthenticationController::class, 'getUser']);
    Route::get('refresh', [AuthenticationController::class, 'refreshToken']);
    Route::get('logout', [AuthenticationController::class, 'logout']);

    Route::apiResource('/penggunas', PenggunaController::class, ['except' => ['create', 'edit']]);
    Route::apiResource('/mitras', MitraController::class, ['except' => ['create', 'edit']]);
    Route::apiResource('/admins', AdminController::class, ['except' => ['create', 'edit']]);
    Route::apiResource('/roles', RoleController::class, ['except' => ['create', 'edit']]);
    Route::apiResource('/hotels', DataHotelController::class, ['except' => ['create', 'edit']]);
    Route::apiResource('/penerbangans', DataPenerbanganController::class, ['except' => ['create', 'edit']]);
    Route::apiResource('/bookings', BookingController::class, ['except' => ['create', 'edit']]);
});