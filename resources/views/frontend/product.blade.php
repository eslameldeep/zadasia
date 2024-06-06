<x-frontend-layout>
    <!-- start Product section -->
    <section class="container Product py-5" id="product">
        <div class="row p-y5">
            <div class="col-lg-6 order-lg-1 order-2">
                <div>
                    <h6 class="section-slug">{{ $Product->sub_name }}</h6>
                    <h2 class="position-relative dot-after section-title">{{ $Product->name }}</h2>
                    <div class="d-block my-3 fs-18 text-black-50 fw-normal">
                        {{ $Product->description }}

                    </div>
                    
                    <div class="row">
                        @foreach ($Product->ProductsFeature->take(4) as $feature)
                            <div class="col-md-6 col-sm-12 wow bounceInRight">
                                <div class="row">
                                    <div class="col-3 py-3">
                                        <div class="product-icon d-flex align-item-center justify-content-center"><img
                                                src="{{ $feature->getFirstMedia('image')?->getFullUrl() ?  $feature->getFirstMedia('image')?->getFullUrl() : asset('frontend-assets/images/product-icon.svg') }}"
                                                alt="{{$feature->name}}"></div>
                                    </div>
                                    <div class="col-9 py-3">
                                        <div class="fw-bolder fs-5 mb-2">{{ $feature->name }}</div>
                                        <div class="fw-normal text-black-50">{{$feature->description}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            
                        @foreach ($Product->ProductsFeature->skip(4) as $feature)
                            <div class="col-md-6 col-sm-12 moreProduct">
                                <div class="row">
                                    <div class="col-3 py-3">
                                        <div class="product-icon d-flex align-item-center justify-content-center"><img
                                            src="{{ $feature->getFirstMedia('image')?->getFullUrl() ?  $feature->getFirstMedia('image')?->getFullUrl() : asset('frontend-assets/images/product-icon.svg') }}"
                                            alt="{{$feature->name}}"></div>
                                    </div>
                                    <div class="col-9 py-3">
                                        <div class="fw-bolder fs-5 mb-2">{{ $feature->name }}</div>
                                        <div class="fw-normal text-black-50">{{$feature->description}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($Product->ProductsFeature->count()  > 4)
                            
                        
                        <div class="row">

                            <div class="col-md-12 d-flex align-items-center show-more">
                                <a class="gradient-button gradient-button-1 text-decoration-none py-0 fw-bold">{{__('Show More')}}</a><br />
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1 d-flex justify-content-end">
                <div class="helpful-image"
                    style="background-image: url({{ $Product->getFirstMedia('image')?->getFullUrl('image-thumb')  ? $Product->getFirstMedia('image')?->getFullUrl('image-thumb') :asset('frontend-assets/images/87566b91c4.png')}} )">
                </div>
            </div>
        </div>
    </section>
    <!-- end Product section -->

    <!-- start sensor section -->
    <section class="container-fluid" id="sensors">
        <div class="container text-center my-5">
            <h6 class="section-slug">{{__('A wide range of sensors')}} </h6>
            <h2 class="position-relative dot-after d-inline section-title">{{__('Compatible Sensors')}}</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($Product->ProductsSensor as $sensor)
                    <div class="col-lg-3 d-flex justify-content-center py-3 px-3">

                        <div class="sensor-item text-center">
                            <img src="{{ $sensor->getFirstMedia('image')?->getFullUrl() ? $sensor->getFirstMedia('image')?->getFullUrl() : asset('frontend-assets/images/4888359.svg') }}" alt="{{ $sensor->name }}">
                            <div class=" title">{{ $sensor->name }}</div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end sensor section -->


    <!-- start sensor section -->
    <section class="container-fluid" id="specs">
        <div class="container">

            <div class="my-5">
                <h6 class="section-slug">{{__('Technical Specs')}} </h6>
                <h2 class="position-relative dot-after d-inline section-title">{{__('Technical Specs')}}</h2>
            </div>

            <div class="specs-tables">
                {!! $Product->specs !!}

                
            </div>
        </div>

    </section>
    <!-- end sensor section -->

    @push('css')
        <style>
            #header {
                background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%),
                            url("{{ $Product->getFirstMedia('background')?->getFullUrl('background-thumb')  ? $Product?->getFirstMedia('background')->getFullUrl('background-thumb') :asset('frontend-assets/images/productBG.jpg')}}") no-repeat center center/cover !important ;
                background-size: cover !important ;
                animation: none ;                 
            }
        </style>
    @endpush
    @push('js')
        <script>
            window.addEventListener("load", (event) => {
                $('.moreProduct').hide();
                $('.show-more').click(function() {
                    $('.moreProduct').slideToggle(500);
                });

            });
        </script>
    @endpush
    @push('header-title')
        <div class="d-flex align-items-center text-center h-75 ">
            <div class="w-100">
                <h1 class="" style="font: normal normal 800 50px/135px Cairo; letter-spacing: 0px;">
                    {{ $Product->name }}</h1>
            </div>
        </div>
    @endpush
</x-frontend-layout>
