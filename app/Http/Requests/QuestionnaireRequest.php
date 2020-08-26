<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionnaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $previous_url = str_replace(url('/'.app()->getLocale().'/'), '', url()->previous());
        // dd($previous_url);
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    switch ($previous_url) {
                        case '/step_1':
                            return [
                                'personal_info' => 'required|array',
                                'personal_info.name' => 'required|string|max:25',
                                'personal_info.years_old' => 'required|numeric|max:120|min:5',
                                'personal_info.education_level' => 'required|string|max:255',
                                'personal_info.retirement_age' => 'required|numeric|gte:personal_info.years_old|max:120',
                                'phone_number' => 'required|numeric|regex:/(01)[0-9]{12}/',
                            ];
                            break;

                        case '/step_2':
                            return [
                                'income' => 'required|array',
                                // income
                                'income.salary' => 'required|numeric',
                                'income.private_buisness_or_freelancing' => 'required|numeric',
                                'income.other' => 'required|numeric',
                               
                            ];
                            break;

                        case '/step_3':
                            return [
                                'saving_plan' => 'required|array',
                                'saving_plan.current_saving_balance' => 'required|numeric',
                                'saving_plan.gosi_or_ppa_monthly_subscription' => 'required|numeric',
                                'saving_plan.monthly_saving_plan_for_retirement' => 'required|numeric',
                                'saving_plan.annual_increase_in_saving_plan' => 'required|numeric|max:10|min:0',
                                
                            ];
                            break;

                        case '/step_4':
                            return [
                                // net_assets
                                'net_assets' => 'required|array',
                                // assets
                                'net_assets.financial_assets' => 'required|array',
                                // liquid
                                'net_assets.financial_assets.cash_and_deposit' => 'required|numeric',
                                'net_assets.financial_assets.equities' => 'required|numeric',
                                'net_assets.financial_assets.bonds' => 'required|numeric',


                                'net_assets.real_assets' => 'required|array',
                                // liquid
                                'net_assets.real_assets.real_estate' => 'required|numeric',
                                'net_assets.real_assets.pe' => 'required|numeric',


                                'net_assets.liabilities' => 'required|array',
                                // liquid
                                'net_assets.liabilities.personal_loan' => 'required|numeric',
                                'net_assets.liabilities.real_estate_loan' => 'required|numeric',
                                'net_assets.liabilities.credit_cards' => 'required|numeric',
                                
                                
                            ];
                            break;
                        
                        case '/step_5':
                            return [
                                // gosi
                                'gosi' => 'required|array',
                                'gosi.strating_year_in_plan' => 'required|date_format:Y',
                                'gosi.expecting_salary_at_retirement' => 'required|numeric',
                                // 'gosi.mothly_life_expenses_after_retirement' => 'required|numeric',
                            ];
                            break;
                        
                        case '/step_6':
                            return [
                                // risks
                                'risks' => 'required|array',

                                'risks.age' => 'required|in:"Less than 31","31 – 40","41 – 50","51 – 60","More than 60"',

                                'risks.total_saving_and_investment_amount' => 'required|in:"Less than 50% of my annual income","Almost 50% of my annual income","Equal to my annual income","Almost double (2x) of my annual income","Almost triple (3x) of my annual income","Almost five time (5x) of my annual income"',

                                'risks.during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => 'required|in:"Slightly decrease","No change","Slightly increase than the annual inflation","Remarkable increase than the annual inflation","Unstable (from my investment)"',

                                'risks.regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => 'required|in:"I will manage to cover all expenses from my annual income","I might need to withdraw some of my saving to cover expenses","I might need to withdraw more than half of my saving to cover expenses","I might need to withdraw all my saving to cover expenses before retirement","I don’t have expected expenses"',

                                'risks.based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years' => 'required|in:"Above the average","Average","Unlikely","Almost no"',
                                'risks.about_investment_experience' => 'required|in:"I have no previous experience in public equity Markets nor mutual funds","I have a little knowledge. I have invested a little amount in the public equity Markets nor mutual funds","I have knowledge. I have invested a big amount in the public equity Markets nor mutual funds","I have a good knowledge. I have invested in international public equity markets and in other investment tools and financial derivatives"',

                                'risks.expect_to_start_withdrawing_saving' => 'required|in:"Less than 5 years","5 – 10 years","10 – 15 years","More than 15 years","I have no saving or I have already withdrawing from it"',

                                'risks.in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => 'required|in:"I would sell all of my investments to save what have left","I will sell part of my investments so that I can invest in other lower risk tools","I would not sell and wait to recover to its original value","Investing more money to reduce the cost of investments"',

                                'risks.in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => 'required|in:"After 10 years, The probability of best investment value = 500,000 and the worst = 50,000","After 10 years, The probability of best investment value = 850,000 and the worst = 20,000","After 10 years, The probability of best investment value = 300,000 and the worst = 65,000","After 10 years, The probability of best investment value = 150,000 and the worst = 100,000"',

                                'risks.when_i_buy_a_car_insurance_i_prefer' => 'required|in:"Insurance with the highest cover even if it was expensive","Insurance with a limited cover even if it was expensive","Pay a lower price for a third party one","I prefer not buying a care insurance"',
                            ];
                            break;
                        
                        case '/step_7':
                            return [
                                // objective
                                'objective' => 'required|array',

                                'objective.retirement_age' => 'required|numeric',
                                'objective.life_expectancy_after_retirement' => 'required|numeric',
                            ];
                            break;

                        default:
                            break;
                    }
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [];
                }
            default:break;
        }
    }


    public function attributes()
    {
        return [
            // --------------------------------------
            // step 1
            'personal_info' => 'Personal Information',
            'started_year_for_personal_financial_plan' => trans('lang.question.started_year_for_personal_financial_plan'),
            'personal_info.name' => trans('lang.question.name'),
            'personal_info.years_old' => trans('lang.question.current_age'),
            // 'personal_info.years_old' => trans('lang.question.years_old'),
            'personal_info.education_level' => trans('lang.question.education_level'),
            'personal_info.retirement_age' => trans('lang.question.retirement_age'),
            'personal_info.no_of_dependents' => trans('lang.question.no_of_dependents'),

            // --------------------------------------
            // step 2
            'income' => 'Income',
            'income.salary' => trans('lang.question.salary'),
            'income.private_buisness_or_freelancing' => trans('lang.question.private_business_or_freelancing'),
            'income.other' => trans('lang.question.other'),
            'income.stock_dividents' => trans('lang.question.stock_dividents'),
            'income.pension_income' => trans('lang.question.pension_income'),
            'income.real_estate_income_rent' => trans('lang.question.real_estate_income_rent'),

            // --------------------------------------
            // step 3
            'saving_plan.current_saving_balance' => trans('lang.question.current_saving_balance'),
            'saving_plan.gosi_or_ppa_monthly_subscription' => trans('lang.question.gosi_or_ppa_monthly_subscription'),
            'saving_plan.monthly_saving_plan_for_retirement' => trans('lang.question.monthly_saving_plan_for_retirement'),
            'saving_plan.annual_increase_in_saving_plan' => trans('lang.question.annual_increase_in_saving_plan'),





            // --------------------------------------
            // step 3 old
            // 'expenses' => 'Expenses',

            // "expenses.house" => 'House Expense',
            // "expenses.house.rent_or_mortgage" => trans('lang.question.rent_or_mortgage'),
            // "expenses.house.insurance" => trans('lang.question.insurance'),
            // "expenses.house.utilities" => trans('lang.question.utilities'),
            // "expenses.house.maintance" => trans('lang.question.maintenance'),

            // "expenses.car" => 'Car Expense',
            // "expenses.car.gas_and_oil" => trans('lang.question.gas_&_oil'),
            // "expenses.car.maintance" => trans('lang.question.car_maintenance'),
            // "expenses.car.insurance" => trans('lang.question.car_insurance'),
            // "expenses.car.payment" => trans('lang.question.car_payment'),

            // "expenses.pocket_money" => 'Pocket Money Expense',
            // "expenses.pocket_money.food" => trans('lang.question.food'),
            // "expenses.pocket_money.clothes" => trans('lang.question.clothes'),
            // "expenses.pocket_money.phone_bills" => trans('lang.question.phone_bills'),

            // "expenses.health_and_education" => 'Health And Education Expense',
            // "expenses.health_and_education.insurance" => trans('lang.question.medical_insurance'),
            // "expenses.health_and_education.medical_treatment" => trans('lang.question.medical_treatement'),
            // "expenses.health_and_education.medicine" => trans('lang.question.medicine'),
            // "expenses.health_and_education.health_accessories" => trans('lang.question.health_accessories'),
            // "expenses.health_and_education.schooling" => trans('lang.question.schooling'),
            // "expenses.health_and_education.gym" => trans('lang.question.gym'),

            // "expenses.investments" => 'Investment Expense',
            // "expenses.investments.life_insurance" => trans('lang.question.life_insurance'),
            // "expenses.investments.retirement_plan_(gosi)" => trans('lang.question.retirement_plan_gosi'),
            // // "expenses.investments.personal_financial_plan" => 'Investment Pwesonal Financial Plan',
            // "expenses.investments.personal_financial_plan" => trans('lang.question.investment_plan_payment'),
            // "expenses.investments.personal_financial_plan" => trans('lang.question.saving_plan_payment'),
            // "expenses.investments.personal_development_and_education" => trans('lang.question.personal_development_&_educations'),

            // "expenses.loan" => 'Loan Expense',
            // "expenses.loan.personal_loan" => trans('lang.question.personal_loan'),
            // "expenses.loan.credit_cards" => trans('lang.question.credit_cards'),

            // "expenses.entertainment" => 'Entertainment',
            // "expenses.entertainment.vacations" => trans('lang.question.vacations'),
            // "expenses.entertainment.others" => trans('lang.question.others'),

            // "expenses.charity_tax" => 'Charity & Tax Expense',
            // "expenses.charity_tax.charity" => trans('lang.question.charity'),
            // "expenses.charity_tax.zakat" => trans('lang.question.zakat'),
            // "expenses.charity_tax.taxes_and_govt_fees" => trans('lang.question.taxes_&_gov_fees'),

            // -----------------------------------------
            // step 4
            'net_assets' => 'Net Assets',

            'net_assets.financial_assets.cash_and_deposit' => trans('lang.question.cash_and_deposit'),
            'net_assets.financial_assets.equities' => trans('lang.question.equities'),
            'net_assets.financial_assets.bonds' => trans('lang.question.bonds'),

            'net_assets.real_assets.real_estate' => trans('lang.question.real_estate'),
            'net_assets.real_assets.pe' => trans('lang.question.pe'),
            
            'net_assets.liabilities.real_estate_loan' => trans('lang.question.real_estate_loan'),
            
            'net_assets.assets' => 'Assets',

            'net_assets.assets.liquid' => 'Liquid Assets',
            'net_assets.assets.liquid.cash' => trans('lang.question.liquid_cash'),
            'net_assets.assets.liquid.time_deposits' => trans('lang.question.liquid_time_deposits'),
            'net_assets.assets.liquid.local_equity' => trans('lang.question.liquid_local_equity'),
            'net_assets.assets.liquid.international_equity' => trans('lang.question.liquid_international_equity'),
            'net_assets.assets.liquid.government_bonds' => trans('lang.question.liquid_government_bonds'),
            'net_assets.assets.liquid.corporate_bonds' => trans('lang.question.liquid_corporate_bonds'),

            'net_assets.assets.unliquid' => 'Unliquid Assets',
            // 'net_assets.assets.unliquid.reits' => 'REITS Assets',
            'net_assets.assets.unliquid.direct_properties' => trans('lang.question.unliquid_direct_properties'),
            'net_assets.assets.unliquid.properties_shared_owned' => trans('lang.question.unliquid_properties_shared_owned'),
            'net_assets.assets.unliquid.international_properties_shared_owned' => trans('lang.question.unliquid_international_properties_shared_owned'),
            'net_assets.assets.unliquid.international_properties_direct_owned' => trans('lang.question.unliquid_international_properties_direct_owned'),
            'net_assets.assets.unliquid.private_business' => trans('lang.question.unliquid_priavte_business'),
            // 'net_assets.assets.unliquid.others' => 'Other Assets',

            'net_assets.assets.personal' => 'Personl Assets',
            'net_assets.assets.personal.vehicles' => trans('lang.question.personal_vehicles'),
            'net_assets.assets.personal.jeweleries' => trans('lang.question.personal_jeweleries'),
            'net_assets.assets.personal.private_house' => trans('lang.question.personal_private_house'),
            'net_assets.assets.personal.art_and_boutique' => trans('lang.question.personal_art_&_boutique'),

            'net_assets.liabilities' => 'Liabilities',
            'net_assets.liabilities.personal_loan' => trans('lang.question.liabilities_personal_loan'),
            'net_assets.liabilities.mortgage' => trans('lang.question.liabilities_mortgage'),
            'net_assets.liabilities.credit_cards' => trans('lang.question.liabilities_credit_cards'),
            'net_assets.liabilities.free_loan' => trans('lang.question.liabilities_free_loan') ,

            // -----------------------------------------
            // gosi
            'gosi' => 'GOSI',
            'gosi.strating_year_in_plan' => trans('lang.question.gosi_starting_year_in_plan'),
            'gosi.expecting_salary_at_retirement' => trans('lang.question.expecting_salary_at_retirement'),
            'gosi.mothly_life_expenses_after_retirement' => trans('lang.question.mothly_life_expenses_after_retirement'),
            // 'gosi.average_of_last_24_months_salary' => trans('lang.question.gosi_average_of_last_24_months_salary'),
            // 'gosi.subscription_months' => trans('lang.question.gosi_subscriptions_months'),

            // -----------------------------------------
            // risks
            'risks' => 'Risks',

            'risks.age' => trans('lang.question.risk_age'),

            'risks.total_saving_and_investment_amount' => trans('lang.question.my_total_saving_and_investment_amount'),

            'risks.during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be' => trans('lang.question.during_the_next_few_years_,_the_likelihood_of_my_annual_income_change_would_be'),

            'risks.regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)' => trans('lang.question.regarding_my_major_expenses_before_retirement_(including_family_expenses_such_as_education_,_buying_a_house_etc)'),

            'risks.based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years' => trans('lang.question.based_on_my_current_lifestyle_and_health_state_,_the_likelihood_of_having_health_issue_during_the_next_10_years'),

            'risks.about_investment_experience' => trans('lang.question.i_can_say_about_my_investment_experience'),

            'risks.expect_to_start_withdrawing_saving' => trans('lang.question.i_expect_to_start_withdrawing_my_saving'),

            'risks.in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => trans('lang.question.in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)'),

            'risks.in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => trans('lang.question.in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years'),

            'risks.when_i_buy_a_car_insurance_i_prefer' => trans('lang.question.when_i_buy_a_car_insurance_i_prefer'),

            // -----------------------------------------------
            // objective
            'objective' => 'Objective',

            'objective.retirement_age' => trans('lang.question.time_horizon'),
            'objective.life_expectancy_after_retirement' => trans('lang.question.life_expectancy'),
        ];
    }

    // public function withValidator($validator)
    // {
    //     // if ($validator->fails()) {
    //     //     dd($validator->errors); //This works
    //     // }
    //     foreach ($validator->messages()->getMessages() as $field_name => $messages)
    //     {
    //         dump($field_name, $messages); // messages are retrieved (publicly)
    //     }
    //     dd('');
    // }
}
