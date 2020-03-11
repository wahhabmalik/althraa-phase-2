@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts..user_layout.user_dashboard')

@section('styles')
<style type="text/css">
.button_white{
	padding: 1.3rem 3rem;
}
.img-box {
    min-height: 120px;
}


.suggested-plan {
    text-align: center;
    padding: 50px 10px;
    font-size: 24px;
    background: #F0F1F3;
    color: #bcbcbc;
    font-family: Soin Sans Neue;
    font-weight: bold;
}
.suggested-plan:hover{
  background: #fced07;
    color: #01630a;
}
.suggested-selected{
	background: #222222;
    color: #fff;
}
.suggested-selected:hover{
	background: #222222;
    color: #fff;
}

.suggested-active:before{
  background-color: #008000 !important;
  border: 4px solid #299d29 !important;
  color: #fff;
}
.indicator{
  background-color: #008000 !important;
}


.suggested-active1:before{
  background-color: #008000 !important;
  border: 4px solid #299d29 !important;
  color: #fff;
}
.indicator1{
  background-color: #008000 !important;
}


.suggested-active2:before{
	background-color: #008000 !important;
  border: 4px solid #299d29 !important;
  color: #fff;
}
.indicator2{
  background-color: #008000 !important;
}

































.progressbar {
  counter-reset: step;
}
.progressbar li {
  list-style: none;
  display: inline-block;
  width: 15.33%;
  position: relative;
  text-align: center;
  cursor: auto;
}
.progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 70px;
  height: 70px;
  line-height : 70px;
  border: 4px solid #ddd;
  border-radius: 100%;
  display: block;
  text-align: center;
  margin: 0 auto 20px auto;
  background-color: #fff;
}
.progressbar li:after {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: #ddd;
  top: 35px;
  left: -50%;
  z-index : -1;
}


.progressbar li:first-child:after {
  content: none;
}
.progressbar li.active {
  color: #999c9a;
}
.progressbar li.active:before {
  border-color: green;
} 
.progressbar li.active + li:after {
  background-color: #f0f0f0;
}


.progressbar li.active1 {
  color: #999c9a;
}
.progressbar li.active1:before {
  border-color: #fced07;
} 
.progressbar li.active1 + li:after {
  background-color: #f0f0f0;
}


.progressbar li.active2 {
  color: #999c9a;
}
.progressbar li.active2:before {
  border-color: #e32d2d;
} 
.progressbar li.active2 + li:after {
  background-color: #f0f0f0;
}


/*.progressbar li:second-child {
  background-color: yellow;
}*/

a.select-plan {
  font-size: 1.5rem;
  color: #20630a;
  font-weight: 600;
}

@media only screen and (max-width: 776px) {
  .progressbar li{
    display: initial;
  }
}


a{
  cursor: pointer !important;
}

{!! ($request->segment(1) == 'ar') ? '.progressbar li:after{ right: -50%; }' : '' !!}

</style>
@endsection

