@extends('admin.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    İşletmeler / İşletme Listesi
                </h2>
            </div>
        </div>
    </div>
    <div class="col-12">
        @include('admin.layouts.component.alert')
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    İşletme Listesi
                </h4>
                <!-- Button trigger modal -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display mb-3" style="min-width: 845px">
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>İşletme Adı</th>
                            <th>Telefon</th>
                            <th>Durum</th>
                            <th>Tanımlı Paket</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($businesses as $business)
                                <tr>
                                    <td>
                                        <img class="rounded-circle" width="35" src="{{asset($business->logo)}}" alt="">
                                    </td>
                                    <td>{{$business->name}}</td>
                                    <td>
                                        <a href="tel:{{$business->phone}}"><strong>{{$business->phone}}</strong></a>
                                    </td>
                                    <td>
                                        @if($business->status==0)
                                            <span class="badge badge-sm light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                Bloklandı
									        </span>
                                        @elseif($business->status==1)
                                            <span class="badge badge-sm light badge-warning">
                                                <i class="fa fa-circle text-warning me-1"></i>
                                                Kurulum Yapılmadı
									        </span>
                                        @else
                                            <span class="badge badge-sm light badge-success">
                                                <i class="fa fa-circle text-success me-1"></i>
                                                Aktif
									        </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$business->package->name}} /<span class="text-primary"> {{$business->package->type == 0 ? "Aylık" : "Yıllık"}}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('admin.business.edit', $business->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0)" onclick="deleteAction('{{route('admin.business.destroy', $business->id)}}', '{{$loop->index}}')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning">Sistemde Kayıtlı İşletme Bilgisi Bulunamadı</div>
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
    <script src="/admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/plugins-init/datatables.init.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteAction(hostUrl, index){
            var table = $('#example3').DataTable();
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
