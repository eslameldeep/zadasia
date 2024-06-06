@php
    $current_locale = app()->getLocale() ?? 'en';
    $available_locale = config('app.available_locales') ;
    $current_locale_object = $available_locale[$current_locale] ;
@endphp
 <!-- Language Dropdown Menu -->

 <li class="nav-item d-flex align-items-center">
    @if($current_locale == 'en')
    <a class="btn btn-outline-primary btn-sm mb-0 ms-3"  href="{{ Route('switch-lang' , [ 'ar' ]) }}">العربية</a>
    @else
    <a class="btn btn-outline-primary btn-sm mb-0 ms-3"  href="{{ Route('switch-lang' , [ 'en' ]) }}">English</a>

    @endif
  </li>