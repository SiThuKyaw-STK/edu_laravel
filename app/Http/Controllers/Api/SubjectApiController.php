<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::latest('id')->paginate(10);

        return response()->json($subjects);
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
            'grade' => 'required',
            'subject_title' => 'required|min:5|max:100',
            'user_id' => 'required'
        ]);

        $subject = Subject::create([
            'grade_id' => $request->grade,
            'title' => $request->subject_title,
            'slug' => Str::slug($request->subject_title),
            'user_id' => $request->user_id
        ]);

        return response()->json($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        if (is_null($subject)){
            return response()->json(["message"=>"Subject not found!"],404);
        }
        return response()->json($subject);
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
            'grade' => 'required',
            'subject_title' => 'required|min:5|max:100',
            'user_id' => 'required'
        ]);

        $subject = Subject::find($id);
        if (is_null($subject)){
            return response()->json(["message"=>"Subject not found!"],404);
        }
        $subject->grade_id = $request->grade;
        $subject->title = $request->subject_title;
        $subject->user_id = $request->user_id;
        $subject->update();

        return response()->json($subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        if (is_null($subject)){
            return response()->json(["message"=>"Subject not found!"],404);
        }
        $subject->delete();
        return response()->json('',204);
    }
}
