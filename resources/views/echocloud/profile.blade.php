<x-echocloud-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
    
                        <form action="{{route('echocloud.profile')}}" method="POST">
                            {{-- With prepend slot --}}
                            @csrf
                            
                            @method('PUT')
                            
                            
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" name="name" value="{{ old('name') ?? $model->name }}" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{__('Enter name ')}}">
                                @error('name')
                                
                                <small  class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="email">{{__('Email')}}</label>
                                <input type="email" name="email" readonly value="{{ $model->email }}" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{__('Enter email ')}}">
                                @error('email')
                
                                <small class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">{{__('Phone')}}</label>
                                <input type="text" name="phone" value="{{ old('phone') ?? $model->phone }}" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="{{__('Enter phone ')}}">
                                @error('phone')
                                
                                <small  class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="row">
                                
                                <div class="form-group col-md-12">
                                    <label for="current_password">{{__('Current Password')}}</label>
                                    <input type="text" name="current_password" class="form-control" id="current_password" aria-describedby="passwordHelp" placeholder="{{__('Current Password')}}">
                                    @error('current_password')
                                    
                                    <small class="form-text text-muted">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="new_password">{{__('New Password')}}</label>
                                    <input type="text" name="new_password" class="form-control" id="new_password" aria-describedby="passwordHelp" placeholder="{{__('New Password')}}">
                                    @error('new_password')
                                    
                                    <small class="form-text text-muted">{{$message}}</small>
                                    @enderror
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="new_password_confirmation">{{__('New Password Confirmation')}}</label>
                                    <input type="text" name="new_password_confirmation" class="form-control" id="new_password_confirmation" aria-describedby="passwordHelp" placeholder="{{__('New Password Confirmation')}}">
                                    @error('new_password_confirmation')
                                    
                                    <small class="form-text text-muted">{{$message}}</small>
                                    @enderror
                                </div>

    
                                
                            </div>
                            
    
                            
                            <x-forms.dropzone name="avatar" id="avatar" label="{{__('Avatar')}}" types=".png, .jpg, .jpeg" maxFileSizeMb="1" maxFiles="1" :mediaFiles="$model?->getMedia('avatar')"/>
                            
                            <x-adminlte-button class="btn-flat" type="submit" label="{{ __('Save')}}" theme="success" icon="fas fa-lg fa-save"/>
    
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>

    @push('header')
    <link href="{{ asset('echocloud-assets/css/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('echocloud-assets/js/dropzone/dropzone.min.js')}}" ></script>

    @endpush
</x-echocloud-layout>
