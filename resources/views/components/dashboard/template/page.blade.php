@props([
    'model' => $model ?? null,
    'name' => $name,
    'class' => $class ?? null , 
    'id' => $id ?? null , 
    

])
@extends('adminlte::page')

@section('title', env('APP_TITLE', 'SPACE-ECHO |') . __($name) ?? '')

@section('content_header')
    <x-dashboard.extra.bread-crumbs name="{{ $name }}" />
@stop


@push('css')
@endpush
@push('js')
    <script>
        document.addEventListener("keydown", function(event) {
            // Check if Ctrl key is pressed and the key is "n"
            if (event.ctrlKey && event.key === " ") {
                event.preventDefault();
                window.history.go(-1);
            }
        });
    </script>
@endpush

@php
    $model = getModel();
@endphp
@section('right-sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($content_before))
                        {{ $content_before }}
                    @else
                        @stack('content_before')
                    @endif
                        
                        {{ $slot }}




                    @if (isset($content_after))
                        {{ $content_after }}
                    @else
                        @stack('content_after')
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
