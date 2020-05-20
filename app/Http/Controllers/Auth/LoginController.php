<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\Questionnaire;
 
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'phone_number';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|numeric',
            'password' => 'required|string',
        ]);
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/home';
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login')
                ->with(['title' => __('lang.login')]);
    }



    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $user->generateTwoFactorCode();
    }

    



    /**
    * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/en/login');
        }
        // check if they're an existing user 
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->password        = '434vwfvsd4fsd';
            $newUser->profile_image   = $user->avatar ?? null;
            $newUser->save();
            if ($newUser) {
                $newUser->assignRole('user');
            }
            
            auth()->login($newUser, true);
        }
        return redirect('/en/home');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|numeric',
        ]);

        $user = User::where('phone_number', $request->input('phone_number'))->first();

        if($user){
            Auth::login($user);
            // $user->generateTwoFactorCode();
            $user->twoFactorAndSendText($user);
            return redirect()->route('home', app()->getLocale())->with([
                'message' => 'user_authenticated'
            ]);
            
        }
        else {
            // return redirect()->route('login', app()->getLocale())->with([
            //     'error' => 'User Not Authenticated.', 
            //     'message' => 'auth.failed', 
            // ]);

            $this->validate($request, [
                'phone_number' => 'required|numeric|unique:users',
            ]);

            event(new Registered($user = $this->create($request->all())));

            Auth::login($user);
            // $user->generateTwoFactorCode();
            $user->twoFactorAndSendText($user);
            return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
            
        }

    }

    protected function registered(Request $request, $user)
    {
        
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => 'User',
            'gender' => 'gender',
            'email' => 'user@'.$data['phone_number'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make('$data[]'),
        ]);

        if ($user) {
            $user->assignRole('user');
        }

        return $user;
    }
}
