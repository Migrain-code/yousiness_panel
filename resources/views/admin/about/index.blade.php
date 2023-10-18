@extends('admin.layouts.master')
@section('links')
    <script src="https://cdn.tiny.cloud/1/{{env('TINY_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        @include('admin.layouts.component.alert')
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">
                            <!--begin:::Tab item-->
                            <!--end:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary active" data-bs-toggle="tab" href="#kt_ecommerce_settings_customers">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor" />
															<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor" />
															<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor" />
															<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->Bölüm 1</a>
                            </li>
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_store">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm004.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
														<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
													</svg>
													</span>
                                    <!--end::Svg Icon-->Bölüm 2</a>
                            </li>

                        </ul>
                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade active show" id="kt_ecommerce_settings_customers" role="tabpanel">
                                <!--begin::Form-->
                                <form method="post" class="form" action="{{route('admin.forBusiness.section_update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row my-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Hakkımızda Metni Güncelleme Formu</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Başlık</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <input type="text" class="form-control form-control-solid" name="speed_about_main_title" value="{{$sections["speed_about_main_title"] ?? ""}}" />

                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Hakkımızda Metni</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <textarea class="form-control form-control-solid" name="speed_about_main_description" rows="11">{{$sections["speed_about_main_description"] ?? ""}}</textarea>

                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Foto</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki ilk bölümdeki büyük görsel"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-solid" name="speed_about_main_image"/>
                                            <!--end::Input-->
                                            <img src="{{asset($sections["speed_about_main_image"] ?? "")}}" width="100px" class="mt-3">
                                        </div>
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary w-100">
                                                <span class="indicator-label">Speichern</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Action buttons-->

                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_settings_store" role="tabpanel">
                                <!--begin::Form-->
                                <form method="post" class="form" action="{{route('admin.forBusiness.section_update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row my-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Bölüm 2 Güncelleme Formu</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Box 1-->
                                    <div class="row p-2 mt-3" style="border: 1px solid orange;max-width: 99%;border-radius: 15px">
                                        <div class="row">
                                            <h4>Kutu 1</h4>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 1 Başlık</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Site Adınızı Güncelleyin"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="speed_section_1_box_1_title" value="{{$sections["speed_section_1_box_1_title"] ?? ""}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 1 İçerik</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the store owner's name"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="speed_section_1_box_1_description" value="{{$sections["speed_section_1_box_1_description"] ?? ""}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 1 İkon</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the store owner's name"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="speed_section_1_box_1_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["speed_section_1_box_1_image"] ?? "")}}" width="100px" class="mt-3">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Box 2-->
                                    <div class="row p-2 mt-3" style="border: 1px solid orange;max-width: 99%;border-radius: 15px">
                                        <div class="row">
                                            <h4>Kutu 2</h4>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 2 Başlık</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="2. Bölümdeki Kutu 2 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="speed_section_1_box_2_title" value="{{$sections["speed_section_1_box_2_title"] ?? ""}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 2 İçerik</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="2. Bölümdeki Kutu 2 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="speed_section_1_box_2_description" value="{{$sections["speed_section_1_box_2_description"] ?? ""}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 2 İkon</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="2. Bölümdeki Kutu 2 İcon"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="speed_section_1_box_2_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["speed_section_1_box_2_image"] ?? "")}}" width="100px" class="mt-3">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Box 3-->
                                    <div class="row p-2 mt-3" style="border: 1px solid orange;max-width: 99%;border-radius: 15px">
                                        <div class="row">
                                            <h4>Kutu 3</h4>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 3 Başlık</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="2. Bölümdeki Kutu 3 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="speed_section_1_box_3_title" value="{{$sections["speed_section_1_box_3_title"] ?? ""}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 3 İçerik</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="2. Bölümdeki Kutu 3 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="speed_section_1_box_3_description" value="{{$sections["speed_section_1_box_3_description"] ?? ""}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 3 İkon</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="2. Bölümdeki Kutu 3 İcon"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="speed_section_1_box_3_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["speed_section_1_box_3_image"] ?? "")}}" width="100px" class="mt-3">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>


                                    <!--begin::Action buttons-->
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary w-100">
                                                <span class="indicator-label">Speichern</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>

                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
@section('scripts')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ]
        });
    </script>
@endsection
