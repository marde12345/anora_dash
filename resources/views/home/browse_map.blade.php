@extends('layouts.home')

@section('main-content')
<section class="py-5 bg-dark inner-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mt-0 mb-3 text-white">Telusuri Peta Statistisi</h1>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Silahkan aktifkan/ "Allow" notifikasi GPS. Untuk perangkat seperti laptop/komputer tidak akurat dalam menentukan lokasi.
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <select onchange="getCity()" name="city" class="custom-select custom-select-sm border-0 shadow-sm ml-2" id="select2kota">
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <button class="btn btn-danger btn-block btn-lg btn-gradient shadow-sm" onclick="getLocation()" id="browse_map"><i class="fa fa-map"></i> Temukan saya!</button>
            </div>
        </div>
        <div id="mapid"></div>
    </div>
</section>
<section class="py-5 p-list-two">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12 view_slider recommended">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Jasa Olah Data</h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($widget['st_users'] as $statistisi)
                        <div class="col-md-4">
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
<script>
    var current_longlat = @json($widget['current_longlat']);
    var current_pos = current_longlat[0];
    var is_default_longlat = current_longlat[1];
    var mymap = L.map('mapid').setView([current_pos[1], current_pos[0]], 8);


    if (!is_default_longlat) {
        var circle = L.circle([current_pos[1], current_pos[0]], {
            color: 'green',
            fillColor: '#f03',
            fillOpacity: 0.2,
            radius: 40000
        }).addTo(mymap);
        var circle_current_pos = L.circle([current_pos[1], current_pos[0]], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(mymap);
        circle_current_pos.bindPopup("<b>Anda disini!</b>").openPopup();
    }

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/satellite-streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiYW5vcmFhbmFseXN0IiwiYSI6ImNrbDE1bDkxZTE2aG4ycHAwaDBtc2gyeTAifQ.SabAWKKFyWOaXzanmeWRaw'
    }).addTo(mymap);

    var users = @json($widget['st_users']);
    users.forEach(element => {
        var marker = L.marker([element.user.latitude, element.user.longitude]).addTo(mymap);
        var popupHtml = "<a target='_blank' href='" + element.link_profil + "'><b>" + element.user.name + "</b><br>" + element.level_statistisi + ".</a>";
        marker.bindPopup(popupHtml);
    });
    // console.log(users);

    function getCity() {
        var selectBox = document.getElementById("select2kota");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var url_redirect = "/browse_map?q=" + selectedValue;
        window.location.replace(url_redirect);

    }
</script>
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