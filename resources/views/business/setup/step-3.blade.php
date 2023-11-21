@extends('business.setup.layouts.master')
@section('content')
    @include('layouts.component.error')
    <style>
        #searchInput{
            position: absolute;
            left: 177px;
            top: 8px !important;
            width: 67%;
            height: 40px;
            border-radius: 15px;
            padding: 5px;
            border: 1px solid #600ee4;
            outline: 0px;
        }
    </style>
    <div class="col-lg-4 col-md-12">
        <div class="on-board-wizard">
            <ul>
                <li>
                    <a href="{{route('business.setup.step1')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Salon Kategorie</h6>
                            <p>Wählen Sie Ihre Salonkategorie(n) aus. </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('business.setup.step2')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Salon Details angeben</h6>
                            <p>Fügen Sie Ihre Salondetails hinzu.</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="onboarding-progress">
                            <span>3</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Adresse</h6>
                            <p>Salon Adresse/Standortinformationen</p>
                        </div>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="onboarding-content-box content-wrap">
            <div class="onborad-set">
                <div class="onboarding-title">
                    <h2>Salon Adresse<span>*</span></h2>
                    <h6>Adressinformationen sind erforderlich, damit Kunden Ihren Salon im System und im Alltag problemlos finden können.
                    </h6>
                </div>
                <div class="onboarding-content">
                    <form class="row" method="post" action="{{route('business.setup.step3Form')}}" id="step3Form">
                        @csrf
                        <div class="form-group col-lg-12">
                            <label>Wählen Sie den Standort der Salon aus</label>
                            <input type="hidden" name="latitude" id="latitude" value="{{$business->lat}}">
                            <input type="hidden" name="longitude" id="longitude" value="{{$business->longitude}}">


                            <!-- Harita Seçimi Alanı -->
                            <div id="map-container" style="position: relative;">
                                <input type="search" name="longitude" id="searchInput">
                                <div id="map" style="height: 400px;"></div>
                            </div>

                        </div>

                        <div class="form-group col-lg-12">
                            <label>Salon Adresse</label>
                            <textarea class="form-control" name="address" id="address" rows="6">{{$business->address}}</textarea>
                        </div>

                        <div class="form-group col-lg-12" style="display: none">
                            <label>Kartencode</label>
                            <textarea class="form-control read-content" name="embed" id="embed" readonly rows="6">{{$business->embed}}</textarea>
                        </div>

                        <div id="embedView"></div>
                    </form>
                </div>
            </div>

            <div class="onboarding-btn">
                <a href="#" onclick="$('#step3Form').submit()">Weitermachen</a>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        let map;
        let marker = null;

        function initAutocomplete() {
            // Harita başlatma kodu burada
            var businessLat = '{{$business->lat ?? "49.610307094885016"}}';
            var businessLong = '{{$business->longitude ?? "6.132590619068177"}}';
            if (isNaN(businessLat) || isNaN(businessLong)) {
                businessLat = 49.610307094885016; // Varsayılan enlem
                businessLong = 6.132590619068177; // Varsayılan boylam
            }
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: parseFloat(businessLat), lng: parseFloat(businessLong) },
                zoom: 12,
                mapTypeId: "roadmap",
            });

            // Harita üzerine tıklama olayı
            google.maps.event.addListener(map, 'click', function(event) {
                if (marker !== null) {
                    marker.setMap(null);
                }

                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();

                addEmbed(latitude, longitude);

                reverseGeocode(latitude, longitude);

                marker = new google.maps.Marker({
                    position: { lat: latitude, lng: longitude },
                    map: map,
                    title: 'Seçilen Konum'
                });

                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            });

            // Sayfa yüklendiğinde işletme konumu veya varsayılan konumu göster
            $(function () {
                marker = new google.maps.Marker({
                    position: { lat: parseFloat(businessLat), lng: parseFloat(businessLong) },
                    map: map,
                    title: 'Seçilen Konum'
                });
            });

            // Adres arama işlevselliği
            const input = document.getElementById("searchInput");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                if (marker !== null) {
                    marker.setMap(null);
                }

                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const latitude = place.geometry.location.lat();
                    const longitude = place.geometry.location.lng();
                    reverseGeocode(latitude, longitude);
                    marker = new google.maps.Marker({
                        map: map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });

                map.fitBounds(bounds);
            });
        }
        function addEmbed(latitude,longitude){
            var embedUrl = `https://www.google.com/maps/embed/v1/place?q=${latitude},${longitude}&key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U`;
            var embed = `<iframe width="350" height="350" frameborder="0" style="border:0;border-radius: 15px"
                    src="${embedUrl}" allowfullscreen></iframe>`
            $('#embed').text(embed);

            var embedView = document.getElementById('embedView');
            embedView.innerHTML = embed;
        }
        function reverseGeocode(latitude, longitude) {
            var geocodingUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U`;

            fetch(geocodingUrl)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.status === "OK") {
                        var selectedAddress = data.results[0].formatted_address;
                        $('#address').text(selectedAddress);
                    } else {
                        console.log("Adres alınamadı.");
                    }
                })
                .catch(error => {
                    console.log("Hata Adres Alınamadı");
                });
        }

        // Enter tuşunu engelleme işlemi
        document.getElementById("searchInput").addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                return false;
            }
        });
    </script>


@endsection