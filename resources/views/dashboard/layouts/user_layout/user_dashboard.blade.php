@inject('request', 'Illuminate\Http\Request')

<!DOCTYPE html>
<html lang="en">
	<head>
		@include('dashboard.user_panel.partials.header')
		@yield('styles')
	</head>
	<body style="{{ ($request->segment(1) == 'ar') ? 'direction:rtl' : '' }}">
		<div class="grid-container">
			@include('dashboard.user_panel.partials.sidebar')
			@yield('content')
		</div>
		@include('dashboard.user_panel.partials.footer')
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
