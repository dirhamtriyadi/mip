@extends('master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fixed Layout</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Layout</a></li>
                            <li class="breadcrumb-item active">Fixed Layout</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <h2>Users</h2>
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <a class="btn btn-primary mb-2" href="javascript:void(0)" id="addUserButton">Tambah User</a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Role</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Dibuat</th>
                                            <th>Diubah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                Footer
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitle">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="userForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <p id="warning"></p>
                        </div>
                        <input type="hidden" id="userId" name="userId" hidden>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" id="role" name="role">
                                <option selected disabled>Open this select menu</option>
                                <option value="admin">Admin</option>
                                <option value="surveyor">Surveyor</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitlePassword">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="userFormPassword">
                    <div class="modal-body">
                        <div class="mb-3">
                            <p id="warning"></p>
                        </div>
                        <input type="hidden" id="userIdPassword" name="userIdPassword" hidden>
                        <div class="mb-3">
                            <label for="name" class="form-label">Password</label>
                            <input type="passwordUpdate" class="form-control" id="passwordUpdate" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitPassword">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    {{-- jqconfirm --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    {{-- toastr --}}
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.css') }}">
@endpush

@push('js')
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- jQuery -->
    <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    {{-- jqconfirm --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    {{-- toastr --}}
    <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>


    {{-- momentjs --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script>
        $(document).ready(function() {
            // Pass Header Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Format DataTable
            // DataTable.datetime('D MMM YYYY')
            console.log(moment().format('D MMM YYYY'));

            // DataTable
            var table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: 'Blrftip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                ajax: "{{ route('users') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                    targets: 4,
                    render: function(data) {
                        return moment.utc(data).local().format('YYYY/MM/DD hh:mm:ss')
                    }
                }, {
                    targets: 5,
                    render: function(data) {
                        return moment.utc(data).local().format('YYYY/MM/DD hh:mm:ss')
                    }
                }]
            });

            // Click add
            $('#addUserButton').click(function() {
                $('#userId').val('');
                $('#modalTitle').html('Tambah User');
                $('#userModal').modal('show');
                $('#userForm').trigger('reset');
            });

            // edit
            $('body').on('click', '.editUser', function() {
                var userId = $(this).data('id');
                $.get("{{ route('users') }}" + "/" + userId + "/edit", function(data) {
                    $('#userForm').trigger('reset');
                    $('#userModal').modal('show');
                    $('#modalTitle').html('Edit User');
                    $('#submit').html('Update');
                    $('#userId').val(data.id);
                    $('#role').val(data.role);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                });
            });

            // click submit
            $("#submit").click(function(e) {
                e.preventDefault();
                $(this).html('Sending...');
                $.ajax({
                    type: "post",
                    url: "{{ route('users.store') }}",
                    data: $('#userForm').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#userForm').trigger('reset');
                        $('#userModal').modal('hide');
                        table.draw();
                        if (response.status == true) {
                            toastr.success(response.success, 'Success input', {
                                timeOute: 5000,
                            })
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        $('#submit').html('Save changes')
                    }
                });
            });

            // change password
            $('body').on('click', '.editPasswordUser', function() {
                var userId = $(this).data('id');
                $.get("{{ route('users') }}" + "/" + userId + "/edit", function(data) {
                    $('userFormPassword').trigger('reset');
                    $('#passwordModal').modal('show');
                    $('#modalTitlePassword').html('Ganti Password');
                    $('#submitPassword').html('Update');
                    $('#userIdPassword').val(data.id);
                    $('#passwordUpdate').val('');
                });
            });

            // click save password
            $("#submitPassword").click(function(e) {
                e.preventDefault();
                $(this).html('Sending...');
                console.log($('#userFormPassword').serialize());
                $.ajax({
                    type: "post",
                    url: "{{ route('users.updatepassword') }}",
                    data: $('#userFormPassword').serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success update password', {
                                timeOut: 5000
                            });
                        }
                        console.log(response);
                        $('#userFormPassword').trigger("reset");
                        $('#passwordModal').modal('hide');
                        table.draw();
                    },
                    error: function(response) {
                        console.log(response);
                        $('#submitPassword').html('Save changes')
                    }
                });
            });

            // click delete
            $('body').on('click', '.deleteUser', function() {
                var userId = $(this).data('id');
                $.confirm({
                    title: 'Hapus?!',
                    content: 'Yakin anda ingin menghapus data?!',
                    buttons: {
                        confirm: function() {
                            $.alert('Confirmed!');
                            $.ajax({
                                type: "delete",
                                url: "{{ route('users') }}" + "/" + userId + "/delete",
                                success: function(response) {
                                    console.log(response);
                                    table.draw();
                                    if (response.status == true) {
                                        toastr.success(response.message,
                                        'Success', {
                                            timeOut: 5000
                                        });
                                    }
                                },
                                error: function(response) {
                                    console.log('Error : ', response);
                                }
                            });
                        },
                        cancel: function() {
                            $.alert('Canceled!');
                        }
                    }
                });
            });
        });
    </script>
@endpush
