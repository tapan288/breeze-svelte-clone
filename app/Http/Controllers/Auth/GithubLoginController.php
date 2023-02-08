<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubLoginController extends Controller
{
    public function redirect()
    {
        session()->put('previous_url', url()->previous());

        return Socialite::driver('github')->redirect();
    }

    public function authenticate()
    {
        $githubUser =  Socialite::driver('github')->stateless()->user();

        if (User::where('email', $githubUser->email)->exists()) {
            $user = User::where('email', $githubUser->email)->first();
        } else {
            $user = User::create([
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => $githubUser->email,
                'password' => Hash::make(Str::random(10)),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($user);

        $intendedRoute = session()->has('previous_url') ? session('previous_url') : RouteServiceProvider::HOME;

        return redirect($intendedRoute);
    }
}
