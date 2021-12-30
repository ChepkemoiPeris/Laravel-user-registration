<?php

use Illuminate\Support\Facades\Route; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('users', [App\Http\Controllers\API\AuthController::class, 'Admin']);  
Route::post('login', 'App\Http\Controllers\API\AuthController@login')->name('login'); 
Route::post('logout', [App\Http\Controllers\API\AuthController::class,'logout']); 
Route::resource('user','\App\Http\Controllers\api\AuthController');