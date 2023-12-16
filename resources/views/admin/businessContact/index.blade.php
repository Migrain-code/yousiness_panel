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
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                Business Kontakt
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
                <!-- Button trigger modal -->
                <!-- Modal -->
                {{--
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus-circle"></i></button>

                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="width: 800px">
                            <div class="modal-header">
                                <h5 class="modal-title">Kommentar Einfügen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <form method="post" style="width: 800px" action="{{route('admin.comment.store')}}" enctype="multipart/form-data">
                                <div class="modal-body">

                                    @csrf
                                    <div class="mb-3">
                                        <label> Name Nachname</label>
                                        <input type="text" class="form-control input-default " value="{{old('name')}}" name="name" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Salonname</label>
                                        <input type="text" class="form-control input-default " value="{{old('business_name')}}" name="business_name" >
                                    </div>
                                    <div class="mb-3">
                                        <label>İçerik Metni</label>
                                        <textarea class="form-control" name="description" >{{old('description')}}</textarea>
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
                --}}

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px;width: 100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Salonname</th>
                            <th>Telefon</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Transaktion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($infos as $info)
                            <tr class="rowDelete">
                                <td>{{$info->fullname}}</td>
                                <td>{{$info->business_name}}</td>
                                <td>
                                    <a href="tel:{{$info->phone}}">{{$info->phone}}</a>
                                </td>
                                <td>
                                    @if($info->status == 0)
                                        <span class="badge badge-danger" data-status="{{$info->id}}">wird Kontaktiert</span>
                                    @else
                                        <span class="badge badge-success" data-status="{{$info->id}}">Kontaktiert</span>
                                    @endif
                                </td>
                                <td>{{$info->created_at->format('d.m.Y H:i')}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" onclick="statusAction('{{$info->id}}')"><i class="fa fa-check-circle"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteAction('{{route('admin.businessInfo.destroy', $info->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></button>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.sm-note').summernote();
        });
    </script>
    <script>
        function statusAction(id){
            $.ajax({
                url:'{{route('admin.businessInfo.updateStatus')}}',
                type: "POST",
                data:{
                    id:id,
                    _token:'{{csrf_token()}}'
                },
                dataType:"JSON",
                success:function (res){

                    if(res.status=="success"){
                        var badgeElement = $('[data-status="' + id + '"]');
                        if (res.status_code == 1) {
                            badgeElement.removeClass('badge-danger').addClass('badge-success').text('Kontaktiert');
                        } else {
                            badgeElement.removeClass('badge-success').addClass('badge-danger').text('wird Kontaktiert');
                        }
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