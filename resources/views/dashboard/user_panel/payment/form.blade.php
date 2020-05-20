@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')
<style type="text/css">
.content__body {
    padding: 5rem 7rem;
}
button {
    -webkit-appearance: button;
}

.button{
    padding: 1.0rem 2.3rem;
}
</style>
@endsection
@section('content')
<div class="content__body">
	<div class="">
		<h1 class="user__intro text-dark text-center">{{ trans('lang.payment_method') }}</h1>

		<form action="{{ route('payment', app()->getLocale()) }}" method="POST">
			@csrf
            
        	<div class="row">
        		<div class="col-sm-4"></div>
        		<div class="col-sm-4">

    					<div class="form-group">
    						<div class="form-group">
                              <label for="card_no"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : 'float-left' }}">
                              	{{ trans('lang.card_no') }}
                              </label>
                              <input 
                                    id="card_no" 
                                    type="text" 
                                    class="form-control" 
                                    name="card_no" 
                                    {{-- required --}} 
                                    placeholder="0"
                                    value="{{ $user->card_no ?? old('card_no') }}"
                                    >
                        	</div>
    					</div>

    					<div class="form-group">
    						<div class="form-group">
                              <label for="card_holder"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : 'float-left' }}">
                              	{{ trans('lang.card_holder') }}
                              </label>
                              <input 
                                    id="card_holder" 
                                    type="text" 
                                    class="form-control" 
                                    name="card_holder" 
                                    {{-- required --}} 
                                    placeholder="John Smith"
                                    value="{{ $user->card_holder ?? old('card_holder') }}"
                                    >
                        	</div>
    					</div>

    					<div class="form-group">
    						<div class="form-group">
                              <label for="expire_date"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : 'float-left' }}">
                              	{{ trans('lang.expire_date') }}
                              </label>
                              <input 
                                    id="expire_date" 
                                    type="date" 
                                    class="form-control" 
                                    name="expire_date" 
                                    {{-- required --}} 
                                    placeholder="20/3/2021"
                                    value="{{ $user->expire_date ?? old('expire_date') }}"
                                    >
                        	</div>
    					</div>

    					<div class="form-group">
    						<div class="form-group">
                              <label for="cvv"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : 'float-left' }}">
                              	{{ trans('lang.cvv') }}
                              </label>
                              <input 
                                    id="cvv" 
                                    type="text" 
                                    class="form-control" 
                                    name="cvv" 
                                    {{-- required --}} 
                                    placeholder="377"
                                    value="{{ $user->cvv ?? old('cvv') }}"
                                    >
                        	</div>
    					</div>

    					<div class="center_content">
    						<button type="submit" class="button">
    							{{ trans('lang.get_your_report') }} 
    							<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
    						</button>
    					</div>
    				</div>
    				<div class="col-sm-2">
    					<p class="summary">Order Summary</p>
    					<a href="{{ route('sample-report', app()->getLocale()) }}" target="_blank">
    						<p class="download_link">Download sample <img src="{{ asset('backend_assets/dashboard/images/download.png') }}" class="float-right img img-fluid"></p>
    						
    					</a>
    					<div class="total">
    						<p>Total: <span class="float-right">SAR 500</span></p>
    					</div>
    				</div>
    			</div>
    </form>
	</div>
</div>
@endsection