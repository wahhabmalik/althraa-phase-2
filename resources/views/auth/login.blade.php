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
.button, .button:link {
    border: 0px solid #01630a;
}
span.checkmark.error-check {
    border: 1px solid red;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.input-group-addon {
    background-color: #F7F6F6;
    border: unset;
    border-radius: 1px;
    color: inherit;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    padding: 6px 12px;
    text-align: center;
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}
.input-group-addon{
    width: 3%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group .form-control {
    display: table-cell;
}


.input-group-addon{
    display: table-cell;
    font-family: 'Cairo', sans-serif;
}

.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    background-color: #F7F6F6 !important;
    border-top-right-radius: 8px !important;
    border-bottom-right-radius: 8px !important;
    border: unset;
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
.form-control:focus{
    box-shadow: unset;
}
.card-body{
    padding: unset;
}
.alert {
    border-radius: 0.8rem;
    font-family: 'Cairo', sans-serif;
    text-align: center;
}
</style>@endsection

@section('content')
<section class="login container">
      <div class="row">

        @if (session('message'))
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        {{ trans(session('message')) }}
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
                            <span class="input-group-addon">966</span> 
                            <input 
                            type="number" 
                            class="form-control 
                            @error('phone_number') is-invalid @enderror" 
                            style="height: 40px;" 
                            id="phone_number" 
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
@endsection