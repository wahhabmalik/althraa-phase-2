@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_report')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/dashboard/css/print.css') }}">
@php 
	if($request->segment(1) == 'ar'){
		$direction = 'right';
		$direction_op = 'left';
	}
	else{
		$direction = 'left';
		$direction_op = 'right';
	}
@endphp
<style>
{!! ($request->segment(1) == 'ar') ? '.progressbar li:after{ right: -50%; }' : '' !!}
.financial-position tr td:first-child {
    text-align: {{ ($request->segment(1) == 'ar') ? 'right' : 'left' }};
}


.factor span:first-child {
    border-top-{{ $direction }}-radius: 10px;
    border-bottom-{{ $direction }}-radius: 10px;
}
.factor span:last-child {
    border-top-{{ $direction_op }}-radius: 10px;
    border-bottom-{{ $direction_op }}-radius: 10px;
}

.factor-s span:first-child {
    border-top-{{ $direction }}-radius: 10px;
    border-bottom-{{ $direction }}-radius: 10px;
}
.factor-vs span:first-child {
    border-top-{{ $direction }}-radius: 10px;
    border-bottom-{{ $direction }}-radius: 10px;
}
.factor-s span:last-child {
    border-top-{{ $direction_op }}-radius: 10px;
    border-bottom-{{ $direction_op }}-radius: 10px;
}
.factor-vs span:last-child {
    border-top-{{ $direction_op }}-radius: 10px;
    border-bottom-{{ $direction_op }}-radius: 10px;
}
.financial-position tr td {
    text-align: {{ $direction_op }};
}

#disclaimer{
	page-break-before: always;
}
#intro, #table_of_contents, #about_us, #personal_information, #personal_indicators, #asset_allocation, #financial_forecast{
	page-break-after: always;
}
.highlight{
  background-color: #000000 !important;
    color: #fff !important;
    font-family: 'Cairo', sans-serif;
}

</style>


@endsection

