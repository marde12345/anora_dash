@extends('layouts.home')

@section('main-content')
<p>Klik tombol untuk menemukan koordinat.</p>

<button onclick="getLocation()">Temukan saya</button>
<select onchange="getCity()" name="city" class="custom-select custom-select-sm border-0 shadow-sm ml-2" id="select2kota">
</select>

<p id="demo"></p>

<div id="mapid"></div>

<script>
    var current_pos = @json($widget['longlat']);

    var mymap = L.map('mapid').setView([current_pos[1], current_pos[0]], 10);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiYW5vcmFhbmFseXN0IiwiYSI6ImNrbDE1bDkxZTE2aG4ycHAwaDBtc2gyeTAifQ.SabAWKKFyWOaXzanmeWRaw'
    }).addTo(mymap);

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

    var users = @json($widget['st_users']);
    users.forEach(element => {
        var marker = L.marker([element.user.latitude, element.user.longitude]).addTo(mymap);
        var popupHtml = "<a target='_blank' href='" + element.link_profil + "'><b>" + element.user.name + "</b><br>" + element.level_statistisi + ".</a>";
        marker.bindPopup(popupHtml);
    });
    // console.log(users);

    var x = document.getElementById("demo");

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
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }

    function getCity() {
        var selectBox = document.getElementById("select2kota");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var url_redirect = "/browse_map?q=" + selectedValue;
        window.location.replace(url_redirect);

    }
</script>
@endsection