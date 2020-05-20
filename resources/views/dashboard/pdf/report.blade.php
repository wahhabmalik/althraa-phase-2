@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/dashboard/css/print.css') }}">
<style>

{!! ($request->segment(1) == 'ar') ? '.progressbar li:after{ right: -50%; }' : '' !!}

</style>
@endsection


@section('content')

{{-- {{ dd($data) }} --}}
<div id="printable" class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} " >
	
	@php 
	$pointer = '<img src="' . asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') . '"><br><p>You</p>';
	@endphp

	<div id="parent-report" class="container-fluid mb-5 background_effect " {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<br><br><br><br><br>
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">PERSONAL FINANCIAL PLAN</h1>
	            <h1 class="user-main mt-3">{{ $data['personalInfo']['name'] }}</h1>
			</div>
		</div>

		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<img
                  class="img img-responsive image-main"
                  src="
                    {{ asset('frontend_assets/img/banner/home_banner_1.svg') }}"
                  alt="Banner image"
                />
			</div>
		</div>

		<br><br><br><br><br><br>
		<br><br><br><br><br><br>

		<p class="text-center mr-5">{{ $data['credits'] }}</p>
		
	</div>






	{{-- Page 2 start --}}


	<div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<br><br><br><br><br>
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">TABLE OF CONTENTS</h1>
			</div>
		</div>

		<br><br><br><br><br>
		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-9 tb-content">
				<P>About Thokhor</P>
				<P>Financial Health Checkup</P>
				<P>Personal Indicators</P>
				<P>Asset Allocation</P>
				<P>Financil Forcast</P>
				<P>Investing Plan</P>
			</div>

			<div class="col-sm-1 tb-content">
				<P>01</P>
				<P>02</P>
				<P>03</P>
				<P>04</P>
				<P>05</P>
				<P>06</P>
				
			</div>
		</div>


		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>






	{{-- Page 3 start --}}


	<div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br><br><br>
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">Thank you for <br> being our customer. </h1>
	            <p class="text-primary">We hope you stick with the plan you got and accomplish your financial goals! </p>
			</div>
		</div>

		<br><br><br><br><br>
		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<img class="img img-fluid img-left" src="{{ asset('frontend_assets/img/banner/undraw_winners.png') }}">

				<h1 class="page-heading invst_plan mt-5 pt-3">
                        {{ trans('lang.frontend_about.mission') }}
                </h1>
                <p class="mt-4 mb-5">
                    {{ trans('lang.frontend_about.mission_text_report') }}
                </p>
                <ul>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_1') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_2') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_3') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_4') }}</p></li>
                    
                </ul>

			</div>
			<div class="col-sm-5">
				<img class="img img-fluid img-right" src="{{ asset('frontend_assets/img/banner/undraw_business.png') }}">

				<h1 class="page-heading invst_plan mt-5 pt-3">
                        {{ trans('lang.frontend_about.method') }}
                </h1>
                <p class="mt-4 mb-5">
                    {{ trans('lang.frontend_about.method_text') }}
                </p>
                <ul>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_1') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_2') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_3') }}</p></li>
                    
                </ul>
			</div>

			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
		</div>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>






	{{-- page 4 start --}}

	<div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            
	            <h1 class="heading-secondary">Financial Health Check Up</h1>

	            <p class="text-secondary mt-5">Personal Information</p>
	            
			</div>
		</div>

		
		
		<div class="row mt-1 personal-info">
			<div class="col-sm-1"></div>
			
			<div class="col-sm-3">
				<p>Name</p>
				<b>{{ $data['personalInfo']['name'] }}</b>
			</div>
			
			<div class="col-sm-3">
				<p>Education</p>
				<b>{{ $data['personalInfo']['education_level'] }}</b>
			</div>
			
			<div class="col-sm-2">
				<p>Current age</p>
				<b>{{ $data['personalInfo']['years_old'] }}</b>
			</div>
			
			<div class="col-sm-2">
				<p>Planned retirement age</p>
				<b>{{ $data['personalInfo']['retirement_age'] }}</b>
			</div>
			
			<br><br><br><br><br>
			
			
		</div>

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Financial Position Today</p>
				
			</div>
		</div>
		<div class="row financial-position">
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<table>
					<tr>
						<td>Monthly income today</td>
						<td>{{ currency($data['monthlyIncomeToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>GOSI/PPA monthly subscription</td>
						<td>{{ currency($data['gosi_or_ppa_monthlySubscription'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>Monthly saving plan for retirement</td>
						<td>{{ currency($data['monthlySavingPlanForRetirement'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>Monthly saving % today</td>
						<td>{{ percentage($data['monthlySavingPercentageToday'] ?? 0) }}</td>
					</tr>
					
				</table>
			</div>
			<div class="col-sm-5">
				<table>
					<tr>
						<td>Total assets today</td>
						<td>{{ currency($data['totalAssetsToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>Total liabilities today</td>
						<td>{{ currency($data['totalLiabilitiesToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>Net worth</td>
						<td>{{ currency($data['netWorthToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>Accomulative saving today</td>
						<td>{{ currency($data['accomulativeSavingtoday'] ?? 0) }}</td>
					</tr>
					
				</table>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Current Asset Allocation</p>
				<div class="row mb-5">
					
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
							<canvas id="DonutChartSelectedAsset" width="400" height="400"></canvas>
						    <!--graph inner-->
						    <br>
						    <p class="text-center inner_price donut_inner">
						    	{{ currency($data['totalCurrentAssetAllocation'] ?? 0) }} 
						    </p>
						    <p class="text-center donut_inner">
						    	{{ percentage($data['totalCurrentAssetAllocationPercentage'] ?? 0) }}
						    </p>
						    <br>

						    {{-- <div class="s-50"></div> --}}
						</div>
						
					
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>
											<div class="table_color" style="background-color: #3B83FF;"></div>
										</td>
										<td>
											<p>Cash and Equivalent</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['cashAndEquivlentPercentage']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency($data['cashAndEquivlent'] ?? 0) }}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #F56565;"></div>
										</td>
										<td>
											<p>Equities</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['equitiesPercentage']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency($data['equities'] ?? 0) }} 
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #FFE700;"></div>
										</td>
										<td>
											<p>Fix income</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['fixIncomePercentage']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency($data['fixIncome'] ?? 0) }} 
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #ED8936;"></div>
										</td>
										<td>
											<p>Alternative investments</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['alternativeInvestmentsPercentage']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency($data['alternativeInvestments'] ?? 0) }} 
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #ffffff;"></div>
										</td>
										<td>
											<p>Total</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['totalCurrentAssetAllocationPercentage']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency($data['totalCurrentAssetAllocation'] ?? 0) }} 
											</p>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>





	{{-- Page 5 start --}}


	<div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main">Personal Indicators</h1>
	            
			</div>
		</div>

		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<p class="text-secondary mt-5">Monthly Saving Rate</p>
				
				<div class="factor">
					<p>Little saver</p>	
					<p>Good saver</p>	
					<p>Great saver</p>	
					<p>Rich saver</p>	
					<p>Wealthy</p>	
				</div>

				<div class="factor">
					<span class="little"></span>
					<span class="good"></span>
					<span class="great"></span>
					<span class="rich"></span>
					<span class="wealthy"></span>
				</div>

				<div class="factor">
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] <= 10) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] >= 11 && $data['monthlySavingPercentageToday'] <= 20) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] >= 21 && $data['monthlySavingPercentageToday'] <= 30) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] >= 31 && $data['monthlySavingPercentageToday'] <= 50) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] >50) ? $pointer : '' !!}
					</div>
				</div>

			</div>

			<div class="col-sm-1">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/002-calendar@2x.png') }}" class="factor-icon">
			</div>
		</div>


		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<p class="text-secondary mt-5">Current Saving Amount ({{ $data['personalInfo']['years_old'] }})</p>
				
				<div class="factor-vs">
					<p>Poor saver</p>	
					<p>Fair saver</p>	
					<p>Good saver</p>	
				</div>

				<div class="factor-vs">
					<span class="little"></span>
					<span class="great"></span>
					<span class="wealthy"></span>
				</div>

				<div class="factor-vs">
					<div class="pointer">
						{!! ($data['commulitiveSavingRating'] == 'Poor') ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['commulitiveSavingRating'] == 'Fair') ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['commulitiveSavingRating'] == 'Good') ? $pointer : '' !!}
					</div>
					
				</div>

			</div>

			<div class="col-sm-1">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/001-safebox@2x.png') }}" class="factor-icon">
			</div>
		</div>


		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<p class="text-secondary mt-5">Early Retirement Possibility</p>
				
				<div class="factor">
					<p>Poor</p>	
					<p>Fair</p>	
					<p>Healthy</p>	
					<p>Very healthy</p>	
					<p>Early retire person</p>	
				</div>

				<div class="factor">
					<span class="little"></span>
					<span class="good"></span>
					<span class="great"></span>
					<span class="rich"></span>
					<span class="wealthy"></span>
				</div>

				<div class="factor">
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] < 0) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] > 0 && $data['monthlySavingPercentageToday'] <= 10) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] > 10 && $data['monthlySavingPercentageToday'] <= 20) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] > 20 && $data['monthlySavingPercentageToday'] <= 30) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['monthlySavingPercentageToday'] > 30) ? $pointer : '' !!}
					</div>
				</div>

			</div>

			<div class="col-sm-1">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/003-beach@2x.png') }}" class="factor-icon">
			</div>
		</div>


		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<p class="text-secondary mt-5">Investing Diversity</p>
				
				<div class="factor-s">
					<p>Poor</p>	
					<p>Fair</p>	
					<p>Good</p>	
					<p>Great</p>
					
				</div>

				<div class="factor-s">
					<span class="little"></span>
					<span class="good"></span>
					<span class="great"></span>
					<span class="rich"></span>
					
				</div>

				<div class="factor-s">
					<div class="pointer">
						{!! ($data['assetClass'] == 1) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['assetClass'] == 2) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['assetClass'] == 3) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['assetClass'] == 4) ? $pointer : '' !!}
					</div>
					
				</div>

			</div>

			<div class="col-sm-1">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/004-profits@2x.png') }}" class="factor-icon">
			</div>
		</div>

		<br><br><br><br><br>
		<br><br><br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>









	{{-- Page 6 start --}}


	<div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main">Asset Allocation</h1>
	            
			</div>
		</div>

		
		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<p class="text-secondary mt-5">Risk Test Index</p>
				
				<div class="factor">
					<p>Very Conservative</p>	
					<p>Conservative</p>	
					<p>Natural</p>	
					<p>Agressive</p>	
					<p>Very Agressive</p>	
				</div>

				<div class="factor">
					<span class="little"></span>
					<span class="good"></span>
					<span class="great"></span>
					<span class="rich"></span>
					<span class="wealthy"></span>
				</div>

				<div class="factor">
					<div class="pointer">
						{!! ($data['riskTestIndex'] < 19) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['riskTestIndex'] >= 20 && $data['riskTestIndex'] < 40) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['riskTestIndex'] >= 40 && $data['riskTestIndex'] < 60) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['riskTestIndex'] >= 60 && $data['riskTestIndex'] < 80) ? $pointer : '' !!}
					</div>
					<div class="pointer">
						{!! ($data['riskTestIndex'] >= 80 && $data['riskTestIndex'] <= 100) ? $pointer : '' !!}
					</div>
				</div>

			</div>

			
		</div>

		<br><br>

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Recommended Assets Allocation</p>
				<div class="row mb-5">
					
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
							<canvas id="DonutChartSelectedAssetRecommended" width="400" height="400"></canvas>
						    <!--graph inner-->
						    <br>
						    <p class="text-center inner_price donut_inner">
						    	{{ $data['totalCurrentAssetAllocation'] ?? '0' }} 
						    </p>
						    <p class="text-center donut_inner">
						    	{{ round($data['totalCAAPercentage'] ?? 100, 2) ?? 100 }} %
						    </p>
						    <br>

						    {{-- <div class="s-50"></div> --}}
						</div>
						
					
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>
											<div class="table_color" style="background-color: #3B83FF;"></div>
										</td>
										<td>
											<p>Cash and Equivalent</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['recommended']['cash_and_equivlent']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency(($data['totalCurrentAssetAllocation']*$data['recommended']['cash_and_equivlent'])/100) }}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #F56565;"></div>
										</td>
										<td>
											<p>Equities</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['recommended']['equities']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency(($data['totalCurrentAssetAllocation']*$data['recommended']['equities'])/100) }} 
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #FFE700;"></div>
										</td>
										<td>
											<p>Fix income</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['recommended']['fix_income']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency(($data['totalCurrentAssetAllocation']*$data['recommended']['fix_income'])/100) }}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #ED8936;"></div>
										</td>
										<td>
											<p>Alternative investments</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage($data['recommended']['alternative_investments']) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency(($data['totalCurrentAssetAllocation']*$data['recommended']['alternative_investments'])/100) }}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #ffffff;"></div>
										</td>
										<td>
											<p>Total</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ percentage(100) }}
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ currency($data['totalCurrentAssetAllocation']) ?? '0' }} 
											</p>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<br><br><br><br><br>
		<br><br><br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>









	{{-- Page 7 start --}}


	<div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-2">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <p class="text-secondary mt-5">Financial Forecast</p>
	            <p class="alertBox__p">
	              <span>👏Congratulations!</span>&nbsp;At age {{ $data['retirement_age'] }} you will have
	              savings balance of {{ currency($data['plan'][$data['retirement_age']]['value_end_year']) }}.
	            </p>
			</div>
		</div>

		<br><br>

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<canvas id="myChart" width="1600" height="600"></canvas>
			</div>
		</div>

		<br><br><br><br><br>

		<div class="row financial-position">
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<p class="text-secondary mt-5">Assumptions</p>
				<table>
					<tr>
						<td>Current age</td>
						<td>{{ $data['personalInfo']['years_old'] }}</td>
					</tr>
					<tr>
						<td>Planned retirement age</td>
						<td>{{ $data['retirement_age'] }}</td>
					</tr>
					<tr>
						<td>Monthly saving plan</td>
						<td>{{ currency($data['monthlySalary']) }} /Month</td>
					</tr>
					<tr>
						<td>Monthly saving today</td>
						<td>{{ percentage($data['monthlySavingPercentageToday']) }} of Monthly Income</td>
					</tr>
					<tr>
						<td>Accumulative saving today</td>
						<td>{{ currency($data['accomulativeSavingtoday']) }}</td>
					</tr>
					
				</table>
			</div>
			<div class="col-sm-5">
				<p class="text-secondary mt-5">Returns Assumptions</p>
				<table>
					<tr>
						<td>Cash and Quivlent</td>
						<td>{{ percentage($data['returnAssumptions']['cash_and_equivlent']) }}</td>
					</tr>
					<tr>
						<td>Equities</td>
						<td>{{ percentage($data['returnAssumptions']['equities']) }}</td>
					</tr>
					<tr>
						<td>Fix Income</td>
						<td>{{ percentage($data['returnAssumptions']['fix_income']) }}</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>{{ percentage($data['returnAssumptions']['alternative_investments']) }}</td>
					</tr>
					<tr>
						<td>Net Return/Year (Before retirement)</td>
						<td>{{ percentage($data['netReturnBeforeRetirement']) }}</td>
					</tr>
					<tr>
						<td>Net Return/Year (After retirement)</td>
						<td>{{ percentage($data['netReturnAfterRetirement']) }}</td>
					</tr>
					
				</table>
			</div>
			
		</div>

		<div class="row financial-position">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Income and Wealth at Retirement</p>
				<table>
					{{-- <tr>
						<td>Status at retirement</td>
						<td>Based on assets allocation</td>
					</tr> --}}
					<tr>
						<td>Retirement plan value at {{ $data['retirement_age'] }} years old</td>
						<td>{{ currency($data['plan'][$data['retirement_age']]['value_end_year']) }}</td>
					</tr>
					<tr>
						<td>Total monthly income</td>
						<td>{{ currency($data['totalMonthlyIncome']) }}</td>
					</tr>
					<tr>
						<td>Income from retirement plan</td>
						<td>{{ currency($data['monthlySalary']) }}</td>
					</tr>
					<tr>
						<td>Income from GOSI or PPA</td>
						<td>{{ currency($data['retirementGOCIMonthlyIncome']) }}</td>
					</tr>
					
				</table>
			</div>
			
		</div>
		<br><br><br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>







	{{-- Page 8 start --}}


	{{-- <div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                
	            </h2>
	            <br><br>
	            <h1 class="heading-main">Investing Plan</h1>
	            
			</div>
		</div>

		<div class="row investing-plan">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Investments Seletion</p>
				<table>
					<thead>
						<tr>
							<th>ASSET CLASS</th>
							<th>OOPTION 1</th>
							<th>OOPTION 2</th>
							<th>OOPTION 3</th>
						</tr>
					</thead>
					<tr>
						<td>Cash & Equivlent</td>
						<td class="text-right">صندوق الراجحي للمضاربة بالسلع بالريال</td>
						<td class="text-right">صندوق الاهلي للمتاجرة </td>
						<td class="text-right">صندوق الفا للمرابحة</td>
					</tr>
					<tr>
						<td>Equities</td>
						<td>iShares MSCI USA Islamic UCITS ETF</td>
						<td>iShares MSCI World Islamic UCITS ETF</td>
						<td>-</td>
					</tr>
					<tr>
						<td>Fix Income</td>
						<td class="text-right">صندوق سامبا للصكوك السيادية</td>
						<td class="text-right">صندوق الراجحي للصكوك</td>
						<td class="text-right">صندوق الانماء للصكوك المتداولة</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>Manual Process</td>
						<td>Manual Process</td>
						<td>Manual Process</td>
					</tr>
					
				</table>
			</div>
			
		</div>


		<div class="row investing-plan">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Capitel Deployment</p>
				<table>
					<thead>
						<tr>
							<th>ASSET CLASS</th>
							<th>PAYMENTS</th>
							<th>NO. OF FUNDS</th>
							<th>ASSET ALLOCATION</th>
							<th>INVESABLE AMOUNT</th>
						</tr>
					</thead>
					<tr>
						<td>Cash & Equivlent</td>
						<td>1 payment</td>
						<td>1</td>
						<td>{{ percentage($data['recommended']['cash_and_equivlent']) }}</td>
						<td>{{ currency(($data['netWorthToday']/100)*$data['recommended']['cash_and_equivlent']) }}</td>
					</tr>
					<tr>
						<td>Equities</td>
						<td>4 payment over one year</td>
						<td>1</td>
						<td>{{ percentage($data['recommended']['equities']) }}</td>
						<td>{{ currency(($data['netWorthToday']/100)*$data['recommended']['equities']) }}</td>
					</tr>
					<tr>
						<td>Fix Income</td>
						<td>1 payment</td>
						<td>1</td>
						<td>{{ percentage($data['recommended']['fix_income']) }}</td>
						<td>{{ currency(($data['netWorthToday']/100)*$data['recommended']['fix_income']) }}</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>Manual process</td>
						<td>1</td>
						<td>{{ percentage($data['recommended']['alternative_investments']) }}</td>
						<td>{{ currency(($data['netWorthToday']/100)*$data['recommended']['alternative_investments']) }}</td>
					</tr>
					<tr>
						<td>Total</td>
						<td></td>
						<td>6</td>
						<td>{{ $data['totalCapitalPercentage'] = percentage($data['recommended']['cash_and_equivlent']+$data['recommended']['equities']+$data['recommended']['fix_income']+$data['recommended']['alternative_investments']) }}</td>
						<td>{{ currency(($data['netWorthToday']/100)*(integer)$data['totalCapitalPercentage']) }}</td>
					</tr>
					
					
					
				</table>
			</div>
			
		</div>
		

		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>
 --}}






	{{-- Page 9 start --}}


	<div id="parent-report" class="container-fluid mb-5" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main text-center">Disclaimer</h1>
	            
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-sm-2"></div>
			<div class="col-sm-7 text-right pt-3">
				<p>{{ trans('lang.pdf_disclaimer') }}</p>
			</div>
		</div>

	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>

