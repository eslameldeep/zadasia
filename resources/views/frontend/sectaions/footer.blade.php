<section class="mt-5 d-block text-white" id="footer">
    <div class="footer-overlay d-inline-block h-100 w-100 text-center">
        <div class="subscribe-news">
            <div class="dot-after text-capitalize fw-bolder fs-1"> {{ __('Subscribe To Our Newsletter') }} </div>
            <form action="">
                <div class="mt-3 d-flex justify-content-center m-auto subscribe-news-container ">
                    <span
                        class="h-100 {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'rounded-end-circle' : 'rounded-start-circle' }} left-block d-flex align-items-center">
                        <span class="d-flex align-items-center justify-content-center"><i
                                class="bi bi-envelope-fill"></i></span>
                    </span>
                    <span class="h-100 center-block"><input class="border-0 h-100 " type="text"
                            placeholder="{{ __('Enter Your Email Here...') }}"></span>
                    <span
                        class="h-100 {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'rounded-start-circle' : 'rounded-end-circle' }} right-block d-flex align-items-center">
                        <button type="submit "> <i class="bi bi-send-fill"></i> </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="mt-5 container">
            <div class="row links">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="mb-4 fw-bold">{{ __('Links') }}</div>
                    <ul class="list-unstyled text-white-50">
                        <li><a href="{{ route('frontend.home') }}" class="text-white-50">{{ __('Home Page') }}</a></li>
                        <li><a href="{{ route('frontend.fields') }}" class="text-white-50">{{ __('Fields') }}</a></li>
                        <li><a href="{{ route('frontend.products') }}" class="text-white-50">{{ __('Products') }}</a>
                        </li>
                        <li><a href="{{ route('frontend.software') }}"
                                class="text-white-50">{{ __('Software And Applications') }}</a></li>
                        <li><a href="{{ route('frontend.home') }}"
                                class="text-white-50">{{ __('Challenges Solved') }}</a></li>
                        <li><a href="{{ route('frontend.home') }}" class="text-white-50">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="mb-4 fw-bold">{{ __('Fields') }}</div>
                    <ul class="list-unstyled text-white-50">
                        @foreach ($Fields as $Field)
                        <li><a href="{{ route('frontend.fields.show' , $Field->slug) }}" class="text-white-50">{{ $Field->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="mb-4 fw-bold">{{__('Products')}}</div>
                    <ul class="list-unstyled text-white-50">
                        @foreach ($Products as $Product)
                        <li><a href="{{ route('frontend.products.show' , $Product->slug) }}" class="text-white-50">{{ $Product->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 px-5">

                    <img class="img-fluid" src="{{ Asset('frontend-assets/images/logo-w.png') }}" alt="SpaceEcho Logo">

                    <div class="d-flex justify-content-around mt-5">
                        <div class=""><a target="_blank" href="https://www.linkedin.com/company/spaceecho" class="text-decoration-none text-white"><i
                                    class="bi bi-linkedin"></i></a></div>
                        {{-- <div class=""><a href="#" class="text-decoration-none text-white"><i class="bi bi-twitter"></i></a></div> --}}
                        <div class=""><a target="_blank" href="https://www.youtube.com/@space-echo-co" class="text-decoration-none text-white"><i
                                    class="bi bi-youtube"></i></a></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="mt-5 mb-5 container">
            <div class="border-top border-white py-4 py-4">
                <div class="text-center ">
                    {{ __('© SpcaeEcho, Co. All rights reserved.') }}
                </div>

            </div>
        </div>

    </div>
</section>

@push('css')
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <style>
            #footer .links {
                text-align: right !important;
            }
        </style>
    @endif
@endpush
