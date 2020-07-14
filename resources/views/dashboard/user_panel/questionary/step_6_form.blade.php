@inject('request', 'Illuminate\Http\Request')
{{-- {{ dd($user_questionnaire) }} --}}
@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')
<style type="text/css">
.form-control {
    padding: 0 10px;
    margin-bottom: 30px;
}
@media screen and (max-width: 768px) {
    .progress-bar{
        width: 50% !important;
    }
}
</style>
@endsection


@section('content')	
<div class="container">
    <div class="row mb-0 pt-5" style="position: relative; z-index: 10;">
		<div class="col-md-12">
			<a href="{{ route('step_5', app()->getLocale()) }}" style="color: #01630a;" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
				<i class="{{ ($request->segment(1) == 'en') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i> 
				{{ trans('lang.question.go_to_previous_step') }}
			</a>
		</div>
	</div>

    <div class="row" style="margin-top: -5%;">
        <div class="col-sm-12">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="wizard-card" data-color="orange" id="wizardProfile">
                	<div class="wizard-navigation">
						<div class="progress-with-circle">
						     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 50%;"></div>
						</div>
						<ul>
                            <li>
                            	<p class="progressbar_text">
                            		{{ trans('lang.question_headings.personal_info') }}
                            	</p>
                            	<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<a href="{{ route('step_1', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_1.svg') }}"></a>
									</div>
									
								</a>
							</li>
                            <li>
                            	<p class="progressbar_text">
                            		{{ trans('lang.question_headings.income') }}
                            	</p>
                            	<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<a href="{{ route('step_2', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_2.svg') }}"></a>
									</div>
									
								</a>
							</li>
                            <li >
                            	<p class="progressbar_text">
                            		{{ trans('lang.question_headings.expenses') }}
                            	</p>
                            	<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<a href="{{ route('step_3', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_3.png') }}"></a>
									</div>
									
								</a>
							</li>
							<li class="tab-mob">
								<p>
									{{ trans('lang.question_headings.net_assets') }}
								</p>
								<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<a href="{{ route('step_4', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_4.png') }}"></a>
									</div>
									
								</a>
							</li>
							<li class="tab-mob">
								<p>
									{{ trans('lang.question_headings.gosi') }}
								</p>
								<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<a href="{{ route('step_5', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_5_white.png') }}"></a>
									</div>
									
								</a>
							</li>
							<li class="active tab-mob">
								<p><span style="color: #01630a;">
									{{ trans('lang.question_headings.risk') }}
								</span></p>
								<a href="#risk" data-toggle="tab">
									<div class="icon-circle checked">
										<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.png') }}">
									</div>
									
								</a>
							</li>
							
                        </ul>
					</div>

                    <form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST">
                    	@csrf

                    	<div class="tab-content">
                        	<div class="row">
                        		<div class="col-sm-3"></div>
                        		<div class="col-sm-6">
									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
				                          	{{ trans('lang.question.risk_age') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[age]"
				                          	>
				                          	<option
				                          		{!! ($user_questionnaire->risks && 'Less than 31' == $user_questionnaire->risks['risks']['age']) ? 'selected' : '' !!}

				                          		 value="Less than 31">
				                          		{{ trans('lang.question.less_than_31') }}
				                          	</option>
				                          	<option
				                          		{!! ($user_questionnaire->risks && '31 – 40' == $user_questionnaire->risks['risks']['age']) ? 'selected' : '' !!}

				                          		 value="31 – 40">
				                          		{{ trans('lang.question.31_40') }}
				                          	</option>
				                          	<option
				                          		{!! ($user_questionnaire->risks && '41 – 50' == $user_questionnaire->risks['risks']['age']) ? 'selected' : '' !!}

				                          		 value="41 – 50">
				                          		{{ trans('lang.question.41_50') }}
				                          	</option>
				                          	<option
				                          		{!! ($user_questionnaire->risks && '51 – 60' == $user_questionnaire->risks['risks']['age']) ? 'selected' : '' !!}

				                          		 value="51 – 60">
				                          		{{ trans('lang.question.51_60') }}
				                          	</option>
				                          	<option
				                          		{!! ($user_questionnaire->risks && 'More than 60' == $user_questionnaire->risks['risks']['age']) ? 'selected' : '' !!}

				                          		 value="More than 60">
				                          		{{ trans('lang.question.more_than_60') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          </select>

				                          @error('risks.age')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror

				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.my_total_saving_and_investment_amount') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[total_saving_and_investment_amount]"
				                          	>
				                          	<option
				                          		
				                          		{!! ($user_questionnaire->risks && 'Less than 50% of my annual income' == $user_questionnaire->risks['risks']['total_saving_and_investment_amount']) ? 'selected' : '' !!}

				                          		value="Less than 50% of my annual income">
				                          		{{ trans('lang.question.less_than_50%_of_my_annual_income') }}
				                          	</option>
				                          	<option
				                          		
				                          		{!! ($user_questionnaire->risks && 'Almost 50% of my annual income' == $user_questionnaire->risks['risks']['total_saving_and_investment_amount']) ? 'selected' : '' !!}

				                          		value="Almost 50% of my annual income">
				                          		{{ trans('lang.question.almost_50%_of_my_annual_income') }}
				                          	</option>
				                          	<option
				                          		
				                          		{!! ($user_questionnaire->risks && 'Equal to my annual income' == $user_questionnaire->risks['risks']['total_saving_and_investment_amount']) ? 'selected' : '' !!}

				                          		value="Equal to my annual income">
				                          		{{ trans('lang.question.equal_to_my_annual_income') }}
				                          	</option>
				                          	<option
				                          		
				                          		{!! ($user_questionnaire->risks && 'Almost double (2x) of my annual income' == $user_questionnaire->risks['risks']['total_saving_and_investment_amount']) ? 'selected' : '' !!}

				                          		value="Almost double (2x) of my annual income">
				                          		{{ trans('lang.question.almost_double_(2x)_of_my_annual_income') }}
				                          	</option>
				                          	<option
				                          		
				                          		{!! ($user_questionnaire->risks && 'Almost triple (3x) of my annual income' == $user_questionnaire->risks['risks']['total_saving_and_investment_amount']) ? 'selected' : '' !!}

				                          		value="Almost triple (3x) of my annual income">
				                          		{{ trans('lang.question.almost_triple_(3x)_of_my_annual_income') }}
				                          	</option>
				                          	<option
				                          		
				                          		{!! ($user_questionnaire->risks && 'Almost five time (5x) of my annual income' == $user_questionnaire->risks['risks']['total_saving_and_investment_amount']) ? 'selected' : '' !!}

				                          		value="Almost five time (5x) of my annual income">
				                          		{{ trans('lang.question.almost_five_time_(5x)_of_my_annual_income') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>
				                          @error('risks.total_saving_and_investment_amount')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror
				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.during_the_next_few_years_,_the_likelihood_of_my_annual_income_change_would_be') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be]"
				                          	>
				                          	<option 
				                          		{!! ($user_questionnaire->risks && 'Slightly decrease' == $user_questionnaire->risks['risks']['during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be']) ? 'selected' : '' !!}
				                          		value="Slightly decrease">
				                          		{{ trans('lang.question.slightly_decrease') }}
				                          	</option>
				                          	<option 
				                          		{!! ($user_questionnaire->risks && 'No change' == $user_questionnaire->risks['risks']['during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be']) ? 'selected' : '' !!}
				                          		value="No change">
				                          		{{ trans('lang.question.no_change') }}
				                          	</option>
				                          	<option 
				                          		{!! ($user_questionnaire->risks && 'Slightly increase than the annual inflation' == $user_questionnaire->risks['risks']['during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be']) ? 'selected' : '' !!}
				                          		value="Slightly increase than the annual inflation">
				                          		{{ trans('lang.question.slightly_increase_than_the_annual_inflation') }}
				                          	</option>
				                          	<option 
				                          		{!! ($user_questionnaire->risks && 'Remarkable increase than the annual inflation' == $user_questionnaire->risks['risks']['during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be']) ? 'selected' : '' !!}
				                          		value="Remarkable increase than the annual inflation">
				                          		{{ trans('lang.question.remarkable_increase_than_the_annual_inflation') }}
				                          	</option>
				                          	<option 
				                          		{!! ($user_questionnaire->risks && 'Unstable (from my investment)' == $user_questionnaire->risks['risks']['during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be']) ? 'selected' : '' !!}
				                          		value="Unstable (from my investment)">
				                          		{{ trans('lang.question.unstable_(from_my_investment)') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>

				                          @error('risks.during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror
				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.regarding_my_major_expenses_before_retirement_(including_family_expenses_such_as_education_,_buying_a_house_etc)') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)]"
				                          	>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I will manage to cover all expenses from my annual income' == $user_questionnaire->risks['risks']['regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)']) ? 'selected' : '' !!}

				                          		value="I will manage to cover all expenses from my annual income">
				                          		{{ trans('lang.question.i_will_manage_to_cover_all_expenses_from_my_annual_income') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I might need to withdraw some of my saving to cover expenses' == $user_questionnaire->risks['risks']['regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)']) ? 'selected' : '' !!}

				                          		value="I might need to withdraw some of my saving to cover expenses">
				                          		{{ trans('lang.question.i_might_need_to_withdraw_some_of_my_saving_to_cover_expenses') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I might need to withdraw more than half of my saving to cover expenses' == $user_questionnaire->risks['risks']['regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)']) ? 'selected' : '' !!}

				                          		value="I might need to withdraw more than half of my saving to cover expenses">
				                          		{{ trans('lang.question.i_might_need_to_withdraw_more_than_half_of_my_saving_to_cover_expenses') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I might need to withdraw all my saving to cover expenses before retirement' == $user_questionnaire->risks['risks']['regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)']) ? 'selected' : '' !!}

				                          		value="I might need to withdraw all my saving to cover expenses before retirement">
				                          		{{ trans('lang.question.i_might_need_to_withdraw_all_my_saving_to_cover_expenses_before_retirement') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I don’t have expected expenses' == $user_questionnaire->risks['risks']['regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)']) ? 'selected' : '' !!}

				                          		value="I don’t have expected expenses">
				                          		{{ trans('lang.question.i_dont_have_expected_expenses') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>

				                          @error('risks.regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror

				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.based_on_my_current_lifestyle_and_health_state_,_the_likelihood_of_having_health_issue_during_the_next_10_years') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years]"
				                          	>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Above the average' == $user_questionnaire->risks['risks']['based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years']) ? 'selected' : '' !!}

				                          		value="Above the average">
				                          		{{ trans('lang.question.above_the_average') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Average' == $user_questionnaire->risks['risks']['based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years']) ? 'selected' : '' !!}

				                          		value="Average">
				                          		{{ trans('lang.question.average') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Unlikely' == $user_questionnaire->risks['risks']['based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years']) ? 'selected' : '' !!}

				                          		value="Unlikely">
				                          		{{ trans('lang.question.unlikely') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Almost no' == $user_questionnaire->risks['risks']['based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years']) ? 'selected' : '' !!}

				                          		value="Almost no">
				                          		{{ trans('lang.question.almost_no') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>

				                          @error('risks.based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror
				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.i_can_say_about_my_investment_experience') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[about_investment_experience]"
				                          	>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I have no previous experience in public equity Markets nor mutual funds' == $user_questionnaire->risks['risks']['about_investment_experience']) ? 'selected' : '' !!}

				                          		value="I have no previous experience in public equity Markets nor mutual funds">
				                          		{{ trans('lang.question.i_have_no_previous_experience_in_public_equity_markets_nor_mutual_funds') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I have a little knowledge. I have invested a little amount in the public equity Markets nor mutual funds' == $user_questionnaire->risks['risks']['about_investment_experience']) ? 'selected' : '' !!}

				                          		value="I have a little knowledge. I have invested a little amount in the public equity Markets nor mutual funds">
				                          		{{ trans('lang.question.i_have_a_little_knowledge_i_have_invested_a_little_amount_in_the_public_equity_markets_nor_mutual_funds') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I have knowledge. I have invested a big amount in the public equity Markets nor mutual funds' == $user_questionnaire->risks['risks']['about_investment_experience']) ? 'selected' : '' !!}

				                          		value="I have knowledge. I have invested a big amount in the public equity Markets nor mutual funds">
				                          		{{ trans('lang.question.i_have_knowledge_i_have_invested_a_big_amount_in_the_public_equity_markets_nor_mutual_funds') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I have a good knowledge. I have invested in international public equity markets and in other investment tools and financial derivatives' == $user_questionnaire->risks['risks']['about_investment_experience']) ? 'selected' : '' !!}

				                          		value="I have a good knowledge. I have invested in international public equity markets and in other investment tools and financial derivatives">
				                          		{{ trans('lang.question.i_have_a_good_knowledge_i_have_invested_in_international_public_equity_markets_and_in_other_investment_tools_and_financial_derivatives') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>

				                          @error('risks.about_investment_experience')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror

				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.i_expect_to_start_withdrawing_my_saving') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[expect_to_start_withdrawing_saving]"
				                          	>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Less than 5 years' == $user_questionnaire->risks['risks']['expect_to_start_withdrawing_saving']) ? 'selected' : '' !!}

				                          		value="Less than 5 years">
				                          		{{ trans('lang.question.less_than_5_years') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && '5 – 10 years' == $user_questionnaire->risks['risks']['expect_to_start_withdrawing_saving']) ? 'selected' : '' !!}

				                          		value="5 – 10 years">
				                          		{{ trans('lang.question.5_10_years') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && '10 – 15 years' == $user_questionnaire->risks['risks']['expect_to_start_withdrawing_saving']) ? 'selected' : '' !!}

				                          		value="10 – 15 years">
				                          		{{ trans('lang.question.10_15_years') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'More than 15 years' == $user_questionnaire->risks['risks']['expect_to_start_withdrawing_saving']) ? 'selected' : '' !!}

				                          		value="More than 15 years">
				                          		{{ trans('lang.question.more_than_15_years') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I have no saving or I have already withdrawing from it' == $user_questionnaire->risks['risks']['expect_to_start_withdrawing_saving']) ? 'selected' : '' !!}

				                          		value="I have no saving or I have already withdrawing from it">
				                          		{{ trans('lang.question.i_have_no_saving_or_i_have_already_withdrawing_from_it') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          	
				                          </select>

				                          @error('risks.expect_to_start_withdrawing_saving')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror

				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)]"
				                          	>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I would sell all of my investments to save what have left' == $user_questionnaire->risks['risks']['in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)']) ? 'selected' : '' !!}

				                          		value="I would sell all of my investments to save what have left">
				                          		{{ trans('lang.question.i_would_sell_all_of_my_investments_to_save_what_have_left') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I will sell part of my investments so that I can invest in other lower risk tools' == $user_questionnaire->risks['risks']['in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)']) ? 'selected' : '' !!}

				                          		value="I will sell part of my investments so that I can invest in other lower risk tools">
				                          		{{ trans('lang.question.i_will_sell_part_of_my_investments_so_that_i_can_invest_in_other_lower_risk_tools') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I would not sell and wait to recover to its original value' == $user_questionnaire->risks['risks']['in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)']) ? 'selected' : '' !!}

				                          		value="I would not sell and wait to recover to its original value">
				                          		{{ trans('lang.question.i_would_not_sell_and_wait_to_recover_to_its_original_value') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Investing more money to reduce the cost of investments' == $user_questionnaire->risks['risks']['in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)']) ? 'selected' : '' !!}

				                          		value="Investing more money to reduce the cost of investments">
				                          		{{ trans('lang.question.investing_more_money_to_reduce_the_cost_of_investments') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>

				                          @error('risks.in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror

				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years]"
				                          	>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'After 10 years, The probability of best investment value = 500,000 and the worst = 50,000' == $user_questionnaire->risks['risks']['in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years']) ? 'selected' : '' !!}

				                          		value="After 10 years, The probability of best investment value = 500,000 and the worst = 50,000">
				                          		{{ trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_500,000_and_the_worst_=_50,000') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'After 10 years, The probability of best investment value = 850,000 and the worst = 20,000' == $user_questionnaire->risks['risks']['in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years']) ? 'selected' : '' !!}

				                          		value="After 10 years, The probability of best investment value = 850,000 and the worst = 20,000">
				                          		{{ trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_850,000_and_the_worst_=_20,000') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'After 10 years, The probability of best investment value = 300,000 and the worst = 65,000' == $user_questionnaire->risks['risks']['in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years']) ? 'selected' : '' !!}

				                          		value="After 10 years, The probability of best investment value = 300,000 and the worst = 65,000">
				                          		{{ trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_300,000_and_the_worst_=_65,000') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'After 10 years, The probability of best investment value = 150,000 and the worst = 100,000' == $user_questionnaire->risks['risks']['in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years']) ? 'selected' : '' !!}

				                          		value="After 10 years, The probability of best investment value = 150,000 and the worst = 100,000">
				                          		{{ trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_150,000_and_the_worst_=_100,000') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>

				                          @error('risks.in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror

				                    	</div>
									</div>

									<div class="form-group">
										<div class="form-group">
				                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
				                          	{{ trans('lang.question.when_i_buy_a_car_insurance_i_prefer') }}
				                          </label>
				                          <select 
				                          	class="form-control" 
				                          	name="risks[when_i_buy_a_car_insurance_i_prefer]"
				                          	>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Insurance with the highest cover even if it was expensive' == $user_questionnaire->risks['risks']['when_i_buy_a_car_insurance_i_prefer']) ? 'selected' : '' !!}

				                          		value="Insurance with the highest cover even if it was expensive">
				                          		{{ trans('lang.question.insurance_with_the_highest_cover_even_if_it_was_expensive') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Insurance with a limited cover even if it was expensive' == $user_questionnaire->risks['risks']['when_i_buy_a_car_insurance_i_prefer']) ? 'selected' : '' !!}

				                          		value="Insurance with a limited cover even if it was expensive">
				                          		{{ trans('lang.question.insurance_with_a_limited_cover_even_if_it_was_expensive') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'Pay a lower price for a third party one' == $user_questionnaire->risks['risks']['when_i_buy_a_car_insurance_i_prefer']) ? 'selected' : '' !!}

				                          		value="Pay a lower price for a third party one">
				                          		{{ trans('lang.question.pay_a_lower_price_for_a_third_party_one') }}
				                          	</option>
				                          	<option 

				                          		{!! ($user_questionnaire->risks && 'I prefer not buying a care insurance' == $user_questionnaire->risks['risks']['when_i_buy_a_car_insurance_i_prefer']) ? 'selected' : '' !!}

				                          		value="I prefer not buying a care insurance">
				                          		{{ trans('lang.question.i_prefer_not_buying_a_care_insurance') }}
				                          	</option>
				                          	<optgroup label=""></optgroup>
				                          	
				                          </select>

				                          @error('risks.when_i_buy_a_car_insurance_i_prefer')
					                            <label class="error" >{{ $message }}</label>
					                      @enderror
					                      
				                    	</div>
									</div>

									<br>
									<br>
									<div class="center_content">
										<button type="submit" class="button">
											{{-- {{ trans('lang.question.continue_to_payment') }} --}}
											{{ trans('lang.get_your_report') }}
											<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
										</button>

									</div>
									<br>
									<br>
									<br>
								</div>
							</div>
						</div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('backend_assets/questions/assets/js/jquery-2.2.4.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/bootstrap.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/jquery.bootstrap.wizard.js') }} " type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('backend_assets/questions/assets/js/demo.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/paper-bootstrap-wizard.js') }} " type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
{{-- <script src="{{ asset('backend_assets/questions/assets/js/jquery.validate.min.js') }} " type="text/javascript"></script> --}}
@include('dashboard.user_panel.partials.validate')
@endsection