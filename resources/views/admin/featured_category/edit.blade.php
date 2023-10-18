@extends('admin.layouts.master')
@section('links')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Öne Çıkan Düzenle
                </h2>
            </div>
        </div>
    </div>
    <div class="col-12">
        @if($errors->any())

            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                   <h3> {{$featuredCategorie->id}}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.featuredCategorie.update', $featuredCategorie->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Meta Başlık Giriniz</label>
                            <input type="text" name="meta_title" value="{{$featuredCategorie->meta_title}}" class="form-control input-default">
                        </div>
                        <div class="mb-3">
                            <label>Meta Açıklama Giriniz</label>
                            <input type="text" name="meta_description" value="{{$featuredCategorie->meta_description}}" class="form-control input-default">
                        </div>
                        <div class="mb-3">
                            <label>İşletme Kategorisi Seçiniz</label>
                            <select class="form-control input-default " name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected($category->id == $featuredCategorie->category_id)>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Şehir Seçiniz</label>
                            <select class="form-control input-default " multiple name="city_ids[]">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" @selected(in_array($city->id, $cityIds))>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Durum</label>
                            <input type="checkbox" class="form-check" name="status" @checked($featuredCategorie->status == 1)> @if($featuredCategorie->status == 1 ) Aktif @else Pasif @endif
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.sm-note').summernote({
                height:200
            });
        });
    </script>
@endsection
