<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::latest('id')->with('getLessonImages')->paginate(10);

        return response()->json($lessons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'grade' => 'required|exists:grades,id',
            'subject' => 'required|exists:subjects,id',
            'lesson_title' => 'required|min:3',
            'lesson_description' => 'required|min:10',
            'header_image' => 'nullable|mimes:jpeg,png|file|max:10000',
            'user_id' => 'required|exists:users,id',
            'lesson_images.*' => 'nullable|mimes:jpeg,png|file|max:10000',
        ]);

        $lesson = Lesson::create([
            "grade_id" => $request->grade,
            "subject_id" => $request->subject,
            "title" => $request->lesson_title,
            "excerpt_title" => Str::substrReplace($request->lesson_title,"...",25),
            "slug" => Str::slug($request->lesson_title),
            "description" => $request->lesson_description,
            "excerpt" => Str::substrReplace($request->lesson_description,"...",50),
            "user_id" => $request->user_id
        ]);

       if ($request->lesson_images){
           $photos = [];
           foreach ($request->file('lesson_images') as $key=>$photo) {
               $newName = $photo->store('public/lesson_image');
               $photos[$key] = new Photo(['name'=>$newName]);
           }
           $lesson->getLessonImages()->saveMany($photos);
       }

        return response($lesson);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::with('getLessonImages')->find($id);
        if (is_null($lesson)){
            return response()->json(["message"=>"Lesson not found!"],404);
        }
        return response()->json($lesson);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required|exists:grades,id',
            'subject' => 'required|exists:subjects,id',
            'lesson_title' => 'required|min:3',
            'lesson_description' => 'required|min:10',
            'header_image' => 'nullable|mimes:jpeg,png|file|max:10000',
            'user_id' => 'required|exists:users,id',
            'lesson_images.*' => 'nullable|mimes:jpeg,png|file|max:10000',
        ]);

        $lesson = Lesson::find($id);
        if (is_null($lesson)){
            return response()->json(["message"=>"Subject not found!"],404);
        }

            $lesson->grade_id = $request->grade;
            $lesson->subject_id = $request->subject;
            $lesson->title = $request->lesson_title;
            $lesson->excerpt_title = Str::substrReplace($request->lesson_title,"...",25);
            $lesson->slug = Str::slug($request->lesson_title);
            $lesson->description = $request->lesson_description;
            $lesson->excerpt = Str::substrReplace($request->lesson_description,"...",50);
            $lesson->user_id = $request->user_id;
            $lesson->update();

            return response()->json($lesson);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::with('getLessonImages')->find($id);
        if (is_null($lesson)){
            return response()->json(["message"=>"Lesson not found!"],404);
        }

        foreach ($lesson->getLessonImages as $photo){
            Storage::delete('public/lesson_image/'.$photo->name);
            $photo->delete();
        }

        $lesson->delete();
        return response()->json('',204);
    }
}
