<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTokenRequest;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Hash;

class AccessTokenController extends Controller
{
    public function store(StoreTokenRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email',$validated['email'])->first();
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
}
