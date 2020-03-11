@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_questionary')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<style>
/* 
@media print {
   body {
   display:table;
   table-layout:fixed;
   padding-top:3.5cm;
   padding-bottom:3.5cm;
   height:auto;
    }
}
 */
/* 

@page {
  margin: 1in; // margin for each printed piece of paper
}

@page :first {
  margin-top: 0.5in; // top margin for first page of paper
}

@media print {
  body {
    margin: 0; // 
  }
} */




/* Stacked */

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
    padding: 50px 20px;
    font-size: 24px;
    background: #F0F1F3;
    color: #bcbcbc;
    font-family: Soin Sans Neue;
    font-weight: bold;
}
.suggested-plan:hover{
	background: #01630a;
    color: #fff;
}

.active{
	/*background: #01630a8f;*/
    color: #fff;
}
.suggested-selected:hover{
	background: #01630a;
    color: #fff;
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












.potential_li {
    width: 33%;
}

.potential {
    width: unset !important;
    text-align: center;   
}
ul.nav.nav-tabs {
    width: unset !important;
}


.graph_inner {
    text-align: center;
    position: relative;
    top: -170px;
}

/*.graph_inner_caa {
    text-align: center;
    position: relative;
    top: -190px;
}*/

.suggested-plan {
    text-align: center;
    padding: 50px 10px !important;
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





  .indicator2{
  background-color: #e32d2d !important;
}


.progressbar {
  counter-reset: step;
}
.progressbar li {
  list-style: none;
  display: inline-block;
  width: 15.33%;
  position: relative;
  text-align: center;
  cursor: auto;
}
.progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 70px;
  height: 70px;
  line-height : 70px;
  border: 4px solid #ddd;
  border-radius: 100%;
  display: block;
  text-align: center;
  margin: 0 auto 20px auto;
  background-color: #fff;
}
.progressbar li:after {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: #ddd;
  top: 35px;
  left: -50%;
  z-index : -1;
}


.progressbar li:first-child:after {
  content: none;
}
.progressbar li.active {
  color: #999c9a;
}
.progressbar li.active:before {
  border-color: green;
} 
.progressbar li.active + li:after {
  background-color: #f0f0f0;
}


.progressbar li.active1 {
  color: #999c9a;
}
.progressbar li.active1:before {
  border-color: #fced07;
} 
.progressbar li.active1 + li:after {
  background-color: #f0f0f0;
}


.progressbar li.active2 {
  color: #999c9a;
}
.progressbar li.active2:before {
  border-color: #e32d2d;
} 
.progressbar li.active2 + li:after {
  background-color: #f0f0f0;
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
.suggested-plan:hover{
  background: #fced07;
    color: #01630a;
}
.suggested-selected{
  background: #222222;
    color: #fff;
}
.suggested-selected:hover{
  background: #222222;
    color: #fff;
}

.suggested-active:before, .selected:before{
  background-color: #01630a !important;
  border: 4px solid #01630a !important;
  color: #fff;
}
.indicator{
  background-color: #01630a !important;
}


.suggested-active1:before, .selected1:before{
  background-color: #fced07 !important;
  border: 4px solid #fced07 !important;
  color: #fff;
}
.indicator1{
  background-color: #fced07 !important;
}


.suggested-active2:before, .selected2:before{
  background-color: #e32d2d !important;
  border: 4px solid #e32d2d !important;
  color: #fff;
}
.indicator2{
  background-color: #008000 !important;
}









.selected:before, .indicator-selected{
  background-color: #008000 !important;
  color: #fff;
}
.selected:before{
  border: 4px solid #008000 !important;
}

.suggested-active:before, .indicator-suggested{
  background-color: #fced07 !important;
  color: #fff;
}
.suggested-active:before{
  border: 4px solid #fced07 !important;
}








/*.progressbar li:second-child {
  background-color: yellow;
}*/

a.select-plan {
  font-size: 1.5rem;
  color: #20630a;
  font-weight: 600;
}

@media only screen and (max-width: 776px) {
  .progressbar li{
    display: initial;
  }
}


a{
  cursor: pointer !important;
}

{!! ($request->segment(1) == 'ar') ? '.progressbar li:after{ right: -50%; }' : '' !!}









</style>
@endsection
@section('content')
<div class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}" id="parent-report">
<div class="container-fluid mt-5 mb-5" {{ $not_found ?? '' }}>
{{-- <div class="content__body" > --}}
	<div class="row">
		<div class="col-lg-6 col-md-4 col-sm-2">
			<h3 class="user__intro">{{ trans('lang.results') }}</h3>
		</div>
		<div class="col-lg-6 col-md-8 col-sm-10 text-lg-right text-md-right text-sm-right">
			
		</div>
	</div>
	<div class="s-50"></div>

	<h3 class="user__intro text_grey">{{ trans('lang.current_state.saving_evaluation') }}</h3>
	
	<div class="s-50"></div>

	<div class="row" id="reportPage">
		<div class="col-lg-6 col-md-6 col-sm-12 mb-5">
			<p>{{ trans('lang.current_state.net_personal_income') }}</p>
			<h1 class="income">
				{{ $netPersonalIncome ?? 0 }} SAR
			</h1>
			<br>
			<br>
			<p>{{ trans('lang.current_state.saving_evaluation') }}</p>
			<div class="row">
				<div class="col-2 percentage"><p>0%</p></div>
				<div class="col-2 percentage"><p>15%</p></div>
				<div class="col-2 percentage"><p>30%</p></div>
				<div class="col-1 percentage"><p></p></div>
				<div class="col-2 percentage"><p>70%</p></div>
				<div class="col-1 percentage"><p></p></div>
				<div class="col-2 percentage"><p>100%</p></div>
			</div>
			<div class="progress">
			    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}%" data-toggle="tooltip" title="{{ round($currentSavingRate["currentSavingRatePercentage"] ?? 0) }}%">
			      <span class="sr-only">{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}% Complete</span>
			    </div>
		    </div>
		    <br>
		    <div class="row">
		    	<div class="col-2 emoji"><p>😣</p><p>{{ trans('lang.current_state.broken') }}</p></div>
				<div class="col-2 emoji"><p>😥</p><p>{{ trans('lang.current_state.poor_saver') }}</p></div>
				<div class="col-2 emoji"><p>🙂</p><p>{{ trans('lang.current_state.good_saver') }}</p></div>
				<div class="col-1 emoji"><p></p><p></p></div>
				<div class="col-2 emoji"><p>😁</p><p>{{ trans('lang.current_state.excellent_saver') }}</p></div>
				<div class="col-1 emoji"><p></p><p></p></div>
				<div class="col-2 emoji"><p>🤑</p><p>{{ trans('lang.current_state.wealthy') }}</p></div>
			</div>
			<br>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 mt-sm-5 text-center">
			<div class="row text-center">
				<div class="col-lg-3 col-md-1 col-sm-3 col-3"></div>
				<div class="col-lg-3 col-md-5 col-sm-3 col-3 text-center">
					<div class="wrapper">
						<canvas id="barChartCurrentSaving"></canvas>
					</div>
					<div class="text-center mt-5">
						<h3>{{ trans('lang.current_state.current') }}</h3>
						<p>
							<span class="badge" style="background-color: #ff903b; display: inline-block;  width: 12px; height: 12px;"></span>
							{{ round($currentSavingRate['currentSavingRatePercentage'] ?? 0, 2) }} %
						</p>
						<p>
							<span class="badge" style="background-color: #3b83ff; display: inline-block;  width: 12px; height: 12px;"></span>
							{{ 100 - (round($currentSavingRate['currentSavingRatePercentage'] ?? 0, 2)) }} %
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-5 col-sm-3 col-3 text-center">
					<div class="wrapper">
						<canvas id="barChartPossibleSaving"></canvas>
					</div>
					<div class="text-center mt-5">
						<h3>{{ trans('lang.current_state.possible') }}</h3>
						<p>
							<span class="badge" style="background-color: #ff903b; display: inline-block; width: 12px; height: 12px;"></span>
							{{ round($possibleSavingRate['possibleSavingRatePercentage'] ?? 0 , 2) }} %
						</p>
						<p>
							<span class="badge" style="background-color: #3b83ff; display: inline-block; width: 12px; height: 12px;"></span>
							{{ 100 - (round($possibleSavingRate['possibleSavingRatePercentage'] ?? 0 , 2)) }} %
						</p>
					</div>
				</div>
				<div class="col-lg-3  col-md-1 col-sm-3 col-3"></div>
			</div>
		</div>
	</div>
	
	<div class="s-100"></div>

	<h3 class="user__intro text_grey">{{ trans('lang.current_state.networth_evaluation') }}</h3>
	
	<div class="s-50"></div>

	{{-- <h4 class="dashboard_text text_black">Dashboard</h4> --}}
	<div class="row">
		<div class="col-lg-5 col-md-4 col-sm-12 mb-sm-5">
			<div class="s-100"></div>
			<h1 class="income income_network mb-sm-5">
				{{ $totalNetworth ?? 0 }} SAR
				{{-- <br> --}}
				<p style="font-size: 1.75rem;" class="text-center">
					{{ trans('lang.current_state.networth') }}
				</p>
			</h1>
			<br>
			<br>
		</div>
		<div class="col-lg-7 col-md-8 col-sm-12 mt-sm-5">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-2 col-2"></div>
				<div class="col-lg-6 col-md-6 col-sm-8 col-8">
					<canvas id="AssetAndLibilitiesDonutChart" width="400" height="400"></canvas>
					<br>
					<p class="text-center inner_price">
						{{ $totalNetworth ?? 0 }} SAR
					</p>
		    		<p class="text-center">{{ trans('lang.current_state.networth') }}</p>
					<div class=" mt-1">
                    <div class="row">
						<div class="col-md-6 col-sm-6 col-6">
							<div class="row">
							  <div class="col-md-12">
							    <p>
							      <span class="badge" style="background-color: #4F2CFF; display: inline-block; width: 12px; height: 12px;"></span>
							      {{ $total_personal_assets ?? 0 }} SAR
							      <p>
							        {{ trans('lang.current_state.personal_assets') }}
							      </p>
							    </p>
							    <hr>
							  </div>
							  <div class="col-md-12">
							    <p>
							      <span class="badge" style="background-color: #3B83FF; display: inline-block; width: 12px; height: 12px;"></span>
							      {{ $total_unliquid_assets ?? 0 }} SAR
							      <p>
							        {{ trans('lang.current_state.unliquid_assets') }}
							      </p>
							    </p>
							    <hr>
							  </div>
							  <div class="col-md-12">
							    <p>
							      <span class="badge" style="background-color: #FFE700; display: inline-block; width: 12px; height: 12px;"></span>
							      {{ $total_liquid_assets ?? 0 }} SAR
							      <p>
							        {{ trans('lang.current_state.liquid_assets') }}
							      </p>
							    </p>
							    <hr>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-6">
							<p>
							  <span class="badge" style="background-color: #ff903b; display: inline-block; width: 12px; height: 12px;"></span>
							  {{ $networthTotalDebtsOrLiabilities ?? 0 }} SAR
							  <p>
							    {{ trans('lang.current_state.debts_liabilities') }}
							  </p>
							</p>
						</div>
                    </div>
                  </div>
					<div class="s-50"></div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-2 col-2"></div>
			</div>
		</div>
	</div>


