@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts..user_layout.user_dashboard')

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
    <div class="row">
      <div class="col-sm-6 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
        <h2 class="user__intro">Networth Evaluation</h2>
        <p>This is how are you currently performing.</p>
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
    
      <div class="s-50"></div>
      <div id="tab2_networth_evaluation" class="tab-pane">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 mb-sm-5">
            <div class="s-100"></div>
            <h1 class="income income_network mb-sm-5 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
              {{ $totalNetworth ?? 0 }} SAR
              {{-- <br> --}}
              <p style="font-size: 1.75rem;" class="text-center">
                Net Worth
              </p>
            </h1>
            <br>
            <br>
          </div>

          <div class="col-lg-1 col-md-1 border-right"></div>

          <div class="col-lg-6 col-md-6 col-sm-12 mt-sm-5">
            <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-2 col-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                <canvas id="AssetAndLibilitiesDonutChart" width="400" height="400"></canvas>
                <p class="graph_inner inner_price">
                  {{ $totalNetworth ?? 0 }} SAR
                </p>
                  <p class="graph_inner">Net Worth</p>
                <div class="text-center mt-1">
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                      <p>
                        <span class="badge" style="background-color: #3b83ff; display: inline-block; width: 12px; height: 12px;"></span>
                        {{ $networthTotalInvestmentOrAssets ?? 0 }} SAR
                      </p>
                      <p>
                        {{ trans('lang.reports.assets') }}
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                      <p>
                        <span class="badge" style="background-color: #ff903b; display: inline-block; width: 12px; height: 12px;"></span>
                        {{ $networthTotalDebtsOrLiabilities ?? 0 }} SAR
                      </p>
                      <p>
                        {{ trans('lang.reports.debts_liabilities') }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="s-50"></div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-2"></div>
            </div>

            <div class="row">
              <div class="col-lg-1"></div>
              <div class="col-lg-5 col-md-6 col-sm-6 col-6">
                @if(auth()->user()->hasRole('admin'))
                  <a href="{{ route('networthevaluation', [app()->getLocale(), 'assets', $user]) }}" class="button_white btn_full_width">
                    {{ trans('lang.reports.view_assets') }}
                  </a>
                @else
                  <a href="{{ route('networthevaluation', [app()->getLocale(), 'assets']) }}" class="button_white btn_full_width">
                    {{ trans('lang.reports.view_assets') }}
                  </a>
                @endif
              </div>
              <div class="col-lg-5 col-md-6 col-sm-6 col-6">
                @if(auth()->user()->hasRole('admin'))
                  <a href="{{ route('networthevaluation', [app()->getLocale(), 'liabilities', $user]) }}" class="button_white btn_full_width">
                    {{ trans('lang.reports.view_liabilities') }}
                  </a>
                @else
                  <a href="{{ route('networthevaluation', [app()->getLocale(), 'liabilities']) }}" class="button_white btn_full_width">
                    {{ trans('lang.reports.view_liabilities') }}
                  </a>
                @endif
              </div>
              <div class="col-lg-1"></div>
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


</script>
<script type="text/javascript">
  $('[data-toggle="tooltip"]').tooltip();
</script>
@endsection