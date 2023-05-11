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
                            <h6>Yetkili  Bilgileri</h6>
                            <p>İşletme Yetkilisi Bilgileri</p>
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
                    <h2>Yetkili Nedir?<span>*</span></h2>
                    <h6>Yetkili işletmeyi yönetecek olan kişidir. İşletme yönetim paneline sadece yetkili kullanıcı erişim sağlayabilir..
                    </h6>
                </div>
                <div class="onboarding-content">
                    <form class="row" method="post" action="{{route('business.setup.step3Form')}}" id="step3Form">
                        @csrf
                        <div class="form-group col-lg-6">
                            <label>Yetkili İsim Soyisim</label>
                            <input type="text" class="form-control" name="owner" value="{{$business->owner}}" style="border-radius: 18px;height: 10px">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Yetkili Telefonu</label>
                            <input type="text" class="form-control" name="email" id="phone" value="{{$business->email}}" style="border-radius: 18px;height: 10px">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>E-posta Adresiniz</label>
                            <input type="email" class="form-control" name="owner_email" value="{{$business->owner_email}}" style="border-radius: 18px;height: 10px">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Şifreniz</label>
                                <input type="password" class="form-control" name="password" style="border-radius: 18px;height: 10px">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Şifreniz (Tekrar)</label>
                                <input type="password" class="form-control" name="password_confirmation" style="border-radius: 18px;height: 10px">
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Firma Yasal Adresi</label>
                            <textarea class="form-control" name="address" rows="6">{{$business->address}}</textarea>
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