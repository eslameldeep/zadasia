<x-frontend-layout >

<!-- start section field -->
<section class="container field" id="fe">
    <div class="row py-5">
        <div class="mx-auto col-lg-8 ">
            <h6 class="wow bounceInUp  text-center text-black-50">
                {{__('SpaceEcho is at the forefront of delivering cutting-edge IoT solutions for water management, encompassing surface and subsurface monitoring, tide gauges, and air quality stations. With a focus on integration, their innovative systems enablecomprehensive data collection and analysis to facilitate effective water resource management.')}}
                <br><strong>{{__('Discover a wide range of IoT devices that we can offer to your company.')}}    </strong>
            </h6>
        </div>
    </div>

    <div class="row justify-content-center">

       @forelse ($Products as $product)
            <!-- start product item -->
            <div class="col-md-6 col-lg-3 col-xl-3 my-3">
                <div class="card text-black bg-white h-100">
                 
                  <img src="{{ $product->getFirstMedia('image')?->getFullUrl('image-thumb') ? $product->getFirstMedia('image')?->getFullUrl('image-thumb') :  asset('frontend-assets/images/product.png')  }}"
                    class="card-img-top" alt="{{ $product->name }}" />
                  <div class="card-body">
                    <div class="text-center">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      {{-- <p class="text-muted mb-4">Apple pro display XDR</p> --}}
                    </div>
                    <div>
                      <div class="d-flex justify-content-between">
                        <span>{{$product->short_description}}  </span>
                      </div>
                      
                    </div>
                    <div class="d-flex justify-content-between total font-weight-bold mt-4">
                      <span><a class="more-btn fw-bold text-decoration-none text-black"
                        href="{{ route('frontend.products.show', $product->slug) }}">{{ __('More') }} <span
                            class="dot-btn"><i
                                class="bi {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'bi-arrow-left' : 'bi-arrow-right' }} d-inline icon"></i></span></a></span>
                    </div>
                  </div>
                </div>
              </div>
            <!-- end product item -->
        
       @empty
            {{__('No products')}}
       @endforelse
{{-- href="{{ route('frontend.products.show', $product->slug) }}" --}}
{{-- {{ $product->getFirstMediaUrl('image') }} --}}
{{-- {{ $product->name }} --}}
    </div>
</section>
<!-- end section field -->

@push('css')
    <style>
        #header {
            background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(255,255,255,0) 100%),
                            url("{{asset('frontend-assets/images/productBG.jpg')}}") no-repeat center center/cover !important ;
                background-size: cover !important ;
                animation: none ;                 

        }
    </style>
@endpush

@push('header-title')
    
<div class="d-flex align-items-center text-center h-75 ">
    <div class="w-100">
        <h1 class="" style="font: normal normal 800 50px/135px Cairo; letter-spacing: 0px;">
            {{__('IoT Products')}}</h1>
    </div>
</div>

@endpush
</x-frontend-layout>