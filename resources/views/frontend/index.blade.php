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
    /*top: -80px;*/
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
                <p class="text-center intro-text">
                    {{ trans('lang.frontend.slider_text') }}
                </p>
                <img
                  class="img img-responsive"
                  src="
                    {{ asset('frontend_assets/img/banner/home_banner_1.svg') }}"
                  alt="Althraa Logo"
                />
            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="s-100"></div>

    {{-- <p class="login_link text-center primary-link">
        {{ trans('lang.frontend.steps') }}
    </p>
    <h2 class="text-center">
        {{ trans('lang.frontend.how_does_it_work') }}
    </h2>

    <div class="s-35"></div>

    <div class="row text-center">
        <div class="col-sm-1"></div>
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
                {{ trans('lang.frontend.get_report') }}
            </p>
        </div>
        <div class="col-sm-2">
            <span><img src="{{ asset('frontend_assets/img/icons/how_it_works_icons3.svg') }}"><span class="icon-text">
                {{ trans('lang.frontend.3') }}
            </span></span>
            <p class="icon-p text_black">
                {{ trans('lang.frontend.get_long_term_plans') }}
            </p>
        </div>
        <div class="col-sm-2">
            <span><img src="{{ asset('frontend_assets/img/icons/how_it_works_icons4.svg') }}"><span class="icon-text">
                {{ trans('lang.frontend.4') }}
            </span></span>
            <p class="icon-p text_black">
                {{ trans('lang.frontend.start_the_implementation') }}
            </p>
        </div>
        <div class="col-sm-2">
            <span><img src="{{ asset('frontend_assets/img/icons/how_it_works_icons5.svg') }}"><span class="icon-text">
                {{ trans('lang.frontend.5') }}
            </span></span>
            <p class="icon-p text_black">
                {{ trans('lang.frontend.periodic_evaluation') }}
            </p>
        </div>
    </div>

    <div class="s-100"></div> --}}

</div>

<div class="container space-bottom">
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <img class="img img-responsive" src="{{ asset('frontend_assets/img/banner/ipad_pro.png') }}">
            <div class="s-100"></div>
            {{-- <div class="empty_box_left"></div> --}}
        </div>
        <div class="col-md-5 col-sm-12 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <h1 class="page-heading prsnl_plan">
                {{ trans('lang.frontend.personal_financial_planning') }}
            </h1>
            <p>
                {{ trans('lang.frontend.personal_financial_planning_text') }}
            </p>
            <a class="button" href="{{ route('register', app()->getLocale()) }}">
                {{ trans('lang.frontend.get_started') }}
            </a>
        </div>
    </div>
</div>


<div class="container">
    <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-4 col-sm-12 offset-lg-1 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <h1 class="page-heading invst_plan">
                {{ trans('lang.frontend.invest_your_own_money') }}
            </h1>
            <p>
                {{ trans('lang.frontend.invest_your_own_money_text') }}
            </p>
            <a class="button" href="{{ route('register', app()->getLocale()) }}">
                {{ trans('lang.frontend.get_started') }}
            </a>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="box_shadow" style="padding: 30px 10px;">
                <img class="img img-responsive" src="{{ asset('frontend_assets/img/banner/age_chart.jpg') }}">
            </div>
            <div class="s-100"></div>
            {{-- <div class="empty_box_middle"></div> --}}
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12">
            
            <img class="img img-responsive" src="{{ asset('frontend_assets/img/banner/helloquence.png') }}">
        </div>
        <div class="col-md-5 col-sm-12 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}" style="z-index: 99999;">
            <h1 class="page-heading prsnl_plan">
                {{ trans('lang.frontend.periodic_evaluation') }}
            </h1>
            <p>
                {{ trans('lang.frontend.periodic_evaluation_text') }}
            </p>
            <a class="button" href="{{ route('register', app()->getLocale()) }}">
                {{ trans('lang.frontend.get_started') }}
            </a>
        </div>
    </div>
</div>
<div class="container donut_position">
    <div class="row">
        <div class="col-2 donut_img">
            <img class="img img-responsive" src="{{ asset('frontend_assets/img/banner/donut_chart.jpg') }}">
        </div>
    </div>
</div>

@endsection