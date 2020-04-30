@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.user_layout.user_questionary')

@section('styles')
@include('dashboard.user_panel.partials.questions_asset')

<style>
.welcome_text {
    font-size: 100px;
    margin-top: 50px;
}
.welcome_para {
    font-size: 18px;
    color: #989898;
}
.center_content{
	text-align: center;
}
@media only screen and (max-width: 600px) {
    .welcome_text {
        font-size: 60px;
    }
}
.button, .button:link {
    width: fit-content;
}
</style>
@endsection
@section('content')
<div class="content__body">
	<div class="center_content">
		<h2 class="user__intro welcome_text">{{ trans('lang.welcome') }}</h2>
		<p class="user__intro welcome_para">{{ trans('lang.are_you_ready_to_start_your_new_future') }}</p>
		<br>
		<br>
		<a class="button" href="{{ route('step_1', app()->getLocale()) }}">{{ trans('lang.questionnaire_start') }} {!! ($request->segment(1) == 'ar') ? '&larr;' : '&rarr;' !!}</a>
	</div>
</div>
@endsection