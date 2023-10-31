@extends('admin.layouts.master')
@section('links')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Yorum Düzenle
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
                   <h3> {{$comment->name}}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.comment.update', $comment->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label> Name Nachname</label>
                            <input type="text" class="form-control input-default " value="{{$comment->name}} {{old('name')}}" name="name" >
                        </div>
                        <div class="mb-3">
                            <label>Salonname</label>
                            <input type="text" class="form-control input-default " value="{{$comment->business}} {{old('business_name')}}" name="business_name" >
                        </div>
                        <div class="mb-3">
                            <label>İçerik Metni</label>
                            <textarea class="form-control" name="description" >{{$comment->description}} {{old('description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Salon Logo</label>
                            <input type="file" class="form-control input-default"  name="image" >
                            <img src="{{asset($comment->image)}}" width="100px" class="mt-3">
                        </div>
                        <div class="mb-3">
                            <label>Kullanıcı Türü</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_statu" @checked($comment->user_statu == 1) value="1" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Kunde
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_statu" @checked($comment->user_statu == 0) value="0" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    İşletme
                                </label>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Abbrechen</button>
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
