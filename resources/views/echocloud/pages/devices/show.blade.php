<x-echocloud-layout>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4 "
            style="background-image: url('{{ asset('frontend-assets/images/productBG.jpg') }}'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">

                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative text-primary gradient-text">
                        {{-- <img src="{{asset('echocloud-assets/img/bruce-mars.jpg')}}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm"> --}}
                        <i class="fa-solid fa-microchip fa-2xl "></i>
                    </div>
                </div>
                <div class="col-auto my-auto gradient-text">
                    <div class="h-100 ">
                        <h5 class="mb-1">
                            {{ $device?->device_name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $device?->Bucket?->type }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" id="pills-tab" role="tablist">
                            @foreach ($templates as $template)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mb-0 px-0 py-1 {{!$loop->first ?: 'active'}}" id="{{ $template['template']->slug }}-tab"
                                        data-bs-target="#{{ $template['template']->slug }}" data-bs-toggle="pill"
                                        href="#{{ $template['template']->slug }}" role="tab"
                                        aria-controls="{{ $template['template']->slug }}" aria-selected="false">
                                        <i class="{{$template['template']?->icon ?? 'fa-solid fa-indent'}}"></i>
                                        <span class="ms-1">{{ $template['template']->tab_name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        @foreach ($templates as $template)
            <div class="tab-pane fade {{!$loop->first ?: 'show active'}}" id="{{ $template['template']->slug }}" role="tabpanel"
                aria-labelledby="{{ $template['template']->slug }}-tab">
                {!! $template['view'] !!}
            </div>
        @endforeach
    </div>



    @pushOnce('css')
        <style>
            .gradient-text {
                color: #CF916C !important;

                /* background-color: red;

                    background-image: linear-gradient(45deg, #f3ec78, #af4261);
                    background-size: 100%;
                    background-repeat: repeat;
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    -moz-background-clip: text;
                    -moz-text-fill-color: transparent; */

            }
        </style>
    @endPushOnce


    @push('js')
        <script>
            $(document).ready(function() {
                // Function to change the URL without reloading the page
                function changeUrl(newUrl) {
                    history.pushState(null, '', newUrl);
                }



                // Function to show the offcanvas
                let showTab = function(elementId) {
                    // Use querySelector to select the correct tab link element
                    let triggerEl = document.querySelector(`a[data-bs-target="#${elementId}"]`);

                    if (triggerEl) {

                        let tabInstance = new bootstrap.Tab(triggerEl);
                        tabInstance.show();

                        // Handle the moving-tab logic
                        let s = document.querySelector("#pills-tab");
                        let a = triggerEl.parentElement;
                        let n = Array.from(s.querySelectorAll("li"));
                        let l = s.querySelector(".moving-tab");
                        let e = 0;
                        let t;

                        if (s.classList.contains("flex-column")) {
                            for (t = 1; t <= n.indexOf(a); t++) e += s.querySelector("li:nth-child(" + t + ")")
                                .offsetHeight;
                            l.style.transform = "translate3d(0px," + e + "px, 0px)";
                            l.style.height = s.querySelector("li:nth-child(" + t + ")").offsetHeight + "px";
                        } else {
                            for (t = 1; t <= n.indexOf(a); t++) e += s.querySelector("li:nth-child(" + t + ")")
                                .offsetWidth;

                            let transformValue = document.dir == 'ltr' ? e + "px" : "-" + e + "px";
                            l.style.transform = "translate3d(" + transformValue + ", 0px, 0px)";
                            l.style.width = s.querySelector("li:nth-child(" + t + ")").offsetWidth + "px";
                        }
                    } else {
                        console.error(`Element with ID ${elementId} not found`);
                    }
                }



                window.showTab = showTab;
                // Map of offcanvas elements and their respective query parameters
                const tabMap = {
                    'info': 'info',
                    'configuration-history': 'configuration-history',
                    'settings': 'settings',
                    @foreach ($templates as $template)
                        '{{ $template['template']->slug }}': '{{ $template['template']->slug }}',
                    @endforeach
                };

                // Attach event listeners to each offcanvas element
                $.each(tabMap, function(elementId, queryParam) {

                    $('#' + elementId + '-tab').on('show.bs.tab', function(event) {
                        changeUrl('?tab=' + queryParam);
                    });
                });

                // Show the offcanvas based on the query parameter in the URL
                const queryParam = new URLSearchParams(window.location.search).get('tab');

                if (queryParam && tabMap[queryParam]) {
                    showTab(queryParam);
                } else {
                    const lastValue = Object.values(tabMap).pop();

                    showTab(lastValue);
                }
            });
        </script>
    @endpush
</x-echocloud-layout>
