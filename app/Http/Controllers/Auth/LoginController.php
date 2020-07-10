<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //override username function from AuthenticateUsers Trait
    public function username()
    {
        //return 'mobile';
        //request() --- is an associative array ['key' => 'value'] ex: ['email=> test@gmail.com','mobile=>98484']
        $loginValue = request()->input('identity'); //then we must filter the input value to determine what the user entered (email or mobile)
        $field = filter_var($loginValue,FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        request()->merge([$field  => $loginValue]);
        return $field;
    }
}
