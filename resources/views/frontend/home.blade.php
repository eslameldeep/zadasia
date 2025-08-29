<x-frontend-layout>

    <section class="relative h-screen md:-mt-[133px] -mt-[153px] overflow-hidden">
        <div class="swiper hero-swiper h-full">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative bg-cover bg-center"
                     style="background-image: url('{{ asset('frontend-assets/images/hero-bg.png') }}');">
                    <div class="absolute inset-0 bg-gradient-to-b from-[#071C1FE6] to-[#071C1FD9]"></div>
                    <div class="relative flex flex-col items-center justify-center h-full text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6">Welcome to Our Website</h1>
                        <p class="text-lg md:text-xl mb-8 max-w-2xl">
                            Build modern, responsive, and elegant designs with Laravel + Tailwind.
                        </p>
                        <a href="#about"
                           class="px-6 py-3 bg-teal-600 hover:bg-teal-700 rounded-full text-white transition">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide relative bg-cover bg-center"
                     style="background-image: url('{{ asset('frontend-assets/images/hero-bg.png') }}');">
                    <div class="absolute inset-0 bg-gradient-to-b from-[#071C1FE6] to-[#071C1FD9]"></div>
                    <div class="relative flex flex-col items-center justify-center h-full text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6">Fast Development</h1>
                        <p class="text-lg md:text-xl mb-8 max-w-2xl">
                            Accelerate your workflow with modern tools.
                        </p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide relative bg-cover bg-center"
                     style="background-image: url('{{ asset('frontend-assets/images/hero-bg.png') }}');">
                    <div class="absolute inset-0 bg-gradient-to-b from-[#071C1FE6] to-[#071C1FD9]"></div>
                    <div class="relative flex flex-col items-center justify-center h-full text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6">Responsive Design</h1>
                        <p class="text-lg md:text-xl mb-8 max-w-2xl">
                            Looks perfect on any screen size.
                        </p>
                    </div>
                </div>
            </div>

            <div class="container relative">
                <!-- Navigation -->
                <div class="absolute bottom-10 end-8 flex items-end space-x-5 text-white z-20">
                    <!-- Prev -->
                    <button class="hero-prev text-[#81a5ac] leading-none mx-2"><img class="rtl:scale-x-[-1]"
                                                                                    src="/frontend-assets/images/left-arrow.svg"
                                                                                    height="8" width="50"
                                                                                    alt="left-arrow"/></button>

                    <!-- Next -->
                    <button class="hero-next text-[#81a5ac] leading-none mx-2"><img class="rtl:scale-x-[-1]"
                                                                                    src="/frontend-assets/images/right-arrow.svg"
                                                                                    height="8" width="50"
                                                                                    alt=left-arrow"/></button>

                    <!-- Fraction Pagination -->
                    <div class="hero-pagination "></div>
                </div>
            </div>

        </div>
    </section>


    <section class="py-32  relative">
        <div>
            <div class=" absolute bg-[url('frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-right  -right-72 inset-0 "></div>
            <div class=" absolute bg-[url('frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-left-bottom -bottom-56 -left-56 inset-0 "></div>

            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-20 items-center">

                    <!-- First Column with Background Image -->
                    <div
                        class="w-full h-64 sm:h-96 md:h-[700px] rounded-[20px] bg-center bg-no-repeat bg-cover mix-blend-hue"
                        style="background-image: url('{{ asset('frontend-assets/images/hero-bg.png') }}');">
                    </div>

                    <!-- Second Column (content) -->
                    <div class="flex items-center">
                        <div>
                            <h6 class="font-bold text-[18px] leading-[28px] sm:leading-[73px] capitalize text-[#126B65]">
                                @lang("who are we")
                            </h6>

                            <p class="font-bold text-3xl sm:text-4xl md:text-4xl leading-snug sm:leading-normal capitalize text-teal-800 mt-4">
                                @lang("Innovative manufacturing, unparalleled quality")
                            </p>

                            <p class="text-[18px] leading-[28px] text-[#4D686C] mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet
                                eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus.
                                Curabitur quis varius libero. Lorem.
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-10">
                                <!-- Card 1 -->
                                <div
                                    class="rounded-2xl border border-green-700 p-6 hover:border-gray-400 hover:bg-gray-200 transition">
                                    <h3 class="font-bold text-lg mb-2">Vegin</h3>
                                    <p class="text-gray-700">
                                        aksndkjasn ajkndkjas n ajknsdkjasnd askjn dkan sd
                                    </p>
                                </div>

                                <!-- Card 2 -->
                                <div
                                    class="rounded-2xl border border-green-700 p-6 hover:border-gray-400 hover:bg-gray-200 transition ">
                                    <h3 class="font-bold text-lg mb-2">Vegin</h3>
                                    <p class="text-gray-700">
                                        aksndkjasn ajkndkjas n ajknsdkjasnd askjn dkan sd
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <section id="category" class="py-32  bg-[#0b2f34] relative overflow-hidden ">



        <div class="bg-[url('frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-[135%_0%]">

            <div class="max-w-7xl mx-auto px-4 py-4 space-y-5 z-10">
                <div class="text-center text-lg text-teal-600 font-bold">@lang('Our Categories')</div>
                <div class="text-center ">
                    <span class="text-6xl text-teal-600 font-bold">@lang('Multiple options')</span>
                    <span class="text-6xl text-white font-bold">@lang('To meet your needs')</span>
                </div>

                <div class="slider relative">
                <div class="swiper categories-swiper relative">
                    <div class="swiper-wrapper mt-20">
                        @foreach($Categories as $category)
                            <div class="swiper-slide flex flex-col items-center text-teal-600 hover:text-white">

                                <!-- Card -->
                                <div class=" category-image aspect-[1/1] w-full bg-[#0F3439] border border-[#126B6538] rounded-[20px]
                    hover:bg-white/10 hover:border-[3px] hover:border-[#126B65]
                    transition-all duration-300 bg-center bg-no-repeat bg-cover"
                                     style="background-image: url('{{ $category->getFirstMediaUrl('image') }}');">
                                </div>

                                <!-- Title -->
                                <div class="mt-3 text-center  text-2xl">
                                    {{ $category->name }}
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
                <!-- Prev Button -->
                <button
                    class="categories-prev absolute top-1/2 -translate-y-1/2 left-2 xl:-left-16  z-10
                 flex items-center justify-center w-[50px] h-[50px] rounded-full
               border border-[#126B65] bg-[#0F3439] text-[#81a5ac]
               hover:bg-[#126B65] hover:text-white transition">
                    <i class="fa-solid fa-arrow-left text-lg"></i>
                </button>

                <!-- Next Button -->
                <button
                    class="categories-next absolute top-1/2 -translate-y-1/2 right-2 xl:-right-16  z-10
                 flex items-center justify-center w-[50px] h-[50px] rounded-full
               border border-[#126B65] bg-[#0F3439] text-[#81a5ac]
               hover:bg-[#126B65] hover:text-white transition">
                    <i class="fa-solid fa-arrow-right text-lg"></i>
                </button>
            </div>

            </div>
        </div>

        <div
            class="
            absolute inset-0
            bg-[url('/frontend-assets/images/bg-icon-shape.svg')] bg-no-repeat
            bg-left
            bg-[length:auto_100%]

        ">
        </div>
    </section>



    <section id="products" class="py-32 bg-white relative overflow-hidden">

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
                                <div class="swiper-slide flex flex-col items-center text-teal-600 hover:text-black">

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

                                </div>
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

    <section class="flex justify-center my-16">
        <div
            class="grid grid-cols-1 md:grid-cols-2 items-center gap-10
        w-full max-w-[1140px] min-h-[519px] rounded-[20px] py-10 px-6 md:px-28
        bg-[radial-gradient(closest-side_at_50%_50%,#126B6500_0%,#126B6566_100%)]"
        >
            <div class="text-center md:text-start">
                <h2 class="text-2xl md:text-3xl font-bold text-[#0F3439] mb-4">
                    @lang('We meet all your export needs')
                </h2>
                <p class="text-[#0F3439]/80 mb-6 leading-relaxed">
                    @lang('There is a long-established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.')
                </p>
                <button
                    class="px-6 py-2 rounded-full bg-[#126B65] text-white font-medium hover:bg-[#0F3439] transition"
                >
                    @lang('More')
                </button>
            </div>

            <div class="flex justify-center">
                <img
                    src="{{ asset('frontend-assets/images/export.png') }}"
                    alt="@lang('Export Box')"
                    class="max-w-full h-auto"
                >
            </div>
        </div>
    </section>









    {{--    <section--}}
    {{--        class="relative bg-cover bg-center h-screen md:-mt-[133px] -mt-[153px] -z-10"--}}
    {{--        style="background-image: url('frontend-assets/images/hero-bg.png');"--}}
    {{--    >--}}
    {{--        <!-- Dark Overlay -->--}}
    {{--        <div class="absolute inset-0 bg-gradient-to-b from-[#071C1FE6] to-[#071C1FD9]"></div>--}}

    {{--        <!-- Hero Content -->--}}
    {{--        <div class="relative  flex flex-col items-center justify-center h-full text-center text-white px-4">--}}
    {{--            <h1 class="text-5xl md:text-7xl font-bold mb-6">Welcome to Our Website</h1>--}}
    {{--            <p class="text-lg md:text-xl mb-8 max-w-2xl">--}}
    {{--                Build modern, responsive, and elegant designs with Laravel + Tailwind.--}}
    {{--            </p>--}}
    {{--            <a href="#about"--}}
    {{--               class="px-6 py-3 bg-teal-600 hover:bg-teal-700 rounded-full text-white transition">--}}
    {{--                Get Started--}}
    {{--            </a>--}}


    {{--        </div>--}}



    {{--    </section>--}}


</x-frontend-layout>
