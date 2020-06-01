<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Mail\SendContactEmail;
use App\User;
use App\Constant;
use App\Report;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth')->except(['contactEmail','getStarted','phoneVerification']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        $user = auth()->user();
        
        if($user->hasAnyRole(['admin', 'moderator'])) 
        {
            $today = date('Y-m-d');
            $current_month = date('m');
            $last_month = date('m', strtotime('-1 month'));

            $users_analysis = \DB::table('users as u')
                ->selectRaw(
                    "COUNT(*) as total_user_count, 
                sum(case when DATE(u.created_at) = '$today' then 1 else 0 end) as today_users,
                sum(case when MONTH(u.created_at) = '$current_month' then 1 else 0 end) as current_month_users,
                sum(case when MONTH(u.created_at) = '$last_month' then 1 else 0 end) as last_month_users"
                )
                ->where('user_type', 'user')
                ->first();

            $current_year = date('Y');
            $monthwise_barChart_users = [
                "January" => 
                    ["month" => "January", "total_users" => 0], 
                "February" =>
                    ["month" => "February", "total_users" => 0], 
                "March" =>
                    ["month" => "March", "total_users" => 0], 
                "April" =>
                    ["month" => "April", "total_users" => 0], 
                "May" =>
                    ["month" => "May", "total_users" => 0], 
                "June" =>
                    ["month" => "June", "total_users" => 0], 
                "July" =>
                    ["month" => "July", "total_users" => 0], 
                "August" =>
                    ["month" => "August", "total_users" => 0], 
                "September" =>
                    ["month" => "September", "total_users" => 0], 
                "October" =>
                    ["month" => "October", "total_users" => 0], 
                "November" =>
                    ["month" => "November", "total_users" => 0],
                "December" =>
                    ["month" => "December", "total_users" => 0],
            ];
            $barChart_users = User::whereYear('created_at', $current_year)
                ->where('user_type', 'user')
                ->select(array(
                    \DB::Raw('MONTHNAME(created_at) month'),
                    \DB::Raw('count(*) as total_users'),
                    )
                )
                ->groupBy('month')
                ->orderBy('created_at')
                ->get()->keyBy('month')->toArray();

            if (count($barChart_users) > 0) {
                $monthwise_barChart_users = array_replace_recursive($monthwise_barChart_users, $barChart_users);
            }

            $bardata = [];
            foreach ($monthwise_barChart_users as $month => $value) {
                $bardata[] = $value["total_users"];
            }

            // for ($i=1; $i <= 24 ; $i++) { 
            //     \DB::table('role_has_permissions')->insert([
            //         'permission_id' => $i, 
            //         'role_id' => 1
            //     ]);
            // }
            
            // dd(maintenanceMode());
            return view('dashboard.control_panel.index')
                    ->with(['title' => __('lang.home')])
                    ->with('users_analysis', $users_analysis)
                    ->with('monthwise_barChart_users', $monthwise_barChart_users)
                    ->with('bardata', $bardata);
        }
        else if($user->hasRole('user')) 
        {
            $price = Constant::where('constant_meta_type', 'price')
                        ->where('constant_attribute', 'price')
                        ->first();

            // dd($price->constant_value);

            $user_questionnaire = $user->user_latest_questionnaire();
            $view = 'dashboard.user_panel.questionary.index';
            $price = (integer)$price->constant_value ?? 0;
            $href = null;
            $disabled = null;

            return view($view)
                    ->with([
                        'title' => __('lang.home')
                    ])
                    ->with('href', $href)
                    ->with('price', $price)
                    ->with('disabled', $disabled)
                    ->with('user_questionnaire', $user_questionnaire)
                    ->with('netPersonalIncome', $netPersonalIncome ?? 0)
                    ->with('totalNetworth', $totalNetworth ?? 0)
                    ->with('ending_age', $ending_age ?? 0)
                    ->with('totalNetworth', $totalNetworth ?? 0)
                    ->with('savingsAtEndingAge', $savingsAtEndingAge ?? 0)
                    ->with('questionnaire_completed_percentage', round($questionnaire_completed_percentage ?? 0),2)
                    ->with('suggestion', $suggestion ?? '');
        }
        else 
        {
            return "No Role Found";
        }
    }


    public function contactEmail(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name, 
            'email' => $request->email, 
            'message' => $request->message, 
        );

        Mail::to('contact@althraa.com')->send(new SendContactEmail($data));
        return back()->with('success','Thanks for contacting us!');
    }

    public function getStarted(Request $request)
    {
        Session::put('name', $request->name);
        Session::put('years_old', $request->years_old);
        return redirect()->route('register',app()->getLocale());
    }

    public function emailVerification(Request $request)
    {
        return view('dashboard.user_panel.questionary.email_verification');
    }

    public function payment(Request $request)
    {
        $price = Constant::where('constant_meta_type', 'price')
                        ->where('constant_attribute', 'price')
                        ->first();
                        
        return view('dashboard.user_panel.payment.form')->with('price', (integer)$price->constant_value ?? 0);
    }

    public function getPayment(Request $request)
    {
        return redirect()->route('email_verification', app()->getLocale());
    }

    public function phoneVerification(Request $request)
    {
        $request->validate([
            'mobile' => 'required|array',
        ]);

        $user = User::find(Session::get('user_id'));

        if (implode("", $request->mobile) == substr($user->phone_number, -4)) {
            
            Session::put('verified', 1);
            $report = Report::where('public_id', Session::get('public_id'))->where('user_id', Session::get('user_id'))->first();

            if($report)
                return redirect()->route('download', ['q'=> Session::get('public_id')]);
            else
                return redirect()->back()->withMessage('Report Not found');

        }

        return redirect()->back()->withMessage('Verification failed please try again or try again.');
    }
}
