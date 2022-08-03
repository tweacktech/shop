<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\VendorController;

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
    // AuthController Route for user model
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/profile',[AuthController::class,'profile']);
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/update/{id}',[AuthController::class,'update']);
Route::post('/delete/{id}',[AuthController::class,'delete']);

    // AssetController for Asset model
Route::get('/asset',[AssetController::class,'index']);
Route::get('/A_show/{id}',[AssetController::class,'show']);
Route::post('/A_store',[AssetController::class,'store']);
Route::post('/A_update/{id}',[AssetController::class,'update']);
Route::post('/A_delete/{id}',[AssetController::class,'delete']);


 // VendorController for Asset model
Route::get('/vendor',[VendorController::class,'index']);
Route::get('/V_show/{id}',[VendorController::class,'show']);
Route::post('/V_store',[VendorController::class,'store']);
Route::post('/V_update/{id}',[VendorController::class,'update']);
Route::post('/V_delete/{id}',[VendorController::class,'delete']);

