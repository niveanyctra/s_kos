@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-3">Dashboard</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Statistik Utama -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Total Kamar</h5>
                        <h3>{{ $rooms ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-bed fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Fasilitas</h5>
                        <h3>{{ $facilities ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-cogs fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5>User Aktif</h5>
                        <h3>{{ $users ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-users fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Laporan Kamar Berdasarkan Status -->
    <div class="card shadow-sm mt-4">
        <div class="card-header">
            <i class="fas fa-chart-pie me-2"></i> Laporan Kamar Berdasarkan Status
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <canvas id="roomStatusChart"></canvas>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Status</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tersedia</td>
                                <td>{{ $available ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Ditempati</td>
                                <td>{{ $occupied ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Perawatan</td>
                                <td>{{ $maintenance ?? 0 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('roomStatusChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Ditempati', 'Perawatan'],
            datasets: [{
                data: [{{ $available ?? 0 }}, {{ $occupied ?? 0 }}, {{ $maintenance ?? 0 }}],
                backgroundColor: ['#198754', '#0d6efd', '#ffc107']
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection
