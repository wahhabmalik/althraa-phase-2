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
                    {{ althraa_site_description() }}
                    {{-- {{ trans('lang.frontend.althraa') }} --}}
                </p>
                <h1 class="text-center page-heading">
                    {{ trans('lang.frontend.slider_heading') }}
                </h1>
                <div class="s-20"></div>
                
                <img
                  class="img img-responsive"
                  src="
                    {{ asset('frontend_assets/img/banner/home_banner_1.svg') }}"
                  alt="Althraa Logo"
                />

                <div class="s-20"></div>
                <p class="text-center intro-text secondary_text_slider mb-5">
                    {{ trans('lang.frontend.secondary_text_slider') }}
                </p>


            </div>
        </div>
    </div>
    <div class="ribb_home bg-white">
        <div class="container text-center">
            <h1>{{ trans('lang.frontend.ribbon_heading') }}</h1>
            <p class="text-center intro-text" >{{ trans('lang.frontend.ribbon_text') }}</p>
        </div>
    </div>



    <div class="container">

        <div class="s-100"></div>

        <p class="login_link text-center primary-link">
            {{ trans('lang.frontend.steps') }}
        </p>
        <h2 class="text-center">
            {{ trans('lang.frontend.how_does_it_work') }}
        </h2>

        <div class="s-35"></div>

        <div class="row text-center">
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
            
        </div>

        <div class="s-100"></div>

    </div>
</div>
@endsection