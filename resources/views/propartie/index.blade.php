@extends('layouts.master')
@section('styles')

@endsection
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area breadcrumb-height p-relative blue-bg-2">
            <div class="breadcrumb__shape-1">
                <img src="assets/img/breadcrumb/breadcrumb-shape-1.png" alt="">
            </div>
            <div class="breadcrumb__shape-2">
                <img src="assets/img/breadcrumb/breadcrumb-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-7">
                        <div class="breadcrumb__content">
                            <h3 class="breadcrumb__title tp-char-animation">{{setting('appy_site_title')}} tüm özellikleri</h3>

                            <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".4s">
                                <span class="child-one"><a href="/">Anasayfa</a></span>
                                <span class="dvdr"><i class="fal fa-angle-right"></i></span>
                                <span>Özellikler</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-lg-4 text-center text-md-end">
                        <div class="breadcrumb__img p-relative text-start z-index">
                            <img class="z-index-3" src="/business/assets/img/breadcrumb/breadcrumb-3.png" alt="">
                            <div class="breadcrumb__sub-img wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".4s">
                                <img src="/business/assets/img/breadcrumb/breadcrumb-sub-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- tp-service-area-strat -->
        <div class="tp-service-area pb-120 z-index pt-90 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tp-about__section-box text-center mb-40">

                            <h3 class="tp-section-title">Daha Hızlı Büyümenizi Sağlayan Tüm Özelliklere Sahip Olun</h3>
                            <p>HızlıAppy, masaüstü ve mobil cihazlardan rahatlıkla kullanabilen bulut tabanlı randevu yönetim ve iş geliştirme uygulamasıdır.
                                .</p>
                        </div>
                    </div>
                </div>

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
                                        <h3 class="tp-service-five-title-sm"><a href="{{route('propartie.detail', $propartie->slug)}}">{{$propartie->name}}<br>
                                            </a>
                                        </h3>
                                        <p>
                                            {{$propartie->detail}}
                                        </p>
                                    </div>
                                </div>
                                <div class="tp-service-five-btn text-end">
                                    <a href="{{route('propartie.detail', $propartie->slug)}}"><i class="far fa-arrow-right"></i></a>
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
        @include('layouts.component.free-register')
        <!-- tp-cta-area-end -->

    </main>

@endsection
@section('scripts')

@endsection