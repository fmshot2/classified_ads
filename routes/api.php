<?php

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Service;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user/services', [ServiceController::class, 'myServices']);
});


Route::prefix('v1')->group(function ()
{
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('services/search/{query}', [ServiceController::class, 'search']);
    Route::get('services/categories', [ServiceController::class, 'categories']);
    Route::get('banner/sliders', [ServiceController::class, 'banner_slider']);
});
