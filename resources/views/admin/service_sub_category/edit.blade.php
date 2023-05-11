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
                <form method="post" action="{{route('admin.serviceSubCategory.update', $serviceSubCategory->id)}}">
                    @csrf
                    @method('PUT')
                    <label>Üst Kategori Adı</label>
                    <select name="category_id" class="form-control mb-2">
                        <option>Üst Kategori seçiniz</option>
                        @forelse($categories as $category)
                            <option value="{{$category->id}}" @selected($serviceSubCategory->category_id == $category->id)>{{$category->name}}</option>
                        @empty

                        @endforelse
                    </select>
                    <div class="mb-3">
                        <label>Kategori Adı</label>
                        <input type="text" class="form-control input-default " value="{{$serviceSubCategory->name}}" name="name" placeholder="Örneğin(Berber)">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
@endsection
