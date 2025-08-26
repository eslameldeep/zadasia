<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$available_locale[app()->getLocale()]['rtl'] ? "rtl" : "ltr"}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! SEO::generate() !!}
{{--    @vite(['resources/frontend/js/app.js'])--}}
    @vite(['resources/frontend/css/app.css', 'resources/frontend/js/app.js'])
    @stack('header')

</head>

<body>

    @include('frontend.sectaions.header')
    <main id="main">
        {{$slot}}
    </main>
    @include('frontend.sectaions.footer')

    @stack('css')
     @stack('style')
    @stack('scripts')
    @stack('js')

<!-- Google tag (gtag.js) -->
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=G-F9VHWT6TCC"></script>--}}
{{--<script>--}}
{{--  window.dataLayer = window.dataLayer || [];--}}
{{--  function gtag(){dataLayer.push(arguments);}--}}
{{--  gtag('js', new Date());--}}

{{--  gtag('config', 'G-F9VHWT6TCC');--}}
{{--</script>--}}

</body>

</html>
