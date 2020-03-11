@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')

@endsection

@section('content')
{{-- <div class="content__body">
	<div class="center_content"> --}}
		
	    <div class="container mb-5">
	        <div class="row">
		        <div class="col-sm-12">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="wizard-card" data-color="orange" id="wizardProfile">	

							<form action="{{ route('additional_information.store', app()->getLocale()) }}" method="POST">
								@csrf
                            	<div class="row">
                            		<div class="col-sm-4"></div>
                            		<div class="col-sm-4">

										<div class="form-group">
											<div class="form-group">
					                          <label class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
					                          	{{ trans('lang.additional_information.your_potential_monthly_saving_is') }}
					                          	{{-- {{ trans('lang.question.monthly_contributions_year_1') }} --}}
					                          </label>
					                          <input 
					                                id="monthly_contributions_year_1" 
					                                type="text" 
					                                class="form-control" 
					                                name="extra_info[monthly_contributions_year_1]" 
					                                required 
					                                {{-- placeholder="eg. 5000 SAR" --}}
					                                value="{{ $user_questionnaire->extra_info["extra_info"]["monthly_contributions_year_1"] ?? old('extra_info.monthly_contributions_year_1') }}"
					                                >
					                    	</div>
										</div>

										<div class="form-group">
											<div class="form-group">
					                          <label for="annual_increase_in_contributions_percentage" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
					                          	{{ trans('lang.additional_information.i_want_to_increase_my_current_saving_to_be') }}
					                          	{{-- {{ trans('lang.question.annual_increase_in_contributions_percentage') }} --}}
					                          </label>
					                          <input 
					                                id="annual_increase_in_contributions_percentage" 
					                                type="number" 
					                                class="form-control"
					                                name="extra_info[annual_increase_in_contributions_percentage]" 
					                                required 
					                                placeholder="{{ trans('lang.additional_information.annual_increase_in_saving') }}"
					                                min="0" 
					                                max="100" 
					                                value="{{ $user_questionnaire->extra_info["extra_info"]["annual_increase_in_contributions_percentage"] ?? old('extra_info.annual_increase_in_contributions_percentage') }}"
					                                >
					                    	</div>
										</div>

										<div class="form-group">
											<div class="form-group">
					                          <label for="withdrawl_amount_per_month" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
					                          	{{ trans('lang.additional_information.monthelly_withdraw_after_retirement_is') }}
					                          	{{-- {{ trans('lang.question.withdrawl_amount_per_month') }} --}}
					                          </label>
					                          <input 
					                                id="withdrawl_amount_per_month" 
					                                type="text" 
					                                class="form-control"
					                                name="extra_info[withdrawl_amount_per_month]" 
					                                required 
					                                {{-- placeholder="eg. 10,000 SAR" --}}
					                                value="{{ $user_questionnaire->extra_info["extra_info"]["withdrawl_amount_per_month"] ?? old('extra_info.withdrawl_amount_per_month') }}"
					                                >
					                    	</div>
										</div>

										<br>
										<br>
										<div class="center_content">
											<button type="submit" class="button">
												{{ trans('lang.question.save') }} 
												<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
											</button>

										</div>
									</div>
								</div>
		                            
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

		<br>
		<br>

	
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
<script src="{{ asset('backend_assets/questions/assets/js/jquery.validate.min.js') }} " type="text/javascript"></script>


<style type="text/css">
@media only screen and (max-width: 600px) {
    .progressbar_text{
        font-size: 8px !important;
    }
}
</style>


@endsection