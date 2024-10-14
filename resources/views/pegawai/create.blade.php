@extends('layouts.template')
@section('judulh1','Admin - Pegawai')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                </div>
                <div class="form-group">
                    <label for="nip">nip</label>
                    <input type="number" class="form-control" id="nip" name="nip">
                <div class="form-group">
                    <label for="nik">nik</label>
                    <input type="number" class="form-control" id="nik" name="nik">
                <div class="form-group">
                    <label for="tmt">tmt</label>
                    <input type="date" class="form-control" id="tmt" name="tmt">
                </div> 
                <div class="form-group">
                    <label for="usia">usia</label>
                    <input type="number" class="form-control" id="usia" name="usia">
                </div> 
                <div class="form-group">
                    <label for="masakerja">masa kerja</label>
                    <input type="number" class="form-control" id="masakerja" name="masakerja">
                </div> 
                <div class="form-group">
                    <label>User</label>
                    <select class="form-control" name="user_id">
                        @foreach($user as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="jabatan_id">
                        @foreach($jabatan as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Golongan</label>
                    <select class="form-control" name="golongan_id">
                        @foreach($golongan as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>                
                <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="agama_id">
                        @foreach($agama as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jeniskelamin</label>
                    <select class="form-control" name="jeniskelamin_id">
                        @foreach($jeniskelamin as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ttl">TTL</label>
                    <input type="text" class="form-control" id="ttl" name="ttl" placeholder="">
                </div> 
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="">
                </div> 
              
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection


