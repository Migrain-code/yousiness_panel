@php use Illuminate\Support\Carbon; @endphp
@extends('admin.layouts.master')
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
        .form-check-inline {
            display: inline-block;
            margin-right: 1rem;
        }
        .visit-btns {
            color: #272b41;
            background-color: #fff;
            width: 80%;
            margin-bottom: 10px;
            display: block;
            outline: unset;
            cursor: pointer;
        }
        .form-check-input:checked[type=checkbox] {
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e);
        }
        .visits input.form-check-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            visibility: hidden;
            margin-left: 0;
        }
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .form-check-input {
            width: 1em;
            height: 1em;
            margin-top: 0.25em;
            vertical-align: top;
            padding: 10px;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            border: 1px solid rgba(0,0,0,.25);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            padding: 10px;
        }
        .visits input:checked ~ .visit-rsn {
            background-color: #2fcc31;
            color: #fff;
            border-radius: 4px;
            padding: 15px;
        }

    </style>
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

    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h2 class="heading">Salon Profil</h2>
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
                                    <a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Allgemein</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#my-owner" data-bs-toggle="tab" class="nav-link">Kompetenz</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#about-me" data-bs-toggle="tab" class="nav-link">Arbeitszeiten</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#category_tab" data-bs-toggle="tab" class="nav-link">SALONARTEN</a>
                                </li>
                               {{--
                                 <li class="nav-item">
                                    <a href="#mitarbeiter_tab" data-bs-toggle="tab" class="nav-link">Mitarbeiter</a>
                                </li>
                               --}}
                            </ul>
                            <div class="tab-content">
                                <div id="my-owner" class="tab-pane fade">
                                    <form method="post" action="{{route('admin.profile.updateOwnerSetting')}}">
                                        @csrf
                                        <input type="hidden" name="business_id" value="{{$business->id}}">

                                        <div class="my-post-content pt-3">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Name Nachname</label>
                                                    <input type="text" value="{{$business->owner}}" placeholder=""
                                                           name="owner" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">E-Mail</label>
                                                    <input type="email" value="{{$business->owner_email}}"
                                                           placeholder="E-Mail" name="owner_email" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Mobilnummer <span class="text-warning">(bei der Registrierung vewendete Mobilnummer)</span>
                                                    </label>
                                                    <input type="text" id="phone_1" value="{{$business->email}}"
                                                           placeholder="Mobilnummer" name="email" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Passwort</label>
                                                    <input type="password" name="password" placeholder="Passwort"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button type="submit" class="btn btn-primary">Aktualisieren
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="row border-bottom border-primary">
                                        <div class="col-12 my-2">
                                            <span style="font-size: 25px; font-weight: bold">ÖFFNUNGSZEITEN</span>
                                            <a type="button" class="mx-2 text-primary" style="max-width: 12px"
                                               data-bs-container="body" data-bs-toggle="popover"
                                               data-bs-placement="bottom"
                                               data-bs-content="Wählen Sie die Tage aus, an denen Ihr Salon nicht arbeitet."
                                               title="" data-bs-original-title="Geschlossene Tage">
                                                <i class="fa fa-question-circle"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <form action="{{route('admin.profile.updateWorkTime')}}" class="my-2 col-lg-6 col-md-8 col-sm-12"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="business_id" value="{{$business->id}}">

                                            <div class="form-group my-2">
                                                <label for="day">Ruhetag:</label>
                                                <select id="day" name="day" class="form-control">
                                                    @foreach($dayList as $list)
                                                        <option value="{{$list->id}}" @selected($business->off_day == $list->id)>{{$list->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="opening-time">Öffnungszeit:</label>
                                                <input type="time" id="opening-time" class="form-control"
                                                       name="start_time" value="{{$business->start_time}}" required>
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="opening-time">SchlieBzeit:</label>
                                                <input type="time" id="opening-time" class="form-control"
                                                       name="end_time" value="{{$business->end_time}}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Aktualisieren</button>
                                        </form>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade active show">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <form method="post"
                                                  action="{{route('admin.profile.updateGeneralSetting')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="business_id" value="{{$business->id}}">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salonname</label>
                                                        <input type="text" placeholder="Salon Adı"
                                                               value="{{$business->name}}" class="form-control"
                                                               name="business_name">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Salon Kategorie</label>
                                                        <select class="form-control" name="business_type">
                                                            <option value="">Salon Kategorie auswählen</option>
                                                            @forelse($businessTypes as $type)
                                                                <option value="{{$type->id}}" @selected($type->id == $business->type_id)>{{$type->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-4">
                                                        <label class="form-label">Sıra Numarası</label>
                                                        <input type="number" placeholder="Salon Öne Çıkan Numarası"
                                                               value="{{$business->order_number}}" class="form-control"
                                                               name="order_number">
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label class="form-label">Dauer der Dienstleistung</label>
                                                        <select class="form-control" name="minute">
                                                            <option value="">Zeit Auswdhlen</option>
                                                            @for($i = 5; $i <= 120; $i+=5)
                                                                <option value="{{$i}}" @selected($business->appoinment_range==$i)>{{$i}} min.</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label class="form-label">Bestätigungsart</label>
                                                        <select class="form-control" name="approve_type">
                                                            <option value="">Bestätigungsart Wählen</option>
                                                            <option value="0" @selected($business->approve_type==0)>
                                                                Automatisch
                                                            </option>
                                                            <option value="1" @selected($business->approve_type==1)>
                                                                Manuell
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Gründungsjahr</label>
                                                        <input type="date" placeholder="Gründungsjahr" min="1900"
                                                               max="{{Carbon::now()->format('Y-m-d')}}"
                                                               value="{{$business->year}}" class="form-control"
                                                               name="year">
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Mobile Nummer</label>
                                                        <input type="text" placeholder="Salon Telefon"
                                                               value="{{$business->phone}}" class="form-control"
                                                               name="b_phone">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">E-Mail</label>
                                                        <input type="email" name="b_email"
                                                               value="{{$business->business_email}}" placeholder="Email"
                                                               class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label>PLZ /Stadt</label>
                                                        <select class="" id="city_select" name="city" style="border-radius: 18px;">
                                                            <option value="" selected>Auswählen</option>
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
                                                        <label class="form-label">Adresse</label>
                                                        <textarea type="text" name="address" placeholder="1234 Main St"
                                                                  class="form-control">{{$business->address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Logo
                                                            <image style="width: 60px;height:60px;border-radius: 50%"
                                                                   src="{{asset($business->logo)}}"></image>
                                                        </label>
                                                        <input type="file" name="logo" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Hintergrundbild
                                                            <image style="width: 60px;height:60px;border-radius: 50%"
                                                                   src="{{asset($business->wallpaper)}}"></image>
                                                        </label>
                                                        <input type="file" name="wallpaper" class="form-control">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Aktualisieren
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="category_tab" class="tab-pane fade">
                                    <div class="row border-bottom border-primary">
                                        <div class="col-12 my-2">
                                            <span style="font-size: 25px; font-weight: bold">KTUALISIERUNG DER SALONARTEN</span>
                                            <a type="button" class="mx-2 text-primary" style="max-width: 12px"
                                               data-bs-container="body" data-bs-toggle="popover"
                                               data-bs-placement="bottom"
                                               data-bs-content="Bitte wâhlen Sie die betreffenden Salonarten aus."
                                               title="" data-bs-original-title="Salon Arten">
                                                <i class="fa fa-question-circle"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <form action="{{route('admin.profile.updateCategory')}}" style="position: relative;" class="my-2 col-lg-6 col-md-8 col-sm-12"
                                              method="post">
                                            <input type="hidden" name="business_id" value="{{$business->id}}">
                                            @csrf
                                            <!--item-->
                                            @forelse($business_categories as $category)
                                                <div class="col-lg-6">
                                                    <div class="form-check-inline visits me-0 my-2 w-100">
                                                        <label class="visit-btns" style="width: 100%">
                                                            <input type="checkbox" name="category[]" class="form-check-input" @checked(in_array($category->id, $selectedCategories))  value="{{$category->id}}">
                                                            <span class="visit-rsn" style="text-align: left">
                                                                    <img src="{{asset($category->icon)}}" class="me-2" width="30px" height="30px">
                                                                    {{$category->name}}
                                                                </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                            <!--/item-->
                                            <button type="submit" class="btn btn-primary mt-3">Aktualisieren</button>
                                        </form>
                                    </div>
                                </div>
                                {{--
                                    <div id="mitarbeiter_tab" class="tab-pane fade">
                                    <div class="row border-bottom border-primary">
                                        <div class="col-12 my-2">
                                            <span style="font-size: 25px; font-weight: bold">Mitarbeiter</span>
                                            <a type="button" class="mx-2 text-primary" style="max-width: 12px"
                                               data-bs-container="body" data-bs-toggle="popover"
                                               data-bs-placement="bottom"
                                               data-bs-content="Bitte wâhlen Sie die betreffenden Salonarten aus."
                                               title="" data-bs-original-title="Salon Arten">
                                                <i class="fa fa-question-circle"></i>
                                            </a>
                                        </div>

                                    </div>

                                    <!--item-->
                                    <div class="table-responsive">
                                        <table id="example3" class="display mb-3" style="min-width: 845px">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>MobileNummer</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Transaktion</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($business->personel as $personel)
                                                <tr>
                                                    <td>
                                                        <img class="rounded-circle" width="35" src="{{asset($personel->logo)}}" alt="">
                                                    </td>
                                                    <td>{{$personel->name}}</td>
                                                    <td>
                                                        <a href="tel:{{$personel->phone}}"><strong>{{$personel->phone}}</strong></a>
                                                    </td>
                                                    <td>{{$personel->start_time}}</td>
                                                    <td>{{$personel->end_time}}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{route('admin.personel.edit', $personel->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>


                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                --}}

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

@endsection
