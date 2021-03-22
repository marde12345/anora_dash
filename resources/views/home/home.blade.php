@extends('layouts.home')

@section('main-content')
@if(auth()->user()->role == 'customer')
<section class="py-5 bg-white">
    <div class="container">
        <div class="col-md-12 mx-auto" style="text-align: center;">
            <h2>Buat pekerjaan, Cari Statistikan!</h2> <br>
            <a class="c-btn btn btn-success btn-lg btn-gradient shadow-sm pulse" href="{{route('job.create')}}">Buat Pekerjaan</a>
        </div>
    </div>
</section>
@endif

<section class="py-5 homepage-search-block position-relative" style="background: linear-gradient(to right, #63CDF6 0%, #1B1464 100%)">
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6">
                <lottie-player onclick="getLocation()" class="mx-auto" src="https://assets6.lottiefiles.com/packages/lf20_P4v6nZ.json" mode="bounce" background="transparent" speed="0.8" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            </div>
            <div class="col-lg-6" style="margin: auto;">
                <div class="homepage-search-title">
                    <h1 class="mb-3 text-shadow text-gray-900 font-weight-bold" style="color:white;font-size:2.2rem;">Cobain fitur lokasi kami!!!</h1>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <button class="btn btn-danger btn-block btn-lg btn-gradient shadow-sm" onclick="getLocation()" id="browse_map" style="font-size: 20px; padding: .8em 1em; border: 2px solid #FFF; border-radius: 10px; overflow: hidden; transform: translate3d(0, 0, 0);">
                                <span class="wave"></span><i class="fa fa-map"></i> Terdekat</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-lg-7">
                <div class="homepage-search-title">
                    <h1 class="mb-3 text-shadow text-gray-900 font-weight-bold" style="color:white;font-size:2.2rem">Olah data Anda dalam sekali klik! </h1>
                    <h5 class="mb-5 text-shadow text-gray-800 font-weight-normal" style="color:white">Temukan statistisi sesuai kebutuhan Anda. Terdapat semua jenis jasa layanan statistika baik olah data, data entry, jasa pembuatan kuisioner, konsultasi statistik, dan sebagainya.</h5>
                </div>
                <div class="homepage-search-form">
                    {{Form::open(['method' => 'GET', 'route' => ['root.browse']])}}
                    <div class="form-row">
                        <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                            <div class="location-dropdown"><i class="icofont-location-arrow"></i>
                                <select name=services class="custom-select form-control border-0 shadow-sm form-control-lg">
                                    <option value="all"> Semua </option>
                                    <option value="service1"> Analisis Regresi</option>
                                    <option value="service2"> Olah Data</option>
                                    <option value="service3"> Data Entry</option>
                                    <option value="service4"> Jasa Pembuatan Kuisioner</option>
                                    <option value="service5"> Konsultasi Statistik</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 form-group">
                            <input class="form-control border-0 form-control-lg shadow-sm" type="text" name="q" placeholder="Cari Statistisi atau Keahliannya..." />
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                            <button class="btn btn-primary btn-block btn-lg btn-gradient shadow-sm" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
                <div class="popular"><span class="text-body-2" style="color:white">Populer</span>
                    <ul>
                        <li><a class="text-body-2" href="{{route('root.browse',['isSpss'=>'on'])}}" style="color:white">SPSS</a></li>
                        <li><a class="text-body-2" href="{{route('root.browse',['isPython'=>'on'])}}" style="color:white">Python</a></li>
                        <li><a class="text-body-2" href="{{route('root.browse',['isR'=>'on'])}}" style="color:white">R</a></li>
                        <li><a class="text-body-2" href="{{route('root.browse',['isService1'=>'on'])}}" style="color:white">Analisis Regresi</a></li>
                        <li><a class="text-body-2" href="{{route('root.browse',['isService2'=>'on'])}}" style="color:white">Olah Data</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- <img class="img-fluid" src="/home/images/landing/banner.svg" alt="" /> -->
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_7smeegra.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay style="text-align: -webkit-center;"></lottie-player>
            </div>
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
                        @foreach($widget['statistisi_terbaik']->data as $statistisi)
                        <div class="col-md-12">
                            <a href="{{route('root.statistisi',['name_code'=>$statistisi->st_user_namecode])}}">
                                <img class="img-fluid" src="{{$statistisi->photo_backcover}}" />
                            </a>
                            <div class="inner-slider">
                                <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                        <span class="seller-image">
                                            <img class="img-fluid" src="{{$statistisi->user->photo}}" alt="" />
                                        </span>
                                        <span class="seller-name">
                                            <a href="{{route('root.statistisi',['name_code'=>$statistisi->st_user_namecode])}}">{{$statistisi->user->name . " " . $statistisi->user->last_name}}</a>
                                            <span class="level hint--top level-one-seller">Level {{$statistisi->level}} Statistisi</span>
                                        </span>
                                    </div>
                                    <h3>{{$statistisi->cover_letter}}</h3>
                                    <div class="content-info">
                                        <div class="rating-wrapper" style="text-align: center;">
                                            @foreach ($statistisi->services as $service)
                                            @switch($service)
                                            @case('Analisis Regresi')
                                            <br>
                                            <button class="badge badge-primary">Analisis Regresi</button>
                                            @break

                                            @case('Olah Data')
                                            <br>
                                            <button class="badge badge-danger">Olah Data</button>
                                            @break

                                            @case('Data Entry')
                                            <br>
                                            <button class="badge badge-secondary">Data Entry</button>
                                            @break

                                            @case('Pembuatan Kuisioner')
                                            <br>
                                            <button class="badge badge-success">Jasa Pembuatan Kuisioner</button>
                                            @break

                                            @case('Konsultasi Statistik')
                                            <br>
                                            <button class="badge badge-info">Konsultasi Statistik</button>
                                            @break

                                            @endswitch
                                            @endforeach
                                            <span class="gig-rating text-body-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1792 1792" width="15" height="15">
                                                    <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                </svg> 5.0<span>(7)</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        @foreach ($statistisi->tools as $tool)
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
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
        </div>
        <div class="content">
            <h2 class="text-white">Cari Statistisi untuk Pekerjaan Anda Sekarang</h2>
            <p class="text-white">Kami dapat membantu pengolahan data anda menjadi lebih berkualitas</p><a class="c-btn btn btn-primary btn-lg btn-gradient shadow-sm" href="{{route('root.browse')}}">Mulai Sekarang</a>
        </div>
    </div>
</section>
<!-- <div>
    <div class="get-started" style="background: linear-gradient(to right, #63CDF6 0%, #1B1464 100%)">
        <div class="content">
            <h2 class="text-white">Cari Statistisi untuk Pekerjaan Anda Sekarang</h2>
            <p class="text-white">Kami dapat membantu pengolahan data anda menjadi lebih berkualitas</p><a class="c-btn btn btn-success btn-lg btn-gradient shadow-sm" href="{{route('root.browse')}}">Mulai Sekarang</a>
        </div>
    </div>
</div> -->
<script>
    var x = document.getElementById("browse_map");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var url_redirect = "/browse_map?lng=" + position.coords.longitude + "&lat=" + position.coords.latitude;
        window.location.replace(url_redirect);
        // x.innerHTML = "Latitude: " + position.coords.latitude +
        //     "<br>Longitude: " + position.coords.longitude;
    }
</script>
@endsection