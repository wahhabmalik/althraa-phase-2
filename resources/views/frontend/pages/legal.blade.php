@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('content')
<div class="background_effect">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="s-35"></div>
                <p class="login_link text-center primary-link">
                    {{ trans('lang.frontend_legal.legal') }}
                </p>
                <h1 class="text-center page-heading">
                    {{ trans('lang.frontend_legal.legal') }}
                </h1>

                <div class="s-20"></div>
            </div>
        </div>
    </div>
</div>

<div class="s-50"></div>

<div class="container">
    <div class="row {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">

        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <h1>{{ trans('lang.frontend_legal.about_our_services') }}</h1>
            <p>{{ trans('lang.frontend_legal.about_our_services_text') }}</p>
            <div class="s-50"></div>


            <h1>{{ trans('lang.frontend_legal.purpose') }}</h1>
            <p>{{ trans('lang.frontend_legal.purpose_text') }}</p>
            <div class="s-50"></div>

            


        </div>
    </div>
</div>

<div class="background_effect_inverse">
    <div class="container">
        <div class="row {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
               
                <h1>{{ trans('lang.frontend_legal.stake_and_responsabilities') }}</h1>
                <p>{{ trans('lang.frontend_legal.stake_and_responsabilities_text_1') }}</p>
                <div class="s-35"></div>
                <p>{{ trans('lang.frontend_legal.stake_and_responsabilities_text_2') }}</p>
                <div class="s-50"></div>
            </div>
        </div>
    </div>
</div>
@endsection