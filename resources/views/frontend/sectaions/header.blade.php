<div class="menu-container position-fixed">
        <div class="menu-sliders"></div>
        <div class="menu-sliders"></div>
        <div class="menu-sliders"></div> 
        <div class="menu">
            <div class="menu-close text-white fs-1">
                <i class="bi bi-x"></i>
            </div>
                    
            <ul>
                <li><a href="{{Route('frontend.home')}}"       class="text-decoration-none text-white fw-bold      ">{{__('Home Page')}}</a></li>
                <li><a href="{{Route('frontend.fields')}}"     class="text-decoration-none text-white fw-bold  ">{{__('Fields')}}</a></li>
                <li><a href="{{Route('frontend.products')}}"   class="text-decoration-none text-white fw-bold  ">{{__('Products')}}</a></li>
                <li><a href="{{Route('frontend.software')}}"   class="text-decoration-none text-white fw-bold  ">{{__('Software And Applications')}}</a></li>
                <li><a href="{{Route('frontend.challenges')}}" class="text-decoration-none text-white fw-bold  ">{{__('Challenges Solved')}}</a></li>
            </ul>
        </div>
    </div>
    
    <!--start slider section -->
    <section id="header" class="container-fluid text-white">
        <div class="container">
    
            <section id="top-nav"
                class="py-2 d-flex fw-light justify-content-between border-bottom border-white border-opacity-10">
                <div class="d-flex justify-content-between">
                    <i class="bi bi-globe-europe-africa"></i> 
                   @include('frontend/partials/language_switcher')
                </div>
                
                
                <div><a class="text-decoration-none text-white-50" href="{{route('echocloud.home')}}">EchoCloud</a></div>
                
                
            </section>
    
            <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4">
                <div class="col-3 mb-2 mb-md-0">
                    <a href="{{Route('frontend.home')}}" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img class="img-fluid" width="143" src="{{Asset('frontend-assets/images/logo-w.png')}}" alt="SpaceEcho Logo">
                    </a>
                </div>

                <ul class="nav fw-normal col-7 mb-2 justify-content-between mb-md-0 d-lg-flex  d-none">
                    <li><a href="{{Route('frontend.home')}}" class="nav-link px-xl-2 text-hover-white          {{ Route::is('frontend.home')  ? "fw-bold text-white" : "text-white-50" }} ">{{__('Home Page')}}</a></li>
                    <li><a href="{{Route('frontend.fields')}}" class="nav-link px-xl-2 text-hover-white        {{ Route::is('frontend.fields')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Fields')}}</a></li>
                    <li><a href="{{Route('frontend.products')}}" class="nav-link px-xl-2 text-hover-white      {{ Route::is('frontend.products')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Products')}}</a></li>
                    <li><a href="{{Route('frontend.software')}}" class="nav-link px-xl-2 text-hover-white      {{ Route::is('frontend.software')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Software And Applications')}}</a></li>
                    <li><a href="{{Route('frontend.challenges')}}" class="nav-link px-xl-2 text-hover-white    {{ Route::is('frontend.challenges')  ? "fw-bold text-white" : "text-white-50" }}">{{__('Challenges Solved')}}</a></li>
                </ul>
    
                <div class="col-2 text-end  d-none d-lg-flex justify-content-end">
                    <button type="button" class="btn text-white rounded-pill border-white py-2 px-4 ">{{__('Contact Us')}}</button>
                </div>
                <div class="col-2 text-end d-lg-none d-flex justify-content-end">
                    <button class="fs-1 plus-btn">
                        <i class="bi bi-list-nested"></i>
                    </button>
                </div>
    
        </div>
        {{-- header title --}}
        @stack('header-title')

        <a href="#main">
            <div id="scroll-down">
                <div class="vl"></div>
                <div class="cir"></div>
                <div class="text">{{__('Scroll Downs')}}</div>
            </div>
        </a>
    
        </header>
    
    </section>
    <!--end slider section -->