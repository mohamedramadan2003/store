<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreTokenRequest;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokenController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $isAdmin = str_contains($request->path(), 'admin');
        $model  = $isAdmin ? Admin::class : User::class;
       $user = $model::create([
        'email' => $request->email ,
        'name' => $request->name ,
        'password' => Hash::make($request->password),
       ]);
        Auth::login($user);
        $device_name = $request->post('device_name', $request->userAgent());
            $token = $user->createToken($device_name);
             return Response()->json([
                'token' => $token->plainTextToken ,
                $user
            ],201);
        }
    public function store(StoreTokenRequest $request)
    {
        $validated = $request->validated();
        $isAdmin = str_contains($request->path(), 'admin');
        $model  = $isAdmin ? Admin::class : User::class;
        $user = $model::where('email',$validated['email'])->first();
        if($user && Hash::check($validated['password'] , $user->password))
        {
            $device_name = $request->post('device_name', $request->userAgent());
            $token = $user->createToken($device_name);
            return Response()->json([
                'token' => $token->plainTextToken ,
                $user
            ],201);
        }
        return Response()->json([
            'error'=> 'invaled Auth',
        ],401);

    }

    public function destroy($token = null)
    {
        $user = Auth::guard('sanctum')->user();
        if( $user && $user->currentAccessToken())
        {
           // $user->tokens()->delete();// مسح كل التوكن
            $user->currentAccessToken()->delete();// مسح توكن الحالي بس
            return response()->json(['msg' => 'delete done']);
       }
        $personToken = PersonalAccessToken::findToken($token);
        if($user->id == $personToken->tokenable_id && get_class($user) == $personToken->tokenable_type)
    {
        $personToken->delete();
    }
    }
}
