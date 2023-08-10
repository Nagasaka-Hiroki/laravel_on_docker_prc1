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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use App\Http\Middleware\HelloMiddleware;

Route::get('/hello', [HelloController::class, 'index']);
Route::post('/hello',[HelloController::class, 'post']);
Route::get('/person',[PersonController::class,'index']);
Route::get('/person/find',[PersonController::class,'find']);
Route::post('/person/find',[PersonController::class,'search']);
Route::get('/person/add',[PersonController::class, 'add']);
Route::post('/person/add',[PersonController::class, 'create']);
Route::get('/person/edit',[PersonController::class,'edit']);
Route::post('/person/edit',[PersonController::class,'update']);
Route::get('/person/del',[PersonController::class,'delete']);
Route::post('/person/del',[PersonController::class,'remove']);