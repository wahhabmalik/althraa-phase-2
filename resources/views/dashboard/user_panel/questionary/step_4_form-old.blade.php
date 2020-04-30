@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')
<style type="text/css">
.nav-pills .nav-link.active{
	{{ ($request->segment(1) == 'ar') ? '    border-right: 5px solid #01630a !important;border-left: 0px solid #01630a !important;' : '' }}
}
</style>
@endsection


@section('content')

<div class="container">
	<div class="row mb-0 pt-5" style="position: relative; z-index: 10;">
		<div class="col-md-12">
			<a href="{{ route('step_3', app()->getLocale()) }}" style="color: #01630a;" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
    				<i class="{{ ($request->segment(1) == 'en') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i> 
    				{{ trans('lang.question.go_to_previous_step') }}
    		</a>
		</div>
	</div>

    <div class="row" style="margin-top: -5%;">
        <div class="col-sm-12 ">

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
                            <li >
                            	<p class="progressbar_text">
                            		{{ trans('lang.question_headings.expenses') }}
                            	</p>
                            	<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
									<div class="icon-circle checked">
										<img src="{{ asset('backend_assets/questions/assets/img/step_3.png') }}">
									</div>
									
								</a>
							</li>
							<li class="active tab-mob" >
								<p class="progressbar_text"><span style="color: #01630a;">
									{{ trans('lang.question_headings.net_assets') }}
								</span></p>
								<a href="#assets" data-toggle="tab">
									<div class="icon-circle checked">
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
							<li class="tab-mob">
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
										<div class="col-sm-2"></div>
										<div class="nav flex-column nav-pills col-sm-2 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}" style="position: unset;display: flow-root;text-align: left;padding-right: 27px;height: auto;background-color: #fff0;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
											<p class="label_forms">
												{{ trans('lang.question_headings.net_assets') }}
											</p>

											<a class="nav-link active" id="v-pills-assets-tab" data-toggle="pill" href="#v-pills-assets" role="tab" aria-controls="v-pills-assets" aria-selected="true">
												{{ trans('lang.question.assets') }}
											</a>

											<a class="nav-link" id="v-pills-liabilities-tab" style="cursor: not-allowed;" href="#v-pills-liabilities" role="tab" aria-controls="v-pills-liabilities" aria-selected="false">
												{{ trans('lang.question.liabilities') }}
											</a>

										</div>
										<div class="tab-content col-lg-4 col-md-6 col-sm-12" style="padding-top: 0px;" id="v-pills-tabContent">


											{{-- First Tab --}}
											<div class="tab-pane fade show active in" id="v-pills-assets" role="tabpanel" aria-labelledby="v-pills-assets-tab">
												
							                    <div class="form-wizard">
													<!-- Form Wizard -->
							                    		<div class="form-wizard-steps form-wizard-tolal-steps-4">
							                    			<div class="form-wizard-progress">
							                    			    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;">
							                    			    	
							                    			    </div>
							                    			</div>
															<!-- Step 1 -->
							                    			<div class="form-wizard-step active">
							                    				<img src="{{ asset('backend_assets/questions/assets/img/step_4_stocks.png') }}">
							                    			</div>
															<!-- Step 1 -->
															
															<!-- Step 2 -->
							                    			<div class="form-wizard-step">
							                    				<img src="{{ asset('backend_assets/questions/assets/img/step_4_unliquid_white.svg') }}">
							                    				
							                    			</div>
															<!-- Step 2 -->
															
															<!-- Step 3 -->
															<div class="form-wizard-step">
							                    				<img src="{{ asset('backend_assets/questions/assets/img/step_4_personal.svg') }}">
							                    				
							                    			</div>
															<!-- Step 3 -->
							                    		</div>
							                    		<div class="row">
							                    			<div class="col-md-4 col-sm-4 col-4">
							                    				<p>
							                    					{{ trans('lang.question.liquid_assets') }}
							                    				</p>
							                    			</div>
							                    			<div class="col-md-4 col-sm-4 col-4">
							                    				<p>
							                    					{{ trans('lang.question.unliquid_assets') }}
							                    				</p>
							                    			</div>
							                    			<div class="col-md-4 col-sm-4 col-4">
							                    				<p>
							                    					{{ trans('lang.question.personal_assets') }}
							                    				</p>
							                    			</div>
							                    		</div>
														<!-- Form progress -->

														<!-- Form Step 1 -->
							                    		<fieldset>

							                    		    <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.liquid_cash') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_liquid__cash" 
														  			class="form-control assets_liquid_inputs required" 
														  			name="net_assets[assets][liquid][cash]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["liquid"]["cash"] ?? old('net_assets.assets.liquid.cash') }}"
														  			>
														  	</div>

														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.liquid_time_deposits') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_liquid__time_deposits" 
														  			class="form-control assets_liquid_inputs required" 
														  			name="net_assets[assets][liquid][time_deposits]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["liquid"]["time_deposits"] ?? old('net_assets.assets.liquid.time_deposits') }}"
														  			>
														  	</div>


														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.liquid_local_equity') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_liquid__local_equity" 
														  			class="form-control assets_liquid_inputs required" 
														  			name="net_assets[assets][liquid][local_equity]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["liquid"]["local_equity"] ?? old('net_assets.assets.liquid.local_equity') }}"
														  			>
														  	</div>

							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.liquid_international_equity') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_liquid__international_equity" 
														  			class="form-control assets_liquid_inputs required" 
														  			name="net_assets[assets][liquid][international_equity]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["liquid"]["international_equity"] ?? old('net_assets.assets.liquid.international_equity') }}"
														  			>
														  	</div>

														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.liquid_government_bonds') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_liquid__government_bonds" 
														  			class="form-control assets_liquid_inputs required" 
														  			name="net_assets[assets][liquid][government_bonds]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["liquid"]["government_bonds"] ?? old('net_assets.assets.liquid.government_bonds') }}"
														  			>
														  	</div>

							                                

							                                
							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.liquid_corporate_bonds') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_liquid__corporate_bonds" 
														  			class="form-control assets_liquid_inputs required" 
														  			name="net_assets[assets][liquid][corporate_bonds]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["liquid"]["corporate_bonds"] ?? old('net_assets.assets.liquid.corporate_bonds') }}"
														  			>
														  	</div>

														  	<div class="total_text">
																<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
																	{{ trans('lang.question.total') }}
																</span>
																<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
																<span id="assets_liquid__total">0</span> SAR
																</span>
															</div>

							                                <br>
							                                <div class="form-wizard-buttons">
							                                    <button type="button" class="btn btn-next btn-next">
							                                    	{{ trans('lang.question.next') }}
							                                    </button>
							                                </div>
							                            </fieldset>
														<!-- Form Step 1 -->

														<!-- Form Step 2 -->
							                            <fieldset>

							                               
															{{-- <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">Properties Shared Owned</label>
														  		<input 
														  			type="text" 
														  			class="form-control" 
														  			name="net_assets[assets][unliquid][properties_shared_owned]"
														  			required 
														  			value=""
														  			>
														  	</div>

														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">Properties Direct Owned</label>
														  		<input 
														  			type="text" 
														  			class="form-control" 
														  			name="net_assets[assets][unliquid][properties_direct_owned]"
														  			required 
														  			value=""
														  			>
														  	</div>


														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">International Properties Shared Owned</label>
														  		<input 
														  			type="text" 
														  			class="form-control" 
														  			name="net_assets[assets][unliquid][international_properties_shared_owned]"
														  			required 
														  			value=""
														  			>
														  	</div>


														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">International Properties Direct Owned</label>
														  		<input 
														  			type="text" 
														  			class="form-control" 
														  			name="net_assets[assets][unliquid][international_properties_direct_owned]"
														  			required 
														  			value=""
														  			>
														  	</div> --}}

							                                {{-- <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.unliquid_REITS') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_unliquid__reits" 
														  			class="form-control assets_unliquid_inputs" 
														  			name="net_assets[assets][unliquid][reits]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["unliquid"]["reits"] ?? old('net_assets.assets.unliquid.reits') }}"
														  			>
														  	</div> --}}

							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.unliquid_properties_shared_owned') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_unliquid__properties_shared_owned" 
														  			class="form-control assets_unliquid_inputs required" 
														  			name="net_assets[assets][unliquid][properties_shared_owned]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["unliquid"]["properties_shared_owned"] ?? old('net_assets.assets.unliquid.properties_shared_owned') }}"
														  			>
														  	</div>

							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.unliquid_direct_properties') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_unliquid__direct_properties" 
														  			class="form-control assets_unliquid_inputs required" 
														  			name="net_assets[assets][unliquid][direct_properties]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["unliquid"]["direct_properties"] ?? old('net_assets.assets.unliquid.direct_properties') }}"
														  			>
														  	</div>

														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.unliquid_international_properties_shared_owned') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_unliquid__international_properties_shared_owned" 
														  			class="form-control assets_unliquid_inputs required" 
														  			name="net_assets[assets][unliquid][international_properties_shared_owned]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["unliquid"]["international_properties_shared_owned"] ?? old('net_assets.assets.unliquid.international_properties_shared_owned') }}"
														  			>
														  	</div>

							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.unliquid_international_properties_direct_owned') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_unliquid__international_properties_direct_owned" 
														  			class="form-control assets_unliquid_inputs required" 
														  			name="net_assets[assets][unliquid][international_properties_direct_owned]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["unliquid"]["international_properties_direct_owned"] ?? old('net_assets.assets.unliquid.international_properties_direct_owned') }}"
														  			>
														  	</div>

							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.unliquid_priavte_business') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_unliquid__private_business" 
														  			class="form-control assets_unliquid_inputs required" 
														  			name="net_assets[assets][unliquid][private_business]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["unliquid"]["private_business"] ?? old('net_assets.assets.unliquid.private_business') }}"
														  			>
														  	</div>

							                                <div class="form-group" style="display: none;">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.unliquid_others') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_unliquid__others" 
														  			class="form-control assets_unliquid_inputs" 
														  			name="net_assets[assets][unliquid][others]"
														  			required 
														  			{{-- value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["unliquid"]["others"] ?? old('net_assets.assets.unliquid.others') }}" --}}
														  			value="0" 
														  			>
														  	</div>

														  	<div class="total_text">
																<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
																	{{ trans('lang.question.total') }}
																</span>
																<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
																<span id="assets_unliquid__total">0</span> SAR
																</span>
															</div>
							                                
							                                <br>
							                                <div class="form-wizard-buttons">
							                                    <button type="button" class="btn btn-previous">
							                                    	{{ trans('lang.question.previous') }}
							                                    </button>
							                                    <button type="button" class="btn btn-next">
							                                    	{{ trans('lang.question.next') }}
							                                    </button>
							                                </div>
							                            </fieldset>
														<!-- Form Step 2 -->

														
														<!-- Form Step 3 -->
														<fieldset>

							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.personal_vehicles') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_personal__vehicles" 
														  			class="form-control assets_personal_inputs required" 
														  			name="net_assets[assets][personal][vehicles]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["personal"]["vehicles"] ?? old('net_assets.assets.personal.vehicles') }}"
														  			>
														  	</div>


														  	<div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.personal_jeweleries') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_personal__jeweleries" 
														  			class="form-control assets_personal_inputs required" 
														  			name="net_assets[assets][personal][jeweleries]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["personal"]["jeweleries"] ?? old('net_assets.assets.personal.jeweleries') }}"
														  			>
														  	</div>

							                                
							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.personal_private_house') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_personal__private_house" 
														  			class="form-control assets_personal_inputs required" 
														  			name="net_assets[assets][personal][private_house]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["personal"]["private_house"] ?? old('net_assets.assets.personal.private_house') }}"
														  			>
														  	</div>

							                                
							                                <div class="form-group">
														  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														  			{{ trans('lang.question.personal_art_&_boutique') }}
														  		</label>
														  		<input 
														  			type="text" 
														  			id="assets_personal__art_and_boutique" 
														  			class="form-control assets_personal_inputs required" 
														  			name="net_assets[assets][personal][art_and_boutique]"
														  			required 
														  			value="{{ $user_questionnaire->net_assets["net_assets"]["assets"]["personal"]["art_and_boutique"] ?? old('net_assets.assets.personal.art_and_boutique') }}"
														  			>
														  	</div>

														  	<div class="total_text">
																<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
																	{{ trans('lang.question.total') }}
																</span>
																<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
																<span id="assets_personal__total">0</span> SAR
																</span>
															</div>

							                    			<br>
							                                <div class="form-wizard-buttons">
							                                    <button type="button" class="btn btn-previous">
							                                    	{{ trans('lang.question.previous') }}
							                                    </button>
							                                    <button type="button" class="btn btn-next" id="go_to_liabilities">
							                                    	{{ trans('lang.question.go_to') }} 
							                                    	{{ trans('lang.question.liabilities') }}
							                                    </button>
							                                </div>
							                            </fieldset>
														<!-- Form Step 3 -->
							                
													<!-- Form Wizard -->
							                    </div>
            												
											</div>




											{{-- Second Tab --}}
											<div class="tab-pane fade" id="v-pills-liabilities" role="tabpanel" aria-labelledby="v-pills-liabilities-tab">
												
												<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.liabilities_personal_loan') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="liabilities__personal_loan" 
											  			class="form-control liabilities_inputs" 
											  			name="net_assets[liabilities][personal_loan]"
											  			required 
											  			value="{{ $user_questionnaire->net_assets["net_assets"]["liabilities"]["personal_loan"] ?? old('net_assets.liabilities.personal_loan') }}"
											  			>
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.liabilities_mortgage') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="liabilities__mortgage" 
											  			class="form-control liabilities_inputs" 
											  			name="net_assets[liabilities][mortgage]"
											  			required 
											  			value="{{ $user_questionnaire->net_assets["net_assets"]["liabilities"]["mortgage"] ?? old('net_assets.liabilities.mortgage') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.liabilities_credit_cards') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="liabilities__credit_cards" 
											  			class="form-control liabilities_inputs" 
											  			name="net_assets[liabilities][credit_cards]"
											  			required 
											  			value="{{ $user_questionnaire->net_assets["net_assets"]["liabilities"]["credit_cards"] ?? old('net_assets.liabilities.credit_cards') }}"
											  			>
											  	</div>


											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.liabilities_free_loan') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="liabilities__free_loan" 
											  			class="form-control liabilities_inputs" 
											  			name="net_assets[liabilities][free_loan]"
											  			required 
											  			value="{{ $user_questionnaire->net_assets["net_assets"]["liabilities"]["free_loan"] ?? old('net_assets.liabilities.free_loan') }}"
											  			>
											  	</div>

												<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="liabilities__total">0</span> SAR
													</span>
												</div>


												<br>
												<br>

												<div class="center_content">
													<button type="submit" class="button btn-next">
														{{ trans('lang.question.continue_to_gosi') }}
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

