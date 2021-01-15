<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\ShipOrderController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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


Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');

Route::group(['middleware' => 'apiJwt'], function ($router) {
    Route::post('logout', [AuthController::class, 'logout'])->name('api.auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('api.auth.refresh');
    Route::post('me', [AuthController::class, 'me'])->name('api.auth.me');

    Route::get('users', [UserController::class, 'index'])->name('api.user.list');

    Route::get('persons', [PersonController::class, 'all'])->name('api.person.list');
    Route::get('persons/{person}', [PersonController::class, 'find'])->name('api.person.find');

    Route::get('orders', [ShipOrderController::class, 'all'])->name('api.shipOrder.list');
    Route::get('orders/{order}', [ShipOrderController::class, 'find'])->name('api.shipOrder.find');
});