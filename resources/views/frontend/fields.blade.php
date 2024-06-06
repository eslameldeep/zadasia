<x-frontend-layout >

<!-- start section field -->
<section class="container field" id="fe">
    <div class="row py-5">
        <div class="mx-auto col-lg-8 ">
            <h6 class="wow bounceInUp  text-center text-black-50">
                {{__('SpaceEcho is at the forefront of delivering cutting-edge IoT solutions for water management, encompassing surface and subsurface monitoring, tide gauges, and air quality stations. With a focus on integration, their innovative systems enablecomprehensive data collection and analysis to facilitate effective water resource management.')}}
                </h6>
        </div>
    </div>

    <div class="row">

       @forelse ($Fields as $Field)
            <!-- start fields item -->
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12  p-2 item ">
            <div class="fields-list h-100 p-5">
                <div
                    class="field-icon position-relative text-center d-flex align-items-center justify-content-center ">
                    <img src="{{asset('frontend-assets/images/gear.svg')}}" class="img-fluid w-50" alt="">
                </div>
                <div class="h5 my-3 fw-bold">{{$Field->name}}</div>
                <div class="fs-5 my-3 fs-6 text-black-50">{{ $Field->short_description}}</div>
                <a  href="{{ route('frontend.fields.show', $Field->slug) }}" 
                    class="more-btn fw-bold text-decoration-none text-black">{{__('More')}} <span class="dot-btn"><i
                            class="bi {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'bi-arrow-left' : 'bi-arrow-right' }} d-inline icon"></i></span></a>
            </div>
        </div>
        <!-- end fields item -->
        
       @empty
           
       @endforelse

    </div>
</section>
<!-- end section field -->

@push('css')
    <style>
        #header {
            background: linear-gradient(180deg, rgba(0, 0, 0, 1) 0%, rgba(255, 255, 255, 0) 100%),
                    url("{{ asset('frontend-assets/images/fields.webp') }}") no-repeat center center/cover !important;
                background-size: cover !important;
                animation: none;

            
        }
    </style>
@endpush

@push('header-title')
    
<div class="d-flex align-items-center text-center h-75 ">
    <div class="w-100">
        <h1 class="" style="font: normal normal 800 50px/135px Cairo; letter-spacing: 0px;">
            {{__('Fields')}}</h1>
    </div>
</div>

@endpush
</x-frontend-layout>