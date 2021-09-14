<?php

namespace App\Http\repositories;

use App\Http\interfaces\AuthInterface;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthRepository implements AuthInterface
{
    public function login(Request $request, $user)
    {
        $HashCheck = Hash::check($request->password, $user->password);
        
        return $HashCheck;
    }

    public function register(Request $request)
    {
        $author = new User();

            $author->name = $request->name;
            $author->email = $request->email;
            $author->phone = $request->phone;
            $author->user_name = $request->user_name;
            $author->password = Hash::make($request->password);
            $author->save();

        return $author;
    }

    public function findUserByEmailAddress($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }
}
