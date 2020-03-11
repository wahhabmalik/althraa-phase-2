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
                    {{ trans('lang.frontend_legal.legal_heading_text') }}
                </h1>

                <div class="s-20"></div>
            </div>
        </div>
    </div>
</div>

<div class="s-50"></div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 offset-lg-1 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            
            <h1 class="page-heading">
                {{ trans('lang.frontend_legal.legal_heading1') }}
            </h1>
            <div class="s-35"></div>
            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point1') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text1') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point2') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text2') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point3') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text3') }}
            </p>
            <div class="s-35"></div>



            <h1 class="page-heading">
                {{ trans('lang.frontend_legal.legal_heading2') }}
            </h1>
            <div class="s-35"></div>
            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point1') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text1') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point2') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text2') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point3') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text3') }}
            </p>
            <div class="s-35"></div>



        </div>
        <div class="col-md-5 col-sm-12 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
            <h1 class="page-heading">
                {{ trans('lang.frontend_legal.legal_heading3') }}
            </h1>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point1') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text1') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point2') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text2') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point3') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text3') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point1') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text1') }}
            </p>
            <div class="s-35"></div>

            <h3 class="secondary-heading">
                {{ trans('lang.frontend_legal.legal_heading1__point2') }}
            </h3>
            <p>
                {{ trans('lang.frontend_legal.legal_heading1__text2') }}
            </p>
            <div class="s-35"></div>

        </div>
    </div>
</div>
<div class="s-100"></div>
@endsection