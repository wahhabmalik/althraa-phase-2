@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')

@endsection

@section('content')
{{-- <div class="content__body">
	<div class="center_content"> --}}
		
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="wizard-card" data-color="orange" id="wizardProfile">	
		                	<div class="wizard-navigation">
								<div class="progress-with-circle">
								     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 50%;"></div>
								</div>
								<ul>
		                            <li class="tab-mob">
		                            	<p><span style="color: #01630a;">{{ trans('lang.question_headings.personal_info') }}</span></p>
		                            	<a href="#about" data-toggle="tab">
											<div class="icon-circle checked">
												<img src="{{ asset('backend_assets/questions/assets/img/step_1_black.svg') }}">
											</div>
											
										</a>
									</li>
		                            <li class="tab-mob">
		                            	<p>{{ trans('lang.question_headings.income') }}</p>
		                            	<a>
											<div class="icon-circle ">
												<img src="{{ asset('backend_assets/questions/assets/img/step_2_black.svg') }}">
											</div>
											
										</a>
									</li>
		                            <li class="tab-mob">
		                            	<p>{{ trans('lang.question_headings.expenses') }}</p>
		                            	<a>
											<div class="icon-circle">
												<img src="{{ asset('backend_assets/questions/assets/img/step_3_black.png') }}">
											</div>
											
										</a>
									</li>
									<li>
										<p>{{ trans('lang.question_headings.net_assets') }}</p>
										<a>
											<div class="icon-circle">
												<img src="{{ asset('backend_assets/questions/assets/img/step_4_black.png') }}">
											</div>
											
										</a>
									</li>
									<li>
										<p>{{ trans('lang.question_headings.gosi') }}</p>
										<a>
											<div class="icon-circle">
												<img src="{{ asset('backend_assets/questions/assets/img/step_5.png') }}">
											</div>
											
										</a>
									</li>
									<li>
										<p>{{ trans('lang.question_headings.risk') }}</p>
										<a>
											<div class="icon-circle">
												<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.svg') }}">
											</div>
											
										</a>
									</li>
									<li>
										<p>{{ trans('lang.question_headings.objectives') }}</p>
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
		                            <div class="tab-pane" id="about">
		                            	<div class="row">
		                            		<div class="col-sm-4"></div>
		                            		<div class="col-sm-4">
												<p class="wizard_info_text">
													{{ trans('lang.question.started_year_for_personal_financial_plan') }}
												</p>
												<div class="date_sec">
													<p class="wizard_info_text date_text">
														<input 
															type="text"
															class="form-control" 
															placeholder="Year"
															required 
															name="started_year_for_personal_financial_plan"
															value="{{ $user_questionnaire->started_year_for_personal_financial_plan ?? old('started_year_for_personal_financial_plan') }}" 
															>
													</p>
												</div>
												<div class="form-group">
													<div class="form-group">
							                          <label for="name"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
							                          	{{ trans('lang.question.name') }}
							                          </label>
							                          <input 
							                                id="name" 
							                                type="text" 
							                                class="form-control" 
							                                name="personal_info[name]" 
							                                required 
							                                placeholder="eg. Ali"
							                                value="{{ $user_questionnaire->personal_info["personal_info"]["name"] ?? old('personal_info.name') }}"
							                                >
							                    	</div>
												</div>

												<div class="form-group">
													<div class="form-group">
							                          <label for="years_old" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.question.years_old') }}</label>
							                          <input 
							                                id="years_old" 
							                                type="text" 
							                                class="form-control"
							                                name="personal_info[years_old]" 
							                                required 
							                                placeholder="eg. 30"
							                                value="{{ ($user_questionnaire->personal_info["personal_info"]["years_old"] ?? old('personal_info.years_old')) ?? Session::get('years_old') }}"
							                                {{ Session::get('years_old') ? Session::put('years_old', '') : '' }}
							                                >
							                    	</div>
												</div>

												<div class="form-group">
													<div class="form-group">
							                          <label for="no_of_dependents" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.question.no_of_dependents') }}</label>
							                          <input 
							                                id="no_of_dependents" 
							                                type="text" 
							                                class="form-control"
							                                name="personal_info[no_of_dependents]" 
							                                required 
							                                placeholder="eg. 3"
							                                value="{{ $user_questionnaire->personal_info["personal_info"]["no_of_dependents"] ?? old('personal_info.no_of_dependents') }}"
							                                >
							                    	</div>
												</div>

												<br>
												<br>
												<div class="center_content">
													<button type="submit" class="button">
														{{ trans('lang.question.continue_to_income') }} 
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


<style type="text/css">
@media only screen and (max-width: 600px) {
    .progressbar_text{
        font-size: 8px !important;
    }
}
</style>


{{-- <script type="text/javascript">
	function myFunction(x) {
	  if (x.matches) { // If media query matches
	    document.body.style.backgroundColor = "yellow";

	    if (x.matches) {
	    	$("ul.nav.nav-pills").each(function() {
				const index = $('ul.nav.nav-pills .active').index();
				$(this).addClass("tab-mob");
			    $(this).children("li").eq(index + 1).not(".active").addClass("tab-mob");
			    $(this).children("li").eq(index + 2).not(".active").addClass("tab-mob");
			});
		}

	  } else {
	   		document.body.style.backgroundColor = "pink";
	  }
	}

	var x = window.matchMedia("(max-width: 768px)")
	myFunction(x) // Call listener function at run time
	x.addListener(myFunction) // Attach listener function on state changes
</script> --}}

@endsection