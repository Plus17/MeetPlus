<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $newUser = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'provider_user_id' => $user->getId(),
            'name' => $user->getName(),
            'password' => bcrypt(str_random(15)),
        ]);

        auth()->login($newUser);

        return redirect()->to('/home');
    }
}
