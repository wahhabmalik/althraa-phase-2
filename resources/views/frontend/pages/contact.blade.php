@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
    

</style>
@endsection



@section('content')
<div class="background_effect">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="s-35"></div>
                <p class="login_link text-center primary-link">
                    {{ trans('lang.frontend_contact.contact') }}
                </p>
                <h1 class="text-center page-heading">
                    {{ trans('lang.frontend_contact.contact_heading_text') }}
                </h1>

                <div class="s-20"></div>
            </div>
        </div>
    </div>
</div>

<div class="s-50"></div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 offset-lg-1 space-bottom {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form method="post" action="{{ route('contact',app()->getLocale()) }}">
            @csrf
            <h1 class="page-heading">
                {{ trans('lang.frontend_contact.contact_send_us_a_message') }}
            </h1>
            <div class="s-35"></div>

            <div class="form-group">
                <label for="inputEmail">
                    {{ trans('lang.frontend_contact.contact_email') }}
                </label>
                <input id="inputEmail" type="email" class="form-control" name="email" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_email_placeholder') }}">
            </div>
            
            <div class="form-group">
                <label for="inputName">
                    {{ trans('lang.frontend_contact.contact_name') }}
                </label>
                <input id="inputName" type="text" class="form-control" name="name" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_name_placeholder') }}">
            </div>
            
            <div class="form-group">
                <label for="inputMessage">
                    {{ trans('lang.frontend_contact.contact_message') }}
                </label>
                <textarea id="inputMessage" class="form-control" name="message" value="" required placeholder="{{ trans('lang.frontend_contact.contact_message_placeholder') }}"></textarea>
            </div>

            <button type="submit" class="button">
                {{ trans('lang.frontend_contact.contact_send') }}
            </button>
            </form>

        </div>
        <div class="col-md-5 col-sm-12 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <h1 class="page-heading">
                {{ trans('lang.frontend_contact.contact_other') }}
            </h1>
            <div class="s-35"></div>
            <h3 class="secondary-heading text_black">
                {{ trans('lang.frontend_contact.contact_other_email_us_directly') }}
            </h3>
            <p>
                {{ trans('lang.frontend_contact.contact_other_you_can_email_us_here') }}
                &nbsp&nbsp
                <span>
                    <a href="mailto:contact@althraa.com" class="text_secondary">
                        contact@althraa.com
                    </a>
                </span>
            </p>
            
            <div class="s-20"></div>
            <h3 class="secondary-heading text_black">
                {{ trans('lang.frontend_contact.contact_other_need_any_assistance') }}
            </h3>
            <p>
                {{ trans('lang.frontend_contact.contact_other_visit_our_help_page') }}
                &nbsp&nbsp
                <span>
                    <a href="#" class="text_secondary">
                        {{ trans('lang.frontend_contact.contact_other_help') }}
                    </a>
                </span>
            </p>
            
            {{-- <div class="s-20"></div>
            <h3 class="secondary-heading text_black">Call Us</h3>
            <p>Need to call us? We promise we'll be polite!</p>
            <h3 class="secondary-heading text_black" style="font-size: 14px;">+365847264</h3> --}}

            <div class="s-20"></div>
            <p>
                <span>
                    <img src="{{ asset('frontend_assets/img/icons/clock_icon.svg') }}">
                </span>
                &nbsp&nbsp
                {{ trans('lang.frontend_contact.contact_other_timings') }}
            </p>

        </div>
    </div>
</div>
<div class="s-100"></div>
@endsection