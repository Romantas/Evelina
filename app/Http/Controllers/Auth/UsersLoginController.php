<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

class UsersLoginController extends Controller
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
        if (Auth::guard('student')->check()){
            $this->middleware('guest:company')->except('logout');
            //$this->middleware('guast:AM')->except('logout');
        }
        else if (Auth::guard('company')->check()){
            $this->middleware('guest:student')->except('logout');
            //$this->middleware('guast:AM')->except('logout');
        }
        else if(Auth::guard('AM')->check()){
            $this->middleware('guest:student')->except('logout');
            $this->middleware('guest:company')->except('logout');
        }
        else{
            $this->middleware('guest:student')->except('logout');
            $this->middleware('guest:company')->except('logout');
            //$this->middleware('guast:AM')->except('logout');
        }
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
    public function logout(){
        if (Auth::guard('student')->check()){
            Auth::guard('student')->logout();
            return redirect('/');
        }
        else if (Auth::guard('company')->check()){
            Auth::guard('company')->logout();
            return redirect('/');
        }
        else if(Auth::guard('AM')->check()){
            Auth::guard('AM')->logout();
            return redirect('/');
        }
    }
}
