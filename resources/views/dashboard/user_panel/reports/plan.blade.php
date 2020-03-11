@extends('dashboard.layouts.user_layout.user_questionary')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<style>
.button {
     padding: .75rem 1.3rem !important; 
}

canvas{
  background:#fff;
  height:240px;
}

.total_graph span {
    font-size: 20px;
    font-family: Soin Sans Neue;
    color: #989898;
}

.graph_price{
	float: right;
	color: #000 !important;
}

.graph_inner {
    text-align: center;
    position: relative;
    top: -170px;
}
.graph_inner_caa {
    text-align: center;
    position: relative;
    top: -190px;
}
p.inner_price {
    font-size: 22px;
    color: #222222;
    margin-bottom: 0;
}
.table_color{
	height: 20px;
    width: 5px;
    border-radius: 5px;
}
tbody tr:nth-child(1) td {
    border-top: 0px;
}
.table td{
    padding-bottom: 0;
}
.suggested-plan {
    text-align: center;
    padding: 50px 10px;
    font-size: 24px;
    background: #F0F1F3;
    color: #bcbcbc;
    font-family: Soin Sans Neue;
    font-weight: bold;
}

.suggested {
    text-align: center;
    padding: 50px 10px !important;
    font-size: 24px;
    background: #F0F1F3;
    color: #bcbcbc;
    font-family: Soin Sans Neue;
    font-weight: bold;
    min-height: 160px;
  }


