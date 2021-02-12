@extends('layouts.home')

@section('main-content')
<p>
    Silahkan aktifkan/ "Allow" notifikasi GPS. Untuk perangkat seperti laptop/komputer tidak akurat dalam menentukan lokasi.
</p>

<select onchange="getCity()" name="city" class="custom-select custom-select-sm border-0 shadow-sm ml-2" id="select2kota">
</select>

<p id="demo"></p>

<div id="mapid"></div>

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
@endsection