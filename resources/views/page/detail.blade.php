@extends('layouts.master')
@section('title', $page->title)
@section('meta_description', $page->meta_description)
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
                                    <span>{{$page->title}}</span> <br>

                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-breadcrumb-area-end -->

        <!-- tp-contact-area-strat -->
        <div class="contact-info-area pb-90">
            <div class="container">
                <div class="row py-3">
                    {!! $page->description !!}
                </div>
            </div>
        </div>


    </main>
@endsection
@section('scripts')

@endsection