@extends('admin.layouts.master')
@section('links')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Blog Bearbeiten
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
                    {{$blog->title}}
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.businessBlog.update', $blog->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label>Überschrift</label>
                            <input type="text" class="form-control input-default " value="{{$blog->title}}{{old('title')}}" name="title" >
                        </div>
                        <div class="mb-3">
                            <label>Bild</label>
                            <input type="file" class="form-control input-default" name="image" >
                        </div>
                        <div class="mb-3">
                            <label>Beschreibung</label>
                            <textarea class="sm-note" name="description">{!! $blog->description !!}{{old('description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta Key</label>
                            <input type="text" class="form-control input-default " value="{{$blog->meta_keys}}{{old('meta_keys')}}" name="meta_keys" >
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <input type="text" class="form-control input-default " value="{{$blog->meta_description}}{{old('meta_description')}}" name="meta_description" >
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
