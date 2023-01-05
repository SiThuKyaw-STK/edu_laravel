<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    public function welcome()
    {
        $grades = Grade::all();
        return view('frontend.welcome', compact('grades'));
    }

    public function lessons()
    {
        $grades = Grade::all();
        $users = User::all();
        $lessons = Lesson::when(isset(request()->search), function ($q) {
            $q->orwhere('title', 'Like', '%' . request()->search . '%')->orwhere('description', 'Like', '%' . request()->search . '%');
        })->latest('id')->with(['getGrade','getSubject','getUser'])->paginate(8);
        return view('frontend.lessons', compact('grades', 'lessons','users'));
    }

    public function lessonShow($id)
    {
        $lesson = Lesson::find($id);
        $grades = Grade::all();
        $users = User::all();
        $relatedPosts = Lesson::with(['getUser','getGrade','getSubject'])
            ->where('grade_id', "$lesson->grade_id")
            ->where('subject_id', "$lesson->subject_id")
            ->where('id','!=',"$id")
            ->get();

//        return $relatedPosts;
        return view('frontend.lesson_show', compact('lesson', 'grades', 'relatedPosts','users'));
    }

    public function lessonsByGrade($id){
        $lessons = Lesson::where('grade_id',"$id")->latest()->with(['getGrade','getSubject','getUser'])->paginate(8);
        $grades = Grade::all();
        $users = User::all();
        return view('frontend.lessons',compact('lessons','grades','users'));
    }

    public function lessonsByUploader($id){
        $lessons = Lesson::where('user_id',"$id")->latest()->with(['getGrade','getSubject','getUser'])->paginate(8);
        $grades = Grade::all();
        $users = User::all();
        return view('frontend.lessons',compact('lessons','grades','users'));
    }
}
