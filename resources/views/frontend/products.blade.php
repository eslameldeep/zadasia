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

                <h1 class="text-3xl md:text-5xl font-bold mb-8">@lang("Products")</h1>
                @isset($Category)
                    <h2 class="text-2xl md:text-3xl font-bold mb-8">{{$Category->name}}</h2>
                @endisset
            </div>
        </div>
    </section>

    <section class="py-20 bg-[#F7FFFE] w-full">

        <div class="max-w-7xl mx-auto ">
            <div class="grid md:grid-cols-3 gap-6 mt-16 ">
                {{--       aside         --}}

                <div
                    class="bg-[#EDF8F7] rounded-[32px] sm:rounded-[40px] md:rounded-[32px] py-10 px-6  h-full">
                    <div class="font-bold px-6 ">@lang("Category")</div>

                    @php
                        // Base button classes
                        $baseClasses = "py-3 px-6 mt-6 rounded-full border-2 transition";
                        $defaultClasses = "bg-[#E2F3F2] border-[#E2F3F2] hover:bg-white hover:text-black hover:font-bold hover:border-2";
                        $activeClasses = "bg-white text-black font-bold border-2";
                    @endphp

                    {{-- All Products --}}
                    <a href="{{ route('frontend.products') }}">
                        <div class="{{ $baseClasses }} {{ $defaultClasses }}">
                            @lang("All Products")
                        </div>
                    </a>

                    {{-- Categories --}}
                    @forelse($Categories as $category)
                        <a href="{{ route('frontend.products', ['category' => $category->slug]) }}">
                            <div class="{{ $baseClasses }} {{ $defaultClasses }} {{ $category?->id == $Category?->id ? $activeClasses : '' }}">
                                {{ $category->name }}
                            </div>
                        </a>
                    @empty
                        <span>@lang("No Categories")</span>
                    @endforelse



                </div>


                {{--       content         --}}
                <div class="col-span-2">


                    <div class="bg-[#EDF8F7] text-center rounded-[32px] sm:rounded-[40px] md:rounded-[32px] h-full">
                        <div
                            class="title bg-white w-fit mx-auto py-3 px-6 text-base sm:pb-5 sm:px-10 sm:text-lg md:pb-8 md:px-20 md:text-2xl rounded-b-[32px] sm:rounded-b-[40px] md:rounded-b-[35px] relative">
                            @isset($Category)
                                <div class="capitalize"> {{$Category->name}} </div>
                            @else
                                @lang("All Products")
                            @endisset

                            <!-- Top Left Inverted Corner -->
                            <span
                                class="absolute top-0 -left-[30px] sm:-left-[25px] md:-left-[35px] w-[32px] h-[32px] sm:w-[25px] sm:h-[25px] md:w-[35px] md:h-[35px] bg-[#EDF8F7] rounded-tr-[32px] sm:rounded-tr-[25px] md:rounded-tr-[35px] z-10"></span>
                            <span
                                class="absolute top-0 -left-[30px] sm:-left-[25px] md:-left-[35px] w-[32px] h-[32px] sm:w-[25px] sm:h-[25px] md:w-[35px] md:h-[35px] bg-white"></span>
                            <!-- Top Right Inverted Corner -->
                            <span
                                class="absolute top-0 -right-[30px] sm:-right-[25px] md:-right-[35px] w-[32px] h-[32px] sm:w-[25px] sm:h-[25px] md:w-[35px] md:h-[35px] bg-[#EDF8F7] rounded-tl-[32px] sm:rounded-tl-[25px] md:rounded-tl-[35px] z-10"></span>
                            <span
                                class="absolute top-0 -right-[30px] sm:-right-[25px] md:-right-[35px] w-[32px] h-[32px] sm:w-[25px] sm:h-[25px] md:w-[35px] md:h-[35px] bg-white"></span>
                        </div>

                        <div class="text-white py-16 px-7">
                            <div class="grid grid-cols-3 gap-7 w-full">
                                @forelse($Products as $product)
                                    <a href="{{route('frontend.product' , $product->slug)}}">
                                        <div class="flex flex-col items-center text-teal-600 hover:text-black ">

                                            <!-- Card -->
                                            <div
                                                class="product-image aspect-[1/1] w-full bg-gray-100  border  hover:bg-white border-[#126B6538] rounded-[20px] hover:bg-white/10 hover:border-[3px] hover:border-[#126B65] transition-all duration-300 bg-center bg-no-repeat bg-cover"
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
                                    </a>
                                @empty
                                    <div
                                        class="w-full bg-gray-100  border hover:bg-white border-[#126B6538] rounded-[20px] col-span-3 text-black">
                                        @lang("No products in this category")
                                    </div>

                                @endforelse

                            </div>


                            <!-- Pagination -->
                            @if ($Products->hasPages())
                                <div class="mt-12 flex justify-center">
                                    {{ $Products->onEachSide(1)->links('frontend.partials.product-pagination') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-frontend-layout>
