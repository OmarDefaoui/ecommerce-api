<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $req = Request::create('/oauth/token', 'POST', [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'XlICuZGUaoZUgPg2QreeetFCZ0hu1Pw6DnvL5t8e',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => ''
            ]);

            $res = app()->handle($req);
            $responseBody = json_decode($res->getContent());
            return response()->json(['success' => $responseBody], $res->getStatusCode());
        } catch (\Throwable $th) {
            return response()->json(["message" => "Error, email or password invalid"], 400);
        }
    }

    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return new UserResource($user);
    }

    public function logout()
    {
        auth()->user()->tokens->each(function($token){
            $token->delete();
        });

        return response()->json(['message'=>'Logout successfully'], 200);
    }
}
