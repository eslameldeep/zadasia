<x-frontend-layout>
    @push('header-title')
        <div class="d-flex align-items-center text-center h-75 ">
            <div class="w-100">
                <h1 class="" style="font: normal normal 800 50px/135px Cairo; letter-spacing: 0px;">
                    {{ __('We are the ECHO of nature’s Silence.') }}</h1>
            </div>
        </div>
    @endpush

    <!-- start Who we are section-->
    <section class="container-fluid position-relative" id="how-we-are">


        <div class="container">
            <div class="row" style="min-height: 750px;">
                <div class="col-md-5 offset-1 m-auto wow bounceInDown">
                    <h6 class="section-slug">{{ __('Who we are ?') }}</h6>
                    <h2 class="position-relative dot-after d-inline section-title ">
                        {{ __('Empowering Sustainability Through Connected Solutions') }} </h2>
                    <p style="color : #9faaae ; line-height: 3ch; margin-top: 20px;">
                        {{ __('SpaceEcho is at the forefront of delivering cutting-edge loT solutions for water management, encompassing surface and subsurface monitoring, tide gauges, and air quality stations. With a focus on integration, their innovative systems enable comprehensive data collection and analysis to facilitate effective water resource management.') }}
                    </p>
                    {{-- <a class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">Read More</a><br /> --}}

                </div>
                <div class="col-md-6 who-are-we-img wow bounceInUp">

                </div>
            </div>
            <!-- <div class="how-we-are-bg">SPACE ECHO</div> -->
        </div>
    </section>
    <!-- end Who we are section-->
    @if ($Fields->count() > 0)
        <!-- start section field -->
        <section class="container pt-5 field" id="fe">
            <div class="row wow bounceInUp">
                <div class="col-md-10 ">
                    <h6 class="section-slug ">{{ __('Our Fields.') }} </h6>
                    <h2 class="position-relative dot-after d-inline section-title bolder fw-bold">
                        {{ __('Check our fields') }}</h2>
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <a  href="{{ route('frontend.fields') }}"
                        class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">{{ __('Show More') }}</a><br />
                </div>
            </div>
            <div class="row">
                @foreach ($Fields as $field)
                    <!-- start fields item -->
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  p-2 item ">
                        <div class="fields-list h-100 p-5">
                            <div
                                class="field-icon position-relative text-center d-flex align-items-center justify-content-center ">
                                <img src="frontend-assets/images/gear.svg" class="img-fluid w-50" alt="">
                            </div>
                            <div class="h5 my-3 fw-bold">{{ $field->name }}</div>
                            <div class="fs-5 my-3 fs-6 text-black-50">{{ $field->short_description }}</div>
                            <a class="more-btn fw-bold text-decoration-none text-black"
                                href="{{ route('frontend.fields.show', $field->slug) }}">{{ __('More') }} <span
                                    class="dot-btn"><i
                                        class="bi {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'bi-arrow-left' : 'bi-arrow-right' }} d-inline icon"></i></span></a>
                        </div>
                    </div>
                    <!-- end fields item -->
                @endforeach


            </div>
        </section>
        <!-- end section field -->
    @endif

    @if ($Challenges->count())


        <!-- start Challenges Solved -->
        <section class="container pt-5 " id="challenges-solved">
            <div class="row wow bounceInUp">
                <div class="col-md-10 ">
                    <h6 class="section-slug">{{ __('Challenges solved') }}</h6>
                    <h2 class="position-relative dot-after d-inline section-title"> {{ __('Challenges solved') }}</h2>
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <a  href="{{ route('frontend.challenges') }}"
                        class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">{{ __('Show More') }}</a><br />
                </div>
            </div>
            <div class="swiper challenges-solved-slider my-5">

                <div class="swiper-wrapper">

                    @foreach ($Challenges as $Challenge)
                        <!-- Start swiper item for challenges -->
                        <div class="swiper-slide position-relative d-block mb-2 li-card"
                            style="background-image: url({{ $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb') ? $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb') : asset('/frontend-assets/images/87566b91c4.png')}});">
                            <div class="position-absolute card text-white">
                                <a href="{{route('frontend.challenges.show' , $Challenge->id )}}" class="d-flex justify-content-between text-area text-decoration-none text-white">
                                    <div class="text-start ">
                                        <div class="fw-bold fs-14">{{ $Challenge->title }}</div>
                                        <div class="text-white-50 fs-12">{{ $Challenge->slogan }}</div>
                                    </div>
                                    <span class="dot-btn"><i class="bi bi-search d-inline icon"></i></span>
                                </a>
                            </div>
                        </div>
                        <!-- End swiper item for challenges -->
                    @endforeach


                </div>

                <div class="swiper-pagination"></div>
            </div>

        </section>
        <!-- end section Challenges Solved -->
    @endif
    @if ($Products->count())
        <!-- start products -->
        <section class="container pt-5" id="products">
            <div class="row">
                <div class="col-md-3 wow bounceInUp">
                    <h6 class="section-slug">{{ __('Our Products.') }}</h6>
                    <h2 class="position-relative dot-after d-inline section-title">{{ __('IoT Products') }}</h2>
                    <div class="d-block my-3 fs-18 text-black-50 fw-normal">
                        {{ __('Discover all our reliable and certified devices based on IoT technology and connect them to the cloud.') }}
                    </div>
                    <a href="{{route('frontend.products')}}"
                        class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">{{ __('Show More') }}</a><br />


                </div>
                <div class="col-md-9 position-relative">


                    <div class="swiper products-slider  my-5">




                        <div class="swiper-wrapper ">

                            @foreach ($Products as $product)
                                <!-- Start swiper item for challenges -->
                                <div
                                    class="swiper-slide text-center position-relative p-2 bg-white text-black h-100 d-flex align-content-center flex-wrap justify-content-center">
                                    <a class="fw-bold text-decoration-none text-black"
                                        href="{{ route('frontend.products.show', $product->slug) }}">

                                        <div class="d-block mx-auto w-100 product-img"
                                            style="background-image: url({{ $product->getFirstMedia('image')?->getFullUrl('image-thumb') == null ? asset('frontend-assets/images/product.png') : $product->getFirstMedia('image')?->getFullUrl('image-thumb') }}); "></div>

                                        <div class="d-block f-14 fw-bold product-name">{{ $product->name }}</div>
                                    </a>
                                </div>
                                <!-- End swiper item for challenges -->
                            @endforeach

                        </div>


                    </div>
                    <div class="swiper-button-next"><i class="bi bi-arrow-right"></i></div>
                    <div class="swiper-button-prev"><i class="bi bi-arrow-left"></i></div>

                </div>

            </div>
            </div>
        </section>
        <!-- end section product -->
    @endif


    @if ($Partners->count())
        <!-- start partners -->
        <section class="container pt-5 text-center" id="partners">
            <h6 class="section-slug wow bounceInUp">{{ __('Partners') }}</h6>
            <h1 class="position-relative dot-after d-inline section-title wow bounceInUp">{{ __('Our Partners') }}</h1>
            <div class="swiper partners-slider my-5">

                <div class="swiper-wrapper">

                    @foreach ($Partners as $Partner)
                        <!-- Start swiper item for partners -->
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{ $Partner->getFirstMediaUrl('image') }}" alt="{{ $Partner->name }}"
                                srcset="">
                        </div>
                        <!-- End swiper item for partners -->
                    @endforeach


                </div>

                <div class="swiper-pagination"></div>
            </div>

        </section>
        <!-- end section partners -->
    @endif

    @if ($Articles->count() || $Events->count())

        <section id="new-events" class="new-events container">
            <div class="row">
                @if ($Articles->count())

                    <!-- start news -->
                    <div class="col-lg-5 col-md-12">
                        <div id="news" class="mb-5 wow bounceInUp">
                            <h6 class="section-slug">{{ __('Articles') }} </h6>
                            <h2 class="position-relative dot-after d-inline section-title fw-bold">{{ __('Articles') }}
                            </h2>
                        </div>

                        <div class="news-card">

                            @foreach ($Articles as $Article)
                                <!-- Start news-item -->
                                <div class="position-relative d-block w-100 mb-2 li-card"
                                    style="background-image: url({{ $Article->getFirstMediaUrl('image') }});">
                                    <div class="card text-white position-absolute">
                                        <a href="{{route('frontend.articles.show' , $Article->slug )}}" class="d-flex justify-content-between text-area text-decoration-none text-white">
                                            <div class="text-start">
                                                <div class="fw-bold fs-14">{{ $Article->name }}</div>
                                                <div class="text-white-50 fs-12">{{ $Article->sub_name }}</div>
                                            </div>
                                            <span class="dot-btn"><i class="bi bi-book-half d-inline icon"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <!-- End news-item -->
                            @endforeach
                        </div>
                        <a href="{{route('frontend.articles')}}"
                            class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">{{ __('Show More') }}</a><br />
                    </div>
                    <!-- end news -->
                @endif
                @if ($Articles->count() && $Events->count())
                    <div class="col-lg-2 d-flex justify-content-center">
                        <div class="vertical-line"></div>
                    </div>
                @endif

                @if ($Events->count())

                    <!-- start events -->
                    <div class="col-lg-5 col-md-12 d-flex flex-column">
                        <div id="events" class="mb-5 wow bounceInUp">
                            <h6 class="section-slug">{{ __('Events') }}</h6>
                            <h2 class="position-relative dot-after d-inline section-title fw-bold">
                                {{ __('Events') }}</h2>
                        </div>

                        <div class="events-card py-5 px-4 rounded-4  mb-2 flex-grow-1"
                            style="background-color: #F1FAFD ;">

                            @foreach ($Events as $index => $Event)
                                <div class="artical-item w-100 bg-white py-3 px-4 rounded-2 p-1 fw-bolder mb-2">
                                    <div class="expand" id="expand-{{$index}}">
                                        <span class="mx-2 icon"><i class="bi bi-plus"></i> </span>
                                        <span>{{ $Event->name }}</span>
                                    </div>
                                    <div class="collapse text-black-50" id="collapse-{{$index}}">
                                        <hr />
                                        {!! $Event->description!!}
                                        ... <a href="{{route('frontend.events.show' , $Event->slug )}}" class="text-decoration-none" href="#">{{__('Read more')}}</a>
                                    </div>

                                </div>
                            @endforeach


                        </div>

                        <a href="{{route('frontend.events')}}"
                            class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">{{ __('Show More') }}</a><br />

                    </div>

                    <!-- end events -->

                @endif
            </div>
        </section>
    @endif

    @push('css')
        <style>
            #header {
                /* background-image: url(frontend-assets/images/gear.svg) !important ; */
            }

            @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')

                #how-we-are::after {
                    background-position: right center !important;
                }
            @endif
        </style>
    @endpush
</x-frontend-layout>
