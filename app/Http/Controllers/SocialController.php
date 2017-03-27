<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
use App\Provider;

class SocialController extends Controller
{
   /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        //dd($user);
        $selectProvider = Provider::where('provider_id',$user->getId())->first();
        if(!$selectProvider)
        {
            // New User
            $userGetReal = User::where('email',$user->getId())->first();
            if(!$userGetReal)
            {
                $userNew = new User();
                $userNew->name = $user->getName();
                $userNew->email = $user->getEmail();
                $userNew->save();
            }
            $newProvider = new Provider();
            $newProvider->provider_id = $user->getId();
            $newProvider->provider = $provider;
            //$newProvider->user_id = $userNew->id;
            //$newProvider->user_id = $userGetReal->id;
            $newProvider->user_id = Auth::id();
            $newProvider->save();
        }
        else
        {
            // Login User
            $userGetReal = User::find($selectProvider->user_id);
        }
        auth()->login($userGetReal);
        return redirect('/');

        // $user->token;
    }
}
