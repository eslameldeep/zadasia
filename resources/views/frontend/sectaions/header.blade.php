<!-- Top Nav -->
<div class=" text-white text-sm border-b border-white/20 relative z-50">
    <div class="max-w-7xl mx-auto px-4 md:flex  justify-between items-center py-2">

        <!-- Left: F&Q | Privacy Policy | Lang Switch -->
        <div class="flex items-center justify-between space-x-4  rtl:space-x-reverse my-3">
            <a href="{{ route('frontend.faq') }}" class="hover:text-teal-100 text-sm text-teal-500">{{ __('F&Q') }}</a>
            <a href="{{ route('frontend.privacy') }}" class="hover:text-teal-100 text-sm text-teal-500">{{ __('Privacy Policy') }}</a>

            <!-- Language Switch -->
            <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale() === 'en' ? 'ar' : 'en', null, [], true) }}"
               class="hover:text-teal-100 text-teal-500 flex items-center gap-1">
                <i class="fa-solid fa-globe"></i>
                {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
            </a>
        </div>

        <!-- Right: Socials -->
        <div class="flex items-center justify-between space-x-7 rtl:space-x-reverse ">

            <a href="#" class="hover:text-teal-100 text-teal-300"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="hover:text-teal-100 text-teal-300"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="hover:text-teal-100 text-teal-300"><i class="fa-brands fa-snapchat"></i></a>
            <a href="#" class="hover:text-teal-100 text-teal-300"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#" class="hover:text-teal-100 text-teal-300"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
    </div>
</div>

<!-- Main Nav -->
<header class="text-white relative z-50">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between py-4">

        <!-- Logo -->
        <div class="flex-shrink-0">
            <a href="{{ route('frontend.home') }}">
                <img src="{{ asset('frontend-assets/images/logo-w.png') }}" alt="Zadasia Logo" class="h-10 w-auto">
            </a>
        </div>

        <!-- Navigation Links (Desktop) -->
        <nav class="hidden lg:flex space-x-6 rtl:space-x-reverse text-base">
            <a href="{{ route('frontend.home') }}"
               class="{{ Route::is('frontend.home') ? 'font-bold text-white' : 'text-white/70 hover:text-white' }}">
                {{ __('Home Page') }}
            </a>
            <a href="{{ route('frontend.fields') }}"
               class="{{ Route::is('frontend.fields') ? 'font-bold text-white' : 'text-white/70 hover:text-white' }}">
                {{ __('Fields') }}
            </a>
            <a href="{{ route('frontend.products') }}"
               class="{{ Route::is('frontend.products') ? 'font-bold text-white' : 'text-white/70 hover:text-white' }}">
                {{ __('Products') }}
            </a>
            <a href="{{ route('frontend.software') }}"
               class="{{ Route::is('frontend.software') ? 'font-bold text-white' : 'text-white/70 hover:text-white' }}">
                {{ __('Software And Applications') }}
            </a>
            <a href="{{ route('frontend.challenges') }}"
               class="{{ Route::is('frontend.challenges') ? 'font-bold text-white' : 'text-white/70 hover:text-white' }}">
                {{ __('Challenges Solved') }}
            </a>
        </nav>

        <!-- Contact Us Button (Desktop) -->
        <div class="hidden lg:flex">
            <a href="{{ route('frontend.contact') }}"
               class="px-5 py-2 rounded-[25px] bg-teal-700 text-white transition hover:bg-teal-800">
                {{ __('Contact Us') }}
            </a>

        </div>

        <!-- Mobile Hamburger -->
        <div class="lg:hidden">
            <button id="mobile-menu-btn" class="text-3xl">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="hidden fixed inset-0 bg-[#053A3C] bg-opacity-95 z-50 p-6">
        <div class="flex justify-end">
            <button id="close-menu" class="text-3xl text-white">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <ul class="mt-8 space-y-6 text-center text-lg">
            <li><a href="{{ route('frontend.home') }}" class="block hover:text-teal-400">{{ __('Home Page') }}</a></li>
            <li><a href="{{ route('frontend.fields') }}" class="block hover:text-teal-400">{{ __('Fields') }}</a></li>
            <li><a href="{{ route('frontend.products') }}" class="block hover:text-teal-400">{{ __('Products') }}</a></li>
            <li><a href="{{ route('frontend.software') }}" class="block hover:text-teal-400">{{ __('Software And Applications') }}</a></li>
            <li><a href="{{ route('frontend.challenges') }}" class="block hover:text-teal-400">{{ __('Challenges Solved') }}</a></li>
        </ul>
        <div class="mt-8 text-center">
            <a href="{{ route('frontend.contact') }}"
               class="inline-block px-6 py-2 rounded-full border border-white text-white hover:bg-teal-600">
                {{ __('Contact Us') }}
            </a>
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');

    mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.remove('hidden'));
    closeMenu.addEventListener('click', () => mobileMenu.classList.add('hidden'));
