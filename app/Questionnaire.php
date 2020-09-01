<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Questionnaire extends Model
{
    use LogsActivity;

    public function __construct()
    {
        // $this->questionnaire = null;
    }

    protected $questionnaire = null;

    protected $table = 'questionnaires';

	protected $primaryKey = 'questionnaire_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_user_id', 
        'started_year_for_personal_financial_plan', 
        'personal_info', 
        'income', 
        // 'expenses', 
        'saving_plan', 
        'net_assets', 
        'gosi', 
        'risks', 
        'objective',

        'extra_info'
    ];

    /*
    |---------------------------------------------------------
    |                   log attributes
    |---------------------------------------------------------
    */
    protected static $logAttributes = [
        'fk_user_id', 'started_year_for_personal_financial_plan', 'personal_info', 'income', 'expenses', 'net_assets', 'gosi', 'risks', 'objective',
    ];

    protected static $logOnlyDirty = true;

    /*
    |---------------------------------------------------------
    |                   getters & setters
    |---------------------------------------------------------
    */
    public function getPersonalInfoAttribute($value)
    {
        return (array) json_decode($value, true);
    }
    // ---------------------------------------------------------
    public function getIncomeAttribute($value)
    {
        return (array) json_decode($value, true);
    }
    // ---------------------------------------------------------
    // public function getExpensesAttribute($value)
    // {
    //     return (array) json_decode($value, true);
    // }
    // ---------------------------------------------------------
    public function getSavingPlanAttribute($value)
    {
        return (array) json_decode($value, true);
    }
    // ---------------------------------------------------------
    public function getNetAssetsAttribute($value)
    {
        return (array) json_decode($value, true);
    }
    // ---------------------------------------------------------
    public function getGosiAttribute($value)
    {
        return (array) json_decode($value, true);
    }
    // ---------------------------------------------------------
    public function getRisksAttribute($value)
    {
        return (array) json_decode($value, true);
    }
    // ---------------------------------------------------------
    public function getObjectiveAttribute($value)
    {
        return (array) json_decode($value, true);
    }
    // ---------------------------------------------------------
    public function getExtraInfoAttribute($value)
    {
        return (array) json_decode($value, true);
    }


    /*
    |---------------------------------------------------------
    |                       functions
    |---------------------------------------------------------
    */
    public function questionnaires_user() {
        return $this->belongsTo('App\User', 'fk_user_id', 'id');
    }




    // create questionnaire of logged in user
    public function create_questionnaire(User $user, $year = '')
    {
        $q = new Questionnaire;
        $q->fk_user_id = $user->id;
        $q->save();
        
        return $q;
    }

    // update personal_info
    public function update_personal_info(array $data)
    {
        // dd(Questionnaire::where('fk_user_id', auth()->user()->id)->get());
        
        $user = auth()->user();
        $user->phone_number = $data['phone_number'];
        $user->gender = $data['gender'];
        $user->save();

        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'personal_info' => json_encode($data),
                ]);
    }

    // update income
    public function update_income(array $data)
    {
        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'income' => json_encode($data),
                ]);
    }

    // update expenses
    // public function update_expenses(array $data)
    // {
    //     return Questionnaire::where('fk_user_id', auth()->user()->id)
    //             ->orderBy('questionnaire_id', 'DESC')
    //             ->first()
    //             ->update([
    //                 'expenses' => json_encode($data),
    //             ]);
    // }

    // update expenses
    public function update_saving_plan(array $data)
    {
        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'saving_plan' => json_encode($data),
                ]);
    }

    // update net_assets
    public function update_net_assets(array $data)
    {
        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'net_assets' => json_encode($data),
                ]);
    }

    // update gosi
    public function update_gosi(array $data)
    {
        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'gosi' => json_encode($data),
                ]);
    }

    // update risks
    public function update_risks(array $data)
    {
        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'risks' => json_encode($data),
                ]);
    }

    // update objectives
    public function update_objectives(array $data)
    {
        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'objective' => json_encode($data),
                ]);
    }

    // update objectives
    public function update_extra_info(array $data)
    {
        return Questionnaire::where('fk_user_id', auth()->user()->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first()
                ->update([
                    'extra_info' => json_encode($data),
                ]);
    }

    /*
    | --------------------------------------------------------
    |                    getLatestQuestionnaire 
    |---------------------------------------------------------
    */
    public function getLatestQuestionnaire(? User $user = null)
    {
        $user = $user ?: auth()->user();
        return $this->questionnaire ?? $this->questionnaire = Questionnaire::where('fk_user_id', $user->id)
                ->orderBy('questionnaire_id', 'DESC')
                ->first();

    }

    // ---------------------------------------------------------
    public function getStartedYearForPersonalFinancialPlan(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->started_year_for_personal_financial_plan ?? null;
    }

    public function getPersonalInfo(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->personal_info ?? null;
    }

    public function getIncome(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->income ?? null;
    }

    public function getSavingPlan(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->saving_plan ?? null;
    }

    public function getNetAssets(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->net_assets ?? null;
    }

    public function getGosi(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->gosi ?? null;
    }

    public function getRisks(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->risks ?? null;
    }

    public function getObjective(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->objective ?? null;
    }

    public function getExtraInfo(? User $user = null)
    {
        return $this->getLatestQuestionnaire($user)->extra_info ?? null;
    }


    /*
    |--------------------------------------------
    | ---------------- income evaluation (SAR) ------------
    |--------------------------------------------
    */
    public function getTotalIncome(? User $user = null)
    {
        $totalIncome = 0;
        $income = $this->getLatestQuestionnaire($user);
        $totalIncome = array_sum($income->income["income"] ?? array(0));
        return $totalIncome;
    }

    public function getTotalExpenses(? User $user = null)
    {
        $expenses = $this->getLatestQuestionnaire($user);

        // dd($expenses);
        $expensesArray = $expenses->expenses["expenses"] ?? array(0 => [0]);
        $totalExpenses = 0;
            foreach ($expensesArray as $key => $value) {
                $totalExpenses += array_sum($value ?? array(0));
            }
        $totalExpenses = $totalExpenses - (
                ($expenses->expenses["expenses"]["investments"]["retirement_plan_(gosi)"] ?? 0)+
                ($expenses->expenses["expenses"]["investments"]["investment_plan_payment"] ?? 0)+
                ($expenses->expenses["expenses"]["investments"]["saving_plan_payment"] ?? 0)
            );

        return $totalExpenses;
    }

    public function getNetIncome(? User $user = null)
    {
        return $this->getTotalIncome($user) - $this->getTotalExpenses($user);
    }

    public function getPossibleSavingRate(? User $user = null)
    {
        $possibleSavingRate = [
            'possibleSaving' => 0,
            'possibleSavingRatePercentage' => 0,
            'unit' => '%',
        ];

        if ($this->getTotalIncome($user) > 0) {
            // $possibleSaving => value
            $possibleSavingRate['possibleSaving'] = $this->getNetIncome($user) / $this->getTotalIncome($user);
            // $possibleSavingRate => percentage
            $possibleSavingRate['possibleSavingRatePercentage'] = ($possibleSavingRate['possibleSaving']) * 100;
        }
        return $possibleSavingRate;
    }

    public function getPossibleSavingAmount(? User $user = null)
    {
        return $this->getPossibleSavingRate($user)["possibleSaving"] * $this->getTotalIncome($user);
    }

    /*
    |--------------------------------------------
    | ---------------- gosi (pension benefits) (SAR) ------------
    |--------------------------------------------
    */

    public function getExpectedRetirementYear(? User $user = null)
    {
        return $this->getStartedYearForPersonalFinancialPlan($user) + $this->getInvestmentHorizon($user);
    }

    public function getGosiStratingYearInPlan(? User $user = null)
    {
        return $this->getGosi($user)["gosi"]["strating_year_in_plan"] ?? null;
    }

    public function getAverageOfLast24MonthsSalary(? User $user = null)
    {
        return $this->getGosi($user)["gosi"]["average_of_last_24_months_salary"] ?? null;
    }
    
    public function getSubscriptionMonths(? User $user = null)
    {
        return $this->getGosi($user)["gosi"]["subscription_months"] ?? null;
    }

    public function getNumberOfDependents(? User $user = null)
    {
        $no_of_dependents = $this->getPersonalInfo($user)["personal_info"]["no_of_dependents"] ?? null;
        switch ($no_of_dependents) {
            case $no_of_dependents == 1:
                return 1;
                break;
            case $no_of_dependents == 2:
                return 2;
                break;
            case $no_of_dependents >= 3 :
                return 3;
                break;
            case null:
                return null;
                break;
            
            default:
                return null;
                break;
        }
    }

    public function getNumberOfDependentsPercentage(? User $user = null)
    {
        $no_of_dependents = $this->getNumberOfDependents($user);
        switch ($no_of_dependents) {
            case $no_of_dependents == 1:
                return ['value' => 10/100, 'percentage' => 10, 'unit' => '%'];
                break;
            case $no_of_dependents == 2:
                return ['value' => 15/100, 'percentage' => 15, 'unit' => '%'];
                break;
            case $no_of_dependents >= 3 :
                return ['value' => 20/100, 'percentage' => 20, 'unit' => '%'];
                break;
            case null:
                return null;
                break;
            
            default:
                return null;
                break;
        }
    }

    public function getDividingFactorBefore1422Hijri(? User $user = null)
    {
        // ???????????????????????
        return 600;
    }

    public function getDividingFactorAfter1422Hijri(? User $user = null)
    {
        // ???????????????????????
        return 480;
    }

    public function getSubscriptionMonthsBefore2001(? User $user = null)
    {
        $year = 2001;
        $staring_year_in_plan = $this->getGosi($user)["gosi"]['strating_year_in_plan'];
        $before = ($year - $staring_year_in_plan) * 12;
        return $before;
    }

    public function getSubscriptionMonthsAfter2001(? User $user = null)
    {
        $year = 2001;
        $staring_year_in_plan = $this->getGosi($user)["gosi"]['strating_year_in_plan'];
        $after = ($staring_year_in_plan - $year) * 12;
        return $after;
    }

    public function getCompensationRateBefore2001(? User $user = null)
    {
        $compensationRateBefore2001 = [
            'value' => null,
            'percentage' => null,
            'unit' => '%',
        ];
        if ($this->getDividingFactorBefore1422Hijri($user) > 0) {
            $compensationRateBefore2001['value'] = $this->getSubscriptionMonths($user) / $this->getDividingFactorBefore1422Hijri($user);
            $compensationRateBefore2001['percentage'] = ($this->getSubscriptionMonths($user) / $this->getDividingFactorBefore1422Hijri($user)) * 100;
        }
        return $compensationRateBefore2001;
    }

    public function getCompensationRateAfter2001(? User $user = null)
    {
        $compensationRateAfter2001 = [
            'value' => null,
            'percentage' => null,
            'unit' => '%',
        ];
        if ($this->getDividingFactorAfter1422Hijri($user) > 0) {
            $compensationRateAfter2001['value'] = $this->getSubscriptionMonths($user) / $this->getDividingFactorAfter1422Hijri($user);
            $compensationRateAfter2001['percentage'] = ($this->getSubscriptionMonths($user) / $this->getDividingFactorAfter1422Hijri($user)) * 100;
        }
        return $compensationRateAfter2001;
    }

    public function getExpectedRetirementSalary(? User $user = null)
    {
        return $this->getAverageOfLast24MonthsSalary($user) * $this->getCompensationRateAfter2001($user)['value'];
    }


    /*
    |--------------------------------------------
    | ---------------- User input data ------------
    |--------------------------------------------
    */

    public function getRetirementAge(? User $user = null)
    {
        return $this->getObjective($user)["objective"]["retirement_age"] ?? null;
    }

    public function getInvestmentHorizon(? User $user = null)
    {
        $retirement_age = $this->getRetirementAge($user);
        $years_old = $this->getPersonalInfo($user)["personal_info"]["years_old"] ?? null;
        return $retirement_age-$years_old;
    }

    public function getLifeExpectancyAfterRetirement(? User $user = null)
    {
        $lifeExpectancyAfterRetirement = $this->getObjective($user)["objective"]["life_expectancy_after_retirement"] ?? null;
        return $lifeExpectancyAfterRetirement;
    }


    /*
    |--------------------------------------------
    | ---------------- risk tolerance score test ------------
    |--------------------------------------------
    */

    public function getRiskAge(? User $user = null)
    {
        $riskAge = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["age"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["age"]) {

                case 'Less than 31':
                    $riskAge = [
                        'age'       => $this->getRisks($user)["risks"]["age"],
                        'value'     => $this->getRisks($user)["risks"]["age"],
                        'points'    => 15,
                    ];
                    break;
                
                case '31 – 40':
                    $riskAge = [
                        'age'       => $this->getRisks($user)["risks"]["age"],
                        'value'     => $this->getRisks($user)["risks"]["age"],
                        'points'    => 12,
                    ];
                    break;
                
                case '41 – 50':
                    $riskAge = [
                        'age'       => $this->getRisks($user)["risks"]["age"],
                        'value'     => $this->getRisks($user)["risks"]["age"],
                        'points'    => 9,
                    ];
                    break;
                
                case '51 – 60':
                    $riskAge = [
                        'age'       => $this->getRisks($user)["risks"]["age"],
                        'value'     => $this->getRisks($user)["risks"]["age"],
                        'points'    => 1,
                    ];
                    break;
                
                case 'More than 60':
                    $riskAge = [
                        'age'       => $this->getRisks($user)["risks"]["age"],
                        'value'     => $this->getRisks($user)["risks"]["age"],
                        'points'    => 0,
                    ];
                    break;
                
                default:
                    $riskAge = [
                        'age'       => null,
                        'value'     => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskAge;
    }

    public function getRiskTotalSavingsAndInvestments(? User $user = null)
    {
        $riskTotalSavingsAndInvestments = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["total_saving_and_investment_amount"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["total_saving_and_investment_amount"]) {

                case 'Less than 50% of my annual income':
                    $riskTotalSavingsAndInvestments = [
                        'total_saving_and_investment_amount' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'value' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'points'    => 0,
                    ];
                    break;
                
                case 'Almost 50% of my annual income':
                    $riskTotalSavingsAndInvestments = [
                        'total_saving_and_investment_amount' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'value' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'points'    => 1,
                    ];
                    break;
                
                case 'Equal to my annual income':
                    $riskTotalSavingsAndInvestments = [
                        'total_saving_and_investment_amount' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'value' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'points'    => 4,
                    ];
                    break;
                
                case 'Almost double (2x) of my annual income':
                    $riskTotalSavingsAndInvestments = [
                        'total_saving_and_investment_amount' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'value' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'points'    => 8,
                    ];
                    break;
                
                case 'Almost triple (3x) of my annual income':
                    $riskTotalSavingsAndInvestments = [
                        'total_saving_and_investment_amount' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'value' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'points'    => 10,
                    ];
                    break;
                
                case 'Almost five time (5x) of my annual income':
                    $riskTotalSavingsAndInvestments = [
                        'total_saving_and_investment_amount' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'value' => $this->getRisks($user)["risks"]["total_saving_and_investment_amount"],
                        'points'    => 12,
                    ];
                    break;
                
                default:
                    $riskTotalSavingsAndInvestments = [
                        'total_saving_and_investment_amount' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskTotalSavingsAndInvestments;
    }

    public function getRiskChangeIncomePossibilityInFuture(? User $user = null)
    {
        $riskChangeIncomePossibilityInFuture = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"]) {

                case 'Slightly decrease':
                    $riskChangeIncomePossibilityInFuture = [
                        'during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'value' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'points'    => 0,
                    ];
                    break;
                
                case 'No change':
                    $riskChangeIncomePossibilityInFuture = [
                        'during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'value' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'points'    => 1,
                    ];
                    break;
                
                case 'Slightly increase than the annual inflation':
                    $riskChangeIncomePossibilityInFuture = [
                        'during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'value' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'points'    => 4,
                    ];
                    break;
                
                case 'Remarkable increase than the annual inflation':
                    $riskChangeIncomePossibilityInFuture = [
                        'during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'value' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'points'    => 10,
                    ];
                    break;
                
                case 'Unstable (from my investment)':
                    $riskChangeIncomePossibilityInFuture = [
                        'during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'value' => $this->getRisks($user)["risks"]["during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be"],
                        'points'    => 0,
                    ];
                    break;
                
                default:
                    $riskChangeIncomePossibilityInFuture = [
                        'during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskChangeIncomePossibilityInFuture;
    }

    public function getRiskExpensesBeforeRetirement(? User $user = null)
    {
        $riskExpensesBeforeRetirement = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"] ?? null) !== null)
        {

            switch ($this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"]) {

                case 'I will manage to cover all expenses from my annual income':
                    $riskExpensesBeforeRetirement = [
                        'regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'value' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'points'    => 9,
                    ];
                    break;
                
                case 'I might need to withdraw some of my saving to cover expenses':
                    $riskExpensesBeforeRetirement = [
                        'regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'value' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'points'    => 6,
                    ];
                    break;
                
                case 'I might need to withdraw more than half of my saving to cover expenses':
                    $riskExpensesBeforeRetirement = [
                        'regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'value' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'points'    => 3,
                    ];
                    break;
                
                case 'I might need to withdraw all my saving to cover expenses before retirement':
                    $riskExpensesBeforeRetirement = [
                        'regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'value' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'points'    => 0,
                    ];
                    break;
                
                case 'I don’t have expected expenses':
                    $riskExpensesBeforeRetirement = [
                        'regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'value' => $this->getRisks($user)["risks"]["regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)"],
                        'points'    => 9,
                    ];
                    break;
                
                default:
                    $riskExpensesBeforeRetirement = [
                        'regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskExpensesBeforeRetirement;
    }

    public function getRiskPossibilityOfHealthIssuesInFuture(? User $user = null)
    {
        $riskPossibilityOfHealthIssuesInFuture = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"]) {

                case 'Above the average':
                    $riskPossibilityOfHealthIssuesInFuture = [
                        'based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'value' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'points'    => 0,
                    ];
                    break;
                
                case 'Average':
                    $riskPossibilityOfHealthIssuesInFuture = [
                        'based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'value' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'points'    => 2,
                    ];
                    break;
                
                case 'Unlikely':
                    $riskPossibilityOfHealthIssuesInFuture = [
                        'based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'value' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'points'    => 5,
                    ];
                    break;
                
                case 'Almost no':
                    $riskPossibilityOfHealthIssuesInFuture = [
                        'based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'value' => $this->getRisks($user)["risks"]["based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years"],
                        'points'    => 10,
                    ];
                    break;

                default:
                    $riskPossibilityOfHealthIssuesInFuture = [
                        'based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskPossibilityOfHealthIssuesInFuture;
    }

    public function getRiskInvestmentExperience(? User $user = null)
    {
        $riskInvestmentExperience = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["about_investment_experience"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["about_investment_experience"]) {

                case 'I have no previous experience in public equity Markets nor mutual funds':
                    $riskInvestmentExperience = [
                        'about_investment_experience' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'value' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'points'    => 0,
                    ];
                    break;
                
                case 'I have a little knowledge. I have invested a little amount in the public equity Markets nor mutual funds':
                    $riskInvestmentExperience = [
                        'about_investment_experience' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'value' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'points'    => 1,
                    ];
                    break;
                
                case 'I have knowledge. I have invested a big amount in the public equity Markets nor mutual funds':
                    $riskInvestmentExperience = [
                        'about_investment_experience' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'value' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'points'    => 6,
                    ];
                    break;
                
                case 'I have a good knowledge. I have invested in international public equity markets and in other investment tools and financial derivatives':
                    $riskInvestmentExperience = [
                        'about_investment_experience' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'value' => $this->getRisks($user)["risks"]["about_investment_experience"],
                        'points'    => 8,
                    ];
                    break;

                default:
                    $riskInvestmentExperience = [
                        'about_investment_experience' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskInvestmentExperience;
    }

    public function getRiskExpectedTimeToWithdrawSavings(? User $user = null)
    {
        $riskExpectedTimeToWithdrawSavings = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"]) {

                case 'Less than 5 years':
                    $riskExpectedTimeToWithdrawSavings = [
                        'expect_to_start_withdrawing_saving' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'value' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'points'    => 1,
                    ];
                    break;
                
                case '5 – 10 years':
                    $riskExpectedTimeToWithdrawSavings = [
                        'expect_to_start_withdrawing_saving' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'value' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'points'    => 2,
                    ];
                    break;
                
                case '10 – 15 years':
                    $riskExpectedTimeToWithdrawSavings = [
                        'expect_to_start_withdrawing_saving' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'value' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'points'    => 8,
                    ];
                    break;
                
                case 'More than 15 years':
                    $riskExpectedTimeToWithdrawSavings = [
                        'expect_to_start_withdrawing_saving' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'value' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'points'    => 13,
                    ];
                    break;

                case 'I have no saving or I have already withdrawing from it':
                    $riskExpectedTimeToWithdrawSavings = [
                        'expect_to_start_withdrawing_saving' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'value' => $this->getRisks($user)["risks"]["expect_to_start_withdrawing_saving"],
                        'points'    => 0,
                    ];
                    break;

                default:
                    $riskExpectedTimeToWithdrawSavings = [
                        'expect_to_start_withdrawing_saving' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskExpectedTimeToWithdrawSavings;
    }

    public function getRisk15PercentLossInInvestmentInYear(? User $user = null)
    {
        $risk15PercentLossInInvestmentInYear = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"]) {

                case 'I would sell all of my investments to save what have left':
                    $risk15PercentLossInInvestmentInYear = [
                        'in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'value' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'points'    => 0,
                    ];
                    break;
                
                case 'I will sell part of my investments so that I can invest in other lower risk tools':
                    $risk15PercentLossInInvestmentInYear = [
                        'in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'value' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'points'    => 1,
                    ];
                    break;
                
                case 'I would not sell and wait to recover to its original value':
                    $risk15PercentLossInInvestmentInYear = [
                        'in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'value' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'points'    => 4,
                    ];
                    break;
                
                case 'Investing more money to reduce the cost of investments':
                    $risk15PercentLossInInvestmentInYear = [
                        'in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'value' => $this->getRisks($user)["risks"]["in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)"],
                        'points'    => 8,
                    ];
                    break;

                default:
                    $risk15PercentLossInInvestmentInYear = [
                        'in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $risk15PercentLossInInvestmentInYear;
    }

    public function getRiskPreferencesInvesting100000For10Years(? User $user = null)
    {
        $riskPreferencesInvesting100000For10Years = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"]) {

                case 'After 10 years, The probability of best investment value = 500,000 and the worst = 50,000':
                    $riskPreferencesInvesting100000For10Years = [
                        'in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'value' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'points'    => 6,
                    ];
                    break;
                
                case 'After 10 years, The probability of best investment value = 850,000 and the worst = 20,000':
                    $riskPreferencesInvesting100000For10Years = [
                        'in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'value' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'points'    => 10,
                    ];
                    break;
                
                case 'After 10 years, The probability of best investment value = 300,000 and the worst = 65,000':
                    $riskPreferencesInvesting100000For10Years = [
                        'in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'value' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'points'    => 2,
                    ];
                    break;
                
                case 'After 10 years, The probability of best investment value = 150,000 and the worst = 100,000':
                    $riskPreferencesInvesting100000For10Years = [
                        'in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'value' => $this->getRisks($user)["risks"]["in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years"],
                        'points'    => 0,
                    ];
                    break;

                default:
                    $riskPreferencesInvesting100000For10Years = [
                        'in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskPreferencesInvesting100000For10Years;
    }

    public function getRiskPreferencesBuyingCarInsurance(? User $user = null)
    {
        $riskPreferencesBuyingCarInsurance = [
            'value' => null,
            'points' => null,
        ];
        if(($this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"] ?? null) !== null)
        {
            switch ($this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"]) {

                case 'Insurance with the highest cover even if it was expensive':
                    $riskPreferencesBuyingCarInsurance = [
                        'when_i_buy_a_car_insurance_i_prefer' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'value' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'points'    => 0,
                    ];
                    break;
                
                case 'Insurance with a limited cover even if it was expensive':
                    $riskPreferencesBuyingCarInsurance = [
                        'when_i_buy_a_car_insurance_i_prefer' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'value' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'points'    => 1,
                    ];
                    break;
                
                case 'Pay a lower price for a third party one':
                    $riskPreferencesBuyingCarInsurance = [
                        'when_i_buy_a_car_insurance_i_prefer' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'value' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'points'    => 3,
                    ];
                    break;
                
                case 'I prefer not buying a care insurance':
                    $riskPreferencesBuyingCarInsurance = [
                        'when_i_buy_a_car_insurance_i_prefer' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'value' => $this->getRisks($user)["risks"]["when_i_buy_a_car_insurance_i_prefer"],
                        'points'    => 5,
                    ];
                    break;

                default:
                    $riskPreferencesBuyingCarInsurance = [
                        'when_i_buy_a_car_insurance_i_prefer' => null,
                        'value' => null,
                        'points'    => null,
                    ];
                    break;
            }
        }
        return $riskPreferencesBuyingCarInsurance;
    }


    public function getRiskTotalPoints(? User $user = null)
    {
        return $this->getRiskAge($user)["points"] + $this->getRiskTotalSavingsAndInvestments($user)["points"] + $this->getRiskChangeIncomePossibilityInFuture($user)["points"] + $this->getRiskExpensesBeforeRetirement($user)["points"] + $this->getRiskPossibilityOfHealthIssuesInFuture($user)["points"] + $this->getRiskInvestmentExperience($user)["points"] + $this->getRiskExpectedTimeToWithdrawSavings($user)["points"] + $this->getRisk15PercentLossInInvestmentInYear($user)["points"] + $this->getRiskPreferencesInvesting100000For10Years($user)["points"] + $this->getRiskPreferencesBuyingCarInsurance($user)["points"];
    }

    public function getRiskAbilityAndRiskTolerance(? User $user = null)
    {
        if ($this->getRiskTotalPoints($user) <= 19) {
            return [
                'result' => 'very_conservative',
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) >= 20 && $this->getRiskTotalPoints($user) <= 39){
            return [
                'result' => 'conservative',
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) >= 40 && $this->getRiskTotalPoints($user) <= 59){
            return [
                'result' => 'natural',
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) >= 60 && $this->getRiskTotalPoints($user) <= 79){
            return [
                'result' => 'aggressive',
                'valid' => 'yes'
            ];
        } else {
            return [
                'result' => 'very_aggressive',
                'valid' => 'no'
            ];
        }
    }


    /*
    |--------------------------------------------
    | ---------------- investment plan (sar) ------------
    |--------------------------------------------
    */
    public function getMonthlyTotalReturns(? User $user = null)
    {
        $monthlyTotalReturns = [
            'message' => 'Constant "Total Returns" Not Found in database.',
            'constant_value' => null,
            'constant_value_percentage' => null,
            'result' => null,
            'unit' => null,
        ];

        $total_returns = Constant::where('constant_meta_type', 'investment_plan_(SAR)')
                        ->where('constant_attribute', 'total_returns')
                        ->first();
        if ($total_returns) {
            $monthlyTotalReturns = [
                'message' => $total_returns,
                'constant_value' => $total_returns->constant_value,
                'constant_value_percentage' => $total_returns->constant_value / 100,
                'result' => $total_returns->constant_value / 12,
                'unit' => '%',
            ];
        }
        return $monthlyTotalReturns;
    }

    public function getInitialInvestment(? User $user = null)
    {
        return $this->getTotalCAA($user);
    }

    public function getInvestmentHorizonInYears(? User $user = null)
    {
        return $this->getInvestmentHorizon($user);
    }

    public function getInvestmentHorizonInMonths(? User $user = null)
    {
        return $this->getInvestmentHorizon($user) * 12;
    }

    public function getFinalRetirementPortfolioValue(? User $user = null)
    {
        // pow() == **
        return (($this->getMonthlyTotalReturns($user)["constant_value_percentage"] + 1)**$this->getInvestmentHorizonInYears($user)) * $this->getInitialInvestment($user);
    }

    public function getMonthlySaving(? User $user = null)
    {
        return $this->getExpenses($user)["expenses"]["investments"]["personal_financial_plan"] ?? null;
    }

    public function getFutureValueMonthlySaving(? User $user = null)
    {
        // ???????????????????????
        return 4755132;
    }

    public function getPortfolioValueAtRetirement(? User $user = null)
    {
        return $this->getFutureValueMonthlySaving($user) + $this->getFinalRetirementPortfolioValue($user);
    }

    public function getCashReturnsAtRetirement(? User $user = null)
    {
        $cash_returns_value = null;
        $cash_returns = Constant::where('constant_meta_type', 'investment_plan_(SAR)')
                        ->where('constant_attribute', 'cash_returns')
                        ->first();
        if($cash_returns)
        {
            $cash_returns_value = $cash_returns->constant_value / 100;
        }
        return $this->getPortfolioValueAtRetirement($user) * $cash_returns_value;
    }

    public function getMonthlyIncomeAtRetirementFromFinancialPlan(? User $user = null)
    {
        return $this->getCashReturnsAtRetirement($user) / 12;
    }

    public function getMonthlyIncomeAtRetirementFromGosi(? User $user = null)
    {
        $dividingFactorAfter1422Hijri = $this->getDividingFactorAfter1422Hijri($user); 
        if(($dividingFactorAfter1422Hijri ?? null ) > 0)
        {
            $division = $this->getSubscriptionMonths($user) / $dividingFactorAfter1422Hijri;
        }
        return $this->getAverageOfLast24MonthsSalary($user) * $division;
    }

    public function getTotalMonthlyIncomeAtRetirement(? User $user = null)
    {
        return $this->getMonthlyIncomeAtRetirementFromFinancialPlan($user) + $this->getMonthlyIncomeAtRetirementFromGosi($user);
    }



    /*
    |--------------------------------------------
    | ---------------- cash flow evaluation (SAR) ------------
    |--------------------------------------------
    */

    public function getPersonalNetIncome(? User $user = null)
    {
        return $this->getNetIncome($user);
    }

    public function getCurrentSavingRate(? User $user = null)
    {
        $currSavingRate = [
            'currentSavingRate' => null,
            'currentSavingRatePercentage' => null,
            'unit' => '%',
        ];
        $retirement_plan_gosi = $this->getExpenses($user)["expenses"]["investments"]["retirement_plan_(gosi)"] ?? null;
        // $personal_financial_plan = $this->getExpenses($user)["expenses"]["investments"]["personal_financial_plan"] ?? null;
        $investment_plan_payment = $this->getExpenses($user)["expenses"]["investments"]["investment_plan_payment"] ?? null;
        $saving_plan_payment = $this->getExpenses($user)["expenses"]["investments"]["saving_plan_payment"] ?? null;

        $totalIncome = $this->getTotalIncome($user) ?? null;
        if($totalIncome)
        {
            $currentSavingRate = ($retirement_plan_gosi + $investment_plan_payment + $saving_plan_payment) / $totalIncome;
            $currentSavingRatePercentage = $currentSavingRate * 100;

            $currSavingRate['currentSavingRate'] = $currentSavingRate;
            $currSavingRate['currentSavingRatePercentage'] = $currentSavingRatePercentage;
            $currSavingRate['unit'] = '%';
        }
        return $currSavingRate;    
    }

    public function getCurrentSavingAmount(? User $user = null)
    {
        $retirement_plan_gosi = $this->getExpenses($user)["expenses"]["investments"]["retirement_plan_(gosi)"] ?? null;
        // $personal_financial_plan = $this->getExpenses($user)["expenses"]["investments"]["personal_financial_plan"] ?? null;
        $investment_plan_payment = $this->getExpenses($user)["expenses"]["investments"]["investment_plan_payment"] ?? null;
        $saving_plan_payment = $this->getExpenses($user)["expenses"]["investments"]["saving_plan_payment"] ?? null;

        return $retirement_plan_gosi + $investment_plan_payment + $saving_plan_payment;    
    }


    /*
    |--------------------------------------------
    | ---------------- networth evaluation (SAR) ------------
    |--------------------------------------------
    */

    public function getNetAssetsLiquidInvestment(? User $user = null)
    {
        return $this->getNetAssets($user)["net_assets"]["assets"]["liquid"] ?? null;
    }

    public function getNetAssetsTotalLiquidInvestment(? User $user = null)
    {
        return array_sum($this->getNetAssets($user)["net_assets"]["assets"]["liquid"] ?? array(0));
    }

    public function getNetAssetsUnliquidInvestment(? User $user = null)
    {
        return $this->getNetAssets($user)["net_assets"]["assets"]["unliquid"] ?? null;
    }

    public function getNetAssetsTotalUnliquidInvestment(? User $user = null)
    {
        return array_sum($this->getNetAssets($user)["net_assets"]["assets"]["unliquid"] ?? array(0));
    }

    public function getNetAssetsPersonalInvestment(? User $user = null)
    {
        return $this->getNetAssets($user)["net_assets"]["assets"]["personal"] ?? null;
    }

    public function getNetAssetsTotalPersonalInvestment(? User $user = null)
    {
        return array_sum($this->getNetAssets($user)["net_assets"]["assets"]["personal"] ?? array(0));
    }

    public function getNetworthTotalInvestmentOrAssets(? User $user = null)
    {
        return $this->getNetAssetsTotalLiquidInvestment($user) + $this->getNetAssetsTotalUnliquidInvestment($user) + $this->getNetAssetsTotalPersonalInvestment($user);
    }


    public function getNetworthDebtsOrLiabilities(? User $user = null)
    {
        return $this->getNetAssets($user)["net_assets"]["liabilities"] ?? null;
    }


    public function getNetworthTotalDebtsOrLiabilities(? User $user = null)
    {
        return array_sum($this->getNetAssets($user)["net_assets"]["liabilities"] ?? array(0));
    }


    public function getTotalNetworth(? User $user = null)
    {
        // dd($this->getNetworthTotalInvestmentOrAssets($user), $this->getNetworthTotalDebtsOrLiabilities($user));
        return $this->getNetworthTotalInvestmentOrAssets($user) - $this->getNetworthTotalDebtsOrLiabilities($user);
    }


    /*
    |--------------------------------------------
    | ---------------- current strategic asset allocation (CAA) ------------
    |--------------------------------------------
    */

    public function getCashAndDepositsCAA(? User $user = null)
    {
        $cash = $this->getNetAssets($user)['net_assets']['assets']['liquid']['cash'] ?? null;
        $deposits = $this->getNetAssets($user)['net_assets']['assets']['liquid']['time_deposits'] ?? null;
        $jeweleries = $this->getNetAssets($user)['net_assets']['assets']['personal']['jeweleries'] ?? null;
        return $cash + $deposits + $jeweleries;
    }

    public function getLocalEquityCAA(? User $user = null)
    {
        $local_equity = $this->getNetAssets($user)['net_assets']['assets']['liquid']['local_equity'] ?? null;
        $private_business = $this->getNetAssets($user)['net_assets']['assets']['unliquid']['private_business'] ?? null;
        return $local_equity + $private_business;
    }

    public function getInternationalEquityCAA(? User $user = null)
    {
        return $this->getNetAssets($user)['net_assets']['assets']['liquid']['international_equity'] ?? null;
    }

    public function getGovernmentBondsCAA(? User $user = null)
    {
        return $this->getNetAssets($user)['net_assets']['assets']['liquid']['government_bonds'] ?? null;
    }

    public function getCorporateBondsCAA(? User $user = null)
    {
        return $this->getNetAssets($user)['net_assets']['assets']['liquid']['corporate_bonds'] ?? null;
    }

    public function getReitsCAA(? User $user = null)
    {
        $reits = $this->getNetAssets($user)['net_assets']['assets']['unliquid']['reits'] ?? null;
        $direct_properties = $this->getNetAssets($user)['net_assets']['assets']['unliquid']['direct_properties'] ?? null;
        return $reits + $direct_properties;
    }

    public function getLocalRealEstateCAA(? User $user = null)
    {
        $properties_shared_owned = $this->getNetAssets($user)['net_assets']['assets']['unliquid']['properties_shared_owned'] ?? null;
        $direct_properties = $this->getNetAssets($user)['net_assets']['assets']['unliquid']['direct_properties'] ?? null;
        $private_house = $this->getNetAssets($user)['net_assets']['assets']['personal']['private_house'] ?? null;
        return $properties_shared_owned + $direct_properties + $private_house;
        // dd($properties_shared_owned, $direct_properties, $private_house);
    }

    public function getInternationalRealEstateCAA(? User $user = null)
    {
        $international_properties_shared_owned = $this->getNetAssets($user)['net_assets']['assets']['unliquid']['international_properties_shared_owned'] ?? null;
        $international_properties_direct_owned = $this->getNetAssets($user)['net_assets']['assets']['unliquid']['international_properties_direct_owned'] ?? null;
        return $international_properties_shared_owned + $international_properties_direct_owned;
        // dd($international_properties_shared_owned, $international_properties_direct_owned);
    }

    public function getDirectPropertiesCAA(? User $user = null)
    {
        return $this->getNetAssets($user)['net_assets']['assets']['unliquid']['direct_properties'] ?? null;
    }

    public function getTotalCAA(? User $user = null)
    {
        $totalCAA = $this->getCashAndDepositsCAA($user) + $this->getLocalEquityCAA($user) + $this->getInternationalEquityCAA($user) + $this->getGovernmentBondsCAA($user) + $this->getCorporateBondsCAA($user) + $this->getLocalRealEstateCAA($user) + $this->getInternationalRealEstateCAA($user);
        // dd($this->getCashAndDepositsCAA($user) , $this->getLocalEquityCAA($user) , $this->getInternationalEquityCAA($user) , $this->getGovernmentBondsCAA($user) , $this->getCorporateBondsCAA($user) , $this->getLocalRealEstateCAA($user) , $this->getInternationalRealEstateCAA($user));

        // dd($totalCAA);


        if ($totalCAA > 0) {
            return $totalCAA;
        }
        return null;
    }


    // -------------------- CAA percentages -----------------

    public function getCashAndDepositsCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getCashAndDepositsCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
        
    }

    public function getLocalEquityCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getLocalEquityCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }

    public function getInternationalEquityCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getInternationalEquityCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }

    public function getGovernmentBondsCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getGovernmentBondsCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }

    public function getCorporateBondsCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getCorporateBondsCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }

    public function getReitsCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getReitsCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }

    public function getLocalRealEstateCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getLocalRealEstateCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }

    public function getInternationalRealEstateCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getInternationalRealEstateCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }

    public function getDirectPropertiesCAAPercentage(? User $user = null)
    {
        if ($this->getTotalCAA($user)) 
        { 
            $value = $this->getDirectPropertiesCAA($user) / $this->getTotalCAA($user);
            $percentage = $value * 100;
            return [
                'value' => $value,
                'percentage' => $percentage,
                'unit' => '%',
            ];
        }
        return [
            'value' => 0,
            'percentage' => 0,
            'unit' => '%',
        ];
    }


    public function getTotalCAAPercentage(? User $user = null)
    {
        return $this->getCashAndDepositsCAAPercentage($user)['percentage'] + $this->getLocalEquityCAAPercentage($user)['percentage'] + $this->getInternationalEquityCAAPercentage($user)['percentage'] + $this->getGovernmentBondsCAAPercentage($user)['percentage'] + $this->getCorporateBondsCAAPercentage($user)['percentage'] + $this->getLocalRealEstateCAAPercentage($user)['percentage'] + $this->getInternationalRealEstateCAAPercentage($user)['percentage'];
        // dd($this->getCashAndDepositsCAAPercentage($user)['percentage'], $this->getLocalEquityCAAPercentage($user)['percentage'], $this->getInternationalEquityCAAPercentage($user)['percentage'], $this->getGovernmentBondsCAAPercentage($user)['percentage'], $this->getCorporateBondsCAAPercentage($user)['percentage'], $this->getLocalRealEstateCAAPercentage($user)['percentage'], $this->getInternationalRealEstateCAAPercentage($user)['percentage']);
    }


    
    /*
    |--------------------------------------------
    | ---------------- suggested asset allocation (CAA) ------------
    |--------------------------------------------
    */
    public function getConservativeC1($value='')
    {
        return [
            'value' => [
                'cash_and_deposits' => 20,
                'local_equity' => 20,
                'international_equity' => 10,
                'government_bonds' => 25,
                'corporate_bonds' => 10,
                // 'reits' => 10,
                // 'direct_properties' => 5,
                'local_real_estate' => 10,
                'international_real_estate' => 5,
            ],
            'percentage' => [
                'cash_and_deposits' => 0.20,
                'local_equity' => 0.20,
                'international_equity' => 0.10,
                'government_bonds' => 0.25,
                'corporate_bonds' => 0.10,
                // 'reits' => 0.10,
                // 'direct_properties' => 0.05,
                'local_real_estate' => 0.10,
                'international_real_estate' => 0.05,
            ],
            'symbol' => '%',
        ];
    }

    public function getConservativeC2($value='')
    {
        return [
            'value' => [
                'cash_and_deposits' => 20,
                'local_equity' => 20,
                'international_equity' => 10,
                'government_bonds' => 20,
                'corporate_bonds' => 15,
                // 'reits' => 10,
                // 'direct_properties' => 5,
                'local_real_estate' => 10,
                'international_real_estate' => 5,
            ],
            'percentage' => [
                'cash_and_deposits' => 0.20,
                'local_equity' => 0.20,
                'international_equity' => 0.10,
                'government_bonds' => 0.20,
                'corporate_bonds' => 0.15,
                // 'reits' => 0.10,
                // 'direct_properties' => 0.05,
                'local_real_estate' => 0.10,
                'international_real_estate' => 0.05,
            ],
            'symbol' => '%',
        ];
    }

    public function getNaturalN1($value='')
    {
        return [
            'value' => [
                'cash_and_deposits' => 10,
                'local_equity' => 35,
                'international_equity' => 15,
                'government_bonds' => 10,
                'corporate_bonds' => 10,
                // 'reits' => 10,
                // 'direct_properties' => 10,
                'local_real_estate' => 10,
                'international_real_estate' => 10,
            ],
            'percentage' => [
                'cash_and_deposits' => 0.10,
                'local_equity' => 0.35,
                'international_equity' => 0.15,
                'government_bonds' => 0.10,
                'corporate_bonds' => 0.10,
                // 'reits' => 0.10,
                // 'direct_properties' => 0.10,
                'local_real_estate' => 0.10,
                'international_real_estate' => 0.10,
            ],
            'symbol' => '%',
        ];
    }

    public function getNaturalN2($value='')
    {
        return [
            'value' => [
                'cash_and_deposits' => 10,
                'local_equity' => 35,
                'international_equity' => 20,
                'government_bonds' => 10,
                'corporate_bonds' => 10,
                // 'reits' => 10,
                // 'direct_properties' => 5,
                'local_real_estate' => 10,
                'international_real_estate' => 5,
            ],
            'percentage' => [
                'cash_and_deposits' => 0.10,
                'local_equity' => 0.35,
                'international_equity' => 0.20,
                'government_bonds' => 0.10,
                'corporate_bonds' => 0.10,
                // 'reits' => 0.10,
                // 'direct_properties' => 0.05,
                'local_real_estate' => 0.10,
                'international_real_estate' => 0.05,
            ],
            'symbol' => '%',
        ];
    }

    public function getAggressiveA1($value='')
    {
        return [
            'value' => [
                'cash_and_deposits' => 5,
                'local_equity' => 40,
                'international_equity' => 25,
                'government_bonds' => 5,
                'corporate_bonds' => 10,
                // 'reits' => 10,
                // 'direct_properties' => 5,
                'local_real_estate' => 10,
                'international_real_estate' => 5,
            ],
            'percentage' => [
                'cash_and_deposits' => 0.05,
                'local_equity' => 0.40,
                'international_equity' => 0.25,
                'government_bonds' => 0.05,
                'corporate_bonds' => 0.10,
                // 'reits' => 0.10,
                // 'direct_properties' => 0.05,
                'local_real_estate' => 0.10,
                'international_real_estate' => 0.05,
            ],
            'symbol' => '%',
        ];
    }

    public function getAggressiveA2($value='')
    {
        return [
            'value' => [
                'cash_and_deposits' => 5,
                'local_equity' => 40,
                'international_equity' => 30,
                'government_bonds' => 5,
                'corporate_bonds' => 5,
                // 'reits' => 10,
                // 'direct_properties' => 5,
                'local_real_estate' => 10,
                'international_real_estate' => 5,
            ],
            'percentage' => [
                'cash_and_deposits' => 0.05,
                'local_equity' => 0.40,
                'international_equity' => 0.30,
                'government_bonds' => 0.05,
                'corporate_bonds' => 0.05,
                // 'reits' => 0.10,
                // 'direct_properties' => 0.05,
                'local_real_estate' => 0.10,
                'international_real_estate' => 0.05,
            ],
            'symbol' => '%',
        ];
    }

    public function getSuggestedAssetAllocationTable(? User $user = null)
    {
        if ($this->getRiskTotalPoints($user) <= 20) {
            return [
                'points' => $this->getRiskTotalPoints($user),
                'result' => 'conservative',
                'table' => 'conservative_c1',
                'function' => 'getConservativeC1',
                'function_result' => $this->getConservativeC1(),
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) > 21 && $this->getRiskTotalPoints($user) <= 30){
            return [
                'points' => $this->getRiskTotalPoints($user),
                'result' => 'conservative',
                'table' => 'conservative_c2',
                'function' => 'getConservativeC2',
                'function_result' => $this->getConservativeC2(),
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) > 31 && $this->getRiskTotalPoints($user) <= 55){
            return [
                'points' => $this->getRiskTotalPoints($user),
                'result' => 'natural',
                'table' => 'natural_n1',
                'function' => 'getNaturalN1',
                'function_result' => $this->getNaturalN1(),
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) > 56 && $this->getRiskTotalPoints($user) <= 80){
            return [
                'points' => $this->getRiskTotalPoints($user),
                'result' => 'natural',
                'table' => 'natural_n2',
                'function' => 'getNaturalN2',
                'function_result' => $this->getNaturalN2(),
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) > 81 && $this->getRiskTotalPoints($user) <= 90){
            return [
                'points' => $this->getRiskTotalPoints($user),
                'result' => 'aggressive',
                'table' => 'aggressive_a1',
                'function' => 'getAggressiveA1',
                'function_result' => $this->getAggressiveA1(),
                'valid' => 'yes'
            ];
        } else if ($this->getRiskTotalPoints($user) > 91 && $this->getRiskTotalPoints($user) <= 100){
            return [
                'points' => $this->getRiskTotalPoints($user),
                'result' => 'aggressive',
                'table' => 'aggressive_a2',
                'function' => 'getAggressiveA2',
                'function_result' => $this->getAggressiveA2(),
                'valid' => 'yes'
            ];
        } else {
            return [
                'points' => $this->getRiskTotalPoints($user),
                'result' => 'aggressive',
                'table' => 'aggressive_a2',
                'function' => 'getAggressiveA2',
                'function_result' => $this->getAggressiveA2(),
                'valid' => 'no'
            ];
        }
    }

    public function getSuggestedAssetAllocationTableName(? User $user = null)
    {
        if ($this->getRiskTotalPoints($user) <= 20) {
            return 'conservative_c1';
        } else if ($this->getRiskTotalPoints($user) > 21 && $this->getRiskTotalPoints($user) <= 30){
            return 'conservative_c2';
        } else if ($this->getRiskTotalPoints($user) > 31 && $this->getRiskTotalPoints($user) <= 55){
            return 'natural_n1';
        } else if ($this->getRiskTotalPoints($user) > 56 && $this->getRiskTotalPoints($user) <= 80){
            return 'natural_n2';
        } else if ($this->getRiskTotalPoints($user) > 81 && $this->getRiskTotalPoints($user) <= 90){
            return 'aggressive_a1';
        } else if ($this->getRiskTotalPoints($user) > 91 && $this->getRiskTotalPoints($user) <= 100){
            return 'aggressive_a2';
        } else {
            return 'aggressive_a2';
        }
    }

    public function getSelectedAssetAllocationTable($plan, ? User $user = null)
    {
        switch ($plan) {
            case 'conservative_c1':
                return $this->getConservativeC1();
                break;
            
            case 'conservative_c2':
                return $this->getConservativeC2();
                break;
            
            case 'natural_n1':
                return $this->getNaturalN1();
                break;
            
            case 'natural_n2':
                return $this->getNaturalN2();
                break;
            
            case 'aggressive_a1':
                return $this->getAggressiveA1();
                break;
            
            case 'aggressive_a2':
                return $this->getAggressiveA2();
                break;
            
            default:
                return $this->getAggressiveA2();
                break;
        }
    }

    public function getMonthlyIncomeToday(User $user = null)
    {
        $monthlyIncomeToday = array_sum($this->getIncome($user)['income']) ?? 0;
        // $this->getLatestQuestionnaire($user);
        return $monthlyIncomeToday;
    }

    public function getMonthlySavingToday(User $user = null)
    {
        $savingPlan = $this->getSavingPlan($user);  
        return $savingPlan['saving_plan']['gosi_or_ppa_monthly_subscription'] + $savingPlan['saving_plan']['monthly_saving_plan_for_retirement'] ?? 0;
    }


    public function getNetWorthAssetsToday(User $user = null)
    {
        $netWorthAssetToday = $this->getNetAssets($user);  
        return array_sum($netWorthAssetToday['net_assets']['financial_assets']) + array_sum($netWorthAssetToday['net_assets']['real_assets']) ?? 0;
    }

    public function getNetWorthLiabilitiesToday(User $user = null)
    {
        $netWorthAssetToday = $this->getNetAssets($user);  
        return array_sum($netWorthAssetToday['net_assets']['liabilities']) ?? 0;
    }

    public function getAnnualSavingToday(User $user = null)
    {
        return (($this->getSavingPlan($user)['saving_plan']['monthly_saving_plan_for_retirement']) ?? 0) * 12;
    }

    public function getNetReturnBeforeRetirement(User $user = null)
    {
        $before_retirement = Constant::where('constant_meta_type' , 'Net_Return/Year_(Before_Retirement)')->where('constant_attribute' , $this->getRiskAbilityAndRiskTolerance($user)['result'])->first();

        // dd('Risk points: '.$this->getRiskTotalPoints($user),'Before riterement constant value: ' . (float)$before_retirement->constant_value);
        return (float)$before_retirement->constant_value ?? 7.85;
    }

    public function getNetReturnAfterRetirement(User $user = null)
    {
        $after_retirement = Constant::where('constant_attribute' , 'Net_Return/Year_(After_Retirement)')->first();
        return (float)$after_retirement->constant_value ?? 4.00;
    }

    public function getStartingyearInPlan(User $user = null)
    {
        return $this->getGosi($user)['gosi']['strating_year_in_plan'];
    }

    public function getExpectedSalaryAtRetirement(User $user = null)
    {
        return (integer)$this->getGosi($user)['gosi']['expecting_salary_at_retirement'];
        // return $this->getGosi($user)['gosi']['mothly_life_expenses_after_retirement'];
    }

    public function getPlannedRetirementAge(User $user = null)
    {
        return $this->getPersonalInfo($user)['personal_info']['retirement_age'];
    }

    public function getSubscriptionMonth(User $user = null)
    {
        return ((integer)$this->getPlannedRetirementAge()-$this->getPersonalInfo($user)['personal_info']['years_old'])*12;
    }

    public function getRetirementGOCIMonthlyIncome(User $user = null)
    {
        return ((integer)$this->getExpectedSalaryAtRetirement())*($this->getSubscriptionMonth()/480);
    }

    public function getCashAndEquivlent(User $user = null)
    {
        return (integer)$this->getNetAssets($user)['net_assets']['financial_assets']['cash_and_deposit'];
    }

    public function getEquities(User $user = null)
    {
        return (integer)$this->getNetAssets($user)['net_assets']['financial_assets']['equities'];
    }

    public function getFixIncome(User $user = null)
    {
        return (integer)$this->getNetAssets($user)['net_assets']['financial_assets']['bonds'];
    }

    public function getAlternativeInvestments(User $user = null)
    {
        return array_sum($this->getNetAssets($user)['net_assets']['real_assets']);
    }

    public function getGOSIorPPAmonthlySubscription(User $user = null)
    {
        return (integer)$this->getSavingPlan($user)['saving_plan']['gosi_or_ppa_monthly_subscription'];
    }

    public function getMonthlySavingPlanForRetirement(User $user = null)
    {
        return (integer)$this->getSavingPlan($user)['saving_plan']['monthly_saving_plan_for_retirement'];
    }

    public function getAccomulativeSavingtoday(User $user = null)
    {
        return (integer)$this->getSavingPlan($user)['saving_plan']['current_saving_balance'];
    }

    public function getCurrentAge(User $user = null)
    {
        return (integer)$this->getPersonalInfo($user)['personal_info']['years_old'];
    }

    public function getAnnualIncreaseInSavingPlan(User $user = null)
    {
        return (integer)$this->getSavingPlan($user)['saving_plan']['annual_increase_in_saving_plan'];
    }

    public function getuserInfo(User $user = null)
    {
        return $this->getPersonalInfo($user)['personal_info'];
    }

    public function getAccomulativeSavingRating(User $user = null)
    {
        $accumulativeSavingToday = $this->getAccomulativeSavingtoday();
        $age = $this->getCurrentAge();
        $totalIncome = (int)$this->getIncome($user)['income']['salary'] + (int)$this->getIncome($user)['income']['private_buisness_or_freelancing'] + (int)$this->getIncome($user)['income']['other'];
        $savingRating = '';


        // $accumulativeSavingToday = 125000;
        // $totalIncome = 50000;
        // $age = 25;

        // dd($accumulativeSavingToday , $totalIncome );

        if($age < 30)
        {   
            if($totalIncome >= $accumulativeSavingToday)
                $savingRating = 'Poor';
            else if(($totalIncome * 4.99999) >= $accumulativeSavingToday && ($totalIncome * 1.00001) <= $accumulativeSavingToday)
                $savingRating = 'Fair';
            else if(($totalIncome * 5) >= $accumulativeSavingToday)
                $savingRating = 'Good';
            else
                $savingRating = 'Good';
            
        }
        else if($age >= 30 && $age < 40)
        {

            if(($totalIncome * 4) >= $accumulativeSavingToday)
                $savingRating = 'Poor';
            else if(($totalIncome * 11.99999) >= $accumulativeSavingToday && ($totalIncome * 4.00001) <= $accumulativeSavingToday)
                $savingRating = 'Fair';
            else if(($totalIncome * 12) >= $accumulativeSavingToday)
                $savingRating = 'Good';
            else
                $savingRating = 'Good';
        }
        else if($age >= 40 && $age < 50)
        {

            if((($totalIncome * 4) * 3) >= $accumulativeSavingToday)
                $savingRating = 'Poor';
            else if((($totalIncome * 4.00001) * 3) >= $accumulativeSavingToday && (($totalIncome * 11.99999) * 3) <= $accumulativeSavingToday)
                $savingRating = 'Fair';
            else if((($totalIncome * 12) * 3) >= $accumulativeSavingToday)
                $savingRating = 'Good';
            else
                $savingRating = 'Good';
        }
        else if($age >= 50 && $age < 60)
        {

            if((($totalIncome * 4) * 6) >= $accumulativeSavingToday)
                $savingRating = 'Poor';
            else if((($totalIncome * 4.00001) * 6) >= $accumulativeSavingToday && (($totalIncome * 11.99999) * 6) <= $accumulativeSavingToday)
                $savingRating = 'Fair';
            else if((($totalIncome * 12) * 6) >= $accumulativeSavingToday)
                $savingRating = 'Good';
            else
                $savingRating = 'Good';
        }
        else if($age >= 60)
        {
            
            if((($totalIncome * 4) * 8) >= $accumulativeSavingToday)
                $savingRating = 'Poor';
            else if((($totalIncome * 4.00001) * 8) >= $accumulativeSavingToday && (($totalIncome * 11.99999) * 8) <= $accumulativeSavingToday)
                $savingRating = 'Fair';
            else if((($totalIncome * 12) * 8) >= $accumulativeSavingToday )
                $savingRating = 'Good';
            else
                $savingRating = 'Good';
        }
        else
            $savingRating = null;


        // dd($savingRating, $accumulativeSavingToday, $totalIncome, $age);

        return $savingRating;
            
    }

    public function getRecomendedAssetAllocation(User $user = null)
    {

        if ($this->getRiskTotalPoints($user) < 20) {

            $points = Constant::where('constant_meta_type', 'Very_Conservative_Investor')->get();
        } else if ($this->getRiskTotalPoints($user) >= 20 && $this->getRiskTotalPoints($user) < 40){

            $points = Constant::where('constant_meta_type', 'Conservative_Investor')->get();
        } else if ($this->getRiskTotalPoints($user) >= 40 && $this->getRiskTotalPoints($user) < 60){

            $points = Constant::where('constant_meta_type', 'Natrual_Investor')->get();
        } else if ($this->getRiskTotalPoints($user) >= 60 && $this->getRiskTotalPoints($user) < 80){

            $points = Constant::where('constant_meta_type', 'Aggressive_Investor')->get();
        } else if ($this->getRiskTotalPoints($user) >= 80 && $this->getRiskTotalPoints($user) <= 100){

            $points = Constant::where('constant_meta_type', 'Very_Aggressive_Investor')->get();
        } 

        return [
                'cash_and_equivlent' => (integer)$points[0]->constant_value ?? 0,
                'equities' => (integer)$points[1]->constant_value ?? 0,
                'fix_income' => (integer)$points[2]->constant_value ?? 0,
                'alternative_investments' => (integer)$points[3]->constant_value ?? 0,
                
            ];
    }

    public function getReturnAssumptions(User $user = null)
    {
        $cash_and_equivlent = Constant::where('constant_attribute' , 'cash_and_equivlent')->first();
        $equities = Constant::where('constant_attribute' , 'equities')->first();
        $fix_income = Constant::where('constant_attribute' , 'fix_income')->first();
        $alternative_investments = Constant::where('constant_attribute' , 'alternative_investments')->first();

        return [
                'cash_and_equivlent' => (integer)$cash_and_equivlent->constant_value ?? 0,
                'equities' => (integer)$equities->constant_value ?? 0,
                'fix_income' => (integer)$fix_income->constant_value ?? 0,
                'alternative_investments' => (integer)$alternative_investments->constant_value ?? 0,
            ];

    }


    public function scopeGetMe($query)
    {
        return $query->where([
            'id' => 1,
        ]);
    }



    public function getHistoricalTotalReturnConstants()
    {
        return Constant::where('constant_meta_type', 'historical_total_returns')
                        ->get();
    }

    public function getPorfolioExpectedReturn($value='')
    {
        // dd($this->getReturnAssumptions());
        return  (((integer)$this->getRecomendedAssetAllocation()['cash_and_equivlent'] * (integer)$this->getReturnAssumptions()['cash_and_equivlent'])/100) + 
                (((integer)$this->getRecomendedAssetAllocation()['equities'] * (integer)$this->getReturnAssumptions()['equities'])/100) + 
                (((integer)$this->getRecomendedAssetAllocation()['fix_income'] * (integer)$this->getReturnAssumptions()['fix_income'])/100) + 
                (((integer)$this->getRecomendedAssetAllocation()['alternative_investments'] * (integer)$this->getReturnAssumptions()['alternative_investments'])/100) ;
        
    }

}
