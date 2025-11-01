@extends('layouts.app')
@section('content')
    <header class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-5">Cari Kost Nyaman, Dekat Lokasi Favoritmu</h1>
                    <p class="lead">Foto jelas, fasilitas lengkap, harga transparan. </p>
                </div>

                {{-- <div class="col-lg-5 text-center d-none d-lg-block">
                <img src="https://via.placeholder.com/420x300?text=Ilustrasi+Kost" alt="kost" class="img-fluid rounded">
            </div> --}}
            </div>
        </div>
    </header>

    <main class="container my-5">
        <section class="mb-5 text-center">
            <h2 class="h4">Kenapa Pilih {{ $setting->name }}?</h2>
            <p class="text-muted">Mudah mencari, foto & informasi lengkap, serta kontak langsung pemilik.</p>

            <div class="row g-3 justify-content-center mt-3">
                <div class="col-6 col-md-3">
                    <div class="border rounded p-3">
                        <h5 class="mb-1">Cepat</h5>
                        <small class="text-muted">Cari dalam hitungan detik</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="border rounded p-3">
                        <h5 class="mb-1">Transparan</h5>
                        <small class="text-muted">Harga & fasilitas jelas</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="border rounded p-3">
                        <h5 class="mb-1">Aman</h5>
                        <small class="text-muted">Kontak langsung pemilik</small>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h4 class="h6">Testimoni</h4>
            <div class="row g-3 mt-2">
                <div class="col-md-4">
                    <div class="border rounded p-3">
                        <strong>Lamin Jamal</strong>
                        <p class="mb-0 small text-muted">"Kost yang saya pilih bersih dan pemilik ramah. Saran bagus!"</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-3">
                        <strong>Heri Maguir</strong>
                        <p class="mb-0 small text-muted">"Dekat kampus, nyaman buat belajar. Harga sesuai fasilitas."</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-3">
                        <strong>Plorian Wits</strong>
                        <p class="mb-0 small text-muted">"Proses cepat lewat web, langsung kontak pemilik."</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
