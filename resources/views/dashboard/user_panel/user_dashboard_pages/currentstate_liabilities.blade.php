@extends('dashboard.layouts..user_layout.user_dashboard')

@section('styles')
<style>

.graph_inner {
    text-align: center;
    position: relative;
    top: -160px;
}
p.inner_price {
    font-size: 22px;
    color: #222222;
    margin-bottom: 0;
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
            <div class="col-sm-6">
              <h2 class="user__intro">Networth Evaluation</h2>
              <p>This is how are you currently performing.</p>
            </div>
            <div class="col-sm-6">
              @if(auth()->user()->hasRole('admin'))
				<a class="button float-right" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@else
				<a class="button float-right" href="{{ route('plan_selection', app()->getLocale()) }}">
					Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
				</a>
			@endif
            </div>
          </div>
          
          
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a href="#tab2" class="nav-link active" data-toggle="tab">Liabilities</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="s-50"></div>
            <div id="tab2" class="tab-pane show active">
            	<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12" style="padding: 25px;">
						<div class="row">
							<div class="col-sm-3 col-2"></div>
							<div class="col-md-12 col-sm-6 col-8 text-center">
								<canvas id="NetworthLiabilitiesDonutChart" width="400" height="400"></canvas>

								<p class="graph_inner inner_price">
									$ {{ $networthTotalDebtsOrLiabilities ?? 0 }}
								</p>

					    		<p class="graph_inner">
					    			Total Liabilities
					    		</p>
								<div class="s-20"></div>

							    @if(auth()->user()->hasRole('admin'))
				                  <a href="{{ route('networthevaluation', [app()->getLocale(), 'assets', $user]) }}" class="button_white btn_full_width">View Assets</a>
				                @else
				                  <a href="{{ route('networthevaluation', [app()->getLocale(), 'assets']) }}" class="button_white btn_full_width">View Assets</a>
				                @endif
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
								      <th scope="col" colspan="2">Debts / Liabilities</th>
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
								      <th scope="row"><p class="text_black total_table">Subtotal:</p></th>
								      <td>
								      	<p class="text_black total_table" >
								      		$ {{ $networthTotalDebtsOrLiabilities ?? 0 }}
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
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">

// /////////////////////////////////
/*
|-------------------------------
|		Donut Chart Liabilities
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
@endsection