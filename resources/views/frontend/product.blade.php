<x-frontend-layout>

    <section
        class="relative h-[500px] md:h-[500px] min-h-[300px] flex items-center md:-mt-[133px] -mt-[153px]  justify-center text-center px-4">
        <div class="absolute inset-0 bg-cover bg-fixed"
             style="background-image: url('{{ asset('frontend-assets/images/hero-bg.png') }}');">
            <div class="absolute inset-0 bg-gradient-to-b from-[#071C1FE6] to-[#071C1FD9]"></div>
        </div>

        <!-- Content -->
        <div class="relative text-white max-w-2xl mx-auto">
            <div class="md:mt-[133px] mt-[153px]">

                <h1 class="text-3xl md:text-5xl font-bold mb-8">{{$Product->name}}</h1>


            </div>
        </div>
    </section>


    <section class="py-12 bg-[#F5FAFA]">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 ">

            <!-- Product Slider -->
            <div>

                <!-- Main Swiper -->
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                     class="swiper product-gallery-slider">
                    <div class="swiper-wrapper">
                        @foreach ($Product->getMedia('*') as $media)
                            <div class="swiper-slide">
                                <img src="{{ $media->getFullUrl() }}" alt="{{ $Product->name }}"
                                     class="w-full h-full object-contain rounded-2xl bg-[#EDF8F7]"/>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <!-- Thumbnail Swiper -->
                <div thumbsSlider="" class="swiper product-slider mt-4 ">
                    <div class="swiper-wrapper">
                        @foreach ($Product->getMedia('*') as $media)
                            <div class="swiper-slide cursor-pointer">
                                <img src="{{ $media->getFullUrl() }}" alt="{{ $Product->name }}"
                                     class="w-full h-24 object-cover rounded-lg border border-gray-200"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="space-y-6 py-10">

                <!-- Name -->
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-snug">
                    {{ $Product->name }}
                </h2>
                <!-- Category -->
                <p class="text-lg text-gray-500 bg-[#E2F3F2] w-fit px-5 py-2 rounded-full">
                    {{ $Product->Category->name ?? '' }}
                </p>
                <!-- Short Description -->
                <ul class="space-y-2 text-gray-700 text-sm">
                    {!! $Product->short_description  !!}

                </ul>


                <!-- CTA Button -->
                <button
                    class="px-6 py-3 bg-[#126B65] text-white rounded-full font-semibold hover:bg-[#0E5550] transition w-full">
                    <i class="fa-brands fa-whatsapp"> </i>@lang("Request Via WhatsApp")
                </button>
            </div>


        </div>
    </section>


    <section class="py-32 bg-[#F5FAFA] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 py-4 space-y-5 z-10 relative">
            {!! $Product->description !!}
        </div>
    </section>


    <section id="products" class="py-32 bg-[#F5FAFA] relative overflow-hidden">

        <!-- Background -->
        <div>
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-5 z-10 relative">

                <!-- Headings -->
                <div class="text-center text-lg text-teal-600 font-bold">
                    @lang('New Arrived Products')
                </div>
                <div class="text-center">
                    <span class="text-6xl  text-black font-bold">@lang('High Quality')</span>
                    <span class="text-6xl text-teal-600 font-bold">@lang('For Every New')</span>
                </div>

                <!-- Slider -->
                <div class="slider relative">
                    <div class="swiper products-swiper relative">
                        <div class="swiper-wrapper mt-20">
                            @foreach($Products as $product)
                                <a href="{{route('frontend.product' , $product->slug )}}"
                                   class="swiper-slide flex flex-col items-center text-teal-600 hover:text-black">

                                    <!-- Card -->
                                    <div class="product-image aspect-[1/1] w-full bg-gray-100 border border-[#126B6538] rounded-[20px]
                                    hover:bg-white/10 hover:border-[3px] hover:border-[#126B65]
                                    transition-all duration-300 bg-center bg-no-repeat bg-cover"
                                         style="background-image: url('{{ $product->getFirstMediaUrl('image') }}');">
                                    </div>

                                    <!-- Title -->
                                    <div class="mt-3 text-center text-2xl">
                                        {{ $product->name }}
                                    </div>

                                    <!-- Price (Optional) -->
                                    @if($product->price)
                                        <div class="text-center text-lg text-gray-400 mt-1">
                                            {{ $product->price }} $
                                        </div>
                                    @endif

                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Prev Button -->
                    <!-- Prev Button -->
                    <button
                        class="products-prev absolute top-1/2 -translate-y-1/2 left-2 xl:-left-16 z-10
    flex items-center justify-center w-[50px] h-[50px] rounded-full
    border border-[#126B65] bg-white text-[#126B65]
    hover:bg-[#126B65] hover:text-white transition">
                        <i class="fa-solid fa-arrow-left text-lg"></i>
                    </button>

                    <!-- Next Button -->
                    <button
                        class="products-next absolute top-1/2 -translate-y-1/2 right-2 xl:-right-16 z-10
    flex items-center justify-center w-[50px] h-[50px] rounded-full
    border border-[#126B65] bg-white text-[#126B65]
    hover:bg-[#126B65] hover:text-white transition">
                        <i class="fa-solid fa-arrow-right text-lg"></i>
                    </button>

                </div>
            </div>
        </div>


    </section>


</x-frontend-layout>
