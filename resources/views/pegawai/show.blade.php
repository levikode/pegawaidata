@extends('layouts.template')
@section('judulh1','Admin - pegawai')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your
        input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data pegawai</h3>
        </div>
        <!-- /.card-header -->
        <div class=" card-body">
            <table>
                <tr>
                    <th>Nama pegawai</th>
                    <td>:</td>
                    <td>{{ $data[0]->nama }}</td>
                </tr>
                <tr>
                    <th>Nip</th>
                    <td>:</td>
                    <td>{{ $data[0]->nip }}</td>
                </tr>
                
                <tr>
                    <th>Nik</th>
                    <td>:</td>

                    <td>{{ $data[0]->nik}}</td>
                </tr>
                <tr>
                    <th>Tmt</th>
                    <td>:</td>

                    <td>{{ $data[0]->tmt}}</td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td>:</td>

                    <td>{{ $data[0]->usia}}</td>
                </tr>
                <tr>
                    <th>Masakerja</th>
                    <td>:</td>

                    <td>{{ $data[0]->masakerja}}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>:</td>

                    <td>{{ $data[0]->name}}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>:</td>

                    <td>{{ $data[0]->jabatan}}</td>
                </tr>
                <tr>
                    <th>Golongan</th>
                    <td>:</td>

                    <td>{{ $data[0]->golongan}}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>:</td>

                    <td>{{ $data[0]->agama}}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>

                    <td>{{ $data[0]->jeniskelamin}}</td>
                </tr>
                <tr>
                    <th>Ttl</th>
                    <td>:</td>

                    <td>{{ $data[0]->ttl}}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>

                    <td>{{ $data[0]->alamat}}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection