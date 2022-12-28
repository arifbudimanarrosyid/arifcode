<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::firstOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            // 'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
        Auth::login($user);
        return redirect()->intended('/dashboard');
        // dd($user);
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::firstOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            // 'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
        Auth::login($user);
        // dd($googleUser);
        return redirect()->intended('/dashboard');
    }
}
