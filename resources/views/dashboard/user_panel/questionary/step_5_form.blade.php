@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')
@endsection


@section('content')
{{-- <div class="content__body">
	<div class="center_content"> --}}
		
	<div class="container">
	    <div class="row mb-0 pt-5" style="position: relative; z-index: 10;">
    		<div class="col-md-12">
    			<a href="{{ route('step_4', app()->getLocale()) }}" style="color: #01630a;" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
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
									<li>
										<p>
											{{ trans('lang.question_headings.net_assets') }}
										</p>
										<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
											<div class="icon-circle checked">
												<img src="{{ asset('backend_assets/questions/assets/img/step_4.png') }}">
											</div>
											
										</a>
									</li>
									<li class="active tab-mob">
										<p><span style="color: #01630a;">
											{{ trans('lang.question_headings.gosi') }}
										</span></p>
										<a href="#gosi" data-toggle="tab">
											<div class="icon-circle checked">
												<img src="{{ asset('backend_assets/questions/assets/img/step_5.png') }}">
											</div>
											
										</a>
									</li>
									<li class="tab-mob">
										<p>
											{{ trans('lang.question_headings.risk') }}
										</p>
										<a>
											<div class="icon-circle">
												<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.svg') }}">
											</div>
											
										</a>
									</li>
									<li class="tab-mob">
										<p>
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
		                            <div class="tab-pane active" id="gosi">
		                            	<div class="row">
		                            		<div class="col-sm-4"></div>
		                            		<div class="col-sm-4">
												<p class="wizard_info_text">
													{{ trans('lang.question.gosi_starting_year_in_plan') }}
												</p>
												<div class="date_sec">
													<p class="wizard_info_text date_text">
														<input 
							                                id="strating_year_in_plan" 
							                                type="text" 
							                                class="form-control" 
							                                name="gosi[strating_year_in_plan]"
							                                value="{{ $user_questionnaire->gosi["gosi"]["strating_year_in_plan"] ?? old('gosi.strating_year_in_plan') }}"
							                                >
													</p>
												</div>
												<div class="form-group">
													<div class="form-group">
							                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
							                          	{{ trans('lang.question.gosi_average_of_last_24_months_salary') }}
							                          </label>
							                          <input 
							                                id="average_of_last_24_months_salary" 
							                                type="text" 
							                                class="form-control" 
							                                name="gosi[average_of_last_24_months_salary]" 
							                                required 
							                                placeholder="eg. 4000 SAR" 
							                                value="{{ $user_questionnaire->gosi["gosi"]["average_of_last_24_months_salary"] ?? old('gosi.average_of_last_24_months_salary') }}"

							                                >
							                    	</div>
												</div>

												<div class="form-group">
													<div class="form-group">
							                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
							                          	{{ trans('lang.question.gosi_subscriptions_months') }}
							                          </label>
							                          <input 
							                                id="subscription_months" 
							                                type="text" 
							                                class="form-control"
							                                name="gosi[subscription_months]" 
							                                required 
							                                placeholder="eg. 120" 
							                                value="{{ $user_questionnaire->gosi["gosi"]["subscription_months"] ?? old('gosi.subscription_months') }}"
							                                >
							                    	</div>
												</div>

												

												<br>
												<br>
												<div class="center_content">
													<button type="submit" class="button">
														{{ trans('lang.question.continue_to_risk') }}
														<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
													</button>

												</div>
											</div>
										</div>
		                            </div>
		                            
		                        </div>
		                        {{-- <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='submit' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
		                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="clearfix"></div>
		                        </div> --}}
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    </div><!-- end row -->
	</div> <!--  big container -->

	
	{{-- </div>
</div> --}}
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