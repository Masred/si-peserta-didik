@extends('layouts.main')

@section('title', 'Pengguna')
@section('user-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pengguna</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <form
                            action="{{ route('user.multiple-destroy') }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('user.create') }}"
                               class="btn btn-primary btn-sm d-block float-right"><i
                                    class="fas fa-plus"></i> Tambah</a>
                            <button type="submit"
                                    title="Delete"
                                    class="btn btn-danger btn-sm d-inline btn-del d-inline-block float-right mx-2">
                                <i class="far fa-trash-alt"></i> Hapus
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-success d-block float-right" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                <i class="fa fa-question"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Bantuan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Cara Mengakses Halaman Tambah Data</h4>
                                            <ol>
                                                <li>
                                                    <p>Klik tombol Tambah</p>
                                                    <img src="{{ asset('img/bantuan/tambah/tambah1.png') }}"
                                                         class="img-fluid">
                                                </li>
                                            </ol>
                                            <hr>
                                            <h4>Cara Menghapus Data</h4>
                                            <ol>
                                                <li>
                                                    <p>Pilih data yang ingin dihapus dengan men-centang checkbox yang
                                                        ada di kiri (bisa pilih lebih dari satu)</p>
                                                    <img src="{{ asset('img/bantuan/hapus/delete1.png') }}"
                                                         class="img-fluid">
                                                </li>
                                                <li>
                                                    <p>Jika sudah dicentang maka klik tombol Hapus</p>
                                                    <img src="{{ asset('img/bantuan/hapus/delete2.png') }}"
                                                         class="img-fluid">
                                                </li>
                                                <li>
                                                    <p>Klik Hapus</p>
                                                    <img src="{{ asset('img/bantuan/hapus/delete3.png') }}"
                                                         class="img-fluid">
                                                </li>
                                                <li>
                                                    <p>Maka akan muncul pemberitahuan seperti ini.</p>
                                                    <img src="{{ asset('img/bantuan/hapus/delete4.png') }}"
                                                         class="img-fluid">
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="example1" class="table table-bordered dataTable dtr-inline table-striped"
                                   role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc_disabled sorting_desc_disabled" class="sorting"
                                        tabindex="0" aria-controls="example1" rowspan="1" colspan="1" width="10px">
                                        <input type="checkbox" class="custom-checkbox" id="pilih_semua"
                                               name="pilih_semua">
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 50px">
                                        No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Nama
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Level
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr role="row" class="odd">
                                        <td>
                                            <input type="checkbox" class="form-check"
                                                   name="id[]" value="{{ $user->id }}">
                                        </td>
                                        <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            @if($user->is_admin === 1)
                                                <span class="badge bg-danger">Admin</span>
                                            @else
                                                <span class="badge bg-secondary">User</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('script')
    <script>
        $("#pilih_semua").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $(document).ready(function () {
            $('.btn-del').attr('disabled', true);
            $('input[type="checkbox"]').click(function () {
                if ($(this).prop('checked') === true) {
                    $('.btn-del').attr('disabled', false);
                } else {
                    $('.btn-del').attr('disabled', true);
                }
            });
        });
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        $('.btn-del').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Ingin menghapus data?',
                text: 'Data yang telah dihapus tidak dapat kembali lagi',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $(this).parent().submit()
                }
            })
        });
    </script>
@endsection
