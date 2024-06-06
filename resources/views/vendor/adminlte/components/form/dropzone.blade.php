{{-- Set input group item section --}}
@props([
    'name' => $name,
    'id' => $id,
    'label' => $label ?? $name,
    'placeholder' => $placeholder ?? ($label ?? $name),
    'values' => $value == '' ? [] : $value,
    'error_key' => $error_key ?? $name,
    'label_class' => $label_class ?? 'text-lightblue',
    'type' => $type ?? 'text',
    'icon' => $icon ?? null,
    'malti_lang' => $malti_lang ?? false,
])

@push('css')
    <style>
        .dropzone {
            background-color: rgba(0, 0, 0, 0) !important;
        }

        .dropzone .dz-preview .dz-image {
            border-radius: 20px;
            overflow: hidden;
            width: 120px;
            height: 120px;
            position: relative;
            display: block;
            z-index: 10;
        }

        .dropzone .dz-preview .dz-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush
<div class="form-group">
    <label for="{{ $id }}">{{ __($label) }}</label>

    <div id="{{ $id }}" class="dropzone dropzone-container">
        <div class="dz-message">
            <span class="text">{{ __('Drop files here or click to upload') }}</span>
        </div>
    </div>
</div>


<div style="display:none;" class="my-template">
    <div id="mytmp" class="dz-preview dz-file-preview">
        <div class="dz-image"><img data-dz-thumbnail /></div>
        <div class="dz-details">
            <div class="dz-size"><span data-dz-size></span></div>
            <div class="dz-filename"><span data-dz-name></span></div>
        </div>
        <div class="dz-progress">
            <span class="dz-upload" data-dz-uploadprogress></span>
        </div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>
        <div class="dz-success-mark">

            <svg xmlns="http://www.w3.org/2000/svg" height="54px" viewBox="0 0 24 24" width="54px" fill="#000000">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
            </svg>
        </div>
        <div class="dz-error-mark">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <path d="M0 0h24v24H0z" fill="none" />
                <circle cx="12" cy="19" r="2" />
                <path d="M10 3h4v12h-4z" />
            </svg>
        </div>
        <div class="dz-remove" data-dz-remove>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <path d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
            </svg>
        </div>
    </div>
</div>

@php
    $oldMediaIds = $mediaFiles?->pluck('id')->toArray() ?? [];

@endphp

<input type="hidden" name="{{ $name }}">

<input type="hidden" name="old_{{ $name }}" value="{!! implode(',', $oldMediaIds) !!}">






{{-- Add the plugin initialization code --}}


