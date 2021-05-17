<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LevelController;
use App\Http\Controllers\API\PenggunaController;
use App\Http\Controllers\API\UnitController;
use App\Http\Controllers\API\PekerjaanController;

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

Route::apiResources([
    'user' => PenggunaController::class,
]);

Route::apiResources([
    'pekerjaan' => PekerjaanController::class,
]);

Route::apiResources([
    'ambildataunit' => UnitController::class,
]);

Route::apiResources([
    'ambildatalevel' => LevelController::class,
]);
