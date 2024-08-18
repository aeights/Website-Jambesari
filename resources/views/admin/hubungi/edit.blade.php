@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('informasi.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4">Edit Informasi</h5>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-floating mb-3">
                        <input name="judul" type="text" value="{{ $data->judul }}" class="form-control" id="floatingInput" placeholder="Judul Informasi"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Judul</label>
                        <div id="floatingInputHelp" class="form-text">
                            Masukkan judul.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <div class="mb-3">
                            <img style="width: 10%" src="{{ $data->getFirstMediaUrl('informasi') }}" alt="{{ $data->getFirstMediaUrl('informasi') }}">
                        </div>
                        <input name="gambar" class="form-control" type="file" id="formFile" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea" class="form-label">Isi</label>
                        <textarea name="isi" class="form-control" id="isiInformasi" rows="2">{{ $data->isi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#isiInformasi').summernote({
            placeholder: 'Masukkan isi...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush