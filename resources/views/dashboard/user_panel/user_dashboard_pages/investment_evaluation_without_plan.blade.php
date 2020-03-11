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
        <div class="container {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
          <div class="row">
            <div class="col-sm-6">
              <h2 class="user__intro">Investment Evaluation (Without Plan)</h2>
              <p>This is how you could be performing (based on questionnaire).</p>
            </div>
            <div class="col-sm-6">
              @if(auth()->user()->hasRole('admin'))
                <a class="button {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }}" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
                  Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
                </a>
              @else
                <a class="button {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }}" href="{{ route('plan_selection', app()->getLocale()) }}">
                  Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
                </a>
              @endif
            </div>
          </div>
          
          
          <ul class="nav nav-tabs potential" role="tablist">
            <li class="nav-item potential_li">
              <a href="#tab1" class="nav-link active" data-toggle="tab">Current Assets Allocation</a>
            </li>
            <li class="nav-item potential_li">
              <a href="#tab2" class="nav-link" data-toggle="tab">Age Chart</a>
            </li>
            <li class="nav-item potential_li">
              <a href="#tab3" class="nav-link" data-toggle="tab">Inputs</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="s-50"></div>


            <div id="tab1" class="tab-pane show active">

              <h3 class="user__intro text_grey">Asset Allocation</h3>
              <div class="s-50"></div>

              <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-2 col-3"></div>
                <div class="col-lg-4 col-md-6 col-sm-8 col-6">

                  <canvas id="DonutChartCurrentAsset" width="400" height="400"></canvas>
                  <!--graph inner-->
                  <p class="graph_inner inner_price">
                    ${{ $totalCAA ?? 0 }}
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

              <div class="s-20"></div>

            </div>



            <div id="tab2" class="tab-pane">

              <div class="s-50"></div>
              
              <div class="row">
                <div class="col-sm-12">
                  <canvas id="predict" width="1600" height="900"></canvas>
                </div>
              </div>


              <div class="s-20"></div>
              <h4 class="dashboard_text text_grey">Chart Details</h4> 
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
            </div>

            <div id="tab3" class="tab-pane">
              <div class="s-20"></div>
              <h4 class="dashboard_text text_grey">Input</h4> 

              <div class="row">
                <div class="col-sm-6">
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
                <div class="col-sm-6">
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
            </div>
            
      </div>
@endsection




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">


/////////////////////////////////////
/*
|-------------------------------
|   Donut Chart Current Asset
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
|   Donut Chart Selected Asset
|-------------------------------
*/


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


</script>

@endsection