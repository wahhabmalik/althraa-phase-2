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
    top: -140px;
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
.total_table {
    font-size: 20px;
   
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
<div class="container mt-5 mb-5">

{{-- <div class="content__body"> --}}
	<div class="row">
		<div class="col-lg-6 col-md-4 col-sm-2">
			<h3 class="user__intro">Results</h3>
		</div>
		<div class="col-lg-6 col-md-8 col-sm-10 text-lg-right text-md-right text-sm-right">
			<a href="#planModal" class="button_white" data-toggle="modal" data-target="#planModal">Go to Plan &rarr;</a>
			@if(auth()->user()->hasRole('admin'))
				<a class="button" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@else
				<a class="button" href="{{ route('plan_selection', app()->getLocale()) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@endif
            
            {{-- <br>
			<a href="#" id="downloadPdf">Download Report Page as PDF</a>
            <br>
            <a id="clickbind" href="#">Click</a>
            <br>
            <button onclick="javascript:demoFromHTML();">PDF</button> --}}
		</div>
	</div>
	<div class="s-50"></div>
	
	<h4 class="dashboard_text text_black">Assets</h4>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12" style="padding: 25px;">
			<canvas id="NetworthAssetDonutChart" width="400" height="400"></canvas>

			<p class="graph_inner inner_price">
				$ {{ $networthTotalInvestmentOrAssets ?? 0 }}
			</p>

    		<p class="graph_inner">
    			Total Assets
    		</p>
			<div class="s-20"></div>

		    @if(auth()->user()->hasRole('admin'))
				<a href="{{ route('networth', [app()->getLocale(), 'liabilities', $user]) }}" class="button_white btn_full_width">View Liabilities</a>
			@else
				<a href="{{ route('networth', [app()->getLocale(), 'liabilities']) }}" class="button_white btn_full_width">View Liabilities</a>
			@endif
		</div>
		<div class="col-lg-6 col-md-8 col-sm-12 offset-lg-2">
			<div class="table_box border_blue">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col" colspan="2">Personal Assets</th>
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
				      <th scope="row"><p class="text_black total_table">Subtotal:</p></th>
				      <td>
				      	<p class="text_black total_table" >
				      		$ {{ $total_personal_assets ?? 0 }}
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
				      <th scope="col" colspan="2">Unliquid Assets</th>
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
				      <th scope="row"><p class="text_black total_table">Subtotal:</p></th>
				      <td>
				      	<p class="text_black total_table" >
				      		$ {{ $total_unliquid_assets ?? 0 }}
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
				      <th scope="col" colspan="2">Liquid Assets</th>
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
				      <th scope="row"><p class="text_black total_table">Subtotal:</p></th>
				      <td>
				      	<p class="text_black total_table" >
				      		$ {{ $total_liquid_assets ?? 0 }}
				      	</p>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>

			<div class="s-50"></div>
		</div>
			
	</div>

{{-- </div> --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">

// /////////////////////////////////
/*
|-------------------------------
|		Donut Chart Assets
|-------------------------------
*/
var ctx = document.getElementById("NetworthAssetDonutChart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
    	'Personal Assets', 
    	'Uniquid Assets',
    	'Liquid Assets',
    ],
    datasets: [{
		label: [
			'Personal Assets', 
			'Uniquid Assets',
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

</script>
@endsection