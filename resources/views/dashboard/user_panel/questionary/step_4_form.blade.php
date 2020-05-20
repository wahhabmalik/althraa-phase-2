@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')

<style type="text/css">
.btn {
    border-radius: 0;
    background: #01630a;
    color: #ffffff;
    border: 2px solid #01630a;
}
.btn:hover {
    border-radius: 0;
    background: #01630a;
    color: #ffffff;
    border: 2px solid #01630a;
}

.button, .button:link, .button:visited {
    background: #01630a 0% 0% no-repeat padding-box !important;
    border-radius: 0.8rem;
    color: #fff;
    opacity: 1;
    padding: 1.5rem 3.3rem;
    text-decoration: none;
    text-transform: capitalize;
    font-size: 1.5rem;
    line-height: 1.8;
    font-family: "Soin Sans Neue Medium", sans-serif;
    transition: background-color 0.3s;
}
.btn.disabled{
	opacity: 1;
	border: none;
	cursor: pointer;
}

@media screen and (max-width: 768px) {
	ul.nav.nav-pills li{
		display: none;
	}
	.tab-mob{
		display: block !important;
		width: 33% !important;
	}
}

.nav-pills .nav-link.active{
	{{ ($request->segment(1) == 'ar') ? '    border-right: 5px solid #01630a !important;border-left: 0px solid #01630a !important;' : '' }}
}
</style>
@endsection


