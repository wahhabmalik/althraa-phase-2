@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.login')

@section('styles')
<style type="text/css">
.button, .button:link {
    border: 0px solid #01630a;
}
span.checkmark.error-check {
    border: 1px solid red;
}
.logo {
    position: absolute !important;
    left: 50% !important;
    top: 50% !important;
    transform: translate(-50%, -50%) !important;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.input-group-addon {
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 1px;
    color: inherit;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    padding: 6px 12px;
    text-align: center;
}
.input-group-addon{
    width: 3%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group .form-control {
    display: table-cell;
}
.input-group .form-control:last-child{
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.input-group-addon:first-child{
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.input-group-addon{
    display: table-cell;
}
.input-group-addon:first-child {
    border-right: 0;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
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
        <div class="col-md-4 login__container">
          <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ trans('lang.registration') }}</h2>
                <form method="POST" action="{{ route('register', app()->getLocale()) }}" class="login__form">
                    @csrf

                    
                    <div class="form-group">
                        <label for="name" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.register_form.name') }}</label>

                        <input 
                        id="name" 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ Session::get('name') ?? old('name') }}" 
                        {{ Session::get('name') ? Session::put('name', '') : '' }}
                        required 
                        autocomplete="name" 
                        autofocus
                        {{-- data-required-message="{{ trans('lang.required_field') }}" --}}
                        oninvalid="InvalidMsg(this);"
                        >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="form-group" >
                        <label for="phone_number" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.register_form.phone_number') }}</label>

                        <div class="input-group m-b" style="direction: ltr;">
                            <span class="input-group-addon">966</span> 
                            <input 
                            type="number" 
                            class="form-control 
                            @error('phone_number') is-invalid @enderror" 
                            style="height: 32px;" 
                            id="phone_number" 
                            name="phone_number" 
                            value="{{ old('phone_number') }}" 
                            required 
                            oninvalid="InvalidMsg(this);"
                            autocomplete="phone_number">
                        </div>


                        {{-- <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number"> --}}

                        {{-- <span class="help-block {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">
                            {{ trans('lang.help_text.phone_number_hint') }}
                        </span> --}}
                        {{-- <br> --}}

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="gender" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.register_form.gender') }}</label>

                        <select 
                            class="form-control @error('gender') is-invalid @enderror" 
                            id="gender" 
                            name="gender" 
                            required
                            oninvalid="InvalidMsg(this);"
                            >
                            <option value="Male">{{ trans('lang.male') }}</option>
                            <option value="Female">{{ trans('lang.female') }}</option>
                            <option value="Others">{{ trans('lang.other') }}</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="email" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.email_address') }}</label>
                        
                            <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            oninvalid="InvalidMsg(this);"
                            autocomplete="email"
                            >

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="password" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.password') }}</label>

                        <input 
                        id="password" 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required 
                        oninvalid="InvalidMsg(this);"
                        autocomplete="new-password"
                        >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="form-group" >
                        <label for="password-confirm" class="{{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}">{{ trans('lang.register_form.confirm_password') }}</label>

                        <input 
                        id="password-confirm" 
                        type="password" 
                        class="form-control" 
                        name="password_confirmation" 
                        required 
                        oninvalid="InvalidMsg(this);"
                        autocomplete="new-password"
                        >
                        
                    </div>

                    <div class="form-group">
                        <label class="check_container {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" style="line-height: 2;">
                            {{ trans('lang.register_form.agree_to') }}
                            <a href="javascript:void(0)">
                                {{ trans('lang.register_form.term_and_conditions') }}
                            </a>
                          <input type="checkbox" name="terms" class="form-control" required="">
                          <span class="checkmark @error('terms') error-check @enderror"></span>
                        </label>
                        
                    </div>




                    {{-- Modal Starts here --}}
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title"></h4>
                            <button type="button" id="closeModal" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                            <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation "</p>

                            <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation "</p>

                            <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation "</p>

                            <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation "</p>

                            <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation "</p>

                            <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation "</p>


                          </div>

                         
                        </div>
                      </div>
                    </div>
                    {{-- Modal Ends here --}}



                    
                    <button type="submit" class="button button__block">
                      {{ trans('lang.register') }} &nbsp {!! ($request->segment(1) == 'ar') ? '&larr;' : '&rarr;' !!}
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
                {{ trans('lang.login_form.already_have_account') }}
                <span><a href="{{ route('login', app()->getLocale()) }}">{{ trans('lang.login') }}</a></span>
                </div>

            </div>
      </div>
    </section>
@endsection


@section('scripts')
<script type="text/javascript">
    $('input[name="terms"]'). click(function(){
        if($(this). is(":checked")){
            $('#myModal').show();
            $(':input[type="submit"]').prop('disabled', false);
            $(':input[type="submit"]').removeClass('disabled');
        }
        else if($(this). is(":not(:checked)")){
            $(':input[type="submit"]').prop('disabled', true);
            $(':input[type="submit"]').addClass('disabled');
        }
    });

   
   $(':input[type="submit"]').prop('disabled', true);
   $(':input[type="submit"]').addClass('disabled');
      

    $('#closeModal'). click(function(){
        $('#myModal').hide();
    });

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
