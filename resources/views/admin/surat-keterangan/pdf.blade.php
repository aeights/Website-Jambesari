<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Keterangan</title>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('template/admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template/admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template/admin/assets/css/demo.css') }}" />
</head>
<body style="background-color: transparent">
    <div id="suratKeterangan" class="" style="font-family: Times New Roman, sans-serif;width: 21cm; color: black">
        <div id="kopSurat">
            <div class="d-flex flex-row justify-content-center align-items-center gap-5 pt-1">
                <img src="{{ asset('assets/logo-bondowoso.png') }}"
                    alt="logo-bondowoso"
                    style="width: 1in">
                <div class="text-center" style="line-height: 8pt">
                    <p style="font-size: 16pt">PEMERINTAH KABUPATEN BONDOWOSO</p>
                    <p style="font-size: 16pt">KECAMATAN JAMBESARI DARUS SHOLAH</p>
                    <p style="font-size: 16pt">DESA JAMBESARI</p>
                    <p style="font-size: 14pt; font-style: italic">Jl. KH. Abdurrahman Wahid No.01 Jambesari - Jambesari Darus Sholah</p>
                </div>
            </div>
            <p class="text-end">KodePos : 68263</p>
        </div>
        <hr style="border: 1px solid black">
        <div id="judulSurat" class="text-center" style="line-height: 4pt; margin-bottom: 2cm">
            <p class="text-decoration-underline" style="font-size: 16pt">SURAT KETERANGAN</p>
            <p class="" style="font-size: 12pt">NOMOR: {{ $nomor_surat }}</p>
        </div>
    
        <div id="yangBertandaTangan" class="" style="font-size: 14pt">
            <p>Yang bertandatangan dibawah ini:</p>
            <div class="" style="padding-left: 10%; padding-right: 10%">
                <div class="d-flex">
                    <p class="position-absolute">Nama</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>Maltup Al Hidayah S.H. S.Pd. MM.</p>
                </div>
                <div class="d-flex">
                    <p class="position-absolute">Jabatan</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>Kepala Desa Jambesari Kecamatan Jambesari Darus Sholah Kabupaten Bondowoso</p>
                </div>
            </div>
        </div>
    
        <div id="keterangan" style="font-size: 14pt; margin-bottom: 2cm">
            <p class="text-start">Menerangkan dengan sebenarnya bahwa:</p>
            <div class="" style="padding-left: 10%; padding-right: 10%">
                <div class="d-flex">
                    <p class="position-absolute">Nama</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>{{ $nama }}</p>
                </div>
                <div class="d-flex">
                    <p class="position-absolute">Jenis Kelamin</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>{{ $jenis_kelamin }}</p>
                </div>
                <div class="d-flex">
                    <p class="position-absolute">Tempat/Tanggal Lahir</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>{{ $ttl }}</p>
                </div>
                <div class="d-flex">
                    <p class="position-absolute">Kewarganegaraan</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>WNI</p>
                </div>
                <div class="d-flex">
                    <p class="position-absolute">Agama</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>{{ $agama }}</p>
                </div>
                <div class="d-flex">
                    <p class="position-absolute">NIK</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>{{ $nik }}</p>
                </div>
                <div class="d-flex">
                    <p class="position-absolute">Alamat</p>
                    <p style="margin-left: 30%">:&nbsp;</p>
                    <p>{{ $alamat }} Desa Jambesari, Kecamatan Jambesari Darus Sholah, Kabupaten Bondowoso</p>
                </div>
            </div>
            <p style="text-indent: 10%; font-size: 14pt; text-align: justify">{{ $keterangan }}</p>
            <p style="text-indent: 10%; font-size: 14pt">Demikian surat keterangan ini di buat untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="d-flex flex-column align-items-end">
            <div id="tandaTangan" class="text-center" style="line-height: 8pt">
                <p style="font-size: 14pt">Jambesari, {{ $tanggal }}</p>
                <p style="font-size: 14pt; margin-bottom: 3cm">Kepala Desa Jambesari</p>
                <p class="text-decoration-underline" style="font-size: 14pt">Maltup Al Hidayah S.H. S.Pd. MM.</p>
            </div>
        </div>
    </div>
</body>
</html>
{{-- @extends('layouts.dashboard')
@section('content') --}}

{{-- <button type="button" class="btn-primary" id="buttonPrintPdf">Coba</button>
<a href="{{ route('surat-keterangan.generate') }}">Check</a>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            console.log('jquery oke');
            $('#buttonPrintPdf').click(function() {
                const suratKeterangan = $('#suratKeterangan').html();
                console.log(suratKeterangan);

                $.ajax({
                    url: '{{ route('surat-keterangan.generate') }}',
                    type: 'POST',
                    data: {
                        surat: suratKeterangan,
                        _token: '{{ csrf_token() }}' // Pastikan Anda mengirim token CSRF untuk keamanan
                    },
                    success: function(result) {
                        console.log('berhasil');
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal menghapus:', error);
                    }
                });
            });
        });
    </script>
@endpush --}}