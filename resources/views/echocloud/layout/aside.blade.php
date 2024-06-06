 <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3  bg-transparent {{ $available_locale[app()->getLocale()]['rtl'] ? 'fixed-end me-3 rotate-caret  ps__rtl' : 'fixed-start ms-3' }}" id="sidenav-main" data-color="warning">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href=" {{ route('echocloud.home') }} " target="_blank">
            <img src="{{ asset('echocloud-assets/img/icon-c.svg') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">EchoCloud</span>
          </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            {{-- {!! $echocloudAsideMenu->asUl( ['class' => 'navbar-nav']) !!} --}}
            <ul class="navbar-nav">
            @include('echocloud.component.bootstrap-navbar-items' , ['items' => $echocloudAsideMenu->roots()] )
            </ul>
          
        </div>
        @include('echocloud.component.aside-banner')
</aside>
        