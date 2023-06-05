<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StudentController;
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

Route::post('register', [AuthController::class, 'register']);
//Route::post('login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource("student", StudentController::class);
    Route::get('student/search/{username}', [StudentController::class, 'search']);
    Route::get('student',[StudentController::class, 'index']);
    Route::post('student/store',[StudentController::class, 'store']);
    Route::get('student/show/{id}',[StudentController::class, 'show']);
    Route::post('student/update/{id}',[StudentController::class, 'update']);
    Route::get('student/destroy/{id}',[StudentController::class, 'destroy']);
});
