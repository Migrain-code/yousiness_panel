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
        .form-control{
            border-radius: 12px;
            padding: 0px 20px;
            font-size: 14px;
            width: 100%;
            height: 55px;
            border: 0;
            outline: 0;
            font-weight: 500;
            font-size: 15px;
            color: #87888a;
            box-shadow: inset 0 0 0 1px #e5e5e5;
            transition: box-shadow 0.3s cubic-bezier(0.3, 0, 0, 0.3);
            color: var(--tp-common-black);
        }
    </style>

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
                            <h6>Wählen Sie ihre Salon Kategorie(n) aus</h6>
                            <p>Wir werden ihren Salon in Kategorien einteilen. Deshalb ist es wichtig, dass sie die entsprechende Salon Arten auswählen.
 </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Salon Details angeben</h6>
                            <p>Geben Sie die Informationen zu Ihrem Salon ein und stellen Sie sicher, dass Ihre Kunden Sie zu den richtigen Daten und Zeiten erreichen können.</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('business.setup.step3')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Standort Informationen angeben</h6>
                            <p>Damit Ihr Salon im System und im normalen Leben der Kunden leicht gefunden werden kann, geben Sie ihre Adressdaten vollständig an.</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('business.setup.step4')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Yousiness Paket Auswählen</h6>
                            <p>Wählen Sie das passende Paket aus, dass für Ihr System definiert werden soll. </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('business.setup.step4')}}">
                        <div class="onboarding-progress">
                            <span>5</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Zahlung ausführen</h6>
                            <p>Nehmen Sie die Zahlung vor und das entsprechende Paket wird für Ihr System definiert.</p>
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
                                    <a href="{{route('business.payment.stripe')}}">Kredi Kartı</a>
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
                                <form id="payment-form">
                                    <div id="card-element"><!-- Stripe.js injects the Card Element --></div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>

                                    <button id="submit-button">Ödeme Yap</button>
                                </form>
                                <script src="https://js.stripe.com/v3/"></script>
                            </div>
                            <div id="noOnlinePayment">
                                <form method="post" id="step5Form" action="{{--route('business.payment.pay')--}}">
                                    <div class="alert alert-warning">
                                        <i class="fa fa-info-circle"></i> <b>5646546546546546456564</b> nolu adrese <b>{{$package->price}} €</b> paket ödemesi yapıp dekontu buraya yüklemeniz gerekmektedir. Dekontunuz yükleyip gönderdikten sonra kontrol edilip onaylandıktan sonra erişiminiz açılacaktır
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Dekont</label>
                                        <input type="file" id="name" name="file" class="form-control" required>
                                    </div>
                                    <div class="onboarding-btn">
                                        <a type="submit" style="color: white">Ödeme Yap</a>
                                    </div>
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
    <script type="text/javascript">
        var stripe = Stripe('{{ config('services.stripe.key') }}');

        var elements = stripe.elements();
        var cardElement = elements.create('card');

        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            }).then(function(result) {
                if (result.error) {
                    // Hata durumunda kullanıcıya bildirin
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Ödeme işlemini gerçekleştirmek için ödeme intent oluşturun
                    var paymentIntentId = "{{ $paymentIntent->id }}";
                    var paymentMethodId = result.paymentMethod.id;

                    // Ödeme işlemini gerçekleştirmek için bir POST isteği yapın
                    fetch('/paket-odeme/stripe', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ paymentIntentId: paymentIntentId, paymentMethodId: paymentMethodId }),
                    }).then(function(response) {
                        return response.json();
                    }).then(function(response) {
                        if (response.success) {
                            // Ödeme başarılı, kullanıcıyı başarılı sayfasına yönlendirin
                            alert("ödeme başarılı");
                        } else {
                            alert("ödeme başarısız");
                        }
                    });
                }
            });
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


@endsection