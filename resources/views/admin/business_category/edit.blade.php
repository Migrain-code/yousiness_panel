@extends('admin.layouts.master')
@section('links')
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    Salon Kategorileri / Düzenle
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Salon Kategorileri Düzenle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.businessCategory.update', $businessCategory->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Kategoriename</label>
                        <input type="text" class="form-control input-default " name="name" value="{{$businessCategory->name}}" placeholder="Örneğin(Berberler)">
                    </div>
                    <div class="mb-3">
                        <label>Tanıtım Görseli</label>
                        <input type="file" class="form-control input-default " accept=".png, .jpg, .jpeg" name="image" placeholder="">
                        <img class="mt-2" src="{{asset($businessCategory->icon)}}" style="width: 100px">
                    </div>
                    <div class="mb-3">
                        <label>Kategori Mobil Görseli</label>
                        <input type="file" class="form-control input-default " name="mobile_image" placeholder="">
                        <img class="mt-2" src="{{asset($businessCategory->mobile_image)}}" style="width: 100px">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
@endsection
