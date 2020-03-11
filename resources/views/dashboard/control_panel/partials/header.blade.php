<title>
    @isset($title)
        {{ $title }} {{ ' | ' }}
    @endif
    {{ althraa_site_title() }}
</title>


<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="description" content="{{ althraa_site_description() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="{{ asset('backend_assets/site_assets/css/general.css') }}" />
<link rel="stylesheet" href="{{ asset('backend_assets/admin_dashboard/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend_assets/admin_dashboard/css/style.css') }}" />

<!-- GOOGLE FONTS -->
<link
  href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,500,500i,600,600i,700,700i&display=swap"
  rel="stylesheet"
/>

{{-- favicon --}}
<link rel="shortcut icon" type="image/png" href="{{ althraa_favicon() }}"/>

<!-- Toastr CSS -->
<link href="{{ asset('backend_assets/site_assets/css/toastr/toastr.min.css') }}" rel="stylesheet">