@endsection


@section('scripts')


<script type="text/javascript">
	$(document).ready(function(){

		// assets
		assets_liquid__total();
		assets_unliquid__total();
		assets_personal__total();

		// liabilities
		liabilities__total();


		// assets
		function assets_liquid__total() {
			assets_liquid__cash = $('#assets_liquid__cash').val() ? $('#assets_liquid__cash').val() : 0;

			assets_liquid__time_deposits = $('#assets_liquid__time_deposits').val() ? $('#assets_liquid__time_deposits').val() : 0;

			assets_liquid__local_equity = $('#assets_liquid__local_equity').val() ? $('#assets_liquid__local_equity').val() : 0;

			assets_liquid__government_bonds = $('#assets_liquid__government_bonds').val() ? $('#assets_liquid__government_bonds').val() : 0;

			assets_liquid__international_equity = $('#assets_liquid__international_equity').val() ? $('#assets_liquid__international_equity').val() : 0;

			assets_liquid__corporate_bonds = $('#assets_liquid__corporate_bonds').val() ? $('#assets_liquid__corporate_bonds').val() : 0;

			var total = parseFloat(assets_liquid__cash) + parseFloat(assets_liquid__time_deposits) + parseFloat(assets_liquid__local_equity) + parseFloat(assets_liquid__government_bonds) + parseFloat(assets_liquid__international_equity) + parseFloat(assets_liquid__corporate_bonds); 
			$('#assets_liquid__total').html(total);
		}

		function assets_unliquid__total() {
			// assets_unliquid__reits = $('#assets_unliquid__reits').val() ? $('#assets_unliquid__reits').val() : 0;
			assets_unliquid__properties_shared_owned = $('#assets_unliquid__properties_shared_owned').val() ? $('#assets_unliquid__properties_shared_owned').val() : 0;
			assets_unliquid__direct_properties = $('#assets_unliquid__direct_properties').val() ? $('#assets_unliquid__direct_properties').val() : 0;
			assets_unliquid__private_business = $('#assets_unliquid__private_business').val() ? $('#assets_unliquid__private_business').val() : 0;
			// assets_unliquid__others = $('#assets_unliquid__others').val() ? $('#assets_unliquid__others').val() : 0;
			assets_unliquid__international_properties_shared_owned = $('#assets_unliquid__international_properties_shared_owned').val() ? $('#assets_unliquid__international_properties_shared_owned').val() : 0;
			assets_unliquid__international_properties_direct_owned = $('#assets_unliquid__international_properties_direct_owned').val() ? $('#assets_unliquid__international_properties_direct_owned').val() : 0;
			var total = parseFloat(assets_unliquid__properties_shared_owned) + parseFloat(assets_unliquid__direct_properties) + parseFloat(assets_unliquid__private_business) + parseFloat(assets_unliquid__international_properties_shared_owned) + parseFloat(assets_unliquid__international_properties_direct_owned); 
			$('#assets_unliquid__total').html(total);
		}

		function assets_personal__total() {
			assets_personal__vehicles = $('#assets_personal__vehicles').val() ? $('#assets_personal__vehicles').val() : 0;
			assets_personal__jeweleries = $('#assets_personal__jeweleries').val() ? $('#assets_personal__jeweleries').val() : 0;
			assets_personal__private_house = $('#assets_personal__private_house').val() ? $('#assets_personal__private_house').val() : 0;
			assets_personal__art_and_boutique = $('#assets_personal__art_and_boutique').val() ? $('#assets_personal__art_and_boutique').val() : 0;
			var total = parseFloat(assets_personal__vehicles) + parseFloat(assets_personal__jeweleries) + parseFloat(assets_personal__private_house) + parseFloat(assets_personal__art_and_boutique); 
			$('#assets_personal__total').html(total);
		}

		// liabilities
		function liabilities__total() {
			liabilities__personal_loan = $('#liabilities__personal_loan').val() ? $('#liabilities__personal_loan').val() : 0;
			liabilities__mortgage = $('#liabilities__mortgage').val() ? $('#liabilities__mortgage').val() : 0;
			liabilities__credit_cards = $('#liabilities__credit_cards').val() ? $('#liabilities__credit_cards').val() : 0;
			liabilities__free_loan = $('#liabilities__free_loan').val() ? $('#liabilities__free_loan').val() : 0;
			var total = parseFloat(liabilities__personal_loan) + parseFloat(liabilities__mortgage) + parseFloat(liabilities__credit_cards) + parseFloat(liabilities__free_loan); 
			$('#liabilities__total').html(total);
		}


		// assets
		$('.assets_liquid_inputs').on('keyup', function(){
			assets_liquid__total();
		});

		$('.assets_unliquid_inputs').on('keyup', function(){
			assets_unliquid__total();
		});

		$('.assets_personal_inputs').on('keyup', function(){
			assets_personal__total();
		});


		// liabilities
		$('.liabilities_inputs').on('keyup', function(){
			liabilities__total();
		});
	});
