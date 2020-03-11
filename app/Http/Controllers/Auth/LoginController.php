<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Socialite;
 
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

        try 
        {
            \Nexmo::message()->send([
                'to'   => '966'.$user->phone_number,
                // 'to'   => '966561155526',
                'from' => '923055644665',
                'text' => 'Althraa 2F-Auth Key is: '.$user->two_factor_code
            ]);
        } catch (\Exception $e) 
        {
            \Auth::logout();
            $status = array('msg' => "2F Auth Expired. You can not login at this time due to some technical issues. Consult Admin for further inquiries.", 'toastr' => "errorToastr");
            \Session::flash($status['toastr'], $status['msg']);
            return redirect('/en/login');
        }

        
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
}
