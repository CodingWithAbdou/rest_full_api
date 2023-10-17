<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index'  , 'show']);
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit') <=50 ? $request->input('limit') : 15;
        $user =  UserResource::collection(User::paginate($limit ?? 10));
        return $user->response()->setStatusCode(200 , "Users Return SuccessFully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create' , User::class);
        $user = new UserResource(User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password) ,
        ]));
        return  Response([
            'data' => [
                'message' => 'Create  User  Success'
            ]
        ] , 200 , ['new Header' => 'true']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = new UserResource(User::find($id));
        return  Response([
            'data' => [
                $user
            ]
        ] , 200 , ['new Header' => 'true']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = User::findOrFail($id) ;
        $this->authorize('update' ,  $user_id);
        $user = new UserResource(User::find($id)->update($request->all()));
        return  Response([
            'data' => [
                'message' => 'Update user '. $id .' success'
            ]
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = User::findOrFail($id) ;
        $this->authorize('delete' ,  $user_id);
        $user = new UserResource(User::find($id)->delete());
        return  Response([
            'data' => [
                'message' => 'remove success'
            ]
        ] , 200);
    }
}
