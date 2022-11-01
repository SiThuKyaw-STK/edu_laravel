<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Http\Request;

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
        $lessons = Lesson::when(isset(request()->search), function ($q) {
            $q->orwhere('title', 'Like', '%' . request()->search . '%')->orwhere('description', 'Like', '%' . request()->search . '%');
        })->latest('id')->paginate(8);
        return view('frontend.lessons', compact('grades', 'lessons'));
    }

    public function lessonShow($id)
    {
        $lesson = Lesson::find($id);
        $grades = Grade::all();
        $relatedPosts = Lesson::with(['getUser','getGrade','getSubject'])
            ->where('grade_id', "$lesson->grade_id")
            ->where('subject_id', "$lesson->subject_id")
            ->where('id','!=',"$id")

            ->get();

//        return $relatedPosts;
        return view('frontend.lesson_show', compact('lesson', 'grades', 'relatedPosts'));
    }
}