<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>
{{-- PAGE 1 PRINT --}}
<br><br><br><br><br>
<br><br><br><br><br>


	{{-- ________________________ ASSETS _____________________ --}}
	<div class="s-50"></div>
	
	<h4 class="dashboard_text text_black">{{ trans('lang.question.assets') }}</h4>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12" style="padding: 25px;">
			{{-- <canvas id="NetworthAssetDonutChart" width="400" height="400"></canvas> --}}
			<br>
			<p class="text-center inner_price">
				{{ $networthTotalInvestmentOrAssets ?? 0 }} SAR
			</p>

    		<p class="text-center">
    			{{ trans('lang.current_state.total_assets') }}
    		</p>
			<div class="s-20"></div>
		</div>
		<div class="col-lg-6 col-md-8 col-sm-12 offset-lg-2">
			<div class="table_box border_blue">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">{{ trans('lang.current_state.personal_assets') }}</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@isset ($personal_assets)
				  	    @forelse ($personal_assets as $personal_asset_key => $personal_asset_value)
				  	    	<tr>
						      <td scope="row">
						      	<p>{{ ucwords(str_replace('_', ' ', $personal_asset_key)) }}</p>
						      </td>
						      <td>
						      	<p class="text_black" >{{ ucwords(str_replace('_', ' ', $personal_asset_value)) }}</p>
						      </td>
						    </tr>
				  	    @empty
				  	    	{{-- empty expr --}}
				  	    @endforelse
				  	@endisset				    
				    <tr>
				      <th scope="row"><p class="text_black total_table">{{ trans('lang.current_state.subtotal') }}</p></th>
				      <td>
				      	<p class="text_black total_table" >
				      		{{ $total_personal_assets ?? 0 }} SAR
				      	</p>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>

			<div class="s-50"></div>

			<div class="table_box border_light_blue">
				<table class="table ">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">{{ trans('lang.current_state.unliquid_assets') }}</th>
				    </tr>
				  </thead>
				  <tbody>
				    @isset ($unliquid_assets)
				  	    @forelse ($unliquid_assets as $unliquid_asset_key => $unliquid_asset_value)
				  	    	<tr>
						      <td scope="row">
						      	<p>{{ ucwords(str_replace('_', ' ', $unliquid_asset_key)) }}</p>
						      </td>
						      <td>
						      	<p class="text_black" >{{ ucwords(str_replace('_', ' ', $unliquid_asset_value)) }}</p>
						      </td>
						    </tr>
				  	    @empty
				  	    	{{-- empty expr --}}
				  	    @endforelse
				  	@endisset
				    
				    <tr>
				      <th scope="row"><p class="text_black total_table">{{ trans('lang.current_state.subtotal') }}</p></th>
				      <td>
				      	<p class="text_black total_table" >
				      		{{ $total_unliquid_assets ?? 0 }} SAR
				      	</p>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>

			<div class="s-50"></div>

			<div class="table_box border_yellow">
				<table class="table ">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">{{ trans('lang.current_state.liquid_assets') }}</th>
				    </tr>
				  </thead>
				  <tbody>
				    @isset ($liquid_assets)
				  	    @forelse ($liquid_assets as $liquid_asset_key => $liquid_asset_value)
				  	    	<tr>
						      <td scope="row">
						      	<p>{{ ucwords(str_replace('_', ' ', $liquid_asset_key)) }}</p>
						      </td>
						      <td>
						      	<p class="text_black" >{{ ucwords(str_replace(' ', '_', $liquid_asset_value)) }}</p>
						      </td>
						    </tr>
				  	    @empty
				  	    	{{-- empty expr --}}
				  	    @endforelse
				  	@endisset
				    
				    <tr>
				      <th scope="row"><p class="text_black total_table">{{ trans('lang.current_state.subtotal') }}</p></th>
				      <td>
				      	<p class="text_black total_table" >
				      		{{ $total_liquid_assets ?? 0 }} SAR
				      	</p>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>

			<div class="s-50"></div>
		</div>
			
	</div>

	{{--  --}}
	<br>
	{{--  --}}

	{{-- ________________________ LIABILITIES _____________________ --}}

	<div class="s-50"></div>
	
	<h4 class="dashboard_text text_black">{{ trans('lang.current_state.liabilities') }}</h4>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 25px;">
			{{-- <canvas id="NetworthLiabilitiesDonutChart" width="400" height="400"></canvas> --}}
			<br>
			<p class="text-center inner_price">
				{{ $networthTotalDebtsOrLiabilities ?? 0 }} SAR
			</p>

    		<p class="text-center">
    			{{ trans('lang.current_state.total_liabilities') }}
    		</p>
			<div class="s-20"></div>

		</div>
		<div class="col-lg-6 col-md-8 col-sm-6 offset-lg-2">
			<div class="table_box border_orange">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">{{ trans('lang.current_state.debts_liabilities') }}</th>
				    </tr>
				  </thead>
				  <tbody>
				    @isset ($networthDebtsOrLiabilities)
				  	    @forelse ($networthDebtsOrLiabilities as $networthDebtsOrLiabilities_key => $networthDebtsOrLiabilities_value)
				  	    	<tr>
						      <td scope="row">
						      	<p>{{ ucwords(str_replace('_', ' ', $networthDebtsOrLiabilities_key)) }}</p>
						      </td>
						      <td>
						      	<p class="text_black" >{{ ucwords(str_replace('_', ' ', $networthDebtsOrLiabilities_value)) }}</p>
						      </td>
						    </tr>
				  	    @empty
				  	    	{{-- empty expr --}}
				  	    @endforelse
				  	@endisset
				    
				    <tr>
				      <th scope="row"><p class="text_black total_table">{{ trans('lang.current_state.subtotal') }}</p></th>
				      <td>
				      	<p class="text_black total_table" >
				      		{{ $networthTotalDebtsOrLiabilities ?? 0 }} SAR
				      	</p>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>

			<div class="s-50"></div>
		</div>
			
	</div>



