@extends('admin.layouts.master')
@section('links')
    <script src="https://cdn.tiny.cloud/1/3e9f0ko5d22o4nthbxsin4hqt7rnt5376x7a91hjt1rqfoee/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

@endsection
@section('content')
    @include('admin.layouts.component.alert')
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
    <div class="card">
        <div class="card-header">
            <h1>Blog Yorumları</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display" style="min-width: 845px;width: 100%">
                    <thead>
                    <tr>
                        <th>Görsel</th>
                        <th>Müşterei Adı</th>
                        <th>Yorum</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($blog->comments as $comment)
                        <tr class="rowDelete">
                            <td><img src="{{image($comment->customer->image)}}" width="50px"></td>
                            <td>{{$comment->customer->name}}</td>
                            <td>
                                {{substr(strip_tags($comment->comment), 0, 50) . "..."}}
                            </td>
                            <td>
                                @if($comment->status == 0)
                                    <span class="badge badge-warning">Yayında Değil</span>
                                @else
                                    <span class="badge badge-success">Yayında</span>

                                @endif

                            </td>
                            <td>
                                <a class="btn btn-primary" style="margin-right: 0px;" href="{{route('admin.blogComment.edit', $comment->id)}}"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-warning" onclick="statusAction('{{$comment->id}}')"><i class="fa fa-check-circle"></i></button>
                                <button type="button" class="btn btn-danger" onclick="deleteAction('{{route('admin.blogComment.destroy', $comment->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-warning text-center mx-4 my-2">Kayıt Bulunamadı</div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
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
    <script>
        function statusAction(id){
            $.ajax({
                url:'{{route('admin.blogComment.store')}}',
                type: "POST",
                data:{
                    id:id,
                    _token:'{{csrf_token()}}'
                },
                dataType:"JSON",
                success:function (res){
                    if(res.status=="success"){
                        Swal.fire({
                            text: res.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Tamam!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        });

                    }
                }
            })
        }
        function deleteAction(hostUrl, index){
            var table = $('#example').DataTable();
            Swal.fire({
                text: "Bu kaydı silmek istediğine eminmisin?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, Sil!",
                cancelButtonText: "İptal et",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-danger"
                },
                customStyle: {
                    confirmButton:"margin-right:10px",
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url:hostUrl,
                        type: "POST",
                        data:{
                            _method:"DELETE",
                            _token:'{{csrf_token()}}'
                        },
                        dataType:"JSON",
                        success:function (res){
                            if(res.status=="success"){
                                table
                                    .row( $(this).parents('tr') )
                                    .remove()
                                    .draw();
                                Swal.fire({
                                    text: "Kayıt Silindi!.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Tamam!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    }
                                });
                                table.row(index).remove().draw();
                            }
                        }
                    })
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "İşlem İptal Edildi!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamam!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });

        }
    </script>
@endsection
