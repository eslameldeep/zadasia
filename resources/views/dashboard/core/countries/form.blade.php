@extends('adminlte::page')

@section('title', env('APP_TITLE', 'SPACE-ECHO |') .  __($name) ?? '')

@section('content_header')
    <x-dashboard.extra.bread-crumbs name="{{ $name }}" />
@stop

@section('right-sidebar') 
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ $model != null ? $routeList['update']($model) : $routeList['store'](null) }}" method="POST">
                        {{-- With prepend slot --}}
                        @csrf
                        @method('POST')
                        @if ($model != null)
                            @method('PUT')
                        @endif




                        <x-adminlte-button class="btn-flat" type="submit" label="{{ __('Save')}}" theme="success" icon="fas fa-lg fa-save"/>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

