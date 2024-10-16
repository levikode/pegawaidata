@extends('layouts.template')

@section('title', 'Admin - Data Pegawai')

@section('judulh1', 'Data Pegawai')

@section('konten')
<div class="col-lg-6">
    <!-- Error Handling -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Nama Pegawai</th>
                        <td>:</td>
                        <td>{{ $data[0]->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NIP</th>
                        <td>:</td>
                        <td>{{ $data[0]->nip }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NIK</th>
                        <td>:</td>
                        <td>{{ $data[0]->nik }}</td>
                    </tr>
                    <tr>
                        <th scope="row">TMT</th>
                        <td>:</td>
                        <td>{{ $data[0]->tmt }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Usia</th>
                        <td>:</td>
                        <td>{{ $data[0]->usia }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Masa Kerja</th>
                        <td>:</td>
                        <td>{{ $data[0]->masakerja }}</td>
                    </tr>
                    <tr>
                        <th scope="row">User</th>
                        <td>:</td>
                        <td>{{ $data[0]->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jabatan</th>
                        <td>:</td>
                        <td>{{ $data[0]->jabatan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Golongan</th>
                        <td>:</td>
                        <td>{{ $data[0]->golongan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Agama</th>
                        <td>:</td>
                        <td>{{ $data[0]->agama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td>:</td>
                        <td>{{ $data[0]->jeniskelamin }}</td>
                    </tr>
                    <tr>
                        <th scope="row">TTL</th>
                        <td>:</td>
                        <td>{{ $data[0]->ttl }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td>:</td>
                        <td>{{ $data[0]->alamat }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
