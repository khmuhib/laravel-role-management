<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    public function redirect()
    {
        // dd("Dadsa");
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {

        try {
            $facebook_user = Socialite::driver('facebook')->user();


            // dd($facebook_user);

            $user = User::where('facebook_id', $facebook_user->getId())->first();

            // dd("usrte");

            if (!$user) {
                $new_user = User::create([
                    'name' => $facebook_user->getName(),
                    'email' => $facebook_user->getEmail(),
                    'facebook_id' => $facebook_user->getId(),
                ]);

                Auth::login($new_user);

                return redirect()->intended('dashboard');
            } else {
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            dd("Something went wrong " . $th->getMessage());
        }
    }
}
