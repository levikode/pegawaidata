@extends('layouts.template')

@section('title', 'Admin - Tambah Data Pegawai')

@section('judulh1', 'Tambah Data Pegawai')

@section('konten')

<div class="col-lg-6">
    <!-- Error Handling -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pegawai</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pegawai" value="{{ old('nama') }}">
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}">
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}">
                </div>

                <div class="form-group">
                    <label for="tmt">TMT</label>
                    <input type="date" class="form-control" id="tmt" name="tmt" value="{{ old('tmt') }}">
                </div>

                <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="number" class="form-control" id="usia" name="usia" placeholder="Masukkan Usia" value="{{ old('usia') }}">
                </div>

                <div class="form-group">
                    <label for="masakerja">Masa Kerja</label>
                    <input type="number" class="form-control" id="masakerja" name="masakerja" placeholder="Masukkan Masa Kerja" value="{{ old('masakerja') }}">
                </div>

                <!-- Dropdowns -->
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" name="user_id">
                        @foreach($user as $dt)
                        <option value="{{ $dt->id }}" {{ old('user_id') == $dt->id ? 'selected' : '' }}>{{ $dt->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jabatan_id">Jabatan</label>
                    <select class="form-control" name="jabatan_id">
                        @foreach($jabatan as $dt)
                        <option value="{{ $dt->id }}" {{ old('jabatan_id') == $dt->id ? 'selected' : '' }}>{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="golongan_id">Golongan</label>
                    <select class="form-control" name="golongan_id">
                        @foreach($golongan as $dt)
                        <option value="{{ $dt->id }}" {{ old('golongan_id') == $dt->id ? 'selected' : '' }}>{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="agama_id">Agama</label>
                    <select class="form-control" name="agama_id">
                        @foreach($agama as $dt)
                        <option value="{{ $dt->id }}" {{ old('agama_id') == $dt->id ? 'selected' : '' }}>{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jeniskelamin_id">Jenis Kelamin</label>
                    <select class="form-control" name="jeniskelamin_id">
                        @foreach($jeniskelamin as $dt)
                        <option value="{{ $dt->id }}" {{ old('jeniskelamin_id') == $dt->id ? 'selected' : '' }}>{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ttl">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Masukkan TTL" value="{{ old('ttl') }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                </div>

                <button type="submit" class="btn btn-success btn-icon-split float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
