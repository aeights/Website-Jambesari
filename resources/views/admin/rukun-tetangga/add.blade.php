@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rukun-tetangga.store') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Tambah Rukun Tetangga</h5>
                    <div class="form-floating mb-3">
                        <input name="id" type="number" class="form-control" id="floatingInput" placeholder="Nomor RT"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nomor Rukun Tetangga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nomor Rukun Tetangga.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="ketua_rt" type="text" class="form-control" id="floatingInput" placeholder="NIK Ketua RT"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Ketua Rukun Tetangga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan NIK ketua Rukun Tetangga.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
