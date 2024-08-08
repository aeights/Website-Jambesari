@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rukun-tetangga.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="old_id" value="{{ $data->id }}">
                    <h5 class="mb-4">Edit Rukun Tetangga</h5>
                    <div class="form-floating mb-3">
                        <input name="id" type="text" value="{{ $data->id }}" class="form-control" id="floatingInput" placeholder="Nomor RT"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nomor Rukun Tetangga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nomor Rukun Tetangga.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="ketua_rt" type="text" value="{{ $data->ketua_rt }}" class="form-control" id="floatingInput" placeholder="NIK Ketua RT"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Ketua Rukun Tetangga</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan NIK ketua Rukun Tetangga.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
