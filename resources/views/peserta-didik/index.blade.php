@extends('layouts.main')

@section('title', 'Peserta Didik')
@section('pd-open-menu', 'menu-open')
@section('peserta-didik-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Peserta Didik</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <form
                            action="{{ route('peserta-didik.multiple-destroy') }}"
                            method="post">
                            @csrf
                            @method('delete')
                            @if(request()->routeIs('peserta-didik.aktif'))
                                <a href="{{ route('peserta-didik.create') }}"
                                   class="btn btn-primary btn-sm d-block float-right"><i
                                        class="fas fa-plus"></i> Tambah</a>
                                <button type="submit"
                                        title="Delete"
                                        class="btn btn-danger btn-sm d-inline btn-del d-inline-block float-right mr-2">
                                    <i class="far fa-trash-alt"></i> Hapus
                                </button>
                            @endif
                            <table id="example1"
                                   class="table table-bordered dataTable dtr-inline table-striped"
                                   role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    @if($peserta_didik[0]->status == 'aktif')
                                        <th class="sorting_asc_disabled sorting_desc_disabled" class="sorting"
                                            tabindex="0" aria-controls="example1" rowspan="1" colspan="1" width="10px">
                                            <input type="checkbox" class="custom-checkbox" id="pilih_semua"
                                                   name="pilih_semua">
                                        </th>
                                    @endif
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                    >No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Nama
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">JK
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">NIPD/NIS
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">NISN
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Rombel
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Terdaftar Sebagai
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Status
                                    </th>
                                    @if($peserta_didik[0]->status == 'aktif')
                                        <th class="sorting sorting_asc_disabled sorting_desc_disabled" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 50px">
                                            Aksi
                                        </th>
                                    @else
                                        <th class="sorting sorting_asc_disabled sorting_desc_disabled" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 50px">
                                            Keluar Karena
                                        </th>
                                        <th class="sorting sorting_asc_disabled sorting_desc_disabled" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 50px">
                                            Aksi
                                        </th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($peserta_didik as $pd)
                                    <tr role="row">
                                        @if($pd->status == 'aktif')
                                            <td>
                                                <input type="checkbox" class="form-check"
                                                       name="id[]" value="{{ $pd->id }}">
                                            </td>
                                        @endif
                                        <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{ $pd->nama }}</td>
                                        <td>{{ $pd->jenis_kelamin }}</td>
                                        <td>{{ $pd->nipd }}</td>
                                        <td>{{ $pd->nisn }}</td>
                                        <td>{{ (empty($pd->kode_rombel))? '' :str_replace('-', ' ', $pd->kode_rombel) }}</td>
                                        <td>{{ $pd->jenis_pendaftaran }}</td>
                                        <td>
                                            @if($pd->status == 'aktif')
                                                <span class="badge bg-success">{{ $pd->status }}</span>
                                            @elseif($pd->status == 'keluar')
                                                <span class="badge bg-danger">{{ $pd->status }}</span>
                                            @endif
                                        </td>
                                        @if($pd->status == 'aktif')
                                            <td>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <a href="{{ route('peserta-didik.show', $pd->id) }}"
                                                           class="btn btn-primary btn-sm d-inline-block">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('peserta-didik.edit', $pd->id) }}"
                                                           class="btn btn-success btn-sm mx-2"><i
                                                                class="far fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        @else
                                            <td>
                                                {{ $pd->keluar_karena }}
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-center">
                                                        <a href="{{ route('peserta-didik.show', $pd->id) }}"
                                                           class="btn btn-primary btn-sm d-inline-block">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
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
