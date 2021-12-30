<?php

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
//route for register user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
// route for login 
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
 
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    
    Route::get('/users', [App\Http\Controllers\API\AuthController::class, 'getUsers']);
    // API route logout 
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});