@extends('business.layouts.master')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="page-titles style1">
                <div class="d-flex align-items-center">
                    <h2 class="heading">
                        Personeller
                    </h2>
                </div>
                <div id="datepicker" class="input-group date dz-calender" data-date-format="mm-dd-yyyy">
						<span class="input-group-addon d-flex align-items-center">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 14.0001C12.1978 14.0001 12.3911 13.9415 12.5556 13.8316C12.72 13.7217 12.8482 13.5655 12.9239 13.3828C12.9996 13.2001 13.0194 12.999 12.9808 12.805C12.9422 12.611 12.847 12.4329 12.7071 12.293C12.5673 12.1531 12.3891 12.0579 12.1951 12.0193C12.0011 11.9807 11.8 12.0005 11.6173 12.0762C11.4346 12.1519 11.2784 12.2801 11.1685 12.4445C11.0586 12.609 11 12.8023 11 13.0001C11 13.2653 11.1054 13.5197 11.2929 13.7072C11.4804 13.8947 11.7348 14.0001 12 14.0001ZM17 14.0001C17.1978 14.0001 17.3911 13.9415 17.5556 13.8316C17.72 13.7217 17.8482 13.5655 17.9239 13.3828C17.9996 13.2001 18.0194 12.999 17.9808 12.805C17.9422 12.611 17.847 12.4329 17.7071 12.293C17.5673 12.1531 17.3891 12.0579 17.1951 12.0193C17.0011 11.9807 16.8 12.0005 16.6173 12.0762C16.4346 12.1519 16.2784 12.2801 16.1685 12.4445C16.0586 12.609 16 12.8023 16 13.0001C16 13.2653 16.1054 13.5197 16.2929 13.7072C16.4804 13.8947 16.7348 14.0001 17 14.0001ZM12 18.0001C12.1978 18.0001 12.3911 17.9415 12.5556 17.8316C12.72 17.7217 12.8482 17.5655 12.9239 17.3828C12.9996 17.2001 13.0194 16.999 12.9808 16.805C12.9422 16.611 12.847 16.4328 12.7071 16.293C12.5673 16.1531 12.3891 16.0579 12.1951 16.0193C12.0011 15.9807 11.8 16.0005 11.6173 16.0762C11.4346 16.1519 11.2784 16.2801 11.1685 16.4445C11.0586 16.609 11 16.8023 11 17.0001C11 17.2653 11.1054 17.5197 11.2929 17.7072C11.4804 17.8947 11.7348 18.0001 12 18.0001ZM17 18.0001C17.1978 18.0001 17.3911 17.9415 17.5556 17.8316C17.72 17.7217 17.8482 17.5655 17.9239 17.3828C17.9996 17.2001 18.0194 16.999 17.9808 16.805C17.9422 16.611 17.847 16.4328 17.7071 16.293C17.5673 16.1531 17.3891 16.0579 17.1951 16.0193C17.0011 15.9807 16.8 16.0005 16.6173 16.0762C16.4346 16.1519 16.2784 16.2801 16.1685 16.4445C16.0586 16.609 16 16.8023 16 17.0001C16 17.2653 16.1054 17.5197 16.2929 17.7072C16.4804 17.8947 16.7348 18.0001 17 18.0001ZM7 14.0001C7.19778 14.0001 7.39112 13.9415 7.55557 13.8316C7.72002 13.7217 7.84819 13.5655 7.92388 13.3828C7.99957 13.2001 8.01937 12.999 7.98078 12.805C7.9422 12.611 7.84696 12.4329 7.70711 12.293C7.56725 12.1531 7.38907 12.0579 7.19509 12.0193C7.00111 11.9807 6.80004 12.0005 6.61732 12.0762C6.43459 12.1519 6.27841 12.2801 6.16853 12.4445C6.05865 12.609 6 12.8023 6 13.0001C6 13.2653 6.10536 13.5197 6.29289 13.7072C6.48043 13.8947 6.73478 14.0001 7 14.0001ZM19 4.00011H18V3.00011C18 2.73489 17.8946 2.48054 17.7071 2.293C17.5196 2.10546 17.2652 2.00011 17 2.00011C16.7348 2.00011 16.4804 2.10546 16.2929 2.293C16.1054 2.48054 16 2.73489 16 3.00011V4.00011H8V3.00011C8 2.73489 7.89464 2.48054 7.70711 2.293C7.51957 2.10546 7.26522 2.00011 7 2.00011C6.73478 2.00011 6.48043 2.10546 6.29289 2.293C6.10536 2.48054 6 2.73489 6 3.00011V4.00011H5C4.20435 4.00011 3.44129 4.31618 2.87868 4.87879C2.31607 5.4414 2 6.20446 2 7.00011V19.0001C2 19.7958 2.31607 20.5588 2.87868 21.1214C3.44129 21.684 4.20435 22.0001 5 22.0001H19C19.7956 22.0001 20.5587 21.684 21.1213 21.1214C21.6839 20.5588 22 19.7958 22 19.0001V7.00011C22 6.20446 21.6839 5.4414 21.1213 4.87879C20.5587 4.31618 19.7956 4.00011 19 4.00011ZM20 19.0001C20 19.2653 19.8946 19.5197 19.7071 19.7072C19.5196 19.8947 19.2652 20.0001 19 20.0001H5C4.73478 20.0001 4.48043 19.8947 4.29289 19.7072C4.10536 19.5197 4 19.2653 4 19.0001V10.0001H20V19.0001ZM20 8.00011H4V7.00011C4 6.73489 4.10536 6.48054 4.29289 6.293C4.48043 6.10546 4.73478 6.00011 5 6.00011H19C19.2652 6.00011 19.5196 6.10546 19.7071 6.293C19.8946 6.48054 20 6.73489 20 7.00011V8.00011ZM7 18.0001C7.19778 18.0001 7.39112 17.9415 7.55557 17.8316C7.72002 17.7217 7.84819 17.5655 7.92388 17.3828C7.99957 17.2001 8.01937 16.999 7.98078 16.805C7.9422 16.611 7.84696 16.4328 7.70711 16.293C7.56725 16.1531 7.38907 16.0579 7.19509 16.0193C7.00111 15.9807 6.80004 16.0005 6.61732 16.0762C6.43459 16.1519 6.27841 16.2801 6.16853 16.4445C6.05865 16.609 6 16.8023 6 17.0001C6 17.2653 6.10536 17.5197 6.29289 17.7072C6.48043 17.8947 6.73478 18.0001 7 18.0001Z" fill="var(--primary)"/>
							</svg>
						</span>
                    <div class="calender-picker">
                        <h6 class="fs-14 mb-0 ms-2 font-w600">Bugün</h6>
                        <input class="form-control" type="text" readonly="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('business.layouts.component.alert')
    @include('business.layouts.component.error')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Personel Listesi</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="fa-solid fa-plus-circle me-2"></i>Personel Ekle</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                            <tr>
                                <th></th>
                                <th>İsim Soyisim</th>
                                <th>Telefon</th>
                                <th>Onay</th>
                                <th>Tatil Günü</th>
                                <th>Cinsiyet</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                               @forelse(auth('business')->user()->personel as $personel)
                                   <tr>
                                       <td>
                                           <img class="rounded-circle" width="35" src="{{asset($personel->image)}}" alt="">
                                       </td>
                                       <td>{{$personel->name}}</td>
                                       <td><a href="tel:{{$personel->phone}}"><strong>{{$personel->phone}}</strong></a></td>
                                       <td>
                                           @if($personel->accept==1)
                                               <span class="badge light badge-success">İzin Verildi</span>
                                           @else
                                               <span class="badge light badge-danger">İzin Verilmedi</span>
                                           @endif
                                       </td>
                                       <td>{{$personel->restDay->name}}</td>
                                       <td>
                                           @if($personel->gender != 3)
                                               {{$personel->type->name}}
                                           @else
                                               Kadın / Erkek
                                           @endif
                                       </td>
                                       <td>
                                           <div class="d-flex">
                                               <a href="{{route('business.personel.edit', $personel->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                               <a href="#" class="btn btn-danger shadow btn-xs sharp" onclick="onDelete('{{route('business.personel.destroy', $personel->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></a>
                                           </div>
                                       </td>
                                   </tr>
                               @empty
                               @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personel Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form method="post" action="{{route('business.personel.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">İsim Soyisim</label>
                                <input type="text" class="form-control" name="name" value="{{old("name")}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">E-posta</label>
                                <input type="email" class="form-control" name="email" value="{{old("email")}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Şifre</label>
                                <input type="text" class="form-control" name="password" value="{{old("password")}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Telefon</label>
                                <input type="text" class="form-control" placeholder="0555 555 55 55" name="phone" value="{{old("phone")}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Onay İzni</label>
                                <select name="accept" class="form-control">
                                    <option value="1" @selected(old('accept') == 1)>İzin Ver</option>
                                    <option value="0" @selected(old('accept') == 0)>İzin Verme</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tatil Günü
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin izin günleri dışındaki günler görüntülenir. Personele bu günler dışındaki tatil günlerini girmeniz gerekir." title="İzin günleri">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button></label>
                                <select name="off_day" class="form-control">
                                    @forelse($dayList as $list)
                                        <option value="{{$list->id}}" @selected(old("off_day") == $list->id)>{{$list->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mesai Başlangıç
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin çalışma saatleri görüntülenir. Personele bu saatler aralığında çalışma zamanı belirleyebilirsiniz." title="Çalışma Saatleri">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <input type="time" class="form-control" name="start_time" value="{{old("start_time")}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label"> Mesai Bitiş
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin çalışma saatleri görüntülenir. Personele bu saatler aralığında çalışma zamanı belirleyebilirsiniz." title="Çalışma Saatleri">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <input type="time" class="form-control" name="end_time" value="{{old("end_time")}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">

                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Yemek Arası Başlangıç <span class="text-warning">(Zorunlu Değil)</span>
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin çalışma saatleri görüntülenir. Personele bu saatler aralığında çalışma zamanı belirleyebilirsiniz." title="Çalışma Saatleri">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <input type="time" class="form-control" name="food_start_time" value="{{old("food_start_time")}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">

                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label"> Yemek Arası Bitiş <span class="text-warning">(Zorunlu Değil)</span>
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin çalışma saatleri görüntülenir. Personele bu saatler aralığında çalışma zamanı belirleyebilirsiniz." title="Çalışma Saatleri">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <input type="time" class="form-control" name="food_end_time" value="{{old("food_end_time")}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">

                            </div>

                        </div>
                        <div class="row">
                            @if(auth('business')->user()->type_id == 3)
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"> Hizmet Sunulan Cinsiyet
                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin hizmet veridiği cinsiyetler görüntülenir. Personele bu cinsiyet seçiminden istediğinizi belirleyebilirsiniz." title="Cinsiyet Ayarları">
                                            <i class="fa-solid fa-question-circle"></i>
                                        </button>
                                    </label>
                                    <select name="gender" id="gender" class="form-control">
                                            <option value="">Cinsiyet Seçiniz</option>
                                            <option value="1" @selected(old("gender") == "1")>Kadın</option>
                                            <option value="2" @selected(old("gender") == "2")>Erkek</option>
                                            <option value="3" @selected(old("gender") == "3")>Her İkiside</option>
                                    </select>
                                </div>
                            @else
                                    <input type="hidden" name="gender" value="{{auth('business')->user()->type_id}}">
                            @endif
                            <div class="mb-3 col-md-6">
                                <label class="form-label"> Hizmet Payı
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin personel ile nasıl çalıştığını seçerek yaptığı işlemlerden onun payına düşecek pay oranını seçebilirsiniz" title="Personel Payı">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <select name="rate" class="form-control">
                                    <option value="">Hizmet Payı Seçiniz</option>
                                    @forelse($rates as $row)
                                        <option value="{{$row->id}}" @selected(old("rate") == $row->id)>{{$row->rate == 0 ? "Maaşlı Çalışan". " %". $row->rate : "% ".$row->rate}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Görsel</label>
                                <input type="file" class="form-control" name="image" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label"> Hizmet Seçiniz <span class="text-warning">(Birden Fazla Seçilebilir)</span>
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin personelinin hizmet vereceği tanımladığınız hizmetler görüntülenir. Hizmet Sunulan cinsiyet alanında seçtiğiniz cinsiyete göre listelenir " title="Personel Payı">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <select name="services[]" multiple id="service" class="form-control">
                                    @forelse(auth('business')->user()->services as $service)
                                        <option value="{{$service->id}}">{{$service->subCategory->name}}</option>
                                    @empty
                                    @endforelse
                                    @if(auth('business')->user()->services->count() > 2)
                                        <option value="all">Tümü (Hizmetlerin hepsini tanımla)</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label"> Randevu Aralığı
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin personel ile nasıl çalıştığını seçerek yaptığı işlemlerden onun payına düşecek pay oranını seçebilirsiniz" title="Personel Payı">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <select name="range" class="form-control">
                                    <option value="">Randevu Aralığı Seçiniz</option>
                                    <option value="5" @selected(old("range") == "5")>5 Dakika</option>
                                    <option value="10" @selected(old("range") == "10")>10 Dakika</option>
                                    <option value="20" @selected(old("range") == "20")>20 Dakika</option>
                                    <option value="30" @selected(old("range") == "30")>30 Dakika</option>
                                    <option value="40" @selected(old("range") == "40")>40 Dakika</option>
                                    <option value="45" @selected(old("range") == "45")>45 Dakika</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label"> Açıklama
                                    <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Burada işletmenizin personel ile nasıl çalıştığını seçerek yaptığı işlemlerden onun payına düşecek pay oranını seçebilirsiniz" title="Personel Payı">
                                        <i class="fa-solid fa-question-circle"></i>
                                    </button>
                                </label>
                                <textarea name="description" rows="5" class="form-control">{{old("description")}}</textarea>
                            </div>
                        </div>
                        {{--End Modal Body--}}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#service").change(function (){
            let val= $(this).val();

        });
        $('#gender').change(function () {
           let val=$(this).val();
            $("#service").empty();
           $.ajax({
              url:'{{route('business.gender')}}',
              type:'POST',
              data:{
                  '_token': '{{csrf_token()}}',
                  'gender': val,
              },
               success:function (data){

                   if(data.length > 0){
                       $("#service").append('<option value="all"> Tüm Hizmetler </option>')
                       $.each(data, function (index) {
                           $("#service").append('<option value="' + data[index].id + '">' +data[index].sub_category.name  + '(' +data[index].gender.name +')'+ '</option>')
                       });
                   }
                   else{
                       $("#service").append('<option >Hizmet Bulunamadı Eklemek için Hizmetler Menüsüne Gidin</option>')
                   }
                   $("#service").selectpicker("refresh");
               }
           });
        });
    </script>

    <script>
       function onDelete(personel_url, index){
           var table = $('#example3').DataTable();
           Swal.fire({
               title: 'Personeli Silmek istediğinize eminmisiniz?',
               icon: 'info',
               showDenyButton: true,
               showCancelButton: false,
               confirmButtonText: 'Sil',
               denyButtonText: `İptal Et`,
           }).then((result) => {
               /* Read more about isConfirmed, isDenied below */
               if (result.isConfirmed) {
                  $.ajax({
                      url: personel_url,
                      type: "POST",
                      data:{
                          _token:'{{csrf_token()}}',
                          '_method':'DELETE',
                      },
                      dataType:"JSON",
                      success:function (res){
                          if(res.status=="success"){
                              table
                                  .row( $(this).parents('tr') )
                                  .remove()
                                  .draw();
                              Swal.fire({
                                  text: "Personel Silindi!.",
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
               } else if (result.isDenied) {
                   Swal.fire('İşlem İptal Edildi', '', 'info')
               }
           })
       }
    </script>
@endsection