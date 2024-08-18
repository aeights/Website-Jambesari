@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Edit Profil</h5>
                    <input type="hidden" name="id" value="{{ $profile->id }}">
                    <div class="form-floating mb-3">
                        <input name="nama" type="text" value="{{ $profile->nama }}" class="form-control"
                            id="floatingInput" placeholder="" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Nama</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nama
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" value="{{ $profile->email }}" class="form-control"
                            id="floatingInput" placeholder="" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Email</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan email
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="telepon" type="text" value="{{ $profile->telepon }}" class="form-control"
                            id="floatingInput" placeholder="" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Telepon</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan nomor telepon
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect" class="form-label">Jabatan</label>
                        <select name="jabatan_id" class="form-select" id="exampleFormControlSelect" aria-label="">
                            @foreach ($jabatan as $item)
                            <option {{ $item->id == $profile->jabatan_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
