<nav class="d-inline">
 <!-- Language Dropdown Menu -->
 <ul class="list-unstyled">
 <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        {{ __($current_locale_object['name']) }}
    </a>

      <ul>
      @foreach( $available_locale as $locale_key => $available_locale)
           <li> <a href="{{ LaravelLocalization::getLocalizedURL($locale_key, null, [], true) }}" class="dropdown-item {{ $locale_key === $current_locale ? "active" : "" }}">
                {{$available_locale['flag']}} {{ __($available_locale['name']) }}
            </a>
            </li>
        @endforeach
    </ul>

  </li>
</ul>

</nav>
