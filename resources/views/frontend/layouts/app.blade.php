@inject('request', 'Illuminate\Http\Request')

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.partials.header')
    @yield('styles')
    @if ($request->segment(1) == 'ar')
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
    @endif
    <style type="text/css">
    	.button{
    		padding: 1.0rem 3.3rem !important;
    	    border: none !important;
    	}
        @if ($request->segment(1) == 'ar')
            body{
                direction: rtl !important;
            }
        @endif
    </style>
</head>
<body>
    @include('frontend.partials.navbar')
    @yield('content')
    @include('frontend.partials.footer_content')
@include('frontend.partials.footer')
@yield('scripts')


</body>
</html>