<br>
{{-- PAGE 3 PRINT --}}
<br>



	{{-- _____________________________ PLAN __________________________ --}}

	<div class="s-100"></div>

	
	
	<div class="s-20"></div>




{{-- PAGE 4 PRINT --}}



	{{-- <h3 class="user__intro text_grey">Investment Evaluation With Plan</h3>
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
			<div class="suggested {{ ($type == 'conservative_c1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'conservative_c1') ? 'active' : '' }}">Conservative 
				<br> (C1)
				{{ ($type == 'conservative_c1') ? 'Selected' : '' }}
			</div>
			<br>
			<br>
		</div>
		<div class="col-4">
			<div class="suggested {{ ($type == 'conservative_c2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'conservative_c2') ? 'active' : '' }}">Conservative 
				<br> (C2)
				{{ ($type == 'conservative_c2') ? 'Selected' : '' }}
			</div>
			<br>
			<br>
		</div>
		<div class="col-4">
			<div class="suggested {{ ($type == 'natural_n1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'natural_n1') ? 'active' : '' }}">Natural 
				<br> (N1)
				{{ ($type == 'natural_n1') ? 'Selected' : '' }}
			</div>
			<br>
			<br>
		</div>
		<div class="col-4">
			<div class="suggested {{ ($type == 'natural_n2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'natural_n2') ? 'active' : '' }}">Natural 
				<br> (N2)
				{{ ($type == 'natural_n2') ? 'Selected' : '' }}
			</div>
			<br>
			<br>
		</div>
		<div class="col-4">
			<div class="suggested {{ ($type == 'aggressive_a1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'aggressive_a1') ? 'active' : '' }}">Aggressive 
				<br> (A1)
				{{ ($type == 'aggressive_a1') ? 'Selected' : '' }}
			</div>
			<br>
			<br>
		</div>
		<div class="col-4">
			<div class="suggested {{ ($type == 'aggressive_a2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'aggressive_a2') ? 'active' : '' }}">Aggressive 
				<br> (A2)
				{{ ($type == 'aggressive_a2') ? 'Selected' : '' }}
			</div>
			<br>
			<br>
		</div>

	</div>
	
	<div class="s-50"></div> --}}
	

