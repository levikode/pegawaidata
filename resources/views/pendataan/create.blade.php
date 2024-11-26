@extends('layouts.template')

@section('title', 'Admin - Tambah Data Pendataan')

@section('judulh1', 'Tambah Data Pendataan')

@section('konten')

<div class="col-lg-8">
    <!-- Error Handling -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Tabs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pendataan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pendataan.store') }}" method="POST">
                @csrf

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs" id="formTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="data-pribadi-tab" data-toggle="tab" href="#data-pribadi" role="tab" aria-controls="data-pribadi" aria-selected="true">Data Pribadi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="info-pekerjaan-tab" data-toggle="tab" href="#info-pekerjaan" role="tab" aria-controls="info-pekerjaan" aria-selected="false">Informasi Pekerjaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kontak-tab" data-toggle="tab" href="#kontak" role="tab" aria-controls="kontak" aria-selected="false">Kontak & Lainnya</a>
                    </li>
                 
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content mt-3" id="formTabsContent">
                    <!-- Tab 1: Data Pribadi -->
                    <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="data-pribadi-tab">
                        <!-- Data Pribadi Fields -->
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
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" id="usia" name="usia" placeholder="Masukkan Usia" value="{{ old('usia') }}">
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan" value="{{ old('pendidikan') }}">
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" id="agama" name="agama">
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen Protestan" {{ old('agama') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Kristen Katolik" {{ old('agama') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir') }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        </div>

                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tab 2: Informasi Pekerjaan -->
                    <div class="tab-pane fade" id="info-pekerjaan" role="tabpanel" aria-labelledby="info-pekerjaan-tab">
                        <!-- Informasi Pekerjaan Fields -->
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan">
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Kepala BKPSDM" {{ old('jabatan') == 'Kepala BKPSDM' ? 'selected' : '' }}>Kepala BKPSDM</option>
                                <option value="Sekretaris BKPSDM" {{ old('jabatan') == 'Sekretaris BKPSDM' ? 'selected' : '' }}>Sekretaris BKPSDM</option>
                                <option value="Kepala Bidang Pengadaan, Pemberhentian, dan Informasi" {{ old('jabatan') == 'Kepala Bidang Pengadaan, Pemberhentian, dan Informasi' ? 'selected' : '' }}>Kepala Bidang Pengadaan, Pemberhentian, dan Informasi</option>
                                <option value="Kepala Bidang Pembinaan dan Kesejahteraan" {{ old('jabatan') == 'Kepala Bidang Pembinaan dan Kesejahteraan' ? 'selected' : '' }}>Kepala Bidang Pembinaan dan Kesejahteraan</option>
                                <option value="Kepala Bidang Pengembangan Kompetensi" {{ old('jabatan') == 'Kepala Bidang Pengembangan Kompetensi' ? 'selected' : '' }}>Kepala Bidang Pengembangan Kompetensi</option>
                                <option value="Kasubbag Umum dan Kepegawaian" {{ old('jabatan') == 'Kasubbag Umum dan Kepegawaian' ? 'selected' : '' }}>Kasubbag Umum dan Kepegawaian</option>
                                <option value="Staff BKPSDM" {{ old('jabatan') == 'Staff BKPSDM' ? 'selected' : '' }}>Staff BKPSDM</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tmt">TMT</label>
                            <input type="date" class="form-control" id="tmt" name="tmt" value="{{ old('tmt') }}">
                        </div>

                        <div class="form-group">
                            <label for="masakerja">Masa Kerja</label>
                            <input type="number" class="form-control" id="masakerja" name="masakerja" placeholder="Masukkan Masa Kerja" value="{{ old('masakerja') }}">
                        </div>

                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <select class="form-control" id="golongan" name="golongan">
                                <option value="" disabled selected>Pilih Golongan</option>
                                <option value="Golongan I" {{ old('golongan') == 'Golongan I' ? 'selected' : '' }}>Golongan I</option>
                                <option value="Golongan II" {{ old('golongan') == 'Golongan II' ? 'selected' : '' }}>Golongan II</option>
                                <option value="Golongan III" {{ old('golongan') == 'Golongan III' ? 'selected' : '' }}>Golongan III</option>
                                <option value="Golongan IV" {{ old('golongan') == 'Golongan IV' ? 'selected' : '' }}>Golongan IV</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tab 3: Kontak & Lainnya -->
                    <div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
                        <!-- Kontak Fields -->
                        <div class="form-group">
                            <label for="notlp">No HP</label>
                            <input type="text" class="form-control" id="notlp" name="notlp" placeholder="Masukkan No HP" value="{{ old('notlp') }}">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                        </div>

                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="" disabled selected>Pilih User</option>
                                @foreach($user as $dt)
                                <option value="{{ $dt->id }}" {{ old('user_id') == $dt->id ? 'selected' : '' }}>{{ $dt->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-icon-split float-right mt-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
