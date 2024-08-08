@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dusun.store') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Tambah Dusun</h5>
                    <div class="form-floating mb-3">
                        <input name="nama" type="text" class="form-control" id="floatingInput" placeholder="contoh: Angsanah"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama dusun.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kepala_dusun" type="text" class="form-control" id="floatingInput" placeholder="NIK Kepala Dusun"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Kepala Dusun</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan NIK kepala dusun.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
