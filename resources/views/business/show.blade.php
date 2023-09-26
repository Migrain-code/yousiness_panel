@php use Illuminate\Support\Carbon; @endphp
@extends('business.layouts.master')
@section('links')
    <link href="/admin/assets/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/admin/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <style>
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        .single-pricing {
            background: #fff;
            padding: 40px 20px;
            border-radius: 5px;
            position: relative;
            border: 1px solid #eee;
            box-shadow: 0 10px 40px -10px rgba(0, 64, 128, .09);
            transition: 0.3s;
            height: 500px;
            max-height: 500px;
            overflow: auto;
        }

        @media only screen and (max-width: 480px) {
            .single-pricing {
                margin-bottom: 30px;
            }
        }

        .single-pricing:hover {
            box-shadow: 0px 60px 60px rgba(0, 0, 0, 0.1);
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
            background: #ffaa17;
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

        .single-pricing {
        }

        .single-pricing h5 {
            font-size: 14px;
            margin-bottom: 0px;
            text-transform: uppercase;
        }

        .single-pricing ul {
            list-style: none;
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .single-pricing ul li {
            line-height: 35px;
        }

        .single-pricing-white {
            background: #232434
        }

        .single-pricing-white ul li {
            color: #fff;
        }

        .single-pricing-white h2 {
            color: #fff;
        }

        .single-pricing-white h1 {
            color: #fff;
        }

        .single-pricing-white h5 {
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h2 class="heading">İşletme Profili</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo rounded"
                             style="background: url({{asset($business->wallpaper)}});"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <a class="test-popup-link" href="{{asset($business->logo)}}"><img
                                        src="{{asset($business->logo)}}" class="img-fluid rounded-circle" alt=""></a>
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h2 class="text-primary mb-0">{{$business->name}}</h2>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="12" cy="5" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="19" r="2"></circle>
                                        </g>
                                    </svg>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item"><a href="javascript:void(0)"><i
                                                    class="fa fa-users text-primary me-2"></i> Personeller </a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModalCenter"><i
                                                    class="fa fa-plus text-primary me-2"></i> Hizmetler </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2">
        @include('business.layouts.component.alert')
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Genel
                                        Ayarlar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#my-owner" data-bs-toggle="tab" class="nav-link">Yetkili Ayarları</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#about-me" data-bs-toggle="tab" class="nav-link">Çalışma Saati Ayarları</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div id="my-owner" class="tab-pane fade">
                                    <form method="post" action="{{route('business.profile.updateOwnerSetting')}}">
                                        @csrf
                                        <div class="my-post-content pt-3">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Yetkili Ad Soyad</label>
                                                    <input type="text" value="{{$business->owner}}" placeholder=""
                                                           name="owner" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">E-posta</label>
                                                    <input type="email" value="{{$business->owner_email}}"
                                                           placeholder="Email" name="owner_email" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Telefon <span class="text-warning">(Girişte Kullanılan Telefon)</span>
                                                    </label>
                                                    <input type="text" id="phone" value="{{$business->email}}"
                                                           placeholder="Telefon" name="email" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Şifre</label>
                                                    <input type="password" name="password" placeholder="Şifre"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button type="submit" class="btn btn-primary">Yetkili Ayarlarını
                                                    Güncelle
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="row border-bottom border-primary">
                                        <div class="col-12 my-2">
                                            <span style="font-size: 25px; font-weight: bold">Salon Çalışma Saatleri</span>
                                            <a type="button" class="mx-2 text-primary" style="max-width: 12px"
                                               data-bs-container="body" data-bs-toggle="popover"
                                               data-bs-placement="bottom"
                                               data-bs-content="İşletmenizin çalışmaayacağı günleri seçili hale getiriniz."
                                               title="" data-bs-original-title="Tatil Günleri">
                                                <i class="fa fa-question-circle"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <form action="submit.php" class="my-2 col-lg-6 col-md-8 col-sm-12"
                                              method="post">
                                            <div class="form-group my-2">
                                                <label for="day">Kapalı Olduğu Gün:</label>
                                                <select id="day" name="day" class="form-control">
                                                    @foreach($dayList as $list)
                                                        <option value="{{$list->id}}" @selected($business->off_day)>{{$list->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="opening-time">Açılış saati:</label>
                                                <input type="time" id="opening-time" class="form-control"
                                                       name="start_time" value="{{$business->start_time}}" required>
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="opening-time">Kapanış saati:</label>
                                                <input type="time" id="opening-time" class="form-control"
                                                       name="start_time" value="{{$business->end_time}}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                                        </form>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade active show">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <form method="post"
                                                  action="{{route('business.profile.updateGeneralSetting')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salon Adı</label>
                                                        <input type="text" placeholder="Salon Adı"
                                                               value="{{$business->name}}" class="form-control"
                                                               name="business_name">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salon türü</label>
                                                        <select class="form-control" name="business_type">
                                                            <option value="">Salon Türü Seçiniz</option>
                                                            @forelse($businessTypes as $type)
                                                                <option value="{{$type->id}}" @selected($type->id == $business->type_id)>{{$type->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Randevu Aralığı</label>
                                                        <select class="form-control" name="minute">
                                                            <option value="">Süre Seçiniz</option>
                                                            <option value="5" @selected($business->appoinment_range=="5")>
                                                                5 Dakika
                                                            </option>
                                                            <option value="10" @selected($business->appoinment_range=="10")>
                                                                10 Dakika
                                                            </option>
                                                            <option value="15" @selected($business->appoinment_range=="15")>
                                                                15 Dakika
                                                            </option>
                                                            <option value="30" @selected($business->appoinment_range=="30")>
                                                                30 Dakika
                                                            </option>
                                                            <option value="40" @selected($business->appoinment_range=="40")>
                                                                40 Dakika
                                                            </option>
                                                            <option value="45" @selected($business->appoinment_range=="45")>
                                                                45 Dakika
                                                            </option>
                                                            <option value="60" @selected($business->appoinment_range=="60")>
                                                                60 Dakika
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Onay Türü</label>
                                                        <select class="form-control" name="approve_type">
                                                            <option value="">Onay Türü Seçiniz</option>
                                                            <option value="0" @selected($business->approve_type==0)>
                                                                Anlık Onay
                                                            </option>
                                                            <option value="1" @selected($business->approve_type==1)>
                                                                Manuel Onay
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Kuruluş Yılı</label>
                                                        <input type="date" placeholder="Salon Kuruluş Yılı" min="1900"
                                                               max="{{Carbon::now()->format('Y-m-d')}}"
                                                               value="{{$business->year}}" class="form-control"
                                                               name="year">
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salon Telefon</label>
                                                        <input type="text" placeholder="Salon Telefon"
                                                               value="{{$business->phone}}" class="form-control"
                                                               name="b_phone">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salon E-posta</label>
                                                        <input type="email" name="b_email"
                                                               value="{{$business->business_email}}" placeholder="Email"
                                                               class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label>Plz/ Stadtname</label>
                                                        <select class="" id="city_select" name="city" style="border-radius: 18px;">
                                                            <option value="" selected>Stadt wählen</option>
                                                            @if(isset($business->cities))
                                                                <option value="{{$business->cities->id}}" selected>{{$business->cities->post_code. ",".$business->cities->name}}</option>
                                                            @endif
                                                            @forelse($cities as $city)
                                                                <option value="{{$city->id}}">{{$city->post_code ." ," . $city->name}}</option>
                                                            @empty

                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea type="text" name="address" placeholder="1234 Main St"
                                                                  class="form-control">{{$business->address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salon Logo
                                                            <image style="width: 60px;height:60px;border-radius: 50%"
                                                                   src="{{asset($business->logo)}}"></image>
                                                        </label>
                                                        <input type="file" name="logo" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salon Duvar Görseli
                                                            <image style="width: 60px;height:60px;border-radius: 50%"
                                                                   src="{{asset($business->wallpaper)}}"></image>
                                                        </label>
                                                        <input type="file" name="wallpaper" class="form-control">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Salon Bilgilerimi
                                                    Güncelle
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/admin/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="/admin/assets/js/plugins-init/clock-picker-init.js"></script>
    <script src="/admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/plugins-init/datatables.init.js"></script>
    <script>
        $(document).ready(function () {
            $('#smartwizard').smartWizard();
        });
    </script>

    <script>
        $('#serviceCategory').change(function () {
            let id = $(this).val();
            $('#serviceSubCategory').find('option').remove();

            $.ajax({
                    url: '{{route('business.subCategory')}}',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        $("#serviceSubCategory").append('<option value=>Alt Kategori Seçiniz</option>')
                        $.each(data, function (index) {
                            $("#serviceSubCategory").append('<option value="' + data[index].id + '">' + data[index].name + '</option>')
                        });
                        $('#serviceSubCategory').selectpicker('refresh');
                    }

                }
            )
        })
    </script>

    <script>
        $('.work-status').change(function () {
            let id = $(this).attr('work_id');
            //alert(id);
        })
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
