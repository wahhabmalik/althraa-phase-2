@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_report')

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
<div id="HTMLtoPDF" class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} " >
	
@php 
	$pointer = '<img src="' . asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') . '"><br><p>You</p>';
@endphp
	
	
	<div id="parent-report" class="container-fluid mb-5 background_effect " >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<br><br><br><br><br>
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                thokhor
	                
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">PERSONAL FINANCIAL PLAN</h1>
	            <h1 class="user-main mt-3">Abdullah Dawood</h1>
			</div>
		</div>

		<br><br><br><br><br>
		<br><br><br><br><br>
		
		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<img
                  class="img img-responsive image-main"
                  src="{{ asset('frontend_assets/img/banner/home_banner_1.svg') }}"
                  alt="Banner image"
                />
			</div>
		</div>

		<br><br><br><br><br><br>
		
		<p class="text-center mr-5">Thokhor.com</p>
		
	</div>






	


	<div id="parent-report" class="container-fluid mb-5" >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<br><br><br><br><br>
				
				<h2 class="mt-5 pt-5 mb-4">
	                thokhor
	                
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
		
		
		<p class="text-center mr-5">Thokhor.com</p>
	</div>






	


	<div id="parent-report" class="container-fluid mb-5" >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                thokhor
	                
	            </h2>
	            <br><br>
	            <h1 class="heading-main">Thank you for <br> being our customer. </h1>
	            <p class="text-primary">We hope you stick with the plan you got and accomplish your financial goals! </p>
			</div>
		</div>

		<br><br>
		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<img class="img img-fluid img-left" src="http://127.0.0.1:8000/frontend_assets/img/banner/undraw_winners.png">

				<h1 class="page-heading invst_plan mt-5 pt-3">
                        Mission
                </h1>
                <p class="mt-4 mb-5">
                    Our mission is to be an automated financial advisor for individuals who makes this equation:
                </p>
                <ul>
                    <li><p><i class="fa fa-check-circle"></i>&nbspEasy without abstinence.</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbspOperation and immediate application.</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbspDiscreet far from randomness.</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbspConvenient for personal need.</p></li>
                    
                </ul>

			</div>
			<div class="col-sm-5">
				<img class="img img-fluid img-right" src="http://127.0.0.1:8000/frontend_assets/img/banner/undraw_business.png">

				<h1 class="page-heading invst_plan mt-5 pt-3">
                        Method
                </h1>
                <p class="mt-4 mb-5">
                    The investment methodology is the long-term investment methodology that relies on:
                </p>
                <ul>
                    <li><p><i class="fa fa-check-circle"></i>&nbspSaving first.</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbspPrudent long-term methodology.</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbspThe magic of cumulative returns.</p></li>
                    
                </ul>
			</div>

			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			
		</div>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br>
		<p class="text-center mr-5">Thokhor.com</p>
	</div>






	

	<div id="parent-report" class="container-fluid mb-5" >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<h2 class="mt-5 pt-5 mb-4">
	                thokhor
	                
	            </h2>
	            
	            <h1 class="heading-secondary">Financial Health Check Up</h1>

	            <p class="text-secondary mt-2">Personal Information</p>
	            
			</div>
		</div>

		
		
		<div class="row mt-1 personal-info">
			<div class="col-sm-1"></div>
			
			<div class="col-sm-3">
				<p>Name</p>
				<b>Abdullah Dawood</b>
			</div>
			
			<div class="col-sm-3">
				<p>Education</p>
				<b>Master</b>
			</div>
			
			<div class="col-sm-2">
				<p>Current age</p>
				<b>36</b>
			</div>
			
			<div class="col-sm-3">
				<p>Planned retirement age</p>
				<b>65</b>
			</div>
			
			<br><br>
			
			
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
						<td>SAR 14,000</td>
					</tr>
					<tr>
						<td>GOSI/PPA monthly subscription</td>
						<td>SAR 1,400</td>
					</tr>
					<tr>
						<td>Monthly saving plan for retirement</td>
						<td>SAR 200</td>
					</tr>
					<tr>
						<td>Monthly saving % today</td>
						<td>11 %</td>
					</tr>
					
				</table>
			</div>
			<div class="col-sm-5">
				<table>
					<tr>
						<td>Total assets today</td>
						<td>SAR 2,240,000</td>
					</tr>
					<tr>
						<td>Total liabilities today</td>
						<td>SAR 200</td>
					</tr>
					<tr>
						<td>Net worth</td>
						<td>SAR 2,239,800</td>
					</tr>
					<tr>
						<td>Accomulative saving today</td>
						<td>SAR 2,000,000</td>
					</tr>
					
				</table>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">Current Asset Allocation</p>
				<div class="row mb-5">
					
						<div class="col-lg-4 col-md-4 col-sm-4 col-4"></div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
							<canvas id="DonutChartSelectedAsset" width="100" height="100"></canvas>
						    <!--graph inner-->
						    <br>
						    <p class="text-center inner_price donut_inner">
						    	SAR 2,240,000 
						    </p>
						    <p class="text-center donut_inner">
						    	100 %
						    </p>
						    <br>

						    
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
												89 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 2,000,000
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
												4 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 100,000 
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
												4 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 100,000 
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
												2 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 40,000 
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
												SAR 2,240,000 
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





	


	<div id="parent-report" class="container-fluid mb-5" >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				
				<h2 class="mt-5 pt-5 mb-4">
	                thokhor
	                
	            </h2>
	            <br><br>
	            <h1 class="heading-main">Personal Indicators</h1>
	            
			</div>
		</div>

		
		<div class="row mt-3">
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
						
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}"><br><p>You</p>
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						
					</div>
				</div>

			</div>

			<div class="col-sm-2">
				<img src="http://127.0.0.1:8000/backend_assets/dashboard/images/pdf_icons/002-calendar@2x.png" class="factor-icon">
			</div>
		</div>


		<div class="row mt-3">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<p class="text-secondary mt-5">Current Saving Amount (36 Year)</p>
				
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
						
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}"><br><p>You</p>
					</div>
					<div class="pointer">
						
					</div>
					
				</div>

			</div>

			<div class="col-sm-2">
				<img src="http://127.0.0.1:8000/backend_assets/dashboard/images/pdf_icons/001-safebox@2x.png" class="factor-icon">
			</div>
		</div>


		<div class="row mt-3">
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
						
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}"><br><p>You</p>
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						
					</div>
				</div>

			</div>

			<div class="col-sm-2">
				<img src="http://127.0.0.1:8000/backend_assets/dashboard/images/pdf_icons/003-beach@2x.png" class="factor-icon">
			</div>
		</div>


		<div class="row mt-3">
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
						
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}"><br><p>You</p>
					</div>
					
				</div>

			</div>

			<div class="col-sm-2">
				<img src="http://127.0.0.1:8000/backend_assets/dashboard/images/pdf_icons/004-profits@2x.png" class="factor-icon">
			</div>
		</div>

		<br><br><br><br><br>
		<p class="text-center mr-5">Thokhor.com</p>
	</div>







	


	<div id="parent-report" class="container-fluid mb-5" >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<h2 class="mt-5 pt-5 mb-4">
	                thokhor
	                
	            </h2>
	            <br><br>
	            <h1 class="heading-main">Asset Allocation</h1>
	            
			</div>
		</div>

		
		
		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-9">
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
						
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						<img src="{{ asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') }}"><br><p>You</p>
					</div>
					<div class="pointer">
						
					</div>
					<div class="pointer">
						
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
						    	2240000 
						    </p>
						    <p class="text-center donut_inner">
						    	100 %
						    </p>
						    <br>

						    
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
												15 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 336,000
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
												45 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 1,008,000 
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
												25 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 560,000
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
												15 %
											</p>
										</td>
										<td>
											<p class="text_black text-left">
												SAR 336,000
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
												SAR 2,240,000 
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
		<p class="text-center mr-5">Thokhor.com</p>
	</div>







	


	<div id="parent-report" class="container-fluid mb-5" >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				
				<h2 class="mt-5 pt-5 mb-2">
	                thokhor
	                
	            </h2>
	            <p class="text-secondary mt-5">Financial Forecast</p>
	            <p class="alertBox__p">
	              <span>👏Congratulations!</span>&nbsp;At age 65 you will have
	              savings balance of SAR 19,769,869.
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

		

		

		

		<div class="row financial-position">
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<p class="text-secondary mt-5">Assumptions</p>
				<table>
					<tr>
						<td>Current age</td>
						<td>36</td>
					</tr>
					<tr>
						<td>Planned retirement age</td>
						<td>65</td>
					</tr>
					<tr>
						<td>Monthly saving plan</td>
						<td>SAR 200 /Month</td>
					</tr>
					<tr>
						<td>Monthly saving today</td>
						<td>11 % of Monthly Income</td>
					</tr>
					<tr>
						<td>Accumulative saving today</td>
						<td>SAR 2,000,000</td>
					</tr>
					
				</table>
			</div>
			<div class="col-sm-5">
				<p class="text-secondary mt-5">Returns Assumptions</p>
				<table>
					<tr>
						<td>Cash and Quivlent</td>
						<td>2 %</td>
					</tr>
					<tr>
						<td>Equities</td>
						<td>10 %</td>
					</tr>
					<tr>
						<td>Fix Income</td>
						<td>5 %</td>
					</tr>
					<tr>
						<td>Alternative Investments</td>
						<td>12 %</td>
					</tr>
					<tr>
						<td>Net Return/Year (Before retirement)</td>
						<td>8 %</td>
					</tr>
					<tr>
						<td>Net Return/Year (After retirement)</td>
						<td>4 %</td>
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
						<td>Retirement plan value at 65 years old</td>
						<td>SAR 19,769,869</td>
					</tr>
					<tr>
						<td>Total monthly income</td>
						<td>SAR 102,150</td>
					</tr>
					<tr>
						<td>Income from retirement plan</td>
						<td>SAR 65,900</td>
					</tr>
					<tr>
						<td>Income from GOSI or PPA</td>
						<td>SAR 36,250</td>
					</tr>
					
				</table>
			</div>
			
		</div>
		<br><br><br>
		<p class="text-center mr-5">Thokhor.com</p>
	</div>







	


	






	


	<div id="parent-report" class="container-fluid mb-5" >
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				
				<h2 class="mt-5 pt-5 mb-4">
	                thokhor
	                
	            </h2>
	            <br><br>
	            <h1 class="heading-main text-center">Disclaimer</h1>
	            
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-sm-1"></div>
			<div class="col-sm-10 text-right pt-3">
				<p>عقوم رخد وا نیمئاقلا ىلع لا مدقی ةیأ تارارقإ وأ تانامض ةحیرص( وأ )ةینمض نأشب تانایبلا تامولعملاو ،ةمدقملا مغرلابو نم ةیقوثوم رداصم تامولعملا ةیانعلاو ةلوقعملا يف تانایبلا لاا ھنأ لا رقی نأب تامولعملا يتلا اھنمضتی اذھ عقوملا وا ئاثو ھق يھ تامولعم ةلماك وأ ةیلاخ نم يأ أطخ وأ ریغ ةللضم وأ اھنأ حلصت ىلإ ضرغ ددحم امك نا عقوم رخد و نیمئاقلا ھیلع نولخی مھتیلوؤسم نع يأ عون نم عاونأ تانامضلا ةقلعتملا قیقحتب ةجیتن حبر ،ةنیعم سوا ًء تناك ةحیرص وأ ةینمض . لاف ةقیثو وا تامولعملا يف اذھ عقوملا امنإ مدقت تامولعم ةماع طقف . امك ھنأ تامولعملا يأو ً وأ ةوعد میدقتل ضرع يأر دراو يف اذھ عقوملا وأ يا ةقیثو ھنم لا لكشت عرضا ءارشل وأ عیب يأ قاروأ ةیلام وأ اھریغ نم تاجتنملا ةیرامثتسلاا تاذ ةلصلا كلتب قارولأا ةیلاملا وأ تارامثتسلاا . سیلو ضرغلا نم هذھ عقوملا وأ ھقئاثو میدقت ةروشم ةیصخش يف لاجم رامثتسلإا امك اھنأ لا ذخأت يف رابتعلإا فادھلأا ةیرامثتسلإا وأ عضولا يلاملا وأ تاجایتحلإا ةددحملا يلأ صخش نیعم دق ملتسی هذھ ،ةقیثولا يغبنیو نیرمثتسملل يعسلا لوصحلل ىلع ةروشملا ةیلاملا وأ ةینوناقلا وأ ةیبیرضلا نم ش ةكر ةیلام ةصخرم نم ةئیھ قوسلا ةیلاملا وا تاھجلا ةیموكحلا تاذ ةقلاعلا نأشب ىدم ةمئلام رامثتسلإا يف يأ قاروأ ةیلام ، وأ رامثتسا رخآ وأ ةیأ تایجیتارتسا رامثتسا ترج اھتشقانم وأ ةیصوتلا اھب يف اذھ عقوملا وا قئاثولا ةرداصلا ھنع ، يغبنیو ءلامعلل مھفت نأ تانایبلا ةقلعتملا تاعقوتلاب ةیلبقتسملا دراولا نم اذھ عقوملا دق لا ققحتت . كلذك يغبنی ءلامعلل ةظحلام نأ لخدلا نم قاروأ ةیلام نم اذھ عونلا وأ اھریغ نم تارامثتسلإا ، نإ دجو ، دق ضرعتی تابلقتلل نأبو رعس وأ ةمیق كلت قارولأا ةیلاملا تارامثتسلإاو نوكی ةضرع عافترلإل وأ ضافخنلإا . امك نأ تابلقتلا يف راعسأ فرصلا تلامعلل دق نوكی اھل راثآ ةیبلس ىلع ةمیقلا وأ نمثلا ، وأ لخدلا يتأتملا نم تارامثتسا ةنیعم . ءانبو ھیلع ، نكمی ءلامعلل نأ اولصحی ىلع دئاع وكی ن لقأ نم غلبم مھلامسأر رمثتسملا ابتدا ًء . زوجیو نأ نوكی عقوملل وأ نیلوئسملا ھیف ا امب يف كلذ نیللحملا نییلاملا ةحلصم ةیلام يف قارولأا ةیلاملا ةھجلل وأ تاھجلا ةردصملا كلتل قارولأا ةیلاملا وأ تارامثتسلإا تاذ ةقلاعلا ، امب يف كلذ زكارملا ةلیوط وأ ةریصق لجلأا يف قارولأا ةیلاملا وأ قیدانص رامثتسلاا ، وأ اھریغ نم تاودلأا ةیلاملا . امك زوجی عقوملل نأ موقی نم تقو رخلآ ءادأب تامدخلا ةیراشتسلاا ةیفاضلاا وأ يعسلا نیمأتل هذھ تامدخلا وأ اھریغ نم لامعلأا نم يأ ةكرش نم تاكرشلا ةروكذملا يف ریراقتلا وا قئاثولا ةرداصلا ھنم . عقوملاو وا نولوؤسملا ،ھیف امب يف كلذ نیفظوملا ةیعباتلا ،عقوملل لا نونوكی نیلوؤسم نع يأ رارضأ ةرشابم أو ریغ ةرشابم وأ يأ ةراسخ وأ رارضأ ىرخأ دق ،أشنت ةروصب ةرشابم وأ ریغ ،ةرشابم نم يأ مادختسا تامولعملل ةدراولا يف هذھ ةقیثولا وأ اھریغ نم قئاثولا ةرداصلا نم عقوملا ، عضختو تامولعملا ةرداصلا نم عقوملا ةیأو تایصوت ةدراو اھیف رییغتلل نود راعشإ قبسم . عقومو رخد لا لمحتی يأ ةیلوؤسم نع ثیدحت تامولعملا ةدراولا يف هذھ قئاثولا ةرداصلا ھنم . لاو زوجی رییغت وأ خاسنتسا وأ ً يأب لكش وأ يأب ةلیسو ً وأ جزئیا لاسرإ وأ عیزوت هذھ ةقیثولا نم قئاثو عقوملا كلیا تناك . امك ىعاری نأ هذھ قئاثولا تسیل ةھجوم وأ ةدعم عیزوتلل وأ مادختسلا نم لبق يأ صخش وأ نایك ءاوس ناك انطاوم وأ امیقم يف يأ ناكم وأ ةلود وأ دلب وأ ةیأ ھھج ةیئاضق ىرخأ ، امثیح نوكی لثم اذھ عیزوتلا وأ رشنلا وأ رفاوت وأ مادختسا قئاثولا ةرداصلا نم عقوملا افلاخم نوناقلل وأ بلطتی نم عقوملا وا نیمئاقلا ھیلع مایقلا يأب لیجست وأ ءافیتسا يأ طرش نم طورش صیخرتلا نمض كلذ دلبلا وأ ك</p>
			</div>
		</div>

		<br><br><br><br><br>
		<br><br><br><br><br>
		<p class="text-center mr-5">Thokhor.com</p>
	</div>

