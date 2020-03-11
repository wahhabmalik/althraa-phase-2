@extends('dashboard.layouts.user_layout.user_questionary')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<style>



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
    /*color: #fff;*/
}
.suggested-selected:hover{
	background: #01630a;
    color: #fff;
}


























.suggested-active:before{
  background-color: #01630a !important;
  border: 4px solid #01630a !important;
  color: #fff;
}
.indicator{
  background-color: #01630a !important;
}


.suggested-active1:before{
  background-color: #fced07 !important;
  border: 4px solid #fced07 !important;
  color: #fff;
}
.indicator1{
  background-color: #fced07 !important;
}


.suggested-active2:before{
	background-color: #e32d2d !important;
  border: 4px solid #e32d2d !important;
  color: #fff;
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
  width: 14.33%;
  position: relative;
  text-align: center;
  cursor: auto;
}
.progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 60px;
  height: 60px;
  line-height : 55px;
  border: 4px solid #ddd;
  border-radius: 100%;
  display: block;
  text-align: center;
  margin: 0 auto 10px auto;
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


/*.progressbar li:second-child {
  background-color: yellow;
}*/

a.select-plan {
  font-size: 1.2rem;
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

</style>
@endsection
@section('content')
<div class="container mt-5 mb-5" {{ $not_found ?? '' }}>
{{-- <div class="content__body" > --}}
	<div class="row">
		<div class="col-lg-6 col-md-4 col-sm-2">
			<h3 class="user__intro">Results</h3>
		</div>
		<div class="col-lg-6 col-md-8 col-sm-10 text-lg-right text-md-right text-sm-right">
			<a 
				{{-- href="#planModal"  --}}
				href="{{ route('investment_evaluation_with_a_plan',app()->getLocale()) }}" 
				class="button_white" 
				{{-- data-toggle="modal"  --}}
				{{-- data-target="#planModal" --}}
			>Go to Plan &rarr;</a>

			{{-- <button onclick="window.print();" class="button">Print / Save Resullts <i class="fa fa-arrow-circle-down"></i></button> --}}
			{{-- @if(auth()->user()->hasRole('admin'))
				<a class="button" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@else
				<a class="button" href="{{ route('plan_selection', app()->getLocale()) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@endif --}}
            
            {{-- <br>
			<a href="#" id="downloadPdf">Download Report Page as PDF</a>
            <br>
            <a id="clickbind" href="#">Click</a>
            <br>
            <button onclick="javascript:demoFromHTML();">PDF</button> --}}
		</div>
	</div>
	<div class="s-50"></div>

	<h3 class="user__intro text_grey">Saving Evaluation</h3>
	
	<div class="s-50"></div>

	<div class="row" id="reportPage">
		<div class="col-lg-6 col-md-6 col-sm-12 mb-5">
			<p>Net Personal Income</p>
			<h1 class="income">
				{{ $netPersonalIncome ?? 0 }} SAR
			</h1>
			<br>
			<br>
			<p>Saving Evaluation</p>
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
		    	<div class="col-2 emoji"><p>😣</p><p>Broken</p></div>
				<div class="col-2 emoji"><p>😥</p><p>Poor Saver</p></div>
				<div class="col-2 emoji"><p>🙂</p><p>Good Saver</p></div>
				<div class="col-1 emoji"><p></p><p></p></div>
				<div class="col-2 emoji"><p>😁</p><p>Excellent Saver</p></div>
				<div class="col-1 emoji"><p></p><p></p></div>
				<div class="col-2 emoji"><p>🤑</p><p>Wealthy</p></div>
			</div>
			<br>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 mt-sm-5">
			<div class="row">
				<div class="col-lg-3 col-md-1 col-sm-3 col-3"></div>
				<div class="col-lg-3 col-md-5 col-sm-3 col-3">
					<div class="wrapper">
						<canvas id="barChartCurrentSaving"></canvas>
					</div>
					<div class="text-center mt-5">
						<h3>{{ 'Current' }}</h3>
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
				<div class="col-lg-3 col-md-5 col-sm-3 col-3">
					<div class="wrapper">
						<canvas id="barChartPossibleSaving"></canvas>
					</div>
					<div class="text-center mt-5">
						<h3>{{ 'Possible' }}</h3>
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

	<h3 class="user__intro text_grey">Networth Evaluation</h3>
	
	<div class="s-50"></div>

	<h4 class="dashboard_text text_black">Dashboard</h4>
	<div class="row">
		<div class="col-lg-5 col-md-4 col-sm-12 mb-sm-5">
			<div class="s-100"></div>
			<h1 class="income income_network mb-sm-5">
				{{ $totalNetworth ?? 0 }} SAR
				{{-- <br> --}}
				<p style="font-size: 1.75rem;" class="text-center">
					Net Worth
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
					<p class="graph_inner inner_price">
						{{ $totalNetworth ?? 0 }} SAR
					</p>
		    		<p class="graph_inner">Net Worth</p>
					<div class="text-center mt-1">
						<p>
							<span class="badge" style="background-color: #3b83ff; display: inline-block; width: 12px; height: 12px;"></span>
							{{ $networthTotalInvestmentOrAssets ?? 0 }} SAR

							&nbsp; &nbsp; &nbsp; &nbsp;

							<span class="badge" style="background-color: #ff903b; display: inline-block; width: 12px; height: 12px;"></span>
							{{ $networthTotalDebtsOrLiabilities ?? 0 }} SAR
						</p>
					</div>
					<div class="s-50"></div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-2 col-2"></div>
			</div>
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-6">
					@if(auth()->user()->hasRole('admin'))
						<a href="{{ route('networth', [app()->getLocale(), 'assets', $user]) }}" class="button_white btn_full_width">View Assets</a>
					@else
						<a href="{{ route('networth', [app()->getLocale(), 'assets']) }}" class="button_white btn_full_width">View Assets</a>
					@endif
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-6">
					@if(auth()->user()->hasRole('admin'))
						<a href="{{ route('networth', [app()->getLocale(), 'liabilities', $user]) }}" class="button_white btn_full_width">View Liabilities</a>
					@else
						<a href="{{ route('networth', [app()->getLocale(), 'liabilities']) }}" class="button_white btn_full_width">View Liabilities</a>
					@endif
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div>

	<div class="s-100"></div>

	<h3 class="user__intro text_grey">Current Asset Allocation</h3>
	<div class="s-50"></div>

	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-4"></div>
		<div class="col-lg-8 col-md-8 col-sm-4">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-3"></div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-6">
					<canvas id="DonutChartCurrentAsset" width="400" height="400"></canvas>
				    <!--graph inner-->
				    <p class="graph_inner_caa inner_price">
				    	{{ $totalCAA ?? 0 }} SAR
				    </p>
				    <p class="graph_inner_caa">
				    	{{ round($totalCAAPercentage, 2) ?? 0 }} %
				    </p>

				    <div class="s-50"></div>
				</div>
				<div class="col-lg-3 col-md-3 col-3"></div>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4"></div>
	</div>

	<div class="row mb-5">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table">
				  <tbody>
				    <tr>
				      <td><div class="table_color" style="background-color: #3B83FF;"></div></td>
				      <td><p>Cash and Equity</p></td>
				      <td>
				      	<p class="text_black text-right">
				      		{{ round($cashAndDepositsCAAPercentage["percentage"], 2) }} %
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
				      <td><p>Local Equity</p></td>
				      <td>
				      	<p class="text_black text-right">
				      		{{ round($localEquityCAAPercentage["percentage"], 2) }} %
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
				      <td><p>US Equity</p></td>
				      <td>
				      	<p class="text_black text-right">
				      		{{ round($internationalEquityCAAPercentage["percentage"], 2) }} %
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
				      <td><p>International Equity</p></td>
				      <td>
				      	<p class="text_black text-right">
				      		{{ round($governmentBondsCAAPercentage["percentage"], 2) }} %
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
				      <td><p>Fix Income</p></td>
				      <td>
				      	<p class="text_black text-right">
				      		{{ round($corporateBondsCAAPercentage["percentage"], 2) }} %
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
				      <td><p>Local Real Estate</p></td>
				      <td>
				      	<p class="text_black text-right">
				      		{{ round($localRealEstateCAAPercentage["percentage"], 2) }} %
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
				      <td><p>International Real Estate</p></td>
				      <td>
				      	<p class="text_black text-right">
				      		{{ round($internationalRealEstateCAAPercentage["percentage"], 2) }} %
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
								{{-- <span class="badge" style="background-color: #01630a8f; display: inline-block;  width: 12px; height: 12px;"></span> --}}
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
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12"></div>
					</div>
                	{{-- <div class="row">
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
					</div> --}}

					
					<br>
					<br>
					<div class="row">
				        <div class="col-sm-12">
				          <ul class="progressbar">
				            
				              <li class="active {{ (($suggestion ?? '') == 'conservative_c1') ? 'suggested-active' : '' }}">
				                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c1']) }}">
				                    More Conservative
				                  </a>
				              </li>
				            </a>
				            <li class="active {{ (($suggestion ?? '') == 'conservative_c2') ? 'suggested-active' : '' }}" >
				              <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c2']) }}">
				                  Conservative
				              </a>
				            </li>
				            <li class="active1 {{ (($suggestion ?? '') == 'natural_n1') ? 'suggested-active1' : '' }}" >
				              <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n1']) }}">
				                Below Average
				              </a>
				            </li>
				            <li class="active1 {{ (($suggestion ?? '') == 'natural_n2') ? 'suggested-active1' : '' }}" >
				              <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n2']) }}">
				                Above average
				              </a>
				            </li>
				            <li class="active2 {{ (($suggestion ?? '') == 'aggressive_a1') ? 'suggested-active2' : '' }}" >
				              <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a1']) }}">
				                Aggressive
				              </a>
				            </li>
				            <li class="active2 {{ (($suggestion ?? '') == 'aggressive_a2') ? 'suggested-active2' : '' }}" >
				              <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a2']) }}">
				                More Aggressive
				              </a>
				            </li>
				          </ul>
				          <br>
				          <br>
				         
				        </div>
				      </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
|		Donut Chart Assets & Liabilities
|-------------------------------
*/
var ctx = document.getElementById("AssetAndLibilitiesDonutChart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
    	'Assets / Investments', 
    	'Debts / Liabilities',
    ],
    datasets: [{
		label: [
			'Assets / Investments', 
			'Debts / Liabilities',
		],
      data: [{!! implode(", ", $netWorthDonutChart) !!}],
      backgroundColor: [
        '#3B83FF',
        '#FF903B',
      ],
      borderColor: [
        '#3B83FF',
        '#FF903B',
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


////////////////////////////////////
// var ctx = document.getElementById("myChart1");
// var myChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     //labels: ['Cash', 'Investments', 'Retirement', 'Personal'],
//     datasets: [{
//       label: '# of Tomatoes',
//       data: [12, 5, 3, 2],
//       backgroundColor: [
//         '#4F2CFF',
//         '#3B83FF',
//         '#FFE700',
//         '#2CD9C5'
//       ],
//       borderColor: [
//         '#4F2CFF',
//         '#3B83FF',
//         '#FFE700',
//         '#2CD9C5'
//       ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//    	cutoutPercentage: 60,
//     responsive: true,

//   }
// });


////////////////////////////////////
// var ctx = document.getElementById("myChart2");
// var myChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     //labels: ['Cash', 'Investments', 'Retirement', 'Personal'],
//     datasets: [{
//       label: '# of Tomatoes',
//       data: [50000, 4110],
//       backgroundColor: [
//         '#ED410D',
//         '#FF903B'
//       ],
//       borderColor: [
//         '#ED410D',
//         '#FF903B'
//       ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//    	cutoutPercentage: 60,
//     responsive: true,

//   }
// });



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
    	'Local Real Estate',
    	'International Real Estate',
    ],
    datasets: [{
		label: [
			'Cash & Equity', 
	    	'Local Equity', 
	    	'US Equity', 
	    	'International Equity',
	    	'Fix Income',
	    	'Local Real Estate',
	    	'International Real Estate',
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

</script>

<script type="text/javascript">
    $(document).ready(function() {
	// download pdf
	    $('#downloadPdf').click(function(event) {
	      // get size of report page
	      var reportPageHeight = $('#reportPage').innerHeight();
	      var reportPageWidth = $('#reportPage').innerWidth();
	      
	      // create a new canvas object that we will populate with all other canvas objects
	      var pdfCanvas = $('<canvas />').attr({
	        id: "canvaspdf",
	        width: reportPageWidth,
	        height: reportPageHeight
	      });
	      
	      // keep track canvas position
	      var pdfctx = $(pdfCanvas)[0].getContext('2d');
	      var pdfctxX = 0;
	      var pdfctxY = 0;
	      var buffer = 100;
	      
	      // for each chart.js chart
	      // $("canvas").each(function(index) {
	      //   // get the chart height/width
	      //   var canvasHeight = $(this).innerHeight();
	      //   var canvasWidth = $(this).innerWidth();
	        
	      //   // draw the chart into the new canvas
	      //   pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
	      //   pdfctxX += canvasWidth + buffer;
	        
	      //   // our report page is in a grid pattern so replicate that in the new canvas
	      //   if (index % 2 === 1) {
	      //     pdfctxX = 0;
	      //     pdfctxY += canvasHeight + buffer;
	      //   }
	      // });
	      
	      // create new pdf and add our new canvas as an image
	      var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
	      pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
	      
	      // download the pdf
	      pdf.save('filename.pdf');
	    });



	    function onClick() {
	        var pdf = new jsPDF('p', 'pt', 'letter');
	        pdf.canvas.height = 72 * 11;
	        pdf.canvas.width = 72 * 8.5;

	        pdf.fromHTML(document.body);

	        pdf.save('test.pdf');
	    };

	    var element = document.getElementById("clickbind");
	    element.addEventListener("click", onClick);

    });

    function demoFromHTML() {
	    var pdf = new jsPDF('p', 'pt', 'letter');
	    // source can be HTML-formatted string, or a reference
	    // to an actual DOM element from which the text will be scraped.
	    source = $('#reportPage')[0];

	    // we support special element handlers. Register them with jQuery-style 
	    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
	    // There is no support for any other type of selectors 
	    // (class, of compound) at this time.
	    specialElementHandlers = {
	        // element with id of "bypass" - jQuery style selector
	        '#bypassme': function (element, renderer) {
	            // true = "handled elsewhere, bypass text extraction"
	            return true
	        }
	    };
	    margins = {
	        top: 80,
	        bottom: 60,
	        left: 40,
	        width: $('#reportPage').innerWidth(),
	    };
	    // all coords and widths are in jsPDF instance's declared units
	    // 'inches' in this case
	    pdf.fromHTML(
	    source, // HTML string or DOM elem ref.
	    margins.left, // x coord
	    margins.top, { // y coord
	        'width': margins.width, // max width of content on PDF
	        'elementHandlers': specialElementHandlers
	    },

	    function (dispose) {
	        // dispose: object with X, Y of the last line add to the PDF 
	        //          this allow the insertion of new lines after html
	        pdf.save('Test.pdf');
	    }, margins);
    }
</script>
<script>
// $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
// });
</script>
@endsection