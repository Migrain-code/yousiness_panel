@extends('admin.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <style>
        .ts-control {
            border: 1px solid #d0d0d0;
            padding: 8px 8px;
            width: 100%;
            overflow: hidden;
            position: relative;
            z-index: 1;
            box-sizing: border-box;
            box-shadow: none;
            border-radius: 20px;
            display: flex;
            flex-wrap: wrap;
            height: 40px;

        }
        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                Geschäftspartner
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
                Liste
                </h4>
                <div>
                    <a class="btn btn-success" href="{{route('admin.business.export')}}"><i class="fa fa-plus-search"></i> Excel Download</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target=".bd-example-modal-lg-2"><i class="fa-solid fa-ring me-2"></i>Bildirim
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus-search"></i> Filtern</button>

                </div>
                <!-- Button trigger modal -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Salon/e Filtern</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <form method="get" action="{{route('admin.business.index')}}">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Salonname</label>
                                        <input type="text" class="form-control input-default " name="name" placeholder="Beisp. (Wimpern)">
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefon</label>
                                        <input type="text" class="form-control input-default " name="phone" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label>PLZ / Stadt</label>
                                        <select class="" id="city_select" name="city" style="border-radius: 18px;">
                                            <option value="" selected>Auswählen</option>
                                            @forelse($cities as $city)
                                                <option value="{{$city->id}}">{{$city->post_code ." ," . $city->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cateogry_select">Kategorie</label> <br>
                                        <select class="" id="cateogry_select" name="category_id" style="border-radius: 18px;width: 100%;">
                                            <option value="" selected>Kategorie wählen</option>
                                            @forelse($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-danger light" href="{{route('admin.business.index')}}">Filter löschen</a>
                                    <button type="submit" class="btn btn-primary">Filtern</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display mb-3" style="min-width: 845px">
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Salonname</th>
                            <th>Telefon</th>
                            <th>Status</th>
                            <th>Paket</th>
                            <th>Transaktion</th>
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
                                                Keine Installation
									        </span>
                                        @else
                                            <span class="badge badge-sm light badge-success">
                                                <i class="fa fa-circle text-success me-1"></i>
                                                Aktiv
									        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($business->package)
                                            {{$business->package->name}} /<span class="text-primary"> {{$business->package->type == 0 ? "Monat" : "Jahres"}}</span>
                                        @else
                                            Paket Bulunamadı
                                        @endif
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
    <div class="modal fade bd-example-modal-lg-2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bildirim Gönder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form method="post" action="{{route('admin.business.sendNotify')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="7" name="description"> </textarea>
                        </div>
                        <div class="form-group">
                            <label>Customer</label>
                            <select class="form-control" multiple name="businesses[]">
                                <option value="all" selected>Tümü</option>
                                @foreach($businesses as $business)
                                    <option value="{{$business->id}}">{{$business->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Schließen</button>
                            <button type="submit" class="btn btn-primary">Speichern</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <script>
        var mySelect = new TomSelect("#city_select", {
            remoteUrl: '/api/city/search',
            remoteSearch: true,
            create: false,
            highlight: false,
            load: function(query, callback) {
                $.ajax({
                    url: '/api/city/search', // Sunucu tarafındaki arama API'sinin URL'si
                    method: 'POST',
                    data: { q: query }, // Arama sorgusu
                    dataType: 'json', // Beklenen veri tipi
                    success: function(data) {

                        var results = data.cities.map(function(item) {
                            console.log('item', item.name);
                            return {
                                value: item.id,
                                text: item.post_code + "," + item.name,
                            };
                        });

                        callback(results);
                    },
                    error: function() {
                        console.error("Arama sırasında bir hata oluştu.");
                    }
                });
            }
        });

    </script>

@endsection
