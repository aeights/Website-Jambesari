@extends('layouts.main')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid py-5 mb-5 page-header" src="{{ asset('assets/struktur.jpg') }}">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Informasi</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Halaman</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Informasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Informasi</h6>
                <h1 class="mb-5">Informasi Terkini Desa Jambesari</h1>
            </div>
            <div class="row g-4 justify-content-start">
                @foreach ($informasi as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" onclick="window.location.href = '{{ route('landing.detail-informasi',['id' => $item->id]) }}'">
                    <div class="course-item bg-light">
                        <div class="overflow-hidden" style="height: 300px">
                            <img class="img-fluid w-100 h-100" style="object-fit: cover" src="{{ $item->getFirstMediaUrl('informasi') }}" alt="">
                        </div>
                        <div class="text-center p-4 pb-1">
                            <h3 class="mb-0">{{ $item->judul }}</h3>
                            <h5 class="mb-4">{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y') }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection
