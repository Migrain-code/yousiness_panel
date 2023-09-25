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

    </main>

@endsection
@section('scripts')

@endsection