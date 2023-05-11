@extends('admin.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
    <style>
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
        }
        .single-pricing{
            background:#fff;
            padding:40px 20px;
            border-radius:5px;
            position:relative;
            border:1px solid #eee;
            box-shadow: 0 10px 40px -10px rgba(0,64,128,.09);
            transition:0.3s;
            height: 500px;
            max-height: 500px;
            overflow: auto;
        }
        @media only screen and (max-width:480px) {
            .single-pricing {margin-bottom:30px;}
        }
        .single-pricing:hover{
            box-shadow:0px 60px 60px rgba(0,0,0,0.1);
            transform: translate(0, -10px);
        }
        .price-label {
            color: #fff;
            background: #ffaa17;
            font-size: 16px;
            width: 100px;
            margin-bottom: 15px;
            display: block;
            -webkit-clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0% 100%, 0 50%, 0% 0%);
            clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0% 100%, 0 50%, 0% 0%);
            margin-left: -20px;
            position: absolute;
        }
        .price-head h2 {
            font-weight: 600;
            margin-bottom: 0px;
            text-transform: capitalize;
            font-size: 26px;
        }
        .price-head span {
            display: inline-block;
            background:#ffaa17;
            width: 6px;
            height: 6px;
            border-radius: 30px;
            margin-bottom: 20px;
            margin-top: 15px;
        }
        .price {
            font-weight: 500;
            font-size: 50px;
            margin-bottom: 0px;
        }
        .single-pricing{}
        .single-pricing h5 {
            font-size: 14px;
            margin-bottom: 0px;
            text-transform: uppercase;
        }
        .single-pricing ul{
            list-style: none;
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .single-pricing ul li{line-height: 35px;}
        .single-pricing-white{background: #232434}
        .single-pricing-white ul li{color:#fff;}
        .single-pricing-white h2{color:#fff;}
        .single-pricing-white h1{color:#fff;}
        .single-pricing-white h5{color:#fff;}
    </style>
@endsection
@section('content')

    <div class="col-xl-12">
        <div class="page-titles style1">
            <div class="d-flex align-items-center">
                <h2 class="heading">
                    İşletmeler / İşletme Oluştur
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">İşletme Oluştur</h4>
                </div>
                <div class="card-body">
                    <div id="smartwizard" class="form-wizard order-create">
                        <ul class="nav nav-wizard">
                            <li><a class="nav-link" href="#wizard_Service">
                                    <span>1</span>
                                </a></li>
                            <li><a class="nav-link" href="#wizard_Time">
                                    <span>2</span>
                                </a></li>
                            <li><a class="nav-link" href="#wizard_Details">
                                    <span>3</span>
                                </a></li>
                            <li><a class="nav-link" href="#wizard_Payment">
                                    <span>4</span>
                                </a></li>
                        </ul>
                        <form method="post" action="{{route('admin.business.store')}}" style="" class="tab-content">
                            @csrf
                            <div id="wizard_Service" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <h3>İşletme Genel Bilgileri</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">İşletme Adı*</label>
                                            <input type="text" name="name" class="form-control input-rounded" placeholder="Ertan Kuaför" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Telefon*</label>
                                            <input type="text" name="phone" class="form-control" placeholder="(+1)408-657-9007" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Logo*</label>
                                            <input type="file" name="logo" class="form-control" placeholder="(+1)408-657-9007" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Arka Plan*</label>
                                            <input type="file" name="wallpaper" class="form-control" placeholder="(+1)408-657-9007" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="text-label form-label">İl*</label>
                                        <select name="city" class="form-control mb-3" id="city" >
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">

                                        <label class="text-label form-label">İlçe*</label>
                                        <select name="district" id="ilce" class="form-control mb-3">
                                            <option>İlce Seçin</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">

                                        <label class="text-label form-label">İşletme Türü*</label>
                                        <select name="type_id" class="form-control mb-3">
                                            <option>İşletme Türü Seçin</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <h3>İşletme Sistem Giriş Bilgileri</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">E-posta*</label>
                                            <input type="text" name="email" class="form-control" placeholder="example@example.com" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Şifre*</label>
                                            <input type="password" class="form-control" name="password" placeholder="" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Şifre Tekrarı*</label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="" >
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>İşletme Çalışma Saatleri</h3>
                                    </div>
                                    <div class="col-4">
                                        Mesai Başlangıç Saati
                                    </div>
                                    <div class="col-4">
                                        Mesai Bitiş Saati
                                    </div>
                                </div>
                                {{--Day Start 1--}}
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <h4>Pazartesi *</h4>
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="status[]" checked>
                                            <label class="form-check-label" for="check1">Aktif</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="start_time[]" id="single-input" value="8:00">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="end_time[]" id="single-input" value="18:00">
                                        </div>
                                    </div>
                                </div>
                                {{--Day Start 2--}}
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <h4>Salı *</h4>
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="status[]" checked>
                                            <label class="form-check-label" for="check1">Aktif</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="start_time[]" id="single-input" value="8:00">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="end_time[]" id="single-input" value="18:00">
                                        </div>
                                    </div>
                                </div>
                                {{--Day Start 3--}}
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <h4>Çarşamba *</h4>
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="status[]" checked>
                                            <label class="form-check-label" for="check1">Aktif</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="start_time[]" id="single-input" value="8:00">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="end_time[]" id="single-input" value="18:00">
                                        </div>
                                    </div>
                                </div>
                                {{--Day Start 4--}}
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <h4>Perşembe *</h4>
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="status[]" checked>
                                            <label class="form-check-label" for="check1">Aktif</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="start_time[]" id="single-input" value="8:00">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="end_time[]" id="single-input" value="18:00">
                                        </div>
                                    </div>
                                </div>
                                {{--Day Start 5--}}
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <h4>Cuma *</h4>
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="status[]" checked>
                                            <label class="form-check-label" for="check1">Aktif</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="start_time[]" id="single-input" value="8:00">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="end_time[]" id="single-input" value="18:00">
                                        </div>
                                    </div>
                                </div>
                                {{--Day Start 6--}}
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <h4>Cumartesi *</h4>
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="status[]" checked>
                                            <label class="form-check-label" for="check1">Aktif</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="start_time[]" id="single-input" value="8:00">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="end_time[]" id="single-input" value="18:00">
                                        </div>
                                    </div>
                                </div>
                                {{--Day Start 7--}}
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <h4>Pazar *</h4>
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="status[]" checked>
                                            <label class="form-check-label" for="check1">Aktif</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="start_time[]" id="single-input" value="8:00">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="input-group mb-3">
                                            <input class="form-control autoClosePicker" name="end_time[]" id="single-input" value="18:00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>İşletme Sistem paketleri</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div class="row text-center">
                                            @forelse($service_packages as $package)
                                                <div class="col-lg-4 col-sm-4 col-xs-12 mb-3">
                                                    <div class="single-pricing single-pricing-white">
                                                        <div class="price-head">
                                                            <input type="radio" class="btn-check" value="{{$package->id}}" name="package_id" id="danger-outlined{{$package->id}}" autocomplete="off">
                                                            <label class="btn btn-outline-success" for="danger-outlined{{$package->id}}">Paket Seç</label>
                                                            <h2>{{$package->title}}</h2>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                        {{--<span class="price-label">Best</span>--}}
                                                        <h1 class="price">&#8378;{{$package->price}}</h1>
                                                        <ul>
                                                            @foreach($package->proparties as $propartie)
                                                                <li>{{$propartie->propartie->name}}</li>
                                                            @endforeach
                                                        </ul>

                                                    </div>
                                                </div><!--- END COL -->
                                            @empty
                                                <div class="alert alert-warning text-center fs-20">Sistemde tanımlı paket listesi bulunamadı</div>
                                            @endforelse
                                        </div><!--- END ROW -->
                                    </div><!--- END CONTAINER -->
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="skip-email text-center">
                                            <p>Tüm Bilgilerden emin olduysanız Kaydet butonuna tıklayın</p>
                                            <button type="submit" class="btn btn-primary">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/admin/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="/admin/assets/js/plugins-init/clock-picker-init.js"></script>
    <script src="/admin/assets/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
    <script>
        $(document).ready(function(){
            $('#smartwizard').smartWizard();
        });
    </script>
    <script>
        $('#city').change(function () {
            let id = $(this).val();
            $('#ilce').find('option').remove();

            $.ajax({
                    url: '{{route('admin.city')}}',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        $.each(data, function (index) {
                            $("#ilce").append('<option value="' + data[index].id + '">' + data[index].name + '</option>')
                        });
                        $('#ilce').selectpicker('refresh');
                    }

                }
            )
        })
    </script>
@endsection
