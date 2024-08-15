@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('penduduk.update') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Edit Penduduk</h5>
                    <input type="hidden" name="old_nik" value="{{ $data->nik }}">
                    <div class="form-floating mb-3">
                        <input name="nik" value="{{ $data->nik }}" type="text" class="form-control" id="floatingInput" placeholder="Nomor Induk Kependudukan"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">NIK</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan Nomor Induk Kependudukan.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nama" value="{{ $data->nama }}" type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama lengkap.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="tempat_lahir" value="{{ $data->tempat_lahir }}" type="text" class="form-control" id="floatingInput" placeholder="Tempat Lahir"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Tempat Lahir</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan tempat lahir.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nama_ayah" value="{{ $data->nama_ayah }}" type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap Ayah"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama Ayah</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama ayah.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nama_ibu" value="{{ $data->nama_ibu }}" type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap Ibu"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama Ibu</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama ibu.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="alamat" value="{{ $data->alamat }}" type="text" class="form-control" id="floatingInput"
                            placeholder="Alamat Lengkap" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Alamat</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan alamat lengkap.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                        <div class="">
                            <input name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" class="form-control" type="date" id="html5-date-input" />
                        </div>
                    </div>
                    <div class="col-md">
                        <small class="text-light fw-semibold d-block">Jenis Kelamin</small>
                        <div class="form-check form-check-inline mt-3">
                            <input {{ $data->jenis_kelamin == 'LAKI-LAKI' ? 'checked' : '' }} class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1"
                                value="LAKI-LAKI" />
                            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input {{ $data->jenis_kelamin == 'PEREMPUAN' ? 'checked' : '' }} class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2"
                                value="PEREMPUAN" />
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Golongan Darah</label>
                        <select name="golongan_darah_id" class="js-example-basic-single form-select">
                            @foreach ($golonganDarah as $item)
                            <option {{ $item->id == $data->golongan_darah_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Nomor Kartu Keluarga</label>
                        <select name="kartu_keluarga_nomor" class="js-example-basic-single form-select">
                            @foreach ($kartuKeluarga as $item)
                            <option {{ $item->nomor == $data->kartu_keluarga_nomor ? 'selected' : '' }} value="{{ $item->nomor }}">{{ $item->nomor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Dusun</label>
                        <select name="dusun_id" class="js-example-basic-single form-select">
                            @foreach ($dusun as $item)
                            <option {{ $item->id == $data->dusun_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Rukun Warga</label>
                        <select name="rukun_warga_id" class="js-example-basic-single form-select">
                            @foreach ($rw as $item)
                            <option {{ $item->id == $data->rukun_warga_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Rukun Tetangga</label>
                        <select name="rukun_tetangga_id" class="js-example-basic-single form-select">
                            @foreach ($rt as $item)
                            <option {{ $item->id == $data->rukun_tetangga_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Pekerjaan</label>
                        <select name="jenis_pekerjaan_id" class="js-example-basic-single form-select">
                            @foreach ($pekerjaan as $item)
                            <option {{ $item->id == $data->jenis_pekerjaan_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Agama</label>
                        <select name="agama_id" class="js-example-basic-single form-select">
                            @foreach ($agama as $item)
                            <option {{ $item->id == $data->agama_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Status Hubungan Keluarga</label>
                        <select name="status_hub_keluarga_id" class="js-example-basic-single form-select">
                            @foreach ($statusHubKeluarga as $item)
                            <option {{ $item->id == $data->status_hub_keluarga_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan_akhir_id" class="js-example-basic-single form-select">
                            @foreach ($pendidikanAkhir as $item)
                            <option {{ $item->id == $data->pendidikan_akhir_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan_id" class="js-example-basic-single form-select">
                            @foreach ($statusPerkawinan as $item)
                            <option {{ $item->id == $data->status_perkawinan_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Hubungan Kepala Keluarga</label>
                        <select name="hub_kepala_keluarga_id" class="js-example-basic-single form-select">
                            @foreach ($hubKepalaKeluarga as $item)
                            <option {{ $item->id == $data->hub_kepala_keluarga_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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