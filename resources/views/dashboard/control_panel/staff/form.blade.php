@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
	{{-- Select 2 CSS --}}
    <link href="{{ asset('backend_assets/site_assets/css/select2/select2.min.css') }}" rel="stylesheet">

	<style>
	.form-control {
	    display: block;
	    width: 100%;
	    height: calc(1.5em + .75rem + 2px);
	    padding: 0.35rem .75rem;
	    font-size: 1.5rem;
	    font-weight: 400;
	    line-height: 1.5;
	    color: #222222;
	    background-color: #fff !important;
	    background-clip: padding-box;
	    border: 1px solid #e4e8ec;
	    border-radius: unset !important;
	    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}

	.button{
	    padding: 10px 20px !important;
	}
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}

	/* Firefox */
	input[type=number] {
	  -moz-appearance:textfield;
	}
	</style>
@endsection
@section('content')
<div class="container mt-5">
{{-- <div class="content__body"> --}}
	<h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.admin.staff') }}</h2>
	<p class="setting_text {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">
		{{ trans('lang.admin.add_new_user') }}
	</p>

	<br>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 col-sm-12">
			<form action="{{ route('store_user/moderator', app()->getLocale()) }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.register_form.name') }}</label>
							<input 
								type="text" 
								name="name" 
								id="name" 
								class="form-control @error('name') is-invalid has-error @enderror" 
								autofocus 
								required 
								>
						</div>
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.register_form.phone_number') }}</label>
							<input 
								type="number" 
								name="phone_number" 
								id="phone_number" 
								class="form-control @error('phone_number') is-invalid has-error @enderror" 
								required 
								>
						</div>
						@error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.register_form.role') }}</label>
							<input 
								type="text" 
								class="form-control" 
								value="{{ "Moderator" }}" 
								disabled
								>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.email_address') }}</label>
							<input 
								type="email" 
								name="email" 
								id="email" 
								class="form-control @error('email') is-invalid has-error @enderror" 
								required 
								>
						</div>
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					{{-- <div class="col-sm-12">
						<div class="form-group">
							<label class="control-label {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.password') }}</label>
							<input 
								type="password" 
								name="password" 
								id="password" 
								class="form-control @error('password') is-invalid has-error @enderror" 
								required 
								>
						</div>

						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.register_form.confirm_password') }}</label>
							<input 
								id="password-confirm" 
								type="password" 
								class="form-control" 
								name="password_confirmation" 
								required 
								>
						</div>
					</div> --}}
				</div>

				<div class="row">
					<div class=col-md-12>
						<div class="form-group">
							<button type="submit" class="button">{{ trans('lang.question.save') }}</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>

</div>
{{-- </div> --}}


@endsection

@section('scripts')

@endsection