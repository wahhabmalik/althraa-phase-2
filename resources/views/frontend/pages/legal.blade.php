@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('content')
<div class="background_effect">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="s-35"></div>
                {{-- <p class="login_link text-center primary-link">
                    {{ trans('lang.frontend_legal.legal') }}
                </p> --}}
                <h1 class="text-center page-heading text-dark">
                    {{ trans('lang.disclaimer') }}
                </h1>

                <div class="s-20"></div>
            </div>
        </div>
    </div>
</div>

<div class="s-50"></div>

{{-- @if($request->segment(1) == 'en')
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
@else --}}
    
    <div class="container">
        <div class="row {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <p class="text-justify">{{ trans('lang.pdf_disclaimer') }}</p>
                <p class="text-justify">{{ trans('lang.pdf_disclaimer_para_2') }}</p>
                <ol class="disclaimer">
                    <li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_1') }}</p></li>
                    <li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_2') }}</p></li>
                    <li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_3') }}</p></li>
                    <li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_4') }}</p></li>
                </ol>
                <p class="text-justify">{{ trans('lang.pdf_disclaimer_para_3') }}</p>
            </div>
        </div>
    </div>
{{-- @endif --}}

@endsection