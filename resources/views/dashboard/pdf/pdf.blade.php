<!DOCTYPE html>
<html>
<head>
	<title>
		@isset($title)
			{{ $title }} {{ ' | ' }}
		@endif
		{{ config('app.name', 'Althraa') }}
	</title>
	<link rel="stylesheet" href="{{ asset('backend_assets/site_assets/css/general.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend_assets/login/css/style.css') }}" />

	<link rel="stylesheet" href="{{ asset('backend_assets/login/css/bootstrap.min.css') }}" />
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
	<div class="container" style="width: 100%; max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
		<section>
			<br>
			<img
		      class="logo__img img-responsive"
		      src="{{ althraa_logo() }}"
		      alt="Althraa Logo"
		    />
		    <br>
			<hr>
		</section>
		<br>
		<section>
			<div>
				<h3 style="font-size: 2rem; font-family: 'Soin Sans Neue Bold'; line-height: 1.3;">
					Results
				</h3>
			</div>

			<br>
			<br>

			<div>
				<h1 style="color: #989898; font-family: 'Soin Sans Neue Bold';">
					<u> Saving Evaluation </u>
				</h1>
			</div>

			<br>
			<br>
			<br>

			<div class="row" style="display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; margin-top: -5%;">
				<div class="col-md-6" style="-ms-flex: 0 0 50%; flex: 0 0 50%; max-width: 50%;"></div>
				<div class="col-md-6" style="-ms-flex: 0 0 50%; flex: 0 0 50%; max-width: 50%;">
					<div class="row" style="display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
						<div class="col-md-6" style="-ms-flex: 0 0 50%; padding-left: 12%; flex: 0 0 50%; max-width: 50%;">
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
						</div>
						<div class="col-md-6" style="-ms-flex: 0 0 50%; padding-right: 17%; flex: 0 0 50%; max-width: 50%;">
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
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
				<div class="col-md-6" style="-ms-flex: 0 0 50%; flex: 0 0 50%; max-width: 50%;">
					<div>
						<p>
							Net Personal Income
						</p>
						<h1 style="color: #000; font-size: 56px; font-family: Soin Sans Neue; font-weight: bold;">
							$ {{ $netPersonalIncome ?? 0 }}
						</h1>
					</div>
					<br>

					<div style="margin-top: 2%; margin-bottom: 2%;"></div>

					<p>
						Saving Evaluation
					</p>
					<div style="padding-left:5%; padding-right:5%; margin-bottom: 1%; font-size: 12px;">
						0% 
						<span style="padding-right: 15%;"></span> 
						15% 
						<span style="padding-right: 15%;"></span> 
						30% 
						<span style="padding-right: 28%;"></span> 
						70% 
						<span style="float: right;">100%</span>
					</div>

					<progress  value="{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}" max="100">
						<span style="color: black;">70 %</span>
					</progress>

					<div style="padding-left:5%; padding-right:5%; margin-top: 1%; font-size: 14px;">
						😣 
						<span style="padding-right: 15%;"></span> 
						😥 
						<span style="padding-right: 15%;"></span> 
						🙂 
						<span style="padding-right: 28%;"></span> 
						😁 
						<span style="float: right;">
							🤑 
						</span>
					</div>
					<div style="padding-left:5%; padding-right:5%; font-size: 12px;">
						 Broken
						<span style="padding-right: 8%;"></span> 
						 Poor Saver
						<span style="padding-right: 8%;"></span> 
						 Good Saver
						<span style="padding-right: 15%;"></span> 
						 Excellent Saver
						<span style="float: right;">
							 Wealthy
						</span>
					</div>
				</div>

				<div class="col-md-6" style="-ms-flex: 0 0 50%; flex: 0 0 50%; max-width: 50%;">
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="width: 20%"></td>
								<td style="width: 20%;">
									<div class="wrapper">
										<canvas id="barChartCurrentSaving"></canvas>
									</div>
								</td>
								<td style="width: 20%"></td>
								<td style="width: 20%;">
									<div class="wrapper">
										<canvas id="barChartPossibleSaving"></canvas>
									</div>
								</td>
								<td style="width: 20%"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>


		<br>
		<div style="margin-top: 10%; margin-bottom: 10%;"></div>
		<br>

		<section>
			<div>
				<h1 style="color: #989898; font-family: 'Soin Sans Neue Bold';">
					<u> Networth Evaluation </u>
				</h1>
			</div>

			<br>
			<br>
			<br>

			<div class="row" style="display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
				<div class="col-md-6" style="-ms-flex: 0 0 50%; flex: 0 0 50%; max-width: 50%;">
					<div>
						<p>
							Dashboard
						</p>
						<h1 style="color: #000; font-size: 56px; font-family: Soin Sans Neue; font-weight: bold;">
							$ {{ $netPersonalIncome ?? 0 }}
						</h1>
					</div>
					<br>

					<div style="margin-top: 2%; margin-bottom: 2%;"></div>

					<p>
						Saving Evaluation
					</p>
					<div style="padding-left:5%; padding-right:5%; margin-bottom: 1%; font-size: 12px;">
						0% 
						<span style="padding-right: 15%;"></span> 
						15% 
						<span style="padding-right: 15%;"></span> 
						30% 
						<span style="padding-right: 28%;"></span> 
						70% 
						<span style="float: right;">100%</span>
					</div>

					<progress  value="{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}" max="100">
						<span style="color: black;">70 %</span>
					</progress>

					<div style="padding-left:5%; padding-right:5%; margin-top: 1%; font-size: 14px;">
						😣 
						<span style="padding-right: 15%;"></span> 
						😥 
						<span style="padding-right: 15%;"></span> 
						🙂 
						<span style="padding-right: 28%;"></span> 
						😁 
						<span style="float: right;">
							🤑 
						</span>
					</div>
					<div style="padding-left:5%; padding-right:5%; font-size: 12px;">
						 Broken
						<span style="padding-right: 8%;"></span> 
						 Poor Saver
						<span style="padding-right: 8%;"></span> 
						 Good Saver
						<span style="padding-right: 15%;"></span> 
						 Excellent Saver
						<span style="float: right;">
							 Wealthy
						</span>
					</div>
				</div>

				<div class="col-md-6" style="-ms-flex: 0 0 50%; flex: 0 0 50%; max-width: 50%;">
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="width: 20%"></td>
								<td style="width: 20%;">
									<div class="wrapper">
										<canvas id="barChartCurrentSaving"></canvas>
									</div>
								</td>
								<td style="width: 20%"></td>
								<td style="width: 20%;">
									<div class="wrapper">
										<canvas id="barChartPossibleSaving"></canvas>
									</div>
								</td>
								<td style="width: 20%"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="{{ asset('backend_assets/login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend_assets/login/js/script.js') }}"></script>
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