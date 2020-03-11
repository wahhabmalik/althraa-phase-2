<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="{{ asset('backend_assets/site_assets/css/general.css') }}" />
<link rel="stylesheet" href="{{ asset('backend_assets/dashboard/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend_assets/dashboard/css/style.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- favicon --}}
<link rel="shortcut icon" type="image/png" href="{{ althraa_favicon() }}"/>

<!-- Toastr CSS -->
<link href="{{ asset('backend_assets/site_assets/css/toastr/toastr.min.css') }}" rel="stylesheet">

<title>
	@isset($title)
		{{ $title }} {{ ' | ' }}
	@endif
	{{ config('app.name', 'Althraa') }}
</title>