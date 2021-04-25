@extends('layouts.main')

@section('title', 'Detail Guru')
@section('guru-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h4>Guru</h4>
            <table class="table table-striped">
                <tr>
                    <td width="50%" class="text-right font-weight-bold">Nama</td>
                    <td>: {{ $guru->nama }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Nomor Induk Kependudukan (NIK)</td>
                    <td> : {{ $guru->nik }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Nomor Induk Pegawai (NIP)</td>
                    <td> : {{ $guru->nip }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Jenis Kelamin</td>
                    <td> : {{ ($guru->jenis_kelamin == 'L')? 'Laki-Laki':'Perempuan' }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Tempat dan tanggal Lahir</td>
                    <td> : {{ $guru->tempat_lahir . ', ' . date('d-m-Y', strtotime($guru->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Agama</td>
                    <td> : {{ $guru->agama }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Alamat</td>
                    <td>
                        : {{ $guru->alamat }} RT/RW {{ $guru->rt . '/' . $guru->rw }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Kelurahan</td>
                    <td> : {{ $guru->kelurahan }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Kecamatan</td>
                    <td> : {{ $guru->kecamatan }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Kode Pos</td>
                    <td> : {{ $guru->kode_pos }}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
