@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dusun.update') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Edit Dusun</h5>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-floating mb-3">
                        <input name="nama" type="text" value="{{ $data->nama }}" class="form-control" id="floatingInput" placeholder="contoh: Angsanah"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama dusun.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kepala_dusun" type="text" value="{{ $data->kepala_dusun }}" class="form-control" id="floatingInput" placeholder="NIK Kepala Dusun"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Kepala Dusun</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan NIK kepala dusun.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
