@extends('layout.main')

@section('title', 'Detail Peserta Didik')
@section('peserta-didik-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h4>Peserta Didik</h4>
            <hr>
            <div class="row">
                <div class="col">
                    <p>Nama</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nama }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Status</p>
                </div>
                <div class="col">
                    : @if($peserta_didik->status == 'aktif')
                        <span class="badge bg-success">{{ $peserta_didik->status }}</span>
                    @elseif($peserta_didik->status == 'keluar')
                        <span class="badge bg-danger">{{ $peserta_didik->status }}</span>
                    @elseif($peserta_didik->status == 'dikeluarkan')
                        <span class="badge bg-danger">keluar</span>
                        <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                    @elseif($peserta_didik->status == 'pindah')
                        <span class="badge bg-danger">keluar</span>
                        <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                    @elseif($peserta_didik->status == 'tamat')
                        <span class="badge bg-danger">keluar</span>
                        <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                    @elseif($peserta_didik->status == 'pindahan')
                        <span class="badge bg-success">aktif</span>
                        <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Jenis Kelamin</p>
                </div>
                <div class="col">
                    : {{ ($peserta_didik->jenis_kelamin == 'L')? 'Laki-Laki': 'Perempuan' }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Nomor Induk Peserta Didik (NIPD) / Nomor Induk Siswa (NIS)</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nipd }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Nomor Induk Siswa Nasional (NISN)</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nisn }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Tahun Masuk</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->tahun_masuk }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Tahun Keluar</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->tahun_keluar }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Tempat Lahir</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->tempat_lahir }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Tanggal Lahir</p>
                </div>
                <div class="col">
                    : {{ date('d-m-Y', strtotime($peserta_didik->tanggal_lahir)) }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Nomor Induk Kependudukan (NIK)</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nik }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Nomor Kartu Keluarga (KK)</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->no_kk }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Agama</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->agama }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Alamat</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->alamat }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Kelurahan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->kelurahan }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Kecamatan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->kecamatan }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Kota</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->kota }}
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>Nomor HP</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->hp }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Email</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->email }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Jurusan</p>
                </div>
                <div class="col">
                    : {{ (!$peserta_didik->kode_rombel)? '': $peserta_didik->rombel->jurusan->nama_jurusan }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Rombongan Belajar</p>
                </div>
                <div class="col">
                    : {{ (!$peserta_didik->kode_rombel)? '' : $peserta_didik->rombel->kelas .' '.$peserta_didik->rombel->kode_jurusan.' '.$peserta_didik->rombel->kelompok }}
                </div>
            </div>
            <hr>
            <h4>Ayah Kandung</h4>
            <hr>
            <div class="row">
                <div class="col">
                    <p>Nama</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nama_ayah }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Tahun Lahir</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->tahun_lahir_ayah }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Jenjang Pendidikan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->jenjang_pendidikan_ayah }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Pekerjaan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->pekerjaan_ayah }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Penghasilan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->penghasilan_ayah }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Nomor Induk Kependudukan (NIK)</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nik_ayah }}
                </div>
            </div>
            <hr>
            <h4>Ibu Kandung</h4>
            <hr>
            <div class="row">
                <div class="col">
                    <p>Nama</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nama_ibu }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Tahun Lahir</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->tahun_lahir_ibu }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Jenjang Pendidikan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->jenjang_pendidikan_ibu }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Pekerjaan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->pekerjaan_ibu }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Penghasilan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->penghasilan_ibu }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Nomor Induk Kependudukan (NIK)</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nik_ibu }}
                </div>
            </div>
            <hr>
            <h4>Wali</h4>
            <hr>
            <div class="row">
                <div class="col">
                    <p>Nama</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nama_wali }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Tahun Lahir</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->tahun_lahir_wali }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Jenjang Pendidikan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->jenjang_pendidikan_wali }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Pekerjaan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->pekerjaan_wali }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Penghasilan</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->penghasilan_wali }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Nomor Induk Kependudukan (NIK)</p>
                </div>
                <div class="col">
                    : {{ $peserta_didik->nik_wali }}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
