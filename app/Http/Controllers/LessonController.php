<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();

        return view('dashboard.lesson.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();

        return view('dashboard.lesson.create',compact('grades'));
    }

    public function getSubjects($id){
        $subjects = Subject::where('grade_id',$id)->pluck("title","id");
        return json_encode($subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonRequest $request)
    {
        $lesson = new Lesson();
        $lesson->grade_id = $request->grade;
        $lesson->subject_id = $request->subject;
        $lesson->title = $request->lesson_title;
        $lesson->slug = Str::slug($request->lesson_title);
        $lesson->description = $request->lesson_des;
        $lesson->excerpt = Str::words($request->lesson_des,10," .....");
        $lesson->user_id = Auth::id();
        $lesson->save();

        return redirect()->route('lesson.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $grades = Grade::all();

        return view('dashboard.lesson.edit',compact('lesson','grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLessonRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->grade_id = $request->grade;
        $lesson->subject_id = $request->subject;
        $lesson->title = $request->lesson_title;
        $lesson->slug = Str::slug($request->lesson_title);
        $lesson->description = $request->lesson_des;
        $lesson->excerpt = Str::words($request->lesson_des,10,"....");
        $lesson->update();

        return redirect()->route('lesson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lesson.index');
    }
}