</div>


@endsection

@section('scripts')
{{-- <script src="html2pdf.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

{{-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script> --}}


<script>
// $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
// });
</script>


<script type="text/javascript">
$(document).ready(function(){
	setTimeout(
		function() {
			window.print();
			// $("br").remove();
			$("body").remove();
			window.close();
			window.top.close();
			// $("#parent-report").addClass('container');

			// var element = document.getElementById('printable');
			// html2pdf(element);

		},
	2000);
});
</script>

<script type="text/javascript">
/////////////////////////////////////
/*
|-------------------------------
|		Donut Chart Selected Asset
|-------------------------------
*/
var ctx = document.getElementById("DonutChartSelectedAsset");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
    	'Cash and Equivalent', 
    	'Equities', 
    	'Fix income', 
    	'Alternative investments',
    ],
    datasets: [{
		label: [
			'Cash and Equivalent', 
			'Equities', 
			'Fix income', 
			'Alternative investments',
		],
		// data: [20, 40, 51, 90, 20, 0, 10],
		data: [{!! implode(", ", $data['assetAllocationDonutChartValues']) !!}],
		backgroundColor: [
			'#3B83FF',
			'#F56565',
			'#FFE700',
			'#ED8936',
			
		],
		borderColor: [
			'#3B83FF',
			'#F56565',
			'#FFE700',
			'#ED8936',
			
		],
		borderWidth: 1
		}]
  },
  options: {
   	cutoutPercentage: 60,
    responsive: true,
    legend: { 
    	position: 'none',
    },
}
});







