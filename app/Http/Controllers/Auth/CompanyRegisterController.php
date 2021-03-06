<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class CompanyRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showCompanyRegistrationForm(){
        return view('auth.company-register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'area' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'income' => ['required', 'string', 'max:255'],
            'workers_count' => ['required', 'string', 'max:255'],
            'ceo' => ['required', 'string', 'max:255'],
            'logo' => ['image', 'max:1999'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(Input::hasFile('logo')){
            $fileNameWithExt = Input::file('logo')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = Input::file('logo')->getClientOriginalExtension();
            $fileToSave = $filename.'_'.time().'.'.$ext;

            $path = Input::file('logo')->storeAs('public/company', $fileToSave);

        } else {
            $fileToSave = 'company.jpg';
        }
        return Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'area' => $data['area'],
            'address' => $data['address'],
            'income' => $data['income'],
            'workers_count' => $data['workers_count'],
            'ceo' => $data['ceo'],
            'logo' => $fileToSave,
        ]);
    }
}
