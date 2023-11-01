@extends('business.setup.layouts.master')
@section('links')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <style>

        .swiper-container {
            width: 100%;
            overflow: hidden;
        }

        .swiper-wrapper {
            display: flex;
            flex-wrap: nowrap;
        }

        .swiper-slide {
            flex-shrink: 0;
        }

        .swiper-buttons {
            position: absolute;
            top: 3px;
            right: 30px;
        }

        .swiper-button-next {
            background-color: #0000ff;
            color: #ffffff;
            font-size: 20px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-shadow: none;
            top: 0px;
            right: 0px;
            margin-top: 0;
            cursor: pointer;
            border: 0;
            margin-bottom: 0px;
        }

        .swiper-button-prev {
            background-color: #0000ff;
            color: #ffffff;
            font-size: 20px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-shadow: none;
            top: 0px;
            margin-top: 0;
            cursor: pointer;
            border: 0;
            margin-bottom: 0px;

        }

    </style>
    <script async src="https://js.stripe.com/v3/pricing-table.js"></script>

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
                            <h6>Salon Kategorie</h6>
                            <p>Wählen Sie Ihre Salonkategorie(n) aus. </p>
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
                            <p>Fügen Sie Ihre Salondetails hinzu.</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('business.setup.step3')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Adresse</h6>
                            <p>Hallenadresse/Standortinformationen</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('business.setup.step4')}}">
                        <div class="onboarding-progress">
                            <span>4</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Bezahlvorgang</h6>
                            <p>Wählen Sie Servicepaket.</p>
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
                    <h2>Warum entscheiden Sie sich für ein Paket?<span>*</span></h2>
                    <h6>Sie können auf die Funktionen entsprechend dem von Ihnen gewählten Paket zugreifen.<br>
                        Sie können Pakete anzeigen, indem Sie nach links und rechts wischen
                    </h6>
                </div>
                <div class="onboarding-content">
                    <stripe-pricing-table pricing-table-id="prctbl_1O7dUDIHb2EidFuB1zaJfBct"
                                          publishable-key="pk_test_51NvSDhIHb2EidFuB3LbbZHqZbywNWZbvQNsyDop4mHT1OzxOpax5uotEqlToQKrawEAJMH5OXa4JR1FrE3OBD7cC00KngyS4JA">
                    </stripe-pricing-table>
                </div>
            </div>
            <div class="onboarding-btn">
                <a onclick="$('#step4Form').submit()" href="#">Weitermachen</a>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 1000,
                disableOnInteraction: true,
            },

        });

    </script>
    <script>
        // JavaScript kullanarak "Daha Fazla" butonunu tıkladığınızda diğer özellikleri göster
        $('.show-more-button').on("click", function () {

            if (this.innerText == "Daha Fazla") {
                const hiddenProps = document.querySelectorAll(".hidden-props");
                hiddenProps.forEach(function (hiddenProp) {
                    hiddenProp.style.display = "block";
                });
                this.innerText = "Daha Az"; // "Daha Fazla" butonunu gizle
            } else {
                const hiddenProps = document.querySelectorAll(".hidden-props");
                hiddenProps.forEach(function (hiddenProp) {
                    hiddenProp.style.display = "none";
                });
                this.innerText = "Daha Fazla"; // "Daha Fazla" butonunu gizle
            }

        });
    </script>

@endsection