</script>


<script src="{{ asset('backend_assets/questions/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('backend_assets/questions/assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/paper-bootstrap-wizard.js') }}" type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
{{-- <script src="{{ asset('backend_assets/questions/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script> --}}
@include('dashboard.user_panel.partials.validate')


<script>
	"use strict";
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('.form-wizard').stop().animate({scrollTop: scroll_to}, 0);
	}
}

function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

jQuery(document).ready(function() {
    
    /*
        Form
    */
    $('.form-wizard fieldset:first').fadeIn('slow');
    
    $('.form-wizard .required').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    // next step
    $('.form-wizard .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
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
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
    			// change icons
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			// progress bar
    			bar_progress(progress_line, 'right');
    			// show next step
	    		$(this).next().fadeIn();
	    		// scroll window to beginning of the form
    			scroll_to_class( $('.form-wizard'), 20 );
	    	});
    	}
    	
    });
    
    // previous step
    $('.form-wizard .btn-previous').on('click', function() {
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
    	var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
    	
    	$(this).parents('fieldset').fadeOut(400, function() {
    		// change icons
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		// progress bar
    		bar_progress(progress_line, 'left');
    		// show previous step
    		$(this).prev().fadeIn();
    		// scroll window to beginning of the form
			scroll_to_class( $('.form-wizard'), 20 );
    	});
    });
    
    // submit
    $('.form-wizard').on('submit', function(e) {
    	
    	// fields validation
    	$(this).find('.required').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    	
    });
    
    
});





