<x-frontend-layout>
    <!-- start field section -->
    <section class="container field" id="fe">
        <div class="row py-5">
            <div class="mx-auto col-lg-8 ">
                <h6 class="wow bounceInUp  text-center text-black-50 text-capitalize lh-lg">
                    {!! $Field->description !!}
                </h6>
            </div>
        </div>
        @foreach ($Field->FieldsFramework as $Framework)
            <div class="row p-y5">
                <div class="col-lg-6 {{ $loop->odd ? "order-lg-1 order-2" : "order-lg-2 order-2"}} align-items-center d-flex">
                    <div>
                        <h6 class="section-slug">{{ $Framework->sub_name }}</h6>
                        <h2 class="position-relative dot-after d-inline section-title">{{ $Framework->name }}</h2>
                        <div class="d-block my-3 fs-18 text-black-50 fw-normal">
                            {{ $Framework->description }}
                        </div>

                    </div>
                </div>
                <div class="col-lg-6  {{ $loop->odd ? "order-lg-2 order-1 " :"order-lg-1 order-1"  }} justify-content-center {{ $loop->odd ? "justify-content-lg-end" : "justify-content-lg-start"}}   d-flex">
                    <div class="helpful-image" style="background-image: url({{ $Framework->getFirstMedia('image')?->getFullUrl('image-thumb') ? $Framework->getFirstMedia('image')?->getFullUrl('image-thumb') :  asset('frontend-assets/images/87566b91c4.png')  }})">

                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- end field section -->

    <!-- start objective section -->
    <section class="container-fluid objectives">
        <div class="container text-center my-5">
            <h6 class="section-slug"></h6>
            <h2 class="position-relative dot-after d-inline section-title">{{__('Objective Spaceecho’ Iot Solutions')}}</h2>
        </div>
        <div class="position-relative">
            <div class="container swiper objectivesSwiper">
                <div class="swiper-wrapper">

                    @foreach ($Field->FieldsObjective as $Objective)
                    <div class="swiper-slide">
                        <img class="my-5" width="100px" height="100px"
                            src="{{ $Objective->getFirstMedia('image')?->getFullUrl()    ? $Objective->getFirstMedia('image')?->getFullUrl()    : asset('frontend-assets/images/r-m.svg')}}">
                        <h3 class="my-4 fw-bold">{{ $Objective->name}}</h3>
                        <p class="my-4 mx-5">{{ $Objective->description}}</p>
                    </div>

                    @endforeach

                    
                </div>

            </div>
            <div class="swiper-button-next"><i class="bi bi-arrow-right"></i></div>
            <div class="swiper-button-prev"><i class="bi bi-arrow-left"></i></div>
        </div>

    </section>


    <section class="container field py-5" id="fe">
        <div class="row wow bounceInUp">
            <div class="col-md-10 ">
                <h6 class="section-slug ">{{__('Our Fields.')}} </h6>
                <h2 class="position-relative dot-after d-inline section-title bolder fw-bold">{{__('Check our fields')}}</h2>
            </div>
            <div class="col-md-2 d-flex align-items-center">
                <a href="{{route('frontend.fields' )}}" class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">{{__('Show More')}}</a><br />
            </div>
        </div>

        <div class="row">
            @foreach ($Fields as $moreFields)
                
            <!-- start fields item -->
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  p-2 item ">
                <div class="fields-list h-100 p-5">
                    <div
                        class="field-icon position-relative text-center d-flex align-items-center justify-content-center ">
                        <img src="{{asset('frontend-assets/images/gear.svg')}}" class="img-fluid w-50" alt="">
                    </div>
                    <div class="h5 my-3 fw-bold">{{$moreFields->name}}</div>
                    <div class="fs-5 my-3 fs-6 text-black-50">{{$moreFields->short_description}}</div>
                    <a href="{{route('frontend.fields.show' , $moreFields->slug)}}" class="more-btn fw-bold text-decoration-none text-black">More <span class="dot-btn"><i
                                class="bi bi-arrow-right d-inline icon"></i></span></a>
                </div>
            </div>
            <!-- end fields item -->
            @endforeach

            


        </div>
    </section>
    <!-- end objective section -->
    {{-- @dd($Field->getFirstMediaUrl('image')) --}}
    @push('css')
        <style>
            #header {
                background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%),
                            url("{{ $Field->getFirstMedia('image')?->getFullUrl('image-thumb')!= null ? $Field->getFirstMedia('image')?->getFullUrl('image-thumb') : asset('frontend-assets/images/productBG.jpg') }}") no-repeat center center/cover !important ;
                background-size: cover !important ;
                animation: none ;                 

            }
        </style>
    @endpush

    @push('header-title')
        <div class="d-flex align-items-center text-center h-75 ">
            <div class="w-100">
                <h1 class="" style="font: normal normal 800 72px/135px Cairo; letter-spacing: 0px;">
                    {{ $Field->name }}</h1>
            </div>
        </div>
    @endpush
</x-frontend-layout>
