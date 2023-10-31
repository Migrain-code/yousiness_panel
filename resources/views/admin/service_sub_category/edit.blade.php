@extends('admin.layouts.master')
@section('links')
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    Hizmet Alt Kategorileri / Düzenle
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Hizmet Alt Kategorileri Düzenle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.serviceSubCategory.update', $serviceSubCategory->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label>Üst Kategoriename</label>
                    <select name="category_id" class="form-control mb-2">
                        <option>Üst Kategori seçiniz</option>
                        @forelse($categories as $category)
                            <option value="{{$category->id}}" @selected($serviceSubCategory->category_id == $category->id)>{{$category->name}}</option>
                        @empty

                        @endforelse
                    </select>
                    <div class="mb-3">
                        <label>Kategoriename</label>
                        <input type="text" class="form-control input-default " value="{{$serviceSubCategory->name}}" name="name" placeholder="Beisp. (Wimpern)">
                    </div>
                    <div class="mb-3">
                        <label>Öne Çıkarılan Numara</label>
                        <input type="text" class="form-control input-default " value="{{$serviceSubCategory->featured}}" name="number" placeholder="Örneğin(1,2,3)">
                    </div>
                    <div class="mb-3">
                        <label>İkon</label>
                        <input type="file" class="form-control input-default " name="icon" placeholder="Örneğin(1,2,3)">
                        <img src="{{asset($serviceSubCategory->icon)}}">
                    </div>
                    <div class="mb-3">
                        <label>Yurt Dışı Hizmeti mi?</label>
                        <input type="checkbox" class="" @checked($serviceSubCategory->is_abroad == 1) name="is_abroad" placeholder="Örneğin(1,2,3)">

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
