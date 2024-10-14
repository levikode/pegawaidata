<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pegawai</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<center><h2>Laporan Data Pegawai</h2></center>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>NIK</th>
            <th>TMT</th>
            <th>Usia</th>
            <th>Jabatan</th>
            <th>Golongan</th>
            <th>Agama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawai as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->nama }}</td>
                <td>{{ $dt->nip }}</td>
                <td>{{ $dt->nik }}</td>
                <td>{{ $dt->tmt }}</td>
                <td>{{ $dt->usia }}</td>
                <td>{{ $dt->jabatan->nama }}</td>
                <td>{{ $dt->golongan->nama }}</td>
                <td>{{ $dt->agama->nama }}</td>
                <td>{{ $dt->jeniskelamin->nama  }}</td>
                <td>{{ $dt->ttl }}</td>
                <td>{{ $dt->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
