@extends('layouts.template')

@section('title', 'Detail Data Pendataan')

@section('judulh1', 'Detail Data Pendataan')

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
            <h5 class="m-0 font-weight-bold text-warning">Detail Data Pendataan</h5>
        </div>
        <div class="card-body">
            <div class="tab-content mt-3" id="formTabsContent">
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

                <!-- Tab 1: Data Pribadi -->
                <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="data-pribadi-tab">
                    <div class="form-group">
                        <label for="nama">Nama Pegawai</label>
                        <p>{{ $pendataan->nama }}</p>
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <p>{{ $pendataan->nip }}</p>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <p>{{ $pendataan->nik }}</p>
                    </div>

                    <div class="form-group">
                        <label for="usia">Usia</label>
                        <p>{{ $pendataan->usia }}</p>
                    </div>

                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <p>{{ $pendataan->pendidikan }}</p>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <p>{{ $pendataan->agama }}</p>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <p>{{ $pendataan->tempat_lahir }}</p>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <p>{{ $pendataan->tanggal_lahir }}</p>
                    </div>

                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <p>{{ $pendataan->jeniskelamin }}</p>
                    </div>
                </div>

                <!-- Tab 2: Informasi Pekerjaan -->
                <div class="tab-pane fade" id="info-pekerjaan" role="tabpanel" aria-labelledby="info-pekerjaan-tab">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <p>{{ $pendataan->jabatan }}</p>
                    </div>

                    <div class="form-group">
                        <label for="tmt">TMT</label>
                        <p>{{ $pendataan->tmt }}</p>
                    </div>

                    <div class="form-group">
                        <label for="masakerja">Masa Kerja</label>
                        <p>{{ $pendataan->masakerja }} tahun</p>
                    </div>

                    <div class="form-group">
                        <label for="golongan">Golongan</label>
                        <p>{{ $pendataan->golongan }}</p>
                    </div>

                    <div class="form-group">
                        <label for="riwayat_golongan">Riwayat Golongan</label>
                        @if($pendataan->riwayat_golongan)
                            <ul>
                                @foreach($pendataan->riwayat_golongan as $riwayat)
                                    <li>Golongan: {{ $riwayat['golongan'] }}, TMT: {{ $riwayat['tmt'] }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Tidak ada riwayat golongan.</p>
                        @endif
                    </div>
                </div>

                <!-- Tab 3: Kontak & Lainnya -->
                <div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
                    <div class="form-group">
                        <label for="notlp">No HP</label>
                        <p>{{ $pendataan->notlp }}</p>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <p>{{ $pendataan->alamat }}</p>
                    </div>

                    <div class="form-group">
                        <label for="user_id">User</label>
                        <p>{{ $pendataan->user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
