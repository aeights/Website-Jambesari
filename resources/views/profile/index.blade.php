@extends('layouts.dashboard')
@section('content')
<div class="col-12 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input value="{{ $profile->nama }}" class="form-control bg-transparent" type="text" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input value="{{ $profile->email }}" class="form-control bg-transparent" type="text" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input value="{{ $profile->telepon }}" class="form-control bg-transparent" type="text" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input value="{{ $profile->jabatan_id }}" class="form-control bg-transparent" type="text" readonly />
            </div>
        </div>
    </div>
</div>
@endsection