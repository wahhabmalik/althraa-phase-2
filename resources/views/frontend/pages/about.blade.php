@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')

@php $direction = ($request->segment(1) == 'ar') ? 'right' : 'left' @endphp
<style type="text/css">
.founder-box {
    border-top-{{ $direction }}-radius: 25px;
    border-bottom-{{ $direction }}-radius: 25px;
    padding: 2px 3rem;
}
</style>
@endsection

@section('content')
<div style="overflow-x: hidden;">
    <div class="background_effect text-{{ $direction }}">
        <div class="container ">
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

        <div class="row flex-column-reverse flex-md-row">
            <div class="col-sm-9">
                <div class="s-20"></div>
                <div class="bg-white mt-5 coffee-box">
                    <h1 class="page-heading">
                        {{ trans('lang.frontend_about.about_coffee_started_it_all') }}
                    </h1>
                    <p>{{ trans('lang.frontend_about.cofee_text_1') }}</p>
                    <p>{{ trans('lang.frontend_about.cofee_text_2') }}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <img 
                    class="about-cofee" 
                    src="{{ asset('frontend_assets/img/about/group49.png') }}" 
                    style="{{ ($request->segment(1) == 'ar') ? 'right: -100px;' : 'left: -75px;' }}" 
                >
            </div>
        </div>

        <div class="s-50"></div>

        <div class="row">
            <div class="col-sm-3">
                <img 
                    class="about-vision float-{{ ($request->segment(1) == 'ar') ? 'left' : 'right' }}" 
                    src="{{ asset('frontend_assets/img/about/group53.png') }}"
                    style="{{ ($request->segment(1) == 'ar') ? 'left: -60px;' : 'right: -75px;' }}" 
                >
            </div>
            <div class="col-sm-9">
                <div class="bg-white mt-3 vision-box">
                    <h1 class="page-heading">
                        {{ trans('lang.frontend_about.about_our_vision') }}
                    </h1>
                    <p>{{ trans('lang.frontend_about.about_our_vision_text') }}</p>
                </div>
            </div>
            
        </div>

        <div class="s-50"></div>

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class="bg-green mt-3 founder-box">
                    <h1 class="page-heading text-white">
                        {{ trans('lang.frontend_about.founder') }}
                    </h1>
                    
                </div>
            </div>
            
        </div>
        
        <div class="s-50"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            <img 
                                src="{{ asset('frontend_assets/img/about/waleed.png') }}" 
                                class="img img-fluid about-image" 
                            >   
                        </div>
                        <div class="col-sm-9">
                            <h2 class="about_name mt-5">{{ trans('lang.frontend_about.waleed') }}<span class="p">{{ trans('lang.frontend_about.waleed_designation') }}</span></h2>
                            <p>@wbakarman</p>
                        </div>
                    </div>
                    <ul class="intro-list">
                        <li>{{ trans('lang.frontend_about.waleed_li_1') }}</li>
                        <li>{{ trans('lang.frontend_about.waleed_li_2') }}</li>
                        <li>{{ trans('lang.frontend_about.waleed_li_3') }}</li>
                        <li>{{ trans('lang.frontend_about.waleed_li_4') }}</li>
                        <li>{{ trans('lang.frontend_about.waleed_li_5') }}</li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            <img 
                                src="{{ asset('frontend_assets/img/about/ali.png') }}" 
                                class="img img-fluid about-image" 
                            >   
                        </div>
                        <div class="col-sm-9">
                            <h2 class="about_name mt-5">{{ trans('lang.frontend_about.ali') }}<span class="p">{{ trans('lang.frontend_about.ali_designation') }}</span></h2>
                            <p>@wbakarman</p>
                        </div>
                    </div>
                    <ul class="intro-list">
                        <li>{{ trans('lang.frontend_about.ali_li_1') }}</li>
                        <li>{{ trans('lang.frontend_about.ali_li_2') }}</li>
                        <li>{{ trans('lang.frontend_about.ali_li_3') }}</li>
                        <li>{{ trans('lang.frontend_about.ali_li_4') }}</li>
                        <li>{{ trans('lang.frontend_about.ali_li_5') }}</li>
                        <li>{{ trans('lang.frontend_about.ali_li_6') }}</li>
                        <li>{{ trans('lang.frontend_about.ali_li_7') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="s-100"></div>

    </div>
</div>



@endsection