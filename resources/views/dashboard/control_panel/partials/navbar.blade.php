@inject('request', 'Illuminate\Http\Request')

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand {{ ($request->segment(1) == 'en') ? 'logo' : 'logo' }}" href="{{ route('/', app()->getLocale()) }}">
    <img
      class="logo__img img-responsive"
      {{-- srcset="
        {{ asset('backend_assets/login/images/logo/logotype.png    1x') }},
        {{ asset('backend_assets/login/images/logo/logotype@2x.png 2x') }}
      " --}}
      src="{{ althraa_logo() }}"
      alt="Althraa Logo"
    />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">

    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Languages Links -->
        @if($request->segment(2) != 'home')
          <li class="nav-item cp-button">
            <a class="text-success" href="{{ route('home', app()->getLocale()) }}">{{ trans('lang.control_panel') }}</a>
          </li>
        @endif
        <li class="nav-item dropdown">
            <a id="languageDropdown" class="nav-link user-link user__name dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @php $locale = session()->get('locale'); @endphp
                @switch($locale)
                    @case('en')
                        {{ __('English') }}
                    @break
                    @case('ar')
                        {{ __('Arabic') }}
                    @break
                    @default
                        {{ trans('lang.language') }}
                @endswitch <span class="caret"></span>
            </a>

            @if(config('app.available_locales'))
                <div class="dropdown-menu {{ ($request->segment(1) == 'ar') ? 'dropdown-menu-right' : 'dropdown-menu-left' }}" aria-labelledby="languageDropdown">
                    @foreach (config('app.available_locales') as $locale)
                    <a class="dropdown-item user-link user__name"
                           href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                            @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>{{ strtoupper($locale) }}
                    </a>
                    @endforeach
                </div>
            @endif
        </li>

      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ trans('lang.login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ trans('lang.register') }}</a>
              </li>
          @endif
      @else
        <li class="nav-item">
          <a class="nav-link user-link user__name" href="#">
            {{ ucfirst(auth()->user()->name) }}

            <img
                class="user__dp img-circle" style="border-radius: 50%;"
                srcset="{{ (isset(auth()->user()->profile_image)) ? asset(auth()->user()->profile_image) : asset('backend_assets/user_uploads/default.png') }}"
                alt="User Profile"
              />
          </a>
        </li>
        
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <svg class="aicon">
              <use xlink:href="{{ asset('backend_assets/dashboard/images/sprite.svg#6') }}"></use>
            </svg>
          </a>

          <div class="dropdown-menu {{ ($request->segment(1) == 'ar') ? 'dropdown-menu-left' : 'dropdown-menu-right' }}" aria-labelledby="navbarDropdown">
              <a class="dropdown-item user-link user__name" href="{{ route('user_profile', app()->getLocale()) }}">
                  {{ trans('lang.user.profile') }}
              </a>
              <hr>
              <a class="dropdown-item user-link user__name" href="{{ route('logout', app()->getLocale()) }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               
                  {{ trans('lang.logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
      @endguest
    </ul>
  </div>
</nav>