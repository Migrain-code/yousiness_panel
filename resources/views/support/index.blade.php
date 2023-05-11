@extends('layouts.master')
@section('meta_keys',"")
@section('meta_description',"")
@section('title','')
@section('styles')

@endsection
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area breadcrumb-height p-relative blue-bg-2">
            <div class="breadcrumb__shape-1">
                <img src="/business/assets/img/breadcrumb/breadcrumb-shape-1.png" alt="">
            </div>
            <div class="breadcrumb__shape-2">
                <img src="/business/assets/img/breadcrumb/breadcrumb-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-7">
                        <div class="breadcrumb__content">
                            <h3 class="breadcrumb__title tp-char-animation">Sıkça Sorulan Sorular</h3>
                            <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".4s">
                                <span class="child-one"><a href="/">Anasayfa</a></span>
                                <span class="dvdr"><i class="fal fa-angle-right"></i></span>
                                <span>S.S.S</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-lg-4 text-center text-md-end">
                        <div class="breadcrumb__img p-relative text-start z-index">
                            <img class="z-index-3" src="/business/assets/img/cta/cta-shape-5-1.png" alt="">
                            <div class="breadcrumb__sub-img wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".4s">
                                <img src="/business/assets/img/breadcrumb/breadcrumb-sub-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- blog-grid-area-start -->
        <div class="tp-faq-area pt-40 pb-40 fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="tp-custom-accordion">
                            <div class="accordion" id="accordionExample">
                                @forelse($faqs as $faq)
                                    <div class="accordion-items {{$loop->first ? 'tp-faq-active' : ''}}">
                                        <h2 class="accordion-header" id="heading{{$loop->index}}">
                                            <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                                {{$faq->question}}
                                                <span class="accordion-btn"></span>
                                            </button>
                                        </h2>
                                        <div id="collapse{{$loop->index}}" class="accordion-collapse collapse {{$loop->first ? 'show' : ''}}" aria-labelledby="heading{{$loop->index}}"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                               {{$faq->answer}}
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

        <!-- blog-grid-area-end -->



        <!-- tp-cta-area-start -->
        @include('layouts.component.free-register')
        <!-- tp-cta-area-end -->

    </main>

@endsection
@section('scripts')

@endsection