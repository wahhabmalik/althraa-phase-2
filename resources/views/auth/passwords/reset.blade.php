@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.login', ['title' => $title ?? ''])
@section('styles')
    <style type="text/css">
    .button, .button:link {
        border: 0px solid #01630a;
    }
    .logo {
        position: absolute !important;
        left: 50% !important;
        top: 50% !important;
        transform: translate(-50%, -50%) !important;
    }
    .form-control {
        font-size: 14px;
    }
    </style>
@endsection

@section('content')
<section class="login container">
    <div class="row">
        <div class="col-md-4 login__container">
            <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ trans('lang.registration') }}</h2>

            <div class="card-body">
                
            </div>

            <form method="POST" action="{{ route('password.update', app()->getLocale()) }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" class="">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="password" class="">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                    
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    
                </div>

                
                <button type="submit" class="button button__block">
                    {{ __('Reset Password') }} &rarr;
                </button>
                    
            </form>
        </div>
    </div>
</section>
@endsection
