@extends('layout.main')

@section('title', 'Jurusan')

@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Jurusan</h3>
                    <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-sm d-block float-right"><i
                            class="fa fa-plus"></i> Tambah</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 70px">No</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th style="width: 160px">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jurusans as $jurusan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jurusan->kode_jurusan }}</td>
                                <td>{{ $jurusan->nama_jurusan }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('jurusan.edit', $jurusan->kode_jurusan) }}"
                                               class="btn btn-success btn-sm">Edit</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('jurusan.destroy', $jurusan->kode_jurusan) }}"
                                                  method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @if(session('status'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });
            Toast.fire(
                'Berhasil!',
                '{!! session('status') !!}',
                'success'
            );
        </script>
    @endif
@endsection
