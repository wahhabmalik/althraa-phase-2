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
  
    
    
</body>
</html>
