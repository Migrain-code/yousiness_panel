@extends('admin.layouts.master')
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
                            <li class="nav-item">
                                <a class="nav-link text-active-primary active" data-bs-toggle="tab" href="#kt_ecommerce_settings_general">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->Bölüm 1</a>
                            </li>
                            <!--end:::Tab item-->
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
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_localization">
                                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor" />
															<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->Bölüm 3</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_products">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm005.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="currentColor" />
															<path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->Bölüm 4</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_customers">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor" />
															<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor" />
															<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor" />
															<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->Bölüm 5</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_s6">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor" />
															<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor" />
															<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor" />
															<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->Bölüm 6</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_settings_general" role="tabpanel">
                                <!--begin::Form-->
                                <form  class="form" action="{{route('admin.forBusiness.section_update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row my-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Bölüm 1 Güncelleme Formu</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Başlık</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki ilk bölümdeki büyük başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="section_1_title" value="{{$sections["section_1_title"]}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Açıklama</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki ilk bölümdeki küçük açıklama"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="section_1_description" value="{{$sections["section_1_description"]}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Görsel</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki ilk bölümdeki büyük görsel"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-solid" name="section_1_image"/>
                                            <!--end::Input-->
                                            <img src="{{asset($sections["section_1_image"])}}" width="100px" class="mt-3">
                                        </div>
                                    </div>

                                    <!--begin::Action buttons-->
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary w-100">
                                                <span class="indicator-label">Kaydet</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
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
                                                <input type="text" class="form-control form-control-solid" name="section_2_box_1_title" value="{{$sections["section_2_box_1_title"]}}" />
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
                                                <input type="text" class="form-control form-control-solid" name="section_2_box_1_description" value="{{$sections["section_2_box_1_description"]}}" />
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
                                                <input type="file" class="form-control form-control-solid" name="section_2_box_1_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_2_box_1_image"])}}" width="100px" class="mt-3">
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
                                                <input type="text" class="form-control form-control-solid" name="section_2_box_2_title" value="{{$sections["section_2_box_2_title"]}}" />
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
                                                <input type="text" class="form-control form-control-solid" name="section_2_box_2_description" value="{{$sections["section_2_box_2_description"]}}" />
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
                                                <input type="file" class="form-control form-control-solid" name="section_2_box_2_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_2_box_2_image"])}}" width="100px" class="mt-3">
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
                                                <input type="text" class="form-control form-control-solid" name="section_2_box_3_title" value="{{$sections["section_2_box_3_title"]}}" />
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
                                                <input type="text" class="form-control form-control-solid" name="section_2_box_3_description" value="{{$sections["section_2_box_3_description"]}}" />
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
                                                <input type="file" class="form-control form-control-solid" name="section_2_box_3_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_2_box_3_image"])}}" width="100px" class="mt-3">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>


                                    <!--begin::Action buttons-->
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary w-100">
                                                <span class="indicator-label">Kaydet</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_settings_localization" role="tabpanel">
                                <!--begin::Form-->
                                <form method="post" class="form" action="{{route('admin.forBusiness.section_update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row my-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Bölüm 3 Güncelleme Formu</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-2">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Ana Başlık</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 Başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="section_3_box_main_title" value="{{$sections["section_3_box_main_title"]}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
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
                                                    <span class="required">Kutu 1 Buton Metni</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 Buton Metni"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_1_button_text" value="{{$sections["section_3_box_1_button_text"]}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 1 Başlık</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_1_title" value="{{$sections["section_3_box_1_title"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_1_description" value="{{$sections["section_3_box_1_description"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 Görsel"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="section_3_box_1_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_3_box_1_image"])}}" width="100px" class="mt-3">
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
                                                    <span class="required">Kutu 2 Buton Metni</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 Buton Metni"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_2_button_text" value="{{$sections["section_3_box_2_button_text"]}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 2 Başlık</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 2 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_2_title" value="{{$sections["section_3_box_2_title"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 2 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_2_description" value="{{$sections["section_3_box_2_description"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 2 İcon"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="section_3_box_2_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_3_box_2_image"])}}" width="100px" class="mt-3">
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
                                                    <span class="required">Kutu 3 Buton Metni</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 3 Buton Metni"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_3_button_text" value="{{$sections["section_3_box_3_button_text"]}}" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row fv-row mb-2">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Kutu 3 Başlık</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 3 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_3_title" value="{{$sections["section_3_box_3_title"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 3 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_3_box_3_description" value="{{$sections["section_3_box_3_description"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 3 İcon"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="section_3_box_3_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_3_box_3_image"])}}" width="100px" class="mt-3">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>


                                    <!--begin::Action buttons-->
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary w-100">
                                                <span class="indicator-label">Kaydet</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_settings_products" role="tabpanel">
                                <!--begin::Form-->
                                <form method="post" class="form" action="{{route('admin.forBusiness.section_update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row my-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Hakkımızda Kutuları Güncelleme Formu</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-2">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Ana Başlık</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Ana sayfadaki Hakkımızda Bölümdeki Kutu Ana Başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="section_about_box_main_title" value="{{$sections["section_about_box_main_title"]}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-2">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Alt Başlık</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Ana sayfadaki Hakkımızda Bölümdeki Kutu Alt Başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="section_about_box_sub_title" value="{{$sections["section_about_box_sub_title"]}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Hakkımızda Bölümdeki Kutu 1 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_about_box_1_title" value="{{$sections["section_about_box_1_title"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_about_box_1_description" value="{{$sections["section_about_box_1_description"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3.Bölümdeki Kutu 1 Görsel"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="section_about_box_1_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_about_box_1_image"])}}" width="100px" class="mt-3">
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 2 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_about_box_2_title" value="{{$sections["section_about_box_2_title"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 2 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_about_box_2_description" value="{{$sections["section_about_box_2_description"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 2 İcon"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="section_about_box_2_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_about_box_2_image"])}}" width="100px" class="mt-3">
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 3 Başlık"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_about_box_3_title" value="{{$sections["section_about_box_3_title"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 3 İçerik"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="section_about_box_3_description" value="{{$sections["section_about_box_3_description"]}}" />
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
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="3. Bölümdeki Kutu 3 İcon"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid" name="section_about_box_3_image" />
                                                <!--end::Input-->
                                                <img src="{{asset($sections["section_about_box_3_image"])}}" width="100px" class="mt-3">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>


                                    <!--begin::Action buttons-->
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary w-100">
                                                <span class="indicator-label">Kaydet</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </form>

                                <!--end::Form-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_settings_customers" role="tabpanel">
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
                                                <input type="text" class="form-control form-control-solid" name="section_about_main_title" value="{{$sections["section_about_main_title"]}}" />

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
                                                <textarea class="form-control form-control-solid" name="section_about_main_description" rows="11">{{$sections["section_about_main_description"]}}</textarea>

                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary w-100">
                                                <span class="indicator-label">Kaydet</span>
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
                            <div class="tab-pane fade" id="kt_ecommerce_settings_s6" role="tabpanel">
                                <!--begin::Form-->
                                <div class="row my-3">
                                    <div class="col pl-3">
                                        <h2>Kayan Alan Güncelleme Formu</h2>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg-3" style="position: absolute;right: 55px;"><i class="fa-solid fa-plus-circle me-2"></i>Ekle</button>
                                    </div>
                                </div>
                                <div class="row my-3 mx-3">
                                    <div class="table-responsive" style="max-height:500px;">
                                            <table class="table table-responsive-md" id="myTable2">
                                                <thead>
                                                <tr>
                                                    <th><strong style="padding-left: 5px;">Görsel</strong></th>
                                                    <th><strong>Başlık</strong></th>
                                                    <th><strong>Link</strong></th>
                                                    <th><strong>İşlemler</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($swipers as $swiper)
                                                        <tr>
                                                            <td style="padding-left: 25px;">
                                                                <img src="{{asset($swiper->image)}}" width="50px">
                                                            </td>
                                                            <td>{{$swiper->title}}</td>
                                                            <td><a href="{{$swiper->link}}">{{$swiper->link}}</a></td>
                                                            <td>
                                                                <a class="btn btn-primary" style="margin-right: 0px;" href="{{route('admin.swiper.edit', $swiper->id)}}"><i class="fa fa-edit"></i></a>
                                                                <button type="button" class="btn btn-danger" onclick="deleteAction('{{route('admin.swiper.destroy', $swiper->id)}}', '{{$loop->index}}')"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @empty

                                                    @endforelse
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal-lg-3" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Kayan Alan Ekle</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" class="form" action="{{route('admin.swiper.store')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <!--begin::Heading-->

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
                                                                <input type="text" class="form-control form-control-solid" name="title" />

                                                                <!--end::Radio-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <div class="row fv-row mb-3">
                                                        <div class="col-md-3 text-md-end">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span>Link</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex mt-3">
                                                                <!--begin::Radio-->
                                                                <input type="text" class="form-control form-control-solid" name="link"/>

                                                                <!--end::Radio-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row fv-row mb-3">
                                                        <div class="col-md-3 text-md-end">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span>Görsel</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex mt-3">
                                                                <!--begin::Radio-->
                                                                <input type="file" class="form-control form-control-solid" name="image"/>

                                                                <!--end::Radio-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--begin::Input group-->
                                                    <div class="row">
                                                        <div class="col-md-12 mt-3">
                                                            <!--begin::Button-->
                                                            <button type="submit" class="btn btn-primary w-100">
                                                                <span class="indicator-label">Kaydet</span>
                                                            </button>
                                                            <!--end::Button-->
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Action buttons-->

                                                    <!--end::Action buttons-->
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
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
        $(document).ready(function (){
            $('#myTable2').DataTable();
        });
    </script>
    <script>
        function deleteAction(hostUrl, index){
            var table = $('#myTable2').DataTable();
            Swal.fire({
                text: "Bu kaydı silmek istediğine eminmisin?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, Sil!",
                cancelButtonText: "İptal et",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-danger"
                },
                customStyle: {
                    confirmButton:"margin-right:10px",
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url:hostUrl,
                        type: "POST",
                        data:{
                            _method:"DELETE",
                            _token:'{{csrf_token()}}'
                        },
                        dataType:"JSON",
                        success:function (res){
                            if(res.status=="success"){
                                table
                                    .row( $(this).parents('tr') )
                                    .remove()
                                    .draw();
                                Swal.fire({
                                    text: "Kayıt Silindi!.",
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
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "İşlem İptal Edildi!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamam!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });

        }
    </script>
@endsection
