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

.suggested-active{
	background-color: #01630a;
  color: #fff;
}
</style>
@endsection

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="user__intro">Select Plan</h2>
        <p>for generating detailed PDF Report</p>
      </div>
	</div>

	<div class="s-20"></div>

    <div class="modal-body text-center">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
          <h4>
            <span class="badge" style="background-color: #fced07; display: inline-block;  width: 12px; height: 12px;"></span>
            {{ 'Select' }}

            <span class="badge" style="background-color: #01630a8f; display: inline-block;  width: 12px; height: 12px;"></span>
            {{ 'Suggested' }}
          </h4>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
      </div>
      @if(auth()->user()->hasRole('admin'))
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'conservative_c1', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c1') ? 'suggested-active' : '' }}">Conservative <br>(C1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'conservative_c2', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c2') ? 'suggested-active' : '' }}">Conservative <br>(C2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'natural_n1', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n1') ? 'suggested-active' : '' }}">Natural <br>(N1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'natural_n2', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n2') ? 'suggested-active' : '' }}">Natural <br>(N2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'aggressive_a1', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a1') ? 'suggested-active' : '' }}">Aggressive <br>(A1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'aggressive_a2', $user]) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a2') ? 'suggested-active' : '' }}">Aggressive <br>(A2)</div>
            </a>
            <br>
          </div>
        </div>

      @else
      
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'conservative_c1']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c1') ? 'suggested-active' : '' }}">Conservative <br>(C1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'conservative_c2']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'conservative_c2') ? 'suggested-active' : '' }}">Conservative <br>(C2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'natural_n1']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n1') ? 'suggested-active' : '' }}">Natural <br>(N1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'natural_n2']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'natural_n2') ? 'suggested-active' : '' }}">Natural <br>(N2)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'aggressive_a1']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a1') ? 'suggested-active' : '' }}">Aggressive <br>(A1)</div>
            </a>
            <br>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ route('pdf_report', [app()->getLocale(), 'aggressive_a2']) }}">
              <div class="suggested-plan {{ (($suggestion ?? '') == 'aggressive_a2') ? 'suggested-active' : '' }}">Aggressive <br>(A2)</div>
            </a>
            <br>
          </div>
        </div>
      @endif
    </div>

  </div>
</div>
@endsection