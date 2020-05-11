<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TwoFactorController extends Controller
{

    public function __construct()
    {
    	$this->middleware(['auth']);
    }


    public function index()
    {
        if (auth()->user()->two_factor_code == null) {
            return redirect()->route('home', app()->getLocale());
        }
    	return view('auth.twofactor')
            ->with([
                'title' => trans('lang.frontend.verify_two_factor_auth'),
            ]);
    }


    public function store(Request $request)
    {
    	$request->validate([
    		'two_factor_code' => 'required|array',
    	]);

    	$user = auth()->user();

    	if (implode("", $request->two_factor_code) == $user->two_factor_code) {
    		$user->resetTwoFactorCode();
    		return redirect()->route('home', app()->getLocale());
    	}

    	return redirect()->route('verify.index', app()->getLocale())->withErrors(['two_factor_code' => 'The Code you have entered for Two Factor Authentication does not match.']);
    }


    public function resend()
    {
    	$user = auth()->user();
    	$user->twoFactorAndSendText($user);

    	return redirect()->route('verify.index', app()->getLocale())->withMessage('New Code has been sent to you.');
    }
}
