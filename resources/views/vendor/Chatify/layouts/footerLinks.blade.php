<script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.16.0/echo.iife.min.js" integrity="sha512-2NhgeHOjwWVaqNiTi1CTVVZyorEkU4+Fb+vD6l0mGF9eFPI79MIc2+It+vNVuX+1Y7cgFlrTcqS/nUxsrhX10A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.16.0/echo.js" integrity="sha512-oZB7Vx7nrTUSgjOHRWSQR50ursF81aI/sA2r56ByqF1999zqd14b3gqPCEwbUUd0Usuk9410Q+ERVLdMgjszEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>

<script >
    // Gloabl Chatify variables from PHP to JS
    window.chatify = {
        name: "{{ config('chatify.name') }}",
        sounds: {!! json_encode(config('chatify.sounds')) !!},
        allowedImages: {!! json_encode(config('chatify.attachments.allowed_images')) !!},
        allowedFiles: {!! json_encode(config('chatify.attachments.allowed_files')) !!},
        maxUploadSize: {{ Chatify::getMaxUploadSize() }},
        pusher: {!! json_encode(config('chatify.pusher')) !!},
        pusherAuthEndpoint: '{{route("pusher.auth")}}'
    };
    window.chatify.allAllowedExtensions = chatify.allowedImages.concat(chatify.allowedFiles);
</script>
<script src="{{ asset('js/chatify/utils.js') }}"></script>
<script src="{{ asset('js/chatify/code.js') }}"></script>


