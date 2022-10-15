<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            "photo" => "required|mimetypes:image/jpeg,image/png|dimensions:ratio=1/1|file|max:2500"
        ]);
        $dir="public/profile/";

        Storage::delete($dir.Auth::user()->user_image);

        $newName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir,$newName);

        $user = User::find(Auth::id());
        $user->user_image = $newName;
        $user->update();

        return redirect()->route("user-profile.editPhoto");

    }
}
