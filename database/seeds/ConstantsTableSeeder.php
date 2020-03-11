<?php

use Illuminate\Database\Seeder;

class ConstantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $constants = array([
            [
                "constant_meta_type" => "historical_total_returns",
                "constant_attribute" => "cash_and_deposits",
                "constant_value" => 1,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "historical_total_returns",
                "constant_attribute" => "local_equity",
                "constant_value" => 10,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "historical_total_returns",
                "constant_attribute" => "international_equity",
                "constant_value" => 8,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "historical_total_returns",
                "constant_attribute" => "government_bonds",
                "constant_value" => 5,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "historical_total_returns",
                "constant_attribute" => "corporate_bonds",
                "constant_value" => 7,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "historical_total_returns",
                "constant_attribute" => "reits",
                "constant_value" => 8,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "historical_total_returns",
                "constant_attribute" => "direct_properties",
                "constant_value" => 9,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],


            [
                "constant_meta_type" => "investment_plan_(SAR)",
                "constant_attribute" => "cash_returns",
                "constant_value" => 4,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "investment_plan_(SAR)",
                "constant_attribute" => "total_returns",
                "constant_value" => 8,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],


            [
                "constant_meta_type" => "inflation",
                "constant_attribute" => "(_increase_in_income_,_saving_,_inflation_)",
                "constant_value" => 3,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "uncertainty",
                "constant_attribute" => "(_in_returns_,_saving_)",
                "constant_value" => 2,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],


            [
                "constant_meta_type" => "retirement_planner_(_before_retirement_)",
                "constant_attribute" => "retirement_savings_balance_($)_'_starting_amount_'",
                "constant_value" => 50000,
                "constant_symbol" => '$',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_before_retirement_)",
                "constant_attribute" => "annual_savings_increases_(%)",
                "constant_value" => 0,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_before_retirement_)",
                "constant_attribute" => "investment_return_(before_retirement)_(%)",
                "constant_value" => 8,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_after_retirement_)",
                "constant_attribute" => "annual_pension_benefit_($)",
                "constant_value" => 240000,
                "constant_symbol" => '$',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_after_retirement_)",
                "constant_attribute" => "annual_pension_benefit_increases_(%)",
                "constant_value" => 0,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_after_retirement_)",
                "constant_attribute" => "income_replacement_(%)",
                "constant_value" => 100,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_after_retirement_)",
                "constant_attribute" => "investment_return_(after_retirement)_(%)",
                "constant_value" => 6,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],

            [
                "constant_meta_type" => "retirement_planner_(_uncertainty_)",
                "constant_attribute" => "investment_return_uncertainty_(%)",
                "constant_value" => 2,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_uncertainty_)",
                "constant_attribute" => "annual_savings_amount_uncertainty_(%)",
                "constant_value" => 0,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_uncertainty_)",
                "constant_attribute" => "annual_savings_increases_uncertainty_(%)",
                "constant_value" => 0,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_uncertainty_)",
                "constant_attribute" => "annual_pension_benefit_amount_uncertainty_(%)",
                "constant_value" => 0,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "constant_meta_type" => "retirement_planner_(_uncertainty_)",
                "constant_attribute" => "annual_pension_benefit_increases_uncertainty_(%)",
                "constant_value" => 0,
                "constant_symbol" => '%',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],
        ]);

        foreach ($constants as $constant)
            DB::table('constants')->insert($constant);
    }
}
