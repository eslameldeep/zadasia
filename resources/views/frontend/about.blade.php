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

                <h1 class="text-3xl md:text-5xl font-bold mb-8">@lang("About Us")</h1>
                <p class="text-lg md:text-xl mb-8 max-w-2xl">
                    @lang("ZadAsia Aluminum Factory")
                </p>
            </div>
        </div>
    </section>


    <section class="py-20 bg-[#F7FFFE] w-full">
        <div class="max-w-7xl mx-auto px-6 lg:px-20">
            <div class="grid lg:grid-cols-2 gap-10 items-center">

                {{-- Text Side --}}
                <div>

                    <h2 class="mb-6">
                        <span class="text-sm text-teal-600 font-bold">@lang("About Us")</span>
                        <div>
                            <span
                                class="text-4xl rtl:text-7xl  text-black font-bold">@lang("Innovative Manufacturing")</span><br/>
                            <span
                                class="text-4xl rtl:text-7xl text-teal-600 font-bold">@lang("Unmatched Quality")</span>

                        </div>
                    </h2>
                    <p class="text-[#66898f] leading-relaxed mb-4">
                        @lang("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed.")
                    </p>
                    <hr class="border-t border-dashed border-gray-400 my-4"/>
                    <p class="text-[#66898f] leading-relaxed">
                        @lang("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed.")
                    </p>
                </div>

                {{-- Image Side --}}
                <div class="relative rounded-2xl overflow-hidden shadow-lg h-full">
                    <img src="{{ asset('frontend-assets/images/hero-bg.png') }}"
                         alt="@lang('About us')"
                         class="h-full object-cover">

                    {{-- Overlay Filter --}}
                    <div class="absolute inset-0 bg-[#0B2F34] mix-blend-hue"></div>
                </div>
            </div>

            {{-- Cards --}}

            <div class="grid md:grid-cols-3 gap-6 mt-16">
                <div class="p-8 rounded-[20px] text-center text-[#0B2F34]"
                     style="background: radial-gradient(closest-side at 50% 50%, #126B6500 0%, #126B6559 100%);">
                    <div class="mb-4">
                        <img class="mx-auto h-16 object-contain" src="/frontend-assets/images/vision.png" alt="vision"/>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">@lang("Our Vision")</h3>
                    <p class="text-[#66898f]">@lang("There is a long established fact that the reader will be distracted by the readable content of a page.")</p>
                </div>

                <div class="p-8 rounded-[20px] text-center text-[#0B2F34]"
                     style="background: radial-gradient(closest-side at 50% 50%, #126B6500 0%, #126B6559 100%);">
                    <div class="mb-4">
                        <img class="mx-auto h-16 object-contain" src="/frontend-assets/images/mission.png"
                             alt="mission"/>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">@lang("Our Mission")</h3>
                    <p class="text-[#66898f]">@lang("The purpose of using Lorem Ipsum is that it has a more or less normal distribution of letters.")</p>
                </div>

                <div class="p-8 rounded-[20px] text-center text-[#0B2F34]"
                     style="background: radial-gradient(closest-side at 50% 50%, #126B6500 0%, #126B6559 100%);">
                    <div class="mb-4">
                        <img class="mx-auto h-16 object-contain" src="/frontend-assets/images/values.png" alt="values"/>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">@lang("Our Values")</h3>
                    <p class="text-[#66898f]">@lang("It is a long established fact that a reader will be distracted by the layout and readable content.")</p>
                </div>
            </div>

        </div>


    </section>


    <section class="py-20 bg-[#F7FFFE] w-full">
        <div class="max-w-7xl mx-auto px-6 lg:px-20">
            <div class="grid lg:grid-cols-2 gap-10 items-center">

                <div class="relative w-full h-[600px] bg-fixed bg-contain bg-center"
                     style="background-image: url('/frontend-assets/images/hero-bg.png');
            -webkit-mask-image: url('/frontend-assets/images/icon-musk.svg');
            -webkit-mask-repeat: no-repeat;
            -webkit-mask-position: center;

            mask-image: url('/frontend-assets/images/icon-musk.svg');
            mask-repeat: no-repeat;
            mask-position: center;
            ">
                    {{-- Overlay Filter --}}
                    <div class="absolute inset-0 bg-[#0B2F34] mix-blend-hue"></div>

                </div>


                {{-- Text Side --}}
                <div>

                    <h2 class="mb-6">
                        <span class="text-sm text-teal-600 font-bold">@lang("About Us")</span>
                        <div>
                            <span
                                class="text-4xl rtl:text-7xl  text-black font-bold">@lang("From the history")</span><br/>
                            <span
                                class="text-4xl rtl:text-7xl text-teal-600 font-bold">@lang("To the future")</span>

                        </div>
                    </h2>
                    <p class="text-[#66898f] leading-relaxed mb-4">
                        @lang("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed.")
                    </p>
                    <hr class="border-t border-dashed border-gray-400 my-4"/>

                    <p class="text-[#66898f] leading-relaxed flex items-start font-bold text-lg gap-5">
    <span class="bg-gray-300 rounded-full aspect-square flex items-center justify-center p-2 w-12 h-12">
        <img class="w-8 h-8 object-contain" src="/frontend-assets/images/vision.png" alt="point"/>
    </span>
                        @lang("We aspire to be a leader in food packaging with innovative, sustainable, and high-quality products.")
                    </p>

                </div>


            </div>

        </div>


    </section>

    <section class="w-full bg-[#0B2F34] py-16">
        <div class="container mx-auto max-w-7xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">

                <!-- Stat Item -->
                <div class="flex flex-col items-center justify-center">
                    <div
                        class="w-40 h-40 sm:w-48 sm:h-48 md:w-56 md:h-56 lg:w-64 lg:h-64
               border border-dashed border-[#126B65] rounded-full
               flex flex-col items-center justify-center">
                        <div class="text-2xl sm:text-3xl font-bold text-white">
                            <span id="odometer1" data-value="1000">0</span>
                        </div>
                        <p class="text-[#9BB0B3] mt-2 text-sm sm:text-base">@lang('Test Title')</p>
                    </div>
                </div>

                <!-- Stat Item -->
                <div class="flex flex-col items-center justify-center">
                    <div
                        class="w-40 h-40 sm:w-48 sm:h-48 md:w-56 md:h-56 lg:w-64 lg:h-64
               border border-dashed border-[#126B65] rounded-full
               flex flex-col items-center justify-center">
                        <div class="text-2xl sm:text-3xl font-bold text-white">
                            <span id="odometer2" data-value="2000">0</span>
                        </div>
                        <p class="text-[#9BB0B3] mt-2 text-sm sm:text-base">@lang('Test Title')</p>
                    </div>
                </div>

                <!-- Stat Item -->
                <div class="flex flex-col items-center justify-center">
                    <div
                        class="w-40 h-40 sm:w-48 sm:h-48 md:w-56 md:h-56 lg:w-64 lg:h-64
               border border-dashed border-[#126B65] rounded-full
               flex flex-col items-center justify-center">
                        <div class="text-2xl sm:text-3xl font-bold text-white">
                            <span id="odometer3" data-value="3000">0</span>
                        </div>
                        <p class="text-[#9BB0B3] mt-2 text-sm sm:text-base">@lang('Test Title')</p>
                    </div>
                </div>

                <!-- Stat Item -->
                <div class="flex flex-col items-center justify-center">
                    <div
                        class="w-40 h-40 sm:w-48 sm:h-48 md:w-56 md:h-56 lg:w-64 lg:h-64
               border border-dashed border-[#126B65] rounded-full
               flex flex-col items-center justify-center">
                        <div class="text-2xl sm:text-3xl font-bold text-white">
                            <span id="odometer4" data-value="4000">0</span>
                        </div>
                        <p class="text-[#9BB0B3] mt-2 text-sm sm:text-base">@lang('Test Title')</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="py-20 bg-[#F7FFFE] w-full">
        <div class="max-w-7xl mx-auto px-6 lg:px-20">
            <div class="grid lg:grid-cols-2 gap-10 items-center">


                {{-- Image Side --}}

                <div class="relative rounded-2xl overflow-hidden shadow-lg lg:h-[700px] h-[500px] ">
                    <img src="{{ asset('frontend-assets/images/hero-bg.png') }}"
                         alt="@lang('About us')"
                         class="h-full w-full object-cover">

                    {{-- Overlay Filter --}}
                    <div class="absolute inset-0 bg-[#0B2F34] mix-blend-hue"></div>
                    <div class="absolute inset-0 bg-[#000000] opacity-70"></div>

                    {{-- Top Right Text --}}
                    <div class="absolute top-0 right-0 shadow-md text-sm p-5 font-bold space-y-0">
                        <div>
                            <div
                                class="text-4xl rtl:text-5xl w-fit p-5 bg-white rounded-lg text-black font-bold ">@lang("Our customers' opinions ")</div><br/>
                            <div
                                class="text-4xl rtl:text-5xl w-fit p-5 bg-white rounded-lg text-teal-600 font-bold">@lang("tell our story.") ❤️</div>

                        </div>
                    </div>

                    {{-- Bottom Right Text --}}
                    <div class="absolute bottom-4 right-4 bg-white text-[#0B2F34] px-5 py-5 rounded-lg shadow-md text-sm font-semibold">
                        <div
                            class="text-4xl rtl:text-5xl w-fit p-5 bg-white rounded-lg text-black font-bold ">@lang("+100 K")</div>
                    </div>
                </div>


                {{-- Text Side --}}
                <div>

                    <!-- Swiper container -->
                    <div id="about-reviews" class="swiper w-full max-w-2xl mx-auto lg:h-[700px] h-[500px]">
                        <div class="swiper-wrapper">
                            @foreach($Reviews as $review)
                                <div class="swiper-slide">
                                    <div class="bg-[#EDF9F8] text-[#4d686c] rounded-[20px] p-8 group max-w-md mx-auto text-center">

                                        <!-- Stars -->
                                        <div class="flex justify-start mb-3">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->stars)
                                                    <svg class="w-5 h-5 fill-current mx-0.5"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5 mx-0.5"
                                                         fill="none" stroke="currentColor" stroke-width="1.5"
                                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M11.48 3.499a.562.562 0 011.04 0l2.09 5.07a.562.562 0 00.475.345l5.52.414c.497.037.7.66.322.99l-4.21 3.63a.562.562 0 00-.182.557l1.25 5.38c.11.47-.39.84-.79.59l-4.73-2.77a.562.562 0 00-.586 0l-4.73 2.77c-.4.25-.9-.12-.79-.59l1.25-5.38a.562.562 0 00-.182-.557l-4.21-3.63a.562.562 0 01.322-.99l5.52-.414a.562.562 0 00.475-.345l2.09-5.07z"/>
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>

                                        <!-- Review Text -->
                                        <p class="italic mb-4 text-sm text-start">
                                            “{{ $review->client_review }}”
                                        </p>

                                        <div class="flex justify-start items-center gap-5">
                                            <!-- Client Image -->
                                            <div class="flex justify-center items-center">
                                                <img src="{{ $review->getFirstMediaUrl('image') }}"
                                                     alt="{{ $review->client_name }}"
                                                     class="w-14 h-14 rounded-full object-cover" />
                                            </div>

                                            <div class="text-start">
                                                <!-- Client Info -->
                                                <h3 class="client_name text-lg font-semibold text-gray-900">
                                                    {{ $review->client_name }}
                                                </h3>
                                                <p class="text-sm">
                                                    {{ $review->client_job_title }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>


                </div>



            </div>

        </div>


    </section>


</x-frontend-layout>
