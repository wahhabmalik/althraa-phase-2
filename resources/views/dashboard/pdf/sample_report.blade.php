@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/dashboard/css/print.css') }}">
<style>
 

{!! ($request->segment(1) == 'ar') ? '.progressbar li:after{ right: -50%; }' : '' !!}


.factor .pointer:not(:last-child) {
    opacity: 0;
}
</style>
@endsection
@section('content')
<div class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} " >
	

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
	            <h1 class="user-main mt-3">Ali Alsheri</h1>

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

		<br><br><br><br><br><br><br>
		
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
		<br><br><br><br><br>
		
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
			<br><br><br><br><br>
			<br><br><br><br><br>
			
		</div>
	
	</div>









	{{-- page 4 start --}}

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
	            
	            <h1 class="heading-secondary">Financial Health Check Up</h1>

	            <p class="text-secondary mt-5">Personal Information</p>
	            
			</div>
		</div>

		
		
		<div class="row mt-1 personal-info">
			<div class="col-sm-1"></div>
			
			<div class="col-sm-3">
				<p>Name</p>
				<b>Waleed</b>
			</div>
			
			<div class="col-sm-3">
				<p>Education</p>
				<b>Master</b>
			</div>
			
			<div class="col-sm-2">
				<p>Current age</p>
				<b>36</b>
			</div>
			
			<div class="col-sm-2">
				<p>Planned retirement age</p>
				<b>60</b>
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
						<td>SAR 55,000</td>
					</tr>
					<tr>
						<td>GOSI/PPA monthly subscription</td>
						<td>SAR 5,000</td>
					</tr>
					<tr>
						<td>Monthly saving plan for retirement</td>
						<td>SAR 3,000</td>
					</tr>
					<tr>
						<td>Monthly saving % today</td>
						<td>15%</td>
					</tr>
					
				</table>
			</div>
			<div class="col-sm-5">
				<table>
					<tr>
						<td>Total assets today</td>
						<td>SAR 1,400,000</td>
					</tr>
					<tr>
						<td>Total liabilities today</td>
						<td>SAR 3,000</td>
					</tr>
					<tr>
						<td>Net worth</td>
						<td>SAR 1,390,000</td>
					</tr>
					<tr>
						<td>Accomulative saving today</td>
						<td>SAR 300,000</td>
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
						    	{{ $totalCAA ?? '20,000' }} SAR
						    </p>
						    <p class="text-center donut_inner">
						    	{{ round($totalCAAPercentage ?? 60, 2) ?? 0 }} %
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												100 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? '20,000' }} SAR
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
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
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
				<p class="text-secondary mt-5">Current Saving Amount (your age)</p>
				
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
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
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
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
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
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
				</div>

			</div>

			<div class="col-sm-1">
				<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/004-profits@2x.png') }}" class="factor-icon">
			</div>
		</div>

		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		
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
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}">
						<br><p>You</p>
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
						    	{{ $totalCAA ?? '20,000' }} SAR
						    </p>
						    <p class="text-center donut_inner">
						    	{{ round($totalCAAPercentage ?? 60, 2) ?? 0 }} %
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? 0 }} SAR
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
												100 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												{{ $total_cash ?? '20,000' }} SAR
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
	              <span>👏Congratulations!</span>&nbsp;At age 80 you will have
	              savings balance of SAR 1.296.043.
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
						<td>36 years</td>
					</tr>
					<tr>
						<td>Planned retirement age</td>
						<td>60 years</td>
					</tr>
					<tr>
						<td>Monthly saving plan</td>
						<td>5,000 SAR /Month</td>
					</tr>
					<tr>
						<td>Monthly saving today</td>
						<td>15% of Monthly Income</td>
					</tr>
					<tr>
						<td>Accumulative saving today</td>
						<td>300,000 SAR</td>
					</tr>
					
				</table>
			</div>
			<div class="col-sm-5">
				<p class="text-secondary mt-5">Returns Assumptions</p>
				<table>
					<tr>
						<td>Cash and Quivlent</td>
						<td>2%</td>
					</tr>
					<tr>
						<td>Equities</td>
						<td>10%</td>
					</tr>
					<tr>
						<td>Fix Income</td>
						<td>5%</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>12%</td>
					</tr>
					<tr>
						<td>Net Return/Year (Before retirement)</td>
						<td>10%</td>
					</tr>
					<tr>
						<td>Net Return/Year (After retirement)</td>
						<td>4%</td>
					</tr>
					
				</table>
			</div>
			
		</div>

		<div class="row financial-position">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Income and Wealth at Retirement</p>
				<table>
					<tr>
						<td>Status at retirement</td>
						<td>Based on assets allocation</td>
					</tr>
					<tr>
						<td>Retirement plan value at 60 years old</td>
						<td>if retire at 60 years old</td>
					</tr>
					<tr>
						<td>Total monthly income</td>
						<td>A+B</td>
					</tr>
					<tr>
						<td>Income from retirement plan</td>
						<td>A</td>
					</tr>
					<tr>
						<td>Income from GOSI or PPA</td>
						<td>B</td>
					</tr>
					
				</table>
			</div>
			
		</div>
		
	</div>







	{{-- Page 8 start --}}


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
						<td>Cash & Equivlent</td>
						<td>Cash & Equivlent</td>
						<td>Cash & Equivlent</td>
					</tr>
					<tr>
						<td>Equities</td>
						<td>Equities</td>
						<td>Equities</td>
						<td>Equities</td>
					</tr>
					<tr>
						<td>Fix Income</td>
						<td>Fix Income</td>
						<td>Fix Income</td>
						<td>Fix Income</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>Alternative Investments</td>
						<td>Alternative Investments</td>
						<td>Alternative Investments</td>
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
						<td>5%</td>
						<td>SAR 3,000</td>
					</tr>
					<tr>
						<td>Equities</td>
						<td>4 payment over one year</td>
						<td>1</td>
						<td>5%</td>
						<td>SAR 3,000</td>
					</tr>
					<tr>
						<td>Fix Income</td>
						<td>1 payment</td>
						<td>1</td>
						<td>5%</td>
						<td>SAR 3,000</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>Manual process</td>
						<td>1</td>
						<td>5%</td>
						<td>SAR 3,000</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>-</td>
						<td>1</td>
						<td>5%</td>
						<td>SAR 3,000</td>
					</tr>
					
					
				</table>
			</div>
			
		</div>
		

		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		
		
	</div>







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
		
		
	</div>

