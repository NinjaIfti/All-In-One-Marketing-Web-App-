<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Redirect to provider for authentication.
     */
    public function redirectToProvider(string $provider): RedirectResponse
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('login')->withErrors([
                'provider' => 'Invalid social login provider'
            ]);
        }
        
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle provider callback.
     */
    public function handleProviderCallback(string $provider): RedirectResponse
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'social_login' => 'Unable to login using ' . ucfirst($provider) . '. Please try again.'
            ]);
        }

        // Find or create user
        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName() ?? explode('@', $socialUser->getEmail())[0],
                'password' => Hash::make(Str::random(16)),
                'email_verified_at' => now(),
            ]
        );

        // If user was just created, fire registered event
        if ($user->wasRecentlyCreated) {
            event(new Registered($user));
        }

        // Log user in
        Auth::login($user, true);

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }
} 