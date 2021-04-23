@extends('layouts.kop-surat')
@section('title', 'Surat Keterangan')
@section('content')
    <div style="text-align: center;">
        <h2 style="text-decoration: underline;margin-top: 50px">SURAT KETERANGAN</h2>
        <p style="margin-bottom: 50px; margin-top: -20px">Nomor : {{ $surat->nomor_surat }}</p>
    </div>
    <p>Yang bertanda tangan di bawah ini, Kepala Sekolah Menengah Kejuruan Negeri 3 Tasikmalaya menerangkan bahwa :</p>
    <table style="margin-left: 50px; margin-top: 20px; margin-bottom: 20px">
        <tr>
            <td style="padding-right: 100px">Nama</td>
            <td>: {{ strtoupper($surat->pesertaDidik->nama) }}</td>
        </tr>
        <tr>
            <td>Tempat/Tgl.Lahir</td>
            <td>
                : {{ ucwords($surat->pesertaDidik->tempat_lahir) . ', ' . \Carbon\Carbon::parse($surat->pesertaDidik->tanggal_lahir)->isoFormat('D MMMM Y')  }}</td>
        </tr>
        <tr>
            <td>N I S N</td>
            <td>: {{ $surat->pesertaDidik->nisn }}</td>
        </tr>
        <tr>
            <td>Program Keahlian</td>
            <td>: {{ strtoupper(str_replace('-', ' ', $surat->pesertaDidik->kode_rombel)) }}</td>
        </tr>
    </table>
    <p style="margin-bottom: 10px">Benar nama tersebut diatas adalah siswa/siswi SMK Negeri 3 Tasikmalaya Tahun
        Pelajaran 2020/2021.</p>
    <p style="margin-bottom: 10px">Demikian surat keterangan ini
        dibuat untuk {{ ($surat->alasan_dibuat)?  : 'dipergunakan sebagaimana mestinya' }}.</p>

    <div class="left" style="float: right; margin: 100px 100px 0 0">
        <p>Dikeluarkan di : Tasikmalaya</p>
        <p>Pada tanggal : {{ \Carbon\Carbon::parse($surat->tanggal)->isoFormat('D MMMM Y') }}</p>
        <br>
        @if($kepala_sekolah)
            <p>Kepala Sekolah,</p>
            <p style="margin-top: 100px"><b>{{ $kepala_sekolah }}</b></p>
            <p>NIP. {{ $nip_kepala_sekolah }}</p>
        @else
            <p>An. Kepala Sekolah,</p>
            <p>Kasubbag. Tata Usaha,</p>
            <p style="margin-top: 100px"><b>{{ $tata_usaha }}</b></p>
            <p>NIP. {{ $nip_tata_usaha }}</p>
        @endif
    </div>
@endsection
