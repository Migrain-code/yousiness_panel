@extends('admin.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                Dinstleistungen Unterkategorien
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
                Liste
                </h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus-circle"></i></button>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hizmet Alt Kategorileri Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <form method="post" action="{{route('admin.serviceSubCategory.store')}}">
                            <div class="modal-body">
                                    @csrf
                                    <label>Oberkategorie</label>
                                    <select name="category_id" class="form-control mb-2">
                                        <option>Üst Kategori seçiniz</option>
                                        @forelse($categories as $category)
                                           <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                <div class="mb-3">
                                        <label>Unterkategorie</label>
                                        <input type="text" class="form-control input-default " name="name" placeholder="Örneğin(Berber)">
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
                            <th>Oberkategorie</th>
                            <th>Unterkategorie</th>
                            <th>NR</th>
                            <th>Transaktion</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($subCategories as $subCategorie)
                                <tr class="rowDelete">
                                    <td>{{$subCategorie->category->name}}</td>
                                    <td>
                                        {{$subCategorie->name}}
                                    </td>
                                    <td>{{$subCategorie->featured}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.serviceSubCategory.edit', $subCategorie->id)}}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger" onclick="deleteAction('{{route('admin.serviceSubCategory.destroy', $subCategorie->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
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
    <script src="/admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/plugins-init/datatables.init.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
