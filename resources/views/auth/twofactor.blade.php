@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.login', ['title' => $title1 ?? '2FA Auth'])

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
<section class="login container">
    <div class="row">

        @if (session('message'))
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        @endif


        <div class="col-md-4 login__container">
            <br>
            <br>

            <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                {{ trans('lang.frontend.two_factor_verification') }}
            </h2>

            <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                {{ trans('lang.frontend.two_factor_message') }}
                <a href="{{ route('verify.resend', app()->getLocale()) }}">{{ trans('lang.frontend.two_factor_here') }}</a>.
            </p>
            <br>

            <form method="POST" class="login__form" action="{{ route('verify.store', app()->getLocale()) }}">
                @csrf

                <div class="form-group">
                    <label for="input_two_factor_code" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.frontend.two_factor_verification_code') }}</label>
                    <input 
                        id="input_two_factor_code" 
                        type="text" 
                        class="form-control 
                        @error('two_factor_code') is-invalid @enderror" 
                        name="two_factor_code" 
                        required 
                        oninvalid="InvalidMsg(this);"
                        placeholder="{{ trans('lang.frontend.enter_two_factor_authentication_code_here') }}"
                        >

                    @error('two_factor_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="button button__block">
                  {{ trans('lang.frontend.verify') }} &nbsp; {!! ($request->segment(1) == 'ar') ? '&larr;' : '&rarr;' !!}
                </button>          
            </form>

            <div class="login__or">
                &mdash; {{ trans('lang.login_form.or') }} &mdash;
            </div>
            <div class="regsiter__google">
                <a href="{{ route('login_with_another_account') }}">
                    <button class="button__google">
                        {{ trans('lang.login_form.login_with_another_account') }}
                    </button>
                </a>
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
    function InvalidMsg(textbox) {
        if (textbox.value == '') {
            textbox.setCustomValidity('{!! trans('lang.required_field') !!}');
        }
        else if (textbox.validity.typeMismatch){
            textbox.setCustomValidity('{!! trans('lang.valid_email') !!}');
        }
        else {
           textbox.setCustomValidity('');
        }
        return true;
    }
</script>
@endsection