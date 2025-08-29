@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')




    <div class="row">

        {!! $googleAnalyticsSection !!}

    </div>
@stop
@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard-assets/library/apex-chart/apexcharts.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('dashboard-assets/library/apex-chart/apexcharts.min.js') }}"></script>
@endpush
