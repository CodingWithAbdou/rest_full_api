<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\User as UserResource;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }
    public function login()
    {
        $token = auth()->user()->createToken('Token Users')->accessToken;
        return Response([
                'User' => new UserResource(Auth::user()) ,
                'Access Token' => $token
            ]);
    }
}
