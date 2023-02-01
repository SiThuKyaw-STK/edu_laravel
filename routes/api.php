<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\GradeApiController;
use App\Http\Controllers\Api\LessonApiController;
use App\Http\Controllers\Api\PhotoApiController;
use App\Http\Controllers\Api\SubjectApiController;
use App\Http\Controllers\Api\UserApiController;
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
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('/register',[ApiAuthController::class,'register'])->name('api.register');
Route::post('/login',[ApiAuthController::class,'login'])->name('api.login');
Route::post('/change-photo',[UserApiController::class,'changePhoto'])->name('user-profile.changePhoto');

Route::apiResource('lessons',LessonApiController::class);
Route::apiResource('grades',GradeApiController::class);
Route::apiResource('subjects',SubjectApiController::class);
Route::apiResource('users',UserApiController::class);
Route::apiResource('photos',PhotoApiController::class);
Route::get('lessonsByGrade/{id}',[LessonApiController::class,'lessonsByGrade'])->name('api.lessonsByGrade');
Route::get('lessonsByTeacher/{id}',[LessonApiController::class,'lessonsByTeacher'])->name('api.lessonsByTeacher');
Route::get('lessonByGradeSubject/{graId}/{subId}',[LessonApiController::class,'lessonsByGradeSubject'])->name('api.lessonByGradeSubject');
Route::get('subjectsByGrade/{id}',[SubjectApiController::class,'byGrade'])->name('api.subjectsByGrade');


Route::middleware(['auth:sanctum'])->group(function (){

    Route::post('/logout',[ApiAuthController::class,'logout'])->name('api.logout');
    Route::post('/logoutAll',[ApiAuthController::class,'logoutAll'])->name('api.logoutAll');
    Route::get('/tokens',[ApiAuthController::class,'tokens'])->name('api.tokens');

});
