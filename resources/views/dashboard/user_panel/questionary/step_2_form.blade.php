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
											<img src="{{ asset('backend_assets/questions/assets/img/step_1.svg') }}">
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
						                                id="salary" 
						                                type="text" 
						                                class="form-control" 
						                                name="income[salary]" 
						                                required 
						                                placeholder="eg. 40.000 SAR"
						                                value="{{ $user_questionnaire->income["income"]["salary"] ?? old('income.salary') }}"
						                                >
						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.private_business_or_freelancing') }}
						                          </label>
						                          <input 
						                                id="private_buisness_or_freelancing" 
						                                type="text" 
						                                class="form-control"
						                                name="income[private_buisness_or_freelancing]" 
						                                required 
						                                placeholder="eg. 140.00 SAR"
						                                value="{{ $user_questionnaire->income["income"]["private_buisness_or_freelancing"] ?? old('income.private_buisness_or_freelancing') }}"
						                                >
						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.stock_dividents') }}
						                          </label>
						                          <input 
						                                id="stock_dividents" 
						                                type="text" 
						                                class="form-control"
						                                name="income[stock_dividents]" 
						                                required 
						                                placeholder="eg. 300.00 SAR"
						                                value="{{ $user_questionnaire->income["income"]["stock_dividents"] ?? old('income.stock_dividents') }}"
						                                >
						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.pension_income') }}
						                          </label>
						                          <input 
						                                id="pension_income" 
						                                type="text" 
						                                class="form-control"
						                                name="income[pension_income]" 
						                                required 
						                                placeholder="eg. 300.00 SAR"
						                                value="{{ $user_questionnaire->income["income"]["pension_income"] ?? old('income.pension_income') }}"
						                                >
						                    	</div>
											</div>

											<div class="form-group">
												<div class="form-group">
						                          <label for="text" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
						                          	{{ trans('lang.question.real_estate_income_rent') }}
						                          </label>
						                          <input 
						                                id="real_estate_income_rent" 
						                                type="text" 
						                                class="form-control"
						                                name="income[real_estate_income_rent]" 
						                                required 
						                                placeholder="eg. 3000 SAR"
						                                value="{{ $user_questionnaire->income["income"]["real_estate_income_rent"] ?? old('income.real_estate_income_rent') }}"
						                                >
						                    	</div>
											</div>

											<br>
											<br>
											<div class="center_content">
												<button type="submit" class="button">
													{{ trans('lang.question.continue_to_expenses') }}
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

	                            <div class="pull-left">
	                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
	                            </div>
	                            <div class="clearfix"></div>
	                        </div> --}}
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

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
{{-- <script src="{{ asset('backend_assets/questions/assets/js/jquery.validate.min.js') }} " type="text/javascript"></script> --}}
@include('dashboard.user_panel.partials.validate')
@endsection