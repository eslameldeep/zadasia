@props([
    'name' => $name,
    'label' => $label ?? $name,
    'placeholder' => $placeholder ?? ($label ?? $name),
    'values' => $value == null ? [] : $value,
    'error_key' => $error_key ?? $name,
    'label_class' => $label_class ?? 'text-lightblue',
    'type' => $type ?? 'text',
    'icon' => $icon ?? null,
    'malti_lang' => $malti_lang ?? false,
    'options' => [],
    'selected' => $selected ?? null,
])
@php
    $available_locales = config('app.available_locales');
@endphp

@if ($malti_lang)

    {{-- <div class="row ">
        @foreach ($available_locales as $key => $lang)
        
            <div class="col-md-6 col-sm-12">
                <x-adminlte-input name="{{ $name }}[{{ $key }}]" type=" {{$type}}"
                    label="{{ __($label) . ' [' . __($lang['en_name']) . ']' }} " placeholder="{{ __($placeholder) }}"
                    value="{{ $values ?? old($name.'.'.$key) ?? data_get($name ,$key) ?? locale_field($name ,$key) }}" 
                    error-key="{{ $error_key.'.'.$key }}"
                    label-class="{{ $label_class }}"  {{ $attributes }}>
                    {{ $slot }}
                    @isset($icon)
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="{{ $icon }} text-lightblue"></i>
                            </div>
                        </x-slot>
                    @endisset
                </x-adminlte-input>
            </div>
        @endforeach
    </div> --}}
@else
    <x-adminlte-select name="{{ $name }}" label="{{ $label }}" label-class="text-lightblue" igroup-size="lg"
        error-key="{{ $error_key }}">
        @isset($icon)
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="{{ $icon }}"></i>
                </div>
            </x-slot>
        @endisset

        @foreach ($options as $key => $option)
            <option value="{{ $key }}" @selected($selected == $key)>{{ $option }}</option>
        @endforeach
    </x-adminlte-select>
@endif