<br>
{{-- PAGE 4 PRINT --}}
<br>


	<h3 class="user__intro text_grey">{{ trans('lang.user_sidebar.financial_plan') }}</h3>



	<h4 class="dashboard_text text_grey">{{ trans('lang.financial_plan.suggested_risk_tolerance') }}</h4>  

		<div class="s-35"></div>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12"></div>
			<div class="col-lg-4 col-md-4 col-sm-12 text-center">
			  <h4>
			    <span class="badge
			    {{ (($type ?? '') == 'conservative_c1') ? 'indicator' : '' }}
			    {{ (($type ?? '') == 'conservative_c2') ? 'indicator' : '' }}
			    {{ (($type ?? '') == 'natural_n1') ? 'indicator1' : '' }}
			    {{ (($type ?? '') == 'natural_n2') ? 'indicator1' : '' }}
			    {{ (($type ?? '') == 'aggressive_a1') ? 'indicator2' : '' }}
			    {{ (($type ?? '') == 'aggressive_a2') ? 'indicator2' : '' }}
			    " style="background-color: #ffe700; display: inline-block;  width: 12px; height: 12px;"></span>
			    {{ 'Selected' }}
			    &nbsp;&nbsp;&nbsp;
			    <span class="badge 
			    {{ (($suggestion ?? '') == 'conservative_c1') ? 'indicator' : '' }}
			    {{ (($suggestion ?? '') == 'conservative_c2') ? 'indicator' : '' }}
			    {{ (($suggestion ?? '') == 'natural_n1') ? 'indicator1' : '' }}
			    {{ (($suggestion ?? '') == 'natural_n2') ? 'indicator1' : '' }}
			    {{ (($suggestion ?? '') == 'aggressive_a1') ? 'indicator2' : '' }}
			    {{ (($suggestion ?? '') == 'aggressive_a2') ? 'indicator2' : '' }}
			    " style="display: inline-block;  width: 12px; height: 12px;"></span>
			    {{ 'Suggested' }}
			  </h4>

			  <br>
			  <br>

			</div>
			<div class="col-lg-4 col-md-4 col-sm-12"></div>
		</div>




		<div class="row">
        <div class="col-sm-12">
          
          <ul class="progressbar">
            
              <li class="active 
                {{ (($suggestion ?? '') == 'conservative_c1') ? 'suggested-active' : '' }}
                {{ ($type == 'conservative_c1') ? 'selected' : '' }}
                ">
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c1']) }}">
                    {{ trans('lang.financial_plan.more_conservative') }}
                  </a>
              </li>
              </a>
              <li class="active 
                {{ (($suggestion ?? '') == 'conservative_c2') ? 'suggested-active' : '' }}
                {{ ($type == 'conservative_c2') ? 'selected' : '' }}
                " >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c2']) }}">
                    {{ trans('lang.financial_plan.conservative') }}
                </a>
              </li>
              <li class="active1 
                {{ (($suggestion ?? '') == 'natural_n1') ? 'suggested-active' : '' }}
                {{ ($type == 'natural_n1') ? 'selected' : '' }}
                " >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n1']) }}">
                  {{ trans('lang.financial_plan.below_average') }}
                </a>
              </li>
              <li class="active1 
              {{ (($suggestion ?? '') == 'natural_n2') ? 'suggested-active' : '' }}
              {{ ($type == 'natural_n2') ? 'selected' : '' }}
              " >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n2']) }}">
                  {{ trans('lang.financial_plan.above_average') }}
                </a>
              </li>
              <li class="active2 
                {{ (($suggestion ?? '') == 'aggressive_a1') ? 'suggested-active' : '' }}
                {{ ($type == 'aggressive_a1') ? 'selected' : '' }}
              " >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a1']) }}">
                  {{ trans('lang.financial_plan.aggressive') }}
                </a>
              </li>
              <li class="active2 
                {{ (($suggestion ?? '') == 'aggressive_a2') ? 'suggested-active' : '' }}
                {{ ($type == 'aggressive_a2') ? 'selected' : '' }}
                " >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a2']) }}">
                  {{ trans('lang.financial_plan.more_aggressive') }}
                </a>
              </li>
          </ul>

          <br>
          <br>
         
        </div>
      </div>

<br><br><br><br><br><br><br><br><br><br>






<div class="s-20"></div>

