{{-- @php
    // print_r(gd_info()) ;
@endphp
@dd() --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')


    {{-- <div class="row">
        <div class="col-lg-3 col-md-6">
            <x-dashboard.extra.card name="{{ __('Total visitors past 7 days') }}" class="bg-info"
                value="{{ $fetchTotalVisitorsAndPageViews->sum('activeUsers') }}" icon="fas fa-globe" />
        </div>
        <div class="col-lg-3 col-md-6">
            <x-dashboard.extra.card name="{{ __('Total visitors past 7 days') }}" chartName="TotalVisitorsPast7Days" />

        </div>
    </div> --}}


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
