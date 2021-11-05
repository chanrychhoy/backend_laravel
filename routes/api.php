<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authorController;
use App\Http\Controllers\bookController;
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
//author
Route::get ('authors',[authorController::class,'index']);
Route::get ('authors/{id}',[authorController::class,'show']);

Route::post ('authors',[authorController::class,'store']);
Route::put ('authors/{id}',[authorController::class,'update']);
Route::delete ('authors/{id}',[authorController::class,'destroy']);

//books
Route::get ('books',[bookController::class,'index']);
Route::get ('books/{id}',[bookController::class,'show']);

Route::post ('books',[bookController::class,'store']);
Route::put ('books/{id}',[bookController::class,'update']);
Route::delete ('books/{id}',[bookController::class,'destroy']);