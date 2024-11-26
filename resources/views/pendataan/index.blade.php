@extends('layouts.template')

@section('title', 'Data Pendataan')

@section('tambahanCSS')
<!-- DataTables -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('judulh1', 'Pendataan')

@section('konten')

<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h4 class="m-0 font-weight-bold text-primary">Data Pendataan</h4>
            <a href="{{ route('pendataan.create') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pendataan</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
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
                            <th>Riwayat Golongan</th> <!-- Menambahkan kolom Riwayat Golongan -->
                            <th>Agama</th>
                            <th>JKelamin</th>
                            <th>TT Lahir</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
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
                            <td>{{ $dt->golongan }}</td> <!-- Menampilkan golongan saat ini -->
                            <td>
                                @if($dt->riwayat_golongan && count($dt->riwayat_golongan) > 0)
                                    @php
                                        $latestGolongan = end($dt->riwayat_golongan);
                                    @endphp
                                    {{ $latestGolongan['golongan'] }} ({{ $latestGolongan['tanggal_mulai']->format('d-m-Y') }})
                                @else
                                    Tidak Ada
                                @endif
                            </td> <!-- Menampilkan riwayat golongan -->
                            <td>{{ $dt->agama }}</td>
                            <td>{{ $dt->jeniskelamin }}</td>
                            <td>{{ $dt->ttl }}</td>
                            <td>{{ $dt->alamat }}</td>
                            <td>{{ $dt->notlp }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <form action="{{ route('pendataan.destroy', $dt->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('pendataan.edit', $dt->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('pendataan.show', $dt->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('tambahanJS')
<!-- DataTables  & Plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection

@section('tambahScript')
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": true
        });
    });

    @if($message = Session::get('success'))
        toastr.success("{{ $message }}");
    @elseif($message = Session::get('updated'))
        toastr.warning("{{ $message }}");
    @elseif($message = Session::get('deleted'))
        toastr.error("{{ $message }}");
    @endif
</script>
@endsection
