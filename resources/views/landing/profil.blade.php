@extends('layouts.main')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid py-5 mb-5 page-header" src="{{ asset('assets/struktur.jpg') }}"">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Profil Desa Jambesari</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Halaman</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Visi Misi Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">VISI & MISI</h6>
            </div>
        </div>
    </div>
     
    <div class="container-xxl mb-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="text-center mb-4">VISI</h1>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-13">
                            <h3 class="mb-0"><i class="fa text-primary me-2"></i>" Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                            eos. Clita erat ipsum et lorem et sit."</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="text-center mb-4">MISI</h1>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <h5 class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</h5>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</h5>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate
                            </h5>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</h5>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</h5>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assets/struktur.jpg') }}" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Pemerintahan</h6>
                    <h1 class="mb-4">Struktur Organisasi dan Tata Kerja</h1>
                    <p class="mb-4 text-justify">Struktur organisasi dan tata kerja Desa Jambesari dirancang untuk memastikan pelayanan publik yang efektif dan transparan. Kepala Desa memimpin dengan didukung oleh perangkat desa yang terdiri dari Sekretaris Desa, Kepala Urusan, dan Kepala Seksi, yang masing-masing memiliki tanggung jawab khusus dalam administrasi, pembangunan, kemasyarakatan, dan pelayanan umum. Selain itu, Badan Permusyawaratan Desa (BPD) berperan sebagai lembaga legislatif desa yang memberikan masukan dan pengawasan terhadap kebijakan desa. Seluruh perangkat desa bekerja sama dalam mewujudkan tata kelola yang partisipatif dan berorientasi pada kebutuhan warga.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Perangkat Desa</h6>
                <h1 class="mb-5">Nama dan Jabatan</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light ">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p maltup.jpg') }}" alt="" style="object-fit: cover;">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Maltup Al Hidayah, SH, S.Pd, MM</h5>
                            <p>Kepala Desa</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p farid.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Farid</h5>
                            <p>Ketua BPD</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p hawapi.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Hawapi</h5>
                            <p>Sekretaris Desa</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p subhan.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Subhan Al Amin</h5>
                            <p>Kasi Pemerintahan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4" style="margin-top: 16px;">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p istikhori.png') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Istikhori</h5>
                            <p>Kasi Kesejahteraan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p ali yatsur.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Ali Yatsur</h5>
                            <p>Kasi Pelayanan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/profile-pic.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Habibullah</h5>
                            <p>Kaur TU dan Umum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p lutfi.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Lutfi</h5>
                            <p>Kaur Keuangan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4" style="margin-top: 16px;">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p rudi.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Rudi Hartono</h5>
                            <p>Kaur Perencanaan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p aziz.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Abd. Aziz</h5>
                            <p>Kasun Krajan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p habibi.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Habibi</h5>
                            <p>Kasun Gabugan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p mahrus.png') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;"> 
                            <h5 class="mb-0">M. Mahrus</h5>
                            <p>Kasun Karang Malang</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4" style="margin-top: 16px;">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p fatlullah.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Fatlula</h5>
                            <p>Kasun Beddian</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="width: 300px; height: 300px; position: relative;">
                            <img class="img-fluid w-100% h-100%" src="{{ asset('assets/p fauzan.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4" style="margin-top: 8px;">
                            <h5 class="mb-0">Moh. Fauzan, S.Pd</h5>
                            <p>Kasun Angsanah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