@section('content')
{{-- <div class="content__body"> --}}
<div class="container">
	<div class="row mb-0 pt-5" style="position: relative; z-index: 10;">
		<div class="col-md-12">
			<a href="{{ route('step_3', app()->getLocale()) }}" style="color: #01630a;" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
    				<i class="{{ ($request->segment(1) == 'en') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i> 
    				{{ trans('lang.question.go_to_previous_step') }}
    		</a>
		</div>
	</div>

    <div class="row" style="margin-top: -5%;">
        <div class="col-sm-12">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="wizard-card" data-color="green" id="wizardProfile">
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
							<li class="active tab-mob" >
								<p class="progressbar_text"><span style="color: #01630a;">
									{{ trans('lang.question_headings.net_assets') }}
								</span></p>
								<a href="#assets" data-toggle="tab">
									<div class="icon-circle checked">
										<img src="{{ asset('backend_assets/questions/assets/img/step_4_black.png') }}">
									</div>
									
								</a>
							</li>
							<li class="tab-mob">
								<p class="progressbar_text">
									{{ trans('lang.question_headings.gosi') }}
								</p>
								<a>
									<div class="icon-circle">
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
										<img src="{{ asset('backend_assets/questions/assets/img/step_6_black.png') }}">
									</div>
									
								</a>
							</li>
							
							
                        </ul>
					</div>

					<form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST" id="form">
						@csrf
                        <div class="tab-content">
                        	<div class="tab-pane active" id="expenses">
                            	<div class="container">
									<div class="row">
										<div class="{{ ($request->segment(1) == 'ar') ? 'col-md-1' : 'col-md-2' }}"></div>
										<div class="nav flex-column nav-pills col-sm-3 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}" style="position: unset;display: flow-root;text-align: left;padding-right: 27px;height: auto;background-color: #fff;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
											<p class="label_forms">
												{{ trans('lang.question_headings.net_assets') }}
											</p>

											<a class="nav-link active 
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'financial_assets' )
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" 
												id="v-financial-assets-tab" data-toggle="pill" href="#v-pills-financial-assets" role="tab" aria-controls="v-pills-financial-assets" aria-selected="true">
												{{ trans('lang.question.financial_assets') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'real_assets')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-real-assets-tab" data-toggle="pill" href="#v-pills-real-assets" role="tab" aria-controls="v-pills-real-assets" aria-selected="false">
												{{ trans('lang.question.assets') }}
											</a>

											<a class="nav-link
												@if($errors->count()>0)
													@foreach($errors->getMessages() as $key => $error)
														@php $er = explode('.',$key) @endphp
														@if($er[1] == 'liabilities')
															{{ 'text-danger' }}
														@endif
													@endforeach
												@endif
												" id="v-pills-liabilities-tab" data-toggle="pill" href="#v-pills-liabilities" role="tab" aria-controls="v-pills-liabilities" aria-selected="false">
												{{ trans('lang.question.liabilities') }}
											</a>

											<div class="net_total_text">
												<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
													{{ trans('lang.question.net_total') }}
												</span>
												<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
												<span id="net_total">0 </span> SAR
												</span>
											</div>
										  
										</div>

										<div class="tab-content col-sm-4" style="padding-top: 0px;" id="v-pills-tabContent">
											
											<div class="tab-pane fade show active in" id="v-pills-financial-assets" role="tabpanel" aria-labelledby="v-pills-financial-assets-tab">
												
												<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.cash_and_deposit') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="assets_liquid__cash" 
											  			class="form-control required @error('net_assets.financial_assets.cash_and_deposit') {!! ' error ' !!} @enderror financial_assets " 
											  			name="net_assets[financial_assets][cash_and_deposit]"
											  			 
											  			value="{{ old('net_assets.financial_assets.cash_and_deposit') ?? $user_questionnaire->net_assets["net_assets"]["financial_assets"]["cash_and_deposit"] ?? '' }}"
											  			>
											  		@error('net_assets.financial_assets.cash_and_deposit')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.equities') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="assets_liquid__local_equity" 
											  			class="form-control required @error('net_assets.financial_assets.equities') {!! ' error ' !!} @enderror financial_assets " 
											  			name="net_assets[financial_assets][equities]"
											  			 
											  			value="{{ old('net_assets.financial_assets.equities') ?? $user_questionnaire->net_assets["net_assets"]["financial_assets"]["equities"] ?? '' }}"
											  			>
											  		@error('net_assets.financial_assets.equities')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.bonds') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="assets_liquid__corporate_bonds" 
											  			class="form-control required @error('net_assets.financial_assets.bonds') {!! ' error ' !!} @enderror financial_assets " 
											  			name="net_assets[financial_assets][bonds]"
											  			 
											  			value="{{ old('net_assets.financial_assets.bonds') ?? $user_questionnaire->net_assets["net_assets"]["financial_assets"]["bonds"] ?? '' }}"
											  			>
											  		@error('net_assets.financial_assets.bonds')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="financial_assets_total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_real_assets_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>


											</div>

											{{-- Second Tab --}}
											<div class="tab-pane fade" id="v-pills-real-assets" role="tabpanel" aria-labelledby="v-pills-real-assets-tab">
												
												<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.real_estate') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			class="form-control required @error('net_assets.real_assets.real_estate') {!! ' error ' !!} @enderror real_assets " 
											  			name="net_assets[real_assets][real_estate]"
											  			 
											  			value="{{ old('net_assets.real_assets.real_estate') ?? $user_questionnaire->net_assets["net_assets"]["real_assets"]["real_estate"] ?? '' }}"
											  			>
											  		@error('net_assets.real_assets.real_estate')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.pe') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			class="form-control required @error('net_assets.real_assets.pe') {!! ' error ' !!} @enderror real_assets " 
											  			name="net_assets[real_assets][pe]"
											  			 
											  			value="{{ old('net_assets.real_assets.pe') ?? $user_questionnaire->net_assets["net_assets"]["real_assets"]["pe"] ?? '' }}"
											  			>
											  		@error('net_assets.real_assets.pe')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

												<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="real_estate_total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="button" class="btn btn-next button" id="next_liabilities_tab">
				                                    	{{ trans('lang.question.next') }}
				                                    </button>
				                                </div>
											</div>

											{{-- Third Tab --}}
											<div class="tab-pane fade" id="v-pills-liabilities" role="tabpanel" aria-labelledby="v-pills-liabilities-tab">
												
												<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.liabilities_personal_loan') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="liabilities__personal_loan" 
											  			class="form-control required @error('net_assets.liabilities.personal_loan') {!! ' error ' !!} @enderror liabilities_inputs" 
											  			name="net_assets[liabilities][personal_loan]"
											  			 
											  			value="{{ old('net_assets.liabilities.personal_loan') ?? $user_questionnaire->net_assets["net_assets"]["liabilities"]["personal_loan"] ?? '' }}"
											  			>
											  		@error('net_assets.liabilities.personal_loan')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.liabilities_real_estate_loan') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="liabilities__real_estate_loan" 
											  			class="form-control required @error('net_assets.liabilities.real_estate_loan') {!! ' error ' !!} @enderror liabilities_inputs" 
											  			name="net_assets[liabilities][real_estate_loan]"
											  			 
											  			value="{{ old('net_assets.liabilities.real_estate_loan') ?? $user_questionnaire->net_assets["net_assets"]["liabilities"]["real_estate_loan"] ?? '' }}"
											  			>
											  		@error('net_assets.liabilities.real_estate_loan')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

											  	<div class="form-group">
											  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
											  			{{ trans('lang.question.liabilities_credit_cards') }}
											  		</label>
											  		<input 
											  			type="text" 
											  			id="liabilities__credit_cards" 
											  			class="form-control required @error('net_assets.liabilities.credit_cards') {!! ' error ' !!} @enderror liabilities_inputs" 
											  			name="net_assets[liabilities][credit_cards]"
											  			 
											  			value="{{ old('net_assets.liabilities.credit_cards') ?? $user_questionnaire->net_assets["net_assets"]["liabilities"]["credit_cards"] ?? '' }}"
											  			>
											  		@error('net_assets.liabilities.credit_cards')
							                            <label class="error" >{{ $message }}</label>
							                        @enderror
											  	</div>

											  	<div class="total_text">
													<span class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
														{{ trans('lang.question.total') }}
													</span>
													<span style="float: right;" class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
													<span id="pocket_money__total">0 </span> SAR
													</span>
												</div>

												<br>
												<br>
				                                <div class="form-wizard-buttons">
				                                    <button type="submit" class="button btn-next">
														{{ trans('lang.question.continue_to_gosi') }}
														<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
													</button>
				                                </div>
												
											</div>

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

<script type="text/javascript">
$(document).ready(function(){
	
	findTotal();

	$('.form-control').on('keyup', function(){
		findTotal();
        
	});

	function findTotal() {
		var financial_assets_total = real_estate_total = pocket_money__total = 0;
		$('#v-pills-financial-assets .form-group input').each(function(i, obj) {
			n = ($(this).val().replace(/,/g,''));
            financial_assets_total += parseInt(($(this).val()) ? n : 0);
        });
        $('#financial_assets_total').html(financial_assets_total);

        $('#v-pills-real-assets .form-group input').each(function(i, obj) {
        	n = ($(this).val().replace(/,/g,''));
            real_estate_total += parseInt(($(this).val()) ? n : 0);
        });
        $('#real_estate_total').html(real_estate_total);

        $('#v-pills-liabilities .form-group input').each(function(i, obj) {
        	n = ($(this).val().replace(/,/g,''));
            pocket_money__total += parseInt(($(this).val()) ? n : 0);
        });
        $('#pocket_money__total').html(pocket_money__total);
        
        $('#net_total').html(financial_assets_total+real_estate_total+pocket_money__total);
	}
});
</script>

<script src="{{ asset('backend_assets/questions/assets/js/jquery-2.2.4.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/bootstrap.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/jquery.bootstrap.wizard.js') }} " type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('backend_assets/questions/assets/js/demo.js') }} " type="text/javascript"></script>
<script src="{{ asset('backend_assets/questions/assets/js/paper-bootstrap-wizard.js') }} " type="text/javascript"></script>


