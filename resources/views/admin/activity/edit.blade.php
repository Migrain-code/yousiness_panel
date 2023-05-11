@extends('admin.layouts.master')
@section('links')

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                   Etkinlik Düzenle
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
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
                    <h3>{{$activity->title}}</h3>

                </div>
                <div class="row">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus-circle"></i> İşletme Ekle</button>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"><i class="fa fa-plus-circle"></i> Sponsor Ekle</button>
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2"><i class="fa fa-list"></i> Katılımcı Listesi</button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4"><i class="fa fa-list"></i> Sponsor Listesi</button>

                    </div>

                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.activity.update', $activity->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Başlık</label>
                            <input type="text" class="form-control input-default " value="{{$activity->title}}{{old('title')}}" name="title" >
                        </div>
                        <div class="mb-3">
                            <label>Görsel</label>
                            <input type="file" class="form-control input-default" name="image" >
                        </div>
                        <div class="mb-3">
                            <label>Başlangıç Zamanı</label>
                            <input type="datetime-local" class="form-control input-default " value="{{$activity->start_date}}{{old('start_date')}}" name="start_date" >
                        </div>
                        <div class="mb-3">
                            <label>Bitiş Zamanı</label>
                            <input type="datetime-local" class="form-control input-default " value="{{$activity->stop_date}}{{old('stop_date')}}" name="stop_date" >
                        </div>
                        <div class="mb-3">
                            <label>İçerik Metni</label>
                            <textarea class="sm-note" name="description">{!! $activity->description !!}{{old('description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta Key</label>
                            <input type="text" class="form-control input-default " value="{{$activity->meta_keys}}{{old('meta_keys')}}" name="meta_keys" >
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <input type="text" class="form-control input-default " value="{{$activity->meta_description}}{{old('meta_description')}}" name="meta_description" >
                        </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Sponsor Modal-->
    <div class="modal fade" id="exampleModalCenter3">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title">Sponsor Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form method="post" style="width: 800px" action="{{route('admin.activitySponsor.store')}}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="image" class="form-control">
                            <input type="hidden" name="activity_id" value="{{$activity->id}}">
                        </div>
                        <div class="row">

                            <div class="form-check custom-checkbox my-3">
                                <label class="form-check-label" for="customCheckBox1">Ana Sponsor Mu?</label>
                                <input type="checkbox" name="status" class="form-check-input" id="customCheckBox1">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Business Modal-->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title">İşletme Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form method="post" style="width: 800px" action="{{route('admin.activity.storeBusiness')}}">
                    <div class="modal-body">
                        @csrf
                        <label>İşletme Seçiniz</label>
                       <select multiple name="businesses[]" style="width: 100%;" class="form-control">

                           @forelse($businesses as $business)
                                <option value="{{$business->id}}">{{$business->name}}</option>
                           @empty
                            <option value="">Ekleyebileceğiniz İşletme Bulunamadı</option>
                           @endforelse
                       </select>
                        <input type="hidden" name="activity_id" value="{{$activity->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Business List Modal-->
    <div class="modal fade" id="exampleModalCenter2">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title">Katılımcı Listesi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <style>
                        table>thead{
                            background-color: #01a3ff;
                        }
                    </style>
                    <table class="table table-responsive-md" id="myTable2">
                        <thead style="color: black">
                        <tr>
                            <th><strong>İşletme Adı</strong></th>
                            <th><strong>Katılımcı Kodu</strong></th>
                            <th><strong>Durumu</strong></th>
                            <th><strong>İşlemler</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($activity->businesses as $activityBusiness)
                                <tr>
                                    <td>{{$activityBusiness->business->name}}</td>
                                    <td>{{$activityBusiness->activity_code}}</td>
                                    <td>
                                       @if($activityBusiness->status == 1)
                                            <span class="badge badge-success">Kabul Edildi</span>
                                        @else
                                            <span class="badge badge-danger">İptal Edildi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" onclick="cancelActivityBusiness('{{$activityBusiness->id}}')">Kabul / İptal</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <span class="alert alert-warning text-center w-100 d-block m-1">Katılımcı Kaydı Bulunamadı</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Sponsor List Modal-->
    <div class="modal fade" id="exampleModalCenter4">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title">Sponsor Listesi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <style>
                        table>thead{
                            background-color: #01a3ff;
                        }
                    </style>
                    <table class="table table-responsive-md" id="myTable3">
                        <thead style="color: black">
                        <tr>
                            <th><strong>Görsel</strong></th>
                            <th><strong>Link</strong></th>
                            <th><strong>Durumu</strong></th>
                            <th><strong>İşlemler</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($activity->sponsors as $activitySponsor)
                            <tr>
                                <td><img src="{{asset($activitySponsor->image)}}" width="50px"></td>
                                <td>{{$activitySponsor->link}}</td>
                                <td>
                                    @if($activitySponsor->status == 1)
                                        <span class="badge badge-success">Ana Sponsor</span>
                                    @else
                                        <span class="badge badge-warning">Normal Sponsor</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" style="margin-right: 0px;" href="{{route('admin.activitySponsor.edit', $activitySponsor->id)}}"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" onclick="deleteAction('{{route('admin.activitySponsor.destroy', $activitySponsor->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="alert alert-warning text-center w-100 d-block m-1">Sponsor Kaydı Bulunamadı</span>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        function deleteAction(hostUrl, index){
            var table = $('#myTable3').DataTable();
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
        function cancelActivityBusiness(id){
            $.ajax({
                url:'{{route('admin.activity.cancelledBusiness')}}',
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
        $(document).ready(function() {
            $('.sm-note').summernote({
                height:200
            });

        });
    </script>
@endsection