// image uploader scripts 

var $dropzone = $('.image_picker'),
    $droptarget = $('.drop_target'),
    $dropinput = $('#inputFile'),
    $dropimg = $('.image_preview'),
    $remover = $('[data-action="remove_current_image"]');

$dropzone.on('dragover', function() {
  $droptarget.addClass('dropping');
  return false;
});

$dropzone.on('dragend dragleave', function() {
  $droptarget.removeClass('dropping');
  return false;
});

$dropzone.on('drop', function(e) {
  $droptarget.removeClass('dropping');
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  e.preventDefault();
  
  var file = e.originalEvent.dataTransfer.files[0],
      reader = new FileReader();

  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  };
  
  console.log(file);
  reader.readAsDataURL(file);

  return false;
});

$dropinput.change(function(e) {
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  $('.image_title input').val('');
  
  var file = $dropinput.get(0).files[0],
      reader = new FileReader();
  
  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  }
  
  reader.readAsDataURL(file);
});

$remover.on('click', function() {
  $dropimg.css('background-image', '');
  $droptarget.removeClass('dropped');
  $remover.addClass('disabled');
  $('.image_title input').val('');
});

$('.image_title input').blur(function() {
  if ($(this).val() != '') {
    $droptarget.removeClass('dropped');
  }
});

// image uploader scripts
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.btn-next').removeClass('disabled');
	});


	$('#go_to_liabilities').on('click', function(){

		var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
    	var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
    	
    	// fields validation
    	parent_fieldset.find('.required').each(function() {
    		if( $(this).val() == "" ) {
    			$(this).addClass('input-error');
    			next_step = false;
    			console.log(next_step);
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    	
    	if( next_step ) {
    		$('#v-pills-liabilities-tab').attr('data-toggle', 'pill');
			$('#v-pills-liabilities-tab').css('cursor', 'pointer');
			// data-toggle="pill"  

			$('#v-pills-liabilities-tab').click();
			$('#v-pills-liabilities-tab').attr('aria-selected', true);
			$('#v-pills-liabilities-tab').attr('class', 'nav-link active');
			$('#v-pills-assets-tab').attr('aria-selected', false);
			$('#v-pills-assets-tab').attr('class', 'nav-link');

			$('#v-pills-assets').attr('class', 'tab-pane fade');
			$('#v-pills-liabilities').attr('class', 'tab-pane fade active show in');
    	}


		// 
	});
</script>
@endsection