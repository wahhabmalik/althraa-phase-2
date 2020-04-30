@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')

<style type="text/css">
.btn {
    border-radius: 0;
    background: #01630a;
    color: #ffffff;
    border: 2px solid #01630a;
}
.btn:hover {
    border-radius: 0;
    background: #01630a;
    color: #ffffff;
    border: 2px solid #01630a;
}

.button, .button:link, .button:visited {
    background: #01630a 0% 0% no-repeat padding-box !important;
    border-radius: 0.8rem;
    color: #fff;
    opacity: 1;
    padding: 1.5rem 3.3rem;
    text-decoration: none;
    text-transform: capitalize;
    font-size: 1.5rem;
    line-height: 1.8;
    font-family: "Soin Sans Neue Medium", sans-serif;
    transition: background-color 0.3s;
}
.btn.disabled{
	opacity: 1;
	border: none;
	cursor: pointer;
}

@media screen and (max-width: 768px) {
	ul.nav.nav-pills li{
		display: none;
	}
	.tab-mob{
		display: block !important;
		width: 33% !important;
	}
}

.nav-pills .nav-link.active{
	{{ ($request->segment(1) == 'ar') ? '    border-right: 5px solid #01630a !important;border-left: 0px solid #01630a !important;' : '' }}
}
</style>
@endsection


