<x-frontend-layout>
    <!-- start field section -->
    <section class="container field" id="Challenge">
       
        @foreach ($Challenges as $index => $Challenge)
            <div class="position-relative Challenge-item">
                <div class="row p-y5 ">
                    <div class="col-lg-1 {{ $loop->odd ? 'order-lg-1' : 'order-lg-3' }} number">
                        {{ sprintf('%02d', $index + 1) }}</div>
                    <div
                        class="col-lg-5 {{ $loop->odd ? 'order-lg-2' : 'order-lg-2' }}  order-2 align-items-center d-flex">
                        <div>
                            <h6 class="section-slug">{{ $Challenge->sub_title }}</h6>
                            <h2 class="position-relative dot-after d-inline section-title">{{ $Challenge->title }}
                            </h2>
                            <div class="d-block my-3 fs-18 text-black-50 fw-normal">
                                {{ $Challenge->short_description}}
                                <a  href="{{ route('frontend.challenges.show', $Challenge->id) }}" 
                                    class="more-btn fw-bold text-decoration-none text-black d-block">{{__('More')}} <span class="dot-btn"><i
                                            class="bi {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'bi-arrow-left' : 'bi-arrow-right' }} d-inline icon"></i></span></a>
                            </div>

                        </div>
                    </div>
                    <div
                        class="col-lg-5 Challenge-icon {{ $loop->odd ? 'order-lg-3 justify-content-lg-end' : 'order-lg-1 d-lg-flex offset-1' }} order-1 justify-content-center ">
                        
                            <div class="helpful-image"
                                style="background-image: url({{ $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb') ? $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb') : asset('/frontend-assets/images/87566b91c4.png')}} )">
                            </div>
                                                {{-- <div class="item-image" style="background-image: url({{ asset('frontend-assets/images/software.svg') }})">
                        
                    </div> --}}
                    </div>
                </div>

                {{-- <div class="number {{ $loop->odd ? "number-left" : "number-right" }}">{{ sprintf("%02d", $index+1) }}</div> --}}
            </div>
        @endforeach


    </section>
    <!-- end field section -->

    @push('js')
        <script>
            window.addEventListener("load", (event) => {
                $("#country").select2({
                    theme: 'bootstrap' ,
                    placeholder: "Search"
                });


            });
        </script>
    @endpush
    @push('css')
        <style>
            #header {
                background: linear-gradient(180deg, rgba(0, 0, 0, 1) 0%, rgba(255, 255, 255, 0) 100%),
                    url("{{asset('/frontend-assets/images/hawara.jpg')}}") no-repeat center center/cover !important;
                background-size: cover !important;
                animation: none;
            }
        </style>
    @endpush

    @push('header-title')
        <div class="d-flex align-items-center text-center h-75 ">
            <div class="w-100">
                <h1 class="" style="font: normal normal 800 50px/135px Cairo; letter-spacing: 0px;">
                    {{__('Challenges solved')}}</h1>
                <h4 class="text-white-50">{{__('The challenges facing us were and continue to be the driving force forward')}}</h4>
            </div>
        </div>
    @endpush
</x-frontend-layout>
