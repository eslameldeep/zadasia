{{-- @php
    // print_r(gd_info()) ;
@endphp
@dd() --}}
@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop
@push('css')
    
@endpush

@push('js')
<script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.16.0/echo.iife.min.js" integrity="sha512-2NhgeHOjwWVaqNiTi1CTVVZyorEkU4+Fb+vD6l0mGF9eFPI79MIc2+It+vNVuX+1Y7cgFlrTcqS/nUxsrhX10A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.16.0/echo.js" integrity="sha512-oZB7Vx7nrTUSgjOHRWSQR50ursF81aI/sA2r56ByqF1999zqd14b3gqPCEwbUUd0Usuk9410Q+ERVLdMgjszEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    window.chatify = {
        name: "{{ config('chatify.name') }}",
        sounds: {!! json_encode(config('chatify.sounds')) !!},
        allowedImages: {!! json_encode(config('chatify.attachments.allowed_images')) !!},
        allowedFiles: {!! json_encode(config('chatify.attachments.allowed_files')) !!},
        maxUploadSize: {{ Chatify::getMaxUploadSize() }},
        pusher: {!! json_encode(config('chatify.pusher')) !!},
        pusherAuthEndpoint: "http://127.0.0.1:8000/dashboard/auth-pusher"
    };
    window.chatify.allAllowedExtensions = chatify.allowedImages.concat(chatify.allowedFiles);



Pusher.logToConsole = true;


window.Echo = new Echo({    
    broadcaster: 'pusher',    
    key: chatify.pusher.key ,    
    cluster: chatify.pusher.options.cluster ,    
    forceTLS: true
    });

    console.log('chatify.{{auth()->user()->id}}');
    Echo.private('chatify.{{auth()->user()->id}}')
    .listen('ChatifyEvent', (e) => {
     console.log(e);
    });

</script>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                    Welcome {{Auth::user()->name}} 


                    
                </div>
            </div>
        </div>
    </div>
@stop
