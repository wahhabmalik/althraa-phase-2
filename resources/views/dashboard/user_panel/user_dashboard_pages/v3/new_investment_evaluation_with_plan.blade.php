@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts..user_layout.user_dashboard')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<style>

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


.suggested-active2:before {
  background-color: #e32d2d !important;
  border: 4px solid #e32d2d !important;
  color: #fff;
}
.indicator2{
  background-color: #e32d2d !important;
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
  text-align: center;
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

.btm_table {
  font-size: 1.3rem !important;
}
</style>
@endsection


@section('content')

{{-- {{ dd($uncertain_top, $uncertain_bottom, $yearEndingBalanceForGraphAfterRetirement) }} --}}
<div class="content">
        <div class="container {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
          <div class="row">
            <div class="col-sm-6">
              <h2 class="user__intro">{{ trans('lang.financial_plan.fiancial_plan') }}</h2>
              <p>{{ trans('lang.financial_plan.this_is_how_you_could_be') }}</p>
            </div>
            <div class="col-sm-6">
              @if(auth()->user()->hasRole('admin'))
                <a class="button {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }}" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
                  Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
                </a>
              @else
                <a class="button {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }}" href="{{ route('pdf_report', [app()->getLocale(), $type]) }}">
                  {{ trans('lang.financial_plan.print_save_result') }} &nbsp; <i class="fa fa-arrow-circle-down"></i>
                </a>
              @endif
            </div>
          </div>
          
          
          <ul class="nav nav-tabs potential" role="tablist">
            <li class="nav-item potential_li">
              <a href="#tab1" class="nav-link active" data-toggle="tab">{{ trans('lang.financial_plan.asset_allocation') }}</a>
            </li>
            <li class="nav-item potential_li">
              <a href="#tab2" class="nav-link" data-toggle="tab">{{ trans('lang.financial_plan.chart') }}</a>
            </li>
            <li class="nav-item potential_li">
              <a href="#tab3" class="nav-link" data-toggle="tab">{{ trans('lang.financial_plan.input') }}</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="s-50"></div>


            <div id="tab1" class="tab-pane show active">


              <div class="s-20"></div>

              <h4 class="dashboard_text text_grey">{{ trans('lang.financial_plan.suggested_risk_tolerance') }}</h4>  

              <div class="s-35"></div>

              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                  <h4>
                    <span class="badge
                    {{ (($type ?? '') == 'conservative_c1') ? 'indicator-selected' : '' }}
                    {{ (($type ?? '') == 'conservative_c2') ? 'indicator-selected' : '' }}
                    {{ (($type ?? '') == 'natural_n1') ? 'indicator-selected' : '' }}
                    {{ (($type ?? '') == 'natural_n2') ? 'indicator-selected' : '' }}
                    {{ (($type ?? '') == 'aggressive_a1') ? 'indicator-selected' : '' }}
                    {{ (($type ?? '') == 'aggressive_a2') ? 'indicator-selected' : '' }}
                    " style="background-color: #ffe700; display: inline-block;  width: 12px; height: 12px;"></span>
                    {{ trans('lang.financial_plan.selected') }}
                    &nbsp;&nbsp;&nbsp;
                    <span class="badge 
                    {{ (($suggestion ?? '') == 'conservative_c1') ? 'indicator-suggested' : '' }}
                    {{ (($suggestion ?? '') == 'conservative_c2') ? 'indicator-suggested' : '' }}
                    {{ (($suggestion ?? '') == 'natural_n1') ? 'indicator-suggested' : '' }}
                    {{ (($suggestion ?? '') == 'natural_n2') ? 'indicator-suggested' : '' }}
                    {{ (($suggestion ?? '') == 'aggressive_a1') ? 'indicator-suggested' : '' }}
                    {{ (($suggestion ?? '') == 'aggressive_a2') ? 'indicator-suggested' : '' }}
                    " style="display: inline-block;  width: 12px; height: 12px;"></span>
                    {{ trans('lang.financial_plan.suggested') }}
                  </h4>

                  <br>
                  <br>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
              </div>

              {{-- <div class="row">
                <div class="col-4">
                  <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c1']) }}">
                    <div class="suggested {{ ($type == 'conservative_c1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'conservative_c1') ? 'active' : '' }}">Conservative 
                      <br> (C1)
                      {{ ($type == 'conservative_c1') ? 'Selected' : '' }}
                    </div>
                  </a>
                  <br>
                  <br>
                </div>
                <div class="col-4">
                  <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c2']) }}">
                      <div class="suggested {{ ($type == 'conservative_c2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'conservative_c2') ? 'active' : '' }}">Conservative 
                      <br> (C2)
                      {{ ($type == 'conservative_c2') ? 'Selected' : '' }}
                    </div>
                  </a>
                  <br>
                  <br>
                </div>
                <div class="col-4">
                  <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n1']) }}">
                      <div class="suggested {{ ($type == 'natural_n1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'natural_n1') ? 'active' : '' }}">Natural 
                      <br> (N1)
                      {{ ($type == 'natural_n1') ? 'Selected' : '' }}
                    </div>
                  </a>
                  <br>
                  <br>
                </div>
                <div class="col-4">
                  <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n2']) }}">
                    <div class="suggested {{ ($type == 'natural_n2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'natural_n2') ? 'active' : '' }}">Natural 
                      <br> (N2)
                      {{ ($type == 'natural_n2') ? 'Selected' : '' }}
                    </div>
                  </a>
                  <br>
                  <br>
                </div>
                <div class="col-4">
                  <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a1']) }}">
                    <div class="suggested {{ ($type == 'aggressive_a1') ? 'suggested-selected' : '' }} {{ ($suggestion == 'aggressive_a1') ? 'active' : '' }}">Aggressive 
                      <br> (A1)
                      {{ ($type == 'aggressive_a1') ? 'Selected' : '' }}
                    </div>
                  </a>
                  <br>
                  <br>
                </div>
                <div class="col-4">
                  <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a2']) }}">
                    <div class="suggested {{ ($type == 'aggressive_a2') ? 'suggested-selected' : '' }} {{ ($suggestion == 'aggressive_a2') ? 'active' : '' }}">Aggressive 
                      <br> (A2)
                      {{ ($type == 'aggressive_a2') ? 'Selected' : '' }}
                    </div>
                  </a>
                  <br>
                  <br>
                </div>

              </div> --}}

      <div class="row">
        <div class="col-sm-12">
          
          <ul class="progressbar text-center">
            
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



              <br>
              <br>
              <br>



              <h3 class="user__intro text_grey">{{ trans('lang.financial_plan.asset_allocation') }}</h3>
              <div class="s-50"></div>

              <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-2 col-3"></div>
                <div class="col-lg-4 col-md-6 col-sm-8 col-6">
                  <canvas id="DonutChartSelectedAsset" width="400" height="400"></canvas>
                    <!--graph inner-->
                    <p class="graph_inner inner_price">
                      {{ $totalCAA ?? 0 }} SAR
                    </p>
                    <p class="graph_inner">
                      {{ round($totalCAAPercentage, 2) ?? 0 }} %
                    </p>

                    {{-- <div class="s-50"></div> --}}
                </div>
                <div class="col-lg-4 col-md-3 col-sm-2 col-3"></div>
              </div>

              <div class="row mb-5">
                <div class="col-md-12">
                  <div class="table-responsive">
                    {{-- <table class="table">
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
                              {{ ($selectedAssetAllocationTable["percentage"]["cash_and_deposits"] ?? 0) * $initialInvestment }} SAR
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
                              {{ ($selectedAssetAllocationTable["percentage"]["local_equity"] ?? 0) * $initialInvestment }} SAR
                            </p>
                          </td>
                        </tr>

                        <tr>
                          <td><div class="table_color" style="background-color: #FFE700;"></div></td>
                          <td><p>US Equity</p></td>
                          <td>
                            <p class="text_black text-right">
                              {{ $selectedAssetAllocationTable["value"]["international_equity"] ?? 0 }} %
                            </p>
                          </td>
                          <td>
                            <p class="text_black text-right">
                              {{ ($selectedAssetAllocationTable["percentage"]["international_equity"] ?? 0) * $initialInvestment }} SAR
                            </p>
                          </td>
                        </tr>

                        <tr>
                          <td><div class="table_color" style="background-color: #222222;"></div></td>
                          <td><p>International Equity</p></td>
                          <td>
                            <p class="text_black text-right">
                              {{ $selectedAssetAllocationTable["value"]["government_bonds"] ?? 0 }} %
                            </p>
                          </td>
                          <td>
                            <p class="text_black text-right">
                              {{ ($selectedAssetAllocationTable["percentage"]["government_bonds"] ?? 0) * $initialInvestment }} SAR
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
                              {{ ($selectedAssetAllocationTable["percentage"]["corporate_bonds"] ?? 0) * $initialInvestment }} SAR
                            </p>
                          </td>
                        </tr>

                        <tr>
                          <td><div class="table_color" style="background-color: #FF903B;"></div></td>
                          <td><p>Local Real Estate</p></td>
                          <td>
                            <p class="text_black text-right">
                              {{ $selectedAssetAllocationTable["value"]["local_real_estate"] ?? 0 }} %
                            </p></td>
                          <td>
                            <p class="text_black text-right">
                              {{ ($selectedAssetAllocationTable["percentage"]["local_real_estate"] ?? 0) * $initialInvestment }} SAR
                            </p></td>
                        </tr>

                        <tr>
                          <td><div class="table_color" style="background-color: #FF460E;"></div></td>
                          <td><p>International Real Estate</p></td>
                          <td>
                            <p class="text_black text-right">
                              {{ $selectedAssetAllocationTable["value"]["international_real_estate"] ?? 0 }} %
                            </p></td>
                          <td>
                            <p class="text_black text-right">
                              {{ ($selectedAssetAllocationTable["percentage"]["international_real_estate"] ?? 0) * $initialInvestment }} SAR
                            </p></td>
                        </tr>


                      </tbody>
                      </table> --}}





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
                      {{ number_format($total_cash) }} SAR
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
                      {{ number_format($total_local_equity) }} SAR
                    </p>
                  </td>
                </tr>


                <tr>
                  <td><div class="table_color" style="background-color: #FFE700;"></div></td>
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
                      {{ number_format($total_international_equity) }} SAR
                    </p>
                  </td>
                </tr>

                <tr>
                  <td><div class="table_color" style="background-color: #222222;"></div></td>
                  <td><p>{{ trans('lang.question.liquid_government_bonds') }}</p></td>
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
                      {{ number_format($total_government_bonds) }} SAR
                    </p>
                  </td>
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
                      {{ number_format($total_corporate_bonds) }} SAR
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
                      {{ number_format($total_reits) }} SAR
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
                      {{ number_format($total_direct_properties) }} SAR
                    </p></td>
                </tr>


              </tbody>
              </table>







                  </div>
                </div>
              </div>
              
              {{-- <div class="s-20"></div>

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

              </div> --}}

            </div>



            <div id="tab2" class="tab-pane">
              <h3 class="user__intro">👏{{ trans('lang.financial_plan.congratulations') }}!<span class="text_grey congrats_text">&nbsp;{{ trans('lang.current_state.at_age') }} {{ $ending_age ?? 0 }} {{ trans('lang.current_state.you_will_have_savings_balance_of') }} {{ round($savingsAtEndingAge[$ending_age]['year_ending_balance'] ?? 0,0) }} SAR.</span></h3>
                
              <div class="s-50"></div>
              
              <div class="row">
                <div class="col-sm-12" id="age-chart">
                  {{-- <canvas id="predict" width="1600" height="900"></canvas> --}}
                  <canvas id="myChart" ></canvas>
                </div>
              </div>

              <div class="s-20"></div>
              <h4 class="dashboard_text text_grey">{{ trans('lang.financial_plan.chart_details') }}</h4> 
              <div class="s-50"></div>
              


              <div class="text-left">
                <h4 class="font-weight-bold {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                  {{ trans('lang.financial_plan.working_years_accumulation_phase') }}
                </h4>
              </div>


              <div class="row btm_table_fix_height mb-5">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="btm_table">{{ trans('lang.financial_plan.year') }}#</th>
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
                                    {{ number_format($savings["value_beginning_of_year"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ number_format($savings["contributions"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ number_format($savings["returns"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ number_format($savings["value_end_year"] ?? '',2) }} SAR
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


              <div class="row btm_table_fix_height mb-5">
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
                                    {{ number_format($savings["value_beginning_of_year"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ number_format($savings["withdrawl"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ number_format($savings["returns"] ?? '',2) }} SAR
                                  </td>
                                  <td class="btm_table_td">
                                    {{ number_format($savings["value_end_year"] ?? '',2) }} SAR
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

            </div>

            <div id="tab3" class="tab-pane">
              <div class="s-20"></div>
              <h4 class="dashboard_text text_grey">{{ trans('lang.financial_plan.input') }}</h4> 

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
                          <td scope="row"><p>{{ trans('lang.financial_plan.annual_increase_in_contributions') }} </p></td>
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
                        <!--<tr>-->
                        <!--  <td scope="row"><p>{{ trans('lang.financial_plan.annual_pension_benefit') }}</p></td>-->
                        <!--  <td><p class="text_black" >{{ round(($totalMonthlyIncomeAtRetirement ?? '' ) * 12, 2) }}</p></td>-->
                          
                        <!--</tr>-->
                        <!--<tr>-->
                        <!--  <td scope="row"><p>{{ trans('lang.financial_plan.annual_pension_benefit_percentage') }}</p></td>-->
                        <!--  <td><p class="text_black" >{{ $constants["Annual Pension Benefit Increases (%)"]["constant_value"] ?? '' }} %</p></td>-->
                          
                        <!--</tr>-->
                        <tr>
                          <td scope="row"><p>{{ trans('lang.financial_plan.desired_retirement_age') }}</p></td>
                          <td><p class="text_black" >{{ $retirement_age ?? 0 }}</p></td>
                          
                        </tr>
                        <tr>
                          <td scope="row"><p>{{ trans('lang.financial_plan.withdrawal_amount_per_month') }}</p></td>
                          <td><p class="text_black" >{{ $extraInfo['extra_info']['withdrawl_amount_per_month'] ?? '' }}</p></td>
                          
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
            </div>
            
      </div>
@endsection




@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">


/////////////////////////////////////
/*
|-------------------------------
|   Donut Chart Selected Asset
|-------------------------------
*/
var ctx = document.getElementById("DonutChartSelectedAsset");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
      'Cash & Equity', 
      'Local Equity', 
      'International Equity',
      'Government Bonds', 
      'Corporate Bonds',
      'Properties REIT',
      'Direct Properties',
    ],
    datasets: [{
    label: [
      'Cash & Equity', 
      'Local Equity', 
      'International Equity',
      'Government Bonds', 
      'Corporate Bonds',
      'Properties REIT',
      'Direct Properties',
    ],
    // data: [20, 40, 51, 90, 20, 0, 10],
    data: [{!! implode(", ", $selectedAssetDataDonutChart) !!}],
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
|   Donut Chart Selected Asset
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
                "#81c36b"
                
               ],
               "borderColor": [
                "#81c36b"
               ],
               "borderCapStyle": "butt",
               "borderDash": [],
               "borderDashOffset": 0,
               "borderJoinStyle": "miter",
               "pointBorderColor": [
                "#81c36b"
               ],
               "pointBackgroundColor": "#fff",
               "pointBorderWidth": 1,
               "pointHoverRadius": 5,
               "pointHoverBackgroundColor": "#81c36b",
               "pointHoverBorderColor": "#81c36b",
               "pointHoverBorderWidth": 2,
               "pointRadius": 0.001,
               "pointHitRadius": 10,
               "borderWidth": 1.5,
              data: [{!! implode(", ", $yearEndingBalanceForGraph) !!}]
            },{
              type: 'line',
              label: '{!! trans('lang.financial_plan.age_chart') !!}',
              "fill": false,
               "lineTension": 0.1,
               "backgroundColor": [
                "#cb6244"
                
               ],
               "borderColor": [
                "#cb6244"
               ],
               "borderCapStyle": "butt",
               "borderDash": [],
               "borderDashOffset": 0,
               "borderJoinStyle": "miter",
               "pointBorderColor": [
                "#cb6244"
               ],
               "pointBackgroundColor": "#fff",
               "pointBorderWidth": 1,
               "pointHoverRadius": 5,
               "pointHoverBackgroundColor": "#cb6244",
               "pointHoverBorderColor": "#cb6244",
               "pointHoverBorderWidth": 2,
               "pointRadius": 0.001,
               "pointHitRadius": 10,
               "borderWidth": 1.5,
              data: [{!! implode(", ", $yearEndingBalanceForGraphAfterRetirement) !!}]
            },{
            label: '{!! trans('lang.financial_plan.saving_withdrawl') !!}',
            data: [{!! implode(", ", $savingWidthdrawsForGraph) !!}],
            backgroundColor: '#63b6c8',
            borderColor: '#63b6c8',
            borderWidth: 1
        }, {
          type: 'line',
            backgroundColor: '#faf3e0',
            borderColor: '#faf3e0',
            data: [{!! implode(", ", $uncertain_top) !!}],

            "lineTension": 0.001,
             "backgroundColor": [
              "#faf3e0"
              
             ],
             "borderColor": [
              "#faf3e0"
             ],
             "borderCapStyle": "butt",
             "borderDash": [],
             "borderDashOffset": 0,
             "borderJoinStyle": "miter",
             "pointBorderColor": [
              "#faf3e0"
             ],
             "pointBackgroundColor": "#faf3e0",
             "pointBorderWidth": 1,
             "pointHoverRadius": 5,
             "pointHoverBackgroundColor": "#faf3e0",
             "pointHoverBorderColor": "#faf3e0",
             "pointHoverBorderWidth": 2,
             "pointRadius": 0.001,
             "pointHitRadius": 10,
            label: 'Maximum Uncertainty',
            fill: '+1'
          }, {
            type: 'line',
            backgroundColor: '#faf3e0',
            borderColor: '#faf3e0',
            data: [{!! implode(", ", $uncertain_bottom) !!}],
            "fill": false,
             "lineTension": 0.001,
             "backgroundColor": [
              "#faf3e0"
              
             ],
             "borderColor": [
              "#faf3e0"
             ],
             "borderCapStyle": "butt",
             "borderDash": [],
             "borderDashOffset": 0,
             "borderJoinStyle": "miter",
             "pointBorderColor": [
              "#faf3e0"
             ],
             "pointBackgroundColor": "#faf3e0",
             "pointBorderWidth": 1,
             "pointHoverRadius": 5,
             "pointHoverBackgroundColor": "#faf3e0",
             "pointHoverBorderColor": "#faf3e0",
             "pointHoverBorderWidth": 2,
             "pointRadius": 0.001,
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
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        if($(window).width() < 760)
                          return value;
                        else
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

function togglePropagate(btn) {
      var value = btn.classList.toggle('btn-on');
      chart.options.plugins.filler.propagate = value;
      chart.update();
    }

</script>

@endsection