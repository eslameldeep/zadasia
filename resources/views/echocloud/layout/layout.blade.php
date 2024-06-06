<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$available_locale[app()->getLocale()]['rtl'] ? "rtl" : "ltr"}}" data-bs-theme="{{ auth()->user()->dark_mode == 1 ? 'dark' : 'light'}}">

<head>
    <meta charset="UTF-8">

    {!! SEO::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="change-theme-api" content="{{ route('adminlte.darkmode.toggle') }}">
    @include('echocloud.layout.head')
    
    @stack('header')
   
</head>

<body class="g-sidenav-show  {{ auth()->user()->dark_mode ? 'dark-page' : 'bg-gray-100'}} {{ $available_locale[app()->getLocale()]['rtl'] ? 'rtl' : '' }}">
    @include('echocloud.layout.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y" >
        
        @include('echocloud.layout.navbar')
        {{ $slot }}
        
    </main>
    @if (config('echocloud.side-menu'))
        @include('echocloud.layout.side-menu')
    @endif
   
    @include('echocloud.layout.scripts')
    @stack('css')
    @stack('style')
    @stack('scripts')
    @stack('js')

</body>

</html>