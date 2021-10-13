<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\repositories\AuthRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public $authRepository;

    
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }


        
    /**
     * login
     *
     * @param  mixed $request
     * @return bool true if authenticated, false if not
     */
    public function login(LoginRequest $request)
    {
        try{
            $user = $this->authRepository->findUserByEmailAddress($request->email);

            if(isset($user)){
    
                if($HashCheck = $this->authRepository->login($request, $user)){
    
                    $token = $user->createToken("auth_token")->plainTextToken;
                    $cookie = cookie('snactum', $token, 60*24); //1day
                    return response()->json([
                        "success" => true,
                        "message" => "User logged in successfully",
                        "access_token" => $token,
                        "user_info" => $user
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
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }



    public function logout ()
    {
        try{
             //personal_access_tokens table user related data delete
            auth()->user()->tokens()->delete();
            $cookie = Cookie::forget('snactum');
            return response([
                'message' => 'LogOut Success'
            ])->withCookie($cookie);
      
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    
    
    /**
     * register
     *
     * @param  mixed $request
     * @return ojb
     */
    public function register(RegisterRequest $request)
    {
        try{

            $newUser = $this->authRepository->register($request);

            return response()->json([
                "success" => true,
                "message" => "registered succesfully",
                "newUser" => $newUser
            ]);

        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }

    }


}
