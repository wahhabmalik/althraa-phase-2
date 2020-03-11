<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Session;

class RegisterController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/home';
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register')
                ->with(['title' =>  __('lang.register')]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // if(strlen($data['phone_number'] != 10)
        //     return false;
        // dd(strlen($data['phone_number']), $data['phone_number']);
        
        // dd(strlen($data["phone_number"]));
        if(strlen($data["phone_number"]) !== 9)
            return Validator::make($data, ['phone_number' => ['digits:9']]);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Male,Female,Others'],
            'phone_number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required', 'in:on'],
            
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
        $user = User::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {
            $user->assignRole('user');
        }

        return $user;
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        // $status = array('msg' => "You have been registered. Please Login to continue.", 'toastr' => "successToastr");
        // Session::flash($status['toastr'], $status['msg']);
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
