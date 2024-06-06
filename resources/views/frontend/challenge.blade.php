<x-frontend-layout>
    <!-- start field section -->
    <section class="container field py-5" id="Challenge">
       
        <div class="row ">
            {{-- Start article --}}
            <div class="col-md-9">
                <article>
                    <h1 class="dot-after">{{ $Challenge->title }}</h1>
                    {{-- <h4 class="text-black-50">{{ $Challenge->slogan }}</h4> --}}
                    <hr>
                    <article class="">
                        {!! $Challenge->article !!}
                    </article>
                </article>
            </div>
            {{-- End article --}}

             {{-- Start sidebar --}}
             <div class="col-md-3 " style="padding-top : 100px ">
                @foreach ($Challenges as $ChallengeItem)
                <div class="card bg-white border-radius mt-2 rounded-0">
                    <img class="card-img-top" src="{{ $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb') ? $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb') : asset('/frontend-assets/images/87566b91c4.png')}}" alt="{{ $ChallengeItem->title }}">
                    <div class="card-body">
                      <h5 class="card-text">{{ $ChallengeItem->title }}</h5>
                      <p class="card-text">{{ $ChallengeItem->short_description }}</p>
                      <a  href="{{ route('frontend.challenges.show', $ChallengeItem->id) }}" 
                        class="more-btn fw-bold text-decoration-none text-black d-block">{{__('More')}} <span class="dot-btn"><i
                                class="bi {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'bi-arrow-left' : 'bi-arrow-right' }} d-inline icon"></i></span></a>
                    </div>
                  </div>
                @endforeach
            </div>
            {{-- End sidebar --}}
        </div>

    </section>
    <!-- end field section -->

    @push('js')
        
    @endpush
    @push('css')
        <style>
            #header {
                background: linear-gradient(180deg, rgba(0, 0, 0, 1) 0%, rgba(255, 255, 255, 0) 100%),
                    url("{{ $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb')  ? $Challenge->getFirstMedia('image')?->getFullUrl('image-thumb') :asset('frontend-assets/images/87566b91c4.png') }}") no-repeat center center/cover !important;
                background-size: cover !important;
                animation: none;
            }
        </style>
    @endpush

    @push('header-title')
        <div class="d-flex align-items-center text-center h-75 ">
            <div class="w-100">
                <h1 class="" style="font: normal normal 800 50px/135px Cairo; letter-spacing: 0px;">
                   {{ $Challenge->title }}</h1>
                <h4 class="text-white-50">{{$Challenge->slogan }}</h4>
            </div>
        </div>
    @endpush
</x-frontend-layout>
