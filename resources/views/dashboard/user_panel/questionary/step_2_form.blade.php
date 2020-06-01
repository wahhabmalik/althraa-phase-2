@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')
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
											<a href="{{ route('step_1', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_1.svg') }}"></a>
										</div>
										
									</a>
								</li>
	                            <li class="active tab-mob">
	                            	<p class="progressbar_text"><span style="color: #01630a;">
	                            		{{ trans('lang.question_headings.income') }}
	                            	</span></p>
	                            	<a href="#income" data-toggle="tab">
										<div class="icon-circle ">
											<img src="{{ asset('backend_assets/questions/assets/img/step_2_black.svg') }}">
										</div>
										
									</a>
								</li>
	                            <li class="tab-mob">
	                            	<p class="progressbar_text">
	                            		{{ trans('lang.question_headings.expenses') }}
	                            	</p>
	                            	<a>
										<div class="icon-circle">
											<a href="{{ route('step_3', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_3_black.png') }}"></a>
										</div>
										
									</a>
								</li>
								<li class="tab-mob">
									<p class="progressbar_text">
										{{ trans('lang.question_headings.net_assets') }}
									</p>
									<a>
										<div class="icon-circle">
											<a href="{{ route('step_4', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_4_black.png') }}"></a>
										</div>
										
									</a>
								</li>
								<li>
									<p class="progressbar_text">
										{{ trans('lang.question_headings.gosi') }}
									</p>
									<a>
										<div class="icon-circle">
											<a href="{{ route('step_5', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_5.png') }}"></a>
										</div>
										
									</a>
								</li>
								<li>
									<p class="progressbar_text">
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
	                        	<div class="tab-pane active" id="income">
	                            	<div class="row">
	                            		<div class="col-sm-4"></div>
	                            		<div class="col-sm-4">
											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.salary') }}
						                          </label>
						                          <input 
						                          data-a-sign="" data-a-dec="," data-a-sep="."
					                                id="salary" 
					                                type="text" 
					                                class="form-control @error('income.salary') {!! 'error' !!} @enderror" 
					                                name="income[salary]" 
					                                required 
					                                placeholder="eg. 40.000 SAR"
					                                value="{{ currency(old('income.salary') ?? $user_questionnaire->income["income"]["salary"] ?? null, 0) }}"
					                                >

				                                @error('income.salary')
						                            <label class="error" >{{ $message }}</label>
						                        @enderror
						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.private_business_or_freelancing') }}
						                          </label>
						                          <input 
						                          data-a-sign="" data-a-dec="," data-a-sep="."
						                                id="private_buisness_or_freelancing" 
						                                type="text" 
						                                class="form-control @error('income.private_buisness_or_freelancing') {!! 'error' !!} @enderror"
						                                name="income[private_buisness_or_freelancing]" 
						                                required 
						                                placeholder="eg. 140.00 SAR"
						                                value="{{ currency(old('income.private_buisness_or_freelancing') ?? $user_questionnaire->income["income"]["private_buisness_or_freelancing"] ?? null , 0) }}"
						                                >

						                            @error('income.private_buisness_or_freelancing')
						                            <label class="error" >{{ $message }}</label>
							                        @enderror
						                    	</div>
											</div>

											

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.other') }}
						                          </label>
						                          <input 
						                          data-a-sign="" data-a-dec="," data-a-sep="."
						                                id="other" 
						                                type="text" 
						                                class="form-control @error('income.other') {!! 'error' !!} @enderror"
						                                name="income[other]" 
						                                required 
						                                placeholder="eg. 300.00 SAR"
						                                value="{{ currency(old('income.other') ?? $user_questionnaire->income["income"]["other"] ?? null , 0) }}"
						                                >

						                            @error('income.other')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
						                    	</div>
											</div>

											<br>
											<br>
											<div class="center_content">
												<button type="submit" class="button">
													{{ trans('lang.question.continue_to_saving_plan') }}
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
{{-- </div> --}}
@endsection

@section('scripts')
<script src="{{ asset('backend_assets/questions/assets/js/jquery-2.2.4.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/bootstrap.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/jquery.bootstrap.wizard.js') }} " type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('backend_assets/questions/assets/js/demo.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/paper-bootstrap-wizard.js') }} " type="text/javascript"></script>




@include('dashboard.user_panel.partials.validate')
@endsection