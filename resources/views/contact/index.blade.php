@extends('layouts.master')
@section('meta_keys',"")
@section('meta_description',"")
@section('title','')
@section('styles')

@endsection
@section('content')
    <main style="background-color: #eeeef5">
        <!-- tp-breadcrumb-area-start -->
        <div class="about-banner-area p-relative">
            <div class="about-shape-1 z-index-3">
                <img src="/business/assets/img/breadcrumb/breadcrumb-shape-1.png" alt="">
            </div>
            <div class="about-shape-2 z-index-3">
                <img src="/business/assets/img/breadcrumb/breadcrumb-shape-2.png" alt="">
            </div>
            <div class="about-banner p-relative z-index fix">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="about-banner-content">
                                <h4 class="about-banner-title" data-parallax='{"y": 1000, "smoothness": 10}'>
                                    <span>Bize</span> <br>
                                    <span>Ulaşın</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-breadcrumb-area-end -->

        <!-- tp-breadcrumb-header-area-start -->
        <div class="about-img-area mb-100 z-index-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="about-img about-img-height p-relative" data-background="/business/assets/img/contact/contact-banner.jpg">
                            <div class="about-img-content">
                                <h4 class="about-img-title" data-parallax='{"y": 1000, "smoothness": 10}'>
                                    <span>Bize</span> <br>
                                    <span>Ulaşın</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-breadcrumb-header-area-end -->

        <!-- tp-contact-area-strat -->
        <div class="contact-info-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-30">
                        <div class="contact-info-item">
                            <div class="contact-info-img">
                                <img src="/business/assets/img/contact/contact-icon-sm-5.png" alt="">
                            </div>
                            <div class="contact-info-title-box">
                                <h5 class="contact-info-title-sm"><a href="#">Adres</a></h5>
                                <p>{{config('settings.site_address')}} <br>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 mb-30">
                        <div class="contact-info-item p-relative">
                            <div class="contact-info-badge">
                                <span>Hızlı İletişim</span>
                            </div>
                            <div class="contact-info-img">
                                <img src="/business/assets/img/contact/contact-icon-sm-6.png" alt="">
                            </div>
                            <div class="contact-info-title-box">
                                <h5 class="contact-info-title-sm"><a href="#">Telefon</a></h5>
                                <p>{{config('settings.site_phone')}} <br>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 mb-30">
                        <div class="contact-info-item">
                            <div class="contact-info-img">
                                <img src="/business/assets/img/contact/contact-icon-sm-7.png" alt="">
                            </div>
                            <div class="contact-info-title-box">
                                <h5 class="contact-info-title-sm"><a href="#">E-Posta</a></h5>
                                <p>{{config('settings.site_email')}} <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       @include('contact.form')

        <div class="contact-inner-area pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-inner-title-sm-wrap text-center mb-50">
                            <h4 class="contact-inner-title-sm">Sizlere En Kısa Sürede Dönüş Sağlayacağız!</h4>
                            <p>24 saat içinde talebinizi aldıktan sonra tekrar iletişime geçeceğiz</p>
                        </div>
                    </div>
                </div>
                <div class="contact-inner-wrapper">
                    <div class="row gx-0">
                        <div class="col-xl-4 col-lg-4">
                            <div class="contact-inner-item d-flex align-items-center justify-content-center">
                                <div class="contact-inner-img contact-img-1">
                                    <img src="assets/img/contact/contact-icon-sm-1.png" alt="">
                                </div>
                                <div class="contact-inner-link">
                                    <a href="mailto:{{config('settings.site_email')}}"><i class="fa fa-envelope"></i> {{config('settings.site_email')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="contact-inner-item d-flex align-items-center justify-content-center">
                                <div class="contact-inner-img contact-img-2">
                                    <img src="assets/img/contact/contact-icon-sm-2.png" alt="">
                                </div>
                                <div class="contact-inner-link">
                                    <a href="tel:{{config('settings.site_phone')}}"><i class="fa fa-phone"></i> {{config('settings.site_phone')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="contact-inner-item d-flex align-items-center justify-content-center">
                                <div class="contact-inner-img contact-img-3">
                                    <img src="assets/img/contact/contact-icon-sm-3.png" alt="">
                                </div>
                                <div class="contact-inner-link">
                                    <a href="{{config('settings.site_map')}}" target="_blank"><i class="fa fa-map-marked"></i> Konuma Git</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-contact-area-end -->
        <!-- tp-hero-area-start -->

        <!-- tp-cta-area-start -->
        @include('layouts.component.free-register')
        <!-- tp-cta-area-end -->


    </main>
@endsection
@section('scripts')

@endsection