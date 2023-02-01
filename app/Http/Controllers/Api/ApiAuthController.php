<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request){

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

        if (Auth::attempt($request->only(['email','password']))){
            $token = Auth::user()->createToken("phone")->plainTextToken;
            return response()->json($token);
        }
        return response()->json(["message"=>"User Not Found!!!"],401);
    }

    public function login(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required|min:8"
        ]);
        if (Auth::attempt($request->only(['email','password']))){
            $token = Auth::user()->createToken("phone")->plainTextToken;
            $user = User::select('*')->where('email','=',$request->email)->get();
            return response()->json(["data"=>$user,"token"=>$token]);
        }
        return response()->json(["message"=>"User Not Found!!!"],401);
    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return response()->json(["message"=>"LogOut!!!"]);
    }

    public function logoutAll(){
        Auth::user()->tokens()->delete();
        return response()->json(["message"=>"LogOutAll!!!"]);
    }

    public function tokens(Request $request){
        return Auth::user()->tokens;
    }
}
