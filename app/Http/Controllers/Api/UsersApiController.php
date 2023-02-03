<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('id')->paginate(10);

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allUsers()
    {
        $users = User::latest('id')->get();

        return UserResource::collection($users);
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

    /** User Ban And Restore */
    public function ban($id){
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message"=>"User not found!"],404);
        }
        if ($user->isBaned == 1){
            $user->isBaned = '0';
        }
        $user->update();
        return response()->json($user);
    }
    public function restore($id){
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message"=>"User not found!"],404);
        }
        if ($user->isBaned == 0){
            $user->isBaned = '1';
        }
        $user->update();
        return response()->json($user);
    }
    /** User role change */
    public function makeEditor($id){
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message"=>"User not found!"],404);
        }
        if ($user->role == 2){
            $user->role = '1';
        }
        $user->update();
        return response()->json($user);
    }
    public function makeUser($id){
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message"=>"User not found!"],404);
        }
        if ($user->role == 1){
            $user->role = '2';
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
    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message"=>"User not found!"],404);
        }
        $user->delete();
        return response()->json('',204);
    }
}
