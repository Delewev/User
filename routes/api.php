<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('user/ip', [UserController::class, 'ip']);
Route::get('user', [UserController::class, 'all']);
Route::get('/user/{id}', [UserController::class, 'reture']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('user', [UserController::class, 'create']);
Route::put('/user/{id}', [UserController::class, 'put']);
Route::delete('/user/{id}', [UserController::class, 'delete']);

Route::get('post/ip', [PostController::class, 'ip']);
Route::get('post/coll', [PostController::class, 'show']);
Route::get('post', [PostController::class, 'all']);
Route::get('post/{id}', 'PostController@return');
Route::post('post', [PostController::class, 'create']);
Route::delete('/post/{id}', [PostController::class, 'delete']);

Route::get('grade/coll', [GradeController::class, 'show']);
Route::get('grade', [GradeController::class, 'all']);
Route::post('grade', [GradeController::class, 'create']);
Route::delete('grade/{id}', [GradeController::class, 'delete']);



