@extends('admin.layouts.master')
@section('links')

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
        @include('admin.layouts.component.alert')
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo rounded" style="background: url({{asset($business->wallpaper)}});"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <a class="test-popup-link" href="{{asset($business->logo)}}"><img src="{{asset($business->logo)}}" class="img-fluid rounded-circle" alt=""></a>
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{$business->name}}</h4>
                                <p>
                                    @if($business->status==0)
                                        <span class="badge badge-sm light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                Bloklandı
									        </span>
                                    @elseif($business->status==1)
                                        <span class="badge badge-sm light badge-warning">
                                                <i class="fa fa-circle text-warning me-1"></i>
                                                Kurulum Yapılmadı
									        </span>
                                    @else
                                        <span class="badge badge-sm light badge-success">
                                                <i class="fa fa-circle text-success me-1"></i>
                                                Aktif
									        </span>
                                    @endif
                                      <span class="badge badge-sm light badge-warning">
                                                <i class="fa fa-circle text-warning me-1"></i>
                                                 {{$business->type->name}}
                                     </span>
                                </p>
                            </div>

                            <div class="dropdown ms-auto">
                                <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item"><a href="javascript:void(0)"><i class="fa fa-users text-primary me-2"></i> Personel Ekle</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus text-primary me-2"></i> Hizmet Ekle</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)"><i class="fa fa-ban text-primary me-2"></i> Engelle</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hizmet Kategorileri Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form method="post" action="{{route('admin.business.addService')}}">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label>Hizmet Verileceği Cinsiyet</label>
                            <select name="type" class="form-control">
                                @if($business->type->id==3)
                                    <option value="">Tür Seçiniz</option>
                                    <option value="1">Kadın</option>
                                    <option value="2">Erkek</option>
                                    <option value="3">Her İkiside</option>
                                @elseif($business->type->id==1)
                                    <option value="1" selected>Kadın</option>
                                @elseif($business->type->id==2)
                                    <option value="2" selected>Erkek</option>
                                @endif
                            </select>
                        </div>
                        <input type="hidden" name="business_id" value="{{$business->id}}">
                        <div class="mb-3">
                            <label>Hizmet Kategorisi</label>
                            <select name="service_category" id="serviceCategory" class="form-control mb-2">
                                <option>Hizmet Kategorisi seçiniz</option>
                                @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Hizmet Alt Kategorisi</label>
                            <select name="service_sub_category" id="serviceSubCategory" class="form-control mb-2">
                                <option>Hizmet Kategorisi seçiniz</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Fiyatı</label>
                            <input type="text" class="form-control mb-2" name="price">
                        </div>
                        <div class="mb-3">
                            <label>İşlem Süresi</label>
                            <input type="time" class="form-control mb-2" name="time">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Hizmetler</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">About Me</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="table-responsive">
                                            <table id="example2" class="display" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Hizmet Adı</th>
                                                    <th>Durum</th>
                                                    <td>İşlemler</td>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                    @forelse($business->services as $service)
                                                        <tr>
                                                            <td style="max-width: 135px">{{$service->subCategory->name}}</td>
                                                            <td>
                                                                @if($service->status==0)
                                                                    <span class="badge badge-sm light badge-danger">
                                                                    <i class="fa fa-circle text-danger me-1"></i>
                                                                        Yayında Değil
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-sm light badge-success">
                                                                        <i class="fa fa-circle text-success me-1"></i>
                                                                        Yayında
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="#{{--route('admin.business.edit', $business->id)--}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                                    <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h5 class="text-primary">About Me</h5>
                                            <p class="mb-2">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                                            <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                        </div>
                                    </div>
                                    <div class="profile-skills mb-5">
                                        <h5 class="text-primary mb-2">Skills</h5>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                    </div>
                                    <div class="profile-lang  mb-5">
                                        <h5 class="text-primary mb-2">Language</h5>
                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a>
                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                    </div>
                                    <div class="profile-personal-info">
                                        <h5 class="text-primary mb-4">Personal Information</h5>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>27</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                Florida
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h5 class="text-primary">Account Setting</h5>
                                            <form>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" placeholder="Email" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" placeholder="Password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" placeholder="1234 Main St" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address 2</label>
                                                    <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label class="form-label">State</label>
                                                        <select class="form-control default-select wide" id="inputState">
                                                            <option selected="">Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-2">
                                                        <label class="form-label">Zip</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="gridCheck">
                                                        <label class="form-check-label form-label" for="gridCheck"> Check me out</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Sign
                                                    in</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $(document).ready(function(){
            $('#smartwizard').smartWizard();
        });
    </script>
    <script>
        $('#serviceCategory').change(function () {
            let id = $(this).val();
            $('#serviceSubCategory').find('option').remove();

            $.ajax({
                    url: '{{route('admin.subCategory')}}',
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
@endsection
