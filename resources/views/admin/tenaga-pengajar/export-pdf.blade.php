<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai - {{ $profil->nama }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Pegawai - {{ $profil->nama }}</h4>
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> --}}
	</center>

	<table class='table table-bordered' width="100%" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">Nama Lengkap</th>
            <th style="border: 1px solid black;">Jabatan</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1
        @endphp
        @foreach($pegawai as $p)
        <tr>
            <td style="border: 1px solid black;">{{ $i++ }}</td>
            <td style="border: 1px solid black;">{{$p->nama_lengkap}}</td>
            <td style="border: 1px solid black;">{{$p->jabatan}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
