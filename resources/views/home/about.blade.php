@extends('layouts.home')

@section('main-content')
<section class="section-padding bg-dark py-5 inner-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mt-0 mb-3 text-white">Tentang Kami</h1>
                <div class="breadcrumbs">
                    <p class="mb-0 text-white"><a class="text-white" href="#">Beranda</a> / <span class="text-success">Tentang Kami</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <h3 class="mt-1 mb-4">Lokasi Kami</h3>
                <h6 class="text-dark"><i class="mdi mdi-home-map-marker"></i> Alamat :</h6>
                <p>86 Petersham town, New South wales Waedll Steet, Australia PA 6550</p>
                <h6 class="text-dark"><i class="mdi mdi-phone"></i> No Telepon :</h6>
                <p>+91 12345-67890, (+91) 123 456 7890</p>
                <h6 class="text-dark"><i class="mdi mdi-deskphone"></i> No Handphone :</h6>
                <p>(+20) 220 145 6589, +91 12345-67890</p>
                <h6 class="text-dark"><i class="mdi mdi-email"></i> Email :</h6>
                <p>yoursite@gmail.com, info@gmail.com</p>
                <h6 class="text-dark"><i class="mdi mdi-link"></i> Website :</h6>
                <p>www.Webartinfo.com</p>
                <div class="footer-social mb-4"><span>Follow : </span><a href="#"><i class="mdi mdi-facebook"></i></a><a href="#"><i class="mdi mdi-twitter"></i></a><a href="#"><i class="mdi mdi-instagram"></i></a><a href="#"><i class="mdi mdi-google"></i></a></div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="map" id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
                            <a href="https://1map.com/map-embed">1 Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 section-title text-left mb-4">
                <h2>Hubungi Kami</h2>
            </div>
            <form class="col-lg-12 col-md-12" name="sentMessage">
                <div class="row">
                    <div class="control-group form-group col-lg-4 col-md-4">
                        <div class="controls">
                            <label>Nama Anda<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" required="" />
                        </div>
                    </div>
                    <div class="control-group form-group col-lg-4 col-md-4">
                        <div class="controls">
                            <label>Alamat Email<span class="text-danger">*</span></label>
                            <input class="form-control" type="email" required="" />
                        </div>
                    </div>
                    <div class="control-group form-group col-lg-4 col-md-4">
                        <div class="controls">
                            <label>No Telepon<span class="text-danger">*</span></label>
                            <input class="form-control" type="email" required="" />
                        </div>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Pesan<span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="10" cols="100"></textarea>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Kirim Pesan</button>
            </form>
        </div>
    </div>
</section>
<script>
    (function() {
        var setting = {
            "height": 450,
            "width": 803,
            "zoom": 15,
            "queryString": "Candás, Spain",
            "place_id": "ChIJuXoxw-aANg0RZ1DUQHMSFTM",
            "satellite": false,
            "centerCoord": [43.59051127662882, -5.768219799999998],
            "cid": "0x3315127340d45067",
            "lang": "en",
            "cityUrl": "/spain/candas-8349",
            "cityAnchorText": "Map of Candas, Asturias, Spain",
            "id": "map-9cd199b9cc5410cd3b1ad21cab2e54d3",
            "embed_id": "215844"
        };
        var d = document;
        var s = d.createElement('script');
        s.src = 'https://1map.com/js/script-for-user.js?embed_id=215844';
        s.async = true;
        s.onload = function(e) {
            window.OneMap.initMap(setting)
        };
        var to = d.getElementsByTagName('script')[0];
        to.parentNode.insertBefore(s, to);
    })();
</script>
@endsection