<footer class="bg-[#0B2F34] text-[#167E77] py-16">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">

        <!-- Col 1: Logo + Description -->
        <div>
            <img src="{{ asset('frontend-assets/images/logo-w.png') }}" alt="Logo" class="w-fit mb-4">
            <p class="text-[#66898f] text-sm leading-relaxed">
                {{ __("SpaceEcho is dedicated to delivering innovative solutions and high-quality products that serve clients across the globe.") }}
            </p>
        </div>

        <!-- Col 2: Links -->
        <div>
            <h3 class="font-semibold text-lg mb-4">{{ __("Links") }}</h3>
            <ul class="space-y-2 text-[#66898f]">
                <li><a href="/" class="hover:text-[#167E77]">{{ __("Home") }}</a></li>
                <li><a href="/about" class="hover:text-[#167E77]">{{ __("About Us") }}</a></li>
                <li><a href="/products" class="hover:text-[#167E77]">{{ __("Our Products") }}</a></li>
                <li><a href="/news" class="hover:text-[#167E77]">{{ __("Our News") }}</a></li>
                <li><a href="/export-requests" class="hover:text-[#167E77]">{{ __("Export Requests") }}</a></li>
            </ul>
        </div>

        <!-- Col 3: More Links -->
        <div>
            <h3 class="font-semibold text-lg mb-4">{{ __("More") }}</h3>
            <ul class="space-y-2 text-[#66898f]">
                <li><a href="/catalog" class="hover:text-[#167E77]">{{ __("Catalog") }}</a></li>
                <li><a href="/contact" class="hover:text-[#167E77]">{{ __("Contact Us") }}</a></li>
                <li><a href="/faq" class="hover:text-[#167E77]">{{ __("F&Q") }}</a></li>
                <li><a href="/privacy-policy" class="hover:text-[#167E77]">{{ __("Privacy Policy") }}</a></li>
                <li><a href="/terms" class="hover:text-[#167E77]">{{ __("Terms & Conditions") }}</a></li>
            </ul>
        </div>

        <!-- Col 4: Contact Info -->
        <div>
            <h3 class="font-semibold text-lg mb-4">{{ __("Contact") }}</h3>
            <ul class="space-y-3 text-[#66898f]">
                <li class="flex items-start gap-2">
                    <i class="fas fa-map-marker-alt mt-1 text-[#167E77]"></i>
                    <span>{{ __("123 Business Street, Cairo, Egypt") }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-envelope text-[#167E77]"></i>
                    <a href="mailto:info@spaceecho.com" class="hover:text-[#167E77]">info@spaceecho.com</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-phone text-[#167E77]"></i>
                    <a href="tel:+201234567890" class="hover:text-[#167E77]">+20 123 456 7890</a>
                </li>
                <li class="flex items-center gap-4 mt-4">
                    <a href="#" class="hover:text-[#167E77]"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-[#167E77]"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-[#167E77]"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="hover:text-[#167E77]"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</footer>