@include('dashboard.user_panel.partials.validate')


<script type="text/javascript">

// tab 1
// $('#next_real_assets_tab').on('click', function(){
function navigateToTab1() {
	
	$('#v-pills-real-assets-tab').click();
	$('#v-pills-real-assets-tab').attr('aria-selected', true);
	$('#v-pills-real-assets-tab').attr('class', 'nav-link active');
	$('#v-financial-assets-tab').attr('aria-selected', false);
	$('#v-financial-assets-tab').attr('class', 'nav-link');

	$('#v-pills-financial-assets').attr('class', 'tab-pane fade');
	$('#v-pills-real-assets').attr('class', 'tab-pane fade active show in');	
}
// )};
// //tab 2
// $('#next_liabilities_tab').on('click', function(){

function navigateToTab2() {

	$('#v-pills-liabilities-tab').click();
	$('#v-pills-liabilities-tab').attr('aria-selected', true);
	$('#v-pills-liabilities-tab').attr('class', 'nav-link active');
	$('#v-pills-real-assets-tab').attr('aria-selected', false);
	$('#v-pills-real-assets-tab').attr('class', 'nav-link');

	$('#v-pills-real-assets').attr('class', 'tab-pane fade');
	$('#v-pills-liabilities').attr('class', 'tab-pane fade active show in');
}
// });

// //tab 3
// $('#next_medical_tab').on('click', function(){
function navigateToTab3() {		
	$('#v-pills-health-tab').click();
	$('#v-pills-health-tab').attr('aria-selected', true);
	$('#v-pills-health-tab').attr('class', 'nav-link active');
	$('#v-pills-liabilities-tab').attr('aria-selected', false);
	$('#v-pills-liabilities-tab').attr('class', 'nav-link');

	$('#v-pills-liabilities').attr('class', 'tab-pane fade');
	$('#v-pills-health').attr('class', 'tab-pane fade active show in');
}		
// });



























$('.form-wizard-buttons .btn-next').on('click', function() {
	var parent_fieldset = $(this).parents('.tab-pane.fade.show.active.in');
	// console.log(parent_fieldset.html());
	var next_step = true;
	// navigation steps / progress steps
	var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
	var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
	
	// fields validation
	parent_fieldset.find('.required').each(function() {
		// console.log($(this).attr("class"));
		if( $(this).val() == "" ) {
			$(this).addClass('input-error');
			next_step = false;
			
		}
		else {
			$(this).removeClass('input-error');
		}
	});

	// fields validation
	// console.log(next_step);
	if( next_step == true) {
		if(this.id == 'next_real_assets_tab')
			navigateToTab1();
		else if(this.id == 'next_liabilities_tab')
			navigateToTab2();
		else if(this.id == 'next_medical_tab')
			navigateToTab3();
		else
			console.log('error');
	}
	else{
		console.log('error');
	}
	
});
</script>
@endsection
