@extends('layouts.main')

@section('title', 'Laporan Data Peserta Didik')
@section('laporan-open-menu', 'menu-open')
@section('laporan-menu', 'active')
@section('laporan-pd-menu', 'active')

@section('content')
    <div class="card card-lightblue">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
            <h3 class="card-title d-block float-right">Laporan Data Peserta Didik</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('peserta-didik.print') }}" method="post" target="_blank">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">Status Peserta Didik</label>
                    <div class="col-md-6">
                        <select name="status" id="status" class="custom-select" required>
                            <option value="">PILIH</option>
                            <option value="aktif">Aktif</option>
                            <option value="Lulus">Alumni</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_rombel" class="col-md-4 col-form-label text-md-right">Rombel</label>
                    <div class="col-md-6">
                        <select name="kode_rombel" id="kode_rombel" class="custom-select" required>
                            <option value="">PILIH</option>
                            <option value="semua">Semua</option>
                            @foreach($rombel as $r)
                                <option
                                    value="{{ $r->kode_rombel }}">{{ str_replace('-', ' ', $r->kode_rombel) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-md-4 col-form-label text-md-right">Kelas</label>
                    <div class="col-md-6">
                        <select name="kelas" id="kelas" class="custom-select" required>
                            <option value="">PILIH</option>
                            <option value="semua">Semua</option>
                            <option value="X">10</option>
                            <option value="XI">11</option>
                            <option value="XII">12</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_jurusan" class="col-md-4 col-form-label text-md-right">Jurusan</label>
                    <div class="col-md-6">
                        <select name="kode_jurusan" id="kode_jurusan" class="custom-select" required>
                            <option value="">PILIH</option>
                            <option value="semua">Semua</option>
                            @foreach($jurusan as $j)
                                <option
                                    value="{{ $j->kode_jurusan }}">{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $('#kelas').val('').attr('disabled', true);
        $('#kode_jurusan').val('').attr('disabled', true);
        $('#kode_rombel').val('').attr('disabled', true);
        $('#status').change(function () {
            if ($('#status option:selected').val() === 'aktif') {
                $('#kode_rombel').val('').attr('disabled', false);
                $('#kelas').val('').attr('disabled', false);
                $('#kode_jurusan').val('').attr('disabled', false);
            } else if ($('#status').val() === 'Lulus') {
                $('#kode_rombel').val('semua').attr('disabled', true);
                $('#kelas').val('semua').attr('disabled', true);
                $('#kode_jurusan').val('').attr('disabled', false);
            } else {
                $('#kode_rombel').val('').attr('disabled', true);
                $('#kelas').val('').attr('disabled', true);
                $('#kode_jurusan').val('').attr('disabled', true);
            }
        })
        $('#kode_rombel').change(function () {
            if ($('#kode_rombel option:selected').val() !== 'semua') {
                $('#kelas').val('').attr('disabled', true);
                $('#kode_jurusan').val('').attr('disabled', true);
            } else if ($('#kode_rombel option:selected').val() === 'semua' || '') {
                $('#kelas').val('').attr('disabled', false);
                $('#kode_jurusan').val('').attr('disabled', false);
            }
        })
    </script>
@endsection