@push('js')
    <script>
        let {{ $name }} = [];
        let old_{{ $name }} = {!! json_encode($oldMediaIds) !!};

        Dropzone.autoDiscover = false;
        var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        // Initialize Dropzone with custom options
        var myDropzone = new Dropzone("#{{ $id }}", {
            url: "{{ route('dashboard.core.upload-dropzone') }}", // Specify the URL to handle file uploads
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },

            maxFilesize: {{ $maxFileSizeMb }}, // Maximum file size in megabytes
            maxFiles: {{ $maxFiles }},
            acceptedFiles: "{{ $types }}", // Specify accepted file types
            dictDefaultMessage: "{{ __('Drop files here or click to upload') }}", // Default message
            dictFileTooBig: "{{ __('File is too big ). Max file size: :maxFileSizeMb  MB.', ['maxFileSizeMb' => $maxFileSizeMb]) }}", // File size error message
            dictInvalidFileType: "{{ __('Invalid file type. Only :types files are allowed.', ['types' => $types]) }}", // File type error message 
            dictFallbackMessage: "{{ __('Your browser does not support drag & drop file uploads.') }}", // Fallback message for older browsers
            dictFallbackText: "{{ __('Please use the fallback form below to upload your files.') }}", // Fallback text for older browsers
            addRemoveLinks: false, // Add remove file links
            previewTemplate: document.querySelector(".my-template").innerHTML,
            init: function() {

                @foreach ($mediaFiles ?? [] as $key => $file)

                    var mockFile = {
                        name: "{{ $file->file_name }}",
                        size: {{ $file->size }},
                        id: {{ $file->id }},
                        viewLink: "{{ $file->getUrl() }}",
                    };
                    this.files[{{ $key }}] = "{{ $file->file_name }}";
                    this.options.addedfile.call(this, mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{ $file->getUrl() }}");
                    mockFile.previewElement.classList.add('dz-success');
                    mockFile.previewElement.classList.add('dz-complete');
                    var viewButton = Dropzone.createElement(
                        '<div class="preview"><img src="{{ asset('dashboard-assets/images/file-earmark-image.svg') }}"/></div>'
                        );
                    mockFile.previewElement.appendChild(viewButton);

                    // Listen to the view button click event
                    viewButton.addEventListener("click", function(e) {
                        window.open(mockFile.viewLink, '_blank');
                    });
                @endforeach

                // Add event listeners for different Dropzone events
                this.on("success", function(file, response) {
                    console.log("File uploaded successfully. Response:", response);
                    {{ $name }}.push(response.data.id);

                    let hiddenInput = document.getElementsByName('{{ $name }}');
                    if (hiddenInput.length > 0) {
                        hiddenInput = hiddenInput[0];
                        hiddenInput.value = {{ $name }}.join(
                            ','); // Set the value of the first hidden input

                    }
                    console.log(hiddenInput.value);
                });

                this.on("maxfilesexceeded", function(file) {
                    this.removeFile(file);
                    // this.addFile(file);

                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: "{{ __('file_upload_limit', ['max_files' => $maxFiles]) }}",
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                });

                this.on("error", function(file, errorMessage) {
                    // console.log("Error uploading file:", errorMessage);
                });

                this.on("removedfile", function(file) {

                    if (file.id != null && file.id != undefined) {

                        old_{{ $name }} = old_{{ $name }}.filter(value => value !== (
                            file.id));
                        console.log(old_{{ $name }});
                        const old_hiddenInput = document.getElementsByName('old_{{ $name }}');
                        if (old_hiddenInput.length > 0) {
                            old_hiddenInput[0].value = old_{{ $name }}.join(
                                ','); // Set the value of the first hidden input
                        }

                    } else {

                        const xhrResponse = file.xhr?.response;
                        const response = xhrResponse ? JSON.parse(xhrResponse) : {};


                        {{ $name }} = {{ $name }}.filter(value => value !== (response
                            .data?.id));

                        console.log(old_{{ $name }});
                        const hiddenInput = document.getElementsByName('{{ $name }}');
                        if (hiddenInput.length > 0) {
                            hiddenInput[0].value = {{ $name }}.join(
                                ','); // Set the value of the first hidden input
                        }

                    }


                });

            },

        });
    </script>
@endpush


{{-- Setup the height and font size of the plugin when using sm/lg sizes --}}
{{-- NOTE: this may change with newer plugin or Bootstrap versions --}}

@once
    @push('css')
        <style type="text/css">
            .dropzone {
                border-radius: 4px;
                border: 2px dashed #0087f7 !important;
                width: 500px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 1em;
            }

            .dz-success-mark {
                background-color: rgb(102, 187, 106, 0.8) !important;
                border-radius: 50%;
            }

            .dz-success-mark svg {
                font-size: 54px;
                fill: #fff !important;
            }

            .dz-error-mark {
                background-color: rgba(239, 83, 80, 0.8) !important;
                border-radius: 50%;
            }

            .dz-error-mark svg {
                font-size: 54px;
                fill: #fff !important;
            }

            #mytmp .dz-remove {
                z-index: 999;
                position: absolute;
                display: block;
                top: 0%;
                left: 0%;
                margin-left: -16px;
                margin-top: -16px;
            }

            #mytmp .preview {
                z-index: 999;
                position: absolute;
                display: block;
                top: 0%;
                right: 0%;
                margin-left: -16px;
                margin-top: -16px;
                cursor: pointer;
            }

            #mytmp .dz-remove svg {
                fill: #444;
                cursor: pointer;
            }
        </style>
    @endpush
@endonce
