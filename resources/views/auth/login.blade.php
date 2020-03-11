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
</style>
@endsection

@section('content')
<section class="login container">
      <div class="row">

        @if (session('message'))
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        @endif

        <div class="col-md-4 login__container">
          <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ trans('lang.login') }}</h2>
                <form method="POST" class="login__form" action="{{ route('login', app()->getLocale()) }}">
                    @csrf

                    <div class="form-group">
                        <label for="inputEmail" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.email_address') }}</label>
                        
                        <input 
                        id="inputEmail" 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        oninvalid="InvalidMsg(this);"
                        autocomplete="email" 
                        autofocus 
                        placeholder="{{ trans('lang.register_form.type_your_email_here') }}"
                        >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="form-group">
                          <label for="inputPassword" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.password') }}</label>
                          <input 
                                id="inputPassword" 
                                type="password" 
                                class="form-control 
                                @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                oninvalid="InvalidMsg(this);"
                                autocomplete="current-password"
                                placeholder="{{ trans('lang.register_form.type_your_password_here') }}"
                                >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    
                    <div class="form-group">
                      @if (Route::has('password.request'))
                        <a class="primary-link {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" href="{{ route('password.request', app()->getLocale()) }}">
                            {{ trans('lang.login_form.forgot_your_passowrd') }}
                        </a>
                    @endif
                    </div>

                    <button type="submit" class="button button__block">
                      {{ trans('lang.login') }} &nbsp {!! ($request->segment(1) == 'ar') ? '&larr;' : '&rarr;' !!}
                    </button>
                    
                    
                        
                </form>

                <div class="login__or">&mdash; {{ trans('lang.login_form.or') }} &mdash;</div>
                <div class="regsiter__google">
                <form action="{{ route('redirect', app()->getLocale()) }}" >
                    <button  class="button__google">
                      {{ trans('lang.login_form.login_with_google') }}
                      <img class="button__google-img" src="{{ asset('backend_assets/login/images/google.svg') }}" />
                    </button>
                </form>
                </div>
                <div class="login__login-link">
                {{ trans('lang.login_form.dont_have_account') }}
                <span><a href="{{ route('register', app()->getLocale()) }}">{{ trans('lang.register') }}</a></span>
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