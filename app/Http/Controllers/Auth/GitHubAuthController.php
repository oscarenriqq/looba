<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

use Inertia\Inertia;

class GitHubAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')
            ->scopes(['read:user', 'public_repo'])
            ->redirect();
    }

    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'email' => $githubUser->getEmail()
        ], [
            'name' => $githubUser->getName(),
            'email' => $githubUser->getEmail(),
            'github_token' => $githubUser->token,
            'nickname' => $githubUser->getNickname(),
            'avatar' => $githubUser->getAvatar(),
        ]);

        Auth::login($user);

        return Inertia::location(route('home'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Inertia::location(route('home'));
    }
}
