@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rukun-warga.store') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Tambah Rukun Warga</h5>
                    <div class="form-floating mb-3">
                        <input name="id" type="number" class="form-control" id="floatingInput" placeholder="Nomor RW"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nomor Rukun Warga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nomor Rukun Warga.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="ketua_rw" type="text" class="form-control" id="floatingInput" placeholder="NIK Ketua RW"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Ketua Rukun Warga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan NIK ketua Rukun Warga.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