@section('content')
<div class="content">
  <div class="container {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="user__intro">{{ trans('lang.financial_plan.select_plan') }}</h2>
        <p>{{ trans('lang.financial_plan.for_investment_evaluation') }}</p>
      </div>
	</div>

	<div class="s-20"></div>


    <div class="modal-body text-center">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
          <h4>
            <!--<span class="badge 
            {{-- {{ (($suggestion ?? '') == 'conservative_c1') ? '' : '' }}
            {{ (($suggestion ?? '') == 'conservative_c2') ? '' : '' }}
            {{ (($suggestion ?? '') == 'natural_n1') ? '' : '' }}
            {{ (($suggestion ?? '') == 'natural_n2') ? '' : '' }}
            {{ (($suggestion ?? '') == 'aggressive_a1') ? '' : '' }}
            {{ (($suggestion ?? '') == 'aggressive_a2') ? '' : '' }} --}}
            " style="display: inline-block;  width: 12px; height: 12px;"></span>
            {{ 'Select' }}&nbsp&nbsp -->

            <span class="badge 
            {{ (($suggestion ?? '') == 'conservative_c1') ? 'indicator' : '' }}
            {{ (($suggestion ?? '') == 'conservative_c2') ? 'indicator' : '' }}
            {{ (($suggestion ?? '') == 'natural_n1') ? 'indicator1' : '' }}
            {{ (($suggestion ?? '') == 'natural_n2') ? 'indicator1' : '' }}
            {{ (($suggestion ?? '') == 'aggressive_a1') ? 'indicator2' : '' }}
            {{ (($suggestion ?? '') == 'aggressive_a2') ? 'indicator2' : '' }}
            " style="display: inline-block;  width: 12px; height: 12px;"></span>
            {{ trans('lang.financial_plan.suggested') }}
          </h4>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
      </div>

      @if(auth()->user()->hasRole('admin'))
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c1', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c1') ? 'suggested-active' : '' }}">Conservative <br>(C1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c2', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c2') ? 'suggested-active' : '' }}">Conservative <br>(C2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n1', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n1') ? 'suggested-active' : '' }}">Natural <br>(N1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n2', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n2') ? 'suggested-active' : '' }}">Natural <br>(N2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a1', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a1') ? 'suggested-active' : '' }}">Aggressive <br>(A1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a2', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a2') ? 'suggested-active' : '' }}">Aggressive <br>(A2)</div>
            </a>
            <br>
          </div>
        </div>
      @else
        {{-- <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c1']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c1') ? 'suggested-active' : '' }}">Conservative <br>(C1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c2']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c2') ? 'suggested-active' : '' }}">Conservative <br>(C2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n1']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n1') ? 'suggested-active' : '' }}">Natural <br>(N1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n2']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n2') ? 'suggested-active' : '' }}">Natural <br>(N2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a1']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a1') ? 'suggested-active' : '' }}">Aggressive <br>(A1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a2']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a2') ? 'suggested-active' : '' }}">Aggressive <br>(A2)</div>
            </a>
            <br>
          </div>
        </div> --}}



<br>
<br>
      <div class="row">
        <div class="col-sm-12">
          
          <ul class="progressbar">
            
              <li class="active {{ (($suggestion ?? '') == 'conservative_c1') ? 'suggested-active' : '' }}">
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c1']) }}">
                    {{ trans('lang.financial_plan.more_conservative') }}
                  </a>
              </li>
              </a>
              <li class="active {{ (($suggestion ?? '') == 'conservative_c2') ? 'suggested-active' : '' }}" >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'conservative_c2']) }}">
                    {{ trans('lang.financial_plan.conservative') }}
                </a>
              </li>
              <li class="active1 {{ (($suggestion ?? '') == 'natural_n1') ? 'suggested-active1' : '' }}" >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n1']) }}">
                  {{ trans('lang.financial_plan.below_average') }}
                </a>
              </li>
              <li class="active1 {{ (($suggestion ?? '') == 'natural_n2') ? 'suggested-active1' : '' }}" >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'natural_n2']) }}">
                  {{ trans('lang.financial_plan.above_average') }}
                </a>
              </li>
              <li class="active2 {{ (($suggestion ?? '') == 'aggressive_a1') ? 'suggested-active2' : '' }}" >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a1']) }}">
                  {{ trans('lang.financial_plan.aggressive') }}
                </a>
              </li>
              <li class="active2 {{ (($suggestion ?? '') == 'aggressive_a2') ? 'suggested-active2' : '' }}" >
                <a class="select-plan" href="{{ route('investment_evaluation_with_plan', [app()->getLocale(), 'aggressive_a2']) }}">
                  {{ trans('lang.financial_plan.more_aggressive') }}
                </a>
              </li>
          </ul>

          <br>
          <br>
         
        </div>
      </div>

      @endif


    </div>

  </div>
</div>
@endsection