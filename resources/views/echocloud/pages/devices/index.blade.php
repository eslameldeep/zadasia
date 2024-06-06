<x-echocloud-layout>

    <div class="container-fluid py-4">

{{ $dataTable->table() }}
    </div>

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/library/lightbox2-dev/css/lightbox.css') }}" />
<style>
    .dt-button {
        background-color: #ddd !important;
        color: #000 !important ; 
        padding: .375rem .75rem !important;
        line-height: 1.5 !important;
        border-radius: .25rem !important;
        border: 1px solid transparent   !important ;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out ;
    }
    .dt-button-collection,
    .buttons-columnVisibility {
        background: rgba(153, 153, 153, 1) !important;
        color: #fff !important;
    }

    
</style>
@endpush


@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('dashboard-assets/library/lightbox2-dev/js/lightbox.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"
        type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"
        type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('dashboard-assets/library/datatables/buttons.server-side.js') }}">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>



    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': "Deep %1 of %2"
        })
    </script>
 


    <script>
        window.helper_trans = {
            title: '{{ __('Are you sure ?') }}',
            body: '{{ __('You wont be able to restore it again') }}',
            confirm: '{{ __('Yes, delete') }}',
            cancel: '{{ __('No, cancel') }}'
        }

        function deleteRow(ts) {
            let url = $(ts).data('href');
            Swal.fire({
                title: window.helper_trans.title,
                text: window.helper_trans.body,
                showCancelButton: true,
                confirmButtonText: window.helper_trans.confirm,
                cancelButtonText: window.helper_trans.cancel,
                timer: undefined
            }).then((isConfirm) => {
                if (isConfirm.value) {
                    const xhr = new XMLHttpRequest();
                    xhr.open("DELETE", url);
                    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
                    xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                    const body = JSON.stringify({});
                    xhr.onload = () => {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            let response = JSON.parse(xhr.responseText);
                            console.log(response);
                            if (response.status) {
                                $('.dataTable').DataTable().ajax.reload();
                                Swal.fire("Good Job", response.data, "success");
                            } else {
                                Swal.fire("Failed!", 'Unexpected error occurred', "error");
                            }
                        } else {
                            Swal.fire("Failed!", 'Unexpected error occurred b', "error");
                        }
                    };
                    xhr.send(body);
                }
            });
        }
        $('#multiDeleteAll').on('click', function(e) {

            $('.item_checkbox_delete').each(function() {

                if ($('#multiDeleteAll:checked').length == 0) {
                    $(this).prop('checked', false);
                } else {
                    $(this).prop('checked', true);
                }
            });
        });

        $(document).on('click', '.delBtn', function() {
            var item_checked = $('.item_checkbox_delete:checked').filter(":checked").length;
            if (item_checked > 0) {
                Swal.fire({
                    title: window.helper_trans.title,
                    text: window.helper_trans.body,
                    showCancelButton: true,
                    confirmButtonText: window.helper_trans.confirm,
                    cancelButtonText: window.helper_trans.cancel,
                    timer: undefined
                }).then((isConfirm) => {
                    if (isConfirm.value) {
                        $('#multi-delete-form').submit();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    text: '{{ __('Please Select Item to Delete First') }}',
                    showCancelButton: false,
                    timer: undefined
                });
            }

        });
    </script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function changeModelStatus(event) {
            let switchElement = event.target;
            let checked = switchElement.checked;
            let id = switchElement.id.split("s_").pop();
            let url = switchElement.getAttribute("data-href");

            let status = checked ? true : false;

            let data = {
                id: id,
                status: status,
            };

            $.ajax({
                url: url,
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    Swal.fire({
                        title: response.message,
                        text: "",
                        timer: 3000,
                        width: "32rem",
                        padding: "",
                        showConfirmButton: false,
                        showCloseButton: true,
                        timerProgressBar: false,
                        toast: true,
                        icon: response.success ? "success" : "error",
                        position: "top-end",
                        iconHtml: '<i class="fas ' + (response.success ? 'fa-check-circle' :
                            'fa-times-circle') + '"></i>',
                        customClass: {
                            container: null,
                            popup: null,
                            header: null,
                            closeButton: "btn btn-light",
                            content: null,
                            input: "form-control",
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-light"
                        }
                    });
                },
                error: function(error) {
                    console.log(error.responseJSON)
                    Swal.fire({
                        title: "Error",
                        text: error.responseJSON.message,
                        timer: 3000,
                        width: "32rem",
                        padding: "",
                        showConfirmButton: false,
                        showCloseButton: true,
                        timerProgressBar: false,
                        toast: true,
                        icon: "error",
                        position: "top-end",
                        iconHtml: '<i class="fas fa-times-circle"></i>',
                        customClass: {
                            container: null,
                            popup: null,
                            header: null,
                            closeButton: "btn btn-light",
                            content: null,
                            input: "form-control",
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-light"
                        }
                    });
                }
            });

        }
    </script>

  
    {{ $dataTable->scripts() }}

@endpush


</x-echocloud-layout>