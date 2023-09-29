@extends('business.setup.layouts.master')
@section('content')
    @include('layouts.component.error')
    <div class="col-lg-4 col-md-12">
        <div class="on-board-wizard">
            <ul>
                <li>
                    <a href="{{route('business.setup.step1')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>İşletme Türü</h6>
                            <p>İşletme Türnüzü Seçiniz. </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('business.setup.step2')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>İşletme Bilgileri</h6>
                            <p>İşletme Bilgilerini Giriniz.</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="onboarding-progress">
                            <span>3</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Adres Bilgileri</h6>
                            <p>İşletme Adres/Konum Bilgileri</p>
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
                    <h2>Adres Bilgileri?<span>*</span></h2>
                    <h6>İşletmenizi sistemde ve müşteriler normal hayatlarında kolay bulabilmeleri için 3 türde de adres bilgisi istenmektedir.
                    </h6>
                </div>
                <div class="onboarding-content">
                    <form class="row" method="post" action="{{route('business.setup.step3Form')}}" id="step3Form">
                        @csrf
                        <div class="form-group col-lg-12">
                            <label>İşletme Konumunu Seçiniz</label>
                            <input type="hidden" name="latitude" id="latitude" value="{{$business->lat}}">
                            <input type="hidden" name="longitude" id="longitude" value="{{$business->longitude}}">

                            <!-- Harita Seçimi Alanı -->
                            <div id="map" style="height: 400px;"></div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>İşletme Adresi</label>
                            <textarea class="form-control" name="address" id="address" rows="6">{{$business->address}}</textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Harita Kodu</label>
                            <textarea class="form-control read-content" name="embed" id="embed" readonly rows="6">{{$business->embed}}</textarea>
                        </div>
                    </form>
                </div>
            </div>

            <div class="onboarding-btn">
                <a href="#" onclick="$('#step3Form').submit()">Devam Et</a>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBULjUUqZ_u9PvAB34VdcbWBmioSpOuQFI&callback=initMap" async defer></script>

    <script>

        var marker = null;
        function initMap() {
            var businessLat = '{{$business->lat ?? "49.610307094885016"}}';
            var businessLong = '{{$business->longitude ?? "6.132590619068177"}}';
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: parseFloat(businessLat), lng: parseFloat(businessLong)},
                zoom: 12 ,
            });

            google.maps.event.addListener(map, 'click', function(event) {

                if (marker !== null) {
                    marker.setMap(null);
                }

                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();
                console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);
                var embedUrl = `https://www.google.com/maps/embed/v1/place?q=${latitude},${longitude}&key=AIzaSyBULjUUqZ_u9PvAB34VdcbWBmioSpOuQFI`;
                var embed = `<iframe width="600" height="450" frameborder="0" style="border:0"
                    src="${embedUrl}" allowfullscreen></iframe>`

                reverseGeocode(latitude, longitude);

                marker = new google.maps.Marker({
                    position: {lat: latitude, lng: longitude}, // Marker'ın konumu
                    map: map, // Hangi haritada gösterileceği
                    title: 'Seçilen Konum' // Marker üzerine gelindiğinde gösterilecek başlık
                });
                $('#embed').text(embed);

                // Form alanlarına değerleri doldur
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            });
            $(function (){
                marker = new google.maps.Marker({
                    position: {lat: parseFloat(businessLat), lng: parseFloat(businessLong)}, // Marker'ın konumu
                    map: map, // Hangi haritada gösterileceği
                    title: 'Seçilen Konum' // Marker üzerine gelindiğinde gösterilecek başlık
                });
            })
        }
        function reverseGeocode(latitude, longitude) {
            var geocodingUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${'AIzaSyBULjUUqZ_u9PvAB34VdcbWBmioSpOuQFI'}`;

            // Geocoding API'ye istek gönder
            fetch(geocodingUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.status === "OK") {
                        var selectedAddress = data.results[0].formatted_address;
                        $('#address').text(selectedAddress);
                       
                    } else {
                        alert("Adres alınamadı.");
                    }
                })
                .catch(error => {
                    alert("Hata Adres Alınamadı");
                });
        }
    </script>

@endsection