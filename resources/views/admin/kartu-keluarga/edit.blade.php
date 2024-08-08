@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kartu-keluarga.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="old_id" value="{{ (string)$data->id }}">
                    <h5 class="mb-4">Edit Kartu Keluarga</h5>
                    <div class="form-floating mb-3">
                        <input name="id" type="text" value="{{ (string)$data->id }}" class="form-control" id="floatingInput" placeholder="Nomor KK"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nomor Kartu Keluarga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nomor Kartu Keluarga.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kepala_keluarga" type="text" value="{{ $data->kepala_keluarga }}" class="form-control" id="floatingInput" placeholder="NIK Kepala Keluarga"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Kepala Keluarga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan NIK Kepala Keluarga.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
