<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keys')">
    <title>@yield('title', config('settings.bussiness_site_title') .'|'. ' İşletme Giriş')</title>
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
        .iti {
            width: 100%;
            position: relative;
            display: inline-block;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6512c7c3b1aaa13b7a79047e/1hb8lolnn';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


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
                            <img src="{{asset(config('settings.bussiness_main_white_logo'))}}" alt="" style="max-width: 270px">
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
                                <li><a href="{{route('welcome')}}">Merkmale</a></li>
                                <li>
                                    <a href="{{route('welcome')}}">Blog</a>
                                </li>
                                <li><a href="{{route('welcome')}}">Unsere Pakete</a></li>
                                <li><a href="{{route('welcome')}}"><i class="fa fa-headphones me-1"></i>Unterstützung</a></li>

                                <li><a href="{{route('welcome')}}">Kommunikation</a></li>
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

            <!-- tp-banner-area-start -->
            <div class="signin-banner-area signin-banner-main-wrap d-flex align-items-center">
                <div class="signin-banner-left-box signin-banner-bg p-relative" data-background="" style="background-color: #d59c4b">
                    <div class="signin-banner-bottom-shape">
                        <img src="/business/assets/img/login/login-shape-1.png" alt="">
                    </div>
                    <div class="signin-banner-left-wrap">
                        <div class="signin-banner-title-box mb-100">
                            <h4 class="signin-banner-title tp-char-animation">Yousiness Business<br>
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
                        @include('layouts.component.error')
                        @include('layouts.component.alert')
                        <div class="signin-banner-title-box">
                            <h4 class="signin-banner-from-title">Anmelden bei Yousiness Business</h4>
                        </div>

                        <div class="signin-banner-from-box">
                            <h5 class="signin-banner-from-subtitle">Es wird ein Verifizierungscode gesendet..</h5>
                            <form action="{{route('business.login')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input type="text" name="email" style="-webkit-appearance: none;-moz-appearance: none;appearance: none;" id="phone" value="{{old('email')}}"  class="inputText" required>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="postbox__comment-input mb-30">
                                            <input id="myInput" class="inputText password" type="password" style="-webkit-appearance: none;-moz-appearance: none;appearance: none;" name="password" required>
                                            <span class="floating-label">Passwort</span>
                                            <span id="click" class="eye-btn">
                                       <span class="eye-on">
                                          <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path opacity="0.5" d="M2.1474 11.1661C1.38247 10.1723 1 9.67544 1 8.2C1 6.72456 1.38247 6.22767 2.1474 5.2339C3.67477 3.2496 6.2363 1 10 1C13.7637 1 16.3252 3.2496 17.8526 5.2339C18.6175 6.22767 19 6.72456 19 8.2C19 9.67544 18.6175 10.1723 17.8526 11.1661C16.3252 13.1504 13.7637 15.4 10 15.4C6.2363 15.4 3.67477 13.1504 2.1474 11.1661Z" stroke="#1C274C" stroke-width="1.5"/>
                                          <path d="M12.6969 8.2C12.6969 9.69117 11.488 10.9 9.99687 10.9C8.50571 10.9 7.29688 9.69117 7.29688 8.2C7.29688 6.70883 8.50571 5.5 9.99687 5.5C11.488 5.5 12.6969 6.70883 12.6969 8.2Z" stroke="#1C274C" stroke-width="1.5"/>
                                          </svg>
                                       </span>
                                       <span class="eye-off">
                                          <svg width="18" height="18" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <g clip-path="url(#clip0_2547_24206)">
                                             <path d="M18.813 18.9113C17.1036 20.2143 15.0222 20.9362 12.873 20.9713C5.87305 20.9713 1.87305 12.9713 1.87305 12.9713C3.11694 10.6532 4.84218 8.62795 6.93305 7.03134M10.773 5.21134C11.4614 5.05022 12.1661 4.96968 12.873 4.97134C19.873 4.97134 23.873 12.9713 23.873 12.9713C23.266 14.1069 22.5421 15.1761 21.713 16.1613M14.993 15.0913C14.7184 15.3861 14.3872 15.6225 14.0192 15.7865C13.6512 15.9504 13.2539 16.0386 12.8511 16.0457C12.4483 16.0528 12.0482 15.9787 11.6747 15.8278C11.3011 15.6769 10.9618 15.4524 10.6769 15.1675C10.392 14.8826 10.1674 14.5433 10.0166 14.1697C9.86567 13.7962 9.79157 13.3961 9.79868 12.9932C9.80579 12.5904 9.89396 12.1932 10.0579 11.8252C10.2219 11.4572 10.4583 11.126 10.753 10.8513" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1.87305 1.97131L23.873 23.9713" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                             </g>
                                             <defs>
                                             <clipPath id="clip0_2547_24206">
                                             <rect width="24" height="24" fill="white" transform="translate(0.873047 0.971313)"/>
                                             </clipPath>
                                             </defs>
                                          </svg>
                                       </span>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="signin-banner-form-remember">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="postbox__comment-agree">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="rememberMe" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Meine Anmeldedaten speichern
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="postbox__forget text-end">
                                                <a href="{{route('business.showForgotView')}}">Passwort vergessen ?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="signin-banner-from-btn mb-20 text-center">
                                    <button class="signin-btn ">Einloggen</button>
                                </div>
                                <div class="signin-banner-from-register text-center">
                                    <a href="{{route('business.register')}}">Noch kein Account ? <span>Registrieren</span></a>
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
<script>
    //$(".phone").inputmask({"mask": "+99 (999)-999-9999"});
    //$(".phone").inputmask({"mask": "(999)-999-9999"});
    const input = document.querySelector("#phone");
    const iti = window.intlTelInput(input, {
        // tercihlerinize göre opsiyonları ayarlayabilirsiniz
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js", // numara formatlama ve doğrulama için gereklidir
    });

    // Örnek olarak: Numarayı uluslararası formatta alma
    function getNumber() {
        return iti.getNumber();
    }
</script>


</body>

</html>