@extends('admin.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    İşletme Kategorileri / Liste
                </h2>
            </div>
        </div>
    </div>
    <div class="col-12">
        @include('admin.layouts.component.alert')
        @include('admin.layouts.component.error')
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    İşletme Kategorileri Listesi
                </h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus-circle"></i></button>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">İşletme Kategorileri Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <form method="post" action="{{route('admin.businessCategory.store')}}" enctype="multipart/form-data">
                            <div class="modal-body">
                                    @csrf

                                    <div class="mb-3">
                                        <label>Kategori Adı</label>
                                        <input type="text" class="form-control input-default " name="name" placeholder="Örneğin(Berber)">
                                    </div>
                                    <div class="mb-3">
                                        <label>Kategori Görseli</label>
                                        <input type="file" class="form-control input-default " name="image" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label>Kategori Mobil Görseli</label>
                                        <input type="file" class="form-control input-default " name="mobile_image" placeholder="">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                                <button type="submit" class="btn btn-primary">Speichern</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($businessCategories as $categorie)
                                <tr class="rowDelete">
                                    <td>{{$categorie->name}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.businessCategory.edit', $categorie->id)}}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger" onclick="deleteAction('{{route('admin.businessCategory.destroy', $categorie->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="alert alert-warning text-center mx-4 my-2">Kayıt Bulunamadı</div>
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
            var table = $('#example').DataTable();
            Swal.fire({
                text: "Bu kategoriyi silmek istediğine eminmisin? Sildiğiniz takdirde bu kategoriyi ekleyen işletmelerin kategori listesinden de silinecek.",
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
