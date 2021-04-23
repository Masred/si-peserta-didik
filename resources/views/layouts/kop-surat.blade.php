<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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
@yield('content')
</body>
</html>
