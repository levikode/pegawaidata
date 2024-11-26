@extends('layouts.template')

@section('title', 'Ubah Data Pendataan')

@section('judulh1', 'Ubah Data Pendataan')

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
            <h5 class="m-0 font-weight-bold text-warning">Ubah Data Pendataan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pendataan.update', $pendataan->id) }}" method="POST">
                @csrf
                @method('PUT')
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
                    <li class="nav-item">
                        <a class="nav-link" id="riwayat-golongan-tab" data-toggle="tab" href="#riwayat-golongan" role="tab" aria-controls="riwayat-golongan" aria-selected="false">Riwayat Golongan</a>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="formTabsContent">
                    <!-- Tab 1: Data Pribadi -->
                    <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="data-pribadi-tab">
                        <!-- Konten Data Pribadi -->
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pegawai" value="{{ old('nama', $pendataan->nama) }}">
                        </div>

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ old('nip', $pendataan->nip) }}">
                        </div>

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" value="{{ old('nik', $pendataan->nik) }}">
                        </div>

                        <div class="form-group">
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" id="usia" name="usia" placeholder="Masukkan usia" value="{{ old('usia', $pendataan->usia) }}">
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan pendidikan" value="{{ old('pendidikan', $pendataan->pendidikan) }}">
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" id="agama" name="agama">
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam" {{ old('agama', $pendataan->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen Protestan" {{ old('agama', $pendataan->agama) == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Kristen Katolik" {{ old('agama', $pendataan->agama) == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                <option value="Hindu" {{ old('agama', $pendataan->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama', $pendataan->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama', $pendataan->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $pendataan->tempat_lahir) }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendataan->tanggal_lahir) }}">
                        </div>

                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="Laki-laki" {{ old('jeniskelamin', $pendataan->jeniskelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jeniskelamin', $pendataan->jeniskelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    </div>

                    <!-- Tab 2: Informasi Pekerjaan -->
                    <div class="tab-pane fade" id="info-pekerjaan" role="tabpanel" aria-labelledby="info-pekerjaan-tab">
                        <!-- Konten Informasi Pekerjaan -->
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan">
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Kepala BKPSDM" {{ old('jabatan', $pendataan->jabatan) == 'Kepala BKPSDM' ? 'selected' : '' }}>Kepala BKPSDM</option>
                                <option value="Sekretaris BKPSDM" {{ old('jabatan', $pendataan->jabatan) == 'Sekretaris BKPSDM' ? 'selected' : '' }}>Sekretaris BKPSDM</option>
                                <option value="Kepala Bidang Pengadaan, Pemberhentian, dan Informasi" {{ old('jabatan', $pendataan->jabatan) == 'Kepala Bidang Pengadaan, Pemberhentian, dan Informasi' ? 'selected' : '' }}>Kepala Bidang Pengadaan, Pemberhentian, dan Informasi</option>
                                <option value="Kepala Bidang Pembinaan dan Kesejahteraan" {{ old('jabatan', $pendataan->jabatan) == 'Kepala Bidang Pembinaan dan Kesejahteraan' ? 'selected' : '' }}>Kepala Bidang Pembinaan dan Kesejahteraan</option>
                                <option value="Kepala Bidang Pengembangan Kompetensi" {{ old('jabatan', $pendataan->jabatan) == 'Kepala Bidang Pengembangan Kompetensi' ? 'selected' : '' }}>Kepala Bidang Pengembangan Kompetensi</option>
                                <option value="Kasubbag Umum dan Kepegawaian" {{ old('jabatan', $pendataan->jabatan) == 'Kasubbag Umum dan Kepegawaian' ? 'selected' : '' }}>Kasubbag Umum dan Kepegawaian</option>
                                <option value="Staff BKPSDM" {{ old('jabatan', $pendataan->jabatan) == 'Staff BKPSDM' ? 'selected' : '' }}>Staff BKPSDM</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tmt">TMT</label>
                            <input type="date" class="form-control" id="tmt" name="tmt" value="{{ old('tmt', $pendataan->tmt) }}">
                        </div>

                        <div class="form-group">
                            <label for="masakerja">Masa Kerja</label>
                            <input type="number" class="form-control" id="masakerja" name="masakerja" placeholder="Masukkan Masa Kerja" value="{{ old('masakerja', $pendataan->masakerja) }}">
                        </div>

                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <select class="form-control" id="golongan" name="golongan">
                                <option value="" disabled selected>Pilih Golongan</option>
                                <option value="Golongan I" {{ old('golongan', $pendataan->golongan) == 'Golongan I' ? 'selected' : '' }}>Golongan I</option>
                                <option value="Golongan II" {{ old('golongan', $pendataan->golongan) == 'Golongan II' ? 'selected' : '' }}>Golongan II</option>
                                <option value="Golongan III" {{ old('golongan', $pendataan->golongan) == 'Golongan III' ? 'selected' : '' }}>Golongan III</option>
                                <option value="Golongan IV" {{ old('golongan', $pendataan->golongan) == 'Golongan IV' ? 'selected' : '' }}>Golongan IV</option>
                            </select>
                        </div>
                    </div>

                    </div>

                    <!-- Tab 3: Kontak & Lainnya -->
                    <div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
                        <!-- Konten Kontak & Lainnya -->
                        <div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
                        <div class="form-group">
                            <label for="notlp">No HP</label>
                            <input type="text" class="form-control" id="notlp" name="notlp" placeholder="Masukkan No HP" value="{{ old('notlp', $pendataan->notlp) }}">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat', $pendataan->alamat) }}">
                        </div>

                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="" disabled selected>Pilih User</option>
                                @foreach($user as $dt)
                                <option value="{{ $dt->id }}" {{ old('user_id', $pendataan->user_id) == $dt->id ? 'selected' : '' }}>{{ $dt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                    </div>

                    <!-- Tab 4: Riwayat Golongan -->
                    <div class="tab-pane fade" id="riwayat-golongan" role="tabpanel" aria-labelledby="riwayat-golongan-tab">
                        <div class="form-group">
                            <label for="riwayat_golongan">Riwayat Golongan</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Golongan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="riwayatGolonganTable">
                                    @if (isset($pendataan->riwayat_golongan) && count($pendataan->riwayat_golongan) > 0)
                                        @foreach ($pendataan->riwayat_golongan as $index => $riwayat)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="riwayat_golongan[{{ $index }}][golongan]" value="{{ old('riwayat_golongan.' . $index . '.golongan', $riwayat['golongan']) }}">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="riwayat_golongan[{{ $index }}][tanggal_mulai]" value="{{ old('riwayat_golongan.' . $index . '.tanggal_mulai', $riwayat['tanggal_mulai']) }}">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="riwayat_golongan[{{ $index }}][tanggal_akhir]" value="{{ old('riwayat_golongan.' . $index . '.tanggal_akhir', $riwayat['tanggal_akhir']) }}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada data riwayat golongan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <button type="button" id="addRow" class="btn btn-primary btn-sm">Tambah Riwayat</button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning btn-icon-split float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Ubah</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Tambah baris baru untuk riwayat golongan
    document.getElementById('addRow').addEventListener('click', function () {
        const tableBody = document.getElementById('riwayatGolonganTable');
        const rowCount = tableBody.rows.length;
        const newRow = `
            <tr>
                <td><input type="text" class="form-control" name="riwayat_golongan[${rowCount}][golongan]" placeholder="Golongan"></td>
                <td><input type="date" class="form-control" name="riwayat_golongan[${rowCount}][tanggal_mulai]" placeholder="Tanggal Mulai"></td>
                <td><input type="date" class="form-control" name="riwayat_golongan[${rowCount}][tanggal_akhir]" placeholder="Tanggal Akhir"></td>
                <td><button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button></td>
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    });

    // Hapus baris
    document.addEventListener('click', function (event) {
        if (event.target && event.target.classList.contains('removeRow')) {
            event.target.closest('tr').remove();
        }
    });
</script>
@endpush
