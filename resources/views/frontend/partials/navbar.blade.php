@inject('request', 'Illuminate\Http\Request')


<header>

<style type="text/css">
{{ ($request->segment(1) == 'ar') ? '.slicknav_menu { text-align: right !important}' : '' }}

@media only screen and (max-width: 991px) {
  a.login_link {
     margin-right: 0 !important; 
  }
}
</style>


<div class="header-area ">
    <div id="sticky-header" class="main-header-area">
        <div class="container-fluid p-2">
            <div class="row align-items-center no-gutters">
                <div class="col-xl-5 col-lg-6 {{ ($request->segment(5) == 'ar') ? 'order-md-3' : '' }}">
                    <div class="main-menu  d-none d-lg-block">
                        <nav>
                            <ul id="navigation" class="{{ ($request->segment(1) == 'ar') ? 'rtl_structure text-right' : '' }}">
                                
                                <li>
                                    <a class="{{ ($request->segment(2) == 'contact') ? 'active' : '' }}" href="{{ route('contact', app()->getLocale()) }}">{{ trans('lang.site_menu.contact') }}</a>
                                </li>

                                <li>
                                    <a class="{{ ($request->segment(2) == 'about') ? 'active' : '' }}" href="{{ route('about', app()->getLocale()) }}">{{ trans('lang.site_menu.about_us') }}</a>
                                </li>

                                <li>
                                    <a class="{{ ($request->segment(2) == 'legal') ? 'active' : '' }}" href="{{ route('legal', app()->getLocale()) }}">{{ trans('lang.site_menu.legal') }}</a>
                                </li>

                                {{-- <li>
                                    <a class="{{ ($request->segment(2) == 'legal') ? 'active' : '' }}" href="{{ route('legal', app()->getLocale()) }}">{{ trans('lang.site_menu.legal') }}</a>
                                </li> --}}

                                @auth
                                  @if (auth()->user()->two_factor_code)
                                    <a class="login_link" href="{{ route('verify.index', app()->getLocale()) }}">
                                        {{ trans('lang.frontend.verify') }}
                                    </a>
                                  @else
                                    <li class="auth_resp">
                                      <a class="login_link" href="{{ route('home', app()->getLocale()) }}">{{ trans('lang.dashboard.dashboard') }}</a>
                                    </li>

                                    <li class="auth_resp">
                                      <a class="login_link" href="{{ route('logout', app()->getLocale()) }}"
                                      onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                                   
                                        {{ trans('lang.logout') }}
                                      </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                      @csrf
                                    </form>
                                  @endif
                                @else
                                    {{-- <li class="auth_resp">
                                        <a class="{{ ($request->segment(2) == 'register') ? 'active' : '' }}" href="{{ route('register', app()->getLocale()) }}">{{ trans('lang.get_started') }}</a>
                                    </li> --}}
                                  <li class="auth_resp">
                                      <a class="{{ ($request->segment(2) == 'login') ? 'active' : '' }}" href="{{ route('login', app()->getLocale()) }}">{{ trans('lang.login') }}</a>
                                  </li>
                                @endauth

                                @switch($request->segment(1))
                                    @case('ar')
                                        @foreach (config('app.available_locales') as $locale)
                                          <a class="button_primary lang_btn auth_resp text-white"
                                             style="margin-bottom: 10px;" 
                                             href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                              @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>{{ trans('lang.language') }}
                                              {{-- {{ ucfirst($locale) }} --}}
                                          </a>
                                          @break
                                        @endforeach
                                    @break    
                                    @case('en')
                                        @foreach (config('app.available_locales') as $key => $locale)
                                            @if($key == 1)
                                              <a class="button_primary lang_btn auth_resp text-white"
                                                 style="margin-bottom: 10px;" 
                                                 href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                                  @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>
                                                  {{ trans('lang.language') }}
                                                  {{-- {{ ucfirst($locale) }} --}}
                                              </a>
                                            @endif
                                        @endforeach
                                    @break    
                                    @default
                                        {{ $request->segment(1) }}
                                    @break
                                @endswitch
                                {{-- <li>
                                    <a class="{{ ($request->segment(2) == 'pricing') ? 'active' : '' }}" href="{{ route('pricing', app()->getLocale()) }}">{{ trans('lang.site_menu.pricing') }}</a>
                                </li>
                                <li>
                                    <a class="{{ ($request->segment(2) == 'help') ? 'active' : '' }}" href="{{ route('help', app()->getLocale()) }}">{{ trans('lang.site_menu.help') }}</a>
                                </li>
                                <li>
                                    <a class="{{ ($request->segment(2) == 'careers') ? 'active' : '' }}" href="{{ route('careers', app()->getLocale()) }}">{{ trans('lang.site_menu.careers') }}</a>
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 {{ ($request->segment(5) == 'ar') ? 'order-md-2' : '' }}">
                    <div class="logo-img">
                        <a href="{{ route('/', app()->getLocale()) }}">
                            <img
                                class="logo__img img-responsive"
                                src="{{ althraa_logo() }}"
                                alt="Althraa Logo"
                              />
                        </a>
                    </div>
                </div>
                <div 
                    class="col-xl-5 col-lg-4 d-none d-lg-block {{ ($request->segment(5) == 'ar') ? 'order-md-1 rtl_structure_left' : '' }}" 
                    style="{{ ($request->segment(5) == 'ar') ? 'display: flex !important' : '' }}"
                    >
                    <div class="book_room">
                        
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                @if (auth()->user()->two_factor_code)
                                    <a class="login_link" href="{{ route('verify.index', app()->getLocale()) }}">
                                        {{ trans('lang.frontend.verify') }}
                                    </a>
                                @else
                                    <a class="login_link" href="{{ route('home', app()->getLocale()) }}">{{ trans('lang.dashboard.dashboard') }}</a>


                                    <a class="login_link" href="{{ route('logout', app()->getLocale()) }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                                   
                                      {{ trans('lang.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                      @csrf
                                    </form>
                                @endif
                                  
                                @else
                                    <a class="login_link" href="{{ route('login', app()->getLocale()) }}">{{ trans('lang.login') }}</a>

                                    {{-- @if (Route::has('register'))
                                        <a class="button_primary get_started" href="{{ route('register', app()->getLocale()) }}">{{ trans('lang.get_started') }}</a>
                                    @endif --}}
                                @endauth

                                
                                
                            </div>
                        @endif
                       {{-- @php $locale = session()->get('locale'); @endphp --}}
                        @switch($request->segment(1))
                            @case('ar')
                                @foreach (config('app.available_locales') as $locale)
                                  <a class="button_primary lang_btn"
                                     href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                      @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>{{ trans('lang.language') }}
                                      {{-- {{ ucfirst($locale) }} --}}
                                  </a>
                                  @break
                                @endforeach
                            @break    
                            @case('en')
                                @foreach (config('app.available_locales') as $key => $locale)
                                    @if($key == 1)
                                      <a class="button_primary lang_btn"
                                         href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                          @if (app()->getLocale() == $locale) style="font-weight: bold;" @endif>
                                          {{ trans('lang.language') }}
                                          {{-- {{ ucfirst($locale) }} --}}
                                      </a>
                                    @endif
                                @endforeach
                            @break    
                            @default
                                {{ $request->segment(1) }}
                            @break
                        @endswitch
                        
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>