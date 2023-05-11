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
                    Paketler / Paket Bilgileri
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Paket Düzenle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                   <form method="post" class="row"  action="{{route('admin.businessPackage.update', $bussinessPackage->id)}}">
                       @csrf
                       @method('PUT')
                       <div class="col-6">
                           <div class="mb-3">
                               <label>Paket Adı</label>
                               <input type="text" class="form-control input-default " value="{{$bussinessPackage->name}}" name="name" placeholder="">
                           </div>
                           <div class="mb-3">
                               <label>Paket Fiyatı</label>
                               <input type="text" class="form-control input-default " value="{{$bussinessPackage->price}}" name="price" placeholder="">
                           </div>
                           <div class="mb-3">
                               <label>Paket Tipi</label>
                               <select type="text" class="form-control input-default " name="type">
                                   <option value="0" @selected($bussinessPackage->type==0)>Aylık</option>
                                   <option value="1" @selected($bussinessPackage->type==1)>Yıllık</option>

                               </select>
                           </div>
                           <div class="text-center mt-5 w-100">
                               <button class="btn btn-primary w-100">Güncelle</button>
                           </div>

                       </div>
                       <div class="col-6">
                           <div class="card" style="border: 1px solid #686767">
                               <div class="card-header">
                                   <h4 class="card-title">Özellik Seçiniz</h4>
                               </div>
                               <div class="card-body">
                                   <div class="table-responsive">
                                       <table id="example2" class="display" style="width:100%">
                                           <thead>
                                           <tr>
                                               <th>
                                                   <div class="form-check custom-checkbox checkbox-success" style="margin-bottom: -16px;">
                                                       <input type="checkbox" class="form-check-input" id="customCheckBox3">
                                                       <label class="form-check-label" for="customCheckBox3"><u></u></label>
                                                   </div>
                                               </th>
                                               <th class="text-center">Özellik Adı</th>
                                               <th class="text-center">Durumu</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                               @forelse($list as $propartie)
                                                   <tr style="border-bottom: 1px solid #686767">
                                                       <td>
                                                           <input type="checkbox" class="form-check-input" @checked(in_array($propartie->id, $propartieList)) value="{{$propartie->id}}" name="propartie[]">
                                                       </td>
                                                       <td class="text-center">{{$propartie->name}}</td>
                                                       <td class="text-left">{{$propartie->count == "sınırsız" ? "Sınırsız" : $propartie->count}}</td>
                                                   </tr>
                                               @empty
                                                   <tr>
                                                       <td colspan="2">
                                                           <div class="alert alert-warning text-center">Özellik listesi boş</div>
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
