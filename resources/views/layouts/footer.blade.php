<footer id="contact">

    <!-- tp-footer-area-start -->
    <div class="tp-footer__pl-pr">
        <div class="tp-footer__area tp-footer__tp-border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 pb-30  wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                        <div class="tp-footer__widget footer-widget-3 footer-widget-5 footer-col-3-1">
                            <div class="tp-footer__logo mb-25">
                                <a href="/">
                                    <img src="{{asset(setting('bussiness_main_white_logo'))}}" alt="">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 pb-30  wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                        <div class="tp-footer__widget footer-widget-3 footer-col-3-2">
                            <h4 class="tp-footer__widget-title"></h4>
                            <div class="tp-footer__content">
                                <ul>
                                    <li><a href="{{route('business.login')}}">Anmelden</a>
                                    </li>
                                    <li><a href="{{route('business.register')}}">Registrieren</a>
                                    </li>
                                    <li><a href="{{route('faq')}}">FAQ</a>
                                    </li>
                                    <li><a href="#about_us">Über uns</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 pb-30  wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                        <div class="tp-footer__widget footer-widget-3 footer-col-3-3">
                            <div class="tp-footer__social-3">
                                <h4></h4>
                                <a href="{{config('settings.speed_facebook_url')}}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{config('settings.speed_twitter_url')}}"><i class="fab fa-twitter"></i></a>
                                <a href="{{config('settings.speed_instagram_url')}}"><i class="fab fa-instagram"></i></a>
                                <a href="{{config('settings.speed_youtube_url')}}"><i class="fab fa-youtube"></i></a>
                                <a href="{{config('settings.speed_tiktok_url')}}"><i class="fab fa-tiktok"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 pb-30  wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                        <div class="tp-footer__widget footer-widget-3 footer-widget-5 footer-col-3-4">
                            <h4 class="tp-footer__widget-title"></h4>
                            <div class="tp-footer__input mb-35 p-relative">
                                <div class="tp-footer__content">
                                    <ul>
                                        <li><a href="https://maps.app.goo.gl/QPGuVsV5GANAaKGs6"><i class="fa fa-map-pin pe-2"></i>{{setting('speed_contact_address')}}</a></li>
                                        <li><a href="tel:{{setting('speed_contact_phone')}}"><i class="fa fa-phone pe-2"></i>{{setting('speed_contact_phone')}}</a></li>
                                        <li><a href="mailto:{{setting('speed_contact_email')}}"><i class="fa fa-envelope pe-2"></i>{{setting('speed_contact_email')}}</a></li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-copyright__area pt-20 pb-20">
            <div class="container">
                <div class="row justify-between">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="tp-copyright__text tp-copyright__text-3 text-center">
                            <span>{{config('settings.bussiness_site_title')}} 2023-{{now()->year}}. | Deutschland</span>
                        </div>
                        <div class="footer-copyright-links">
                            <a href="#">Rechliches</a>
                            <a href="#">Impressum</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-footer-area-end -->

</footer>

    </div>
</div>
@include('layouts.component.scripts')

</body>

</html>