<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Provider;
use Auth;
use Socialite;

class AuthController extends Controller
{
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
        $selectProvider = Provider::where('provider_id', $user->getId())->first();
        if(!$selectProvider)
        {
            // New User
            $userGetReal = User::where('email', $user->getEmail())->first();
            if(!$userGetReal)
            {
                $userGetReal = new User();
                $userGetReal->name = $user->getName();
                $userGetReal->email = $user->getEmail();
                //$userGetReal->user_id = Auth::id();
                //$userGetReal->user_id = $user->getId();
                //dd($userGetReal);
                $userGetReal->save();
            }
            $newprovider = new Provider();
            $newprovider->provider_id = $user->getId();
            $newprovider->provider = $provider;
            $newprovider->user_id = Auth::id();
            //$provider->user_id = $userGetReal->id;
            //dd($provider);
            $newprovider->save();
        }
        else
        {
            // Login User
            $userGetReal = User::find($selectProvider->user_id);
        }
        auth()->login($userGetReal);
        return redirect('/home');
    }
}