</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
{{-- jsPDF JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

<script type="text/javascript">

	var not_found = '{!! $not_found ?? '' !!}';
	if(not_found){
		$(document).ready(function () {
			$('#UserQuestionnaireNotFound').modal('show', {backdrop: 'static', keyboard: false});
		});
		$("a").removeAttr("href").css("cursor","not-allowed");
		$(".navbar-brand").attr("href", "{!! route('/', app()->getLocale()) !!}").css("cursor","pointer");
		$("#a_back").attr("href", "{!! url()->previous() !!}").css("cursor","pointer").css("color", "white");
	}


</script>

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
			// $("body").remove();
			// window.close();
			// window.top.close();
			// $("#parent-report").addClass('container');
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
    	'Cash & Equity', 
    	'Local Equity', 
    	'US Equity', 
    	'International Equity',
    	'Fix Income',
    	'Properties REIT',
    	'Direct Properties',
    ],
    datasets: [{
		label: [
			'Cash & Equity', 
	    	'Local Equity', 
	    	'US Equity', 
	    	'International Equity',
	    	'Fix Income',
	    	'Properties REIT',
	    	'Direct Properties',
		],
		// data: [20, 40, 51, 90, 20, 0, 10],
		data: [{!! implode(", ", $selectedAssetValueDataDonutChart ?? ['40','20','25', '15']) !!}],
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
    	'Cash & Equity', 
    	'Local Equity', 
    	'US Equity', 
    	'International Equity',
    	'Fix Income',
    	'Properties REIT',
    	'Direct Properties',
    ],
    datasets: [{
		label: [
			'Cash & Equity', 
	    	'Local Equity', 
	    	'US Equity', 
	    	'International Equity',
	    	'Fix Income',
	    	'Properties REIT',
	    	'Direct Properties',
		],
		// data: [20, 40, 51, 90, 20, 0, 10],
		data: [{!! implode(", ", $selectedAssetValueDataDonutChart ?? ['40','20','25', '15']) !!}],
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
        labels: [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69],
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
              data: [1911793.8682699, 2154137.5188068, 2421764.265619, 2716873.6245353, 3041846.378695, 3399259.2391133, 3791900.6828688, 4222788.0632635, 4695186.0938628, 5212626.8164761, 5778931.1719516, 6398232.3021699, 7075000.7218995, 7814071.5102742, 8620673.6836375, 9500461.9244462, 10459550.854903, 11504552.059091, 12642614.073689, 13881465.58495]
            },{
              type: 'line',
              label: 'Age Chart',
              "fill": false,
               "lineTension": 0.1,
               "backgroundColor": [
                "#FF460E"
                
               ],
               "borderColor": [
                "#FF460E"
               ],
               "borderCapStyle": "butt",
               "borderDash": [],
               "borderDashOffset": 0,
               "borderJoinStyle": "miter",
               "pointBorderColor": [
                "#FF460E"
               ],
               "pointBackgroundColor": "#ffffff00",
               "pointBorderWidth": 1,
               "pointHoverRadius": 5,
               "pointHoverBackgroundColor": "#FF460E",
               "pointHoverBorderColor": "#FF460E",
               "pointHoverBorderWidth": 2,
               "pointRadius": 1,
               "pointHitRadius": 10,
              data: [1911793.8682699, 2154137.5188068, 2421764.265619, 2716873.6245353, 3041846.378695, 3399259.2391133, 3791900.6828688, 4222788.0632635, 4695186.0938628, 5212626.8164761, 5778931.1719516, 6398232.3021699, 7075000.7218995, 7814071.5102742, 8620673.6836375, 9500461.9244462, 10459550.854903, 11504552.059091, 12642614.073689, 13881465.58495, 14463100.168489, 15072095.226493, 15709866.259414, 16377906.91389, 17077793.468002, 17811189.57954, 18579851.312873, 19385632.460963, 20230490.180019, 21116490.955359, 22045816.918156, 23020772.533885, 24043791.684577]
            },{
            label: 'Saving Withdrawls',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2439352.25, 2512532.51, 2587902.26, 2665542.42, 2745512.47, 2827872.13, 2912712.76, 3000092.04, 3090092.21, 3182802.68, 3278282.76, 3376632.58, 3477932.32],
            backgroundColor: '#2CD9C5',
            borderColor: '#2CD9C5',
            borderWidth: 1
        }, {
          type: 'line',
            backgroundColor: '#ff87a0',
            borderColor: '#ff87a0',
            data: [2102973.2550969, 2369551.2706875, 2663940.6921809, 2988560.9869889, 3346031.0165645, 3739185.1630247, 4171090.7511557, 4645066.8695899, 5164704.703249, 5733889.4981237, 6356824.2891468, 7038055.5323869, 7782500.7940895, 8595478.6613016, 9482741.0520013, 10450508.116891, 11505505.940393, 12655007.265001, 13906875.481058, 15269612.143445, 15909410.185337, 16579304.749142, 17280852.885355, 18015697.605279, 18785572.814803, 19592308.537494, 20437836.444161, 21324195.70706, 22253539.19802, 23228140.050895, 24250398.609971, 25322849.787273, 26448170.853034],

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
            data: [1720614.4814429, 1938723.7669262, 2179587.8390571, 2445186.2620818, 2737661.7408255, 3059333.315202, 3412710.6145819, 3800509.2569372, 4225667.4844765, 4691364.1348285, 5201038.0547565, 5758409.0719529, 6367500.6497096, 7032664.3592468, 7758606.3152738, 8550415.7320015, 9413595.7694127, 10354096.853182, 11378352.66632, 12493319.026455, 13016790.15164, 13564885.703843, 14138879.633472, 14740116.222501, 15370014.121202, 16030070.621586, 16721866.181586, 17447069.214867, 18207441.162017, 19004841.859823, 19841235.22634, 20718695.280496, 21639412.516119],
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
                        return (index % 2) ? "" : 'SAR ' + tick;
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