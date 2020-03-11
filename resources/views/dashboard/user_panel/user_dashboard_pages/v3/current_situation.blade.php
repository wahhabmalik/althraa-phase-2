@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_dashboard')

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
.suggested-selected{
  background: #01630a8f;
    color: #fff;
}
.suggested-selected:hover{
  background: #01630a;
    color: #fff;
}
</style>
@endsection


@section('content')
<div class="content">
  <div class="container">
    <div class="row {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
      <div class="col-sm-6">
        <h2 class="user__intro">{{ trans('lang.current_state.current_state') }}</h2>
        <p>{{ trans('lang.current_state.this_is_how_are_you_currently_performing') }}</p>
      </div>
      <div class="col-sm-6">
        @if(auth()->user()->hasRole('admin'))
        {{-- <a class="button float-right" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
          Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
        </a> --}}
      @else
        {{-- <a class="button float-right" href="{{ route('plan_selection', app()->getLocale()) }}">
          Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
        </a> --}}
      @endif
      </div>
    </div>
    
    {{-- ___________________________________________________________________ --}}
    {{-- saving evaluation --}}
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a href="#tab1_saving_evaluation" class="nav-link active" data-toggle="tab">{{ trans('lang.current_state.saving_evaluation') }}</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="s-50"></div>
      <div id="tab1_saving_evaluation" class="tab-pane show active">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
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
              <div class="progress-bar" role="progressbar" aria-valuenow="{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}%" data-toggle="tooltip" title="{{ round($currentSavingRate["currentSavingRatePercentage"]) ?? 0 }}%">
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

          {{-- <div class="col-lg-1 border-right"></div> --}}

          <div class="col-lg-6 col-md-12 col-sm-12 mt-sm-5">
            <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-6 col-12"></div>
              <div class="col-lg-4 col-md-3 col-sm-6 col-6">
                <div class="wrapper">
                  <canvas id="barChartCurrentSaving"></canvas>
                </div>
                <div class="text-center mt-5">
                  <h3>{{ trans('lang.current_state.current') }}</h3>
                  <p>
                    <span class="badge" style="background-color: #ff903b; display: inline-block;  width: 12px; height: 12px;"></span>
                    {{ round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0 }} %
                  </p>
                  <p>
                    <span class="badge" style="background-color: #3b83ff; display: inline-block;  width: 12px; height: 12px;"></span>
                    {{ 100 - (round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0) }} %
                  </p>
                </div>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-6 col-6">
                <div class="wrapper">
                  <canvas id="barChartPossibleSaving"></canvas>
                </div>
                <div class="text-center mt-5">
                  <h3>{{ trans('lang.current_state.possible') }}</h3>
                  <p>
                    <span class="badge" style="background-color: #ff903b; display: inline-block; width: 12px; height: 12px;"></span>
                    {{ round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0 }} %
                  </p>
                  <p>
                    <span class="badge" style="background-color: #3b83ff; display: inline-block; width: 12px; height: 12px;"></span>
                    {{ 100 - (round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0) }} %
                  </p>
                </div>
              </div>
              <div class="col-lg-2  col-md-3 col-sm-6 col-6"></div>
            </div>
          </div>
        </div>
      </div>      
    </div>


    <br>
    <br>
    <br>
    <br>


    {{-- ___________________________________________________________________ --}}
                              {{-- networth evaluation --}}
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a href="#tab2_networth_evaluation" class="nav-link active" data-toggle="tab">{{ trans('lang.current_state.networth_evaluation') }}</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="s-50"></div>
        <div id="tab2_networth_evaluation"  class="tab-pane show active">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-6">
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

            <div class="col-lg-6 col-md-6 col-sm-12 mt-sm-5">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                  <canvas id="AssetAndLibilitiesDonutChart" width="400" height="400"></canvas>
                  <p class="graph_inner inner_price">
                    {{ $totalNetworth ?? 0 }} SAR
                  </p>
                    <p class="graph_inner">{{ trans('lang.current_state.networth') }}</p>
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
                <div class="col-lg-2 col-md-2 col-sm-2 col-2"></div>
              </div>
            </div>
          </div>
        </div>     
    </div>


    <br>
    <br>
    <br>
    <br>


    {{-- ___________________________________________________________________ --}}
                                    {{-- assets --}}
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a href="#tab3_assets" class="nav-link active" data-toggle="tab">{{ trans('lang.question.assets') }}</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="s-50"></div>
        <div id="tab3_assets"  class="tab-pane show active">
          <div class="row {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
          <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 25px;">
            <div class="row">
              <div class="col-sm-3 col-2"></div>
              <div class="col-md-12 col-sm-6 col-8 text-center">
                {{-- <canvas id="NetworthAssetDonutChart" width="400" height="400"></canvas> --}}

                {{-- <p class="graph_inner inner_price"> --}}
                <p class=" inner_price">
                  {{ $networthTotalInvestmentOrAssets ?? 0 }} SAR
                </p>

                  {{-- <p class="graph_inner"> --}}
                  <p class="">
                    {{ trans('lang.current_state.total_assets') }}
                  </p>
                <div class="s-20"></div>
              </div>
              <div class="col-sm-3 col-2"></div>
            </div>
          </div>
          <div class="col-lg-6 col-md-8 col-sm-12 offset-lg-2 text-right">
            <div class="table-responsive">
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
            </div>

            <div class="s-50"></div>

            <div class="table-responsive">
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
            </div>

            <div class="s-50"></div>

            <div class="table-responsive">
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
            </div>

            <div class="s-50"></div>
          </div>
            
        </div>
        </div>     
    </div>



    {{-- ___________________________________________________________________ --}}
                                    {{-- liabilities --}}
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a href="#tab4_liabilities" class="nav-link active" data-toggle="tab">{{ trans('lang.current_state.liabilities') }}</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="s-50"></div>
        <div id="tab4_liabilities"  class="tab-pane show active">
          <div class="row {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
          <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 25px;">
            <div class="row">
              <div class="col-sm-3 col-2"></div>
              <div class="col-md-12 col-sm-6 col-8 text-center">
                {{-- <canvas id="NetworthLiabilitiesDonutChart" width="400" height="400"></canvas> --}}

                {{-- <p class="graph_inner inner_price"> --}}
                <p class=" inner_price">
                  {{ $networthTotalDebtsOrLiabilities ?? 0 }} SAR
                </p>

                  {{-- <p class="graph_inner"> --}}
                  <p class="">
                    {{ trans('lang.current_state.total_liabilities') }}
                  </p>
                <div class="s-20"></div>

              </div>
              <div class="col-sm-3 col-2"></div>
            </div>
          </div>
          <div class="col-lg-6 col-md-8 col-sm-12 offset-lg-2">
            <div class="table-responsive">
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
            </div>

            <div class="s-50"></div>
          </div>
            
        </div>

        </div>     
    </div>



    {{-- ___________________________________________________________________ --}}
                                    {{-- investment evaluation --}}
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a href="#tab5_investment_evaluation" class="nav-link active" data-toggle="tab">{{ trans('lang.current_state.investment_evaluation') }}</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="s-50"></div>
        <div id="tab5_investment_evaluation"  class="tab-pane show active">
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h3 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}"><span class="text_grey congrats_text">&nbsp;{{ trans('lang.current_state.at_age') }}{{ $ending_age ?? 0 }} {{ trans('lang.current_state.you_will_have_savings_balance_of') }}  {{ round($savingsAtEndingAge[$ending_age]['year_ending_balance'] ?? 0) }} SAR.</span></h3>
                
              <div class="s-50"></div>
          </div>
            
        </div>

        </div>     
    </div>



  </div>
