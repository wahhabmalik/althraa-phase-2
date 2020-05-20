@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')
@endsection


@section('content')
	<div class="container">

		<div class="row mb-0 pt-5" style="position: relative; z-index: 10;">
    		<div class="col-md-12">
    			<a href="{{ route('step_2', app()->getLocale()) }}" style="color: #01630a;" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
    				<i class="{{ ($request->segment(1) == 'en') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i> 
    				{{ trans('lang.question.go_to_previous_step') }}
    			</a>
    		</div>
    	</div>

        <div class="row" style="margin-top: -5%;">
	        <div class="col-sm-12 ">

	            <!--      Wizard container        -->
	            <div class="wizard-container">

	                <div class="wizard-card" data-color="orange" id="wizardProfile">
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
								<li>
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
											<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.png') }}">
										</div>
										
									</a>
								</li>
								
	                        </ul>
						</div>

						<form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST" id="form">
							@csrf
	                        <div class="tab-content">
	                        	<div class="tab-pane active" id="saving_plan">
	                            	<div class="row">
	                            		<div class="col-sm-4"></div>
	                            		<div class="col-sm-4">
											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.current_saving_balance') }}
						                          </label>
						                          <input 
						                                id="current_saving_balance" 
						                                type="text" 
						                                class="form-control @error('saving_plan.current_saving_balance') {!! 'error' !!} @enderror" 
						                                name="saving_plan[current_saving_balance]" 
						                                required 
						                                placeholder="eg. 40.000 SAR"
						                                value="{{ currency(old('saving_plan.current_saving_balance') ?? $user_questionnaire->saving_plan["saving_plan"]["current_saving_balance"] ?? null, 0) }}"
						                                >
						                            @error('saving_plan.current_saving_balance')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror

						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.gosi_or_ppa_monthly_subscription') }}
						                          </label>
						                          <input 
						                                id="gosi_or_ppa_monthly_subscription" 
						                                type="text" 
						                                class="form-control @error('saving_plan.gosi_or_ppa_monthly_subscription') {!! 'error' !!} @enderror"
						                                name="saving_plan[gosi_or_ppa_monthly_subscription]" 
						                                required 
						                                placeholder="eg. 140.00 SAR"
						                                value="{{ currency(old('saving_plan.gosi_or_ppa_monthly_subscription') ?? $user_questionnaire->saving_plan["saving_plan"]["gosi_or_ppa_monthly_subscription"] ?? null , 0) }}"
						                                >
						                            @error('saving_plan.gosi_or_ppa_monthly_subscription')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror

						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.monthly_saving_plan_for_retirement') }}
						                          </label>
						                          <input 
						                                id="monthly_saving_plan_for_retirement" 
						                                type="text" 
						                                class="form-control @error('saving_plan.monthly_saving_plan_for_retirement') {!! 'error' !!} @enderror"
						                                name="saving_plan[monthly_saving_plan_for_retirement]" 
						                                required 
						                                placeholder="eg. 50.00 SAR"
						                                value="{{ currency(old('saving_plan.monthly_saving_plan_for_retirement') ?? $user_questionnaire->saving_plan["saving_plan"]["monthly_saving_plan_for_retirement"] ?? null , 0) }}"
						                                >

						                            @error('saving_plan.monthly_saving_plan_for_retirement')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror

						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.annual_increase_in_saving_plan') }}
						                          </label>
						                          <input 
						                                id="annual_increase_in_saving_plan" 
						                                type="number" 
						                                class="form-control @error('saving_plan.annual_increase_in_saving_plan') {!! 'error' !!} @enderror"
						                                name="saving_plan[annual_increase_in_saving_plan]" 
						                                required 
						                                max="10" 
						                                min="0" 
						                                placeholder="eg. 5 %"
						                                value="{{ old('saving_plan.annual_increase_in_saving_plan') ?? $user_questionnaire->saving_plan["saving_plan"]["annual_increase_in_saving_plan"] ?? '' }}"
						                                >

						                            @error('saving_plan.annual_increase_in_saving_plan')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
						                    	</div>
											</div>

											<br>
											<br>
											<div class="center_content">
												<button type="submit" class="button">
													{{ trans('lang.question.continue_to_worth') }}
													<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
												</button>

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
<script src="{{ asset('backend_assets/questions/assets/js/jquery-2.2.4.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/bootstrap.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/jquery.bootstrap.wizard.js') }} " type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('backend_assets/questions/assets/js/demo.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/paper-bootstrap-wizard.js') }} " type="text/javascript"></script>

@include('dashboard.user_panel.partials.validate')

<script type="text/javascript">


</script>
@endsection