<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>
    @isset($title)
        {{ $title }} {{ ' | ' }}
    @endif
    {{ althraa_site_title() }}
</title>
<meta name="description" content="{{ althraa_site_description() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="{{ althraa_favicon() }}"/>
<!-- Place favicon.ico in the root directory -->

<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('backend_assets/site_assets/css/general.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('frontend_assets/css/slicknav.css') }}">
<link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">
