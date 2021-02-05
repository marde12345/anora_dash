@extends('layouts.home')

@section('main-content')
<section class="py-5 homepage-search-block position-relative" style="background: linear-gradient(to right, #63CDF6 0%, #1B1464 100%)">
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-7">
                <iframe type="text/html" width="100%" height="390" frameborder="0" src="https://www.youtube.com/embed/SmKTEVBKKqk?autoplay=1&amp;origin=http://example.com" style="margin-bottom:50px"></iframe>
            </div>
            <div class="col-lg-5" style="align-self: center">
                <div class="homepage-search-title">
                    <h1 class="mb-3 text-shadow text-gray-900 font-weight-bold" style="color:white;font-size:2.2rem;font-style:italic">"The goal is to turn data into information and information into insight"</h1>
                    <h6 class="mb-5 text-shadow text-gray-800 font-weight-normal" style="color:white;font-style:italic">- Former CEO HP</h6>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="homepage-search-title">
                    <h1 class="mb-3 text-shadow text-gray-900 font-weight-bold" style="color:white;font-size:2.2rem">Olah data Anda dalam sekali klik! </h1>
                    <h5 class="mb-5 text-shadow text-gray-800 font-weight-normal" style="color:white">Temukan statistisi sesuai kebutuhan Anda. Terdapat semua jenis jasa layanan statistika baik olah data, data entry, jasa pembuatan kuisioner, konsultasi statistik, dan sebagainya.</h5>
                </div>
                <div class="homepage-search-form">
                    <form class="form-noborder">
                        <div class="form-row">
                            <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                                <div class="location-dropdown"><i class="icofont-location-arrow"></i>
                                    <select class="custom-select form-control border-0 shadow-sm form-control-lg">
                                        <option> Semua </option>
                                        <option> Olah Data</option>
                                        <option> Data Entry</option>
                                        <option> Jasa Pembuatan Kuisioner</option>
                                        <option> Konsultasi Statistik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 form-group">
                                <input class="form-control border-0 form-control-lg shadow-sm" type="text" placeholder="Cari Statistisi atau Keahliannya..." />
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                <button class="btn btn-success btn-block btn-lg btn-gradient shadow-sm" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="popular"><span class="text-body-2" style="color:white">Populer</span>
                    <ul>
                        <li><a class="text-body-2" href="#" style="color:white">SPSS</a></li>
                        <li><a class="text-body-2" href="#" style="color:white">Python</a></li>
                        <li><a class="text-body-2" href="#" style="color:white">R</a></li>
                        <li><a class="text-body-2" href="#" style="color:white">Analisis Regresi</a></li>
                        <li><a class="text-body-2" href="#" style="color:white">Olah Data</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5"><img class="img-fluid" src="/home/images/landing/banner.svg" alt="" /></div>
        </div>
    </div>
</section>
<div class="container">
    <div class="about-section py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Solusi Data Anda dengan ANORA</h2>
                <ul>
                    <li><span> <img src="/home/images/landing/checkmark.svg" alt="" />Statistisi pilihan yang berpengalaman</span>Tersedia banyaknya pilihan statistisi yang berpengalaman, dan telah diverifikasi dengan baik oleh tim ANORA</li>
                    <li><span> <img src="/home/images/landing/checkmark.svg" alt="" />Layanan Revisi</span>Kami memastikan hasil yang anda terima adalah yang anda inginkan</li>
                    <li><span> <img src="/home/images/landing/checkmark.svg" alt="" />Layanan interpretasi data sepuasnya</span>Menyediakan fitur interpretasi dengan bebas & sepuasnya</li>
                    <li><span> <img src="/home/images/landing/checkmark.svg" alt="" />Hasil & kualitas terjamin</span>Hasil pekerjaan di validasi & verifikasi oleh tim ANORA untuk memastikan kami memberikan hasil yang berkualitas</li>
                    <li><span> <img src="/home/images/landing/checkmark.svg" alt="" />Harga terjangkau</span>Kami senantiasa menyesuaikan harga yang pas untuk anda, menyediakan fitur untuk bisa bernegosiasi dengan para Statistisi kami</li>
                </ul>
            </div>
            <div class="col-md-6"><img class="video-img w-100" src="/home/images/landing/video.svg" alt="" /></div>
        </div>
    </div>
</div>
<section class="py-5 bg-white">
    <div class="view_slider recommended">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Statisisi Terbaik</h3>
                    <div class="view recent-slider recommended-slider">
                        @foreach($widget['statistisi_terbaik'] as $statistisi_baik)
                        <div><a href="#"><img class="img-fluid" src="{{$statistisi_baik->st_user->photo_backcover}}" /></a>
                            <div class="inner-slider">
                                <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                        <span class="seller-image">
                                            <img class="img-fluid" src="{{$statistisi_baik->photo}}" alt="" />
                                        </span>
                                        <span class="seller-name">
                                            <a href="#">{{$statistisi_baik->name . " " . $statistisi_baik->last_name}}</a>
                                            <span class="level hint--top level-one-seller">Level {{$statistisi_baik->st_user->level}} Statistisi</span>
                                        </span>
                                    </div>
                                    <h3>{{$statistisi_baik->st_user->cover_letter}}</h3>
                                    <div class="content-info">
                                        <div class="rating-wrapper">
                                            <span class="gig-rating text-body-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1792 1792" width="15" height="15">
                                                    <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                </svg> 5.0<span>(7)</span>
                                            </span>
                                            @foreach ($statistisi_baik->st_user->tools as $tool)
                                            @switch($tool)
                                            @case('SPSS')
                                            <span class="badge badge-primary">SPSS</span>
                                            @break

                                            @case('R')
                                            <span class="badge badge-danger">R</span>
                                            @break

                                            @default
                                            <span class="badge badge-secondary">Python</span>
                                            @endswitch
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="footer"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div>
    <div class="get-started" style="background: linear-gradient(to right, #63CDF6 0%, #1B1464 100%)">
        <div class="content">
            <h2 class="text-white">Cari Statistisi untuk Pekerjaan Anda Sekarang</h2>
            <p class="text-white">Kami dapat membantu pengolahan data anda menjadi lebih berkualitas</p><a class="c-btn btn btn-success btn-lg btn-gradient shadow-sm" href="#">Mulai Sekarang</a>
        </div>
    </div>
</div>
@endsection