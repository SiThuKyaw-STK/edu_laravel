<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SubjectController;

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
    return view('frontend.welcome');
});

Auth::routes();

Route::get('/getSubjects/{id}',[LessonController::class,'getSubjects'])->name('lesson.getSubjects');



Route::middleware(["auth","isBaned"])->group(function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::middleware('isAdmin')->group(function (){
        Route::get('/user',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
        Route::post('/make-editor',[\App\Http\Controllers\UserController::class,'makeEditor'])->name('user.makeEditor');
        Route::post('/make-user',[\App\Http\Controllers\UserController::class,'makeUser'])->name('user.makeUser');
        Route::post('/ban',[\App\Http\Controllers\UserController::class,'ban'])->name('user.ban');
        Route::post('/restore',[\App\Http\Controllers\UserController::class,'restore'])->name('user.restore');
    });

    Route::resource('/lesson',LessonController::class);
    Route::resource('/subject',SubjectController::class)->middleware('isAdminOrEditor');

});
