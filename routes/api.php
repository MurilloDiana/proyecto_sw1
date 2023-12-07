<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetronomeController;
use App\Http\Controllers\AfinadorController;
use App\Http\Controllers\CancionesController;
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
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::post('/users', 'App\Http\Controllers\UserController@store');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::put('/users/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy');

Route::prefix('metronome')->group(function () {
    Route::post('start', [MetronomeController::class, 'start']);
    Route::post('stop', [MetronomeController::class, 'stop']);
    Route::post('tempo', [MetronomeController::class, 'setTempo']);
});

Route::get('/afinador',[AfinadorController::class,'start']);

Route::post('/login','App\Http\Controllers\UserController@login');
Route::get('/canciones','App\Http\Controllers\CancionesController@show');
Route::post('/cancionesagg','App\Http\Controllers\CancionesController@create');
