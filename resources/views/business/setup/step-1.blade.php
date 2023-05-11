@extends('business.setup.layouts.master')
@section('content')
    @include('layouts.component.error')
    <div class="col-lg-4 col-md-12">
        <div class="on-board-wizard">
            <ul>
                <li>
                    <a href="#">
                        <div class="onboarding-progress active">
                            <span>1</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>İşletme Türü</h6>
                            <p>Size uygun işletme türünüzü seçiniz </p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-8 col-md-12">
        <div class="onboarding-content-box content-wrap">
            <div class="onborad-set">
                <div class="onboarding-title">
                    <h2>İşletme Türü Nedir?<span>*</span></h2>
                    <h6>Sistem sizi seçtiğiniz türe göre sınıflandırır. Bu yüzden burada seçeceğiniz seçeneğin sizin işletmenize uygun olması sizi müşterilerin daha hızlı bulmasını sağlar.</h6>
                </div>
                <style>

                </style>
                <div class="onboarding-content">
                    <form class="row" method="post" action="{{route('business.setup.step1Form')}}" id="step1Form">
                        @csrf
                        <!--item-->
                            @forelse($business_categories as $category)
                                <div class="col-lg-6">
                                    <div class="form-check-inline visits me-0 w-100">
                                        <label class="visit-btns" style="width: 100%">
                                            <input type="radio" name="category" class="form-check-input" @checked(auth('business')->user()->category_id == $category->id)  value="{{$category->id}}">
                                             <span class="visit-rsn" style="text-align: left">
                                                <img src="{{asset($category->icon)}}" class="me-2" width="30px" height="30px">
                                                {{$category->name}}
                                             </span>
                                        </label>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        <!--/item-->

                    </form>
                </div>
            </div>
            <div class="onboarding-btn">
                <a href="#" onclick="$('#step1Form').submit()">Devam</a>
            </div>
        </div>
    </div>

@endsection