<h3 class="user__intro text_grey">{{ trans('lang.financial_plan.asset_allocation') }}</h3>
	
	<div class="s-20"></div>

	<div class="row">
		{{-- <div class="col-lg-6 col-sm-6 col-sm-6 col-6">
			<h4 class="dashboard_text text_grey">{{ trans('lang.current_state.current') }}</h4>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
					<canvas id="DonutChartCurrentAsset" width="400" height="400"></canvas>
				    <!--graph inner-->
				    <br>
				    <p class="text-center inner_price">
				    	{{ $totalCAA ?? 0 }} SAR
				    </p>
				    <p class="text-center">
				    	{{ round($totalCAAPercentage, 2) ?? 0 }} %
				    </p>
				    <br>

				</div>
				
			</div>

			<div class="row mb-5">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
						  <tbody>
						    <tr>
						      <td><div class="table_color" style="background-color: #3B83FF;"></div></td>
						      <td><p>{{ trans('lang.financial_plan.cash_and_deposit') }}</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($cashAndDepositsCAAPercentage["percentage"], 0) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $cashAndDepositsCAA ?? 0 }} SAR
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #4F2CFF;"></div></td>
						      <td><p>{{ trans('lang.financial_plan.local_equity') }}</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($localEquityCAAPercentage["percentage"], 0) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $localEquityCAA ?? 0 }} SAR
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FFE700;"></div></td>
						      <td><p>{{ trans('lang.financial_plan.us_govt_equity') }}</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($internationalEquityCAAPercentage["percentage"], 0) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $governmentBondsCAA ?? 0 }} SAR
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #222222;"></div></td>
						      <td><p>{{ trans('lang.financial_plan.international_equity') }}</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($governmentBondsCAAPercentage["percentage"], 0) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $internationalEquityCAA ?? 0 }} SAR
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #2CD9C5;"></div></td>
						      <td><p>{{ trans('lang.financial_plan.fix_income') }}</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($corporateBondsCAAPercentage["percentage"], 0) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $corporateBondsCAA ?? 0 }} SAR
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FF903B;"></div></td>
						      <td><p>{{ trans('lang.financial_plan.local_real_estate') }}</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($localRealEstateCAAPercentage["percentage"], 0) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $localRealEstateCAA ?? 0 }} SAR
						      	</p>
						      </td>
						    </tr>

						    <tr>
						      <td><div class="table_color" style="background-color: #FF460E;"></div></td>
						      <td><p>{{ trans('lang.financial_plan.international_real_estate') }}</p></td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ round($internationalRealEstateCAAPercentage["percentage"], 0) }} %
						      	</p>
						      </td>
						      <td>
						      	<p class="text_black text-right">
						      		{{ $internationalRealEstateCAA ?? 0 }} SAR
						      	</p>
						      </td>
						    </tr>


						  </tbody>
					    </table>
					</div>
				</div>
			</div>    
			<br>
		</div> --}}

		<div class="col-lg-12 col-sm-12 col-sm-12 col-12">
			<h4 class="dashboard_text text_grey">{{ trans('lang.financial_plan.suggested') }}</h4>
			
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-4"></div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
					<canvas id="DonutChartSelectedAsset" width="400" height="400"></canvas>
				    <!--graph inner-->
				    <br>
				    <p class="text-center inner_price">
				    	{{ $totalCAA ?? 0 }} SAR
				    </p>
				    <div class="s-20"></div>
				    <p class="text-center">
				    	{{ round($totalCAAPercentage, 2) ?? 0 }} %
				    </p>
				    <br>

				    {{-- <div class="s-50"></div> --}}
				</div>
				
			</div>


    		<div class="row mb-5">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table">
		              <tbody>
		                <tr>
		                  <td><div class="table_color" style="background-color: #3B83FF;"></div></td>
		                  <td><p>{{ trans('lang.financial_plan.cash_and_deposit') }}</p></td>
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
		                      {{ $total_cash }} SAR
		                    </p>
		                  </td>
		                </tr>

		                <tr>
		                  <td><div class="table_color" style="background-color: #4F2CFF;"></div></td>
		                  <td><p>{{ trans('lang.financial_plan.local_equity') }}</p></td>
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
		                      {{ $total_local_equity }} SAR
		                    </p>
		                  </td>
		                </tr>

		                <tr>
		                  <td><div class="table_color" style="background-color: #222222;"></div></td>
		                  <td><p>{{ trans('lang.financial_plan.international_equity') }}</p></td>
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
		                      {{ $total_international_equity }} SAR
		                    </p>
		                  </td>

		                <tr>
		                  <td><div class="table_color" style="background-color: #FFE700;"></div></td>
		                  <td><p>{{ trans('lang.financial_plan.us_govt_equity') }}</p></td>
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
		                      {{ $total_government_bonds }} SAR
		                    </p>
		                  </td>
		                </tr>

		                
		                </tr>

		                <tr>
		                  <td><div class="table_color" style="background-color: #2CD9C5;"></div></td>
		                  <td><p>{{ trans('lang.financial_plan.corporate_bonds') }}</p></td>
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
		                      {{ $total_corporate_bonds }} SAR
		                    </p>
		                  </td>
		                </tr>

		                <tr>
		                  <td><div class="table_color" style="background-color: #FF903B;"></div></td>
		                  <td><p>{{ trans('lang.financial_plan.local_real_estate') }}</p></td>
		                  <td>
		                    <p class="text_black text-right">
		                      {{ $selectedAssetAllocationTable["value"]["local_real_estate"] ?? 0 }} %
		                    </p></td>
		                  <td>
		                    <p class="text_black text-right">
		                      @php
		                        $suggested_reits = ($selectedAssetAllocationTable["percentage"]["local_real_estate"] ?? 0) * $initialInvestment;
		                    $historical_reits = ($historical_return['local_real_estate'] ?? 0) / 100;
		                    $reits = $suggested_reits * $historical_reits;
		                    $total_reits = $suggested_reits + $reits;
		                      @endphp
		                      {{ $total_reits }} SAR
		                    </p></td>
		                </tr>

		                <tr>
		                  <td><div class="table_color" style="background-color: #FF460E;"></div></td>
		                  <td><p>{{ trans('lang.financial_plan.international_real_estate') }}</p></td>
		                  <td>
		                    <p class="text_black text-right">
		                      {{ $selectedAssetAllocationTable["value"]["international_real_estate"] ?? 0 }} %
		                    </p></td>
		                  <td>
		                    <p class="text_black text-right">
		                      @php
		                        $suggested_direct_properties = ($selectedAssetAllocationTable["percentage"]["international_real_estate"] ?? 0) * $initialInvestment;
		                    $historical_direct_properties = ($historical_return['international_real_estate'] ?? 0) / 100;
		                    $direct_properties = $suggested_direct_properties * $historical_direct_properties;
		                    $total_direct_properties = $suggested_direct_properties + $direct_properties;
		                      @endphp
		                      {{ $total_direct_properties }} SAR
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









	<br><br><br><br><br>
	<br><br><br><br><br>

	
	<div class="s-20"></div>
	<h3 class="user__intro">{{ trans('lang.financial_plan.congratulations') }}!<span class="text_grey congrats_text">&nbsp;{{ trans('lang.current_state.at_age') }} {{ $ending_age ?? 0 }} {{ trans('lang.current_state.you_will_have_savings_balance_of') }} {{ $savingsAtEndingAge[$ending_age]['year_ending_balance'] ?? 0 }} SAR.</span></h3>
    
	<div class="s-50"></div>
	
	<div class="row">
		<div class="col-sm-12">
			{{-- <canvas id="predict" width="1600" height="900"></canvas> --}}
			<canvas id="myChart" width="1600" height="900"></canvas>
		</div>
	</div>

	<div class="s-20"></div>
	<h4 class="dashboard_text text_grey">{{ trans('lang.financial_plan.input') }}</h4>	

	{{-- <div class="row">
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
				      <td scope="row"><p>Annual Income (SAR)</p></td>
				      <td><p class="text_black" >{{ ($personalNetIncome ?? '' ) * 12 }}</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Inflation and Income Increases (%)</p></td>
				      <td><p class="text_black" >{{ $constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? '' }} %</p></td>
				      
				    </tr>
				    <tr>
				      <td scope="row"><p>Retirement Savings Balance (SAR)</p></td>
				      <td><p class="text_black" >{{ $constants["Retirement Savings Balance ($) ' Starting Amount '"]["constant_value"] ?? '' }}</p></td>
				    </tr>
				    <tr>
				      <td scope="row"><p>Annual Savings Amount (SAR)</p></td>
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
				      <td scope="row"><p>Annual Pension Benefit (SAR)</p></td>
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
	</div> --}}

	<br><br><br><br><br>
	
	<div class="row">
        <div class="col-sm-6">
          <div class="table_box">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" colspan="2">{{ trans('lang.financial_plan.before_retirement') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.your_current_age') }}</p></td>
                  <td><p class="text_black" >{{ $personalInfo["personal_info"]["years_old"] ?? '' }}
                  
                </p></td>
                  
                </tr>
                {{-- <tr>
                  <td scope="row"><p>Annual Income ($)</p></td>
                  <td><p class="text_black" >{{ ($personalNetIncome ?? '' ) * 12 }}</p></td>
                  
                </tr> --}}
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.current_portfolio_balance_saved') }}</p></td>
                  <td><p class="text_black" >{{ $initialInvestment ?? '' }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.monthly_contributions_year_1') }}</p></td>
                  <td><p class="text_black" >{{ $extraInfo['extra_info']['monthly_contributions_year_1'] ?? '' }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.annual_contributions_year_1') }}</p></td>
                  <td><p class="text_black" >{{ ($extraInfo['extra_info']['monthly_contributions_year_1'] ?? 0) * 12 }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.annual_increase_in_contributions') }}</p></td>
                  <td><p class="text_black" >{{ $extraInfo['extra_info']['annual_increase_in_contributions_percentage'] ?? '' }} %</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.annual_inflation_and_income') }}</p></td>
                  <td><p class="text_black" >{{ $constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? '' }} %</p></td>
                  
                </tr>
                {{-- <tr>
                  <td scope="row"><p>Retirement Savings Balance ($)</p></td>
                  <td><p class="text_black" >{{ $constants["Retirement Savings Balance ($) ' Starting Amount '"]["constant_value"] ?? '' }}</p></td>
                </tr> --}}
                {{-- <tr>
                  <td scope="row"><p>Annual Savings Amount ($)</p></td>
                  <td><p class="text_black" >{{ ($currentSavingAmount ?? '' ) * 12 }}</p></td>
                </tr> --}}
                {{-- <tr>
                  <td scope="row"><p>Annual Savings Increases (%)</p></td>
                  <td><p class="text_black" >{{ $constants["Annual Savings Increases (%)"]["constant_value"] ?? '' }} %</p></td>
                </tr> --}}
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.expected_real_return_per_year') }}</p></td>
                  <td><p class="text_black" >{{ $constants["Investment Return (before Retirement) (%)"]["constant_value"] ?? '' }} %</p></td>
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.expected_nominal_return_per_year') }}</p></td>
                  <td><p class="text_black" >{{ ($constants["Investment Return (before Retirement) (%)"]["constant_value"] ?? 0) + ($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? 0) }} %</p></td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="s-20"></div>
        </div>
        <div class="col-sm-6">
          <div class="table_box">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" colspan="2">{{ trans('lang.financial_plan.after_retirement') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.annual_pension_benefit') }}</p></td>
                  <td><p class="text_black" >{{ round(($totalMonthlyIncomeAtRetirement ?? '' ) * 12, 2) }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.annual_pension_benefit_percentage') }}</p></td>
                  <td><p class="text_black" >{{ $constants["Annual Pension Benefit Increases (%)"]["constant_value"] ?? '' }} %</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.desired_retirement_age') }}</p></td>
                  <td><p class="text_black" >{{ $retirement_age ?? 0 }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.withdrawal_amount_per_month') }}</p></td>
                  <td><p class="text_black" >{{ $extraInfo['extra_info']['withdrawl_amount_per_month'] ?? 0 }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.withdrawal_amount_per_year') }}</p></td>
                  <td><p class="text_black" >{{ ($extraInfo['extra_info']['withdrawl_amount_per_month'] ?? 0) * 12 }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.inflation_adjusted_withrawal') }}</p></td>
                  <td><p class="text_black" >{{ round($inflation_adjusted_withdrawl_amount_per_year ?? 0 , 2) }}</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.expected_real_return_per_year') }}</p></td>
                  <td><p class="text_black" >{{ $constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? 0 }} %</p></td>
                  
                </tr>
                <tr>
                  <td scope="row"><p>{{ trans('lang.financial_plan.expected_nominal_return_per_year') }}</p></td>
                  <td><p class="text_black" >{{ ($constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? 0) + ($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? 0) }} %</p></td>
                  
                </tr>
                {{-- <tr>
                  <td scope="row"><p>Number of Years of Retirement Income</p></td>
                  <td><p class="text_black" >21</p></td>
                </tr> --}}
                {{-- <tr>
                  <td scope="row"><p>Income Replacement (%)</p></td>
                  <td><p class="text_black" >{{ $constants["Income Replacement (%)"]["constant_value"] ?? '' }} %</p></td>
                </tr> --}}
                {{-- <tr>
                  <td scope="row"><p>Investment Return (%)</p></td>
                  <td><p class="text_black" >{{ $constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? '' }} %</p></td>
                </tr> --}}
                
              </tbody>
            </table>
          </div>
          
        </div>
      </div>

	<div class="s-35"></div>

	{{-- <div class="row">
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
	</div> --}}



	<div class="s-50"></div>
	{{-- <div class="row mb-5">
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
	</div> --}}




	<div class="text-left">
                <h4 class="font-weight-bold {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                  {{ trans('lang.financial_plan.working_years_accumulation_phase') }}
                </h4>
              </div>


              <div class="row mb-5">
                <div class="col-md-12">
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
                          @isset ($workingSavingsAtEndingAge)
                          @php $count = 0; @endphp
                              @forelse ($workingSavingsAtEndingAge as $age => $savings)
                                <tr>
                                  <td class="btm_table_td">
                                    {{ ++$count ?? '' }}
                                  </td>
                                  <td class="btm_table_td">
                                    {{ $age ?? '' }}
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["value_beginning_of_year"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["contributions"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["returns"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["value_end_year"] ?? '',2) }} SAR
                                  </td>
                                </tr>
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
              

              <div class="text-left">
                <h4 class="font-weight-bold {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                  {{ trans('lang.financial_plan.retirement_years_distribution_phase') }}
                </h4>
              </div>


              <div class="row mb-5">
                <div class="col-md-12">

                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="btm_table">{{ trans('lang.financial_plan.year') }} #</th>
                            <th class="btm_table">{{ trans('lang.financial_plan.age') }}</th>
                            <th class="btm_table">{{ trans('lang.financial_plan.value_beginning_year') }}</th>
                            <th class="btm_table">{{ trans('lang.financial_plan.withdrawals') }}</th>
                            <th class="btm_table">{{ trans('lang.financial_plan.returns') }}</th>
                            <th class="btm_table">{{ trans('lang.financial_plan.value_end_year') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          @isset ($retirementSavingsAtEndingAge)
                          @php $count = 0; @endphp
                              @forelse ($retirementSavingsAtEndingAge as $age => $savings)
                                <tr>
                                  <td class="btm_table_td">
                                    {{ ++$count ?? '' }}
                                  </td>
                                  <td class="btm_table_td">
                                    {{ $age ?? '' }}
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["value_beginning_of_year"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["withdrawl"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["returns"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ round($savings["value_end_year"] ?? '',2) }} SAR
                                  </td>
                                </tr>
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



	<br><br>


{{-- </div> --}}
</div>


{{-- ___________________________ UserQuestionnaireNotFound __________________________ --}}
    <div class="modal inmodal pt-5" id="UserQuestionnaireNotFound" tabindex="-1" role="dialog" aria-hidden="true" style="vertical-align: middle !important;"  data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-body text-center">
                	<p>
                		User Questionnaire Not Completed. 
                	</p>
                	<br>
                	<a id="a_back" href="{{ url()->previous() }}"  class="button" style="color: white !important">Go Back</a>
                </div>
            </div>
        </div>
    </div>
{{-- ___________________________ planModal __________________________ --}}
    <div class="modal fade inmodal pt-5" id="planModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
            	<div class="modal-header">
					<h4 class="modal-title">
						Please Choose any Plan
					</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                <div class="modal-body text-center">
                	<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12"></div>
						<div class="col-lg-4 col-md-4 col-sm-12 text-center">
							<h4>
								<span class="badge" style="background-color: #01630a8f; display: inline-block;  width: 12px; height: 12px;"></span>
								{{ 'Suggested' }}
							</h4>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12"></div>
					</div>
                	<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="{{ route('plan', [app()->getLocale(), 'conservative_c1', $user]) }}">
								<div class="suggested-plan {{ ($suggestion == 'conservative_c1') ? 'active' : '' }}">Conservative <br>(C1)</div>
							</a>
							<br>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="{{ route('plan', [app()->getLocale(), 'conservative_c2', $user]) }}">
								<div class="suggested-plan {{ ($suggestion == 'conservative_c2') ? 'active' : '' }}">Conservative <br>(C2)</div>
							</a>
							<br>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="{{ route('plan', [app()->getLocale(), 'natural_n1', $user]) }}">
								<div class="suggested-plan {{ ($suggestion == 'natural_n1') ? 'active' : '' }}">Natural <br>(N1)</div>
							</a>
							<br>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="{{ route('plan', [app()->getLocale(), 'natural_n2', $user]) }}">
								<div class="suggested-plan {{ ($suggestion == 'natural_n2') ? 'active' : '' }}">Natural <br>(N2)</div>
							</a>
							<br>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="{{ route('plan', [app()->getLocale(), 'aggressive_a1', $user]) }}">
								<div class="suggested-plan {{ ($suggestion == 'aggressive_a1') ? 'active' : '' }}">Aggressive <br>(A1)</div>
							</a>
							<br>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="{{ route('plan', [app()->getLocale(), 'aggressive_a2', $user]) }}">
								<div class="suggested-plan {{ ($suggestion == 'aggressive_a2') ? 'active' : '' }}">Aggressive <br>(A2)</div>
							</a>
							<br>
						</div>
					</div>
                </div>
            </div>
        </div>
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

// _______________________________ RESULTS _____________________
////////////////////////////////////
/*
|-------------------------------
|		Bar Chart Current Saving
|-------------------------------
*/
var ctx = document.getElementById("barChartCurrentSaving").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		datasets: [{
			label: 'Saving',
			backgroundColor: "#FF903B",
			data: [{!! round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0 !!}],
		}, {
			label: 'Spending',
			backgroundColor: "#3B83FF",
			data: [{!!  100 - (round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0) !!}],
		}],
	},
	options: {
	    tooltips: {
	      displayColors: true,
	      callbacks:{
	        mode: 'x',
	      },
	    },
	    scales: {
			ticks: {
		        display: false
		    },
	      xAxes: [{
	        stacked: true,
	        ticks: {
	            display: false
	        },
	        gridLines: {
	          display: false,
	        }
	      }],
	      yAxes: [{
	        stacked: true,
	        ticks: {
	          display: false,
	        },
	        gridLines: {
	          display: false,
	        },
	        type: 'linear',
	      }]
	    },
		responsive: true,
		maintainAspectRatio: false,
		legend: { 
			position: 'bottom' 
		},
	}
});


////////////////////////////////////
/*
|-------------------------------
|		Bar Chart Possible Saving
|-------------------------------
*/
var ctx = document.getElementById("barChartPossibleSaving").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		datasets: [{
			label: 'Saving',
			backgroundColor: "#FF903B",
			data: [{!! round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0 !!}],
		}, {
			label: 'Spending',
			backgroundColor: "#3B83FF",
			data: [{!! 100 - (round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0) !!}],
		}],
	},
	options: {
	    tooltips: {
	      displayColors: true,
	      callbacks:{
	        mode: 'x',
	      },
	    },
	    scales: {
			ticks: {
		        display: false
		    },
	      xAxes: [{
	        stacked: true,
	        ticks: {
	            display: false
	        },
	        gridLines: {
	          display: false,
	        }
	      }],
	      yAxes: [{
	        stacked: true,
	        ticks: {
	          display: false,
	        },
	        gridLines: {
	          display: false,
	        },
	        type: 'linear',
	      }]
	    },
		responsive: true,
		maintainAspectRatio: false,
		legend: { 
			position: 'bottom' 
		},
	}
});

// /////////////////////////////////
/*
|-------------------------------
|   Donut Chart Assets & Liabilities
|-------------------------------
*/
var ctx = document.getElementById("AssetAndLibilitiesDonutChart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
      'Personal Assets', 
      'Unliquid Assets',
      'Liquid Assets',

      'Debts / Liabilities',
    ],
    datasets: [{
    label: [
      'Personal Assets', 
      'Unliquid Assets',
      'Liquid Assets',

      'Debts / Liabilities',
    ],
      data: [{!! implode(", ", $netWorthDonutChart) !!}],
      backgroundColor: [
        '#4F2CFF',
        '#3B83FF',
        '#FFE700',

        '#ff903b',
      ],
      borderColor: [
        '#4F2CFF',
        '#3B83FF',
        '#FFE700',

        '#ff903b',
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

// __________________________________ ASSETS _____________________________


// /////////////////////////////////
/*
|-------------------------------
|		Donut Chart Assets
|-------------------------------
*/
// var ctx = document.getElementById("NetworthAssetDonutChart");
// var myChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     labels: [
//     	'Personal Assets', 
//     	'Uniquid Assets',
//     	'Liquid Assets',
//     ],
//     datasets: [{
// 		label: [
// 			'Personal Assets', 
// 			'Uniquid Assets',
// 			'Liquid Assets',
// 		],
//       data: [{!! implode(", ", $netWorthAssetDonutChart) !!}],
//       backgroundColor: [
//         '#4F2CFF',
//         '#3B83FF',
//         '#FFE700',
//       ],
//       borderColor: [
//         '#4F2CFF',
//         '#3B83FF',
//         '#FFE700',
//       ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//    	cutoutPercentage: 60,
//     responsive: true,
//     legend: { 
//     	position: 'none',
//     },

//   }
// });


// __________________________________ LIABILITIES _____________________________


// /////////////////////////////////
/*
|-------------------------------
|		Donut Chart Liabilities
|-------------------------------
*/
// var ctx = document.getElementById("NetworthLiabilitiesDonutChart");
// var myChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     labels: [
//     	'Debts / Liabilities',
//     ],
//     datasets: [{
// 		label: [
// 			'Debts / Liabilities',
// 		],
//       data: [{!! implode(", ", $netWorthLiabilitiesDonutChart) !!}],
//       backgroundColor: [
//         '#ff903b',
//       ],
//       borderColor: [
//         '#ff903b',
//       ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//    	cutoutPercentage: 60,
//     responsive: true,
//     legend: { 
//     	position: 'none',
//     },

//   }
// });


// ___________________________________ PLAN _____________________________

/////////////////////////////////////
/*
|-------------------------------
|		Donut Chart Current Asset
|-------------------------------
*/
// var ctx = document.getElementById("DonutChartCurrentAsset");
// var myChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     labels: [
//     	'Cash & Equity', 
//     	'Local Equity', 
//     	'US Equity', 
//     	'International Equity',
//     	'Fix Income',
//     	'Properties REIT',
//     	'Direct Properties',
//     ],
//     datasets: [{
// 		label: [
// 			'Cash & Equity', 
// 	    	'Local Equity', 
// 	    	'US Equity', 
// 	    	'International Equity',
// 	    	'Fix Income',
// 	    	'Properties REIT',
// 	    	'Direct Properties',
// 		],
// 		// data: [20, 40, 51, 90, 20, 0, 10],
// 		data: [{!! implode(", ", $currentAssetDataDonutChart) !!}],
// 		backgroundColor: [
// 			'#3B83FF',
// 			'#4F2CFF',
// 			'#FFE700',
// 			'#222222',
// 			'#2CD9C5',
// 			'#FF903B',
// 			'#FF460E',
// 		],
// 		borderColor: [
// 			'#3B83FF',
// 			'#4F2CFF',
// 			'#FFE700',
// 			'#222222',
// 			'#2CD9C5',
// 			'#FF903B',
// 			'#FF460E',
// 		],
// 		borderWidth: 1
// 		}]
//   },
//   options: {
//    	cutoutPercentage: 60,
//     responsive: true,
//     legend: { 
//     	position: 'none',
//     },
// }
// });



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


/////////////////////////////////////
/*
|-------------------------------
|		Line Spot Chart Prediction
|-------------------------------
*/
// var ctx = document.getElementById("predict");
// var myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: [{!! implode(", ", $ageForGraph) !!}],
//         datasets: [{
//             label: ["Balance"],
//             borderColor: "#80b6f4",
//             pointBorderColor: "#80b6f4",
//             pointBackgroundColor: "#80b6f4",
//             pointHoverBackgroundColor: "#80b6f4",
//             pointHoverBorderColor: "#80b6f4",
//             pointBorderWidth: 10,
//             pointHoverRadius: 10,
//             pointHoverBorderWidth: 1,
//             pointRadius: 3,
//             fill: false,
//             borderWidth: 4,
//             data: [{!! implode(", ", $yearEndingBalanceForGraph) !!}]
//         }]
//     },
//     options: {
//         legend: {
//             position: "bottom"
//         },
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     fontColor: "rgba(0,0,0,0.5)",
//                     fontStyle: "bold",
//                     beginAtZero: true,
//                     maxTicksLimit: 20,
//                     padding: 20
//                 },
//                 gridLines: {
//                     drawTicks: false,
//                     display: false
//                 }

//             }],
//             xAxes: [{
//                 gridLines: {
//                     zeroLineColor: "transparent"
//                 },
//                 ticks: {
//                     padding: 20,
//                     fontColor: "rgba(0,0,0,0.5)",
//                     fontStyle: "bold"
//                 }
//             }]
//         }
//     }
// });











var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [{!! implode(", ", $ageForGraph) !!}],
        datasets: [{
              type: 'line',
              label: '{!! trans('lang.financial_plan.before_retirement') !!}',
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
               "pointBackgroundColor": "#fff",
               "pointBorderWidth": 1,
               "pointHoverRadius": 5,
               "pointHoverBackgroundColor": "#01630A",
               "pointHoverBorderColor": "#01630A",
               "pointHoverBorderWidth": 2,
               "pointRadius": 1,
               "pointHitRadius": 10,
              data: [{!! implode(", ", $yearEndingBalanceForGraph) !!}]
            },{
              type: 'line',
              label: '{!! trans('lang.financial_plan.age_chart') !!}',
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
               "pointBackgroundColor": "#fff",
               "pointBorderWidth": 1,
               "pointHoverRadius": 5,
               "pointHoverBackgroundColor": "#FF460E",
               "pointHoverBorderColor": "#FF460E",
               "pointHoverBorderWidth": 2,
               "pointRadius": 1,
               "pointHitRadius": 10,
              data: [{!! implode(", ", $yearEndingBalanceForGraphAfterRetirement) !!}]
            },{
            label: '{!! trans('lang.financial_plan.saving_withdrawl') !!}',
            data: [{!! implode(", ", $savingWidthdrawsForGraph) !!}],
            backgroundColor: '#FFE606',
            borderColor: '#FFE606',
            borderWidth: 1
        }, {
          type: 'line',
            backgroundColor: '#ff87a0',
            borderColor: '#ff87a0',
            data: [{!! implode(", ", $uncertain_top) !!}],

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
             "pointBackgroundColor": "#fff",
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
            data: [{!! implode(", ", $uncertain_bottom) !!}],
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
             "pointBackgroundColor": "#fff",
             "pointBorderWidth": 1,
             "pointHoverRadius": 5,
             "pointHoverBackgroundColor": "#f0f0f0fa",
             "pointHoverBorderColor": "#f0f0f0fa",
             "pointHoverBorderWidth": 2,
             "pointRadius": 1,
             "pointHitRadius": 10,
            label: 'Minimum Uncertainty',
            fill: false
          }]
    },
    options: {
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
                    userCallback: function(value, index, values) {
                        // Convert the number to a string and splite the string every 3 charaters from the end
                        value = value.toString();
                        //value = value.split(/(?=(?:......)*$)/);

                        // Convert the array to a string and format the output
                        //value = value.join('.');
                        return value + ' SAR';
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
                    fontStyle: "bold"
                }
            }]
        }
    }
});


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
				$("br").remove();
				$("#parent-report").addClass('container');
			},
		4000);
	});
</script>

@endsection