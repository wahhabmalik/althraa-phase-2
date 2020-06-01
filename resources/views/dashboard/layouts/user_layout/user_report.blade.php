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
