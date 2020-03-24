@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')

@php $direction = ($request->segment(1) == 'ar') ? 'right' : 'left' @endphp
<style type="text/css">

</style>
@endsection

@section('content')
<div style="overflow-x: hidden;">
    <div class="background_effect text-{{ $direction }}">
        <div class="container ">
            
            <div class="s-100"></div>
            <p class="login_link">
                {{ trans('lang.frontend_disclaimer.text') }}
            </p>
            <div class="s-20"></div>
                
        </div>

    </div>
</div>



@endsection