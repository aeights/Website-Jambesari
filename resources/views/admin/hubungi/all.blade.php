@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body" style="overflow-x: auto;">
                <table id="hubungi">
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
                                <td class="text-start">{{ substr($item->pesan,0,20) }}</td>
                                <td class="text-start">
                                    <button id="buttonDetailHubungi" data-id="{{ $item->id }}" class="btn btn-info">Detail</button>
                                    <button id="buttonDeleteHubungi" data-id="{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteHubungi">Hapus</button>
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
        <div class="modal fade" id="modalDeleteHubungi" tabindex="-1" aria-hidden="true">
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
                        <button id="buttonConfirmDeleteHubungi" type="button" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scrollable Modal --}}
    <div class="modal fade" id="modalDetailHubungi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailHubungiTitle">Detail Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyDetailHubungi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let table = new DataTable('#hubungi',{
            "language": {
                "emptyTable": "Tidak ada data yang tersedia"
            }
        });

        $(document).ready(function () {
            console.log('jquery oke');
            $(document).on('click', '#buttonDeleteHubungi', function() {
                const id = $(this).data('id');
                console.log('ID yang akan dihapus:', id);

                // Simpan ID ke dalam tombol konfirmasi di modal
                $('#buttonConfirmDeleteHubungi').data('id', id);
            });

            $('#buttonConfirmDeleteHubungi').click(function() {
                const id = $(this).data('id');
                console.log('Menghapus ID:', id);

                $.ajax({
                    url: '{{ route('hubungi.delete') }}',
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

            $(document).on('click', '#buttonDetailHubungi', function() {
                const id = $(this).data('id');
                console.log('Detail ID:', id);

                $.ajax({
                    url: '{{ route('hubungi.detail') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}' // Pastikan Anda mengirim token CSRF untuk keamanan
                    },
                    success: function(result) {
                        console.log('berhasil');
                        console.log(result);

                        let html = '';
                        if(result) {
                            let hubungi = result; // Asumsi hanya ada satu hasil berdasarkan NIK
                            html += `
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input value="${hubungi.nama}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input value="${hubungi.email}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subjek</label>
                                    <input value="${hubungi.subjek}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea" class="form-label">Pesan</label>
                                    <textarea readonly class="form-control bg-white" id="exampleFormControlTextarea" rows="3">${hubungi.pesan}</textarea>
                                </div>`;
                        } else {
                            html = '<p>Data tidak ditemukan.</p>';
                        }

                        // Masukkan HTML yang sudah dibuat ke dalam modal body
                        $('#bodyDetailHubungi').html(html);

                        // Tampilkan modal
                        $('#modalDetailHubungi').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal menampilkan detail penduduk:', error);
                    }
                });
            });
        });
    </script>
@endpush
