@extends('layout.main')

@section('title', 'Tambah Rombongan Belajar')
@section('rombel-menu', 'active')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card card-lightblue">
                <div class="card-header">
                    <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i
                                class="fa fa-arrow-left"></i> kembali</a></h3>
                    <h3 class="card-title d-block float-right">Form Rombongan Belajar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('rombel.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="custom-select">
                                <option value="">PILIH</option>
                                <option value="X" {{ (old('kelas') == 'X')? 'selected': '' }}>X</option>
                                <option value="XI" {{ (old('kelas') == 'XI')? 'selected': '' }}>XI</option>
                                <option value="XII" {{ (old('kelas') == 'XII')? 'selected': '' }}>XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="kode_jurusan" id="jurusan"
                                    class="custom-select">
                                <option value="">PILIH</option>
                                @foreach($jurusans as $jurusan)
                                    <option
                                        value="{{ $jurusan->kode_jurusan }}" {{ (old('kode_jurusan') == $jurusan->kode_jurusan)? 'selected': '' }}>
                                        {{ $jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelompok">Kelompok</label>
                            <input type="number" min="1" class="form-control"
                                   id="kelompok"
                                   placeholder="Contoh: 1, 2, 3" name="kelompok" value="{{ old('kelompok') }}" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@if ($errors->any())
@section('script')
    @foreach ($errors->all() as $error)
        <script>
            const Toast = Swal.mixin({
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'error',
                title: '{!! $error !!}'
            });
        </script>
    @endforeach
@endsection
@endif
