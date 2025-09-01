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


        <script src="https://cdn.tiny.cloud/1/4rt2w3643n10azzv64r6z8zi1abn2r5xmprrcdijz6v8346b/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>

        {{-- <script src="{{ asset('dashboard-assets/library/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"> --}}

        <script>

            var example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                xhr.withCredentials = false;
                xhr.open('POST', "{{ route('dashboard.core.upload-tinymce') }}");
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                xhr.upload.onprogress = (e) => {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = () => {
                    if (xhr.status === 403) {
                        reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                        return;
                    }

                    if (xhr.status < 200 || xhr.status >= 300) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                    }

                    const json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.data.url !== 'string') {
                        reject('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    resolve(json.data.url);
                };

                xhr.onerror = () => {
                    reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };

                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            });


            function file_upload_file_handler(cb, value, meta) {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', meta.filetype === 'image' ? 'image/*' : '*'); // Restrict to images if required

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const xhr = new XMLHttpRequest();
                    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                    xhr.withCredentials = false;
                    xhr.open('POST', "{{ route('dashboard.core.upload-tinymce') }}");
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                    xhr.upload.onprogress = (event) => {
                        console.log(`Progress: ${Math.round((event.loaded / event.total) * 100)}%`);
                    };

                    xhr.onload = () => {
                        if (xhr.status === 403) {
                            console.error('HTTP Error: 403');
                            return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                            console.error('HTTP Error:', xhr.status);
                            return;
                        }

                        const json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.data.full_url !== 'string') {
                            console.error('Invalid JSON:', xhr.responseText);
                            return;
                        }

                        // Use the server's URL for the uploaded file
                        cb(json.data.full_url, { title: file.name });
                    };

                    xhr.onerror = () => {
                        console.error('Upload failed due to an XHR error. Code:', xhr.status);
                    };

                    const formData = new FormData();
                    formData.append('file', file); // Append the file to the request

                    xhr.send(formData); // Send the request to the server
                });

                input.click(); // Trigger the file input
            }


            tinymce.init({
                selector: 'textarea.tinymce',
                // apiKey: "scZgxDPFwqDQz82ltZsBDx4Q",
                content_css : "/build/assets/app-8caeff42.css",
                plugins: 'code table lists image fullscreen link media preview bootstrap BootstrapEditor',
                toolbar: 'fullscreen | undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | ',
                    skin: 'bootstrap',
                {{--external_plugins: {--}}
                    {{--    "BootstrapEditor": "{{asset('dashboard-assets/library/BootstrapEditor/plugin.js')}}",--}}
                    {{--},--}}
                images_upload_handler: example_image_upload_handler ,
                file_picker_types: 'file image media',
                file_picker_callback: file_upload_file_handler ,


            });

        </script>
    @endpush
@endif
