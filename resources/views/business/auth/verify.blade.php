<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keys')">
    <title>@yield('title', config('settings.appy_site_title') .'|'. ' İşletme Giriş')</title>
    <style>
        .btn-mobile-menu-free{
            background: #4CAF50 !important;
            color: white !important;
            box-shadow: #4CAF50;
            transform: scale(1);
            animation: pulseBtn 2s infinite;
        }
        .btn-mobile-menu-free:hover{
            color: black !important;
        }
        @keyframes pulseBtn {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.71);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
        }
    </style>
    <!-- Place favicon.ico in the root directory -->
    @include('layouts.component.styles')
</head>

<body>

<!-- preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>
<!-- preloader end  -->

<!-- back-to-top-start  -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="far fa-angle-double-up"></i>
</button>
<!-- back-to-top-end  -->

<!-- tp-offcanvus-area-start -->
<div class="tpoffcanvas-area">
    <div class="tpoffcanvas">
        <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="tpoffcanvas__logo text-center">
            <a href="{{route('welcome')}}">
                <img src="{{asset(config('settings.bussiness_main_white_logo'))}}" alt="">
            </a>
        </div>
        <div class="mobile-menu"></div>
        <div class="tpoffcanvas__instagram text-center">
            <div class="row text-center">
                <div class="col-md-6 mb-2">
                    <a class="d-block w-100" style="color: #000000;font-weight: bold;background-color: #ffce5a;border-radius: 25px;padding: 15px;" href="{{route('business.register')}}">
                        <span class="white-text"><i class="far fa-user-edit"></i> Registrieren</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <a  class="d-block w-100"  style="color: #000229;background-color: white;border-radius: 25px;padding: 15px;" href="{{route('business.login')}}">
                        <span class="white-text"><i class="far fa-user"></i> Einloggen</span>
                    </a>
                </div>


            </div>
        </div>

        <div class="tpoffcanvas__social">
            <div class="mt-30 mb-30">
                <a class="tp-btn-yellow-lg circle-effect w-100 btn-mobile-menu-free" href="{{route('business.register')}}">Kostenlos Testen</a>
            </div>
            <div class="social-icon text-center">
                <a href="{{config('settings.speed_facebook_url')}}"><i class="fab fa-facebook-f"></i></a>
                <a href="{{config('settings.speed_twitter_url')}}"><i class="fab fa-twitter"></i></a>
                <a href="{{config('settings.speed_instagram_url')}}"><i class="fab fa-instagram"></i></a>
                <a href="{{config('settings.speed_youtube_url')}}" class="mt-2"><i class="fab fa-youtube"></i></a>
                <a href="{{config('settings.speed_tiktok_url')}}" class="mt-2"><i class="fab fa-tiktok"></i></a>
            </div>

        </div>
    </div>
</div>
<div class="body-overlay"></div>
<!-- tp-offcanvus-area-end -->

<header>
    <!-- tp-header-area-start -->
    <div class="header-signin-area header-bottom__transparent header-signin-ptb z-index-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="header-signin-logo">
                        <a href="{{route('welcome')}}">
                            <img src="{{asset(config('settings.bussiness_main_white_logo'))}}" style="max-width: 250px" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header-signin-bar text-end tp-menu-bar">
                        <button>
                            <i>
                                <span></span>
                                <span></span>
                                <span></span>
                            </i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom__area header-bottom__transparent header-bottom__bdr z-index-5 d-none">
        <div class="container">
            <div class="row g-0 align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-6">
                    <div class="header-bottom__logo">
                        <a href="{{route('welcome')}}">
                            <img src="{{asset(config('settings.bussiness_main_white_logo'))}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 d-none d-lg-block">
                    <div class="header-bottom__main-menu header-bottom__main-menu-4 header-bottom__main-menu-inner">
                        <nav id="mobile-menu-2">
                            <ul>
                                <li>
                                    <a href="{{route('welcome')}}">Startseite</a>
                                </li>
                                <li><a href="{{route('welcome')}}">Pakete</a></li>
                                <li>
                                    <a href="{{route('welcome')}}">Besonderheiten</a>
                                </li>
                                <li><a href="{{route('welcome')}}">Kontakt</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-8 col-6">
                    <div class="header-bottom__right d-flex align-items-center justify-content-end">
                        <div class="header-bottom__action header-bottom__action-4">
                            <a class="d-none d-lg-inline-block header-bottom__action-2 border-none" href="register.html">
                                <span></span>
                            </a>
                        </div>
                        <div class="header-bottom__btn d-flex align-items-center">
                            <a class="tp-btn-yellow d-none d-md-inline-block inner-color" href="#"></a>
                            <a class="header-bottom__bar tp-menu-bar d-lg-none" href="#"><i class="fal fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-header-area-end -->
</header>



<div id="smooth-wrapper">
    <div id="smooth-content">

        <main style="background-color: rgba(240,240,243,0.53)">

            <!-- tp-banner-area-start -->
            <div class="signin-banner-area signin-banner-main-wrap d-flex align-items-center">
                <div class="signin-banner-left-box signin-banner-bg p-relative" data-background="" style="background-color: #d59c4b">
                    <div class="signin-banner-bottom-shape">
                        <img src="/business/assets/img/login/login-shape-1.png" alt="">
                    </div>
                    <div class="signin-banner-left-wrap">
                        <div class="signin-banner-title-box mb-100">
                            <h4 class="signin-banner-title tp-char-animation">Yousiness Business <br>
                            Willkommen auf der Plattform</h4>
                        </div>
                        <div class="signin-banner-img-box position-relative">
                            <div class="signin-banner-img signin-img-1 d-none d-md-block z-index-3">
                                <img src="/business/assets/img/login/login-2.png" alt="">
                            </div>
                            <div class="signin-banner-img signin-img-2 d-none d-md-block">
                                <img src="/business/assets/img/login/login-1.png" alt="">
                            </div>
                            <div class="signin-banner-img signin-img-3 d-none d-md-block z-index-5">
                                <img src="/business/assets/img/login/login-3.png" alt="">
                            </div>
                            <div class="signin-banner-img signin-img-4 d-none d-sm-block">
                                <img src="/business/assets/img/login/login-4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="signin-banner-from d-flex justify-content-center align-items-center">

                    <div class="signin-banner-from-wrap">
                        @include('layouts.component.alert')
                        @include('layouts.component.error')

                        <div class="signin-banner-title-box">
                            <h4 class="signin-banner-from-title">Yousiness Numara Doğrulama</h4>
                        </div>

                        <div class="signin-banner-from-box">
                            <h5 class="signin-banner-from-subtitle">Es wird ein Verifizierungscode gesendet..</h5>
                            <form action="{{route('business.verifyPhone')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input type="text" name="verification_code" id="verification_code" style="-webkit-appearance: none;-moz-appearance: none;appearance: none;" value="{{old('email')}}"  class="inputText" required>
                                            <span class="floating-label">Doğrulama Kodunuz</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="signin-banner-from-btn mb-20 text-center">
                                    <button class="signin-btn ">Gönder</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- tp-banner-area-end -->

        </main>



    </div>
</div>

<!-- JS here -->
@include('layouts.component.scripts')



</body>

</html>