@extends('business.setup.layouts.master')
@section('links')
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
    @include('layouts.component.error')
    <div class="col-lg-4 col-md-12">
        <div class="on-board-wizard">
            <ul>
                <li>
                    <a href="{{route('business.setup.step1')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Salon Kategorie</h6>
                            <p>Wählen Sie Ihre Salonkategorie(n) aus.  </p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('business.setup.step2')}}">
                        <div class="onboarding-progress">
                            <span>2</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Salon Details angeben</h6>
                            <p>Fügen Sie Ihre Salondetails hinzu.</p>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 my-3">
        <div class="onboarding-content-box content-wrap">
            <div class="onborad-set">
                <div class="onboarding-title">
                    <h2>Salon Details angeben?<span>*</span></h2>
                    <h6>Es ist sehr wichtig, dass Sie die Informationen in diesem Feld korrekt eingeben.
                    </h6>
                </div>
                <div class="onboarding-content">
                    <form class="row" method="post" action="{{route('business.setup.step2Form')}}" id="step2Form">
                        @csrf
                        <div class="form-group col-lg-12">
                            <label>Salonname</label>
                            <input type="text" class="form-control" value="{{$business->name}}" name="name" style="border-radius: 18px;height: 10px">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Salon Türü</label>
                            <select class="form-select" name="business_type" style="border-radius: 18px">
                                <option value="" selected>Salon Kategorie</option>
                                @forelse($business_types as $type)
                                    <option value="{{$type->id}}" @selected($business->type_id == $type->id)>{{$type->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Salon Telefon</label>
                            <input type="text" class="form-control" name="phone" value="{{$business->phone}}" style="border-radius: 18px;height: 10px">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>PLZ /Stadt</label>
                            <select class="" id="city_service" name="city" style="border-radius: 18px;">
                                <option value="" selected>PLZ /Stadt</option>
                                @if(isset($business->cities))
                                    <option value="{{$business->cities->id}}" selected>{{$business->cities->post_code. ",".$business->cities->name}}</option>
                                @endif
                                @forelse($cities as $city)
                                    <option value="{{$city->id}}">{{$city->post_code ." ," . $city->name}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Ruhetag</label>
                            <select class="form-select" name="offDay" style="border-radius: 18px">
                                <option value="" selected>Wählen Sie Tag aus</option>
                                @forelse($dayList as $list)
                                    <option value="{{$list->id}}" @selected($business->off_day == $list->id)>{{$list->name}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Öffnungszeit</label>
                            <input type="time" class="form-control" name="start_time" style="border-radius: 18px;height: 10px" value="{{$business->start_time}}">

                        </div>
                        <div class="form-group col-lg-3">
                            <label>Geschäftsschluss</label>
                            <input type="time" class="form-control" name="end_time" style="border-radius: 18px;height: 10px" value="{{$business->end_time}}">

                        </div>
                        <div class="form-group col-lg-12">
                            <label>Über das Geschäft</label>
                            <textarea class="form-control" rows="6" name="business_about">{{$business->about}}</textarea>
                        </div>

                    </form>
                </div>
            </div>
            <div class="onboarding-btn">
                <a href="#" onclick="$('#step2Form').submit()">Weitermachen</a>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <script>

        var mySelect = new TomSelect("#city_service", {
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
                                text: item.post_code + " , " + item.name,
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