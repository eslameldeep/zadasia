@props([
    'name' => $name,
    'label' => $label ?? $name,
    'placeholder' => $placeholder ?? ($label ?? $name),
    'value' => $value ?? (old($name) ?? @$model->name),
    'error_key' => $error_key ?? $name,
    'label_class' => $label_class ?? 'text-lightblue',
    'type' => $type ?? '',
    'icon' => $icon ?? null,
    'malti_lang' => $malti_lang ?? false,
    'class' => $class ?? '',
])
@php
$available_locales = config('app.available_locales');
@endphp

@if ($malti_lang == true)
@foreach ($available_locales as $key => $lang)
    {{-- With prepend slot, sm size and label --}}
    {{-- @dd(intval($rows)) --}}
    <x-adminlte-textarea name="{{ $name }}[{{ $key }}]"
        class="{{ $class }} {{ $type == 'tinymce' ? ' tinymce' : '' }}" label="{{ __($label) . ' [' . __($lang['en_name']) . ']' }} " placeholder="{{ __($placeholder) }}"
         label-class="{{ $label_class }}" igroup-size="sm" error-key="{{ $error_key.'.'.$key }}" {{ $attributes }}>
        {{ $slot }}
        @isset($icon)
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                </div>
            </x-slot>
        @endisset
        {{ old($name.'.'.$key) ?? data_get($name ,$key) ?? locale_field($name ,$key) }}
    </x-adminlte-textarea>
@endforeach
@else
    {{-- With prepend slot, sm size and label --}}
    <x-adminlte-textarea name="{{ $name }}" class="{{ $class }} {{ $type == 'tinymce' ? ' tinymce' : '' }}"
    placeholder="{{ __($placeholder) }}"
        label="{{ $label }}" label-class="{{ $label_class }}" igroup-size="sm"
         {{ $attributes }}>
        {{ $slot }}
        {!! old($name) ?? field_value($name) !!}
        @isset($icon)
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                </div>
            </x-slot>
        @endisset
    </x-adminlte-textarea>
@endif


@if ($type == 'tinymce')
    @push('js')
        <script src="https://cdn.tiny.cloud/1/eij231nteocgmca65h68wg98udl11dbbrmirboif3x5xb756/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
        {{-- <script src="{{ asset('dashboard-assets/library/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"> --}}
        </script>
        <script>
            tinymce.init({
                selector: 'textarea.tinymce', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists image fullscreen',
                toolbar: 'fullscreen | undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
                image_uploadtab: true,
                images_upload_handler: example_image_upload_handler,


            });

            function example_image_upload_handler(blobInfo, success, failure, progress) {

                var xhr, formData;
                let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', "{{ route('dashboard.core.upload-tinymce') }}");
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.upload.onprogress = function(e) {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = function() {
                    var json;

                    if (xhr.status === 403) {
                        failure('HTTP Error: ' + xhr.status, {
                            remove: true
                        });
                        return;
                    }

                    if (xhr.status < 200 || xhr.status >= 300) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);
                    file = json.data.url;
                    if (!json || typeof json.data.url != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.data.url);
                };

                xhr.onerror = function() {
                    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());


                xhr.send(formData);
            };
        </script>
    @endpush
@endif
