<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function welcome(){
        $grades = Grade::all();
        return view('frontend.welcome',compact('grades'));
    }
    public function lessons(){
        $grades =Grade::all();
        $lessons = Lesson::when(isset(request()->search),function ($q){
            $q->orwhere('title','Like','%'.request()->search.'%')->orwhere('description','Like','%'.request()->search.'%');
        })->with(['getGrade','getSubject','getUser','getLessonImages'])->latest('id')->paginate(8);
        return view('frontend.lessons',compact('grades','lessons'));
    }
}
