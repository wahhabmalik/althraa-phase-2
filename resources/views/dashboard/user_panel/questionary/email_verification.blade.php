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
	<div class="center_content">
		<h1 class="user__intro text-dark">{{ trans('lang.email_verification') }}</h1>

		<form action="{{ route('questionnaire', app()->getLocale()) }}" method="POST">
			@csrf
            
                	<div class="row">
                		<div class="col-sm-4"></div>
                		<div class="col-sm-4">

							<div class="form-group">
								<div class="form-group">
		                          <label for="name"  class="{{ ($request->segment(1) == 'ar') ? 'float-right' : 'float-left' }}">
		                          	{{ trans('lang.your_email') }}
		                          </label>
		                          <input 
		                                id="name" 
		                                type="text" 
		                                class="form-control" 
		                                name="email" 
		                                required 
		                                placeholder="eg. user@xyz.com"
		                                value="{{ $user->email ?? old('email') }}"
		                                >
		                    	</div>
							</div>

							<div class="center_content">
								<button type="submit" class="button">
									{{ trans('lang.question.continue_to_payment') }} 
									<i class="{{ ($request->segment(1) == 'ar') ? 'fa fa-arrow-left fa-fw' : 'fa fa-arrow-right fa-fw' }}"></i>
								</button>
							</div>
						</div>
					</div>
                
        </form>
	</div>
</div>
@endsection