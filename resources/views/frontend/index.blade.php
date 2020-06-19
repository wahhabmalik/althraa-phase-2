@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
.empty_box_left {
    top: -180px;
    z-index: -1;
}
.empty_box_middle{
    z-index: -1;
    top: -120px;
 }
 .empty_box_middle-down {
    height: 200px;
    width: 200px;
    border: 2px solid #bec8bf59;
    margin: 0 auto;
    position: relative;
    top: 170px;
}
footer {
    position: relative;
}
.button_primary span {
    font-size: 10px;
}
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
                    {{ ($request->segment(1) == 'ar') ? althraa_site_description_ar() : althraa_site_description() }}
                    {{-- {{ trans('lang.frontend.althraa') }} --}}
                </p>

                <h1 class="text-center mb-3">
                    {{ trans('lang.frontend.slider_heading') }}
                </h1>

                {{-- <p class="text-center">
                    {{ trans('lang.frontend.slider_text') }}
                </p> --}}

                <div class="s-50"></div>

                <div class="text-center">
                    <a class="button_primary get_started" href="{{ route('login', app()->getLocale()) }}">{{ trans('lang.get_started') }}<span>&nbsp&nbsp( {{ trans('lang.frontend.free_of_charge') }} )</span></a>
                </div>

                <div class="s-20"></div>
                
                <img
                  class="img img-responsive"
                  src="
                    {{ asset('frontend_assets/img/banner/home_banner_1.svg') }}"
                  alt="Banner image"
                />

                {{-- <div class="s-20"></div>

                <p class="text-center intro-text secondary_text_slider mb-5">
                    {{ trans('lang.frontend.secondary_text_slider') }}
                </p> --}}


            </div>
        </div>
    </div>
</div>
<div class="background_effect_inverse">
    <div class="container">

        <div class="s-100"></div>

        {{-- <p class="login_link text-center primary-link">
            {{ trans('lang.frontend.steps') }}
        </p> --}}
        <h1 class="text-center">
            {{ trans('lang.frontend.how_does_it_work') }}
        </h1>

        <div class="s-35"></div>

        {{-- <div class="row text-center">
            <div class="col-sm-3"></div>
            
            <div class="col-sm-2">
                <div class="home_icon_box">
                    <img src="{{ asset('frontend_assets/img/icons/home_icon_3.png') }}">
                </div>
                <p class="icon-p text_black">
                    {{ trans('lang.frontend.home_icon_text_3') }}
                </p>
            </div>

            <div class="col-sm-2">
                <div class="home_icon_box">
                    <img src="{{ asset('frontend_assets/img/icons/home_icon_2.png') }}">
                </div>
                <p class="icon-p text_black">
                    {{ trans('lang.frontend.home_icon_text_2') }}
                </p>
            </div>

            <div class="col-sm-2">
                <div class="home_icon_box">
                    <img src="{{ asset('frontend_assets/img/icons/home_icon_1.png') }}">
                </div>
                <p class="icon-p text_black">
                    {{ trans('lang.frontend.home_icon_text_1') }}
                </p>
            </div>
            
        </div> --}}


        <div class="row text-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-2">
                <span><img src="{{ asset('frontend_assets/img/icons/how_it_works_icons1.svg') }}"><span class="icon-text">
                    {{ trans('lang.frontend.1') }}
                </span></span>
                <p class="icon-p text_black">
                    {{ trans('lang.frontend.answer_our_questions') }}
                </p>
            </div>

            <div class="col-sm-2">
                <span><img src="{{ asset('frontend_assets/img/icons/how_it_works_icons2.svg') }}"><span class="icon-text">
                    {{ trans('lang.frontend.2') }}
                </span></span>
                <p class="icon-p text_black">
                    {{ trans('lang.frontend.get_holistic_financial_plan') }}
                </p>
            </div>
            
            <div class="col-sm-2">
                <span><img src="{{ asset('frontend_assets/img/icons/money.png') }}"><span class="icon-text">
                    {{ trans('lang.frontend.3') }}
                </span></span>
                <p class="icon-p text_black">
                    {{ trans('lang.frontend.start_investing_right_away') }}
                </p>
            </div>
        </div>

        <div class="s-100"></div>

    </div>
</div> 
@endsection