</div>
@endsection




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
////////////////////////////////////
/*
|-------------------------------
|   Bar Chart Current Saving
|-------------------------------
*/
var ctx = document.getElementById("barChartCurrentSaving").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    datasets: [{
      label: '{{ trans('lang.current_state.saving') }}',
      backgroundColor: "#FF903B",
      data: [{!! round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0 !!}],
    }, {
      label: '{{ trans('lang.current_state.spending') }}',
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
|   Bar Chart Current Saving
|-------------------------------
*/
var ctx = document.getElementById("barChartPossibleSaving").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    datasets: [{
      label: '{{ trans('lang.current_state.spending') }}',
      backgroundColor: "#3B83FF",
      data: [{!! 100 - (round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0) !!}],
    },
    {
      label: '{{ trans('lang.current_state.saving') }}',
      backgroundColor: "#FF903B",
      data: [{!! round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0 !!}],
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
      '{{ trans('lang.current_state.personal_assets') }}', 
      '{{ trans('lang.current_state.unliquid_assets') }}',
      '{{ trans('lang.current_state.liquid_assets') }}',

      'Debts / Liabilities',
    ],
    datasets: [{
    label: [
      '{{ trans('lang.current_state.personal_assets') }}', 
      '{{ trans('lang.current_state.unliquid_assets') }}',
      '{{ trans('lang.current_state.liquid_assets') }}',

      '{{ trans('lang.current_state.debts_liabilities') }}',
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


// /////////////////////////////////
/*
|-------------------------------
|   Donut Chart Assets
|-------------------------------
*/
var ctx = document.getElementById("NetworthAssetDonutChart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
      'Personal Assets', 
      'Unliquid Assets',
      'Liquid Assets',
    ],
    datasets: [{
    label: [
      'Personal Assets', 
      'Unliquid Assets',
      'Liquid Assets',
    ],
      data: [{!! implode(", ", $netWorthAssetDonutChart) !!}],
      backgroundColor: [
        '#4F2CFF',
        '#3B83FF',
        '#FFE700',
      ],
      borderColor: [
        '#4F2CFF',
        '#3B83FF',
        '#FFE700',
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


// /////////////////////////////////
/*
|-------------------------------
|   Donut Chart Liabilities
|-------------------------------
*/
var ctx = document.getElementById("NetworthLiabilitiesDonutChart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
      'Debts / Liabilities',
    ],
    datasets: [{
    label: [
      'Debts / Liabilities',
    ],
      data: [{!! implode(", ", $netWorthLiabilitiesDonutChart) !!}],
      backgroundColor: [
        '#ff903b',
      ],
      borderColor: [
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

</script>
<script type="text/javascript">
  $('[data-toggle="tooltip"]').tooltip();
</script>
@endsection