@section('content')
{{-- {{ dd($data) }} --}}
<div id="HTMLtoPDF" class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} " >
	
	@php 
	$pointer = '<img src="' . asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') . '"><br><p>'.trans('lang.you').'</p>';
	@endphp

	<div id="intro" class="container-fluid mb-5 background_effect " >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-8">
				<br><br><br><br><br>
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">{{ trans('lang.report.PERSONAL_FINANCIAL_PLAN') }}</h1>
	            <h1 class="user-main mt-3">{{ $data['personalInfo']['name'] }}</h1>
			</div>
		</div>

		<br><br><br><br><br>
		<br><br><br><br><br>
		
		
		<div class="row mt-5">
			<div class="col-1"></div>
			<div class="col-10">
				<img
                  class="img img-responsive image-main"
                  src="
                    {{ asset('frontend_assets/img/banner/home_banner_1.svg') }}"
                  alt="Banner image"
                />
			</div>
		</div>

		<br><br><br><br><br><br>
		
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
		
	</div>




	{{-- Page 2 start --}}


	<div id="table_of_contents" class="container-fluid mb-5 parent-report" >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-8">
				<br><br><br><br><br>
				
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">{{ trans('lang.report.TABLE_OF_CONTENTS') }}</h1>
			</div>
		</div>

		<br><br><br><br><br>
		
		<div class="row mt-5">
			<div class="col-1"></div>
			<div class="col-9 tb-content">
				<P>{{ trans('lang.report.about_thokhor') }}</P>
				<P>{{ trans('lang.report.financial_health_checkup') }}</P>
				<P>{{ trans('lang.report.personal_indicators') }}</P>
				<P>{{ trans('lang.report.asset_allocation') }}</P>
				<P>{{ trans('lang.report.financil_forcast') }}</P>
				<P>{{ trans('lang.report.investing_plan') }}</P>
			</div>

			<div class="col-1 tb-content">
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


	<div id="about_us" class="container-fluid mb-5 parent-report" >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main">{!! trans('lang.report.thank_you_for') !!}</h1>
	            <br>
	            <p class="text-primary">{{ trans('lang.report.we_hope') }}</p>
			</div>
		</div>

		<br><br>
		
		<div class="row mt-5">
			<div class="col-1"></div>
			<div class="col-5">
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
			<div class="col-5">
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

			
			
		</div>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>




	{{-- page 4 start --}}

	<div id="personal_information" class="container-fluid mb-5 parent-report" >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<h2 class="mt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            
	            <h1 class="heading-secondary">{{ trans('lang.report.financial_health_checkup') }}</h1>

	            <p class="text-secondary mt-2">{{ trans('lang.report.personal_information') }}</p>
	            
			</div>
		</div>

		
		
		<div class="row mt-1 personal-info">
			<div class="col-1"></div>
			
			<div class="col-3">
				<p>{{ trans('lang.report.name') }}</p>
				<b>{{ $data['personalInfo']['name'] }}</b>
			</div>
			
			<div class="col-3">
				<p>{{ trans('lang.report.education') }}</p>
				<b>{{ $data['personalInfo']['education_level'] }}</b>
			</div>
			
			<div class="col-2">
				<p>{{ trans('lang.report.current_age') }}</p>
				<b>{{ $data['personalInfo']['years_old'] }}</b>
			</div>
			
			<div class="col-3">
				<p>{{ trans('lang.report.planned_retirement_age') }}</p>
				<b>{{ $data['personalInfo']['retirement_age'] }}</b>
			</div>
			
			<br><br>
			
			
		</div>

		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<p class="text-secondary mt-3">{{ trans('lang.report.financial_position_today') }}</p>
				
			</div>
		</div>
		<div class="row financial-position">
			<div class="col-1"></div>
			<div class="col-5">
				<table>
					<tr>
						<td>{{ trans('lang.report.monthly_income_today') }}</td>
						<td>{{ currency($data['monthlyIncomeToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.gosi_ppa_monthly_subscription') }}</td>
						<td>{{ currency($data['gosi_or_ppa_monthlySubscription'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.monthly_saving_plan_for_reitirement') }}</td>
						<td>{{ currency($data['monthlySavingPlanForRetirement'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.monthly_saving_percentage_today') }}</td>
						<td>{{ percentage($data['monthlySavingPercentageToday'] ?? 0) }}</td>
					</tr>
					
				</table>
			</div>
			<div class="col-5">
				<table>
					<tr>
						<td>{{ trans('lang.report.total_assets_today') }}</td>
						<td>{{ currency($data['totalAssetsToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.total_liabilities_today') }}</td>
						<td>{{ currency($data['totalLiabilitiesToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.net_worth') }}</td>
						<td>{{ currency($data['netWorthToday'] ?? 0) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.accomulative_saving_today') }}</td>
						<td>{{ currency($data['accomulativeSavingtoday'] ?? 0) }}</td>
					</tr>
					
				</table>
			</div>
			<div class="col-1"></div>
		</div>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<p class="text-secondary mt-5">{{ trans('lang.report.current_asset_allocation') }}</p>
				<div class="row mb-5">
					
						<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>
						<div class="col-lg-4 col-md-4 col-4 col-sm-4 col-12 text-center">
							<canvas id="DonutChartSelectedAsset" width="100" height="100"></canvas>
						    <!--graph inner-->
						    <br>
						    <p class="text-center inner_price donut_inner">
						    	{{ currency($data['totalCurrentAssetAllocation'] ?? 0) }} 
						    </p>
						    <p class="text-center donut_inner">
						    	{{ percentage($data['totalCurrentAssetAllocationPercentage'] ?? 0) }}
						    </p>
						    

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
											<p>{{ trans('lang.report.cash_and_equivalent') }}</p>
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
											<p>{{ trans('lang.report.equities') }}</p>
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
											<p>{{ trans('lang.report.fix_income') }}</p>
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
											<p>{{ trans('lang.report.alternative_investment') }}</p>
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
											<p>{{ trans('lang.report.total') }}</p>
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
		<br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>



	{{-- Page 5 start --}}


	<div id="personal_indicators" class="container-fluid mb-5 parent-report" >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				{{-- <br><br><br><br><br> --}}
				<h2 class="mt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main">{{ trans('lang.report.personal_indicators') }}</h1>
	            
			</div>
		</div>

		
		<div class="row mt-3">
			<div class="col-1"></div>
			<div class="col-8">
				<p class="text-secondary mt-5">{{ trans('lang.report.monthly_saving_rate') }}</p>
				
				<div class="factor">
					<p>{{ trans('lang.report.little_saver') }}</p>	
					<p>{{ trans('lang.report.good_saver') }}</p>	
					<p>{{ trans('lang.report.great_saver') }}</p>	
					<p>{{ trans('lang.report.rich_saver') }}</p>	
					<p>{{ trans('lang.report.wealthy_saver') }}</p>	
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

			<div class="col-2">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/002-calendar@2x.png') }}" class="factor-icon">
			</div>
		</div>


		<div class="row mt-3">
			<div class="col-1"></div>
			<div class="col-8">
				<p class="text-secondary mt-5">{{ trans('lang.report.current_saving_amount') }} {{ '- '.$data['personalInfo']['years_old']. trans('lang.report.year') }}</p>
				{{-- {!! ($request->segment(1) == 'ar') ? ')' : '(' !!} --}}
				
				<div class="factor-vs">
					<p>{{ trans('lang.report.poor_saver') }}</p>	
					<p>{{ trans('lang.report.fair_saver') }}</p>	
					<p>{{ trans('lang.report.good_saver') }}</p>	
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

			<div class="col-2">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/001-safebox@2x.png') }}" class="factor-icon">
			</div>
		</div>


		<div class="row mt-3">
			<div class="col-1"></div>
			<div class="col-8">
				<p class="text-secondary mt-5">{{ trans('lang.report.early_retirement_possibility') }}</p>
				
				<div class="factor">
					<p>{{ trans('lang.report.poor') }}</p>	
					<p>{{ trans('lang.report.fair') }}</p>	
					<p>{{ trans('lang.report.healthy') }}</p>	
					<p>{{ trans('lang.report.very_healthy') }}</p>	
					<p>{{ trans('lang.report.early_retire_person') }}</p>	
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

			<div class="col-2">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/003-beach@2x.png') }}" class="factor-icon">
			</div>
		</div>


		<div class="row mt-3">
			<div class="col-1"></div>
			<div class="col-8">
				<p class="text-secondary mt-5">{{ trans('lang.report.investing_diversity') }}</p>
				
				<div class="factor-s">
					<p>{{ trans('lang.report.poor') }}</p>	
					<p>{{ trans('lang.report.fair') }}</p>	
					<p>{{ trans('lang.report.good') }}</p>	
					<p>{{ trans('lang.report.great') }}</p>
					
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

			<div class="col-2">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/004-profits@2x.png') }}" class="factor-icon">
			</div>
		</div>

		<br><br><br><br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>





	{{-- Page 6 start --}}


	<div id="asset_allocation" class="container-fluid mb-5 parent-report" >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<h2 class="mt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <h1 class="heading-main mt-2">{{ trans('lang.report.asset_allocation') }}</h1>
	            
			</div>
		</div>

		
		
		<div class="row mt-5">
			<div class="col-1"></div>
			<div class="col-9">
				<p class="text-secondary mt-5">{{ trans('lang.report.risk_test_index') }}</p>
				
				<div class="factor">
					<p>{{ trans('lang.report.very_conservative') }}</p>	
					<p>{{ trans('lang.report.conservative') }}</p>	
					<p>{{ trans('lang.report.natural') }}</p>	
					<p>{{ trans('lang.report.agressive') }}</p>	
					<p>{{ trans('lang.report.very_agressive') }}</p>	
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

		<br>

		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<p class="text-secondary mt-5">{{ trans('lang.report.recommended_assets_allocation') }}</p>
				<div class="row mb-5">
					
						<div class="col-lg-3 col-md-3 col-3 col-3"></div>
						<div class="col-lg-4 col-md-4 col-4 col-4 text-center">
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
											<p>{{ trans('lang.report.cash_and_equivalent') }}</p>
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
											<p>{{ trans('lang.report.equities') }}</p>
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
											<p>{{ trans('lang.report.fix_income') }}</p>
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
											<p>{{ trans('lang.report.alternative_investment') }}</p>
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
											<p>{{ trans('lang.report.total') }}</p>
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
		

		<br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>





	{{-- Page 7 start --}}


	<div id="financial_forecast" class="container-fluid mb-5 parent-report" >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<h2 class="mt-5 mb-2">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <p class="text-secondary mt-5">{{ trans('lang.report.financial_forecast') }}</p>
	            <p class="alertBox__p">
	              <span>{{ trans('lang.financial_plan.congratulations') }}</span>&nbsp;{{ trans('lang.current_state.at_age') }} {{ $data['retirement_age'] }} {{ trans('lang.current_state.you_will_have_savings_balance_of') }} <span>{{ currency($data['plan'][$data['retirement_age']]['value_end_year']) }}</span>
	            </p>
			</div>
		</div>

		<br><br>

		<div class="row">
			<div class="col-1"></div>
			<div class="col-lg-6 col-md-10 col-sm-10 col-10" >
				
				<canvas id="myChart" ></canvas>
				
			</div>
		</div>


		

		{{-- <br><br><br><br><br> --}}

		<div class="row financial-position">
			<div class="col-1"></div>
			<div class="col-5">
				<p class="text-secondary mt-5">{{ trans('lang.report.assumptions') }}</p>
				<table>
					<tr>
						<td>{{ trans('lang.report.current_age') }}</td>
						<td>{{ $data['personalInfo']['years_old'] }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.planned_retirement_age') }}</td>
						<td>{{ $data['retirement_age'] }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.monthly_saving_plan') }}</td>
						<td>{{ currency($data['monthlySavingPlanForRetirement']) }} {{ trans('lang.report.per_month') }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.monthly_saving_today') }}</td>
						<td>
						{!! ($request->segment(1) == 'ar') ? trans('lang.report.of_monthly_income') . percentage($data['monthlySavingPercentageToday']) : percentage($data['monthlySavingPercentageToday']) . trans('lang.report.of_monthly_income') !!}
					</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.accumulative_saving_today') }}</td>
						<td>{{ currency($data['accomulativeSavingtoday']) }}</td>
					</tr>
					
				</table>
			</div>
			<div class="col-5">
				<p class="text-secondary mt-4">{{ trans('lang.report.returns_assumptions') }}</p>
				<table>
					<tr>
						<td>{{ trans('lang.report.cash_and_equivalent') }}</td>
						<td>{{ percentage($data['returnAssumptions']['cash_and_equivlent']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.equities') }}</td>
						<td>{{ percentage($data['returnAssumptions']['equities']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.fix_income') }}</td>
						<td>{{ percentage($data['returnAssumptions']['fix_income']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.alternative_investment') }}</td>
						<td>{{ percentage($data['returnAssumptions']['alternative_investments']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.net_return_before_reitement') }}</td>
						<td>{{ percentage($data['netReturnBeforeRetirement']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.net_return_after_reitement') }}</td>
						<td>{{ percentage($data['netReturnAfterRetirement']) }}</td>
					</tr>
					
				</table>
			</div>
			
		</div>

		<div class="row financial-position">
			<div class="col-1"></div>
			<div class="col-10">
				<p class="text-secondary mt-5">{{ trans('lang.report.income_and_wealth_at_retirement') }}</p>
				<table>
					{{-- <tr>
						<td>Status at retirement</td>
						<td>Based on assets allocation</td>
					</tr> --}}
					<tr>
						<td>{{ trans('lang.report.retirement_plan_value_at') }} {{ $data['retirement_age'] }} {{ trans('lang.report.years_old') }}</td>
						<td>{{ currency($data['plan'][$data['retirement_age']]['value_end_year']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.total_monthly_income') }}</td>
						<td>{{ currency($data['totalMonthlyIncome']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.income_from_retirement_plan') }}</td>
						<td>{{ currency($data['monthlySalary']) }}</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.income_from_GOSI_or_PPA') }}</td>
						<td>{{ currency($data['retirementGOCIMonthlyIncome']) }}</td>
					</tr>
					
				</table>
			</div>
			
		</div>
		<br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p>
	</div>



	{{-- Page 7 with table start --}}


	<div id="table-break"  class="container-fluid mb-5 parent-report" >
		
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				{{-- <br><br><br><br><br> --}}
				<h2 class="mt-1 mb-2">
	                {{ 'thokhor' }}
	            </h2>
	            <h1 class="text-secondary">{{ trans('lang.financial_plan.working_years_accumulation_phase') }}</h1>
	            
			</div>
		</div>

		<div class="row" >
			<div class="col-md-1"></div>
		    <div class="col-md-10">
		    	

		      	<div class="table-responsive">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th class="btm_table">{{ trans('lang.financial_plan.year') }} #</th>
							<th class="btm_table">{{ trans('lang.financial_plan.age') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.value_beginning_year') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.contributions') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.returns') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.value_end_year') }}</th>
						  </tr>
						</thead>
						<tbody>
						  @isset ($data['plan'])
						  @php $count = 0; @endphp
						      @forelse ($data['plan'] as $key => $pl)
						        <tr {{ ($pl['age'] == $data['retirement_age']) ? 'class=highlight' : '' }}  >
						          <td class="btm_table_td">
						            {{ ++$count ?? '' }}
						          </td>
						          <td class="btm_table_td">
						            {{ $pl['age'] ?? '' }}
						          </td>
						          <td class="btm_table_td">
						            {{ currency($pl['value_beginning_of_year']) ?? '' }}
						          </td>
						          <td class="btm_table_td">
						            {{ currency($pl['contribution']) ?? '' }}
						          </td>
						          <td class="btm_table_td">
						            {{ currency($pl['returns']) ?? '' }}
						          </td>
						          <td class="btm_table_td">
						            {{ currency($pl['value_end_year']) ?? '' }}
						          </td>
						        </tr>
						        @if($pl['age'] == 65)
						        	@break
						        @endif
						        @if($count == 30)
						        	@break
						        @endif
						      @empty
						        <tr>
						          <td colspan="6" class="btm_table_td">No Data Found</td>
						        </tr>
						      @endforelse
						  @endisset
						</tbody>
					</table>
		      	</div>
		    </div>
		</div>

		{{-- <br><br><br>
		<p class="text-center mr-5">{{ $data['credits'] }}</p> --}}
	</div>




	<div id="disclaimer" class="container-fluid parent-report" >
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				{{-- <br><br><br><br><br> --}}
				<h2 class="mt-5 mb-2">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            
	            <h1 class="heading-main text-center">{{ trans('lang.disclaimer') }}</h1>
	            
			</div>
		</div>


		@if($request->segment(1) == 'en')
			<div class="row mt-2">
				<div class="col-1"></div>
				<div class="col-10 ">

					<h1>{{ trans('lang.frontend_legal.about_our_services') }}</h1>
	            	<p>{{ trans('lang.frontend_legal.about_our_services_text') }}</p>
	            	<br>


		            <h1>{{ trans('lang.frontend_legal.purpose') }}</h1>
		            <p>{{ trans('lang.frontend_legal.purpose_text') }}</p>
		            <br>

		            <h1>{{ trans('lang.frontend_legal.stake_and_responsabilities') }}</h1>
	                <p>{{ trans('lang.frontend_legal.stake_and_responsabilities_text_1') }}</p>
	                
	                <p>{{ trans('lang.frontend_legal.stake_and_responsabilities_text_2') }}</p>
	                

				</div>
			</div>
		@else
			<div class="row mt-2">
					<div class="col-1"></div>
					<div class="col-10 ">
						<br><br><br>
						<br><br><br>
						<p>{{ trans('lang.pdf_disclaimer') }}</p>
					</div>
			</div>
		@endif

		<br><br><br>
		<br><br><br>
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
			// window.print();
			// $("br").remove();
			// $("body").remove();
			// window.close();
			// window.top.close();
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
  	aspectRatio: 1,
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
        maintainAspectRatio: true,
        legend: {
            position: "bottom"
        },
        legend: {
	        display: false
	    },
	    tooltips: {
	        callbacks: {
	           label: function(tooltipItem) {
	           		if($(window).width() < 760){
                        return tooltipItem.yLabel;
                    }
                    else{
                    }
                      
	           }
	        }
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
                        return (index % 3) ? "" : tick;
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
        responsive: true,
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

<script type="text/javascript">
	function addScript(url) {
    var script = document.createElement('script');
    script.type = 'application/javascript';
    script.src = url;
    document.head.appendChild(script);
}
addScript('{{ asset('backend_assets/dashboard/js/print.js') }}');

$(document).ready(function(){
	setTimeout(
		function() {
			html2pdf(document.body).set({
			  pagebreak: { mode: 'avoid-all' , before: '#table-break', }
			});

			// $('#myChart').addClass('myChart_responsive');
		},
	3000);
});

</script>

@endsection