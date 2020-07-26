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
												<a href="{{ route('step_6', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_6_black.png') }}"></a>
											</div>
											
										</a>
									</li>
									
		                        </ul>
							</div>

		                    <form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST" id="form">
		                    	@csrf	
		                        <div class="tab-content">
		                            <div class="tab-pane active" id="gosi">
		                            	<div class="row">
		                            		<div class="col-lg-4 col-md-3 col-sm-3"></div>
                            				<div class="col-lg-4 col-md-6 col-sm-6">
												
												<div class="form-group">
													<div class="form-group">
							                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
							                          	{{ trans('lang.question.gosi_starting_year_in_plan') }}
							                          </label>
							                          <input 
						                                id="strating_year_in_plan" 
						                                type="text" 
						                                class="form-control text-input @error('gosi.strating_year_in_plan') {!! 'error' !!} @enderror" 
						                                name="gosi[strating_year_in_plan]" 
						                                 
						                                placeholder="eg. 2012" 
						                                value="{{ old('gosi.strating_year_in_plan') ?? $user_questionnaire->gosi["gosi"]["strating_year_in_plan"] ?? '' }}"

						                                >

						                                @error('gosi.strating_year_in_plan')
								                            <label class="error" >{{ $message }}</label>
								                        @enderror
							                    	</div>
												</div>

												<div class="form-group">
													<div class="form-group">
							                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
							                          	{{ trans('lang.question.expecting_salary_at_retirement') }}
							                          </label>
							                          <input 
						                                id="expecting_salary_at_retirement" 
						                                type="text" 
						                                class="form-control @error('gosi.expecting_salary_at_retirement') {!! 'error' !!} @enderror" 
						                                name="gosi[expecting_salary_at_retirement]" 
						                                 
						                                placeholder="eg. 4000 SAR" 
						                                value="{{ currency(old('gosi.expecting_salary_at_retirement') ?? $user_questionnaire->gosi["gosi"]["expecting_salary_at_retirement"] ?? null , 0) }}"

						                                >

						                                @error('gosi.expecting_salary_at_retirement')
								                            <label class="error" >{{ $message }}</label>
								                        @enderror
							                    	</div>
												</div>

												{{-- <div class="form-group">
													<div class="form-group">
							                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
							                          	{{ trans('lang.question.mothly_life_expenses_after_retirement') }}
							                          </label>
							                          <input 
						                                id="mothly_life_expenses_after_retirement"
						                                type="text" 
						                                class="form-control @error('gosi.mothly_life_expenses_after_retirement') {!! 'error' !!} @enderror"
						                                name="gosi[mothly_life_expenses_after_retirement]"
						                                 
						                                placeholder="eg. 120" 
						                                value="{{ old('gosi.mothly_life_expenses_after_retirement') ?? $user_questionnaire->gosi["gosi"]["mothly_life_expenses_after_retirement"] ?? '' }}"
						                                >

						                                @error('gosi.mothly_life_expenses_after_retirement')
								                            <label class="error" >{{ $message }}</label>
								                        @enderror
							                    	</div>
												</div> --}}

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