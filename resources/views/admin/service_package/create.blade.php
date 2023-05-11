@extends('admin.layouts.master')
@section('links')
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    Paket / Paket Oluştur
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Paket Ekle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                   <form method="post" class="row"  action="{{route('admin.servicePackage.store')}}">
                       @csrf
                       <div class="col-6">
                               <div class="mb-3">
                                   <label>Paket Adı</label>
                                   <input type="text" class="form-control input-default " name="title" placeholder="Örneğin(Randevu Hatırlatma)">
                               </div>
                               <div class="mb-3">
                                   <label>Paket Fiyatı</label>
                                   <textarea type="text" rows="5" class="form-control input-default " name="price" placeholder="Örneğin(Bu alana gireceğiniz veri işletmelerin fiyatlarını bilmelerini sağlaycaktır)"></textarea>
                               </div>
                               <div class="mb-3 text-center">
                                   <button type="submit" class="btn btn-primary">Kaydet</button>
                               </div>

                       </div>
                       <div class="col-6">
                           <div class="card">
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
                                                       <label class="form-check-label" for="customCheckBox3"><u>Tümünü Seç</u></label>
                                                   </div>
                                               </th>
                                               <th>Özellik Adı</th>
                                           </tr>
                                           </thead>
                                               <tbody>
                                                @forelse($proparties as $propartie)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="form-check-input" value="{{$propartie->id}}" name="propartie[]">
                                                        </td>
                                                        <td class="text-center">{{$propartie->name}}</td>
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
