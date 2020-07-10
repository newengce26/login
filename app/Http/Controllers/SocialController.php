<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function redirect($service) {

        //return Socialite::driver(facebook)->redirect();
        //return Socialite::driver(twitter)->redirect();
        return Socialite::driver($service)->redirect();
    }


    //get the user info from the social service [facebook] and insert it into database
    public function callback($service) {

        $user = Socialite::with($service)->user();
        //return json_encode($user);
        return response()->json($user);
    }

}
