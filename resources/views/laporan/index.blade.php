<!-- resources/views/laporan/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
       <center><h1 class="m-0 font-weight-bold text-primary"> Laporan Data Pegawai</h1></center> 
        <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
         <div class="card-footer">
                <button  type="submit"><a href="{{ route('laporan.export.pdf') }}" class="btn btn-success float-right">Simpan</a>
                </button> 
            </div>
<br>
        <table class="table table-striped">
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
            <td>{{ $dt->jabatan->nama }}</td> <!-- Mengakses nama dari relasi jabatan -->
            <td>{{ $dt->golongan->nama }}</td> <!-- Mengakses nama dari relasi golongan -->
            <td>{{ $dt->agama->nama }}</td> <!-- Mengakses nama dari relasi agama -->
            <td>{{ $dt->jeniskelamin->nama  }}</td>
            <td>{{ $dt->ttl }}</td>
            <td>{{ $dt->alamat }}</td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
@endsection
