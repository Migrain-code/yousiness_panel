@extends('admin.layouts.master')
@section('links')

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    Swiper Düzenle
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
                    <h3> {{$swiper->name}}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.swiper.update', $swiper->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Başlık</label>
                        <input type="text" class="form-control input-default " value="{{$swiper->title}} {{old('title')}}" name="title" >
                    </div>
                    <div class="mb-3">
                        <label>Link</label>
                        <input type="text" class="form-control input-default " value="{{$swiper->link}} {{old('link')}}" name="link" >
                    </div>
                    <div class="mb-3">
                        <label>Görsel</label>
                        <input type="file" class="form-control input-default" name="image" >
                        <img src="{{asset($swiper->image)}}" width="100px" class="mt-3">
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
