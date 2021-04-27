@extends('layouts.main')

@section('title', 'Tambah Guru')
@section('gtk-open-menu', 'menu-open')
@section('gtk-menu', 'active')
@section('guru-menu', 'active')

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card card-lightblue">
                <div class="card-header">
                    <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i
                                class="fa fa-arrow-left"></i> kembali</a></h3>
                    <h3 class="card-title d-block float-right">Form Guru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('guru.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                       id="nama" placeholder="Masukan Nama" name="nama"
                                       value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-md-4 col-form-label text-md-right">Nomor Induk Kependudukan
                                (NIK)</label>
                            <div class="col-md-6">
                                <input type="number" min="1" class="form-control @error('nik') is-invalid @enderror"
                                       id="nik" placeholder="Masukan NIK" name="nik"
                                       value="{{ old('nik') }}">
                                @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">Nomor Induk Pegawai
                                (NIP)</label>
                            <div class="col-md-6">
                                <input type="number" min="1" class="form-control @error('nip') is-invalid @enderror"
                                       id="nip" placeholder="Masukan NIP" name="nip"
                                       value="{{ old('nip') }}">
                                @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-right">Keterangan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                       id="keterangan" placeholder="Masukan Keterangan" name="keterangan"
                                       value="{{ old('keterangan') }}">
                                @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">Jenis
                                Kelamin</label>
                            <div class="col-md-6">
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="custom-select @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">PILIH</option>
                                    <option value="L" {{ (old('jenis_kelamin') == 'L')? 'selected': '' }}>Laki - Laki
                                    </option>
                                    <option value="P" {{ (old('jenis_kelamin') == 'P')? 'selected': '' }}>Perempuan
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">Tempat Lahir</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                       id="tempat_lahir" placeholder="Masukan Tempat Lahir" name="tempat_lahir"
                                       value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">Tanggal
                                Lahir</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                       id="tanggal_lahir" placeholder="Masukan Tempat Lahir" name="tanggal_lahir"
                                       value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama" class="col-md-4 col-form-label text-md-right">Agama & Kepercayaan</label>
                            <div class="col-md-6">
                                <input type="text" name="agama" list="agama"
                                       class="form-control @error('agama') is-invalid @enderror"
                                       placeholder="Masukan Agama & Kepercayaan"
                                       value="{{ old('agama') }}">
                                <datalist id="agama">
                                    <option value="Islam">
                                    <option value="Protestan">
                                    <option value="Katolik">
                                    <option value="Hindu">
                                    <option value="Buddha">
                                    <option value="Khonghucu">
                                    <option value="Kepercayaan Kpd Tuan YME">
                                    <option value="Lainnya">
                                </datalist>
                                @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat Jalan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                       id="alamat" placeholder="Masukan Alamat Jalan" name="alamat"
                                       value="{{ old('alamat') }}">
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rt" class="col-md-4 col-form-label text-md-right">RT</label>
                            <div class="col-md-6">
                                <input type="number" min="1" name="rt" id="rt"
                                       class="form-control @error('rt') is-invalid @enderror"
                                       placeholder="Masukan RT" value="{{ old('rt') }}">
                                @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rw" class="col-md-4 col-form-label text-md-right">RW</label>
                            <div class="col-md-6">
                                <input type="number" min="1" name="rw" id="rw"
                                       class="form-control @error('rw') is-invalid @enderror"
                                       placeholder="Masukan RW" value="{{ old('rw') }}">
                                @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-right">Kelurahan/Desa</label>
                            <div class="col-md-6">
                                <input type="text" name="kelurahan" id="kelurahan"
                                       class="form-control @error('kelurahan') is-invalid @enderror"
                                       placeholder="Masukan Kelurahan/Desa" value="{{ old('kelurahan') }}">
                                @error('kelurahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-right">Kecamatan</label>
                            <div class="col-md-6">
                                <input type="text" name="kecamatan" id="kecamatan"
                                       class="form-control @error('kecamatan') is-invalid @enderror"
                                       placeholder="Masukan Kecamatan" value="{{ old('kecamatan') }}">
                                @error('kecamatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-md-4 col-form-label text-md-right">Kode Pos</label>
                            <div class="col-md-6">
                                <input type="number" min="1" name="kode_pos" id="kode_pos"
                                       class="form-control @error('kode_pos') is-invalid @enderror"
                                       placeholder="Masukan Kode Pos" value="{{ old('kode_pos') }}">
                                @error('kode_pos')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
