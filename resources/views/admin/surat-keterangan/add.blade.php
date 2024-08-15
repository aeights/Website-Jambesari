@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('surat-keterangan.store') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Tambah Surat Keterangan</h5>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Pemohon Surat</label>
                        <select name="penduduk_nik" class="js-example-basic-single form-select">
                            <option selected value="">Pilih NIK pemohon surat</option>
                            @foreach ($nik as $item)
                                <option value="{{ $item->nik }}">{{ $item->nik.' - '.$item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kode_kategori" value="470" type="text" class="form-control" id="floatingInput" placeholder="example: 470"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Kode Kategori Surat</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan kode kategori surat.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nomor_urut" value="{{ $nomorBaru }}" min="1" type="number" class="form-control" id="floatingInput" placeholder="example: 1"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nomor Urut</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nomor urut surat.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kode_surat_keluar" value="430.11.23.1" type="text" class="form-control" id="floatingInput" placeholder="example: 430.11.23.1"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Kode Surat Keluar</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan kode surat keluar.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea" class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal</label>
                        <div class="">
                            <input name="tanggal" value="{{ date('Y-m-d') }}" class="form-control" type="date" id="html5-date-input" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('oke');
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush