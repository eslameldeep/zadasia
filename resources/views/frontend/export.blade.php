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

                <h1 class="text-3xl md:text-5xl font-bold mb-8">@lang("Export Request")</h1>

            </div>
        </div>
    </section>


    <section class="py-20 bg-[#F7FFFE] w-full">

        <div class="max-w-7xl mx-auto px-6 lg:px-20">

            <div class="grid lg:grid-cols-2 gap-10 items-center">


                {{-- Image Side --}}
                <div class="relative rounded-2xl overflow-hidden shadow-lg h-full">
                    <img src="{{ asset('frontend-assets/images/hero-bg.png') }}"
                         alt="@lang('About us')"
                         class="h-full object-cover">

                    {{-- Overlay Filter --}}
                    <div class="absolute inset-0 bg-[#0B2F34] mix-blend-hue"></div>
                </div>


                {{-- Text Side --}}
                <div>

                    <h2 class="mb-6">
                        <span class="text-sm text-teal-600 font-bold">@lang("Export Request")</span>
                        <div>
                            <span
                                class="text-4xl rtl:text-7xl  text-black font-bold">@lang("We meet ")</span><br/>
                            <span
                                class="text-4xl rtl:text-7xl text-teal-600 font-bold">@lang("global export needs")</span>

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


            </div>


        </div>


    </section>


    <section class="py-20 bg-[#F7FFFE] w-full">
        <div class="max-w-7xl mx-auto px-6 lg:px-20">
            <div class="grid grid-cols-3 gap-4 w-full">
                <div><div class="bg-[url('/frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-cover"><img class="block h-100 w-auto object-contain" src="/frontend-assets/images/export-1.png" /></div><h5 class="mt-10 text-center text-teal-700 font-bold text-xl">@lang("Market-specific customization")</h5></div>
                <div><div class="bg-[url('/frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-cover"><img class="block h-100 w-auto object-contain" src="/frontend-assets/images/export-2.png" /></div><h5 class="mt-10 text-center text-teal-700 font-bold text-xl">@lang("Continuous support")</h5></div>
                <div><div class="bg-[url('/frontend-assets/images/bg-icon.svg')] bg-no-repeat bg-cover"><img class="block h-100 w-auto object-contain" src="/frontend-assets/images/export-3.png" /></div><h5 class="mt-10 text-center text-teal-700 font-bold text-xl">@lang("Compliance with international standards")</h5></div>
            </div>
        </div>
    </section>



    <section class="w-full bg-[#F7FFFE] py-20">
        <div class="container mx-auto max-w-7xl grid grid-cols-1 xl:grid-cols-12 gap-24 ">

            {{-- Left Column (30%) --}}
            <div class="xl:col-span-5 text-center xl:text-start text-[#0B2F34] space-y-4">
                <span class="text-sm text-teal-600 font-bold">@lang("Export Request")</span>
                <div class="mx-5">
                    <span class="text-4xl rtl:text-6xl  text-black font-bold">@lang("Contact With Export Team")</span><br />
                    <span class="text-4xl rtl:text-6xl text-teal-600 font-bold">@lang("to meet your needs")</span>

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

                        {{-- Items --}}
                        <div>
                            <label for="items" class="block mb-2 text-sm font-medium">@lang('Items')</label>
                            <textarea id="items" name="items" rows="4"
                                      class="w-full border-none bg-[#EDF8F7] focus:bg-white rounded-3xl p-3 focus:outline-none focus:ring-2 focus:ring-[#126B65]"
                                      placeholder="@lang('Message')"></textarea>
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
