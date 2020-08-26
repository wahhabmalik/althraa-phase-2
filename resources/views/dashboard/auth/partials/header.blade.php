<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="{{ asset('backend_assets/site_assets/css/general.css') }}" />
<link rel="stylesheet" href="{{ asset('backend_assets/login/css/style.css') }}" />

<link rel="stylesheet" href="{{ asset('backend_assets/login/css/bootstrap.min.css') }}" />

{{-- favicon --}}
<link rel="shortcut icon" type="image/png" href="{{ althraa_favicon() }}"/>

<!-- GOOGLE FONTS -->
<link
  href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,500,500i,600,600i,700,700i&display=swap"
  rel="stylesheet"
/>
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

<!-- Toastr CSS -->
<link href="{{ asset('backend_assets/site_assets/css/toastr/toastr.min.css') }}" rel="stylesheet">

<title>
	@isset($title)
		{{ $title }} {{ ' | ' }}
	@endif
	{{ althraa_site_title() }}
</title>

