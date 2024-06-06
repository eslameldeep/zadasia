<x-frontend-layout>
    <!-- start field section -->
    <section class="container field" id="Software">
       
        @foreach ($Softwares as $index => $software)
            <div class="position-relative software-item">
                <div class="row p-y5 ">
                    <div class="col-lg-1 {{ $loop->odd ? 'order-lg-1' : 'order-lg-3' }} number">
                        {{ sprintf('%02d', $index + 1) }}</div>
                    <div
                        class="col-lg-5 {{ $loop->odd ? 'order-lg-2' : 'order-lg-2' }}  order-2 align-items-center d-flex">
                        <div>
                            <h6 class="section-slug">{{ $software->sub_title }}</h6>
                            <h2 class="position-relative dot-after d-inline section-title">{{ $software->title }}
                            </h2>
                            <div class="d-block my-3 fs-18 text-black-50 fw-normal">{{ $software->description}}</div>

                        </div>
                    </div>
                    <div
                        class="col-lg-5  {{ $loop->odd ? 'order-lg-3 justify-content-lg-end' : 'order-lg-1 d-lg-block offset-1' }} order-1 justify-content-center d-flex">
                        <div class="">
                            <img src="{{ $software->getFirstMediaUrl('image') ? $software->getFirstMediaUrl('image') :  asset('frontend-assets/images/software.svg') }}" alt="{{ $software->title }}" srcset="">
                        </div>
                        {{-- <div class="item-image" style="background-image: url({{ asset('frontend-assets/images/software.svg') }})">
                        
                    </div> --}}
                    </div>
                </div>

                {{-- <div class="number {{ $loop->odd ? "number-left" : "number-right" }}">{{ sprintf("%02d", $index+1) }}</div> --}}
            </div>
        @endforeach


        {{-- <div class="mt-5">
            <div class="row ContactForm position-relative">
                <div class="offset-md-1 col-md-5 ">

                    <div>
                        <h6 class="section-slug">Contact Form</h6>
                        <h2 class="position-relative dot-after d-inline section-title">You can try EchoCloude now</h2>
                        <div class="d-block my-3 fs-18 text-black-50 fw-normal">You can try EchoCloude now, feel free to
                            request a demo account.</div>

                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form">
                        <div class="my-3">
                            <h2 class="fs-5 fw-bold">Fill in the info below</h2>
                            <div class="fs-14 text-black-50 fw-normal">Fill in the info and we will contact you soon.
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i
                                            class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter Your Name here" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="form-label">{{ __('Country') }}</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i
                                            class="bi bi-envelope-fill"></i></span>
                                    <select class="form-control" name="country" id="country" >
                                        <option> Select your country</option>
                                        <option value="egypt" > Egypt</option>
                                        <option value="egypt" > Egypt</option>
                                        <option value="egypt" > Egypt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Email" class="form-label">{{ __('Email') }}</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i
                                            class="bi bi-globe-americas"></i></span>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter Your Name here" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company" class="form-label">{{ __('Company') }}</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i
                                            class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" name="company" id="company"
                                        placeholder="Enter Your company name here" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="way" class="form-label">{{ __('How did you hear about us') }}</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i
                                            class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" name="way" id="way"
                                        placeholder="google,frined,Event ...." aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="form-group">
                               <button type="submit">{{__('Send')}}</button>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!-- end field section -->

    @push('js')
        <script>
            window.addEventListener("load", (event) => {
                $("#country").select2({
                    theme: 'bootstrap' ,
                    placeholder: "Search"
                });


            });
        </script>
    @endpush
    @push('css')
        <style>
            #header {
                background: linear-gradient(180deg, rgba(0, 0, 0, 1) 0%, rgba(255, 255, 255, 0) 100%),
                    url("/frontend-assets/images/software-background.jpg") no-repeat center center/cover !important;
                background-size: cover !important;
                animation: none;
            }
        </style>
    @endpush

    @push('header-title')
        <div class="d-flex align-items-center text-center h-75 ">
            <div class="w-100">
                <h1 class="" style="font: normal normal 800 50px/135px Cairo; letter-spacing: 0px;">
                    {{__('EchoCloud software')}}</h1>
                <h4 class="text-white-50">{{__("Harmonizing Technology with Nature's Symphony")}}</h4>
            </div>
        </div>
    @endpush
</x-frontend-layout>
