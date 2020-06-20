@inject('request', 'Illuminate\Http\Request')

<!DOCTYPE html>
<html>

<head>
	@include('dashboard.auth.partials.header')
  <style type="text/css">
    html{
        @if($request->segment(1) == 'ar')
            direction: rtl;
        @endif
    }

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
	@yield('styles')

</head>

<body class="gray-bg" >
    <header class="container-fluid header header__login">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="logo">
          <a class="navbar-brand" href="{{ route('/','en') }}">
            <img
              class="logo__img"
              src="{{ althraa_logo() }}"
              alt="Althraa Logo"
            />
          </a>
        </div>
      </nav>
    </header>


    @yield('content')
    
@include('dashboard.auth.partials.footer')
<!-- Toastr -->
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
@yield('scripts')
</body>
</html>
