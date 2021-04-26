@extends('layouts.kop-surat')
@section('title', 'Data Guru')
@section('content')
    <h3 align="center" style="margin: 10px">DATA GURU</h3>
    <table width="100%" border="1px" cellpadding="5px" cellspacing="0"
           style="font-size: 10px;font-family: Arial,serif;">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>JK</th>
            <th>Tempat Tanggal Lahir</th>
        </tr>
        @foreach($guru as $gr)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $gr->nama }}</td>
                <td>{{ $gr->nip }}</td>
                <td align="center">{{ $gr->jenis_kelamin }}</td>
                <td>{{ $gr->tempat_lahir }}, {{ date('d-m-Y', strtotime($gr->tanggal_lahir)) }}</td>
            </tr>
        @endforeach
    </table>
@endsection
