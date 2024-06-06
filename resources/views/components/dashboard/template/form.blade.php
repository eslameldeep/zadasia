@props([
    'model' => $model ?? null,
    'name' => $name,
    'routeList' => $routeList,
    'class' => $class ?? null,
    'id' => $id ?? null,
    'deniedKeydown' => $deniedKeydown ?? false,
    'allowFiles' => $allowFiles ?? false,
])
@extends('adminlte::page')

@section('title', env('APP_TITLE', 'SPACE-ECHO |') . __($name) ?? '')

@section('content_header')
    <x-dashboard.extra.bread-crumbs name="{{ $name }}" />
@stop


@push('css')
@endpush

@if ($deniedKeydown == false)
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
@endif

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

                    @if ($routeList != null)
                        <form action="{{ $model != null ? $routeList['update']($model) : $routeList['store'](null) }}"
                            method="POST" class="{{ $class }}"  @if ($allowFiles) enctype="multipart/form-data" @endif>
                            {{-- With prepend slot --}}
                            @csrf
                            @method('POST')
                            @if ($model != null)
                                @method('PUT')
                            @endif
                           
                            {{ $slot }}



                            <x-adminlte-button class="btn-flat" type="submit" label="{{ __('Save') }}" theme="success"
                                icon="fas fa-lg fa-save" />


                        </form>
                    @else
                        {{ $slot }}
                    @endif
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
