@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('penduduk.store') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Tambah Penduduk</h5>
                    <div class="form-floating mb-3">
                        <input name="nik" type="text" class="form-control" id="floatingInput" placeholder="Nomor Induk Kependudukan"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">NIK</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan Nomor Induk Kependudukan.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nama" type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama lengkap.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="tempat_lahir" type="text" class="form-control" id="floatingInput" placeholder="Tempat Lahir"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Tempat Lahir</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan tempat lahir.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nama_ayah" type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap Ayah"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama Ayah</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama ayah.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nama_ibu" type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap Ibu"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama Ibu</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama ibu.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                        <div class="">
                            <input name="tanggal_lahir" class="form-control" type="date" id="html5-date-input" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Golongan Darah</label>
                        <select name="golongan_darah_id" class="js-example-basic-single form-select">
                            @foreach ($golonganDarah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Nomor Kartu Keluarga</label>
                        <select name="kartu_keluarga_nomor" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Nomor Kartu Keluarga</option>
                            @foreach ($kartuKeluarga as $item)
                            <option value="{{ $item->nomor }}">{{ $item->nomor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Dusun</label>
                        <select name="dusun_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Dusun</option>
                            @foreach ($dusun as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Rukun Warga</label>
                        <select name="rukun_warga_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Rukun Warga</option>
                            @foreach ($rw as $item)
                            <option value="{{ $item->id }}">{{ $item->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Rukun Tetangga</label>
                        <select name="rukun_tetangga_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Rukun Tetangga</option>
                            @foreach ($rt as $item)
                            <option value="{{ $item->id }}">{{ $item->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Pekerjaan</label>
                        <select name="jenis_pekerjaan_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Jenis Pekerjaan</option>
                            @foreach ($pekerjaan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Agama</label>
                        <select name="agama_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Agama</option>
                            @foreach ($agama as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Status Hubungan Keluarga</label>
                        <select name="status_hub_keluarga_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Status Hubungan Keluarga</option>
                            @foreach ($statusHubKeluarga as $item)
                            <option value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan_akhir_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanAkhir as $item)
                            <option value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Status Perkawinan</option>
                            @foreach ($statusPerkawinan as $item)
                            <option value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Hubungan Kepala Keluarga</label>
                        <select name="hub_kepala_keluarga_id" class="js-example-basic-single form-select">
                            <option selected value="">Pilih Hubungan Kepala Keluarga</option>
                            @foreach ($hubKepalaKeluarga as $item)
                            <option value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
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