<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Peserta Didik</title>
    <style>
        p, h3 {
            margin: 0;
        }
        img {
            float: left;
            width: 100px;
        }
    </style>
</head>
<body>
<div style="text-align: center;">
    <img src="{{ public_path().'/img/logo/JawaBarat.png' }}">
    <p>PEMERINTAH DAERAH PROVINSI JAWA BARAT</p>
    <p>DINAS PENDIDIKAN</p>
    <p>CABANG DINAS PENDIDIKAN WILAYAH XII</p>
    <h3>SMK NEGERI 3 TASIKMALAYA</h3>
    <p>Jl. Tamansari Gobras No.100 Km.6 Tlp.(0265) 323943 Tasikmalaya</p>
    <p>e-mail : smkn_3_tasik@yahoo.com</p>
</div>
<hr style="height:2px;border-width:0;color:black;background-color:black;margin-top: 20px">
<hr style="height:4px;border-width:0;color:black;background-color:black; margin-top:-7px">
<h3 align="center" style="margin: 10px">Daftar Peserta Didik Kelas {{ ($kelas === 'Semua')? '10-12': $kelas }}</h3>
<table width="100%" border="1px" cellpadding="5px" cellspacing="0" style="font-size: 10px;font-family: Arial,serif;">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>NIPD</th>
        <th>Rombel</th>
        <th>JK</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Nomor HP</th>
        <th>Email</th>
    </tr>
    @foreach($peserta_didik as $pd)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $pd->nama }}</td>
            <td>{{ $pd->nipd }}</td>
            <td>{{ str_replace('-', ' ', $pd->kode_rombel) }}</td>
            <td align="center">{{ $pd->jenis_kelamin }}</td>
            <td>{{ $pd->tempat_lahir }}, {{ date('d-m-Y', strtotime($pd->tanggal_lahir)) }}</td>
            <td>{{ $pd->hp }}</td>
            <td>{{ $pd->email }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
