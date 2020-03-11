@inject('request', 'Illuminate\Http\Request')

<style type="text/css">

.user__menu-lists .navbar-nav .nav-link, .user__menu-lists .navbar-nav .nav-link:link, .user__menu-lists .navbar-nav .nav-link:visited {
    color: #222222;
    font-size: 1.5rem;
    font-family: "Soin Sans Neue Medium", sans-serif;
    transition: color 0.3s;
}
@media screen and (max-width: 990px) {
  .user__menu-lists .navbar-nav .nav-link, .user__menu-lists .navbar-nav .nav-link:link, .user__menu-lists .navbar-nav .nav-link:visited {
    color: #222222;
    font-size: 2.5rem;
    font-family: "Soin Sans Neue Medium", sans-serif;
    transition: color 0.3s;
}
}

</style>


<div class="user__menu">
  <nav class="navbar navbar-expand-lg navbar-light user__menu-main" >
    <a class="navbar-brand" href="{{ route('/',app()->getLocale()) }}">
      <img
        class="logo__img"
        srcset="{{ asset('backend_assets/dashboard/images/logo/logo.png 1x') }} , {{ asset('backend_assets/dashboard/images/logo/logo@2x.png 2x') }}"
        alt="Althraa Logo"
      />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="collapse navbar-collapse user__menu-lists"
      id="navbarSupportedContent"
    >
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ ($request->segment(2) == 'home') ? 'active' : '' }} ">
          <a 
            class="nav-link {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" 
            href="{{ route('home', app()->getLocale()) }}"
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#2') }}"></use>
            </svg>
            {{ trans('lang.user_sidebar.homepage') }} <span class="sr-only">(current)</span>
          </a>
        </li>

        <li class="nav-item">
          <a 
            class="nav-link {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" 
            href="{{ route('step_1', app()->getLocale()) }}"
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#4') }}"></use>
            </svg>
            {{ trans('lang.user_sidebar.questionnaire') }}
          </a>
        </li>

        <li class="nav-item 
          {{ $request->segment(2) == 'current_situation' ? 'active' : '' }} 
          {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}
          "
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }} {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" {{ (($disabled ?? null) == null) ? '' : $disabled }} 
            href="{{ route('current_situation', app()->getLocale()) }}"
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#1') }}"></use>
            </svg>
            {{ trans('lang.user_sidebar.current_situation') }}
          </a>
        </li>

        <li class="nav-item 
          {{ ($request->segment(2) == 'investment_evaluation_with_a_plan' || $request->segment(2) == 'investment_evaluation_with_plan' || $request->segment(2) == 'select_plan') ? 'active' : '' }} 
          {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}"
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }} {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" {{ (($disabled ?? null) == null) ? '' : $disabled }}  
            href="{{ route('investment_evaluation_with_a_plan', app()->getLocale()) }}" 
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#3') }}"></use>
            </svg>
            {{ trans('lang.user_sidebar.financial_plan') }}
          </a>
        </li>


        {{-- <li class="nav-item {{ ($request->segment(2) == 'current_state' || $request->segment(2) == 'currentstate' || $request->segment(2) == 'currentstate') ? 'active' : '' }}"
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }}" {{ (($disabled ?? null) == null) ? '' : $disabled }} 
            href="{{ (($href ?? null) == null) ? route('current_state', app()->getLocale()) : $href }}"
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#1') }}"></use>
            </svg>
            Current State
          </a>
        </li>


        <li class="nav-item {{ ($request->segment(2) == 'potential_state') ? 'active' : '' }}"
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }}" {{ (($disabled ?? null) == null) ? '' : $disabled }}  
            href="{{ (($href ?? null) == null) ? route('potential_state', app()->getLocale()) : $href }}"
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#3') }}"></use>
            </svg>
            Potential State
          </a>
        </li> --}}

        {{-- <li class="nav-item {{ ($request->segment(2) == 'saving_evaluation') ? 'active' : '' }}"
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }} {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" {{ (($disabled ?? null) == null) ? '' : $disabled }}  
            href="{{ (($href ?? null) == null) ? route('saving_evaluation', app()->getLocale()) : $href }}"
            >
            <i class="fa fa-dollar fa-fw aicon"></i>
            Saving Evaluation
          </a>
        </li>

        <li class="nav-item {{ ($request->segment(2) == 'networth_evaluation' || $request->segment(2) == 'networthevaluation') ? 'active' : '' }}"
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }} {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" {{ (($disabled ?? null) == null) ? '' : $disabled }}  
            href="{{ (($href ?? null) == null) ? route('networth_evaluation', app()->getLocale()) : $href }}"
            >
            <i class="fa fa-money fa-fw aicon"></i>
            Net Worth Evaluation
          </a>
        </li>

        <li class="nav-item {{ ($request->segment(2) == 'investment_evaluation_without_plan') ? 'active' : '' }} {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}"
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }} {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" {{ (($disabled ?? null) == null) ? '' : $disabled }}  
            href="{{ (($href ?? null) == null) ? route('investment_evaluation_without_plan', app()->getLocale()) : $href }}"
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#1') }}"></use>
            </svg>
            Investment Evaluation <span class="{{ ($request->segment(1) == 'ar') ? 'float-lg-left float-md-left w_plan' : 'float-lg-right float-md-right w_plan' }}">(Without Plan)</span>
          </a>
        </li> --}}

        {{-- <li class="nav-item {{ ($request->segment(2) == 'investment_evaluation_with_a_plan' || $request->segment(2) == 'investment_evaluation_with_plan' || $request->segment(2) == 'select_plan') ? 'active' : '' }} {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}"
          style="@if ($disabled ?? null)
              {!! 'cursor: not-allowed !important' !!}
            @endif"
          title="@if ($disabled ?? null)
              {!! 'Questionnaire Not Completed' !!}
            @endif"
            >
          <a 
            class="nav-link {{ (($disabled ?? null) == null) ? '' : $disabled }} {{ ($request->segment(1) == 'ar') ? 'float-right' : '' }}" {{ (($disabled ?? null) == null) ? '' : $disabled }}  
            href="{{ route('investment_evaluation_with_a_plan', app()->getLocale()) }}" 
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#3') }}"></use>
            </svg>
            Investment Evaluation <span class="{{ ($request->segment(1) == 'ar') ? 'float-lg-left float-md-left w_plan' : 'float-lg-right float-md-right w_plan' }}">(With Plan)</span>
          </a>
        </li> --}}





        




        {{-- <li class="nav-item {{ ($request->segment(2) == 'partners') ? 'active' : '' }}">
          <a 
            class="nav-link" 
            href="{{ route('partners', app()->getLocale()) }}"
            >
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#5') }}"></use>
            </svg>
            Partners
          </a>
        </li> --}}
      </ul>


      <ul class="navbar-nav {{ ($request->segment(1) == 'en') ? 'mr-auto' : '' }} " style="{{ ($request->segment(1) == 'ar') ? 'margin-left: auto !important' : '' }}">
        <li class="nav-item">
          <a class="nav-link user-link {{ ($request->segment(1) == 'ar') ? 'float-right text-right' : '' }}" href="#">
              <img
                class="user__dp img-circle" style="border-radius: 50%;"
                srcset="{{ (isset(auth()->user()->profile_image)) ? asset(auth()->user()->profile_image) : asset('backend_assets/user_uploads/default.png') }}"
                alt="User Profile"
              />
            @auth()
              {{ auth()->user()->name }}
            @endauth
            </a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($request->segment(1) == 'ar') ? 'float-right text-right' : '' }}" href="{{ route('user_profile', app()->getLocale()) }}">
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#6') }}"></use>
            </svg>
            {{ trans('lang.user_sidebar.settings') }}
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link user-link user__name {{ ($request->segment(1) == 'ar') ? 'float-right text-right' : '' }}" href="{{ route('logout', app()->getLocale()) }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">                  
              <i class="fas fa-arrow-alt-circle-right fa-fw"></i> {{ trans('lang.logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>

    </div>
  </nav>
</div>
