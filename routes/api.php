<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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
Route::prefix('v1')->group(function (){
    Route::apiResource('users',UserController::class);
    Route::apiResource('comments',CommentController::class);
    Route::apiResource('posts',PostController::class);
});
//Route::controller(UserController::class)->name('api.')->group(function(){
//    Route::get('/users','index')->name('index');
//    Route::post('/users','store')->name('store');
//    Route::get('/users/{user}','show')->name('show');
//    Route::patch('/users/{user}','update')->name('update');
//    Route::delete('/users/{user}','destroy')->name('destroy');
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
