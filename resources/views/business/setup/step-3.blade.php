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
                            <label>Firma Konumunu Seçiniz</label>
                            <input type="hidden" name="latitude" id="latitude" value="">
                            <input type="hidden" name="longitude" id="longitude" value="">

                            <!-- Harita Seçimi Alanı -->
                            <div id="map" style="height: 400px;"></div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Firma Yasal Adresi</label>
                            <textarea class="form-control" name="address" rows="6">{{$business->address}}</textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Firma Harita Kodu</label>
                            <textarea class="form-control" name="embed" rows="6">{{$business->embed}}</textarea>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <script>
        // Harita başlatma ve kullanıcı tıklamasını işleme
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 41.2911293, lng: 28.00361},
                zoom: 12 ,
            });

            // Kullanıcı tıkladığında, tıklanan konumu al ve form alanlarına doldur
            map.addListener('click', function(event) {
                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();

                // Form alanlarına değerleri doldur
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            });
        }
    </script>

@endsection