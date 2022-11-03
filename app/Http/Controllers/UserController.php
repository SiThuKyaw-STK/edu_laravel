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
        }
        $currentUser->update();
        return redirect()->route('user.index')->with('status',$currentUser->name." is now Editor.");
    }

    public function makeUser(Request $request){
        $currentUser = User::find($request->id);
        if ($currentUser->role == 1){
            $currentUser->role = '2';
        }
        $currentUser->update();
        return redirect()->route('user.index')->with('status',$currentUser->name." is now User.");
    }

    public function ban(Request $request){
        $currentUser = User::find($request->id);
        if ($currentUser->isBaned == 1){
            $currentUser->isBaned = '0';
        }
        $currentUser->update();
        return redirect()->route('user.index')->with('status',$currentUser->name." is banned.");
    }

    public function restore(Request $request){
        $currentUser = User::find($request->id);
        if ($currentUser->isBaned == 0){
            $currentUser->isBaned = '1';
        }
        $currentUser->update();
        return redirect()->route('user.index')->with('status',$currentUser->name." is restored.");
    }
}
