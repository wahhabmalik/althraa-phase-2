@extends('dashboard.layouts.login', ['title' => $title ?? ''])

@section('styles')
<style type="text/css">
	.maintenance{
		background: url({{ asset($maintenance_mode_image->meta_value) }});
		width:100%;
		height: 90vh;
		background-size: cover;
		background-repeat: no-repeat;
	    display: flow-root;
	    background-position: center;
	}
	.maintenance_heading {
	    background-color: #000000d1;
	    text-align: center;
	    margin: 20rem auto 0;
	    width: fit-content;
	    padding: 20px;
	    color: #fff;
	}
	.maintenance_desc {
	    background-color: #000000d1;
	    text-align: center;
	    margin: 2rem auto;
	    width: fit-content;
	    padding: 20px;
	    color: #fff;
	}
	.h1, h1 {
	    font-size: 4.5rem;
	}
	h2{
	    font-family: Soin Sans Neue, Bold;
	}

	@media only screen and (max-width: 600px) {
		.h1, h1 {
		    font-size: 2.5rem !important;
		}
	}
</style>
@endsection

@section('content')
<div class="maintenance">

	<div class="maintenance_heading">
		<h1 class="h1">{{ $maintenance_mode_heading->meta_value }}</h1>
	</div>

	<div class="maintenance_desc">
		<h3 class="h3">{{ $maintenance_mode_description->meta_value }}</h3>
	</div>
</div>
@endsection