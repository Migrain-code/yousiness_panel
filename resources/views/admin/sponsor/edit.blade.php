@extends('admin.layouts.master')
@section('links')
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Sponsor Düzenle
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
                   <h3> {{$sponsor->name}}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.sponsor.update', $sponsor->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="mb-3">
                        <label>Adı</label>
                        <input type="text" class="form-control input-default " value="{{$sponsor->name}}" name="name" >
                    </div>
                    <div class="mb-3">
                        <label>Linki</label>
                        <input type="text" class="form-control input-default " value="{{$sponsor->link}}" name="link" >
                    </div>
                    <div class="mb-3">
                        <label>Görseli / Logosu</label>
                        <input type="file" accept=".png, .jpg, .jpeg" class="form-control input-default " name="image" >
                        <img src="{{asset($sponsor->image)}}" style="width: 100px;margin-top: 30px;">
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.sm-note').summernote({
                height:200
            });
        });
    </script>
@endsection