</script>

{{--<div class="menu-container position-fixed">--}}
{{--        <div class="menu-sliders"></div>--}}
{{--        <div class="menu-sliders"></div>--}}
{{--        <div class="menu-sliders"></div>--}}
{{--        <div class="menu">--}}
{{--            <div class="menu-close text-white fs-1">--}}
{{--                <i class="bi bi-x"></i>--}}
{{--            </div>--}}

{{--            <ul>--}}
{{--                <li><a href="{{Route('frontend.home')}}"       class="text-decoration-none text-white fw-bold      ">{{__('Home Page')}}</a></li>--}}
{{--                <li><a href="{{Route('frontend.fields')}}"     class="text-decoration-none text-white fw-bold  ">{{__('Fields')}}</a></li>--}}
{{--                <li><a href="{{Route('frontend.products')}}"   class="text-decoration-none text-white fw-bold  ">{{__('Products')}}</a></li>--}}
{{--                <li><a href="{{Route('frontend.software')}}"   class="text-decoration-none text-white fw-bold  ">{{__('Software And Applications')}}</a></li>--}}
{{--                <li><a href="{{Route('frontend.challenges')}}" class="text-decoration-none text-white fw-bold  ">{{__('Challenges Solved')}}</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!--start slider section -->--}}
{{--    <section id="header" class="container-fluid text-white">--}}
{{--        <div class="container">--}}

{{--            <section id="top-nav"--}}
{{--                class="py-2 d-flex fw-light justify-content-between border-bottom border-white border-opacity-10">--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <i class="bi bi-globe-europe-africa"></i>--}}
{{--                   @include('frontend/partials/language_switcher')--}}
{{--                </div>--}}


{{--                <div><a class="text-decoration-none text-white-50" href="{{route('echocloud.home')}}">EchoCloud</a></div>--}}


{{--            </section>--}}

{{--            <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4">--}}
{{--                <div class="col-3 mb-2 mb-md-0">--}}
{{--                    <a href="{{Route('frontend.home')}}" class="d-inline-flex link-body-emphasis text-decoration-none">--}}
{{--                        <img class="img-fluid" width="143" src="{{Asset('frontend-assets/images/logo-w.png')}}" alt="SpaceEcho Logo">--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <ul class="nav fw-normal col-7 mb-2 justify-content-between mb-md-0 d-lg-flex  d-none">--}}
{{--                    <li><a href="{{Route('frontend.home')}}" class="nav-link px-xl-2 text-hover-white          {{ Route::is('frontend.home')  ? "fw-bold text-white" : "text-white-50" }} ">{{__('Home Page')}}</a></li>--}}
{{--                    <li><a href="{{Route('frontend.fields')}}" class="nav-link px-xl-2 text-hover-white        {{ Route::is('frontend.fields')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Fields')}}</a></li>--}}
{{--                    <li><a href="{{Route('frontend.products')}}" class="nav-link px-xl-2 text-hover-white      {{ Route::is('frontend.products')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Products')}}</a></li>--}}
{{--                    <li><a href="{{Route('frontend.software')}}" class="nav-link px-xl-2 text-hover-white      {{ Route::is('frontend.software')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Software And Applications')}}</a></li>--}}
{{--                    <li><a href="{{Route('frontend.challenges')}}" class="nav-link px-xl-2 text-hover-white    {{ Route::is('frontend.challenges')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Challenges Solved')}}</a></li>--}}
{{--                </ul>--}}

{{--                <div class="col-2 text-end  d-none d-lg-flex justify-content-end">--}}
{{--                    <button type="button" class="btn text-white rounded-pill border-white py-2 px-4 ">{{__('Contact Us')}}</button>--}}
{{--                </div>--}}
{{--                <div class="col-2 text-end d-lg-none d-flex justify-content-end">--}}
{{--                    <button class="fs-1 plus-btn">--}}
{{--                        <i class="bi bi-list-nested"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--        </div>--}}
{{--        --}}{{-- header title --}}
{{--        @stack('header-title')--}}

{{--        <a href="#main">--}}
{{--            <div id="scroll-down">--}}
{{--                <div class="vl"></div>--}}
{{--                <div class="cir"></div>--}}
{{--                <div class="text">{{__('Scroll Downs')}}</div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    --}}
{{--        </header>--}}

{{--    </section>--}}
{{--    <!--end slider section -->--}}
