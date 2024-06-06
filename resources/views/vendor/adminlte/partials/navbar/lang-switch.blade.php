@php
    $current_locale = app()->getLocale() ?? 'en';
    $available_locale = config('app.available_locales') ;
    $current_locale_object = $available_locale[$current_locale] ;
    
@endphp
 <!-- Language Dropdown Menu -->
 <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        {{$current_locale_object['flag']}} {{ __($current_locale_object['name']) }}
    </a>
    <div class="dropdown-menu dropdown-menu-right p-0">
      
      @foreach( $available_locale as $locale_key => $available_locale)
            <a href="{{ Route('switch-lang' , [ $locale_key ]) }}" class="dropdown-item {{ $locale_key === $current_locale ? "active" : "" }}">
                {{$available_locale['flag']}} {{ __($available_locale['name']) }}
            </a>
          
    
        @endforeach

    </div>
  </li>