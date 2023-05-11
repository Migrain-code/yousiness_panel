@extends('layouts.master')
@section('meta_keys', $blog->meta_keys)
@section('meta_description', $blog->meta_description)
@section('title',$blog->title)
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
                                <span>{{$blog->created_at->translatedFormat('d F Y')}}</span>
                                <h3 class="blog-details-banner-title">{{$blog->title}}</h3>
                            </div>
                            <div class="tp-blog-author-info-box d-flex align-items-center">
                                <div class="tp-blog-avata">
                                    <img src="{{asset(config('settings.site_admin_profile'))}}" alt="">
                                </div>
                                <div class="tp-blog-author-info">
                                    <h5>{{config('settings.site_admin_name')}}</h5>
                                    <span>{{config('settings.site_admin_mission')}} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="blog-details-social-box z-index-3 text-md-end text-start">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-vimeo-v"></i></a>
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
                            <img src="{{asset($blog->image)}}" style="width: 100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-banner-end -->



        <!-- postbox area start -->
        <div class="postbox__area pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="postbox__details-wrapper pr-20">
                            <article>
                                <div class="postbox__details-title-box pb-30"> {!! $blog->description !!}</div>

                                <div class="postbox__comment mb-65">
                                    @if($blog->comments->count() > 0)
                                        <h3 class="postbox__comment-title">{{$blog->comments->count()}} Yorum</h3>
                                        <ul>
                                            @foreach($blog->comments as $comment)
                                                <li>
                                                    <div class="postbox__comment-box d-flex">
                                                        <div class="postbox__comment-info ">
                                                            <div class="postbox__comment-avater mr-20">
                                                                <img src="{{asset($comment->business->logo)}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="postbox__comment-text">
                                                            <div class="postbox__comment-name d-flex">
                                                                <h5>{{$comment->business->name}}</h5>
                                                                <span class="post-meta"> April 8, 2022 at 7:38 am</span>
                                                            </div>
                                                            <p>{{$comment->comment}}</p>

                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="alert alert-warning text-center">Bu blog ile ilgili yorum bulunamadı. <strong>Hadi ilk yorumu sen yap</strong></div>
                                    @endif
                                </div>
                                @if(auth('business')->check())
                                    <div class="postbox__comment-form">
                                        <h3 class="postbox__comment-form-title">Yorum Yap</h3>
                                        <form action="#" class="box">
                                            <div class="row gx-20">

                                                <div class="col-xxl-12">
                                                    <div class="postbox__comment-input mb-20">
                                                        <textarea class="textareaText" required></textarea>
                                                        <span class="floating-label-2">Yorumunuz</span>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div class="postbox__comment-agree">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Gönderilen verilerimin toplanıp saklandığını kabul ediyorum.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div class="postbox__comment-btn">
                                                        <button type="submit" class="tp-btn-inner">Gönder</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="alert alert-primary text-center">Yorum Yapabilmeniz için <strong>giriş yapmanız gerekmektedir</strong></div>
                                @endif
                            </article>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="sidebar__wrapper">

                            <div class="sidebar__widget mb-40">
                                <div class="sidebar__widge-title-box">
                                    <h3 class="sidebar__widget-title">Son Gönderiler</h3>
                                </div>
                                <div class="sidebar__widget-content" style="padding: 25px 30px;">
                                    <div class="sidebar__post rc__post">
                                        @forelse($blogs as $blog)
                                                <div class="rc__post mb-20 d-flex">
                                                    <div class="rc__post-thumb mr-20">
                                                        <a href="{{route('blog.detail', $blog->slug)}}"><img src="{{asset($blog->image)}}" alt=""></a>
                                                    </div>
                                                    <div class="rc__post-content">
                                                        <h3 class="rc__post-title">
                                                            <a href="{{route('blog.detail', $blog->slug)}}">{{$blog->title}}</a>
                                                        </h3>
                                                        <div class="rc__meta">
                                                            <span>{{$blog->created_at->translatedFormat('d F Y')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($loop->last)
                                                    <div class="text-center">
                                                        <a class="tp-btn-blue-lg purple-bg circle-effect" href="{{route('blog.index')}}" style="height: 40px;line-height: 40px">Tüm Haberler</a>
                                                    </div>
                                                @endif
                                        @empty

                                        @endforelse

                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-40">
                                <div class="sidebar__widge-title-box">
                                    <h3 class="sidebar__widget-title">Kategoriler</h3>
                                </div>
                                <div class="sidebar__widget-content" style="padding: 25px 30px;">
                                    <ul>
                                        @forelse($categories as $category)
                                            <li>
                                                <a href="#">
                                                    <span>
                                                        <i class="fal fa-angle-right"></i>
                                                        {{$category->name}}
                                                    </span>
                                                    <span>
                                                        ({{$category->blogs->count()}})
                                                    </span>
                                                </a>
                                            </li>

                                        @empty

                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- postbox area end -->


        <!--Portfolio Start-->
        <div class="blog-grid-inner grey-bg pt-100 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="popular-blog-title mb-40 text-center">
                            <h4>İlgili Bloglar</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-details-slider-wrapper">
                            <div class="swiper-container blog-slider-active pb-50">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="tp-blog-item">
                                            <div class="tp-blog-thumb fix">
                                                <a href="#"><img src="assets/img/blog/blog-grid-1.jpg" alt=""></a>
                                            </div>
                                            <div class="tp-blog-content">
                                                <div class="tp-blog-meta d-flex align-items-center">
                                                    <div class="tp-blog-category category-color-1">
                                                        <span>Crm Software</span>
                                                    </div>
                                                    <div class="tp-blog-date">
                                                        <span>28 April, 2023</span>
                                                    </div>
                                                </div>
                                                <div class="tp-blog-title-box">
                                                    <a class="tp-blog-title-sm" href="#">2023 Professional Year <br> In Review</a>
                                                </div>
                                                <div class="tp-blog-author-info-box d-flex align-items-center">
                                                    <div class="tp-blog-avata">
                                                        <img src="assets/img/blog/blog-avata-2.png" alt="">
                                                    </div>
                                                    <div class="tp-blog-author-info">
                                                        <h5>Hilary Ouse</h5>
                                                        <span>Founder & CEO Dulalix</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Portfolio End-->
        @include('layouts.component.free-register')

    </main>
@endsection
