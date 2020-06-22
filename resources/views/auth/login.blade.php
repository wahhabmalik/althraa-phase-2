@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.login', ['title' => $title ?? ''])

@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/login/css/login.css') }}">
@endsection

@section('content')
<section class="login container">
    <div class="row">

        @if (session('error'))
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        {{ session('error')}} {{ \Session::put('error', '') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        @endif

        
        <div class="col-md-4 login__container">
            <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ trans('lang.login') }}</h2>
            <form method="POST" class="login__form" action="{{ route('authenticate', app()->getLocale()) }}">
                @csrf
                {{-- {{ dd(trans('auth.failed')) }} --}}
                <div class="form-group" >
                    <label for="phone_number" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.register_form.phone_number') }}</label>

                    <div class="input-group m-b" style="direction: ltr;">
                        {{-- <span class="input-group-addon">966</span>  --}}
                        <input 
                        class="form-control 
                        @error('phone_number') is-invalid @enderror" 
                        style="height: 40px;" 
                        id="phone" 
                        type="tel" 
                        name="phone_number" 
                        value="{{ old('phone_number') }}" 
                        required 
                        oninvalid="InvalidMsg(this);"
                        autocomplete="phone_number">
                        
                    </div>

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    {{-- @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    
                </div>

                <button type="submit" class="button button__block">
                  {{ trans('lang.login') }}
                </button>
                    
            </form>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
<script type="text/javascript">
    
var telInput = $("#phone");
  // errorMsg = $("#error-msg"),
  // validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa'],
  preventInvalidNumbers: true,
  separateDialCode: false,
  initialCountry: "SA",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  // errorMsg.addClass("hide");
  // validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      // validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      // errorMsg.removeClass("hide");
    }
    console.log($('.selected-dial-code').text());
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);



</script>
@endsection