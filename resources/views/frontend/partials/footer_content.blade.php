@inject('request', 'Illuminate\Http\Request')

<footer>
    {{-- <div class="container text-center">
        <p class="login_link primary-link">
            {{ trans('lang.frontend.get_started_uppercase') }}
        </p>
        <h1 >
            {{ trans('lang.frontend_footer_content.what_are_you_waiting_for') }}
        </h1>
        <h1 >
            {{ trans('lang.frontend_footer_content.lets_get_started_right_now') }}
        </h1>
        <div class="s-50"></div>

        <form action="{{ route('get-started',app()->getLocale()) }}" method="get">
            <span class="footer_question">
                {{ trans('lang.frontend_footer_content.hi_my_name_is') }}
                <input type="text" class="footer_input" name="name">
                ,
                {{ trans('lang.frontend_footer_content.and_i_am') }}
                <input type="number" class="footer_input" name="years_old">
                {{ trans('lang.frontend_footer_content.years_old') }}
            </span>
            <div class="s-35"></div>
            <button 
            class="button" 
            type="submit" 
            href="{{ route('register',app()->getLocale()) }}"
            >
                {{ trans('lang.frontend_footer_content.start_the_questionnaire') }}
            </button>
        </form>
    </div>

    <div class="background_effect_footer">
        <div class="s-100"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                    <a href="{{ route('/',app()->getLocale()) }}"><img
                      class="logo__img"
                      srcset="
                        {{ asset('backend_assets/login/images/logo/logotype.png    1x') }},
                        {{ asset('backend_assets/login/images/logo/logotype@2x.png 2x') }}
                      "
                      src="{{ althraa_logo() }}"
                      alt="Althraa Logo"
                    /></a>
                </div>
                <div class="col-sm-6">
                    <div class="{{ ($request->segment(1) == 'ar') ? 'float-left' : '' }}">
                        <nav>
                            <ul id="navigation_footer" >
                                <li>
                                    <a href="{{ route('contact', app()->getLocale()) }}">{{ trans('lang.site_menu.contact') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('about', app()->getLocale()) }}">{{ trans('lang.site_menu.about_us') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('legal', app()->getLocale()) }}">{{ trans('lang.site_menu.legal') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('help', app()->getLocale()) }}">{{ trans('lang.site_menu.help') }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="s-100"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                        {{ trans('lang.frontend_footer_content.footer_col_1') }}
                    </p>
                </div>

                <div class="col-sm-6">
                    <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                        {{ trans('lang.frontend_footer_content.footer_col_2___row_1') }}
                    </p>
                    <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                        {{ trans('lang.frontend_footer_content.footer_col_2___row_2') }}
                    </p> 
                    <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                        {{ trans('lang.frontend_footer_content.footer_col_2___row_3') }}
                    </p>
                </div>

                
                <div class="col-sm-3">
                    <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                        {{ trans('lang.frontend_footer_content.footer_col_3') }}
                    </p>
                </div>


            </div>
        </div>
        <div class="s-100"></div>
    </div> --}}
    <div class="copyright-section text_grey">
        <p class="text-center">© {{ date('Y') }} Thokor. All Rights Reserved</p>
    </div>
    
</footer>
