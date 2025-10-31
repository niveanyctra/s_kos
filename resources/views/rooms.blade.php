@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Daftar Kamar</h3>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Kamar</button>

    <table id="roomTable" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Ukuran</th>
                <th>Status</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->size }}</td>
                <td>{{ $room->status }}</td>
                <td>{{ $room->description }}</td>
                <td>
                    @if($room->image_path)
                        <img src="{{ asset('storage/'.$room->image_path) }}" width="60">
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning btn-sm editBtn"
                            data-id="{{ $room->id }}"
                            data-name="{{ $room->name }}"
                            data-price="{{ $room->price }}"
                            data-size="{{ $room->size }}"
                            data-status="{{ $room->status }}"
                            data-description="{{ $room->description }}">
                        Edit
                    </button>
                    <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $room->id }}">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kamar</h5>
      </div>
      <div class="modal-body">
        <div class="mb-2">
          <label>Nama</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-2">
          <label>Harga</label>
          <input type="number" name="price" class="form-control">
        </div>
        <div class="mb-2">
          <label>Ukuran</label>
          <input type="text" name="size" class="form-control">
        </div>
        <div class="mb-2">
          <label>Status</label>
          <select name="status" class="form-select">
            <option value="available">Available</option>
            <option value="occupied">Occupied</option>
            <option value="maintenance">Maintenance</option>
          </select>
        </div>
        <div class="mb-2">
          <label>Deskripsi</label>
          <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-2">
          <label>Gambar</label>
          <input type="file" name="image" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" id="editForm" enctype="multipart/form-data" class="modal-content">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title">Edit Kamar</h5>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
        <div class="mb-2">
          <label>Nama</label>
          <input type="text" name="name" id="edit-name" class="form-control">
        </div>
        <div class="mb-2">
          <label>Harga</label>
          <input type="number" name="price" id="edit-price" class="form-control">
        </div>
        <div class="mb-2">
          <label>Ukuran</label>
          <input type="text" name="size" id="edit-size" class="form-control">
        </div>
        <div class="mb-2">
          <label>Status</label>
          <select name="status" id="edit-status" class="form-select">
            <option value="available">Available</option>
            <option value="occupied">Occupied</option>
            <option value="maintenance">Maintenance</option>
          </select>
        </div>
        <div class="mb-2">
          <label>Deskripsi</label>
          <textarea name="description" id="edit-description" class="form-control"></textarea>
        </div>
        <div class="mb-2">
          <label>Gambar Baru (opsional)</label>
          <input type="file" name="image" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection


@push('scripts')
<script>
$(document).ready(function() {
    $('#roomTable').DataTable();

    // Tombol Edit
    $('.editBtn').on('click', function() {
        $('#edit-id').val($(this).data('id'));
        $('#edit-name').val($(this).data('name'));
        $('#edit-price').val($(this).data('price'));
        $('#edit-size').val($(this).data('size'));
        $('#edit-status').val($(this).data('status'));
        $('#edit-description').val($(this).data('description'));
        $('#editForm').attr('action', '/rooms/' + $(this).data('id'));

        let editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    });

    // Tombol Hapus
    $('.deleteBtn').on('click', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Yakin hapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/rooms/' + id,
                    type: 'DELETE',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function() {
                        Swal.fire('Berhasil', 'Data dihapus', 'success').then(() => {
                            location.reload();
                        });
                    }
                });
            }
        });
    });
});
</script>
@endpush

