@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
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
										<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.png') }}">
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
										
										<div class="form-group">
											<div class="form-group">
					                          <label for="name"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
					                          	{{ trans('lang.question.name') }}
					                          </label>
					                          <input 
					                                id="name" 
					                                type="text" 
					                                class="form-control @error('personal_info.name') {!! 'error' !!} @enderror" 
					                                name="personal_info[name]" 
					                                required 
					                                placeholder="eg. Ali"
					                                value="{{ old('personal_info.name') ?? $user_questionnaire->personal_info["personal_info"]["name"] ?? '' }}"
					                                >

					                            @error('personal_info.name')
						                            <label class="error" >{{ $message }}</label>
						                        @enderror
					                    	</div>
										</div>


										<div class="form-group">
											<div class="form-group">
					                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'text-right float-right' : '' }}">
					                          	{{ trans('lang.question.education_level') }}
					                          </label>
					                          <select 
					                          	class="form-control @error('personal_info.education_level') {!! 'error' !!} @enderror" required 
					                          	name="personal_info[education_level]"
					                          	>
					                          	<option value="">
					                          		{{ trans('lang.question.education_level') }}
					                          	</option>
					                          	<option >
					                          		{{ trans('lang.question.education_level_options.highschool') }}
					                          	</option>
					                          	<option >
					                          		{{ trans('lang.question.education_level_options.bachlore') }}
					                          	</option>
					                          	<option >
					                          		{{ trans('lang.question.education_level_options.master') }}
					                          	</option>
					                          	<option >
					                          		{{ trans('lang.question.education_level_options.above') }}
					                          	</option>
					                          	
					                          </select>

					                            @error('personal_info.education_level')
						                            <label class="error" >{{ $message }}</label>
						                        @enderror
					                    	</div>
										</div>

										<div class="form-group">
											<div class="form-group">
					                          <label for="years_old" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.question.years_old') }}</label>
					                          <input 
				                                id="years_old" 
				                                type="text" 
				                                class="form-control @error('personal_info.years_old') {!! 'error' !!} @enderror"
				                                name="personal_info[years_old]" 
				                                required 
				                                placeholder="eg. 30"
				                                value="{{ (old('personal_info.years_old')) ?? $user_questionnaire->personal_info["personal_info"]["years_old"] ?? Session::get('years_old') ?? '' }}"
				                                {{ Session::get('years_old') ? Session::put('years_old', '') : '' }}
				                                >

				                                @error('personal_info.years_old')
						                            <label class="error" >{{ $message }}</label>
						                        @enderror
					                    	</div>
										</div>

										<div class="form-group">
											<div class="form-group">
					                          <label for="time_horizon" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.question.time_horizon') }}</label>
					                          <input 
					                                id="time_horizon" 
					                                type="text" 
					                                class="form-control @error('personal_info.retirement_age') {!! 'error' !!} @enderror"
					                                required 
					                                placeholder="eg. 65"
					                                name="personal_info[retirement_age]" 
													value="{{ (old('personal_info.retirement_age')) ?? $user_questionnaire->personal_info["personal_info"]["retirement_age"] ?? Session::get('retirement_age') ?? '' }}"
					                                >

				                                @error('personal_info.retirement_age')
						                            <label class="error" >{{ $message }}</label>
						                        @enderror
					                    	</div>
										</div>

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

@include('dashboard.user_panel.partials.validate')


<style type="text/css">
@media only screen and (max-width: 600px) {
    .progressbar_text{
        font-size: 8px !important;
    }
}
</style>

@endsection