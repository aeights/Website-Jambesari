@extends('layouts.main')
@section('content')
   <!-- Contact Start -->
   <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Kontak</h6>
            <h1 class="mb-5">Hubungi Perangkat Desa Melalui:</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Hubungi Kami</h5>
                <!-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Kantor</h5>
                        <p class="mb-0">Dusun Krajan, Desa Jambesari, Jambesari D.S, Bondowoso</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Telepon</h5>
                        <p class="mb-0">+012 345 67890</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">pemdesjambesari@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.191042007242!2d113.83816847319838!3d-7.979195979550727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6c3bf0b33c58d%3A0x1c4e87a1410ecb37!2sKantor%20Desa%20Jambesari!5e0!3m2!1sid!2sid!4v1722001592502!5m2!1sid!2sid"
                    frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="{{ route('hubungi.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="nama" type="text" class="form-control" id="name" placeholder="Masukkan nama anda">
                                <label for="name">Nama Anda</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="email" type="email" class="form-control" id="email" placeholder="Masukkan email anda">
                                <label for="email">Email Anda</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input name="subjek" type="text" class="form-control" id="subject" placeholder="Subjek pesan">
                                <label for="subject">Subjek</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea name="pesan" class="form-control" placeholder="Tulis pesan disini" id="message" style="height: 150px"></textarea>
                                <label for="message">Tulis Pesan</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
