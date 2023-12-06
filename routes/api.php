<?php

use App\Http\Controllers\DosenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/dosen',[DosenController::class,'store']);
Route::get('/dosen',[DosenController::class,'get']);
Route::get('/usia',[DosenController::class,'getUsia']);
Route::delete('/dosen',[DosenController::class,'delete']);
Route::put('/dosen',[DosenController::class,'update']);
