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


    <section class="py-32  relative overflow-hidden">
        <div>
            <div class=" absolute bg-[url('frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-right  -right-72 inset-0 "></div>
            <div class=" absolute bg-[url('frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-left-bottom -bottom-56 -left-56 inset-0 "></div>

            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-20 items-center">

                    <!-- First Column with Background Image -->
                    <div
                        class="w-full h-64 sm:h-96 md:h-[700px] rounded-[20px] bg-center bg-no-repeat bg-cover mix-blend-hue relative overflow-hidden"
                        style="background-image: url('{{ asset('frontend-assets/images/hero-bg.png') }}');">
                        {{-- Overlay Filter --}}
                        <div class="absolute inset-0 bg-[#0B2F34] mix-blend-hue"></div>

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
                                    <h3 class="font-bold text-lg mb-2 flex align-baseline gap-x-2"><img class="h-6" src="frontend-assets/images/vision.png" alt="vision" />Vision</h3>
                                    <p class="text-gray-700">
                                        aksndkjasn ajkndkjas n ajknsdkjasnd askjn dkan sd
                                    </p>
                                </div>

                                <!-- Card 2 -->
                                <div
                                    class="rounded-2xl border border-green-700 p-6 hover:border-gray-400 hover:bg-gray-200 transition ">
                                    <h3 class="font-bold text-lg mb-2 flex align-baseline gap-x-2"><img class="h-6" src="frontend-assets/images/mission.png" alt="mission" />Mission</h3>

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




    <section class="relative py-20 bg-[#0b2f34] text-white">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- texts -->
            <div class="space-y-6">
                <h6 class="text-teal-400 text-sm font-bold">
                    @lang('Our Branches')
                </h6>
                <h2 class="text-4xl font-extrabold leading-snug">
                    @lang('Close to you')
                    <span class="text-teal-400">@lang('everywhere')</span>
                </h2>
                <p class="text-gray-300 leading-relaxed max-w-md">
                    @lang('There is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.')
                </p>
            </div>

            <!-- map -->
            <div class="relative text-center">
                <img src="{{ asset('frontend-assets/images/map.png') }}"
                     alt="@lang('World Map')"
                     class="w-full opacity-100">


            </div>
        </div>
    </section>


    <section class="py-16 bg-white overflow-hidden">
        <div class="container mx-auto px-4">
            <!-- Section Title -->
            <div class="text-center my-24">
                <span class="text-6xl  text-black font-bold">@lang("Our customers' opinions ")</span>
                <span class="text-6xl text-teal-600 font-bold">@lang("tell our story.")</span>
            </div>

            <!-- Review `Slider -->
            <div class="swiper reviews-swiper overflow-visible">
                <div class="swiper-wrapper">
                    @foreach($Reviews as $review)
                        <div class="swiper-slide">
                            <div class="bg-[#EDF9F8]  text-[#4d686c] rounded-[20px] p-8 group max-w-md mx-auto text-center">

                                <!-- Stars -->
                                <div class="flex justify-start mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->stars)
                                            <svg class="w-5 h-5  fill-current mx-0.5"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5  mx-0.5"
                                                 fill="none" stroke="currentColor" stroke-width="1.5"
                                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M11.48 3.499a.562.562 0 011.04 0l2.09 5.07a.562.562 0 00.475.345l5.52.414c.497.037.7.66.322.99l-4.21 3.63a.562.562 0 00-.182.557l1.25 5.38c.11.47-.39.84-.79.59l-4.73-2.77a.562.562 0 00-.586 0l-4.73 2.77c-.4.25-.9-.12-.79-.59l1.25-5.38a.562.562 0 00-.182-.557l-4.21-3.63a.562.562 0 01.322-.99l5.52-.414a.562.562 0 00.475-.345l2.09-5.07z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>

                                <!-- Review Text -->
                                <p class=" italic mb-4 text-sm text-start">
                                    “{{ $review->client_review }}”
                                </p>
                                <div class="flex justify-start items-center gap-5">


                                    <!-- Client Image -->
                                    <div class="flex justify-center  items-center ">
                                        <img src="{{ $review->getFirstMediaUrl('image') }}"
                                             alt="{{ $review->client_name }}"
                                             class="w-14 h-14 rounded-full object-cover " />
                                    </div>

                                    <div class="text-start">
                                        <!-- Client Info -->
                                        <h3 class="client_name text-lg font-semibold  text-gray-900">
                                            {{ $review->client_name }}
                                        </h3>
                                        <p class="text-sm ">
                                            {{ $review->client_job_title }}
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Slider Controls -->

            </div>

            <div class="swiper-pagination-custom  flex justify-center  mt-10"></div>

        </div>
    </section>

    <section class="w-full bg-[linear-gradient(to_bottom,#F7FFFE_60%,#0B2F34_60%)] py-20">
        <div class="container mx-auto max-w-7xl grid grid-cols-1 xl:grid-cols-12 gap-24 ">

            {{-- Left Column (30%) --}}
            <div class="xl:col-span-5 text-center xl:text-start text-[#0B2F34] space-y-4">
                    <span class="text-sm text-teal-600 font-bold">@lang("Contact Us")</span>
                <div class="mx-5">
                    <span class="text-7xl  text-black font-bold">@lang("Contact Us")</span><br />
                    <span class="text-7xl text-teal-600 font-bold">@lang("and do not hesitate")</span>

                </div>
            </div>


            <div class="xl:col-span-7">
                <div class="bg-white rounded-2xl shadow-[0px_3px_35px_rgba(18,107,101,0.07)] p-8">

                    <h3 class="text-xl font-semibold text-[#0b2f34] text-start">@lang('Please fill out the form ...')</h3>
                    <div class="text-sm  mb-6 text-start text-[#0b2f34]">@lang('Fill in the following information and we will respond to you as soon as possible.')</div>

                    <form action="" method="POST" class="space-y-6">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium">@lang('name')</label>
                            <input type="text" id="name" name="name"
                                   class="w-full border-none bg-[#EDF8F7] focus:bg-white rounded-3xl p-3 focus:outline-none focus:ring-2 focus:ring-[#126B65]"
                                   placeholder="@lang('name')">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium">@lang('Email address')</label>
                            <input type="email" id="email" name="email"
                                   class="w-full border-none bg-[#EDF8F7] focus:bg-white rounded-3xl p-3 focus:outline-none focus:ring-2 focus:ring-[#126B65]"
                                   placeholder="@lang('Email')">
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium">@lang('Phone')</label>
                            <input type="text" id="phone" name="phone"
                                   class="w-full border-none bg-[#EDF8F7] focus:bg-white rounded-3xl p-3 focus:outline-none focus:ring-2 focus:ring-[#126B65]"
                                   placeholder="@lang('Phone')">
                        </div>

                        {{-- Message --}}
                        <div>
                            <label for="message" class="block mb-2 text-sm font-medium">@lang('Message')</label>
                            <textarea id="message" name="message" rows="4"
                                      class="w-full border-none bg-[#EDF8F7] focus:bg-white rounded-3xl p-3 focus:outline-none focus:ring-2 focus:ring-[#126B65]"
                                      placeholder="@lang('Message')"></textarea>
                        </div>

                        {{-- Submit --}}
                        <div class="text-center">
                            <button type="submit"
                                    class="bg-[#126B65] text-white font-semibold py-3 px-8 rounded-3xl hover:bg-[#0a2428] transition w-full">
                                @lang('Send')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
