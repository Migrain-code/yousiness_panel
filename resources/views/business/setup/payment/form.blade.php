@extends('business.setup.layouts.master')
@section('links')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .btn:not(.btn-shadow):not(.shadow):not(.shadow-sm):not(.shadow-lg):not(.shadow-xs) {
            box-shadow: none;
        }
        .btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn.dropdown-toggle-split:first-child, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .btn-check:active+.btn.btn-active-success, .btn-check:checked+.btn.btn-active-success, .btn.btn-active-success.active, .btn.btn-active-success.show, .btn.btn-active-success:active:not(.btn-active), .btn.btn-active-success:focus:not(.btn-active), .btn.btn-active-success:hover:not(.btn-active), .show>.btn.btn-active-success {
            color: #ffffff;
            border-color: var(--bs-success);
            background-color: var(--bs-success)!important;
        }
        .btn.btn-outline:not(.btn-outline-dashed) {
            border: 1px solid var(--bs-gray-300);
        }
        .btn-group-vertical>.btn-check:checked+.btn, .btn-group-vertical>.btn-check:focus+.btn, .btn-group-vertical>.btn.active, .btn-group-vertical>.btn:active, .btn-group-vertical>.btn:focus, .btn-group-vertical>.btn:hover, .btn-group>.btn-check:checked+.btn, .btn-group>.btn-check:focus+.btn, .btn-group>.btn.active, .btn-group>.btn:active, .btn-group>.btn:focus, .btn-group>.btn:hover {
            z-index: 1;
        }
        .btn.btn-color-muted {
            color: #99a1b7;
        }
        .btn-group-vertical>.btn, .btn-group>.btn {
            position: relative;
            flex: 1 1 auto;
        }
        .btn-group>.btn-group:not(:first-child), .btn-group>:not(.btn-check:first-child)+.btn {
            margin-left: calc(1px * -1);
        }
        .btn-group>.btn-group:not(:first-child)>.btn, .btn-group>.btn:nth-child(n+3), .btn-group>:not(.btn-check)+.btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn.btn-color-muted {
            color: #99a1b7;
        }
        .btn-check {
            position: absolute;
            clip: rect(0,0,0,0);
            pointer-events: none;
        }
        button, input, optgroup, select, textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }
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
                            <!--begin::Heading-->
                            <div class="mb-3">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-5 fw-semibold">
                                    <span class="required">Ödeme Türünü Seçiniz</span>

                                </label>
                                <!--end::Label-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Radio group-->
                            <div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                <!--begin::Radio-->
                                <label class="btn btn-outline btn-color-muted btn-active-success active" data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="method" value="1"/>
                                    <!--end::Input-->
                                    Kredi Kartı
                                </label>
                                <!--end::Radio-->

                                <!--begin::Radio-->
                                <label class="btn btn-outline btn-color-muted btn-active-success" data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="method" checked="checked" value="2"/>
                                    <!--end::Input-->
                                    Paypal
                                </label>
                                <!--end::Radio-->

                                <!--begin::Radio-->
                                <label class="btn btn-outline btn-color-muted btn-active-success" data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="method" value="3" />
                                    <!--end::Input-->
                                    Havale
                                </label>
                                <!--end::Radio-->
                            </div>
                            <!--end::Radio group-->


                            <div id="onlinePayment">
                                <form method="post" id="step5Form" action="{{route('business.payment.pay')}}">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                    <!-- Müşteri Bilgileri -->

                                    <div class="onboarding-btn">
                                        <a onclick="$('#step5Form').submit()" href="#" style="color: white">Ödeme Yap</a>
                                    </div>
                                </form>
                            </div>
                            <div id="noOnlinePayment">
                                <form action="{{ route('business.payment.pay') }}" method="POST" id="payment-form">
                                    @csrf
                                    <div id="card-element">
                                        <!-- Stripe Payment Element burada oluşturulacak -->
                                    </div>

                                    <!-- Hata mesajlarını gösterecek bir bölüm -->
                                    <div id="card-errors" role="alert"></div>

                                    <button type="submit">Ödemeyi Yap</button>
                                </form>
                            </div>
                            <div id="paymentSummary" style="font-size: 18px;text-align: right;">
                                <label>Ödenecek Tutar</label>
                                <span>{{$package->price}}€</span>
                            </div>
                            <form style="display: none" id="payPalForm" method="post" action="{{route('business.payment.payPal')}}">
                                @csrf
                                <input type="hidden" name="package_id" value="{{$package->id}}">
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('#card-number').mask("9999 9999 9999 9999");
            $('#expiry').mask("00/00");
            $('#cvc').mask("0000");

        });

    </script>
    <script>/*ödeme seçenekleri butonları*/</script>
    <script>
        // Get all radio buttons and their labels
        const radioButtons = document.querySelectorAll('.btn-check');
        const labels = document.querySelectorAll('[data-kt-button]');

        // Add a click event listener to each radio button
        radioButtons.forEach((radioButton, index) => {
            radioButton.addEventListener('click', () => {
                // Remove "active" class from all labels
                labels.forEach(label => {
                    label.classList.remove('active');
                });
                if(radioButton.value == "1"){
                    $('#onlinePayment').css('display', 'block');
                    $('#noOnlinePayment').css('display', 'none');

                }
                if(radioButton.value == "2"){
                    Swal.fire({
                        title: 'Payment Method',
                        text: 'Do you want to proceed with this payment method?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Evet',
                        cancelButtonText: 'Hayır'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire('PayPal Ödeme Sayfasına Yönlendiriliyorsunuz!', '', 'success');
                            setInterval(function (){
                                $('#payPalForm').submit();
                            }, 2000)
                        }
                        else{
                            Swal.fire('PayPal İle Ödeme İptal Edildi!', '', 'info');
                        }
                    });
                }
                if(radioButton.value == "3"){
                    $('#noOnlinePayment').css('display', 'block');
                    $('#onlinePayment').css('display', 'none');
                }
                // Add "active" class to the clicked label
                labels[index].classList.add('active');
            });
        });
    </script>

    <script>/*stripe ödeme*/</script>

    <script>
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        var elements = stripe.elements();

        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Kredi kartı token'ı başarıyla oluşturuldu, bu token'ı sunucuya göndermek ve ödeme işlemi yapmak için kullanabilirsiniz
                    var token = result.token.id;
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token);
                    form.appendChild(hiddenInput);

                    // Formu sunucuya gönderin
                    form.submit();
                }
            });
        });
    </script>


@endsection