@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="me-3 mt-3 d-flex justify-content-end">
                <a href="{{ route('penduduk.add') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <table id="penduduk">
                    <thead>
                        <tr>
                            <th class="text-start">No</th>
                            <th class="text-start">NIK</th>
                            <th class="text-start">Nama</th>
                            {{-- <th class="text-start">Nomor KK</th> --}}
                            <th class="text-start">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)
                            <tr>
                                <td class="text-start">{{ $no + 1 }}</td>
                                <td class="text-start">{{ $item->nik }}</td>
                                <td class="text-start">{{ $item->nama }}</td>
                                {{-- <td class="text-start">{{ $item->kartu_keluarga_nomor }}</td> --}}
                                <td class="text-start">
                                    <a href="{{ route('penduduk.edit', ['id' => $item->nik]) }}"
                                        class="btn btn-success">Edit</a>
                                    <button id="buttonDetailPenduduk" data-id="{{ $item->nik }}" class="btn btn-info">Detail</button>
                                    <button id="buttonDeletePenduduk" data-id="{{ $item->nik }}" class="btn btn-danger"
                                        data-bs-toggle="modal" data-bs-target="#modalDeletePenduduk">Hapus</button>
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
        <div class="modal fade" id="modalDeletePenduduk" tabindex="-1" aria-hidden="true">
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
                        <button id="buttonConfirmDeletePenduduk" type="button" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scrollable Modal --}}
    <div class="modal fade" id="modalDetailPenduduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailPendudukTitle">Detail Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyDetailPenduduk">
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
        let table = new DataTable('#penduduk', {
            "language": {
                "emptyTable": "Tidak ada data yang tersedia"
            }
        });

        $(document).ready(function() {
            console.log('jquery oke');
            $(document).on('click', '#buttonDeletePenduduk', function() {
                const id = $(this).data('id');
                console.log('ID yang akan dihapus:', id);

                // Simpan ID ke dalam tombol konfirmasi di modal
                $('#buttonConfirmDeletePenduduk').data('id', id);
            });

            $('#buttonConfirmDeletePenduduk').click(function() {
                const id = $(this).data('id');
                console.log('Menghapus ID:', id);

                $.ajax({
                    url: '{{ route('penduduk.delete') }}',
                    type: 'POST',
                    data: {
                        nik: id,
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

            $(document).on('click', '#buttonDetailPenduduk', function() {
                const id = $(this).data('id');
                console.log('Detail ID:', id);

                $.ajax({
                    url: '{{ route('penduduk.detail') }}',
                    type: 'POST',
                    data: {
                        nik: id,
                        _token: '{{ csrf_token() }}' // Pastikan Anda mengirim token CSRF untuk keamanan
                    },
                    success: function(result) {
                        console.log('berhasil');
                        console.log(result);

                        let html = '';
                        if(result.length > 0) {
                            let penduduk = result[0]; // Asumsi hanya ada satu hasil berdasarkan NIK
                            html += `
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input value="${penduduk.nik}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input value="${penduduk.nama}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input value="${penduduk.tempat_lahir}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input value="${penduduk.tanggal_lahir}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Ayah</label>
                                    <input value="${penduduk.nama_ayah}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Ibu</label>
                                    <input value="${penduduk.nama_ibu}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input value="${penduduk.alamat}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <input value="${penduduk.jenis_kelamin}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Golongan Darah</label>
                                    <input value="${penduduk.golongan_darah}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No KK</label>
                                    <input value="${penduduk.no_kk}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Dusun</label>
                                    <input value="${penduduk.dusun}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">RT</label>
                                    <input value="${penduduk.rt}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">RW</label>
                                    <input value="${penduduk.rw}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <input value="${penduduk.pekerjaan}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <input value="${penduduk.agama}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status Hubungan Keluarga</label>
                                    <input value="${penduduk.status_hub_keluarga}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pendidikan Akhir</label>
                                    <input value="${penduduk.pendidikan_akhir}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status Perkawinan</label>
                                    <input value="${penduduk.status_perkawinan}" class="form-control bg-transparent" type="text" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hubungan Kepala Keluarga</label>
                                    <input value="${penduduk.hub_kepala_keluarga}" class="form-control bg-transparent" type="text" readonly />
                                </div>`;
                        } else {
                            html = '<p>Data tidak ditemukan.</p>';
                        }

                        // Masukkan HTML yang sudah dibuat ke dalam modal body
                        $('#bodyDetailPenduduk').html(html);

                        // Tampilkan modal
                        $('#modalDetailPenduduk').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal menampilkan detail penduduk:', error);
                    }
                });
            });
        });
    </script>
@endpush
