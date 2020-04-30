@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')
<style type="text/css">
	@media screen and (max-width: 768px) {
	    .progress-bar{
	        width: 100% !important;
	    }
	}
</style>
@endsection

@section('content')
{{-- <div class="content__body">
	<div class="center_content"> --}}
		
    <div class="container">
        <div class="row mb-0 pt-5" style="position: relative; z-index: 10;">
    		<div class="col-md-12">
    			<a href="{{ route('step_6', app()->getLocale()) }}" style="color: #01630a;" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
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
								<li class="tab-mob">
									<p>
										{{ trans('lang.question_headings.gosi') }}
									</p>
									<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
										<div class="icon-circle checked">
											<img src="{{ asset('backend_assets/questions/assets/img/step_5.png') }}">
										</div>
										
									</a>
								</li>
								<li class="tab-mob">
									<p>
										{{ trans('lang.question_headings.risk') }}
									</p>
									<a @if($request->segment(1) == 'en') href="javascript:void(0)" data-toggle="tab" @endif>
										<div class="icon-circle checked">
											<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.svg') }}">
										</div>
										
									</a>
								</li>
								<li class="active tab-mob" >
									<p><span style="color: #01630a;">
										{{ trans('lang.question_headings.objectives') }}
									</span></p>
									<a href="#objectives" data-toggle="tab">
										<div class="icon-circle checked">
											<img src="{{ asset('backend_assets/questions/assets/img/step_7_black.svg') }}">
										</div>
										
									</a>
								</li>
	                        </ul>
						</div>

	                    <form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST">
	                    	@csrf	
	                        <div class="tab-content">
                            	<div class="row">
                            		<div class="col-sm-4"></div>
                            		<div class="col-sm-4">

										<p class="wizard_info_text">
											{{ trans('lang.question.time_horizon') }}
										</p>
										<div class="date_sec">
											<a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" 
											>
												<p class="wizard_info_text date_text">
													<input 
														type="number"
														class="form-control" 
														placeholder="Enter Age"
														required 
														min="0"
														name="objective[retirement_age]" 
														value="{{ $user_questionnaire->objective["objective"]["retirement_age"] ?? old('objective.assets.retirement_age') }}"
														>
												</p>
											</a>
										</div>

										<p class="wizard_info_text">
											{{ trans('lang.question.life_expectancy') }}
										</p>
										<div class="date_sec">
											<a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Enter Number of Years for Life Expectancy After Retirement">
												<p class="wizard_info_text date_text">
													<input 
														type="number"
														class="form-control" 
														placeholder="Enter Years"
														required 
														min="0"
														name="objective[life_expectancy_after_retirement]" 
														value="{{ $user_questionnaire->objective["objective"]["life_expectancy_after_retirement"] ?? old('objective.assets.life_expectancy_after_retirement') }}"
														>
												</p>
											</a>
										</div>

										<br>
										<br>
										<div class="center_content">
											<button type="submit" class="button">
												{{ trans('lang.question.calculate_results') }}
												<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
											</button>

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

<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection