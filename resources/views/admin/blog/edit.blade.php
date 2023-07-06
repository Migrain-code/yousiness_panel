@extends('admin.layouts.master')
@section('links')
    <script src="https://cdn.tiny.cloud/1/3e9f0ko5d22o4nthbxsin4hqt7rnt5376x7a91hjt1rqfoee/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Blog Düzenle
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
                <form method="post" action="{{route('admin.blog.update', $blog->id)}}" enctype="multipart/form-data">

                        @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label>Başlık</label>
                            <input type="text" class="form-control input-default " value="{{$blog->title}}{{old('title')}}" name="title" >
                        </div>
                        <div class="mb-3">
                            <label>Görsel</label>
                            <input type="file" class="form-control input-default" name="image" >
                        </div>
                        <div class="mb-3">
                            <label>İçerik Metni</label>
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
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ]
        });
    </script>
@endsection
