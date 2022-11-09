<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::latest('id')->paginate(10);
        return response()->json($photos);
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
            'lesson_id' => 'required|exists:lessons,id',
            'photos.*' =>  'mimes:jpeg,png|file|max:10000',
        ]);

        foreach ($request->file('photos') as $key=>$photo) {
            $newName = uniqid()."_lesson_image.".$photo->extension();
            $photo->storeAs('public/lesson_image',$newName);
            Photo::create([
                "lesson_id" => $request->lesson_id,
                "name" => $newName
            ]);
        }

        return response()->json(['message'=>'photo are upload']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        if (is_null($photo)){
            return response()->json(["message"=>"photo not found"],404);
        }
        $photo->delete();
        return response()->json('',204);
    }
}