.suggested-plan:hover{
	background: #01630a;
    color: #fff;
}
.suggested-selected{
	background: #ffe700;
    color: #000;
}
.suggested-selected:hover{
	background: #ffe700;
    color: #000;
}
.s_plans:hover{
	text-decoration: none;
}
</style>
@endsection
@section('content')
<div class="container mt-5 mb-5">
{{-- <div class="content__body"> --}}
	<div class="row">
		<div class="col-sm-6">
			<h3 class="user__intro">Hello 
				@auth()
					{{ auth()->user()->name }}	
				@endauth
				!
			</h3>
			<p class="thanks_msg">thank you very much for using our service.😁</p>
			@if(auth()->user()->hasRole('admin'))
				<a class="button" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@else
				<a class="button" href="{{ route('plan_selection', app()->getLocale()) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@endif
		</div>
		<div class="col-sm-6">
			
		</div>
	</div>
	<div class="s-100"></div>

	<h3 class="user__intro text_grey">Assets Allocation</h3>
	
	<div class="s-20"></div>

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-sm-12 col-12">
			<h4 class="dashboard_text text_grey">Current</h4>
			<div class="row">
				<div class="col-lg-2 col-md-3 col-sm-2 col-3"></div>
				<div class="col-lg-8 col-md-6 col-sm-8 col-6">
					<canvas id="DonutChartCurrentAsset" width="400" height="400"></canvas>
				    <!--graph inner-->
				    <p class="graph_inner_caa inner_price">
				    	${{ $totalCAA ?? 0 }}
				    </p>
				    <p class="graph_inner_caa">
				    	{{ round($totalCAAPercentage, 2) ?? 0 }} %
				    </p>

				    {{-- <div class="s-50"></div> --}}
				</div>
				<div class="col-lg-2 col-md-3 col-sm-2 col-3"></div>
			</div>

			<div class="row mb-5">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
						  <tbody>
						    <tr>
						      <td><div class="table_color" style="background-color: #3B83FF;"></div></td>
						      <td><p>Cash and Desposits</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($cashAndDepositsCAAPercentage["percentage"], 2) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		${{ $cashAndDepositsCAA ?? 0 }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #4F2CFF;"></div></td>
						      <td><p>Local Equity</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($localEquityCAAPercentage["percentage"], 2) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		${{ $localEquityCAA ?? 0 }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FFE700;"></div></td>
						      <td><p>US (Govt) Equity</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($internationalEquityCAAPercentage["percentage"], 2) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		${{ $governmentBondsCAA ?? 0 }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #222222;"></div></td>
						      <td><p>International Equity</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($governmentBondsCAAPercentage["percentage"], 2) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		${{ $internationalEquityCAA ?? 0 }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #2CD9C5;"></div></td>
						      <td><p>Fix Income</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($corporateBondsCAAPercentage["percentage"], 2) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		${{ $corporateBondsCAA ?? 0 }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FF903B;"></div></td>
						      <td><p>Properties REIT</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($reitsCAAPercentage["percentage"], 2) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		${{ $reitsCAA ?? 0 }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FF460E;"></div></td>
						      <td><p>Direct Properties</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($directPropertiesCAAPercentage["percentage"], 2) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		${{ $directPropertiesCAA ?? 0 }}
						      	</p>
						      </td>
						    </tr>


						  </tbody>
					    </table>
					</div>
				</div>
			</div>    
			<br>
		</div>

		<div class="col-lg-6 col-sm-6 col-sm-12 col-12">
			<h4 class="dashboard_text text_grey">Suggested</h4>
			
			<div class="row">
				<div class="col-lg-2 col-md-3 col-sm-2 col-3"></div>
				<div class="col-lg-8 col-md-6 col-sm-8 col-6">
					<canvas id="DonutChartSelectedAsset" width="400" height="400"></canvas>
				    <!--graph inner-->
				    <p class="graph_inner_caa inner_price">
				    	${{ $totalCAA ?? 0 }}
				    </p>
				    <p class="graph_inner_caa">
				    	{{ round($totalCAAPercentage, 2) ?? 0 }} %
				    </p>

				    {{-- <div class="s-50"></div> --}}
				</div>
				<div class="col-lg-2 col-md-3 col-sm-2 col-3"></div>
			</div>


    		
    		<div class="row mb-5">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
						  <tbody>
						    <tr>
						      <td><div class="table_color" style="background-color: #3B83FF;"></div></td>
						      <td><p>Cash and Deposits</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $selectedAssetAllocationTable["value"]["cash_and_deposits"] ?? 0 }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		@php
						      			$suggested_cash = ($selectedAssetAllocationTable["percentage"]["cash_and_deposits"] ?? 0) * $initialInvestment;
										$historical_cash = ($historical_return['cash_and_deposits'] ?? 0) / 100;
										$cash = $suggested_cash * $historical_cash;
										$total_cash = $suggested_cash + $cash;
						      		@endphp
						      		${{ $total_cash }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #4F2CFF;"></div></td>
						      <td><p>Local Equity</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $selectedAssetAllocationTable["value"]["local_equity"] ?? 0 }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		@php
						      			$suggested_local_equity = ($selectedAssetAllocationTable["percentage"]["local_equity"] ?? 0) * $initialInvestment;
										$historical_local_equity = ($historical_return['local_equity'] ?? 0) / 100;
										$local_equity = $suggested_local_equity * $historical_local_equity;
										$total_local_equity = $suggested_local_equity + $local_equity;
						      		@endphp
						      		${{ $total_local_equity }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FFE700;"></div></td>
						      <td><p>US (Govt) Equity</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $selectedAssetAllocationTable["value"]["government_bonds"] ?? 0 }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		@php
						      			$suggested_government_bonds = ($selectedAssetAllocationTable["percentage"]["government_bonds"] ?? 0) * $initialInvestment;
										$historical_government_bonds = ($historical_return['government_bonds'] ?? 0) / 100;
										$government_bonds = $suggested_government_bonds * $historical_government_bonds;
										$total_government_bonds = $suggested_government_bonds + $government_bonds;
						      		@endphp
						      		${{ $total_government_bonds }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #222222;"></div></td>
						      <td><p>International Equity</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $selectedAssetAllocationTable["value"]["international_equity"] ?? 0 }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		@php
						      			$suggested_international_equity = ($selectedAssetAllocationTable["percentage"]["international_equity"] ?? 0) * $initialInvestment;
										$historical_international_equity = ($historical_return['international_equity'] ?? 0) / 100;
										$international_equity = $suggested_international_equity * $historical_international_equity;
										$total_international_equity = $suggested_international_equity + $international_equity;
						      		@endphp
						      		${{ $total_international_equity }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #2CD9C5;"></div></td>
						      <td><p>Fix Income</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $selectedAssetAllocationTable["value"]["corporate_bonds"] ?? 0 }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		@php
						      			$suggested_corporate_bonds = ($selectedAssetAllocationTable["percentage"]["corporate_bonds"] ?? 0) * $initialInvestment;
										$historical_corporate_bonds = ($historical_return['corporate_bonds'] ?? 0) / 100;
										$corporate_bonds = $suggested_corporate_bonds * $historical_corporate_bonds;
										$total_corporate_bonds = $suggested_corporate_bonds + $corporate_bonds;
						      		@endphp
						      		${{ $total_corporate_bonds }}
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FF903B;"></div></td>
						      <td><p>Properties REIT</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $selectedAssetAllocationTable["value"]["reits"] ?? 0 }} %
						      	</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		@php
						      			$suggested_reits = ($selectedAssetAllocationTable["percentage"]["reits"] ?? 0) * $initialInvestment;
										$historical_reits = ($historical_return['reits'] ?? 0) / 100;
										$reits = $suggested_reits * $historical_reits;
										$total_reits = $suggested_reits + $reits;
						      		@endphp
						      		${{ $total_reits }}
						      	</p></td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FF460E;"></div></td>
						      <td><p>Direct Properties</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $selectedAssetAllocationTable["value"]["direct_properties"] ?? 0 }} %
						      	</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		@php
						      			$suggested_direct_properties = ($selectedAssetAllocationTable["percentage"]["direct_properties"] ?? 0) * $initialInvestment;
										$historical_direct_properties = ($historical_return['direct_properties'] ?? 0) / 100;
										$direct_properties = $suggested_direct_properties * $historical_direct_properties;
										$total_direct_properties = $suggested_direct_properties + $direct_properties;
						      		@endphp
						      		${{ $total_direct_properties }}
						      	</p></td>
						    </tr>


						  </tbody>
					    </table>
					</div>
				</div>
			</div>


            <br>
		</div>
	</div>
	
	<div class="s-20"></div>
	<h4 class="dashboard_text text_grey">Suggested Risk Tolerance</h4>	

	<div class="s-35"></div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12"></div>
		<div class="col-lg-4 col-md-4 col-sm-12 text-center">
			<h4>
				<span class="badge" style="background-color: #ffe700; display: inline-block;  width: 12px; height: 12px;"></span>
				{{ 'Selected' }}
				&nbsp;&nbsp;&nbsp;
				<span class="badge" style="background-color: #01630a; display: inline-block;  width: 12px; height: 12px;"></span>
				{{ 'Suggested' }}
			</h4>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12"></div>
	</div>
	<div class="row">
		<div class="col-4">
			<a class="s_plans" href="{{ route('plan', [app()->getLocale(), 'conservative_c1']) }}" >
				<div class="suggested {{ ($type == 'conservative_c1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'conservative_c1') ? 'active' : '' }}">Conservative 
				<br> (C1)
					{{ ($type == 'conservative_c1') ? 'Selected' : '' }}
				</div>
			</a>
			<br>
			<br>
		</div>
		<div class="col-4">
			<a class="s_plans" href="{{ route('plan', [app()->getLocale(), 'conservative_c2']) }}" >
				<div class="suggested {{ ($type == 'conservative_c2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'conservative_c2') ? 'active' : '' }}">Conservative 
				<br> (C2)
					{{ ($type == 'conservative_c2') ? 'Selected' : '' }}
				</div>
			</a>
			<br>
			<br>
		</div>
		<div class="col-4">
			<a class="s_plans" href="{{ route('plan', [app()->getLocale(), 'natural_n1']) }}" >
				<div class="suggested {{ ($type == 'natural_n1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'natural_n1') ? 'active' : '' }}">Natural 
				<br> (N1)
					{{ ($type == 'natural_n1') ? 'Selected' : '' }}
				</div>
			</a>
			<br>
			<br>
		</div>
		<div class="col-4">
			<a class="s_plans" href="{{ route('plan', [app()->getLocale(), 'natural_n2']) }}" >
				<div class="suggested {{ ($type == 'natural_n2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'natural_n2') ? 'active' : '' }}">Natural 
				<br> (N2)
					{{ ($type == 'natural_n2') ? 'Selected' : '' }}
				</div>
			</a>
			<br>
			<br>
		</div>
		<div class="col-4">
			<a class="s_plans" href="{{ route('plan', [app()->getLocale(), 'aggressive_a1']) }}" >
				<div class="suggested {{ ($type == 'aggressive_a1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'aggressive_a1') ? 'active' : '' }}">Aggressive 
				<br> (A1)
					{{ ($type == 'aggressive_a1') ? 'Selected' : '' }}
				</div>
			</a>
			<br>
			<br>
		</div>
		<div class="col-4">
			<a class="s_plans" href="{{ route('plan', [app()->getLocale(), 'aggressive_a2']) }}" >
				<div class="suggested {{ ($type == 'aggressive_a2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'aggressive_a2') ? 'active' : '' }}">Aggressive 
				<br> (A2)
					{{ ($type == 'aggressive_a2') ? 'Selected' : '' }}
				</div>
			</a>
			<br>
			<br>
		</div>

	</div>
	
	<div class="s-50"></div>
		
	<h3 class="user__intro">👏Congratulations!<span class="text_grey congrats_text">&nbsp;At age {{ $ending_age ?? 0 }} you will have
	savings balance of ${{ $savingsAtEndingAge[$ending_age]['year_ending_balance'] ?? 0 }}.</span></h3>
    
	<div class="s-50"></div>
	
	<div class="row">
		<div class="col-sm-12">
			<canvas id="predict" width="1600" height="900"></canvas>
		</div>
	</div>

	<div class="s-20"></div>
	<h4 class="dashboard_text text_grey">Input</h4>	

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 mb-sm-5">
			<div class="table_box">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">Before Retirement</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td scope="row"><p>Your Current Age</p></td>
				      <td><p class="text_black" >{{ $personalInfo["personal_info"]["years_old"] ?? '' }}</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Income ($)</p></td>
				      <td><p class="text_black" >{{ ($personalNetIncome ?? '' ) * 12 }}</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Inflation and Income Increases (%)</p></td>
				      <td><p class="text_black" >{{ $constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? '' }} %</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Retirement Savings Balance ($)</p></td>
				      <td><p class="text_black" >{{ $constants["Retirement Savings Balance ($) ' Starting Amount '"]["constant_value"] ?? '' }}</p></td>
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Savings Amount ($)</p></td>
				      <td><p class="text_black" >{{ ($currentSavingAmount ?? '' ) * 12 }}</p></td>
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Savings Increases (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Annual Savings Increases (%)"]["constant_value"] ?? '' }} %</p></td>
				    </tr>
				    <tr>
				      <td scope="row"><p>Investment Return (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Investment Return (before Retirement) (%)"]["constant_value"] ?? '' }} %</p></td>
				    </tr>
				    
				  </tbody>
				</table>
			</div>
			<div class="s-20"></div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 mb-sm-5">
			<div class="table_box">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">After Retirement</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td scope="row"><p>Annual Pension Benefit ($)</p></td>
				      <td><p class="text_black" >{{ round(($totalMonthlyIncomeAtRetirement ?? '' ) * 12, 2) }}</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Pension Benefit Increases (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Annual Pension Benefit Increases (%)"]["constant_value"] ?? '' }} %</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Desired Retirement Age</p></td>
				      <td><p class="text_black" >60</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Number of Years of Retirement Income</p></td>
				      <td><p class="text_black" >21</p></td>
				    </tr>
				    <tr>
				      <td scope="row"><p>Income Replacement (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Income Replacement (%)"]["constant_value"] ?? '' }} %</p></td>
				    </tr>
				    <tr>
				      <td scope="row"><p>Investment Return (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? '' }} %</p></td>
				    </tr>
				    
				  </tbody>
				</table>
			</div>
			
		</div>
	</div>

	<div class="s-35"></div>

	<div class="row">
		<div class="col-sm-12">
			<div class="table_box">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">Uncertainty</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td scope="row"><p>Investment Return Uncertainty (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Investment Return Uncertainty (%)"]["constant_value"] ?? '' }} %</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Savings Amount Uncertainty (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Annual Savings Amount Uncertainty (%)"]["constant_value"] ?? '' }} %</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Savings Increases Uncertainty (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Annual Savings Increases Uncertainty (%)"]["constant_value"] ?? '' }} %</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Pension Benefit Amount Uncertainty (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Annual Pension Benefit Amount Uncertainty (%)"]["constant_value"] ?? '' }} %</p></td>
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Pension Benefit Increases Uncertainty (%)</p></td>
				      <td><p class="text_black" >{{ $constants["Annual Pension Benefit Increases Uncertainty (%)"]["constant_value"] ?? '' }} %</p></td>
				    </tr>
				    
				  </tbody>
				</table>
			</div>
		</div>
	</div>



	<div class="s-50"></div>
	<div class="row btm_table_fix_height mb-5">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th class="btm_table">Age</th>
				        <th class="btm_table">Salary</th>
				        <th class="btm_table">Balance</th>
				        <th class="btm_table">Interest</th>
				        <th class="btm_table">Yearly Savings</th>
				        <th class="btm_table">Desired Retirement Income</th>
				        <th class="btm_table">Pension Income</th>
				        <th class="btm_table">Year Ending Balance</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@isset ($savingsAtEndingAge)
				    	    @forelse ($savingsAtEndingAge as $age => $savings)
				    	    	<tr>
					    	    	<td class="btm_table_td">{{ $age ?? '' }}</td>
									<td class="btm_table_td">$ {{ $savings["salary"] ?? '' }}</td>
									<td class="btm_table_td">$ {{ $savings["balance"] ?? '' }}</td>
									<td class="btm_table_td">$ {{ $savings["interest"] ?? '' }}</td>
									<td class="btm_table_td">$ {{ $savings["yearly_savings"] ?? '' }}</td>
									<td class="btm_table_td">$ {{ $savings["desired_retirement_income"] ?? '' }}</td>
									<td class="btm_table_td">$ {{ $savings["pension_income"] ?? '' }}</td>
									<td class="btm_table_td">$ {{ $savings["year_ending_balance"] ?? '' }}</td>
								</tr>
				    	    @empty
				    	    	<tr>
				    	    		<td colspan="8" class="btm_table_td">No Data Found</td>
				    	    	</tr>
				    	    @endforelse
				    	@endisset
				    </tbody>
				</table>
			</div>
		</div>
	</div>
	<br><br>

{{-- </div> --}}
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">

var ctx = document.getElementById("predict");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [{!! implode(", ", $ageForGraph) !!}],
        datasets: [{
            label: ["Balance"],
            borderColor: "#80b6f4",
            pointBorderColor: "#80b6f4",
            pointBackgroundColor: "#80b6f4",
            pointHoverBackgroundColor: "#80b6f4",
            pointHoverBorderColor: "#80b6f4",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
            data: [{!! implode(", ", $yearEndingBalanceForGraph) !!}]
        }]
    },
    options: {
        legend: {
            position: "bottom"
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 20,
                    padding: 20
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
                    fontStyle: "bold"
                }
            }]
        }
    }
});



/////////////////////////////////////
/*
|-------------------------------
|		Donut Chart Current Asset
|-------------------------------
*/
var ctx = document.getElementById("DonutChartCurrentAsset");
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
		data: [{!! implode(", ", $currentAssetDataDonutChart) !!}],
		backgroundColor: [
			'#3B83FF',
			'#4F2CFF',
			'#FFE700',
			'#222222',
			'#2CD9C5',
			'#FF903B',
			'#FF460E',
		],
		borderColor: [
			'#3B83FF',
			'#4F2CFF',
			'#FFE700',
			'#222222',
			'#2CD9C5',
			'#FF903B',
			'#FF460E',
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
		data: [{!! implode(", ", $selectedAssetValueDataDonutChart) !!}],
		backgroundColor: [
			'#3B83FF',
			'#4F2CFF',
			'#FFE700',
			'#222222',
			'#2CD9C5',
			'#FF903B',
			'#FF460E',
		],
		borderColor: [
			'#3B83FF',
			'#4F2CFF',
			'#FFE700',
			'#222222',
			'#2CD9C5',
			'#FF903B',
			'#FF460E',
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


</script>
@endsection