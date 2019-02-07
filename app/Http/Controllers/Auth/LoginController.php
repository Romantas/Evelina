<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:student');
        $this->middleware('guest:company');
        //$this->middleware('guast:AM');
    }

    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $guards = array_keys(config('auth.guards'));
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $crediantials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::guard('student')->attempt($crediantials, $request->remember)){
            return redirect()->intended(route('student'));
        }
        else if(Auth::guard('company')->attempt($crediantials, $request->remember)){
            return redirect()->intended(route('company'));
        }
        else if(Auth::guard('AM')->attempt($crediantials, $request->remember)){
            return redirect()->intended(route('AM'));
        }
        else {
            //return dd($request);
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
}
