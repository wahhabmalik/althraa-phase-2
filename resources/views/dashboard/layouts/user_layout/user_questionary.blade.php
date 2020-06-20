@inject('request', 'Illuminate\Http\Request')

<!DOCTYPE html>
<html>

<head>
	@include('dashboard.auth.partials.header')
	@yield('styles')
  <style type="text/css">
    @if($request->segment(1) == 'ar') 
      .wizard-card .wizard-navigation .progress-with-circle{
        z-index: 0;
      }
    @endif
    body:after {
            content: "{{ trans('lang.beta_version') }}";
            position: fixed;
            width: 138px;
            height: 22px;
            background: linear-gradient(180deg, #bf1e1c, #ad1b16);
            top: 22px;
            left: -27px;
            text-align: center;
            font-size: 11px;
            font-family: sans-serif;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            line-height: 23px;
            transform: rotate(-37deg);
        }    
  </style>

</head>

<body class="gray-bg" style="{{ ($request->segment(1) == 'ar') ? 'direction:rtl' : '' }}">
    {{-- <div id="overlayer"></div>
    <span class="loader">
      <span class="loader-inner"></span>
    </span> --}}

    <header class="container-fluid header  header__login">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="logo">
          <a class="navbar-brand" href="{{ route('/', app()->getLocale()) }}">
            <img
              class="logo__img"
              srcset="
                {{ althraa_logo() }},
                {{ althraa_logo() }}
              "
              alt="Thokhor Logo"
            />
          </a>
        </div>
        {{-- <div class="{{ ($request->segment(1) == 'ar') ? 'float-left text-left' : 'float-right text-right' }} navbar-nav ml-auto">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" style="font-size: 15px;font-weight: 600;margin-right: 10px;" href="{{ route('home', app()->getLocale()) }}">{{ trans('lang.dashboard.dashboard') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" style="font-size: 15px;font-weight: 600" href="{{ route('logout', app()->getLocale()) }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                         
                                            {{ trans('lang.logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>


          </ul>
        </div> --}}
      </nav>
    </header>

    



    @yield('content')
    
@include('dashboard.auth.partials.footer')
@yield('scripts')
  <script src="{{ asset('backend_assets/site_assets/js/toastr/toastr.min.js') }}"></script>

  <script type="text/javascript">
      toastr.options = {
          closeButton: true,
          progressBar: true,
          debug: false,
          positionClass: 'toast-bottom-right',
          showMethod: 'slideDown',
          timeOut: 5000
      };
  </script>
  {{-- @if ($errors->count() > 0)
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "disableTimeOut" : true,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "timeOut": 0,
                "extendedTimeOut": 0
            };

            var errors = {!! $errors !!};
            $.each(errors, function(propName, propVal) {
                // console.log(propName, propVal);
                toastr.error(propVal);
            });

        </script>
    @endif --}}

    {{-- messages --}}
    @if(session("successToastr"))
    <script type="text/javascript">
      toastr.success("{{ session("successToastr") }}");
    </script>
    @endif
    @if(session("errorToastr"))
    <script type="text/javascript">
      toastr.error("{{ session("errorToastr") }}");
    </script>
    @endif
    @if(session("warningToastr"))
    <script type="text/javascript">
      toastr.warning("{{ session("warningToastr") }}");
    </script>
    @endif
    @if(session("infoToastr"))
    <script type="text/javascript">
      toastr.info("{{ session("infoToastr") }}");
    </script>
    @endif
    
</body>
</html>
