<!-- resources/views/laporan/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
     <center><h1 class="m-0 font-weight-bold text-primary"> Laporan Data pendataan</h1></center>  
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
                            <th>Petugas</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NIK</th>
                            <th>TMT</th>
                            <th>Usia</th>
                            <th>Pendidikan</th>
                            <th>Masa Kerja</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Agama</th>
                            <th>JKelamin</th>
                            <th>TT Lahir</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($pendataan as $dt)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $dt->user->name }}</td>
            <td>{{ $dt->nama }}</td>
            <td>{{ $dt->nip }}</td>
            <td>{{ $dt->nik }}</td>
            <td>{{ $dt->tmt }}</td>
            <td>{{ $dt->usia }}</td>
            <td>{{ $dt->pendidikan }}</td>
            <td>{{ $dt->masakerja }}</td>
            <td>{{ $dt->jabatan }}</td> 
            <td>{{ $dt->golongan }}</td>
            <td>{{ $dt->agama}}</td>
            <td>{{ $dt->jeniskelamin}}</td>
            <td>{{ $dt->ttl }}</td>
            <td>{{ $dt->alamat }}</td>
            <td>{{ $dt->notlp }}</td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
@endsection
