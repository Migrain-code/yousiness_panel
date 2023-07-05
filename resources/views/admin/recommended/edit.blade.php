@extends('admin.layouts.master')
@section('links')

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Önerilen Link Düzenle
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
                   <h3> {{$recommendedLink->id}}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.recommendedLink.update', $recommendedLink->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Başlık Giriniz</label>
                            <input type="text" name="title" value="{{$recommendedLink->title}}" class="form-control input-default">
                        </div>
                        <div class="mb-3">
                            <label>Link Giriniz</label>
                            <input type="text" name="link" value="{{$recommendedLink->url}}" class="form-control input-default">
                        </div>

                        <div class="mb-3">
                            <label>Durum</label>
                            <input type="checkbox" class="form-check" name="status" @checked($recommendedLink->status == 1)> @if($recommendedLink->status == 1 ) Aktif @else Pasif @endif
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
