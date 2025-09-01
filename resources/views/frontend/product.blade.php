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
                    {{ $Product->short_description }}

                </ul>


                <!-- CTA Button -->
                <button
                    class="px-6 py-3 bg-[#126B65] text-white rounded-full font-semibold hover:bg-[#0E5550] transition w-full">
                    اطلب المنتج
                </button>
            </div>


        </div>
    </section>


</x-frontend-layout>
