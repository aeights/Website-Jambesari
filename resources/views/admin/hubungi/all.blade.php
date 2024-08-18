@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="me-3 mt-3 d-flex justify-content-end">
                <a href="{{ route('informasi.add') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <table id="informasi">
                    <thead>
                        <tr>
                            <th class="text-start">No</th>
                            <th class="text-start">Nama</th>
                            <th class="text-start">Email</th>
                            <th class="text-start">Subjek</th>
                            <th class="text-start">Isi</th>
                            <th class="text-start">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)
                            <tr>
                                <td class="text-start">{{ $no + 1 }}</td>
                                <td class="text-start">{{ $item->nama }}</td>
                                <td class="text-start">{{ $item->email }}</td>
                                <td class="text-start">{{ substr($item->subjek,0,20) }}</td>
                                <td class="text-start">{{ substr($item->isi,0,20) }}</td>
                                <td class="text-start">
                                    <a href="{{ route('informasi.edit', ['id' => $item->id]) }}" class="btn btn-success">Edit</a>
                                    <button id="buttonDeleteInformasi" data-id="{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteInformasi">Hapus</button>
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
        <div class="modal fade" id="modalDeleteInformasi" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Hapus Dusun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <h5>Apakah anda yakin akan menghapus dusun ini?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button id="buttonConfirmDeleteInformasi" type="button" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let table = new DataTable('#informasi',{
            "language": {
                "emptyTable": "Tidak ada data yang tersedia"
            }
        });

        $(document).ready(function () {
            console.log('jquery oke');
            $(document).on('click', '#buttonDeleteInformasi', function() {
                const id = $(this).data('id');
                console.log('ID yang akan dihapus:', id);

                // Simpan ID ke dalam tombol konfirmasi di modal
                $('#buttonConfirmDeleteInformasi').data('id', id);
            });

            $('#buttonConfirmDeleteInformasi').click(function() {
                const id = $(this).data('id');
                console.log('Menghapus ID:', id);

                $.ajax({
                    url: '{{ route('informasi.delete') }}',
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
