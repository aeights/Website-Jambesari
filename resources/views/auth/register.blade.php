@extends('layouts.auth')
@section('content')
    <!-- Register Card -->
    <div class="card">
        <div class="card-body">
            <h4 class="mb-2">Selamat Datang 🚀</h4>
            <p class="mb-4">Silahkan mendaftar menggunakan email dan telepon anda!</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Masukkan nama anda" autofocus />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan email anda" />
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="telepon" name="telepon"
                        placeholder="Masukkan nomor telepon" autofocus />
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select" id="jabatan" aria-label="Default select example" name="jabatan_id">
                        <option value="">Pilih jabatan anda</option>
                        @foreach ($jabatan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="appPassword">App Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="appPassword" class="form-control" name="app_password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="appPassword" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            Saya menyetujui
                            <a href="javascript:void(0);">privacy policy & terms</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
            </form>

            <p class="text-center">
                <span>Sudah punya akun?</span>
                <a href="{{ route('login') }}">
                    <span>Masuk</span>
                </a>
            </p>
        </div>
    </div>
    <!-- Register Card -->
@endsection
