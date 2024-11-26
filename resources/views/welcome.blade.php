@extends('layouts.template')
@section('judulh1','  Dashboard')

@section('konten')

<div class="row">
    <div class="col-12">
      <div class="alert border-left-secondary shadow alert-warning alert-dismissible fade shadow show" role="alert">
        <strong>Selamat Datang!</strong> Anda telah masuk sebagai <strong>{{ Auth::user()->name }}</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            &times;
          </span>
        </button>
      </div>
    </div>
  </div>

<div class="container-fluid">
    <!-- Header -->
    <div class="row">
        <!-- <div class="col-md-12">
            <h1 class="mt-4">Dashboard</h1>
        </div> -->
    </div>
    <canvas id="pendataanChart" width="400" height="50"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lakukan request ke backend untuk mendapatkan data
        fetch('/chart-data')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('pendataanChart').getContext('2d');
                var pendataanChart = new Chart(ctx, {
                    type: 'bar',  // Tipe chart, bisa juga 'line' atau 'pie'
                    data: {
                        labels: ['Pendataan', 'User'],
                        datasets: [{
                            label: 'Total Data',
                            data: [data.pendataan, data.user],  // Data dari backend
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(75, 192, 192, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    });
</script>

<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <a href="{{ route('pendataan.create') }}" class="text-decoration-none">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total pendataan:
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               {{ $data->count() }}
              </div>
            </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <a href="{{ route('user.index') }}" class="text-decoration-none">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            User:
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $user->count() }}
                        </div>
                    </a>
                </div>
                <div class="col-auto">
                    <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    
    <!-- Statistics Overview -->
    <!-- <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Pendataan: {{ $data->count() }}</div> 
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
            <a href="{{ route('user.index') }}" class="text-white">

                <div class="card-body">Total User: {{ $user->count() }}</div> 
                </a>

            </div>
        </div>
        </div>
      
        </div>
    </div> -->

    <!-- Table Data Terbaru -->
  
<div class="col-md-12">
    <div class="card shadow mb-4">
    <h4 class="m-0 font-weight-bold text-primary">Data Pendataan</h4>
    
        <!-- <div class="card-header py-3 d-flex justify-content-between">
              <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
          

            <a href="{{ route('pendataan.create') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pendataan</span>
            </a>
        </div> -->
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
                            <td>{{ $dt->golongan_terakhir ?? 'Tidak Ada' }}</td> <!-- Menampilkan riwayat golongan -->
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
