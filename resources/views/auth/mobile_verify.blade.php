@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.login', ['title' => $title1 ?? 'Mobile Verification'])

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


.login {
    height: 90vh;
    /*padding: 2rem 0;*/
}



</style>
@endsection

@section('content')
<section class="login container">
    
    {{-- <div class="row">
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
    </div> --}}


    <div class="row">

        <div class="col-md-4 login__container">
            <div class="s-100"></div>
            
            @if (session('message'))
                <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            {{ session('message') }}
                        </div>
                    
                </div>
                
            @endif

            <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                {{ trans('lang.Mobile_Verification') }}
            </h2>

            <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                {{ trans('lang.Please_enter_last_4_digits_of_your_mobile_number') }}
            </p>
            

            
            <div id="wrapper">
                <div id="dialog">
                    <div id="form">
                        <form method="POST" class="login__form" action="{{ route('validate_phone', app()->getLocale()) }}">
                            @csrf
                            
                            <input type="tel" name="mobile[]" maxlength="1" size="1" min="0" max="9" class="two-fa" pattern="[0-9]{1}"/>
                            
                            <input type="tel" name="mobile[]" maxLength="1" size="1" min="0" max="9" class="two-fa" pattern="[0-9]{1}"/>

                            <input type="tel" name="mobile[]" maxLength="1" size="1" min="0" max="9" class="two-fa" pattern="[0-9]{1}"/>

                            <input type="tel" name="mobile[]" maxLength="1" size="1" min="0" max="9" class="two-fa" pattern="[0-9]{1}" />

                            {{-- <button type="submit" class="button button__block">{{ trans('lang.frontend.verify') }} &nbsp; {!! ($request->segment(1) == 'ar') ? '&larr;' : '&rarr;' !!} --}}
                            {{-- </button> --}}
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="login__or">
                &mdash; {{ trans('lang.login_form.or') }} &mdash;
            </div>
            <div class="regsiter__google">
                <a href="{{ route('login_with_another_account') }}">
                    <button class="button__google">
                        {{ trans('lang.login_form.login_with_another_account') }}
                    </button>
                </a>
            </div> --}}

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

                // console.log(typeof($(this).val()));
                // alert($(this).val());
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
@endsection