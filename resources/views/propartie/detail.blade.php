@extends('layouts.master')
@section('styles')

@endsection
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area breadcrumb-ptb-4 p-relative blue-bg-2">
            <div class="breadcrumb__shape-1">
                <img src="/business/assets/img/breadcrumb/breadcrumb-shape-1.png" alt="">
            </div>
            <div class="breadcrumb__shape-2">
                <img src="/business/assets/img/breadcrumb/breadcrumb-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="blog-details-banner z-index-2">
                            <div class="blog-details-title-box">
                                <h3 class="blog-details-banner-title">{{$propartie->name}}</h3>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- breadcrumb-banner-start -->
        <div class="blog-details-img-area mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="blog-details-big-img z-index-2">
                            <img src="/business/assets/img/service/service_detail.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-banner-end -->
        <!-- postbox area start -->
        <div class="postbox__area pb-100">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="team-details-text-wrapper pt-80">
                        <div class="team-details-text">
                            {!! $propartie->description !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- postbox area end -->
        <div class="tp-about__area tp-about__pt-pb pt-100 pb-160">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".2s">
                        <div class="tp-about__img-wrapper text-center text-lg-end p-relative">
                            <div class="tp-about__bg-shape">
                                <img src="/business/assets/img/about/about-bg-shape.png" alt="">
                            </div>
                            <div class="tp-about__main-img z-index">
                                <img src="/business/assets/img/about/about-2.jpg" alt="">
                            </div>
                            <div class="tp-about__sub-img-1 d-none d-sm-block z-index-3">
                                <img src="/business/assets/img/about/about-1.jpg" alt="">
                            </div>
                            <div class="tp-about__sub-img-2 d-none d-sm-block">
                                <img src="/business/assets/img/about/about-3.jpg" alt="">
                            </div>
                            <div class="tp-about__sub-img-3 d-none d-sm-block z-index-3">
                                <img src="/business/assets/img/about/about-5.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".6s">
                        <div class="tp-about__right">
                            <div class="tp-about__section-box">
                                <h4 class="tp-section-subtitle">OVER 150K+ CLIENT</h4>
                                <h3 class="tp-section-title mb-15">Gerçek Zamanlı Hızlı Çözümler Sunuyoruz
                                </h3>
                                <p>Sistemi kullanarak işletmenizin sorunlarını hızlıca çözün! <br> Bize Katılmak için nedenleriniz.</p>
                            </div>
                            <div class="tp-about__list">
                                <ul>
                                    <li><i class="fal fa-check"></i>Raporlama Sistemi.</li>
                                    <li><i class="fal fa-check"></i>Randevu Takip Sistemi.</li>
                                    <li><i class="fal fa-check"></i>Personel Yönetim Sistemi.</li>
                                </ul>
                            </div>
                            <div class="tp-about__btn">
                                <a class="tp-btn tp-btn-hover alt-color-black" href="{{route('business.register')}}">
                                    <span>Şimdi Katıl</span>
                                    <b></b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
@section('scripts')

@endsection