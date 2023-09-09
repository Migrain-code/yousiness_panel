<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keys')">
    <title>@yield('title', config('settings.appy_site_title') .' | '. 'İşletme Kayıt')</title>
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
                    <img src="{{asset(setting('bussiness_main_white_logo'))}}" alt="">
                </a>
        </div>
        <div class="mobile-menu"></div>
        <div class="tpoffcanvas__instagram text-center">
            <div class="row text-center">
                <div class="col-md-6 mb-2">
                    <a class="d-block w-100" style="color: #000000;font-weight: bold;background-color: #ffce5a;border-radius: 25px;padding: 15px;" href="{{route('business.register')}}">
                        <span class="white-text"><i class="far fa-user-edit"></i> Kayıt Ol</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <a  class="d-block w-100"  style="color: #000229;background-color: white;border-radius: 25px;padding: 15px;" href="{{route('business.login')}}">
                        <span class="white-text"><i class="far fa-user"></i> Giriş Yap</span>
                    </a>
                </div>


            </div>
        </div>

        <div class="tpoffcanvas__social">
            <div class="mt-30 mb-30">
                <a class="tp-btn-yellow-lg circle-effect w-100 btn-mobile-menu-free" href="{{route('business.register')}}">14 Gün Ücretsiz Dene</a>
            </div>
            <div class="social-icon text-center">
                <a href="{{config('settings.twitter')}}"><i class="fab fa-twitter"></i></a>
                <a href="{{config('settings.instagram')}}"><i class="fab fa-instagram"></i></a>
                <a href="{{config('settings.facebook')}}"><i class="fab fa-facebook-square"></i></a>

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
                         <img src="{{asset(setting('bussiness_main_white_logo'))}}" alt="" style="max-width: 270px">
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
                        <a href="{{route('welcome')}}"><img src="{{asset(setting('bussiness_main_white_logo'))}}" alt=""></a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 d-none d-lg-block">
                    <div class="header-bottom__main-menu header-bottom__main-menu-4 header-bottom__main-menu-inner">
                        <nav id="mobile-menu-2">

                                <ul>
                                    <li>
                                        <a href="{{route('welcome')}}.html">Anasayfa</a>
                                    </li>
                                    <li><a href="{{route('propartie.index')}}">Özellikler</a></li>
                                    <li>
                                        <a href="{{route('blog.index')}}">Blog</a>
                                    </li>
                                    <li><a href="{{route('packages')}}">Paketlerimiz</a></li>
                                    <li><a href="{{route('faq')}}"><i class="fa fa-headphones me-1"></i>Destek</a></li>
    
                                    <li><a href="{{route('contact')}}">İletişim</a></li>
                                </ul>

                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-8 col-6">
                    <div class="header-bottom__right d-flex align-items-center justify-content-end">
                        <div class="header-bottom__action header-bottom__action-4">
                            <a class="d-none d-lg-inline-block header-bottom__action-2 border-none" href="#">
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

            <div class="signin-banner-area signin-banner-main-wrap d-flex align-items-center">
                <div class="signin-banner-left-box signin-banner-bg p-relative" data-background="" style="background-color: #d59c4b">
                    <div class="signin-banner-bottom-shape">
                        <img src="assets/img/login/login-shape-1.png" alt="">
                    </div>
                    <div class="signin-banner-left-wrap">
                        <div class="signin-banner-title-box mb-100">
                            <h4 class="signin-banner-title tp-char-animation"> Yousiness'e sizde katılın.</h4>
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
                        @include('layouts.component.error')
                        <div class="signin-banner-title-box">
                            <h4 class="signin-banner-from-title">Ücretsiz Hesap Oluştur</h4>
                        </div>

                        <div class="signin-banner-from-box">
                            <h5 class="signin-banner-from-subtitle">Doğrulama Kodu Gönderilecektir</h5>
                            <form action="{{route('business.register')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input type="text" class="inputText" style="-webkit-appearance: none;-moz-appearance: none;appearance: none;" name="name" required>
                                            <span class="floating-label">Salon Adı</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input type="text" class="inputText" style="-webkit-appearance: none;-moz-appearance: none;appearance: none;" name="owner" required>
                                            <span class="floating-label">Salon Sahibi</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input type="text" class="inputText" style="-webkit-appearance: none;-moz-appearance: none;appearance: none;" name="email" id="phone" required>
                                            <span class="floating-label">Telefon Numarası</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="signin-banner-form-remember">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="postbox__comment-agree">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="padding: 9px;margin-top: 0px !important;">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <a href="sign-in.html" class="text-primary">Üyelik koşulları</a> ve <a href="sign-in.html" class="text-primary">Aydınlatma metnini</a> okudum, kabul ediyorum.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="postbox__comment-agree">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="padding: 9px;margin-top: 0px !important;">
                                                    <label class="form-check-label" for="flexCheckDefault" style="line-height: 1.3em">
                                                        Yousiness tarafından ürün ve hizmetlerinin tanıtımı için tarafımla iletişime geçilmesini kabul ediyorum.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="signin-banner-from-btn mb-20 text-center">
                                    <button class="signin-btn " type="submit">Kayıt Ol</button>
                                </div>
                            </form>

                            <div class="col-12 pt-10 pb-10 text-center">
                                Zaten Hesabın var mı?<a class="ml-5 text-primary" href="{{route('business.login')}}">Giriş Yap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>



    </div>
</div>

<!-- JS here -->
@include('layouts.component.scripts')



</body>

</html>