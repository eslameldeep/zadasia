@extends('adminlte::page')

@section('title',  __($name) ?? '')

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

                    <form action="{{ $model != null ? $routeList['update'] : $routeList['store'] }}" method="POST">
                        {{-- With prepend slot --}}
                        @csrf
                        @method('POST')
                        @if ($model != null)
                            @method('PUT')
                        @endif
                        <x-adminlte-input name="name" label="Name" placeholder="Name" value="{{ $model->name }}"
                            error-key="name" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="email" label="Email" type="email" placeholder="mail@example.com"
                            value="{{ $model->email }}" readonly error-key="email" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope  text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>


                        <x-adminlte-input name="phone" type="text" max="20" label="Phone" placeholder="Phone"
                            value="{{ $model->phone }}" error-key="phone" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <div class="row">
                                    
                            <x-adminlte-input name="current_password" type="password" label="Current Password" fgroup-class="col-md-6" error-key="current_password" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-key text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            
                            <x-adminlte-input name="new_password" type="password" label="New Password" fgroup-class="col-md-6" error-key="new_password" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-key text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            
                            <x-adminlte-input name="new_password_confirmation" type="password" label="New Password Confirmation" fgroup-class="col-md-6" error-key="new_password_confirmation" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-key text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>

                        <x-forms.dropzone name="avatar" id="avatar" label="{{__('Avatar')}}" types=".png, .jpg, .jpeg, .gif" maxFileSizeMb="1" maxFiles="3" :mediaFiles="$model?->getMedia('avatar')"/>

                        <x-adminlte-button class="btn-flat" type="submit" label="{{ __('Save')}}" theme="success" icon="fas fa-lg fa-save"/>


                    </form>
                </div>
            </div>
        </div>
    </div>

    

@endsection

