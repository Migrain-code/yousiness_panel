@extends('admin.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <style>
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 800px !important;
                margin: 1.75rem auto;
            }
        }
    </style>

    <script src="https://cdn.tiny.cloud/1/{{env('TINY_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
    @if($errors->any())
        <input type="text" style="visibility: hidden" id="error_code" value="error_code">
    @endif
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                Blog İşlemleri
                </h2>
            </div>
        </div>
    </div>
    <div class="col-12">
        @include('admin.layouts.component.alert')
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
                <h4 class="heading">
                Liste
                </h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus-circle"></i></button>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="width: 800px">
                            <div class="modal-header">
                                <h5 class="modal-title">Blog Hinzufügen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <form method="post" style="width: 800px" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                                <div class="modal-body">

                                    @csrf
                                    <div class="mb-3">
                                        <label>Überschrift</label>
                                        <input type="text" class="form-control input-default " value="{{old('title')}}" name="title" >

                                    </div>
                                    <div class="mb-3">
                                        <label>Bild</label>
                                        <input type="file" class="form-control input-default " value="{{old('image')}}" name="image" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Beschreibung</label>
                                        <textarea class="sm-note" name="description" >{{old('description')}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Key</label>
                                        <input type="text" class="form-control input-default " value="{{old('meta_keys')}}" name="meta_keys" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Description</label>
                                        <input type="text" class="form-control input-default " value="{{old('meta_description')}}" name="meta_description" >
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

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px;width: 100%">
                        <thead>
                        <tr>
                            <th>Bild</th>
                            <th>Başlık</th>
                            <th>Inhalt</th>
                            <th>Status</th>
                            <th>Transaktion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($blogs as $blog)
                            <tr class="rowDelete">
                                <td><img src="{{asset($blog->image)}}" width="50px"></td>
                                <td>{{$blog->title}}</td>
                                <td>
                                    {{substr(strip_tags($blog->description), 0, 100)}}
                                </td>
                                <td>
                                    @if($blog->status == 0)
                                        <span class="badge badge-warning">Nich Sendung</span>
                                    @else
                                        <span class="badge badge-success">Auf Sendung</span>

                                    @endif

                                </td>
                                <td>
                                    <a class="btn btn-primary" style="margin-right: 0px;" href="{{route('admin.blog.edit', $blog->id)}}"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-warning" onclick="statusAction('{{$blog->id}}')"><i class="fa fa-check-circle"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteAction('{{route('admin.blog.destroy', $blog->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-warning text-center mx-4 my-2">Keine Aufzeichnungen gefunden</div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <style>
            .btn.btn-primary{
                margin-right: 17px;
            }
        </style>
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
                url:'{{route('admin.blog.updateStatus')}}',
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
                            confirmButtonText: "OK",
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
                                    confirmButtonText: "OK",
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
                        text: "Transaktion abgebrochen!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });

        }
    </script>
@endsection