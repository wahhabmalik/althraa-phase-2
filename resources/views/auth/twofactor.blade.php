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
input[type=number] {
  -moz-appearance:textfield;
}

#wrapper #dialog #form input {
    margin: 0 0.6rem;
    text-align: center;
    line-height: 40px;
    font-size: 20px;
    border: solid 1px #ccc;
    /*box-shadow: 0 0 5px #ccc inset;*/
    outline: none;
    width: 21%;
    transition: all 0.2s ease-in-out;
    border-radius: 3px;
}

#wrapper #dialog #form input:focus {
    border-color: #016216;
    box-shadow: 0 0 5px #016216 inset;
}

#wrapper #dialog #form input::selection {
    background: transparent;
}
.login__form {
    direction: ltr;
}



li {
  display: inline-block;
  font-size: 1.5em;
  list-style-type: none;
  padding: 0.5em;
  text-transform: uppercase;
}

li span {
  display: block;
  font-size: 3.5rem;
}
.card {
    background: #f4f8f4;
    border: unset;
    border-radius: 5px;
    padding: 15px;
}

.login {
    height: 90vh;
    padding: 2rem 0;
}

@media (max-width: 660px) {
  section.login.container{
    overflow-x: hidden;
  }
}

</style>
@endsection

@section('content')
<section class="login container" >
    <div class="row">
        
        @if (session('message'))
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        @endif


        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center">
            <div class="card mb-5 m-3">
                <h1>{{ trans('lang.code_will_expire_in') }}</h1>
                <ul id="countdown">
                    {{-- <li><span id="days"></span>days</li> --}}
                    {{-- <li><span id="hours"></span>Hours</li> --}}
                    <li><span id="minutes"></span>{{ trans('lang.minutes') }}</li>
                    <li><span id="seconds"></span>{{ trans('lang.seconds') }}</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row mb-5 p-3">

        <div class="col-md-4 login__container ">
        
            <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                {{ trans('lang.frontend.two_factor_verification') }}
            </h2>

            <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                {{ trans('lang.frontend.two_factor_message') }}
                <a href="{{ route('verify.resend', app()->getLocale()) }}">{{ trans('lang.frontend.two_factor_here') }}</a>.
            </p>
            

            {{-- <form method="POST" class="login__form" action="{{ route('verify.store', app()->getLocale()) }}">
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
            </form> --}}


            <div id="wrapper">
                <div id="dialog">
                    <div id="form">
                        <form method="POST" class="login__form" action="{{ route('verify.store', app()->getLocale()) }}">
                            @csrf
                            <input type="tel" name="two_factor_code[]" maxLength="1" pattern="[0-9]{1}" size="1" min="0" max="9"  class="two-fa" />
                            
                            <input type="tel" name="two_factor_code[]" maxLength="1" pattern="[0-9]{1}" size="1" min="0" max="9"  class="two-fa" />

                            <input type="tel" name="two_factor_code[]" maxLength="1" pattern="[0-9]{1}" size="1" min="0" max="9"  class="two-fa" />

                            <input type="tel" name="two_factor_code[]" maxLength="1" pattern="[0-9]{1}" size="1" min="0" max="9"  class="two-fa"  />

                            <button type="submit" class="button button__block">{!! ($request->segment(1) == 'ar') ? '&larr;&nbsp; ' . trans('lang.frontend.verify') : trans('lang.frontend.verify') . '&nbsp; &rarr;' !!}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js"></script>

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


    $(function() {
      'use strict';

      var body = $('body');

      function goToNextInput(e) {
        var key = e.which,
          t = $(e.target),
          sib = t.next('input');

        if (key != 9 && (key < 48 || key > 57)) {
          e.preventDefault();
          return false;
        }

        if (key === 9) {
          return true;
        }

        if (!sib || !sib.length) {
          sib = body.find('input').eq(0);
        }
        sib.select().focus();

        // two-fa
        var count = 0;
        $('input[type=tel]').each(function(){
            
            if(parseInt($(this).val()) >= 0)
                count++;
            else
                count--;

            if(count == 4){
              $('.login__form').submit();
            }
        });
      }

      function onKeyDown(e) {
        var key = e.which;

        if (key === 9 || (key >= 48 && key <= 57)) {
          return true;
        }

        e.preventDefault();
        return false;
      }
      
      function onFocus(e) {
        $(e.target).select();
      }

      body.on('keyup', 'input', goToNextInput);
      body.on('keydown', 'input', onKeyDown);
      body.on('click', 'input', onFocus);

    })

    function resendSms(){
      // alert('sms resend')
    }

    function callNumber(){
      // alert('Calling')
    }
</script>




<script type="text/javascript">

{{-- {!! date("M d, Y h:m:s", strtotime('May 14, 2020 16:00:00')) !!} --}}
{{-- {!! auth()->user()->two_factor_expires_at !!} --}}


$(document).ready(function() {
    const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

// let countDown = new Date('Sep 30, 2020 00:00:00').getTime(),
let countDown = new Date('{!! auth()->user()->two_factor_expires_at !!}').getTime(),
    x = setInterval(function() {    

      let now = new Date().getTime(),
          distance = countDown - now;

      // document.getElementById('days').innerText = Math.floor(distance / (day)),
        // document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

      //do something later when date is reached
      if (distance < 0) {
        clearInterval(x);
        $('#countdown').html('<h2 class="text-danger">{{ trans('lang.code_expired') }}</h2>')
      }

    }, second)
});


</script>
@endsection