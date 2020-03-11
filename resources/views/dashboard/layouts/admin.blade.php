@inject('request', 'Illuminate\Http\Request')

<!DOCTYPE html>
<html>

<head>
	@include('dashboard.control_panel.partials.header')
	@yield('styles')
    <style type="text/css">
        @if ($request->segment(1) == 'ar')
            body{
                direction: rtl !important;
            }
        @endif
    </style>
</head>

<body class="gray-bg" >
    <header class="container-fluid header header__login">
      @include('dashboard.control_panel.partials.navbar')
    </header>


    @yield('content')
    
@include('dashboard.control_panel.partials.footer')
@yield('scripts')
	@if ($errors->count() > 0)
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "200",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            var errors = {!! $errors !!};
            $.each(errors, function(propName, propVal) {
                // console.log(propName, propVal);
                toastr.error(propVal);
            });

        </script>
    @endif

</body>
</html>
