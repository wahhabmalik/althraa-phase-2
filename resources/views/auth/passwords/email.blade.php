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
          <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ trans('lang.reset_password_form.reset_password') }}</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <form method="POST" action="{{ route('password.email', app()->getLocale()) }}">
                    @csrf

                    <div class="form-group">
                        <label for="" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.email_address') }}</label>

                        <input 
                            id="email" 
                            type="email" 
                            class="form-control 
                            @error('email') is-invalid @enderror" 
                            name="email" 
                            required 
                            autocomplete="email"
                            placeholder="Type you email here"
                            >

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>
                    <button type="submit" class="button button__block">
                      {{ trans('lang.reset_password_form.send_password_reset_link') }} &rarr;
                    </button>

                    
                </form>
          </div>
      </div>
  </section>

@endsection
