<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserProfileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message"=>"User not found!"],404);
        }
        return response()->json($user);
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
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'bio' => "nullable|string|min:100",
            'user_image' => "nullable|mimetypes:image/jpeg,image/png|file|max:2500"
        ]);

        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message"=>"User not found!"],404);
        }

        if ($request->has('name')){
            $user->name = $request->name;
        }
        if ($request->has('email')){
            $user->email = $request->email;
        }
        if ($request->has('password')){
            $user->password = $request->password;
        }
        if ($request->has('bio')){
            $user->bio = $request->bio;
        }
        if ($request->hasFile('user_image')) {

            $image = Image::make($request->file('user_image'))->fit(500, 500)->encode('jpg');


            $dir = "public/profile/";

            Storage::delete($dir . $user->user_image);

            $newName = uniqid() . "_user_image." . $request->file("user_image")->getClientOriginalExtension();
            Storage::put("public/profile/".$newName,$image);
            $user->user_image = $newName;

        }
        $user->update();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
