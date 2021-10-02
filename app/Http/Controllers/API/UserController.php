<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request)
    {
        $user = $this->authRepository->findUserByEmailAddress($request->email);

        if(isset($user)){

            if($HashCheck = $this->authRepository->login($request, $user)){

                $token = $user->createToken("auth_token")->plainTextToken;
                $cookie = cookie('snactum', $token, 60*24); //1day
                return response()->json([
                    "status" => 1,
                    "message" => "User logged in successfully",
                    "access_token" => $token
                ])->withCookie($cookie);
            }else{

                return response()->json([
                    "status" => 0,
                    "message" => "Password didn't match"
                ], 404);
            }
        }else{

            return response()->json([
                "status" => 0,
                "message" => "User not found"
            ], 404);
        }
    }

    public function logout (Request $request)
    {
        //personal_access_tokens table user related data delete
        auth()->user()->tokens()->delete();
        $cookie = Cookie::forget('snactum');
         return response([
             'message' => 'Success'
         ])->withCookie($cookie);
    }
}
