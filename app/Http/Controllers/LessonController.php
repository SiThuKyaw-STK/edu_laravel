<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Photo;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::latest("id")
            ->when(Auth::user()->isAuthor(),fn($q)=>$q->where("user_id",Auth::id()))
            ->with(['getGrade','getSubject','getUser'])
            ->get();


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

//        save lesson
        $lesson = new Lesson();
        $lesson->grade_id = $request->grade;
        $lesson->subject_id = $request->subject;
        $lesson->title = $request->lesson_title;
        $lesson->excerpt_title = Str::substrReplace($request->lesson_title,"...",25);
        $lesson->slug = Str::slug($request->lesson_title);
        $lesson->description = $request->lesson_description;
        $lesson->excerpt = Str::substrReplace($request->lesson_description,"...",50);
        $lesson->user_id = Auth::id();

        if ($request->hasFile('header_image')){
            $image = Image::make($request->file('header_image'))->resize(500,500,function ($x){
                $x->aspectRatio();
                $x->upsize();
            })->encode('jpg');
            $newName = uniqid()."_header_image.".$request->file('header_image')->extension();
            Storage::put("public/header_image/".$newName,$image);
            $lesson->header_image = $newName;
        }
        $lesson->save();

//        save lesson photo

        if ($request->lesson_images){
            foreach ($request->lesson_images as $lesson_image){
                //        1.save to storage
                $newName = uniqid()."_lesson_image.".$lesson_image->extension();
                $lesson_image->storeAs('public/lesson_image',$newName);
                //        2.save to db
                $photo = new Photo();
                $photo->lesson_id = $lesson->id;
                $photo->name = $newName;
                $photo->save();
            }
        }



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
        Gate::authorize('view',$lesson);

        return view('dashboard.lesson.show',compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {

        Gate::authorize('update',$lesson);
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
        if (Gate::denies('update',$lesson)){
            return abort(401);
        }

//        update lesson
        $lesson->grade_id = $request->grade;
        $lesson->subject_id = $request->subject;
        $lesson->title = $request->lesson_title;
        $lesson->excerpt_title = Str::substrReplace($request->lesson_title,"...",25);
        $lesson->slug = Str::slug($request->lesson_title);
        $lesson->description = $request->lesson_description;
        $lesson->excerpt = Str::substrReplace($request->lesson_description,"...",50);

        if ($request->hasFile('header_image')){
//            delete old photo
            Storage::delete('public/header_image/'.$lesson->header_image);

//            update and upload new photo
            $image = Image::make($request->file('header_image'))->resize(500,500,function ($x){
                $x->aspectRatio();
                $x->upsize();
            })->encode('jpg');
            $newName = uniqid()."_header_image.".$request->file('header_image')->extension();
            Storage::put("public/header_image/".$newName,$image);
            $lesson->header_image = $newName;
        }
        $lesson->update();

        //        update lesson photo

        if ($request->lesson_images){
            foreach ($request->lesson_images as $lesson_image){
                //        1.save to storage
                $newName = uniqid()."_lesson_image.".$lesson_image->extension();
                $lesson_image->storeAs('public/lesson_image',$newName);
                //        2.save to db
                $photo = new Photo();
                $photo->lesson_id = $lesson->id;
                $photo->name = $newName;
                $photo->save();
            }
        }


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        if (Gate::denies('delete',$lesson)){
            return abort(401);
        }
        if ($lesson->header_image){
            Storage::delete('public/header_image/'.$lesson->header_image);
        }

        foreach ($lesson->getLessonImages as $photo){
            Storage::delete('public/lesson_image/'.$photo->name);
            $photo->delete();
        }

        $lesson->delete();
        return redirect()->route('lesson.index');
    }
}
