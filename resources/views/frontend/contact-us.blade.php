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

                <h1 class="text-3xl md:text-5xl font-bold mb-8">@lang("Contact Us")</h1>

            </div>
        </div>
    </section>


    <section class="py-20 bg-[#F7FFFE] w-full">

        <div class="max-w-7xl mx-auto px-6 lg:px-20">

            <div class="grid md:grid-cols-3 gap-6 mt-16">
                <div class="p-8 rounded-[20px] text-center text-[#0B2F34]"
                     style="background: radial-gradient(closest-side at 50% 50%, #126B6500 0%, #126B6559 100%);">
                    <div class="mb-4">
                        <img class="mx-auto h-16 object-contain" src="/frontend-assets/images/map-icon.png" alt="vision"/>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">@lang("Address")</h3>
                    <p class="text-[#66898f]">@lang("It is a long established fact that a reader will be distracted by the layout and readable content.")</p>
                </div>

                <div class="p-8 rounded-[20px] text-center text-[#0B2F34]"
                     style="background: radial-gradient(closest-side at 50% 50%, #126B6500 0%, #126B6559 100%);">
                    <div class="mb-4">
                        <img class="mx-auto h-16 object-contain" src="/frontend-assets/images/email-icon.png"
                             alt="mission"/>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">@lang("Email Address")</h3>
                    <p class="text-[#66898f]">info@zadasia.com</p>
                </div>

                <div class="p-8 rounded-[20px] text-center text-[#0B2F34]"
                     style="background: radial-gradient(closest-side at 50% 50%, #126B6500 0%, #126B6559 100%);">
                    <div class="mb-4">
                        <img class="mx-auto h-16 object-contain" src="/frontend-assets/images/phone-icon.png" alt="values"/>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">@lang("Phone")</h3>
                    <p class="text-[#66898f]">+1118489000</p>
                </div>
            </div>
        </div>
    </section>


    <section class="w-full bg-[#F7FFFE] py-20">
        <div class="container mx-auto max-w-7xl grid grid-cols-1 xl:grid-cols-12 gap-24 ">




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

            {{-- Left Column (30%) --}}
            <div class="xl:col-span-5 text-center xl:text-start text-[#0B2F34] space-y-4">

                <div class="relative rounded-2xl overflow-hidden shadow-lg lg:h-[700px] h-[500px] ">
                    <img src="{{ asset('frontend-assets/images/egypt-flag.jpg') }}"
                         alt="@lang('About us')"
                         class="h-full w-full object-cover">

                    {{-- Overlay Filter --}}

                    <div class="absolute inset-0 bg-[#000000] opacity-10"></div>

                    {{-- Top Right Text --}}
                    <div class="absolute top-0 right-0 shadow-md text-sm p-5 font-bold space-y-0">
                        <div>
                            <div
                                class="text-4xl rtl:text-5xl w-fit p-5 bg-white rounded-lg text-black font-bold ">@lang("We are present  ")</div><br/>
                            <div
                                class="text-4xl rtl:text-5xl w-fit p-5 bg-white rounded-lg text-teal-600 font-bold">@lang("wherever you are.") 🇪🇬</div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


</x-frontend-layout>
