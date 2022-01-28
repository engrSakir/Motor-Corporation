<!-- Summernote JS -->
<script>
    $('.summernote').summernote({
        placeholder: 'Write important note ...',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>

<script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('assets/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
<!--Custom JavaScript -->

<script src="{{ asset('assets/dist/js/custom.min.js') }}"></script>

{{-- All table are datatable JS Start --}}
<link href="//cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('table').DataTable();
    });
</script>
<!--Sweet alert CDN -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<script src="{{ asset('assets/helper/helper.js') }}"></script>
{{-- @jquery --}}
@toastr_js
@toastr_render
@stack('foot')
{{-- Ajax Delete code --}}
<script>
    $('table').on('click', '.delete-btn', function(event) {
        let url = $(this).val();
        if (!url) {
            Swal.fire(
                'Wrong!',
                'Empty URL',
                'warning'
            )
        } else {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            // console.log(data);
                            if (data.type == 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                if (data.url) {
                                    setTimeout(function() {
                                        location.replace(data.url);
                                    }, 800); //
                                } else {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 800); //
                                }
                            } else {
                                if (data.message) {
                                    Swal.fire(
                                        'Wrong!',
                                        data.message,
                                        'warning'
                                    )
                                } else {
                                    Swal.fire(
                                        'Wrong!',
                                        'Something going wrong.',
                                        'warning'
                                    )
                                }
                            }
                        },
                    })
                }
            })
        }
    });
</script>
