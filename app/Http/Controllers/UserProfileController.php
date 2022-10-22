<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    public function profile(){
        return view('user-profile.profile');
    }

    public function editPhoto(){
        return view('user-profile.edit-photo');
    }
    public function changePhoto(Request $request){
        $request->validate([
            "photo" => "required|mimetypes:image/jpeg,image/png|file|max:2500"
        ]);

        if ($request->hasFile('photo')) {

            $image = Image::make($request->file('photo'))->fit(500, 500)->encode('jpg');


            $dir = "public/profile/";

            Storage::delete($dir . Auth::user()->user_image);

            $newName = uniqid() . "_photo." . $request->file("photo")->getClientOriginalExtension();
            Storage::put("public/profile/".$newName,$image);

        }
        $user = User::find(Auth::id());
        $user->user_image = $newName;
        $user->update();

        return redirect()->route("user-profile.editPhoto");
    }

    public function changeName(Request $request){
        $request->validate([
            'name' => "required|min:3|max:50",
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->update();
        return redirect()->route("user-profile.editPhoto");
    }

    public function changeEmail(Request $request){
        $request->validate([
            'email' => "required|min:3|max:50",
        ]);
        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->update();
        return redirect()->route("user-profile.editPhoto");
    }
}