@section('content')
{{-- <div class="content__body"> --}}
<div class="container">
	<div class="row mb-0 pt-5" style="position: relative; z-index: 10;">
		<div class="col-md-12">
			<a href="{{ route('step_1', app()->getLocale()) }}" style="color: #01630a;" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
    				<i class="{{ ($request->segment(1) == 'en') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i> 
    				{{ trans('lang.question.go_to_previous_step') }}
    		</a>
		</div>
	</div>

    <div class="row" style="margin-top: -5%;">
        <div class="col-sm-12">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="wizard-card" data-color="green" id="wizardProfile">
         			<div class="wizard-navigation">
						<div class="progress-with-circle">
						     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 0%;"></div>
						</div>
						<ul>
                            <li>
                            	<p class="progressbar_text">
                            		{{ trans('lang.question_headings.personal_info') }}
                            	</p>
                            	<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<img src="{{ asset('backend_assets/questions/assets/img/step_1.svg') }}">
									</div>
									
								</a>
							</li>
                            <li>
                            	<p class="progressbar_text">
                            		{{ trans('lang.question_headings.income') }}
                            	</p>
                            	<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<img src="{{ asset('backend_assets/questions/assets/img/step_2.svg') }}">
									</div>
									
								</a>
							</li>
                            <li class="active tab-mob">
                            	<p class="progressbar_text"><span style="color: #01630a;">
                            		{{ trans('lang.question_headings.expenses') }}
                            	</span></p>
                            	<a href="#expenses" data-toggle="tab">
									<div class="icon-circle checked">
										<img src="{{ asset('backend_assets/questions/assets/img/step_3_black.png') }}">
									</div>
									
								</a>
							</li>
							<li class="tab-mob">
								<p class="progressbar_text">
									{{ trans('lang.question_headings.net_assets') }}
								</p>
								<a>
									<div class="icon-circle">
										<img src="{{ asset('backend_assets/questions/assets/img/step_4_black.png') }}">
									</div>
									
								</a>
							</li>
							<li class="tab-mob">
								<p class="progressbar_text">
									{{ trans('lang.question_headings.gosi') }}
								</p>
								<a>
									<div class="icon-circle">
										<img src="{{ asset('backend_assets/questions/assets/img/step_5.png') }}">
									</div>
									
								</a>
							</li>
							<li>
								<p class="progressbar_text">
									{{ trans('lang.question_headings.risk') }}
								</p>
								<a>
									<div class="icon-circle">
										<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.svg') }}">
									</div>
									
								</a>
							</li>
							<li>
								<p class="progressbar_text">
									{{ trans('lang.question_headings.objectives') }}
								</p>
								<a>
									<div class="icon-circle">
										<img src="{{ asset('backend_assets/questions/assets/img/step_7_black.svg') }}">
									</div>
									
								</a>
							</li>
                        </ul>
					</div>

					<form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST">
						@csrf
                        <div class="tab-content">
                        	<div class="tab-pane active" id="expenses">
                            	<div class="container">
									<div class="row">
										<div class="{{ ($request->segment(1) == 'ar') ? 'col-md-1' : 'col-md-2' }}"></div>
										<div class="nav flex-column nav-pills col-sm-3 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}" style="position: unset;display: flow-root;text-align: left;padding-right: 27px;height: auto;background-color: #fff;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
											<p class="label_forms">
												{{ trans('lang.question_headings.expenses') }}
											</p>

											<a class="nav-link active 
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'house' )
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" 
												id="v-pills-house-tab" data-toggle="pill" href="#v-pills-house" role="tab" aria-controls="v-pills-house" aria-selected="true">
												{{ trans('lang.question.house') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'car')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-car-tab" data-toggle="pill" href="#v-pills-car" role="tab" aria-controls="v-pills-car" aria-selected="false">
												{{ trans('lang.question.car') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'pocket_money')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-pocket-tab" data-toggle="pill" href="#v-pills-pocket" role="tab" aria-controls="v-pills-pocket" aria-selected="false">
												{{ trans('lang.question.pocket_money') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'health_and_education')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-health-tab" data-toggle="pill" href="#v-pills-health" role="tab" aria-controls="v-pills-health" aria-selected="false">
												{{ trans('lang.question.health_&_education') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'investments')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-investments-tab" data-toggle="pill" href="#v-pills-insurance" role="tab" aria-controls="v-pills-insurance" aria-selected="false">
												{{ trans('lang.question.investments') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'loan')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-loan-tab" data-toggle="pill" href="#v-pills-loan" role="tab" aria-controls="v-pills-loan" aria-selected="false">
												{{ trans('lang.question.loans') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'entertainment')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-entertaining-tab" data-toggle="pill" href="#v-pills-entertaining" role="tab" aria-controls="v-pills-entertaining" aria-selected="false">
												{{ trans('lang.question.entertaining') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'charity_tax')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-charity-tab" data-toggle="pill" href="#v-pills-charity" role="tab" aria-controls="v-pills-charity" aria-selected="false">
												{{ trans('lang.question.charity_&_taxes') }}
											</a>
										  
										</div>

										<div class="tab-content col-sm-4" style="padding-top: 0px;" id="v-pills-tabContent">
											<div class="tab-pane fade show active in" id="v-pills-house" role="tabpanel" aria-labelledby="v-pills-house-tab">
												
												<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.rent_or_mortgage') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="house__rent_or_mortgage" 
											  			class="required form-control house_expense_inputs" 
											  			name="expenses[house][rent_or_mortgage]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["house"]["rent_or_mortgage"] ?? old('expenses.house.rent_or_mortgage') }}" 
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.insurance') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="house__insurance" 
											  			class="required form-control house_expense_inputs" 
											  			name="expenses[house][insurance]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["house"]["insurance"] ?? old('expenses.house.insurance') }}" 
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.utilities') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="house__utilities" 
											  			class="required form-control house_expense_inputs" 
											  			name="expenses[house][utilities]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["house"]["utilities"] ?? old('expenses.house.utilities') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.maintenance') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="house__maintance" 
											  			class="required form-control house_expense_inputs" 
											  			name="expenses[house][maintance]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["house"]["maintance"] ?? old('expenses.house.maintance') }}"
											  			>
											  	</div>

												<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="house__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_car_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>


											</div>

											{{-- Second Tab --}}
											<div class="tab-pane fade" id="v-pills-car" role="tabpanel" aria-labelledby="v-pills-car-tab">
												
												<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.gas_&_oil') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="car__gas_and_oil" 
											  			class="required form-control car_expenses_inputs" 
											  			name="expenses[car][gas_and_oil]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["car"]["gas_and_oil"] ?? old('expenses.car.gas_and_oil') }}"
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.car_maintenance') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="car__maintance" 
											  			class="required form-control car_expenses_inputs" 
											  			name="expenses[car][maintance]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["car"]["maintance"] ?? old('expenses.car.maintance') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.car_insurance') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="car__insurance" 
											  			class="required form-control car_expenses_inputs" 
											  			name="expenses[car][insurance]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["car"]["insurance"] ?? old('expenses.car.insurance') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.car_payment') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="car__payment" 
											  			class="required form-control car_expenses_inputs" 
											  			name="expenses[car][payment]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["car"]["payment"] ?? old('expenses.car.payment') }}"
											  			>
											  	</div>

												<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="car__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_pocket_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>
											</div>

											{{-- Third Tab --}}
											<div class="tab-pane fade" id="v-pills-pocket" role="tabpanel" aria-labelledby="v-pills-pocket-tab">
												
												<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.food') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="pocket_money_food" 
											  			class="required form-control pocket_money_expenses_inputs" 
											  			name="expenses[pocket_money][food]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["pocket_money"]["food"] ?? old('expenses.pocket_money.food') }}"
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.clothes') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="pocket_money_clothes" 
											  			class="required form-control pocket_money_expenses_inputs" 
											  			name="expenses[pocket_money][clothes]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["pocket_money"]["clothes"] ?? old('expenses.pocket_money.clothes') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.phone_bills') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="pocket_money_phone_bills" 
											  			class="required form-control pocket_money_expenses_inputs" 
											  			name="expenses[pocket_money][phone_bills]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["pocket_money"]["phone_bills"] ?? old('expenses.pocket_money.phone_bills') }}"
											  			>
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="pocket_money__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_medical_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>
												
											</div>

											{{-- Forth Tab --}}
											<div class="tab-pane fade" id="v-pills-health" role="tabpanel" aria-labelledby="v-pills-health-tab">
												
											  	<div class="form-group" style="display: none;">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.medical_insurance') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="health_and_education__insurance" 
											  			class="required form-control health_and_education_expenses_inputs" 
											  			name="expenses[health_and_education][insurance]"
											  			required
											  			value="0" 
											  			{{-- value="{{ $user_questionnaire->expenses["expenses"]["health_and_education"]["insurance"] ?? old('expenses.health_and_education.insurance') }}" --}}
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.medical_treatement') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="health_and_education__medical_treatment" 
											  			class="required form-control health_and_education_expenses_inputs" 
											  			name="expenses[health_and_education][medical_treatment]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["health_and_education"]["medical_treatment"] ?? old('expenses.health_and_education.medical_treatment') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.medicine') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="health_and_education__medicine" 
											  			class="required form-control health_and_education_expenses_inputs" 
											  			name="expenses[health_and_education][medicine]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["health_and_education"]["medicine"] ?? old('expenses.health_and_education.medicine') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.health_accessories') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="health_and_education__health_accessories" 
											  			class="required form-control health_and_education_expenses_inputs" 
											  			name="expenses[health_and_education][health_accessories]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["health_and_education"]["health_accessories"] ?? old('expenses.health_and_education.health_accessories') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.schooling') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="health_and_education__schooling" 
											  			class="required form-control health_and_education_expenses_inputs" 
											  			name="expenses[health_and_education][schooling]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["health_and_education"]["schooling"] ?? old('expenses.health_and_education.schooling') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.gym') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="health_and_education__gym" 
											  			class="required form-control health_and_education_expenses_inputs" 
											  			name="expenses[health_and_education][gym]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["health_and_education"]["gym"] ?? old('expenses.health_and_education.gym') }}"
											  			>
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="health_and_education__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_insurance_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>
											</div>

											{{-- Fifth Tab --}}
											<div class="tab-pane fade" id="v-pills-insurance" role="tabpanel" aria-labelledby="v-pills-health-tab">
												
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.life_insurance') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="investments__life_insurance" 
											  			class="required form-control investments_expenses_inputs" 
											  			name="expenses[investments][life_insurance]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["life_insurance"] ?? old('expenses.investments.life_insurance') }}"
											  			>
											  	</div>
											  
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.retirement_plan_gosi') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="investments__retirement_plan_gosi" 
											  			class="required form-control investments_expenses_inputs" 
											  			name="expenses[investments][retirement_plan_(gosi)]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["retirement_plan_(gosi)"] ?? old('expenses.investments.retirement_plan_(gosi)') }}"
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.investment_plan_payment') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="investments__investment_plan_payment" 
											  			class="required form-control investments_expenses_inputs" 
											  			name="expenses[investments][investment_plan_payment]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["investment_plan_payment"] ?? old('expenses.investments.investment_plan_payment') }}"
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.saving_plan_payment') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="investments__saving_plan_payment" 
											  			class="required form-control investments_expenses_inputs" 
											  			name="expenses[investments][saving_plan_payment]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["saving_plan_payment"] ?? old('expenses.investments.saving_plan_payment') }}"
											  			>
											  	</div>

											  	{{-- <div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.personal_financial_plan') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="investments__personal_financial_plan" 
											  			class="required form-control investments_expenses_inputs" 
											  			name="expenses[investments][personal_financial_plan]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["personal_financial_plan"] ?? old('expenses.investments.personal_financial_plan') }}"
											  			>
											  	</div> --}}

											  	{{-- <div class="form-group">
											  		<label class="label_fo s="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			Investment Plan Payment
											  			</label>
											  		<input 
											  			type="text" 
											  			class="required form-control" 
											  			name="expenses[investments][investment_plan_payment]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["investment_plan_payment"] ?? old('expenses[investments][investment_plan_payment]') }}"
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_fo s="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			Saving Plan Payment
											  			</label>
											  		<input 
											  			type="text" 
											  			class="required form-control" 
											  			name="expenses[investments][saving_plan_payment]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["saving_plan_payment"] ?? old('expenses[investments][saving_plan_payment]') }}"
											  			>
											  	</div> --}}

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.personal_development_&_educations') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="investments__personal_development_and_education" 
											  			class="required form-control investments_expenses_inputs" 
											  			name="expenses[investments][personal_development_and_education]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["investments"]["personal_development_and_education"] ?? old('expenses.investments.personal_development_and_education') }}"
											  			>
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="investments__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_loan_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>
											</div>

											{{-- Sixth Tab --}}
											<div class="tab-pane fade" id="v-pills-loan" role="tabpanel" aria-labelledby="v-pills-health-tab">
												
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.personal_loan') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="loan__personal_loan" 
											  			class="required form-control loan_expenses_inputs" 
											  			name="expenses[loan][personal_loan]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["loan"]["personal_loan"] ?? old('expenses.loan.personal_loan') }}"
											  			>
											  	</div>

											  
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.credit_cards') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="loan__credit_cards" 
											  			class="required form-control loan_expenses_inputs" 
											  			name="expenses[loan][credit_cards]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["loan"]["credit_cards"] ?? old('expenses.loan.credit_cards') }}"
											  			>
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="loan__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_entertaining_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>
											</div>

											{{-- Seventh Tab --}}
											<div class="tab-pane fade" id="v-pills-entertaining" role="tabpanel" aria-labelledby="v-pills-health-tab">
												
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.vacations') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="entertainment__vacations" 
											  			class="required form-control entertainment_expenses_inputs" 
											  			name="expenses[entertainment][vacations]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["entertainment"]["vacations"] ?? old('expenses.entertainment.vacations') }}"
											  			>
											  	</div>

											  
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.others') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="entertainment__others" 
											  			class="required form-control entertainment_expenses_inputs" 
											  			name="expenses[entertainment][others]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["entertainment"]["others"] ?? old('expenses.entertainment.others]') }}"
											  			>
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="entertainment__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_charity_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>

											</div>

											{{-- Eighth Tab --}}
											<div class="tab-pane fade" id="v-pills-charity" role="tabpanel" aria-labelledby="v-pills-health-tab">
												
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.charity') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="charity_tax__charity" 
											  			class="required form-control charity_tax_expenses_inputs" 
											  			name="expenses[charity_tax][charity]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["charity_tax"]["charity"] ?? old('expenses.charity_tax.charity') }}"
											  			>
											  	</div>
											  
											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.zakat') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="charity_tax__zakat" 
											  			class="required form-control charity_tax_expenses_inputs" 
											  			name="expenses[charity_tax][zakat]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["charity_tax"]["zakat"] ?? old('expenses.charity_tax.zakat') }}"
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.taxes_&_gov_fees') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="charity_tax__taxes_and_govt_fees" 
											  			class="required form-control charity_tax_expenses_inputs" 
											  			name="expenses[charity_tax][taxes_and_govt_fees]"
											  			required 
											  			value="{{ $user_questionnaire->expenses["expenses"]["charity_tax"]["taxes_and_govt_fees"] ?? old('expenses.charity_tax.taxes_and_govt_fees') }}"
											  			>
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="charity_tax__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>

												<div class="center_content">
													<button type="submit" class="button">
														{{ trans('lang.question.continue_to_net_assets') }}
														<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
													</button>

												</div>
											</div>

										</div>
									</div>
								</div>
                            </div>
                            
                        </div>
                       
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
	</div><!-- end row -->
	
</div>
{{-- </div> --}}
@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){

		update_house__total();
		update_car__total();
		update_pocket_money__total();
		health_and_education__total();
		investments__total();
		loan__total();
		entertainment__total();
		charity_tax__total();

		function update_house__total() {
			house__rent_or_mortgage = $('#house__rent_or_mortgage').val() ? $('#house__rent_or_mortgage').val() : 0;
			house__insurance = $('#house__insurance').val() ? $('#house__insurance').val() : 0;
			house__utilities = $('#house__utilities').val() ? $('#house__utilities').val() : 0;
			house__maintance = $('#house__maintance').val() ? $('#house__maintance').val() : 0;
			var total = parseFloat(house__rent_or_mortgage) + parseFloat(house__insurance) + parseFloat(house__utilities) + parseFloat(house__maintance); 
			$('#house__total').html(total);
		}

		function update_car__total() {
			car__gas_and_oil = $('#car__gas_and_oil').val() ? $('#car__gas_and_oil').val() : 0;
			car__maintance = $('#car__maintance').val() ? $('#car__maintance').val() : 0;
			car__insurance = $('#car__insurance').val() ? $('#car__insurance').val() : 0;
			car__payment = $('#car__payment').val() ? $('#car__payment').val() : 0;
			var total = parseFloat(car__gas_and_oil) + parseFloat(car__maintance) + parseFloat(car__insurance) + parseFloat(car__payment); 
			$('#car__total').html(total);
		}

		function update_pocket_money__total() {
			pocket_money_food = $('#pocket_money_food').val() ? $('#pocket_money_food').val() : 0;
			pocket_money_clothes = $('#pocket_money_clothes').val() ? $('#pocket_money_clothes').val() : 0;
			pocket_money_phone_bills = $('#pocket_money_phone_bills').val() ? $('#pocket_money_phone_bills').val() : 0;
			var total = parseFloat(pocket_money_food) + parseFloat(pocket_money_clothes) + parseFloat(pocket_money_phone_bills); 
			$('#pocket_money__total').html(total);
		}

		function health_and_education__total() {
			health_and_education__insurance = $('#health_and_education__insurance').val() ? $('#health_and_education__insurance').val() : 0;
			health_and_education__medical_treatment = $('#health_and_education__medical_treatment').val() ? $('#health_and_education__medical_treatment').val() : 0;
			health_and_education__medicine = $('#health_and_education__medicine').val() ? $('#health_and_education__medicine').val() : 0;
			health_and_education__health_accessories = $('#health_and_education__health_accessories').val() ? $('#health_and_education__health_accessories').val() : 0;
			health_and_education__schooling = $('#health_and_education__schooling').val() ? $('#health_and_education__schooling').val() : 0;
			health_and_education__gym = $('#health_and_education__gym').val() ? $('#health_and_education__gym').val() : 0;
			var total = parseFloat(health_and_education__insurance) + parseFloat(health_and_education__medical_treatment) + parseFloat(health_and_education__medicine) + parseFloat(health_and_education__health_accessories) + parseFloat(health_and_education__schooling) + parseFloat(health_and_education__gym); 
			$('#health_and_education__total').html(total);
		}

		function investments__total() {
			investments__life_insurance = $('#investments__life_insurance').val() ? $('#investments__life_insurance').val() : 0;
			investments__retirement_plan_gosi = $('#investments__retirement_plan_gosi').val() ? $('#investments__retirement_plan_gosi').val() : 0;
			investments__investment_plan_payment = $('#investments__investment_plan_payment').val() ? $('#investments__investment_plan_payment').val() : 0;
			investments__saving_plan_payment = $('#investments__saving_plan_payment').val() ? $('#investments__saving_plan_payment').val() : 0;
			investments__personal_development_and_education = $('#investments__personal_development_and_education').val() ? $('#investments__personal_development_and_education').val() : 0;
			var total = parseFloat(investments__life_insurance) + parseFloat(investments__retirement_plan_gosi) + parseFloat(investments__investment_plan_payment) + parseFloat(investments__saving_plan_payment) + parseFloat(investments__personal_development_and_education); 
			$('#investments__total').html(total);
		}

		function loan__total() {
			loan__personal_loan = $('#loan__personal_loan').val() ? $('#loan__personal_loan').val() : 0;
			loan__credit_cards = $('#loan__credit_cards').val() ? $('#loan__credit_cards').val() : 0;
			var total = parseFloat(loan__personal_loan) + parseFloat(loan__credit_cards); 
			$('#loan__total').html(total);
		}

		function entertainment__total() {
			entertainment__vacations = $('#entertainment__vacations').val() ? $('#entertainment__vacations').val() : 0;
			entertainment__others = $('#entertainment__others').val() ? $('#entertainment__others').val() : 0;
			var total = parseFloat(entertainment__vacations) + parseFloat(entertainment__others); 
			$('#entertainment__total').html(total);
		}

		function charity_tax__total() {
			charity_tax__charity = $('#charity_tax__charity').val() ? $('#charity_tax__charity').val() : 0;
			charity_tax__zakat = $('#charity_tax__zakat').val() ? $('#charity_tax__zakat').val() : 0;
			charity_tax__taxes_and_govt_fees = $('#charity_tax__taxes_and_govt_fees').val() ? $('#charity_tax__taxes_and_govt_fees').val() : 0;
			var total = parseFloat(charity_tax__charity) + parseFloat(charity_tax__zakat) + parseFloat(charity_tax__taxes_and_govt_fees); 
			$('#charity_tax__total').html(total);
		}
		


		$('.house_expense_inputs').on('keyup', function(){
			update_house__total();
		});

		$('.car_expenses_inputs').on('keyup', function(){
			update_car__total();
		});

		$('.pocket_money_expenses_inputs').on('keyup', function(){
			update_pocket_money__total();
		});

		$('.health_and_education_expenses_inputs').on('keyup', function(){
			health_and_education__total();
		});

		$('.investments_expenses_inputs').on('keyup', function(){
			investments__total();
		});

		$('.loan_expenses_inputs').on('keyup', function(){
			loan__total();
		});

		$('.entertainment_expenses_inputs').on('keyup', function(){
			entertainment__total();
		});

		$('.charity_tax_expenses_inputs').on('keyup', function(){
			charity_tax__total();
		});
	});
</script>

<script src="{{ asset('backend_assets/questions/assets/js/jquery-2.2.4.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/bootstrap.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/jquery.bootstrap.wizard.js') }} " type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('backend_assets/questions/assets/js/demo.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/paper-bootstrap-wizard.js') }} " type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
{{-- <script src="{{ asset('backend_assets/questions/assets/js/jquery.validate.min.js') }} " type="text/javascript"></script> --}}
@include('dashboard.user_panel.partials.validate')


<script type="text/javascript">

// tab 1
// $('#next_car_tab').on('click', function(){
function navigateToTab1() {
	
	$('#v-pills-car-tab').click();
	$('#v-pills-car-tab').attr('aria-selected', true);
	$('#v-pills-car-tab').attr('class', 'nav-link active');
	$('#v-pills-house-tab').attr('aria-selected', false);
	$('#v-pills-house-tab').attr('class', 'nav-link');

	$('#v-pills-house').attr('class', 'tab-pane fade');
	$('#v-pills-car').attr('class', 'tab-pane fade active show in');	
}
// )};
// //tab 2
// $('#next_pocket_tab').on('click', function(){

function navigateToTab2() {

	$('#v-pills-pocket-tab').click();
	$('#v-pills-pocket-tab').attr('aria-selected', true);
	$('#v-pills-pocket-tab').attr('class', 'nav-link active');
	$('#v-pills-car-tab').attr('aria-selected', false);
	$('#v-pills-car-tab').attr('class', 'nav-link');

	$('#v-pills-car').attr('class', 'tab-pane fade');
	$('#v-pills-pocket').attr('class', 'tab-pane fade active show in');
}
// });

// //tab 3
// $('#next_medical_tab').on('click', function(){
function navigateToTab3() {		
	$('#v-pills-health-tab').click();
	$('#v-pills-health-tab').attr('aria-selected', true);
	$('#v-pills-health-tab').attr('class', 'nav-link active');
	$('#v-pills-pocket-tab').attr('aria-selected', false);
	$('#v-pills-pocket-tab').attr('class', 'nav-link');

	$('#v-pills-pocket').attr('class', 'tab-pane fade');
	$('#v-pills-health').attr('class', 'tab-pane fade active show in');
}		
// });

// //tab 4
// $('#next_insurance_tab').on('click', function(){
function navigateToTab4() {
	$('#v-pills-investments-tab').click();
	$('#v-pills-investments-tab').attr('aria-selected', true);
	$('#v-pills-investments-tab').attr('class', 'nav-link active');
	$('#v-pills-health-tab').attr('aria-selected', false);
	$('#v-pills-health-tab').attr('class', 'nav-link');

	$('#v-pills-health').attr('class', 'tab-pane fade');
	$('#v-pills-insurance').attr('class', 'tab-pane fade active show in');
}
// });

// //tab 5
// $('#next_insurance_tab').on('click', function(){
function navigateToTab5() {
	$('#v-pills-investments-tab').click();
	$('#v-pills-investments-tab').attr('aria-selected', true);
	$('#v-pills-investments-tab').attr('class', 'nav-link active');
	$('#v-pills-health-tab').attr('aria-selected', false);
	$('#v-pills-health-tab').attr('class', 'nav-link');

	$('#v-pills-health').attr('class', 'tab-pane fade');
	$('#v-pills-insurance').attr('class', 'tab-pane fade active show in');
}
// });

// //tab 6
// $('#next_loan_tab').on('click', function(){
function navigateToTab6() {
	$('#v-pills-loan-tab').click();
	$('#v-pills-loan-tab').attr('aria-selected', true);
	$('#v-pills-loan-tab').attr('class', 'nav-link active');
	$('#v-pills-investments-tab').attr('aria-selected', false);
	$('#v-pills-investments-tab').attr('class', 'nav-link');

	$('#v-pills-insurance').attr('class', 'tab-pane fade');
	$('#v-pills-loan').attr('class', 'tab-pane fade active show in');
}
// });

// //tab 7
//  $('#next_entertaining_tab').on('click', function(){
function navigateToTab7() {
	$('#v-pills-entertaining-tab').click();
	$('#v-pills-entertaining-tab').attr('aria-selected', true);
	$('#v-pills-entertaining-tab').attr('class', 'nav-link active');
	$('#v-pills-loan-tab').attr('aria-selected', false);
	$('#v-pills-loan-tab').attr('class', 'nav-link');

	$('#v-pills-loan').attr('class', 'tab-pane fade');
	$('#v-pills-entertaining').attr('class', 'tab-pane fade active show in');
}
// });

// //tab 8
// $('#next_charity_tab').on('click', function(){
function navigateToTab8() {
	$('#v-pills-charity-tab').click();
	$('#v-pills-charity-tab').attr('aria-selected', true);
	$('#v-pills-charity-tab').attr('class', 'nav-link active');
	$('#v-pills-entertaining-tab').attr('aria-selected', false);
	$('#v-pills-entertaining-tab').attr('class', 'nav-link');

	$('#v-pills-entertaining').attr('class', 'tab-pane fade');
	$('#v-pills-charity').attr('class', 'tab-pane fade active show in');
}
// });

























$('.form-wizard-buttons .btn-next').on('click', function() {
	var parent_fieldset = $(this).parents('.tab-pane');
	var next_step = true;
	// navigation steps / progress steps
	var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
	var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
	
	// fields validation
	parent_fieldset.find('.required').each(function() {
		if( $(this).val() == "" ) {
			$(this).addClass('input-error');
			next_step = false;
		}
		else {
			$(this).removeClass('input-error');
		}
	});
	// fields validation
	console.log(next_step);
	if( next_step == true) {
		if(this.id == 'next_car_tab')
			navigateToTab1();
		else if(this.id == 'next_pocket_tab')
			navigateToTab2();
		else if(this.id == 'next_medical_tab')
			navigateToTab3();
		else if(this.id == 'next_insurance_tab')
			navigateToTab4();
		else if(this.id == 'next_insurance_tab')
			navigateToTab5();
		else if(this.id == 'next_loan_tab')
			navigateToTab6();
		else if(this.id == 'next_entertaining_tab')
			navigateToTab7();
		else if(this.id == 'next_charity_tab')
			navigateToTab8();
		else
			console.log('error');
	}
	
});
</script>
@endsection
{{-- 
v-pills-investments-tab
v-pills-insurance --}}

{{-- v-pills-charity --}}
{{-- v-pills-health-tab --}}