<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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

//        return response($lessons);
        return LessonResource::collection($lessons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'grade' => 'required|exists:grades,id',
            'subject' => 'required|exists:subjects,id',
            'lesson_title' => 'required|min:3',
            'lesson_description' => 'required|min:10',
            'user_id' => 'required',
            'header_image' => 'nullable|mimes:jpeg,png|file|max:10000',
            'lesson_images.*' => 'mimes:jpeg,png|file|max:10000',
        ]);

        $lesson = new Lesson();
        $lesson->grade_id = $request->grade;
        $lesson->subject_id = $request->subject;
        $lesson->title = $request->lesson_title;
        $lesson->excerpt_title = Str::substrReplace($request->lesson_title, "...", 25);
        $lesson->slug = Str::slug($request->lesson_title);
        $lesson->description = $request->lesson_description;
        $lesson->excerpt = Str::substrReplace($request->lesson_description, "...", 50);
        $lesson->user_id = $request->user_id;

        if ($request->hasFile('header_image')) {
            $image = Image::make($request->file('header_image'))->resize(500, 500, function ($x) {
                $x->aspectRatio();
                $x->upsize();
            })->encode('jpg');
            $newName = uniqid() . "_header_image." . $request->file('header_image')->extension();
            Storage::put("public/header_image/" . $newName, $image);
            $lesson->header_image = $newName;
        }
        $lesson->save();

//        save lesson photo

        if ($request->lesson_images) {
            foreach ($request->lesson_images as $lesson_image) {
                //        1.save to storage
                $newName = uniqid() . "_lesson_image." . $lesson_image->extension();
                $lesson_image->storeAs('public/lesson_image', $newName);
                //        2.save to db
                $photo = new Photo();
                $photo->lesson_id = $lesson->id;
                $photo->name = $newName;
                $photo->save();
            }
        }


        return response($lesson);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::with('getLessonImages')->find($id);
        if (is_null($lesson)) {
            return response()->json(["message" => "Lesson not found!"], 404);
        }
        return new LessonResource($lesson);
    }

    public function lessonsByGrade($id)
    {
        $lessons = Lesson::where('grade_id', "$id")->latest()->with(['getGrade', 'getSubject', 'getUser'])->paginate(8);

        if (is_null($lessons)) {
            return response()->json(["message" => "Lesson not found!"], 404);
        }
        return LessonResource::collection($lessons);
    }

    public function lessonsByTeacher($id)
    {
        $lessons = Lesson::where('user_id', "$id")->latest()->with(['getGrade', 'getSubject', 'getUser'])->paginate(8);

        if (is_null($lessons)) {
            return response()->json(["message" => "Lesson not found!"], 404);
        }
        return LessonResource::collection($lessons);
    }

    public function lessonsByGradeSubject($graId, $subId)
    {
        $lessons = Lesson::where('grade_id', '=', $graId)
            ->where('subject_id', '=', "{$subId}")
            ->paginate(8);
        if (is_null($lessons)) {
            return response()->json(["message" => "Lesson not found!"], 404);
        }
        return LessonResource::collection($lessons);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required|exists:grades,id',
            'subject' => 'required|exists:subjects,id',
            'lesson_title' => 'required|min:3',
            'lesson_description' => 'required|min:10',
            'user_id' => 'required',
            'header_image' => 'nullable|mimes:jpeg,png|file|max:10000',
            'lesson_images.*' => 'nullable|mimes:jpeg,png|file|max:10000',
        ]);

        $lesson = Lesson::find($id);
        if (is_null($lesson)) {
            return response()->json(["message" => "Subject not found!"], 404);
        }

        $lesson->grade_id = $request->grade;
        $lesson->subject_id = $request->subject;
        $lesson->title = $request->lesson_title;
        $lesson->excerpt_title = Str::substrReplace($request->lesson_title, "...", 25);
        $lesson->slug = Str::slug($request->lesson_title);
        $lesson->description = $request->lesson_description;
        $lesson->excerpt = Str::substrReplace($request->lesson_description, "...", 50);
        $lesson->user_id = $request->user_id;

        if ($request->hasFile('header_image')) {
            // delete old photo
            Storage::delete('public/header_image/'.$lesson->header_image);
            // update and upload new photo
            $image = Image::make($request->file('header_image'))->resize(500, 500, function ($x) {
                $x->aspectRatio();
                $x->upsize();
            })->encode('jpg');
            $newName = uniqid() . "_header_image." . $request->file('header_image')->extension();
            Storage::put("public/header_image/" . $newName,$image);
            $lesson->header_image = $newName;
        }
        $lesson->update();

        return response()->json($lesson);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::with('getLessonImages')->find($id);
        if (is_null($lesson)) {
            return response()->json(["message" => "Lesson not found!"], 404);
        }

        foreach ($lesson->getLessonImages as $photo) {
            Storage::delete('public/lesson_image/' . $photo->name);
            $photo->delete();
        }

        $lesson->delete();
        return response()->json('', 204);
    }
}
