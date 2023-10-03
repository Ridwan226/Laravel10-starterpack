@extends('admin.template.admin')

@section('app-css')
@endsection
@section('content')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Users </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('administrator/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Users</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Users</h3>
                        <div class="float-sm-end float-none ms-auto">
                            <button data-bs-effect="effect-flip-vertical" id="btn-tambah" data-bs-toggle="modal"
                                href="#modalmedium" class="btn btn-primary me-2">Add User</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table-bordered nowrap border-bottom table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalmedium" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Users</h5>
                        <button id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ url('administrator/user/add') }}" method="post" id="forms"> @csrf
                        <input type="hidden" name="id_edit" id="id_edit" />
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" id="email"
                                    class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" value="{{ old('name') }}" id="name"
                                    class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection


@section('app-js')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('/assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            let table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('administrator/user') }}",
                    type: 'GET'
                },
                buttons: ['copy', 'excel', 'pdf'],
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                columns: [{
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'email',
                    name: 'email'
                }, {
                    data: 'created',
                    name: 'created_at'
                }, {
                    data: 'aksi',
                    name: 'aksi'
                }, ],
            });

        });


        $('#modalmedium').on('hidden.bs.modal', function(e) {
            $('#forms').attr('action', "{{ url('/administrator/users/add') }}")
            $('#forms')[0].reset();
        })

        $(document).on('submit', 'form', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(res) {
                    console.log('dads', res)

                    $('#btn-close').click();
                    $("#datatable").DataTable().ajax.reload();
                    toastr.success(res.message, 'Sukses');
                    $('#forms')[0].reset();
                },
                error: function(xhr) {
                    console.log('dads', xhr.responseJSON.message)
                    toastr.error(xhr.responseJSON.message, 'Inconceivable!')
                }
            })
        })

        $(document).on('click', '.hapus', function() {
            let id_del = $(this).attr('id');
            //  console.log(id_del);
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
                        url: "{{ url('/administrator/user/del') }}",
                        type: "post",
                        data: {
                            id: id_del,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res, status) {
                            if (status = '200') {
                                setTimeout(() => {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Data Berhasil di Hapus',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then((res) => {
                                        $("#datatable").DataTable().ajax
                                            .reload();
                                    })
                                })
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: 'Gagal Menghapus'
                            })
                        }
                    })
                }
            })
        })
        $(document).on('click', '.edit', function() {
            $('#forms').attr('action', "{{ url('/administrator/user/update') }}")
            let id = $(this).attr('id');
            $.ajax({
                url: "{{ url('/administrator/user/edit') }}",
                type: "post",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    $('#btn-tambah').click();
                    $('#id_edit').val(res.id);
                    $('#name').val(res.name);
                    $('#email').val(res.email);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message, 'Inconceivable!');
                }
            })
        })
    </script>
@endsection
