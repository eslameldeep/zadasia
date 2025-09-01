@if ($paginator->hasPages())
    <nav class="flex justify-center mt-12" role="navigation">
        <ul class="inline-flex items-center space-x-2">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-4 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed">‹</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 rounded-lg bg-white border border-[#126B65] text-[#126B65] hover:bg-[#126B65] hover:text-white transition">
                        ‹
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-4 py-2 text-gray-400">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 rounded-lg bg-[#126B65] text-white">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 rounded-lg bg-white border border-[#126B65] text-[#126B65] hover:bg-[#126B65] hover:text-white transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 rounded-lg bg-white border border-[#126B65] text-[#126B65] hover:bg-[#126B65] hover:text-white transition">
                        ›
                    </a>
                </li>
            @else
                <li class="px-4 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed">›</li>
            @endif
        </ul>
    </nav>
@endif
