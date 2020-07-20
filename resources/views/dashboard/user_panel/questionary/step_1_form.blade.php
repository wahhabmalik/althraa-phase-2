@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/login/css/login.css') }}">
@include('dashboard.user_panel.partials.questions_asset')
<style type="text/css">
	.intl-tel-input.allow-dropdown {
	    border-left: 1px solid #dddddd;
	}
</style>
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
                            <li class="active tab-mob">
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
										<a href="{{ route('step_2', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_2_grey.svg') }}"></a>
									</div>
									
								</a>
							</li>
                            <li class="tab-mob">
                            	<p>{{ trans('lang.question_headings.expenses') }}</p>
                            	<a>
									<div class="icon-circle">
										<a href="{{ route('step_3', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_3_black.png') }}"></a>
									</div>
									
								</a>
							</li>
							<li>
								<p>{{ trans('lang.question_headings.net_assets') }}</p>
								<a>
									<div class="icon-circle">
										<a href="{{ route('step_4', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_4_black.png') }}"></a>
									</div>
									
								</a>
							</li>
							<li>
								<p>{{ trans('lang.question_headings.gosi') }}</p>
								<a>
									<div class="icon-circle">
										<a href="{{ route('step_5', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_5.png') }}"></a>
									</div>
									
								</a>
							</li>
							<li>
								<p>{{ trans('lang.question_headings.risk') }}</p>
								<a>
									<div class="icon-circle">
										<a href="{{ route('step_6', app()->getLocale()) }}"><img src="{{ asset('backend_assets/questions/assets/img/step_6_black.png') }}"></a>
									</div>
									
								</a>
							</li>
							
                        </ul>
					</div>

					<form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST" id="form1">
						@csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="about">
                            	<div class="row">
                            		<div class="col-sm-4"></div>
                            		<div class="col-sm-4">
										{{-- <p class="wizard_info_text">
											{{ trans('lang.question.started_year_for_personal_financial_plan') }}
										</p> --}}
										
										<div class="form-group">
											<div class="form-group">
					                          <label for="name"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
					                          	{{ trans('lang.question.name') }}
					                          </label>
					                          <input 
					                                id="name" 
					                                type="text" 
					                                class="form-control text-input @error('personal_info.name') {!! 'error' !!} @enderror" 
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
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.highschool') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.highschool') ? 'selected' : '' !!}


													value="lang.question.education_level_options.highschool" 

					                          		>
					                          		{{ trans('lang.question.education_level_options.highschool') }}
					                          	</option>
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.bachlore') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.bachlore') ? 'selected' : '' !!}

					                          		value="lang.question.education_level_options.bachlore" 

					                          		>
					                          		{{ trans('lang.question.education_level_options.bachlore') }}
					                          	</option>
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.master') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.master') ? 'selected' : '' !!}

					                          		value="lang.question.education_level_options.master" 

					                          		>
					                          		{{ trans('lang.question.education_level_options.master') }}
					                          	</option>
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.above') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.above') ? 'selected' : '' !!}

					                          		value="lang.question.education_level_options.above" 

					                          		>
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
				                                max="120"
				                                min="5" 
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
					                          <label for="time_horizon" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.question.planned_retirement_age') }}</label>
					                          <input 
					                                id="time_horizon" 
					                                type="text" 
					                                class="form-control @error('personal_info.retirement_age') {!! 'error' !!} @enderror"
					                                required 
					                                placeholder="eg. 65"
					                                name="personal_info[retirement_age]"
					                                max="120" 
													value="{{ (old('personal_info.retirement_age')) ?? $user_questionnaire->personal_info["personal_info"]["retirement_age"] ?? Session::get('retirement_age') ?? '' }}"
					                                >

				                                @error('personal_info.retirement_age')
						                            <label class="error" >{{ $message }}</label>
						                        @enderror
					                    	</div>
										</div>

										<div class="form-group">
											<div class="form-group">
												<label for="gender" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.register_form.gender') }}</label>

						                        <select 
						                            class="form-control @error('gender') is-invalid @enderror" 
						                            id="gender" 
						                            name="gender" 
						                            required
						                            oninvalid="InvalidMsg(this);"
						                            >
						                            <option value="Male">{{ trans('lang.male') }}</option>
						                            <option value="Female">{{ trans('lang.female') }}</option>
						                            <option value="Others">{{ trans('lang.other') }}</option>
						                        </select>

						                        @error('gender')
						                            <span class="invalid-feedback" role="alert">
						                                <strong>{{ $message }}</strong>
						                            </span>
						                        @enderror
						                        
											</div>
										</div>
										<div class="form-group">
											<div class="form-group">
					                        	<label for="phone_number" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.register_form.phone_number') }}</label>

							                    <div class="input-group m-b" style="direction: ltr;">
							                        <input 
							                        class="form-control 
							                        @error('phone_number') is-invalid @enderror" 
							                        style="height: 40px;" 
							                        id="phone" 
							                        type="tel" 
							                        name="phone_number" 
							                        value="{{ (old('phone_number')) ?? auth()->user()->phone_number ?? '' }}" 
							                        required 
							                        oninvalid="InvalidMsg(this);"
							                        autocomplete="phone_number">
							                        
							                    </div>

							                    @error('phone_number')
							                        <span class="invalid-feedback" role="alert" style="display: block;">
							                            <strong>{{ $message }}</strong>
							                        </span>
							                    @enderror
					                    	</div>
										</div>

										<br>

										<div class="center_content">
											<button 
												style="height: 55px;" 
												type="submit" 
												class="button"
											>
												{{ trans('lang.question.continue_to_income') }} 
												<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
											</button>

										</div>
										<br>
										<br>
										<br>
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

<script>

(function($, undefined) {

    "use strict";

    // When ready.
    $(function() {
        
        var $form = $( "#form1" );
        var $input = $form.find( "input:not(.text-input)" );

        $input.on( "keyup", function( event ) {
            
            
            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }
            
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
            
            
            var $this = $( this );
            
            // Get the value.
            var input = $this.val();
            
            var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;

                    $this.val( function() {
                        return ( input === 0 ) ? 0 : input;
                    } );
        } );
        
        /**
         * ==================================
         * When Form Submitted
         * ==================================
         */
        $form.on( "submit", function( event ) {
            
            var $this = $( this );
            var n = '';
            $('.form-control').each(function(i, obj) {
                
                $(this).val($(this).val().replace(/,/g,''));
                
            });
            

        
            
        });
        
    });
})(jQuery);
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
<script type="text/javascript">
    
var telInput = $("#phone");
  // errorMsg = $("#error-msg"),
  // validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: false,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  defaultValue: "999999",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa'],
  preventInvalidNumbers: false,
  separateDialCode: false,
  initialCountry: "SA",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
};


telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      // validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      // errorMsg.removeClass("hide");
    }
    console.log($('.selected-dial-code').text());
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);



</script>
@endsection