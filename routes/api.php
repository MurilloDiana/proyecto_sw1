<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetronomeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('metronome')->group(function () {
    Route::post('start', [MetronomeController::class, 'start']);
    Route::post('stop', [MetronomeController::class, 'stop']);
    Route::post('tempo', [MetronomeController::class, 'setTempo']);
});