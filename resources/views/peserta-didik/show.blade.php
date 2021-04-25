@extends('layouts.main')

@section('title', 'Detail Peserta Didik')
@section('pd-open-menu', 'menu-open')
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
            <table class="table table-striped">
                <tr>
                    <td width="50%" class="text-right font-weight-bold">Nama</td>
                    <td>: {{ $peserta_didik->nama }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Status</td>
                    <td>
                        : @if($peserta_didik->status == 'aktif')
                            <span class="badge bg-success">{{ $peserta_didik->status }}</span>
                        @elseif($peserta_didik->status == 'keluar')
                            <span class="badge bg-danger">{{ $peserta_didik->status }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Terdaftar Sebagai</td>
                    <td> : {{ $peserta_didik->jenis_pendaftaran }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Sekolah Asal</td>
                    <td> : {{ $peserta_didik->sekolah_asal }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Tanggal Masuk</td>
                    <td> : {{ date('d-m-Y', strtotime($peserta_didik->tanggal_masuk)) }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Jenis Kelamin</td>
                    <td> : {{ ($peserta_didik->jenis_kelamin == 'L')? 'Laki-Laki': 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Nomor Induk Peserta Didik (NIPD) / Nomor Induk Siswa (NIS)
                    </td>
                    <td>: {{ $peserta_didik->nipd }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nomor Induk Siswa Nasional (NISN)
                    </td>
                    <td>
                        : {{ $peserta_didik->nisn }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Tempat dan Tanggal Lahir
                    </td>
                    <td>
                        : {{ $peserta_didik->tempat_lahir . ', ' . date('d-m-Y', strtotime($peserta_didik->tanggal_lahir)) }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nomor Induk Kependudukan (NIK)
                    </td>
                    <td>
                        : {{ $peserta_didik->nik }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nomor Kartu Keluarga (KK)
                    </td>
                    <td>
                        : {{ $peserta_didik->no_kk }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Agama
                    </td>
                    <td>
                        : {{ $peserta_didik->agama }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Alamat
                    </td>
                    <td>
                        : {{ $peserta_didik->alamat }} RT/RW {{ $peserta_didik->rt . '/' . $peserta_didik->rw }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Kelurahan
                    </td>
                    <td>
                        : {{ $peserta_didik->kelurahan }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Kecamatan
                    </td>
                    <td>
                        : {{ $peserta_didik->kecamatan }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Kode Pos
                    </td>
                    <td>
                        : {{ $peserta_didik->kode_pos }}
                    </td>
                </tr>

                <tr>
                    <td class="text-right font-weight-bold">
                        Nomor HP
                    </td>
                    <td>
                        : {{ $peserta_didik->hp }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Email
                    </td>
                    <td>
                        : {{ $peserta_didik->email }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Jurusan
                    </td>
                    <td>
                        : {{ (!empty($peserta_didik->rombel->jurusan->nama_jurusan))? $peserta_didik->rombel->jurusan->nama_jurusan : '' }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Rombongan Belajar
                    </td>
                    <td>
                        : {{ (!$peserta_didik->kode_rombel)? '' : $peserta_didik->rombel->kelas .' '.$peserta_didik->rombel->kode_jurusan.' '.$peserta_didik->rombel->kelompok }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h4>Ayah Kandung</h4></td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nama
                    </td>
                    <td>
                        : {{ $peserta_didik->nama_ayah }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Tahun Lahir
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_lahir_ayah }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Jenjang Pendidikan
                    </td>
                    <td>
                        : {{ $peserta_didik->jenjang_pendidikan_ayah }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Pekerjaan
                    </td>
                    <td>
                        : {{ $peserta_didik->pekerjaan_ayah }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Penghasilan
                    </td>
                    <td>
                        : {{ $peserta_didik->penghasilan_ayah }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nomor Induk Kependudukan (NIK)
                    </td>
                    <td>
                        : {{ $peserta_didik->nik_ayah }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h4>Ibu Kandung</h4></td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nama
                    </td>
                    <td>
                        : {{ $peserta_didik->nama_ibu }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Tahun Lahir
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_lahir_ibu }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Jenjang Pendidikan
                    </td>
                    <td>
                        : {{ $peserta_didik->jenjang_pendidikan_ibu }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Pekerjaan
                    </td>
                    <td>
                        : {{ $peserta_didik->pekerjaan_ibu }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Penghasilan
                    </td>
                    <td>
                        : {{ $peserta_didik->penghasilan_ibu }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nomor Induk Kependudukan (NIK)
                    </td>
                    <td>
                        : {{ $peserta_didik->nik_ibu }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h4>Wali</h4></td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nama
                    </td>
                    <td>
                        : {{ $peserta_didik->nama_wali }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Tahun Lahir
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_lahir_wali }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Jenjang Pendidikan
                    </td>
                    <td>
                        : {{ $peserta_didik->jenjang_pendidikan_wali }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Pekerjaan
                    </td>
                    <td>
                        : {{ $peserta_didik->pekerjaan_wali }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Penghasilan
                    </td>
                    <td>
                        : {{ $peserta_didik->penghasilan_wali }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Nomor Induk Kependudukan (NIK)
                    </td>
                    <td>
                        : {{ $peserta_didik->nik_wali }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h4>Lainnya</h4></td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Keluar karena
                    </td>
                    <td>
                        : {{ $peserta_didik->keluar_karena }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Pindah ke
                    </td>
                    <td>
                        : {{ $peserta_didik->pindah_ke }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">
                        Alasan
                    </td>
                    <td>
                        : {{ $peserta_didik->alasan_keluar }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Tanggal Keluar</td>
                    <td> : {{ date('d-m-Y', strtotime($peserta_didik->tanggal_keluar)) }}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
