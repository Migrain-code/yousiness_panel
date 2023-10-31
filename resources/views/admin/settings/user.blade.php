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
                            <li class="nav-item">
                                <a class="nav-link text-active-primary active" data-bs-toggle="tab" href="#kt_ecommerce_settings_general">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->Allgemein</a>
                            </li>
                            <!--begin:::Tab item-->

                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_products">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm005.svg-->
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="currentColor"></path>
                                        <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="currentColor"></path>
                                    </svg>
                                    <!--end::Svg Icon-->Startseite</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_contact">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm005.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
														<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
													</svg>
													</span>
                                    <!--end::Svg Icon-->Kontakt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_ecommerce_settings_social">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm005.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
														<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
													</svg>
													</span>
                                    <!--end::Svg Icon-->Social Media</a>
                            </li>
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--start:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_settings_general" role="tabpanel">
                                <!--begin::Form-->
                                <form enctype="multipart/form-data" class="form" action="{{route('admin.settings.update')}}" method="post">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row mb-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Allgemeine Einstellungen</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Startseite Überschrift</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the title of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="speed_site_title" value="{{setting('speed_site_title')}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Meta</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <textarea type="text" class="form-control form-control-solid" name="speed_meta_description">{{config('settings.speed_meta_description')}}</textarea>
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Logo (White Thema)</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the description of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-solid" name="speed_logo_white" value="{{setting('speed_logo_white')}}" />
                                            <img src="{{asset(setting('speed_logo_white'))}}" style="width: 50px" class="mt-2">
                                        </div>
                                    </div>

                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Logo Fooder</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the description of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-solid" name="speed_logo_footer" value="{{setting('speed_logo_footer')}}" />
                                            <img src="{{asset(setting('speed_logo_footer'))}}" style="width: 50px" class="mt-2">
                                        </div>
                                    </div>

                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Logo (Dark Thema)</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the description of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-solid" name="speed_logo_dark" value="{{setting('speed_logo_dark')}}" />
                                            <img src="{{asset(setting('speed_logo_dark'))}}" style="width: 50px"  class="mt-2">
                                        </div>
                                    </div>

                                    <!--end::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Favicon</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the description of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-solid" name="speed_favicon" value="{{setting('speed_favicon')}}" />
                                            <img src="{{asset(setting('speed_favicon'))}}" width="100px"  class="mt-2">
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Seiten Anzahl</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the description of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="number" class="form-control form-control-solid" name="speed_pagination_number" value="{{setting('speed_pagination_number')}}" />
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Footer Über uns</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the description of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <textarea rows="5" class="form-control form-control-solid" name="speed_footer_about">{{setting('speed_footer_about')}}</textarea>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Action buttons-->
                                    <div class="row py-5">
                                        <div class="col-md-9 offset-md-3">
                                            <div class="d-flex">
                                                <!--begin::Button-->
                                                <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Schließen</button>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="indicator-label">Speichern</span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--start:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_settings_products" role="tabpanel">
                                <!--begin::Form-->
                                <form enctype="multipart/form-data"  class="form" action="{{route('admin.settings.update')}}" method="post">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row mb-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Seiteneinstellungen</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Geburtstagsbenachrichtigung</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" @checked(setting('speed_birthday_message')=="1") name="speed_birthday_message" id="category_product_count_yes" checked="checked" />
                                                    <label class="form-check-label" for="category_product_count_yes">Senden</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" @checked(setting('speed_birthday_message')=="0") name="speed_birthday_message" id="category_product_count_no" />
                                                    <label class="form-check-label" for="category_product_count_no">Nicht senden</label>
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Heading-->
                                    <div class="row mb-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Startseite Bereiche Einstellungen</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Bereich 1</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_1')=="1") name="speed_main_page_section_1" id="allow_reviews_yes" checked="checked" />
                                                    <label class="form-check-label" for="allow_reviews_yes">Anzeigen</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_1')=="0") name="speed_main_page_section_1" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">Ausblenden</label>
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Bereich 2</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_2')=="1") name="speed_main_page_section_2" id="allow_reviews_yes" checked="checked" />
                                                    <label class="form-check-label" for="allow_reviews_yes">Anzeigen</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_2')=="0") name="speed_main_page_section_2" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">Ausblenden</label>
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Bereich 3</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_3')=="1") name="speed_main_page_section_3" id="allow_reviews_yes" checked="checked" />
                                                    <label class="form-check-label" for="allow_reviews_yes">Anzeigen</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_3')=="0") name="speed_main_page_section_3" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">Ausblenden</label>
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Bereich 4</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_4')=="1") name="speed_main_page_section_4" id="allow_reviews_yes" checked="checked" />
                                                    <label class="form-check-label" for="allow_reviews_yes">Anzeigen</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_4')=="0") name="speed_main_page_section_4" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">Ausblenden</label>
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Bereich 5</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_5')=="1") name="speed_main_page_section_5" id="allow_reviews_yes" checked="checked" />
                                                    <label class="form-check-label" for="allow_reviews_yes">Anzeigen</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_5')=="0") name="speed_main_page_section_5" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">Ausblenden</label>
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Bereich 6</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enable/disable review entries for registered customers"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" @checked(setting('speed_main_page_section_6')=="1") name="speed_main_page_section_6" id="allow_reviews_yes" checked="checked" />
                                                    <label class="form-check-label" for="allow_reviews_yes">Anzeigen</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" @checked(setting('speed_main_page_section_6')=="0") name="speed_main_page_section_6" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">Ausblenden</label>
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row py-5">
                                        <div class="col-md-9 offset-md-3">
                                            <div class="d-flex">

                                                <!--begin::Button-->
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="indicator-label">Speichern</span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--start:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_settings_contact" role="tabpanel">
                                <!--begin::Form-->
                                <form method="post" class="form" action="{{route('admin.settings.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row my-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Kontakt Einstellungen</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Telefon</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <input type="text" class="form-control form-control-solid" name="speed_contact_phone" value="{{setting('speed_contact_phone')}}" />
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>E-Mail</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="İşletmeler için sayfasındaki hakkımızda alanı başlık"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <input type="text" class="form-control form-control-solid" name="speed_contact_email" value="{{setting('speed_contact_email')}}" />
                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Anschrift</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <textarea class="form-control form-control-solid" name="speed_contact_address" rows="11">{{setting('speed_contact_address')}}</textarea>

                                                <!--end::Radio-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Maps Code</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <textarea class="form-control form-control-solid" name="speed_address_map" rows="11">{{setting('speed_address_map')}}</textarea>

                                                <!--end::Radio-->
                                            </div>
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

                            <!--start:::Tab pane-->
                            <!--start:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_settings_social" role="tabpanel">
                                <!--begin::Form-->
                                <form enctype="multipart/form-data" class="form" action="{{route('admin.settings.update')}}" method="post">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="row mb-3">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Allgemeine Einstellungen</h2>
                                        </div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Facebook</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the title of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="speed_facebook_url" value="{{setting('speed_facebook_url')}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Twitter</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the title of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="speed_twitter_url" value="{{setting('speed_twitter_url')}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Instagram</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the title of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="speed_intagram_url" value="{{setting('speed_intagram_url')}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row fv-row mb-3">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Youtube</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Set the title of the store for SEO."></i>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="speed_youtube_url" value="{{setting('speed_youtube_url')}}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Action buttons-->
                                    <div class="row py-5">
                                        <div class="col-md-9 offset-md-3">
                                            <div class="d-flex">
                                                <!--begin::Button-->
                                                <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Schließen</button>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="indicator-label">Speichern</span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab pane-->
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

@endsection
