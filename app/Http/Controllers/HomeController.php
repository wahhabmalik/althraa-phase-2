<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Mail\SendContactEmail;
use App\User;
use App\Constant;
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
        $this->middleware('auth')->except(['contactEmail','getStarted']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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

        $user = auth()->user();
        
        if($user->hasAnyRole(['admin', 'moderator'])) 
        {
            return view('dashboard.control_panel.index')
                    ->with(['title' => __('lang.home')])
                    ->with('users_analysis', $users_analysis)
                    ->with('monthwise_barChart_users', $monthwise_barChart_users)
                    ->with('bardata', $bardata);
        }
        else if($user->hasRole('user')) 
        {
            $user_questionnaire = $user->user_latest_questionnaire();
            $view = 'dashboard.user_panel.questionary.index';
            $href = null;
            $disabled = null;

            if ($user_questionnaire) 
            {
                $userdata = $user_questionnaire->getOriginal();
                $userdata = array_splice($userdata, 0, 10);
                
                $empty = in_array(null, $userdata);
                $null_column = array_search(null, $userdata);

                $columns = [
                    // 1 => 'started_year_for_personal_financial_plan',
                    1 => 'personal_info',
                    2 => 'income',
                    3 => 'expenses',
                    4 => 'net_assets',
                    5 => 'gosi',
                    6 => 'risks',
                    7 => 'objective',
                ];

                // dd(((array_search($null_column, $columns) - 1) / 8 ) * 100);
                $questionnaire_completed_percentage = 100;
                if ($null_column) {
                    $questionnaire_completed_percentage = (((array_search($null_column, $columns) - 1) / 7 ) * 100);
                }

                // dd($empty, $null_column, $columns, $questionnaire_completed_percentage);

                
                if ($user_questionnaire) 
                {
                    $empty = in_array(null, $userdata);
                    if ($empty) {
                        $href = 'javascript:void(0)';
                        $disabled = 'disabled';
                    }
                }

                // ------------------------------ suggested -----------------------------
                $suggestion = $user_questionnaire->getSuggestedAssetAllocationTableName($user);
                // dd($suggestion);
                // net personal income
                $netPersonalIncome = $user_questionnaire->getPersonalNetIncome();
                // total networth evaluation
                $totalNetworth = $user_questionnaire->getTotalNetworth();

                $constants = Constant::where('constant_meta_type', 'LIKE',  'retirement_planner_' . '%')
                    ->orWhere('constant_meta_type', 'inflation')
                    ->orWhere('constant_meta_type', 'uncertainty')
                    ->get()->keyBy('constant_attribute')->toArray();

                $current_age = $user_questionnaire->getPersonalInfo()["personal_info"]["years_old"] ?? null;
                $retirement_age = $user_questionnaire->getRetirementAge();
                $expected_age = $user_questionnaire->getLifeExpectancyAfterRetirement();
                $salary = ($user_questionnaire->getPersonalNetIncome() ?? null) * 12;
                $annual_saving = ($user_questionnaire->getCurrentSavingAmount() ?? null) * 12;
                $pension_income = ($user_questionnaire->getExpectedRetirementSalary() ?? null) * 12;
                $retirement_saving_balance = $constants["Retirement Savings Balance ($) ' Starting Amount '"]["constant_value"] ?? null;

                $before_retirement_investment_return = $constants["Investment Return (before Retirement) (%)"]["constant_value"] ?? null;
                $after_retirement_investment_return = $constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? null;
                $starting_age = $current_age;
                $ending_age = $retirement_age + $expected_age;

                $savingsAtEndingAge = [];

                $new_salary = $salary;
                $starting_amount = $retirement_saving_balance;
                $new_interest = $starting_amount * ($before_retirement_investment_return / 100);

                $ageForGraph = []; 
                $yearEndingBalanceForGraph = []; 

                for ($i = (int) $current_age; $i <= $ending_age; $i++) { 
                    $ageForGraph[] = $i;
                    if ($i == $current_age) 
                    {
                        $savingsAtEndingAge[$i]['salary'] = round($new_salary, 2);
                        $savingsAtEndingAge[$i]['balance'] = $starting_amount;
                        $savingsAtEndingAge[$i]['interest'] = round($new_interest, 2);

                        $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                        $savingsAtEndingAge[$i]['yearly_savings'] = $annual_saving;
                        $savingsAtEndingAge[$i]['desired_retirement_income'] = 0;
                        $savingsAtEndingAge[$i]['pension_income'] = 0;
                        $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                        $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
                    } 
                    else if ($i >= $retirement_age) 
                    {
                        $savingsAtEndingAge[$i]['salary'] = 0;
                        $savingsAtEndingAge[$i]['balance'] = round($starting_amount, 2);
                        $savingsAtEndingAge[$i]['interest'] = round($starting_amount * ($before_retirement_investment_return / 100), 2);

                        $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                        $savingsAtEndingAge[$i]['yearly_savings'] = 0;

                        $new_salary += $salary * (($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? null) / 100);
                        $savingsAtEndingAge[$i]['desired_retirement_income'] = round($new_salary, 2);
                        $salary = $new_salary;

                        $savingsAtEndingAge[$i]['pension_income'] = round($pension_income, 2);
                        $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                        $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
                    }
                    else 
                    {
                        $new_salary += $salary * (($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? null) / 100);
                        $savingsAtEndingAge[$i]['salary'] = round($new_salary, 2);
                        $salary = $new_salary;

                        $savingsAtEndingAge[$i]['balance'] = round($starting_amount, 2);
                        $savingsAtEndingAge[$i]['interest'] = round($starting_amount * ($before_retirement_investment_return / 100), 2);

                        $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                        $savingsAtEndingAge[$i]['yearly_savings'] = $annual_saving;
                        $savingsAtEndingAge[$i]['desired_retirement_income'] = 0;
                        $savingsAtEndingAge[$i]['pension_income'] = 0;
                        $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                        $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
                    }
                }

                $view = 'dashboard.user_panel.index';
            }
            return view($view)
                    ->with([
                        'title' => __('lang.home')
                    ])
                    ->with('href', $href)
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
}
