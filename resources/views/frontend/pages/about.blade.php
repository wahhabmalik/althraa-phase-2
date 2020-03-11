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
                    {{ trans('lang.frontend_about.about_us') }}
                </p>
                <h1 class="text-center page-heading">
                    {{ trans('lang.frontend_about.about_our_story') }}
                </h1>

                <div class="s-20"></div>
            </div>
        </div>
    </div>
</div>

<div class="s-50"></div>


<div class="container">
    <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-4 col-sm-12 offset-lg-1 about-general {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <h1 class="page-heading about_section1">
                {{ trans('lang.frontend_about.about_coffee_started_it_all') }}
            </h1>
            <p>
                {{ trans('lang.frontend_about.about_coffee_text') }}
            </p>
        </div>
        <div class="col-md-7 col-sm-12 ">
            <img class="img img-responsive" src="{{ asset('frontend_assets/img/about/banner1.png') }}">
            <div class="s-100"></div>
            {{-- <div class="empty_box_right"></div> --}}
        </div>
    </div>
</div>

<div>
    <h1 class="about_heading">
        {{ trans('lang.frontend_about.althraa_arabic_meaning') }}
    </h1>
    <br>
    <br>
    <br>
    <br>
    <br>
    {{-- <div class="s-100"></div> --}}
    {{-- <div class="empty_box_middle"></div> --}}
</div>


<div class="container">
    <div class="row flex-md-row">
        <div class="col-md-7 col-sm-12 ">
            <img class="img img-responsive" src="{{ asset('frontend_assets/img/about/banner2.png') }}">
            <div class="s-100"></div>
            {{-- <div class="empty_box_left"></div> --}}
        </div>
        <div class="col-md-4 col-sm-12 about-general {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <h1 class="page-heading about_section2">
                {{ trans('lang.frontend_about.about_our_vision') }}
            </h1>
            <p>
                {{ trans('lang.frontend_about.about_our_vision_text') }}
            </p>
        </div>
    </div>
</div>


<div class="container">
    <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-4 col-sm-12 offset-lg-1 about-general {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <h1 class="page-heading about_section1">
                {{ trans('lang.frontend_about.about_coffee_started_it_all') }}
            </h1>
            <p>
                {{ trans('lang.frontend_about.about_coffee_text') }}
            </p>
        </div>
        <div class="col-md-7 col-sm-12 ">
            <img class="img img-responsive" src="{{ asset('frontend_assets/img/about/banner3.png') }}">
            <div class="s-100"></div>
            {{-- <div class="empty_box_right"></div> --}}
        </div>
    </div>
</div>



<div class="s-100"></div>
@endsection