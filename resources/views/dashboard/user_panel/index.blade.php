@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts.user_layout.user_dashboard', [
  'title' => $title ?? '',
  'href' => $href ?? '',
  'disabled' => $disabled ?? '',
  ])

@section('styles')

<style type="text/css">
  .suggested-plan {
    text-align: center;
    padding: 50px 20px;
    font-size: 24px;
    background: #F0F1F3;
    color: #bcbcbc;
    font-family: Soin Sans Neue;
    font-weight: bold;
  }
  .suggested-plan:hover{
    background: #01630a;
      color: #fff;
  }
  .suggested-selected{
    background: #01630a8f;
      color: #fff;
  }
  .suggested-selected:hover{
    background: #01630a;
      color: #fff;
  }
</style>

@endsection

@section('content')
<div class="content">
        <div class="container {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
          <h2 class="user__intro">
             {{ trans('lang.user_index.hi_there') }}  
            @auth()
              {{ auth()->user()->name }}  
            @endauth
            !
          </h2>
          <div class="updateBox">

            <div class="mt-1 mb-5">
              <h4 class="updateBox__h4">
                 {{ trans('lang.user_index.questionnaire_complete_percentage') }} 
              </h4>
              <div class="progress"  style="height:20px">
                <div class="progress-bar" style="height:23px; width:{{ $questionnaire_completed_percentage ?? 0 }}%">
                    <span style="font-size: 12px;">
                      {{ $questionnaire_completed_percentage ?? 0 }} %
                    </span>
                </div>
              </div>
              <br>
            </div>


            <h2 class="updateBox__h2"> {{ trans('lang.user_index.any_updates_on_your') }} </h2>
            <h4 class="updateBox__h4">
               {{ trans('lang.user_index.you_should_update') }} 
            </h4>
            <div class="updateBox__action">
              <p class="updateBox__p">
                 {{ trans('lang.user_index.last_time_updates') }}  
                <strong> {{ $user_questionnaire->updated_at ?? '' }} 
                  </strong>
              </p>
              <a class="updateBox__a" href="{{ route('step_1', app()->getLocale()) }}"> {{ trans('lang.user_index.update_now') }} </a>
            </div>
          </div>
          <div class="user__info">
            <p class="user__info-data">
               {{ trans('lang.user_index.current_net_worth') }} <span> {{ $totalNetworth ?? 0 }} SAR</span>
            </p>
            <p class="user__info-data" style="{{ ($request->segment(1) == 'ar') ? 'margin-right:10rem' : '' }}">
               {{ trans('lang.user_index.net_personal_income') }} <span> {{ $netPersonalIncome ?? 0 }} SAR</span>
            </p>
          </div>
          <div class="alertBox" style="{{ ($request->segment(1) == 'ar') ? 'border-right: 0.6rem solid #01630a;border-left: none;' : '' }}">
            {{-- <p class="alertBox__p">
              <span>👏Congratulations!</span>&nbsp;At age {{ $ending_age ?? 0 }} you will have
              savings balance of {{ $savingsAtEndingAge[$ending_age]['year_ending_balance'] ?? 0 }} SAR
            </p> --}}
            {{-- <a style="@if ($disabled ?? null)
                {!! 'cursor: not-allowed !important' !!}
              @endif"
              title="@if ($disabled ?? null)
                {!! 'Questionnaire Not Completed' !!}
              @endif"
              class="button {{ (($disabled ?? null) == null) ? '' : $disabled }}" {{ (($disabled ?? null) == null) ? '' : $disabled }}  
              href="{{ (($href ?? null) == null) ? route('select_plan', app()->getLocale()) : $href }}"
              >
              Check out more
            </a> --}}
          </div>
        </div>
      </div>
@endsection