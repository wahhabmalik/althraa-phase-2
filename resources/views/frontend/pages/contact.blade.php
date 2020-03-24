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
                <h1 class="text-center page-heading mt-5">
                    {{ trans('lang.frontend_contact.contact_heading_text') }}
                </h1>

                <div class="s-20"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-sm-12 space-bottom {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
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
                <h1 class="page-heading text-center mt-5" style="font-size: 2.6rem !important;">
                    {{ trans('lang.frontend_contact.contact_send_us_a_message') }}
                </h1>
                <div class="s-35"></div>

                <div class="form-group">
                    <label for="inputEmail">
                        {{ trans('lang.frontend_contact.contact_email') }}
                    </label>
                    <input id="inputEmail" type="email" class="form-control contact_input" name="email" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_email_placeholder') }}">
                </div>
                
                <div class="form-group">
                    <label for="inputName">
                        {{ trans('lang.frontend_contact.contact_name') }}
                    </label>
                    <input id="inputName" type="text" class="form-control contact_input" name="name" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_name_placeholder') }}">
                </div>
                
                <div class="form-group">
                    <label for="inputMessage">
                        {{ trans('lang.frontend_contact.contact_message') }}
                    </label>
                    <textarea id="inputMessage" class="form-control contact_input" name="message" value="" required placeholder="{{ trans('lang.frontend_contact.contact_message_placeholder') }}"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="button">
                        {{ trans('lang.frontend_contact.contact_send') }}
                    </button>
                </div>
                </form>

            </div>
            <div class="s-100"></div>
        </div>
    </div>
</div>

@endsection