<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        $url = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();
        return response()->json(['url' => $url]);
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'password' => Hash::make(Str::random(24)),
            ]
        );

        $token = $user->createToken('api-token')->plainTextToken;

        return response()
    ->json(['user' => $user])
    ->withCookie(cookie(
        'auth_token',
        $token,
        60 * 24 * 7,
        null, null, true, true, false, 'Strict'
    ));
    }
}
