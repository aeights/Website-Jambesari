@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.change-password.process') }}" method="POST">
                    @csrf
                    <h5 class="mb-4">Edit Profil</h5>
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password Lama</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="old_password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password Baru</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="new_password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Konfirmasi Password Baru</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="confirm_password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
