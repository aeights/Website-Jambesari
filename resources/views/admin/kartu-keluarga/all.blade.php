@extends('layouts.dashboard')
@section('content')
<div class="col-12 mb-4">
    <div class="card">
        <div class="me-3 mt-3 d-flex justify-content-end">
            <a href="{{ route('kartu-keluarga.add') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <table id="kartuKeluarga">
                <thead>
                    <tr>
                        <th class="text-start">No</th>
                        <th class="text-start">No. Kartu Keluarga</th>
                        <th class="text-start">No. Kepala Keluarga</th>
                        <th class="text-start">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $no => $item)
                    <tr>
                        <td class="text-start">{{ $no+1 }}</td>
                        <td class="text-start">{{ $item->id }}</td>
                        <td class="text-start">{{ $item->kepala_keluarga }}</td>
                        <td class="text-start">
                            <a href="{{ route('kartu-keluarga.edit',['id' => $item->id]) }}" class="btn btn-success">Edit</a>
                            <button id="buttonDeleteKK" data-id="{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteKK">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
    <!-- Modal -->
    <div class="modal fade" id="modalDeleteKK" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Hapus Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Apakah anda yakin akan menghapus kartu keluarga ini?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button id="buttonConfirmDeleteKK" type="button" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        let table = new DataTable('#kartuKeluarga',{
            "language": {
                "emptyTable": "Tidak ada data yang tersedia"
            }
        });

        $(document).ready(function () {
            console.log('jquery oke');
            $(document).on('click', '#buttonDeleteKK', function() {
                const id = $(this).data('id');
                console.log('ID yang akan dihapus:', id);

                // Simpan ID ke dalam tombol konfirmasi di modal
                $('#buttonConfirmDeleteKK').data('id', id);
            });

            $('#buttonConfirmDeleteKK').click(function() {
                const id = $(this).data('id');
                console.log('Menghapus ID:', id);

                $.ajax({
                    url: '{{ route('kartu-keluarga.delete') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}' // Pastikan Anda mengirim token CSRF untuk keamanan
                    },
                    success: function(result) {
                        console.log('berhasil');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal menghapus:', error);
                    }
                });
            });
        });
    </script>
@endpush
