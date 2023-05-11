@extends('admin.layouts.master')
@section('links')
    <style>
        table.dataTable thead .sorting_asc:after {
            content: "\f0de";
            opacity: 0;
        }
    </style>
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                   Paket Özellikleri / Özellik Bilgileri
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Özellik Düzenle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                   <form method="post" class="row"  action="{{route('admin.bussinessPackagePropartieList.update', $bussinessPackagePropartieList->id)}}">
                       @csrf
                       @method('PUT')
                       <div class="col-6">
                           <div class="mb-3">
                               <label>Özellik Adı</label>
                               <input type="text" class="form-control input-default " value="{{$bussinessPackagePropartieList->name}}" name="name" placeholder="">
                           </div>

                           <div class="text-center mt-5 w-100">
                               <button class="btn btn-primary w-100">Güncelle</button>
                           </div>

                       </div>
                       <div class="col-6">
                           <div class="card" style="border: 1px solid #686767">
                               <div class="card-header">
                                   <h4 class="card-title">Özelliğin Bulunduğu Paketler</h4>
                               </div>
                               <div class="card-body">
                                   <div class="table-responsive">
                                       <table id="example2" class="display" style="width:100%">
                                           <thead>
                                           <tr>
                                               <th class="text-center">Paket Adı</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                               @forelse($bussinessPackagePropartieList->packages as $list)
                                                   <tr style="border-bottom: 1px solid #686767">
                                                       <td>
                                                            {{$list->package->name}}
                                                       </td>
                                                   </tr>
                                               @empty
                                                   <tr>
                                                       <td>
                                                           <div class="alert alert-warning text-center">Özellik Herhangi bir Paket listesine eklenmemiş</div>
                                                       </td>
                                                   </tr>
                                               @endforelse
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>

                       </div>
                   </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="/admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/plugins-init/datatables.init.js"></script>
    <script>
        $('#customCheckBox3').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection
