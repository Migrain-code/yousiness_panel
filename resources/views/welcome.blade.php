@extends('layouts.master')
@section('styles')
    <style>
        .tp-fun-fact-title {
            font-weight: 800;
            font-size: 35px;
            line-height: 24px;
        }
        .tp-fun-fact-item p {
            font-weight: 600;
            font-size: 18px;
            line-height: 24px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0;
            color: #000000 !important;
        }
        .tp-fun-fact-item h4::after {
            position: absolute;
            top: -23px;
            left: -22px;
            height: 100px;
            width: 296px;
            border-radius: 50%;
            background: linear-gradient( 145.27deg, rgba(255, 255, 255, 0.1) 15.55%, rgba(255, 255, 255, 0) 86.81% );
            content: "";
        }
        .tp-testimonial-five-content {
            padding: 40px 60px 50px 60px;
            height: 250px;
        }
        .tp-feature-five-shape-color {
            height: 100%;
            width: 100%;
            background-color: #d59c4b;
            border-radius: 50%;
            position: absolute;
            top: 2%;
            left: 0%;
            transition: 0.3s;
            z-index: -1;
        }
    </style>
@endsection
@section('content')
    <main class="fix">

        <!-- tp-hero-area-start -->
        <div class="tp-hero-area tp-hero-five__ptb-5 p-relative grey-bg-2 fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 order-2">
                        <div class="tp-hero-five-section-wrap">
                            <div class="tp-hero-five-section-box z-index">
                                <h3 class="tp-hero-title-5 hero-text-anim-2">
                                    
                                    <i>
                                        <i class="child-2" style="font-family: 'Font Awesome 5 Pro';">
                                        Der beste <span class="child-1 p-relative">Termin
                                             <svg width="300" height="12" viewBox="0 0 300 12" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path d="M275.982 1.4409C269.424 1.12484 262.867 0.892429 256.309 0.622849C254.145 0.529889 251.971 0.529918 249.807 0.483438C245.111 0.381188 240.414 0.288218 235.717 0.185959C233.104 0.130186 230.482 0.0651215 227.87 0.0186415C227.107 0.00934547 226.357 3.05176e-05 225.594 3.05176e-05C223.891 3.05176e-05 222.186 0.0185935 220.483 0.0278895C212.737 0.0371855 204.98 0.0464995 197.234 0.0464995C195.384 0.0464995 193.546 0.0836815 191.696 0.102274C187.122 0.148754 182.561 0.204559 177.998 0.251039C172.842 0.306819 167.696 0.325359 162.54 0.436918C154.2 0.604239 145.872 0.780908 137.531 0.948238C132.7 1.0505 127.88 1.10624 123.048 1.26427C114.731 1.54315 106.424 1.81274 98.1069 2.08232C93.567 2.23106 89.0159 2.35193 84.4759 2.56573C75.8782 2.96546 67.2803 3.35586 58.6825 3.75559C54.0866 3.9694 49.4906 4.12743 44.9058 4.45279C36.3417 5.05703 27.7888 5.66128 19.2246 6.26552C17.3749 6.39566 15.5254 6.52579 13.6758 6.65593C9.97655 6.91622 6.29982 7.32527 2.61185 7.66922C2.37644 7.69711 2.15225 7.72501 1.91685 7.7436C1.47968 7.84586 1.08733 8.03176 0.762257 8.30134C0.280242 8.70107 0 9.25882 0 9.82592C0 10.3929 0.280242 10.9507 0.762257 11.3597C1.19943 11.7222 1.96169 12.0569 2.61185 11.9919C7.06208 11.5735 11.5011 11.1366 15.9513 10.8206C20.0877 10.5324 24.2128 10.2349 28.3493 9.94672C32.8555 9.63072 37.3618 9.31462 41.8681 8.99854C43.684 8.86839 45.5 8.70109 47.3272 8.61743C54.3557 8.29207 61.3841 7.97597 68.4125 7.65061C72.7955 7.4461 77.1785 7.25092 81.5614 7.0464C83.3774 6.96274 85.1822 6.86047 86.9981 6.79539C93.9593 6.563 100.932 6.34917 107.893 6.13536C112.119 6.00522 116.333 5.86578 120.56 5.73564C121.983 5.68916 123.396 5.63337 124.819 5.60548C132.341 5.45675 139.863 5.31734 147.384 5.1779C151.588 5.09424 155.781 5.01986 159.985 4.9362C161.475 4.90831 162.977 4.86181 164.468 4.85251C172.225 4.78744 179.982 4.7224 187.739 4.65733C192.582 4.61085 197.413 4.57365 202.256 4.58295C210.495 4.60154 218.734 4.61082 226.962 4.62941C228.588 4.62941 230.213 4.68523 231.838 4.73171C236.389 4.84327 240.929 4.9548 245.481 5.06636C248.888 5.15002 252.296 5.23364 255.715 5.31731C258.136 5.37308 260.546 5.52184 262.967 5.6334C270.085 5.94946 277.204 6.28414 284.311 6.64668C286.115 6.73964 287.92 6.85116 289.725 6.96272C291.664 7.07427 293.603 7.19512 295.531 7.37174C295.834 7.40893 296.125 7.45543 296.428 7.5112C297.191 7.64135 297.919 7.60416 298.603 7.2788C299.231 6.97204 299.701 6.46075 299.903 5.8751C300.307 4.64803 299.41 3.33726 297.93 2.99331C296.63 2.69584 295.284 2.57504 293.951 2.46349C293.032 2.38912 292.124 2.30546 291.204 2.23109C289.445 2.08236 287.674 2.00794 285.913 1.89639C282.607 1.71977 279.289 1.59893 275.982 1.4409Z"
                                                      fill="#d59c4b"/>
                                             </svg>
                                          </span>
                                            <br>
                                        </i>
                                    </i>
                                    <i><i class="child-2"><span class="child-2">Management </span> <br></i></i>
                                    <i><i class="child-2"> Software</i></i>
                                    <i><i class="child-2" style="font-family: 'Font Awesome 5 Pro';">für Ihr Salon <br></i></i>
                                </h3>
                                <p class="wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                                Eine einfache Lösung, um den optimalen Arbeitsplan für  <br>Ihr Salon zu erstellen.
                                    </p>
                            </div>
                            <div class="tp-hero-five-btn-box d-flex align-items-center wow tpfadeUp"
                                 data-wow-duration=".9s" data-wow-delay=".7s">
                                <a class="tp-btn-blue-lg purple-bg circle-effect mr-15 mb-20" href="#">Mehr  erfahren</a>
                                <a class="tp-btn-grey mb-20" href="{{route('business.register')}}">Kostenlos Testen</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 order-2">
                        <div class="postbox__comment-form"
                             style="background-color: white;padding: 20px;border-radius: 20px">
                            @include('layouts.component.alert')
                            <form action="{{route('getInfo')}}" class="box" method="post">
                                @csrf
                                <div class="row p-3 text-center">
                                    <h1 style="color: #d59c4b;">Wir rufen sie an</h1>
                                    <p>Um Informationen über Yousiness zu erhalten, füllen Sie das Formular aus und wir rufen Sie an.</p>
                                </div>
                                <div class="row gx-20">
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input type="text" name="fullname" class="inputText" required>
                                            <span class="floating-label">Salon Inhaber</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input type="text" name="business_name" class="inputText" required>
                                            <span class="floating-label">Salonname</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-35">
                                            <input type="text" name="phone" class="inputText" id="phone" required>
                                            <span class="floating-label">Telefon</span>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="postbox__btn-box">
                                            <button class="submit-btn w-100" style="border-radius: 20px" type="submit">
                                                Senden
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- tp-hero-area-end -->

        <!-- tp-fun-fact-area-start -->
        <div class="tp-fun-fact-area tp-fun-fact-2 pt-100 pb-60" id="proparties">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-fun-fact-section-title text-center pb-60">
                            <h4 class="tp-fun-fact-title">{{main('business_section_1_box_1_main_title')}}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-60 tp-counter-br">
                        <div class="tp-fun-fact-item bg-color-1 tp-fun-fact-space-1 align-items-center">
                            <h4>{{main('business_section_3_box_1_title')}}<span>+</span></h4> <br>
                            <p>{{main('business_section_3_box_1_description')}}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-60 tp-counter-br">
                        <div class="tp-fun-fact-item bg-color-2 tp-fun-fact-space-2 align-items-center">
                            <h4>{{main('business_section_3_box_2_title')}}<span>+</span></h4><br>
                            <p>{{main('business_section_3_box_2_description')}}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-60 tp-counter-br">
                        <div class="tp-fun-fact-item bg-color-3 tp-fun-fact-space-3 align-items-center">
                            <h4>{{main('business_section_3_box_3_title')}}<span>+</span></h4><br>
                            <p>{{main('business_section_3_box_3_description')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-fun-fact-area-end -->

        <!-- tp-service-area-start -->
        <div class="tp-service-area tp-services-five-item-bg-color p-relative fix">
            <div class="container">
                <div class="row g-0">
                    @forelse($proparties as $propartie)
                        <div class="col-md-3">
                            <div class="tp-service-five-item z-index">
                                <div class="tp-services-five-item-bg">
                                    <div class="inner"></div>
                                </div>
                                <div class="tp-service-five-wrapper">
                                    <div class="tp-service-five-icon">
                                        <img src="{{asset($propartie->icon)}}" alt="">
                                    </div>
                                    <div class="tp-service-five-content">
                                        <h3 class="tp-service-five-title-sm"><a
                                                    href="{{route('propartie.detail', $propartie->slug)}}">{{$propartie->name}}
                                                <br>
                                            </a>
                                        </h3>
                                        <p>
                                            {{$propartie->detail}}
                                        </p>
                                    </div>
                                </div>
                                <div class="tp-service-five-btn text-end">
                                    <a href="{{route('propartie.detail', $propartie->slug)}}"><i
                                                class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
        <!-- tp-service-area-end -->

        <!-- tp-cta-area-start -->


        <div class="tp-price__area tp-price__pl-pr p-relative pt-110 pb-80" id="packets">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"
                         style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: tpfadeUp;">
                        <div class="tp-price__section-box text-center mb-35">
                            <h2 class="tp-section-title">PAKETE &amp; INHALTE</h2>
                            <p>Wählen Sie das für Sie am besten geeignete Business-Paket</p>
                        </div>
                    </div>
                </div>
                <div class="row wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s"
                     style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: tpfadeUp;">
                    <div class="col-12">
                        <div class="tp-price__btn-box p-relative mb-50 d-flex justify-content-center">
                            <div class="tp-price-offer-badge-wrap d-none d-sm-block">
                                <div class="price-shape-line">
                                    <svg width="80" height="42" viewBox="0 0 80 42" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M78.5938 8.78059C59.0829 45.2801 2.05127 -8.72021 27.0652 32.28C52.079 73.2801 48.5771 -41.2195 0.550438 18.7821"
                                              stroke="#FF3C82" stroke-dasharray="3 3"></path>
                                    </svg>
                                </div>
                                <div class="price-offer-badge">
                                 <span>365 Tage <br>
                                    35%</span>
                                </div>
                            </div>
                            <nav>
                                <div class="nav nav-tab tp-price__btn-bg" id="nav-tab" role="tablist">
                                    <button class="nav-link active monthly" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true">
                                            30 Tage
                                    </button>
                                    <button class="nav-link yearly" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false" tabindex="-1"
                                            style="margin-left: -15px;">
                                            365 Tage
                                    </button>
                                    <span class="test"></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="price-tab-content">
                    <div class="tab-content" id="nav-tabContent">
                        <!--Monthly Pannel-->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="row">
                                @forelse($monthlyPackages as $package)
                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="tp-price__item p-relative">
                                            <div class="tp-price__icon">
                                                <img src="{{asset($package->icon)}}" alt="">
                                            </div>
                                            <div class="tp-price__title-box">
                                                <h4 class="tp-price__title-sm">{{$package->name}}</h4>
                                                <p>{{$package->price==0 ? "Gratis": $package->price ."€ / Monat"}}</p>
                                            </div>
                                            <div class="tp-price__feature">
                                                <ul>
                                                    @foreach($package->proparties as $propartie)
                                                        <li> <!--class="inactive"-->
                                                            <span>
                                                                <svg width="16" height="17" viewBox="0 0 16 17"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   <path class="price-path-1"
                                                                         d="M6.344 9.20708L1.81052 6.82365C1.46119 6.64408 1.05752 6.6604 0.731485 6.87263C0.397684 7.09301 0.203613 7.46032 0.203613 7.86844V12.3659C0.203613 13.1414 0.615042 13.8433 1.27488 14.1943L5.8006 16.5778C5.95586 16.6594 6.12664 16.7002 6.29742 16.7002C6.49925 16.7002 6.70109 16.6431 6.87963 16.5288C7.21343 16.3166 7.4075 15.9411 7.4075 15.533V11.0355C7.41527 10.2519 7.00384 9.5499 6.344 9.20708Z"
                                                                         fill="currentcolor"></path>
                                                                   <path class="price-path-2"
                                                                         d="M15.3846 6.87587C15.0508 6.66372 14.6471 6.63924 14.3056 6.82691L9.77978 9.20956C9.11993 9.56043 8.7085 10.254 8.7085 11.0373V15.5334C8.7085 15.9413 8.90257 16.3167 9.23637 16.5288C9.41492 16.6431 9.61676 16.7002 9.81859 16.7002C9.98938 16.7002 10.1602 16.6594 10.3154 16.5778L14.8412 14.1952C15.5011 13.8443 15.9125 13.1507 15.9125 12.3674V7.87136C15.9125 7.46337 15.7184 7.09618 15.3846 6.87587Z"
                                                                         fill="currentcolor"></path>
                                                                   <path class="price-path-3"
                                                                         d="M13.9152 2.96146L8.86226 0.219067C8.33036 -0.0730223 7.68564 -0.0730223 7.15375 0.219067L2.10076 2.96146C1.73005 3.1643 1.50439 3.55375 1.50439 4C1.50439 4.43813 1.73005 4.8357 2.10076 5.03854L7.15375 7.78093C7.4197 7.92698 7.71788 8 8.008 8C8.29813 8 8.59631 7.92698 8.86226 7.78093L13.9152 5.03854C14.286 4.8357 14.5116 4.44625 14.5116 4C14.5116 3.55375 14.286 3.1643 13.9152 2.96146Z"
                                                                         fill="currentcolor"></path>
                                                                   </svg>
                                                             </span>
                                                            {{$propartie->list->name}}
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <div class="tp-price__btn tp-btn-price">
                                                <span>{{$package->price==0 ? "Gratis": $package->price ."€ / Jahres"}}</span>
                                                <a href="{{route('business.login')}}">{{$package->price==0 ? "Jetzt Testen": "Buchen"}} <i
                                                            class="fal fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                @endforelse

                            </div>
                        </div>
                        <!--Yearly Pannel-->
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                             tabindex="0">
                            <div class="row">
                                @forelse($yearlyPackages as $package)
                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="tp-price__item p-relative">
                                            <div class="tp-price__icon">
                                                <img src="{{asset($package->icon)}}" alt="">
                                            </div>
                                            <div class="tp-price__title-box">
                                                <h4 class="tp-price__title-sm">{{$package->name}}</h4>
                                                <p>{{$package->price==0 ? "Unentgeltlich": $package->price ."€ / Jahres"}}</p>
                                            </div>
                                            <div class="tp-price__feature">
                                                <ul>
                                                    @foreach($package->proparties as $propartie)
                                                        <li> <!--class="inactive"-->
                                                            <span>
                                                                <svg width="16" height="17" viewBox="0 0 16 17"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   <path class="price-path-1"
                                                                         d="M6.344 9.20708L1.81052 6.82365C1.46119 6.64408 1.05752 6.6604 0.731485 6.87263C0.397684 7.09301 0.203613 7.46032 0.203613 7.86844V12.3659C0.203613 13.1414 0.615042 13.8433 1.27488 14.1943L5.8006 16.5778C5.95586 16.6594 6.12664 16.7002 6.29742 16.7002C6.49925 16.7002 6.70109 16.6431 6.87963 16.5288C7.21343 16.3166 7.4075 15.9411 7.4075 15.533V11.0355C7.41527 10.2519 7.00384 9.5499 6.344 9.20708Z"
                                                                         fill="currentcolor"></path>
                                                                   <path class="price-path-2"
                                                                         d="M15.3846 6.87587C15.0508 6.66372 14.6471 6.63924 14.3056 6.82691L9.77978 9.20956C9.11993 9.56043 8.7085 10.254 8.7085 11.0373V15.5334C8.7085 15.9413 8.90257 16.3167 9.23637 16.5288C9.41492 16.6431 9.61676 16.7002 9.81859 16.7002C9.98938 16.7002 10.1602 16.6594 10.3154 16.5778L14.8412 14.1952C15.5011 13.8443 15.9125 13.1507 15.9125 12.3674V7.87136C15.9125 7.46337 15.7184 7.09618 15.3846 6.87587Z"
                                                                         fill="currentcolor"></path>
                                                                   <path class="price-path-3"
                                                                         d="M13.9152 2.96146L8.86226 0.219067C8.33036 -0.0730223 7.68564 -0.0730223 7.15375 0.219067L2.10076 2.96146C1.73005 3.1643 1.50439 3.55375 1.50439 4C1.50439 4.43813 1.73005 4.8357 2.10076 5.03854L7.15375 7.78093C7.4197 7.92698 7.71788 8 8.008 8C8.29813 8 8.59631 7.92698 8.86226 7.78093L13.9152 5.03854C14.286 4.8357 14.5116 4.44625 14.5116 4C14.5116 3.55375 14.286 3.1643 13.9152 2.96146Z"
                                                                         fill="currentcolor"></path>
                                                                   </svg>
                                                             </span>
                                                            {{$propartie->list->name}}
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <div class="tp-price__btn tp-btn-price">
                                                <span>{{$package->price==0 ? "Unentgeltlich": $package->price ."€ / Jahres"}}</span>
                                                <a href="{{route('business.login')}}">Buchen<i
                                                            class="fal fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                @empty

                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @forelse($mainPageSections as $section)
            @if($loop->index == 1)
                <div class="tp-cta-area p-4 mb-120 tp-cta-five-bg p-relative app-information-area" id="about_us" data-background=""
                     style="background-color: rgb(213, 156, 75); background-image: url(&quot;&quot;);">

                    <div class="container-fluid g-0">
                        <div class="row g-0">
                            <iframe width="100%"
                                    style="border-radius: 25px"
                                    height="600px"
                                    src="{{main('speed_main_page_video')}}"
                                    title="Main Page Video"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            @endif
        <div class="tp-cta-area p-4 mb-120 tp-cta-five-bg p-relative app-information-area" id="about_us" data-background=""
             style="background-color: rgb(213, 156, 75); background-image: url(&quot;&quot;);">

            <div class="container-fluid g-0">
                <div class="row g-0">
                    <div class="col-6">
                        <div class="tp-cta-five-section-box">
                            <h3 class="tp-section-title-5"><span>{{$section->title}}</span></h3>
                            {!! $section->description !!}
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tp-cta-five-section-box text-center">
                            <img src="{{asset($section->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        @endforelse

        <!-- tp-cta-area-end -->
        <div class="tp-sales-area tp-sales-space" style="padding-top: 90px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 order-1 order-md-1 wow tpfadeLeft" data-wow-duration=".9s"
                         data-wow-delay=".5s"
                         style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: tpfadeLeft;">
                        <div class="tp-sales-section-box pb-20">
                            <h3 class="tp-section-title-3 pb-15" style="font-size: 40px;">{{main('business_section_1_box_1_title')}}</h3>
                            <p class="tp-title-anim" style="perspective: 300px;">
                            <div style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 285px 14px; transform: translate3d(0px, 0px, 0px); opacity: 1; line-height: 24px;">
                                {{main('business_section_1_box_1_description')}}
                            </div>
                            </p>
                        </div>


                    </div>
                    <div class="col-xl-6 col-lg-6 order-0 order-md-2 wow tpfadeRight" data-wow-duration=".9s"
                         data-wow-delay=".7s"
                         style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.7s; animation-name: tpfadeRight;">
                        <div class="tp-sales-img-wrapper p-relative text-end">
                            <div class="tp-plan-2-img-box p-relative">
                                <img src="{{asset(main("business_section_1_box_1_image") ?? "")}}">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- tp-cta-area-end -->
        <div class="tp-sales-area tp-sales-space" style="padding-top: 90px;">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-xl-6 col-lg-6 order-0 order-md-1 wow tpfadeRight" data-wow-duration=".9s"
                         data-wow-delay=".7s"
                         style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.7s; animation-name: tpfadeRight;">
                        <div class="tp-sales-img-wrapper p-relative">
                            <div class="tp-plan-2-img-box p-relative" style="margin-left: 0;">
                                <img src="{{main("business_section_1_box_2_image")}}">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 order-1 order-md-1 wow tpfadeLeft" data-wow-duration=".9s"
                         data-wow-delay=".5s"
                         style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: tpfadeLeft;">
                        <div class="tp-sales-section-box pb-20">
                            <h3 class="tp-section-title-3 pb-15" style="font-size: 40px;">{{main("business_section_1_box_2_title")}}</h3>
                            <p class="tp-title-anim" style="perspective: 300px;">
                            <div style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 285px 14px; transform: translate3d(0px, 0px, 0px); opacity: 1; line-height: 24px;">
                                {{main("business_section_1_box_2_description")}}
                            </div>
                            </p>
                        </div>


                    </div>

                </div>
            </div>
        </div>


        <!-- tp-cta-area-end -->
        <div class="tp-sales-area tp-sales-space" style="padding-top: 90px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 order-1 order-md-1 wow tpfadeLeft" data-wow-duration=".9s"
                         data-wow-delay=".5s"
                         style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: tpfadeLeft;">
                        <div class="tp-sales-section-box pb-20">
                            <h3 class="tp-section-title-3 pb-15 ">{{main("business_section_1_box_3_title")}}</h3>
                            <p class="tp-title-anim" style="perspective: 300px;">
                                <div style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform-origin: 285px 14px; transform: translate3d(0px, 0px, 0px); opacity: 1;">
                                    {{main("business_section_1_box_3_description")}}
                                </div>
                            </p>
                        </div>
                        <div class="tp-sales-feature">
                            <div class="d-flex justify-content-start">
                                <div class="col-lg-4 col-md-6 col-sm-12 me-4">
                                    <a href="{{setting('speed_app_store')}}">
                                        <img src="/business/assets/img/cta/apple_store_logo.svg" width="200" height="80">
                                    </a>
                                         class="">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <a href="{{setting('speed_google_play')}}">
                                        <img src="/business/assets/img/cta/google_play_logo.svg" width="200" height="80">
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 order-0 order-md-2 wow tpfadeRight" data-wow-duration=".9s"
                         data-wow-delay=".7s"
                         style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.7s; animation-name: tpfadeRight;">
                        <div class="tp-sales-img-wrapper p-relative text-end">
                            <div class="tp-plan-2-img-box p-relative">
                                <img src="{{asset(main("business_section_1_box_3_image"))}}">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="journey-area p-relative fix" style="padding-top: 90px;padding-bottom: 90px">
            <div class="journey-grey-bg grey-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="journey-section-box">
                            <h5 class="inner-section-subtitle pb-10"></h5>
                            <h3 class="ab-brand-title pb-0 mb-0">Was gibt es in{{setting('appy_site_title')}}?</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid g-0">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="journey-slider-wrapper">
                            <div class="swiper-container journey-slider-active">
                                <div class="swiper-wrapper">
                                    @forelse($business_categories as $category)
                                        <div class="swiper-slide">
                                            <div class="tp-feature-five-wrapper">
                                                <div class="tp-feature-five-item tp-feature-five-item-1 text-center z-index">
                                                    <div class="tp-feature-five-icon p-relative">
                                                        <img src="{{asset($category->icon)}}" alt="">
                                                        <div class="tp-feature-five-shape-color"
                                                             style="background-color: {{$category->color}}"></div>
                                                    </div>
                                                    <div class="tp-feature-five-content">
                                                        <h4 class="tp-feature-five-title-sm">{{$category->name}}</h4>

                                                    </div>
                                                    <div class="tp-feature-five-btn">
                                                       <!--  <a class="tp-btn-purple"
                                                           href="{{route('categoryDetail', $category->slug)}}">Detayları
                                                            Öğren</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse


                                </div>
                            </div>
                            <div class="tp-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($sponsors->count() > 0)
            <div class="ab-brand-area">
                <div class="container">
                    <div class="ab-brand-border-bottom pb-90">
                        <div class="row">
                            <div class="col-12">
                                <div class="ab-brand-section-box text-center mb-50">
                                    <h4 class="ab-brand-title">Tausende von Unternehmen sind bei uns sicher!</h4>
                                    <p>Über 5000 Unternehmen arbeiten seit Jahren mit uns zusammen.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 justify-content-center">
                                    @forelse($sponsors as $sponsor)
                                        <div class="col">
                                            <div class="ab-brand-item mb-25">
                                                <a href="{{$sponsor->link}}" target="_blank">
                                                    <img src="{{asset($sponsor->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
        <!-- tp-testimonial-area-start -->
        <div class="tp-testimonial-area pt-130 pb-130 mb-55 fix" data-background="" style="background-color: #d59c4b;">
            <div class="container">
                <div class="row align-items-end tp-testimonial-five-section-space">
                    <div class="col-md-8">
                        <div class="tp-testimonial-five-section-box">
                            <span class="tp-section-subtitle-5">Kommentare</span>
                            <h3 class="tp-section-title-5"><span>Was sagen unsere zufriedenen </span> Geschäftspartner ?</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tp-testimonial-five-arrow d-flex align-items-center justify-content-start justify-content-md-end">
                            <div class="test-next">
                                <button><i class="far fa-arrow-left"></i></button>
                            </div>
                            <div class="test-prev">
                                <button><i class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="tp-testimonial-five-slider-section">
                            <div class=" swiper-container testimonial-five-slider-active">
                                <div class="swiper-wrapper">
                                    @forelse($comments as $comment)
                                        <div class="swiper-slide">
                                            <div class="tp-testimonial-five-item">
                                                <div class="tp-testimonial-five-wrapper d-flex justify-content-between align-items-center">
                                                    <div class="tp-testimonial-five-top-info d-flex align-items-center">
                                                        <div class="tp-testimonial-five-avata">
                                                            @if($comment->image)
                                                                <img src="{{asset($comment->image)}}" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="tp-testimonial-five-author-info">
                                                            <h4>{{$comment->name}}</h4>
                                                            <!--  <span>Community Organiser</span>-->
                                                        </div>
                                                    </div>
                                                    <!--<div class="tp-testimonial-five-brand d-none d-sm-block">
                                                        <img src="/business/assets/img/testimonial/testi-logo-5-2.png" alt="">
                                                    </div>-->
                                                </div>
                                                <div class="tp-testimonial-five-content">
                                                    <p>“{{$comment->description}}”</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse

                                </div>
                            </div>
                            <div class="tp-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-testimonial-area-end -->

        <div class="tp-sales-area tp-sales-space" id="contactForm" style="padding-top: 90px;">
            <div class="container">
                @include('contact.form')
            </div>
        </div>

        @include('layouts.component.free-register')
        <!-- tp-cta-area-end -->


    </main>
@endsection
@section('scripts')

@endsection