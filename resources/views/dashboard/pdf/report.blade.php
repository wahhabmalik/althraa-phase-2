<!DOCTYPE html>
<html>
<head>
	<title>
		@isset($title)
			{{ $title }} {{ ' | ' }}
		@endif
		{{ config('app.name', 'Althraa') }}
	</title>
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,500,500i,600,600i,700,700i&amp;display=swap" rel="stylesheet">
</head>
<style type="text/css">
	progress {
	  border-radius: 2px; 
	  width: 100%;
	  height: 16px;
	  padding-left:5%;
	  padding-right:5%;
	}
	progress::-webkit-progress-bar {
	 background-color: #e9ecef;
	  border-radius: 2px;
	}
	progress::-webkit-progress-value {
	   border-radius: 2px; 
	}
	progress::-moz-progress-bar {
	  /* style rules */
	}


	canvas{
		background:#fff;
		height:240px;
		width: 50%;
	}
</style>
<body>
	<section>
		<br>
		<img
	      class="logo__img img-responsive"
	      {{-- srcset="
	        {{ asset('backend_assets/login/images/logo/logotype.png    1x') }},
	        {{ asset('backend_assets/login/images/logo/logotype@2x.png 2x') }}
	      " --}}
	      src="{{ althraa_logo() }}"
	      alt="Althraa Logo"
	    />
	    <br>
		<hr>
	</section>
	<section>
		<div>
			<h3 style="font-size: 2rem; font-family: 'Soin Sans Neue Bold'; line-height: 1.3;">
				Results
			</h3>
		</div>
		<div>
			<h2 style="color: #989898; font-family: 'Soin Sans Neue Bold';">
				Saving Evaluation
			</h2>
		</div>
		<div style="margin-top: 2%; margin-bottom: 2%;"></div>
		<div>
			<div>
				<p>
					Net Personal Income
				</p>
				<h2 style="color: #000; padding-left: 10%; font-family: Soin Sans Neue; font-weight: bold;">
					$ {{ $netPersonalIncome ?? 0 }}
				</h2>
			</div>
			<div style="margin-top: 2%; margin-bottom: 2%;"></div>
			<div>
				<p>
					Saving Evaluation
				</p>
				<div style="padding-left:5%; padding-right:5%; margin-bottom: 1%">
					0% 
					<span style="padding-right: 15%;"></span> 
					15% 
					<span style="padding-right: 15%;"></span> 
					30% 
					<span style="padding-right: 35%;"></span> 
					70% 
					<span style="float: right;">100%</span>
				</div>

				<progress  value="{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}" max="100">
					<span style="color: black;">70 %</span>
				</progress>

				<div style="padding-left:5%; padding-right:5%; margin-top: 1%">
					<span style="font-size: 12px">
						😣 Broken
					</span>
					<span style="padding-right: 10%;"></span> 
					<span style="font-size: 12px">
						😥 Poor Saver
					</span>
					<span style="padding-right: 11%;"></span> 
					<span style="font-size: 12px">
						🙂 Good Saver
					</span>
					<span style="padding-right: 30%;"></span> 
					<span style="font-size: 12px">
						😁 Excellent Saver
					</span> 
					<span style="float: right; font-size: 12px">
						🤑 Wealthy
					</span>
				</div>
			</div>
		</div>

		<div style="margin-top: 2%; margin-bottom: 2%;"></div>
		
		<table style="width: 100%; margin-top: 5%;">
			<tbody>
				<tr>
					<td style="width: 20%"></td>
					<td style="width: 20%;">
						<div class="wrapper">
							<canvas id="barChartCurrentSaving"></canvas>
						</div>
						<div align="center">
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
					</td>
					<td style="width: 20%"></td>
					<td style="width: 20%;">
						<div class="wrapper">
							<canvas id="barChartPossibleSaving"></canvas>
						</div>
						<div align="center">
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
					</td>
					<td style="width: 20%"></td>
				</tr>
			</tbody>
		</table>
	</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script type="text/javascript">
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

</script>

</body>
</html>