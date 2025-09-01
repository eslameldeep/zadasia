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

                <h1 class="text-3xl md:text-5xl font-bold mb-8">@lang("News Posts")</h1>

            </div>
        </div>
    </section>


    <section class="py-20 bg-[#F7FFFE] w-full">
        <div class="max-w-7xl mx-auto px-6 lg:px-20">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                @foreach($News as $news_post)

                    {{-- News Card --}}
                    <div class="bg-white overflow-hidden -md transition">
                        <div class="aspect-[16/9] w-full bg-center bg-cover  rounded-2xl"
                             style="background-image: url('{{ $news_post->getFirstMediaUrl('image') }}');">
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 line-clamp-2">
                                {{$news_post->name}}
                            </h3>

                            <div class="mt-4 flex items-center justify-between text-gray-500 text-sm">
                                <div class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>
            {{ \Carbon\Carbon::parse($news_post->created_at)->translatedFormat('d F Y') }}
        </span>
                                </div>

                                {{-- Separator --}}
                                <div class="flex-1 border-t border-dashed border-gray-300 mx-4"></div>

                                <a href="{{route('frontend.news-post' , $news_post->slug)}}"
                                   class="w-8 h-8 flex items-center justify-center bg-teal-600 text-white rounded-full hover:bg-teal-700 transition">
                                    <i class="fa-solid fa-arrow-right -rotate-45 "></i>
                                </a>
                            </div>

                        </div>
                    </div>

                @endforeach


            </div>

            <!-- Pagination -->
            @if ($News->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $Products->onEachSide(1)->links('frontend.partials.product-pagination') }}
                </div>
            @endif

        </div>
    </section>


</x-frontend-layout>
