<div class="tpoffcanvas-area">
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
    <div class="tpoffcanvas">
        <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="tpoffcanvas__logo text-center">
            <a href="index.html">
               <!-- <img src="/business/assets/img/logo/logo-white.svg" alt="">-->
            </a>
        </div>
        <div class="mobile-menu"></div>
        <div class="tpoffcanvas__instagram text-center">
            <div class="d-flex justify-content-center">
                <div class="col">
                    <a style="color: #000000;font-weight: bold;background-color: #ffce5a;border-radius: 25px;padding: 15px;" href="{{route('business.register')}}">
                        <span class="white-text"><i class="far fa-user-edit"></i> Registrieren</span>
                    </a>
                </div>
                <div class="col">
                    <a style="color: #000229;background-color: white;border-radius: 25px;padding: 15px;" href="{{route('business.login')}}">
                        <span class="white-text"><i class="far fa-user"></i> Einloggen</span>
                    </a>
                </div>


            </div>
            <div class="mt-40">

            </div>
        </div>

        <div class="tpoffcanvas__social">
            <div class="mt-10 mb-30">
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
