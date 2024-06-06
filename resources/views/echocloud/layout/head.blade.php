<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('echocloud-assets/img/apple-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('echocloud-assets/img/icon-c.svg') }}">

<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<!-- Nucleo Icons -->
<link href="{{ asset('echocloud-assets/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('echocloud-assets/css/nucleo-svg.css') }}" rel="stylesheet" />
<link href="{{ asset('echocloud-assets/css/icofont/icofont.min.css') }}" rel="stylesheet" />
<!-- Font Awesome Icons -->

<link href="{{ asset('echocloud-assets/css/nucleo-svg.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/fontawesome-6-free/css/all.min.css') }}" rel="stylesheet" />

<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('echocloud-assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
<link id="pagestyle" href="{{ asset('echocloud-assets/css/dark-theme-core.css') }}" rel="stylesheet" />

@if ($available_locale[app()->getLocale()]['rtl'])
    <style>
        body {
            font-family: "Cairo";
        }
    </style>
@endif
