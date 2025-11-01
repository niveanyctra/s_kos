@extends('layouts.admin')

@section('title', 'Edit Setting')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kos</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $setting->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $setting->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="2" required>{{ old('address', $setting->address) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="location_map" class="form-label">Embed Google Maps</label>
                        <textarea class="form-control" id="location_map" name="location_map" rows="3">{{ old('location_map', $setting->location_map) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone', $setting->phone) }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $setting->email) }}">
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo Baru</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti logo.</small>

                        @if ($setting->logo_path)
                            <div class="mt-2">
                                <p>Logo saat ini:</p>
                                <img src="{{ Storage::url($setting->logo_path) }}" alt="Logo Sekarang" class="img-fluid"
                                    style="max-height: 100px;">
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
