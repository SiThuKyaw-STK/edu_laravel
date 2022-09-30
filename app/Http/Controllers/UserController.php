<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.user.index',compact('users'));
    }

    public function makeEditor(Request $request){
        $currentUser = User::find($request->id);
        if ($currentUser->role == 2){
            $currentUser->role = '1';
            $currentUser->update();
        }
        return redirect()->route('user.index');
    }
}
