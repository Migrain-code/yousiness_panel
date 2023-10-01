@extends('business.setup.layouts.master')
@section('links')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        #noOnlinePayment{
            display: none;
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
    @include('layouts.component.error')
    <div class="col-lg-4 col-md-12">
        <div class="on-board-wizard">
            <ul>
                <li>
                    <a href="#">
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
                    <a href="#">
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
                    <a href="{{route('business.setup.step3')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Adres Bilgileri</h6>
                            <p>İşletme Adres/Konum Bilgileri</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('business.setup.step4')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Paket Seçimi</h6>
                            <p>Hizmet Paketi Seçiniz.</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('business.setup.step4')}}">
                        <div class="onboarding-progress">
                            <span>5</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Ödeme İşlemi</h6>
                            <p>Paket Ödemesi Yapınız.</p>
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
                    <h2>Paketin Ödemesini Yapmanız Gerekmektedir?<span>*</span></h2>
                    <h6>Seçtiğiniz Pakete göre ödeme yaptıktan sonra tüm özelliklere erişim sağlayabileceksiniz.
                    </h6>
                </div>
                <div class="onboarding-content">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="selectType">Ödeme Türünü Seçiniz</label>
                                <select id="selectType" name="payment_type" class="form-control">
                                    <option value="1" selected>Online Ödeme</option>
                                    <option value="0">Havale / EFT</option>
                                </select>
                            </div>
                            <div id="onlinePayment">
                                <form method="post" id="step5Form" action="{{route('business.payment.payPal')}}">
                                    @csrf
                                    <!-- Müşteri Bilgileri -->
                                    <div class="form-group">
                                        <label for="name">Kart Sahibinin Adı</label>
                                        <input type="text" id="name" name="holder_name" value="{{old("name")}}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-posta</label>
                                        <input type="email" id="email" name="email" value="{{old("email")}}" class="form-control" required>
                                    </div>
                                    <!-- Kart Bilgileri -->
                                    <div class="form-group">
                                        <label for="card-number">Kredi Kartı Numarası</label>
                                        <input type="text" id="card-number" name="card_number" value="{{old("number")}}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="expiry">Son Kullanma Tarihi (MM/YY)</label>
                                        <input type="text" id="expiry" name="expiry" value="{{old("expiry")}}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cvc">CVC</label>
                                        <input type="text" id="cvc" name="cvc" value="{{old("cvc")}}" class="form-control" required>
                                    </div>
                                    <div class="onboarding-btn">
                                        <a onclick="$('#step5Form').submit()" href="#" style="color: white">Ödeme Yap</a>
                                    </div>
                                </form>
                            </div>
                            <div id="noOnlinePayment">
                                <form method="post" id="step5Form" action="{{route('business.payment.pay')}}">
                                    <div class="alert alert-warning">
                                        <i class="fa fa-info-circle"></i> <b>5646546546546546456564</b> nolu adrese <b>{{$package->price}} €</b> paket ödemesi yapıp dekontu buraya yüklemeniz gerekmektedir. Dekontunuz yükleyip gönderdikten sonra kontrol edilip onaylandıktan sonra erişiminiz açılacaktır
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Dekont</label>
                                        <input type="file" id="name" name="file" class="form-control" required>
                                    </div>
                                    <div class="onboarding-btn">
                                        <button type="submit" style="color: white">Ödeme Yap</button>
                                    </div>
                                </form>
                            </div>
                            <div id="paymentSummary" style="font-size: 18px">
                                <label>Ödenecek Tutar</label>
                                <span>{{$package->price}}€</span>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $('#card-number').mask("9999 9999 9999 9999");
            $('#expiry').mask("00/00");
            $('#cvc').mask("0000");

        });
        $('#selectType').on('change', function (){
            let sType= $(this).val();
            if(sType == "1"){
                $('#onlinePayment').css('display', 'block');
                $('#noOnlinePayment').css('display', 'none');
            }
            else{
                $('#onlinePayment').css('display', 'none');
                $('#noOnlinePayment').css('display', 'block');
            }
        })
    </script>

@endsection