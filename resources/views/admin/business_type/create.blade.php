@extends('admin.layouts.master')
@section('links')
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    Özellikler / Özellik Oluştur
                </h2>
            </div>
        </div>
    </div>
    @include('admin.layouts.component.alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading">
                    Özellik Ekle
                </h4>
                {{--
                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                --}}
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.propartie.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label>Özellik Adı</label>
                        <input type="text" class="form-control input-default " name="name" placeholder="Örneğin(Randevu Hatırlatma)">
                    </div>
                    <div class="mb-3">
                        <label>Özellik Açıklaması</label>
                        <textarea type="text" rows="5" class="form-control input-default " name="description" placeholder="Örneğin(Bu alana gireceğiniz veri işletmelerin özelliğin ne işe yaradığını bilmelerini sağlaycaktır)"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
@endsection
