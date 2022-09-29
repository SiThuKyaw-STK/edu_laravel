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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/getSubjects/{id}',[LessonController::class,'getSubjects'])->name('lesson.getSubjects');


Route::middleware("auth")->prefix("dashboard")->group(function (){
    Route::resource('/lesson',LessonController::class);
    Route::resource('/subject',SubjectController::class)->middleware('isAdminOrEditor');

});
