@extends('layouts.master')
@section('meta_keys',"Tüm Blog Yazıları")
@section('meta_description',"HızlıAppy Blog Yazıları")
@section('title','Haberler')
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
                     <h3 class="breadcrumb__title tp-char-animation">Bloglarımız</h3>
                     <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".4s">
                        <span class="child-one"><a href="/">Anasayfa</a></span>
                        <span class="dvdr"><i class="fal fa-angle-right"></i></span>
                        <span>Bloglar</span>
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

      <!-- blog-grid-area-start -->
      <div class="blog-grid-area pt-100 pb-100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="blog-grid-arrow p-relative">
                     <div class="grid-next d-none d-sm-block">
                        <button>
                           <i class="far fa-angle-left"></i>
                           <svg width="36" height="100" viewBox="0 0 36 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.99999 14C0 7.5 0.5 3.5 0 0L-0.000484467 99.5C-0.000415802 96.7234 1.00003 88 23 71.5C44.9999 55 32.5 37.1667 24 30.5C19.8333 27.1667 9.48375 19.8289 4.99999 14Z" fill="white"/>
                           </svg>
                        </button>
                     </div>
                     <div class="grid-prev d-none d-sm-block">
                        <button>
                           <i class="far fa-angle-right"></i>
                           <svg width="36" height="100" viewBox="0 0 36 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M30.3164 14C35.3164 7.5 34.8164 3.5 35.3164 0L35.3169 99.5C35.3168 96.7234 34.3164 88 12.3164 71.5C-9.68354 55 2.81642 37.1667 11.3164 30.5C15.4831 27.1667 25.8327 19.8289 30.3164 14Z" fill="white"/>
                           </svg>
                        </button>
                     </div>
                     <div class="swiper-container blog-grid-slider-active">
                        <div class="swiper-wrapper">
                           @forelse($sliders as $slider)
                              <div class="swiper-slide">
                                 <div class="blog-grid-slider blog-grid-slider-bg d-flex align-items-center blog-grid-slider-height" data-background="{{asset($slider->image)}}">
                                    <div class="blog-grid-slider-wrapper">
                                       <div class="blog-grid-slider-meta">
                                          <span class="child-one">{{$slider->created_at->translatedFormat('d F Y')}}</span>
                                          <span class="child-two"></span>
                                       </div>
                                       <div class="blog-grid-slider-title-box">
                                          <h4 class="blog-grid-slider-title"><a href="blog-details.html">{{$slider->title}}</a></h4>
                                          <p style="max-width: 550px">{{$slider->detail}}
                                          </p>
                                       </div>
                                       <!--<div class="tp-blog-author-info-box blog-grid-avata-box d-flex align-items-center">
                                          <div class="tp-blog-avata">
                                             <img src="assets/img/blog/blog-avata-2.png" alt="">
                                          </div>
                                          <div class="tp-blog-author-info">
                                             <h5>Hilary Ouse</h5>
                                             <span>Founder & CEO Dulalix</span>
                                          </div>
                                       </div>-->
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
      </div>
      <!-- blog-grid-area-end -->

      <!--Portfolio Start-->
      <div class="portfolio blog-grid-inner mb-80">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                  <div class="tp-about__section-box text-center mb-40">
                     @if($blogs->count() > 150)
                        <h4 class="inner-section-subtitle">150'den fazla haber</h4>
                     @endif
                     <h3 class="tp-section-title">Birlikte daha fazlasını başarın</h3>
                     <p>HızlıAppy bloğu, uzaktaki her şey için bilgi merkezinizdir.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12">
                  <div class="portfolio-filter masonary-menu text-center mb-35">
                     <button data-filter="*" class="active"><span>Tümü</span></button>
                     @forelse($categories as $categorie)
                        <button data-filter=".cat{{$categorie->id}}"><span>{{$categorie->name}}</span></button>

                     @empty

                     @endforelse

                  </div>
               </div>
            </div>
            <div class="row grid blog-grid-inner">
               @forelse($blogs as $blog)
                  <div class="col-xl-4 col-lg-6 col-md-6 mb-30 grid-item cat{{$blog->category_id}}">
                     <div class="tp-blog-item">
                        <div class="tp-blog-thumb fix">
                           <a href="{{route('blog.detail', $blog->slug)}}"><img src="{{asset($blog->image)}}" style="min-height: 260px;max-height: 260px" alt=""></a>
                        </div>
                        <div class="tp-blog-content">
                           <div class="tp-blog-meta d-flex align-items-center">
                              <div class="tp-blog-category category-color-1">
                                 <span>{{$blog->category->name}}</span>
                              </div>
                              <div class="tp-blog-date">
                                 <span>{{$blog->created_at->translatedFormat('d F Y')}}</span>
                              </div>
                           </div>
                           <div class="tp-blog-title-box">
                              <a class="tp-blog-title-sm" href="{{route('blog.detail', $blog->slug)}}">{{$blog->title}}</a>
                           </div>
                           <div class="tp-blog-author-info-box d-flex align-items-center">
                              <div class="tp-blog-avata">
                                 <img src="{{asset(config('settings.site_admin_profile'))}}" alt="">
                              </div>
                              <div class="tp-blog-author-info">
                                 <h5>{{config('settings.site_admin_name')}}</h5>
                                 <span>{{config('settings.site_admin_mission')}}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @empty

               @endforelse

            </div>
         </div>
      </div>
      <!--Portfolio End-->

      <!-- tp-cta-area-start -->
      @include('layouts.component.free-register')

      <!-- tp-cta-area-end -->

   </main>
@endsection
@section('scripts')

@endsection