</div>


    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="http://127.0.0.1:8000/backend_assets/login/js/bootstrap.min.js"></script>
<script src="http://127.0.0.1:8000/backend_assets/login/js/script.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>




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
		data: [2000000, 100000, 100000, 40000],
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
		data: [15, 45, 25, 15],
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
        labels: [36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65],
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
              data: [2159494.2, 2331633.4047, 2517416.482469, 2717921.0246178, 2934309.540739, 3167836.1411602, 3419853.7447881, 3691821.8536282, 3985314.9385059, 4302031.4840149, 4643803.7444882, 5012608.2668575, 5410577.2406542, 5840010.7401363, 6303389.9286324, 6803391.3006951, 7342902.043598, 7925036.6061087, 8553154.5693809, 9230879.9222546, 9962121.8512878, 10751097.164507, 11602354.477208, 12520800.298221, 13511727.165911, 14580843.994929, 15734308.807349, 16978764.035485, 18321374.598368, 19769868.969742]
            },{
            label: 'Contribution',
            data: [2400, 2520, 2646, 2778.3, 2917.215, 3063.07575, 3216.2295375, 3377.041014375, 3545.8930650938, 3723.1877183484, 3909.3471042659, 4104.8144594792, 4310.0551824531, 4525.5579415758, 4751.8358386546, 4989.4276305873, 5238.8990121166, 5500.8439627225, 5775.8861608586, 6064.6804689015, 6367.9144923466, 6686.3102169639, 7020.6257278121, 7371.6570142028, 7740.2398649129, 8127.2518581585, 8533.6144510665, 8960.2951736198, 9408.3099323008, 9878.7254289158],
            backgroundColor: '#2CD9C5',
            borderColor: '#2CD9C5',
            borderWidth: 1
        	},{
          	type: 'line',
            backgroundColor: '#ff87a0',
            borderColor: '#ff87a0',
            data: [3023291.88, 3264286.76658, 3524383.0754565, 3805089.4344649, 4108033.3570346, 4434970.5976243, 4787795.2427034, 5168550.5950795, 5579440.9139083, 6022844.0776209, 6501325.2422835, 7017651.5736005, 7574808.1369159, 8176015.0361909, 8824745.9000853, 9524747.8209731, 10280062.861037, 11095051.248552, 11974416.397133, 12923231.891156, 13946970.591803, 15051536.03031, 16243296.268092, 17529120.41751, 18916418.032276, 20413181.5929, 22028032.330288, 23770269.649679, 25649924.437715, 27677816.557638],

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
            data: [1295696.52, 1398980.04282, 1510449.8894814, 1630752.6147707, 1760585.7244434, 1900701.6846961, 2051912.2468729, 2215093.1121769, 2391188.9631035, 2581218.8904089, 2786282.2466929, 3007564.9601145, 3246346.3443925, 3504006.4440818, 3782033.9571794, 4082034.7804171, 4405741.2261588, 4755021.9636652, 5131892.7416285, 5538527.9533528, 5977273.1107727, 6450658.2987041, 6961412.686325, 7512480.1789327, 8107036.2995466, 8748506.3969572, 9440585.2844093, 10187258.421291, 10992824.759021, 11861921.381845],
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
			html2pdf(document.body);
		},
	1000);
});
$(document).ready(function(){
	setTimeout(
		function() {
			$("body").remove();
			window.close();
			window.top.close();
		},
	12000);
});

</script>
  
    
    

</body>
</html>
