<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Users as UsersResource;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  UserResource::collection(User::all());
        return $user->response()->setStatusCode(200 , "Users Return SuccessFully");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new UserResource(User::create($request->all()));
        return $user->response()->setStatusCode(200 , "Create  User  Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = new UserResource(User::find($id));
        return $user->response()->setStatusCode(200 , "User Return SuccessFully")
        ->header('additional HEader' , 'true');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = new UserResource(User::find($id)->update($request->all()));
        return $user->response()->setStatusCode(200 , "Update Number  " . $id . "User SuccessFully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        $user = new UserResource(User::find($id)->delete());
        return $user->response()->setStatusCode(200 , "Update Number  " . $id . "User SuccessFully");

    }
}