/////////////////////////////////////
/*
|-------------------------------
|		Donut Chart Selected Asset Recommended
|-------------------------------
*/
var ctx = document.getElementById("DonutChartSelectedAssetRecommended");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
    	'Cash and Equivalent', 
    	'Equities', 
    	'Fix income', 
    	'Alternative investments',
    	
    ],
    datasets: [{
		label: [
			'Cash and Equivalent', 
	    	'Equities', 
	    	'Fix income', 
	    	'Alternative investments',
	    	
		],
		// data: [20, 40, 51, 90, 20, 0, 10],
		data: [{!! implode(", ", $data['recommended'] ?? ['100']) !!}],
		backgroundColor: [
			'#3B83FF',
			'#F56565',
			'#FFE700',
			'#ED8936',
			
		],
		borderColor: [
			'#3B83FF',
			'#F56565',
			'#FFE700',
			'#ED8936',
			
		],
		borderWidth: 1
		}]
  },
  options: {
   	cutoutPercentage: 60,
    responsive: true,
    legend: { 
    	position: 'none',
    },
}
});







/////////////////////////////////////
/*
|-------------------------------
|		Financial Forecast
|-------------------------------
*/

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [{!! implode(", ", $data['graphAge']) !!}],
        datasets: [{
              type: 'line',
              label: 'Before Retirement',
               "fill": false,
               "lineTension": 0.1,
               "backgroundColor": [
                "#01630A"
                
               ],
               "borderColor": [
                "#01630A"
               ],
               "borderCapStyle": "butt",
               "borderDash": [],
               "borderDashOffset": 0,
               "borderJoinStyle": "miter",
               "pointBorderColor": [
                "#01630A"
               ],
               "pointBackgroundColor": "#ffffff00",
               "pointBorderWidth": 1,
               "pointHoverRadius": 5,
               "pointHoverBackgroundColor": "#01630A",
               "pointHoverBorderColor": "#01630A",
               "pointHoverBorderWidth": 2,
               "pointRadius": 1,
               "pointHitRadius": 10,
              data: [{!! implode(", ", $data['graphValueBegYear']) !!}]
            },{
            label: 'Contribution',
            data: [{!! implode(", ", $data['graphContribution']) !!}],
            backgroundColor: '#2CD9C5',
            borderColor: '#2CD9C5',
            borderWidth: 1
        	},{
          	type: 'line',
            backgroundColor: '#ff87a0',
            borderColor: '#ff87a0',
            data: [{!! implode(", ", $data['uncertain_top']) !!}],

            "lineTension": 0.1,
             "backgroundColor": [
              "#f0f0f0fa"
              
             ],
             "borderColor": [
              "#f0f0f0fa"
             ],
             "borderCapStyle": "butt",
             "borderDash": [],
             "borderDashOffset": 0,
             "borderJoinStyle": "miter",
             "pointBorderColor": [
              "#f0f0f0fa"
             ],
             "pointBackgroundColor": "#ffffff00",
             "pointBorderWidth": 1,
             "pointHoverRadius": 5,
             "pointHoverBackgroundColor": "#f0f0f0fa",
             "pointHoverBorderColor": "#f0f0f0fa",
             "pointHoverBorderWidth": 2,
             "pointRadius": 1,
             "pointHitRadius": 10,
            label: 'Maximum Uncertainty',
            fill: '+1'
          }, {
            type: 'line',
            backgroundColor: '#9966ff',
            borderColor: '#9966ff',
            data: [{!! implode(", ", $data['uncertain_bottom']) !!}],
            "fill": false,
             "lineTension": 0.1,
             "backgroundColor": [
              "#f0f0f0fa"
              
             ],
             "borderColor": [
              "#f0f0f0fa"
             ],
             "borderCapStyle": "butt",
             "borderDash": [],
             "borderDashOffset": 0,
             "borderJoinStyle": "miter",
             "pointBorderColor": [
              "#f0f0f0fa"
             ],
             "pointBackgroundColor": "#ffffff00",
             "pointBorderWidth": 1,
             "pointHoverRadius": 5,
             "pointHoverBackgroundColor": "#f0f0f0fa",
             "pointHoverBorderColor": "#f0f0f0fa",
             "pointHoverBorderWidth": 2,
             "pointRadius": 1,
             "pointHitRadius": 10,
            label: 'Minimum Uncertainty',
            fill: false
          }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
            position: "bottom"
        },
        scales: {
            yAxes: [{
                  display: true,
                  position: 'right',
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 20,
                    padding: 20,
                    // userCallback: function(value, index, values) {
                    //     value = value.toString();
                    //     if($(window).width() < 760)
                    //       return value;
                    //     else
                    //       return 'SAR ' + value;
                    // },
                    userCallback: function(tick, index, array) {
                      if($(window).width() < 760){
                        return (index % 3) ? "" : 'SAR ' + tick;
                      }
                      else{
                        return (index % 2) ? "" : 'SAR ' + (Math.round(tick * 100) / 100).toLocaleString();
                      }
                    }
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

            }],
            xAxes: [{
                gridLines: {
                    zeroLineColor: "transparent"
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    callback: function(tick, index, array) {
                      if($(window).width() < 760){
                        return (index % 3) ? "" : tick;
                      }
                      else{
                        return (index % 1) ? "" : tick;
                      }
                    }
                    
                }
            }]
        },
        plugins: {
          filler: {
            propagate: false
          },
          'samples-filler-analyser': {
            target: 'chart-analyser'
          }
        }
    }
    // options: {
    //     scales: {
    //         yAxes: [{
    //             ticks: {
    //                 beginAtZero: true
    //             }
    //         }]
    //     }
    // }
});
</script>

@endsection