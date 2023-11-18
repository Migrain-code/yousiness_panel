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
        .on-board-wizard ul {
             list-style: none;
             padding: 0px;
             display: flex;
             margin: 5px;
         }
    </style>
@endsection
@section('content')
    @include('layouts.component.error')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="on-board-wizard">
                <ul>
                    <li style="padding: 5px">
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

                    <li style="padding: 5px">
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

                    <li style="padding: 5px">
                        <a href="{{route('business.setup.step3')}}">
                            <div class="onboarding-progress active">
                                <span><i class="fa fa-check-circle"></i></span>
                            </div>
                            <div class="onboarding-list">
                                <h6>Adresse</h6>
                                <p>Salon Adresse/Standortinformationen</p>
                            </div>
                        </a>
                    </li>

                    <li style="padding: 5px">
                        <a href="{{route('business.setup.step4')}}">
                            <div class="onboarding-progress">
                                <span>4</span>
                            </div>
                            <div class="onboarding-list">
                                <h6>Paketauswahl</h6>
                                <p>Wählen Sie Servicepaket.</p>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="onboarding-content-box content-wrap">
                <div class="onborad-set">
                    <div class="onboarding-title">
                        <h2>Warum entscheiden Sie sich für ein Paket?<span>*</span></h2>
                        <h6>Sie können auf die Funktionen entsprechend dem von Ihnen gewählten Paket zugreifen.<br>
                            Sie können Pakete anzeigen, indem Sie nach links und rechts wischen
                        </h6>
                    </div>
                    <div class="onboarding-content">
                        <div class="row my-2">
                            <div class="col-lg-6 col-sm-12 col-md-6">
                                <ul class="nav nav-tabs nav-tabs-solid nav-justified"
                                    style="width: 100%;padding: 5px;background: #600ee42e;border-radius: 80px">
                                    <li class="nav-item">
                                        <a class="nav-link active" style="border-radius: 45px"
                                           href="#solid-rounded-justified-tab-monthly" data-bs-toggle="tab">Monat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="border-radius: 45px"
                                           href="#solid-rounded-justified-tab-yearly" data-bs-toggle="tab">Jahres</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-8">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-md-12">
                                <form method="post" id="step4Form" action="{{route('business.payment.stripePost')}}">
                                    @csrf
                                    <div class="tab-content mb-3">
                                        <!--Monthly Packages-->
                                        <div class="tab-pane active show position-relative"
                                             id="solid-rounded-justified-tab-monthly">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    @forelse($monthlyPackages as $package)
                                                        <div class="swiper-slide" style="width: 350px;">
                                                            <div class="col-lg-9 mb-5 mb-lg-0">
                                                                <div class="p-5 rounded-lg shadow"
                                                                     style="min-width: max-content;text-align: center;background-color: #F5F8FA">
                                                                    <h1 class="h6 text-uppercase font-weight-bold mb-4">{{$package->name}}</h1>
                                                                    <h2 class="h1 font-weight-bold">{{$package->price == 0 ?"Ücretiz" : "€". $package->price}}
                                                                        <span class="text-small font-weight-normal ml-2"> / monat</span>
                                                                    </h2>

                                                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                                                    <ul class="list-unstyled my-5 text-small"
                                                                        style="text-align: center;">
                                                                        @foreach($package->proparties as $propartie)
                                                                            @if($loop->index < 10)
                                                                                <!-- Sadece ilk 10 özelliği listele -->
                                                                                <li class="mb-3"
                                                                                    style="font-size: 18px; align-items: center; display: flex;">
                                                                                    <i class="fa fa-check-circle me-2"
                                                                                       style="font-size: 35px; color: #00cc527d"></i>{{$propartie->list->name}}
                                                                                </li>
                                                                            @else
                                                                                @if($loop->index == 10)
                                                                                    <li>
                                                                                        <button class="show-more-button btn btn-primary"
                                                                                                type="button">mehr
                                                                                        </button>
                                                                                    </li>
                                                                                @endif
                                                                                <div class="hidden-props"
                                                                                     style="display: none;">
                                                                                    <li class="mb-3"
                                                                                        style="font-size: 18px; align-items: center; display: flex">
                                                                                        <i class="fa fa-check-circle me-2"
                                                                                           style="font-size: 35px; color: #00cc527d"></i>{{$propartie->list->name}}
                                                                                    </li>
                                                                                </div>

                                                                            @endif
                                                                        @endforeach


                                                                    </ul>

                                                                    <div class="form-check-inline visits me-0 w-100">
                                                                        <label class="visit-btns" style="width: 100%">
                                                                            <input type="radio" name="package_id"
                                                                                   class="form-check-input"
                                                                                   value="{{$package->id}}">
                                                                            <span class="visit-rsn" style="">
                                                                           Abone Ol
                                                                        </span>
                                                                        </label>
                                                                    </div>
                                                                    ,

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        <!--Yearly Packages-->
                                        <div class="tab-pane position-relative" id="solid-rounded-justified-tab-yearly">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    @forelse($yearlyPackages as $package)
                                                        <div class="swiper-slide" style="width: 350px;">
                                                            <div class="col-lg-9 mb-5 mb-lg-0">
                                                                <div class="p-5 rounded-lg shadow"
                                                                     style="min-width: max-content;text-align: center;background-color: #F5F8FA">
                                                                    <h1 class="h6 text-uppercase font-weight-bold mb-4">{{$package->name}}</h1>
                                                                    <h2 class="h1 font-weight-bold">{{$package->price == 0 ?"Ücretiz" : "€". $package->price}}
                                                                        <span class="text-small font-weight-normal ml-2"> / jahres</span>
                                                                    </h2>

                                                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                                                    <ul class="list-unstyled my-5 text-small"
                                                                        style="text-align: center;">
                                                                        @foreach($package->proparties as $propartie)
                                                                            <li class="mb-3"
                                                                                style="font-size: 18px;align-items: center; display: flex;">
                                                                                <i class="fa fa-check-circle me-2"
                                                                                   style="font-size: 35px;color: #00cc527d"></i>{{$propartie->list->name}}
                                                                            </li>
                                                                        @endforeach

                                                                    </ul>
                                                                    <div class="form-check-inline visits me-0 w-100">
                                                                        <label class="visit-btns" style="width: 100%">
                                                                            <input type="radio" name="package_id"
                                                                                   class="form-check-input"
                                                                                   value="{{$package->id}}">
                                                                            <span class="visit-rsn" style="">
                                                                        Abonnieren
                                                                        </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="onboarding-btn">
                    <a onclick="$('#step4Form').submit()" href="#">Weitermachen</a>
                </div>
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

            if (this.innerText == "mehr") {
                const hiddenProps = document.querySelectorAll(".hidden-props");
                hiddenProps.forEach(function (hiddenProp) {
                    hiddenProp.style.display = "block";
                });
                this.innerText = "weniger"; // "Daha Fazla" butonunu gizle
            } else {
                const hiddenProps = document.querySelectorAll(".hidden-props");
                hiddenProps.forEach(function (hiddenProp) {
                    hiddenProp.style.display = "none";
                });
                this.innerText = "mehr"; // "Daha Fazla" butonunu gizle
            }

        });
    </script>

@endsection