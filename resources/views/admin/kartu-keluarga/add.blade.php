@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kartu-keluarga.store') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Tambah Kartu Keluarga</h5>
                    <div class="form-floating mb-3">
                        <input name="nomor" type="text" class="form-control" id="floatingInput" placeholder="Nomor KK"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nomor Kartu Keluarga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nomor Kartu Keluarga.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kepala_keluarga" type="text" class="form-control" id="floatingInput" placeholder="NIK Kepala Keluarga"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Kepala Keluarga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan NIK kepala keluarga.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
