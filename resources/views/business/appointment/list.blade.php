
@extends('business.layouts.master')
@section('links')
    <link href="/panel/assets/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet" type="text/css"/>
    <style>
        @media (max-width: 768px) {
            .swiper-slide {
                width: 100% !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titles">
                        <div class="d-flex align-items-center">
                            <h2 class="heading"> Termınlıste </h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row wow fadeInUp main-card" data-wow-delay="0.7s">
                <!-- ----column-- -->
                <div class="col-xxl-12 col-xl-12">
                    <div class="swiper ticketing-Swiper position-relative overflow-hidden">
                        <div class="swiper-wrapper ">
                            <div class="swiper-slide">
                                <div class="card ticket blue">
                                    <div class="back-image">
                                        <svg width="102" height="100" viewBox="0 0 102 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.3">
                                                <path d="M89.3573 123.082C59.4605 115.689 41.2417 85.3438 48.6706 55.2997C56.0995 25.2556 86.3609 6.89766 116.258 14.2901C146.155 21.6826 164.373 52.028 156.944 82.0721C149.516 112.116 119.254 130.474 89.3573 123.082Z" stroke="white"/>
                                                <path d="M91.021 116.351C64.8418 109.878 48.891 83.2911 55.4008 56.964C61.9106 30.6368 88.4137 14.5476 114.593 21.0208C140.772 27.4941 156.723 54.0807 150.213 80.4078C143.703 106.735 117.2 122.824 91.021 116.351Z" stroke="white"/>
                                                <path d="M82.6265 121.417C56.4473 114.944 40.4965 88.3576 47.0063 62.0304C53.5161 35.7033 80.0191 19.6141 106.198 26.0873C132.378 32.5605 148.328 59.1471 141.819 85.4743C135.309 111.801 108.806 127.891 82.6265 121.417Z" stroke="white"/>
                                                <path d="M73.9723 126.42C47.9385 119.983 32.1005 93.4265 38.6109 67.0969C45.1213 40.7672 71.5104 24.6525 97.5442 31.0897C123.578 37.527 139.416 64.0831 132.906 90.4127C126.395 116.742 100.006 132.857 73.9723 126.42Z" stroke="white"/>
                                                <path d="M65.3189 131.422C39.1396 124.949 23.1888 98.3625 29.6986 72.0353C36.2084 45.7082 62.7115 29.6189 88.8908 36.0922C115.07 42.5654 131.021 69.152 124.511 95.4792C118.001 121.806 91.4981 137.896 65.3189 131.422Z" stroke="white"/>
                                                <path d="M56.6647 136.425C30.6309 129.987 14.7929 103.431 21.3033 77.1017C27.8137 50.7721 54.2027 34.6573 80.2365 41.0946C106.27 47.5318 122.108 74.0879 115.598 100.418C109.088 126.747 82.6985 142.862 56.6647 136.425Z" stroke="white"/>
                                                <circle cx="59.7333" cy="94.0209" r="48.8339" transform="rotate(103.889 59.7333 94.0209)" stroke="white"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <div class="title">
                                            <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.425781" width="8" height="8" fill="#FCFCFC"/>
                                            </svg>
                                            <h4>Gesamt</h4>
                                        </div>
                                        <div  class="chart-num">
                                            <h2>{{authUser()->appointments->count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card ticket secondary">
                                    <div class="back-image">
                                        <svg width="102" height="100" viewBox="0 0 102 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.3">
                                                <path d="M89.3573 123.082C59.4605 115.689 41.2417 85.3438 48.6706 55.2997C56.0995 25.2556 86.3609 6.89766 116.258 14.2901C146.155 21.6826 164.373 52.028 156.944 82.0721C149.516 112.116 119.254 130.474 89.3573 123.082Z" stroke="white"/>
                                                <path d="M91.021 116.351C64.8418 109.878 48.891 83.2911 55.4008 56.964C61.9106 30.6368 88.4137 14.5476 114.593 21.0208C140.772 27.4941 156.723 54.0807 150.213 80.4078C143.703 106.735 117.2 122.824 91.021 116.351Z" stroke="white"/>
                                                <path d="M82.6265 121.417C56.4473 114.944 40.4965 88.3576 47.0063 62.0304C53.5161 35.7033 80.0191 19.6141 106.198 26.0873C132.378 32.5605 148.328 59.1471 141.819 85.4743C135.309 111.801 108.806 127.891 82.6265 121.417Z" stroke="white"/>
                                                <path d="M73.9723 126.42C47.9385 119.983 32.1005 93.4265 38.6109 67.0969C45.1213 40.7672 71.5104 24.6525 97.5442 31.0897C123.578 37.527 139.416 64.0831 132.906 90.4127C126.395 116.742 100.006 132.857 73.9723 126.42Z" stroke="white"/>
                                                <path d="M65.3189 131.422C39.1396 124.949 23.1888 98.3625 29.6986 72.0353C36.2084 45.7082 62.7115 29.6189 88.8908 36.0922C115.07 42.5654 131.021 69.152 124.511 95.4792C118.001 121.806 91.4981 137.896 65.3189 131.422Z" stroke="white"/>
                                                <path d="M56.6647 136.425C30.6309 129.987 14.7929 103.431 21.3033 77.1017C27.8137 50.7721 54.2027 34.6573 80.2365 41.0946C106.27 47.5318 122.108 74.0879 115.598 100.418C109.088 126.747 82.6985 142.862 56.6647 136.425Z" stroke="white"/>
                                                <circle cx="59.7333" cy="94.0209" r="48.8339" transform="rotate(103.889 59.7333 94.0209)" stroke="white"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <div class="title">
                                            <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.425781" width="8" height="8" fill="#FCFCFC"/>
                                            </svg>
                                            <h4>Erledigt</h4>
                                        </div>
                                        <div  class="chart-num">
                                            <h2>{{authUser()->appointments()->where('status', 7)->count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card ticket pink">
                                    <div class="back-image">
                                        <svg width="102" height="100" viewBox="0 0 102 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.3">
                                                <path d="M89.3573 123.082C59.4605 115.689 41.2417 85.3438 48.6706 55.2997C56.0995 25.2556 86.3609 6.89766 116.258 14.2901C146.155 21.6826 164.373 52.028 156.944 82.0721C149.516 112.116 119.254 130.474 89.3573 123.082Z" stroke="white"/>
                                                <path d="M91.021 116.351C64.8418 109.878 48.891 83.2911 55.4008 56.964C61.9106 30.6368 88.4137 14.5476 114.593 21.0208C140.772 27.4941 156.723 54.0807 150.213 80.4078C143.703 106.735 117.2 122.824 91.021 116.351Z" stroke="white"/>
                                                <path d="M82.6265 121.417C56.4473 114.944 40.4965 88.3576 47.0063 62.0304C53.5161 35.7033 80.0191 19.6141 106.198 26.0873C132.378 32.5605 148.328 59.1471 141.819 85.4743C135.309 111.801 108.806 127.891 82.6265 121.417Z" stroke="white"/>
                                                <path d="M73.9723 126.42C47.9385 119.983 32.1005 93.4265 38.6109 67.0969C45.1213 40.7672 71.5104 24.6525 97.5442 31.0897C123.578 37.527 139.416 64.0831 132.906 90.4127C126.395 116.742 100.006 132.857 73.9723 126.42Z" stroke="white"/>
                                                <path d="M65.3189 131.422C39.1396 124.949 23.1888 98.3625 29.6986 72.0353C36.2084 45.7082 62.7115 29.6189 88.8908 36.0922C115.07 42.5654 131.021 69.152 124.511 95.4792C118.001 121.806 91.4981 137.896 65.3189 131.422Z" stroke="white"/>
                                                <path d="M56.6647 136.425C30.6309 129.987 14.7929 103.431 21.3033 77.1017C27.8137 50.7721 54.2027 34.6573 80.2365 41.0946C106.27 47.5318 122.108 74.0879 115.598 100.418C109.088 126.747 82.6985 142.862 56.6647 136.425Z" stroke="white"/>
                                                <circle cx="59.7333" cy="94.0209" r="48.8339" transform="rotate(103.889 59.7333 94.0209)" stroke="white"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <div class="title">
                                            <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.425781" width="8" height="8" fill="#FCFCFC"/>
                                            </svg>
                                            <h4>Storniert</h4>
                                        </div>
                                        <div  class="chart-num">
                                            <h2>{{authUser()->appointments()->where('status', 8)->count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card ticket black">
                                    <div class="back-image">
                                        <svg width="102" height="100" viewBox="0 0 102 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.3">
                                                <path d="M89.3573 123.082C59.4605 115.689 41.2417 85.3438 48.6706 55.2997C56.0995 25.2556 86.3609 6.89766 116.258 14.2901C146.155 21.6826 164.373 52.028 156.944 82.0721C149.516 112.116 119.254 130.474 89.3573 123.082Z" stroke="white"/>
                                                <path d="M91.021 116.351C64.8418 109.878 48.891 83.2911 55.4008 56.964C61.9106 30.6368 88.4137 14.5476 114.593 21.0208C140.772 27.4941 156.723 54.0807 150.213 80.4078C143.703 106.735 117.2 122.824 91.021 116.351Z" stroke="white"/>
                                                <path d="M82.6265 121.417C56.4473 114.944 40.4965 88.3576 47.0063 62.0304C53.5161 35.7033 80.0191 19.6141 106.198 26.0873C132.378 32.5605 148.328 59.1471 141.819 85.4743C135.309 111.801 108.806 127.891 82.6265 121.417Z" stroke="white"/>
                                                <path d="M73.9723 126.42C47.9385 119.983 32.1005 93.4265 38.6109 67.0969C45.1213 40.7672 71.5104 24.6525 97.5442 31.0897C123.578 37.527 139.416 64.0831 132.906 90.4127C126.395 116.742 100.006 132.857 73.9723 126.42Z" stroke="white"/>
                                                <path d="M65.3189 131.422C39.1396 124.949 23.1888 98.3625 29.6986 72.0353C36.2084 45.7082 62.7115 29.6189 88.8908 36.0922C115.07 42.5654 131.021 69.152 124.511 95.4792C118.001 121.806 91.4981 137.896 65.3189 131.422Z" stroke="white"/>
                                                <path d="M56.6647 136.425C30.6309 129.987 14.7929 103.431 21.3033 77.1017C27.8137 50.7721 54.2027 34.6573 80.2365 41.0946C106.27 47.5318 122.108 74.0879 115.598 100.418C109.088 126.747 82.6985 142.862 56.6647 136.425Z" stroke="white"/>
                                                <circle cx="59.7333" cy="94.0209" r="48.8339" transform="rotate(103.889 59.7333 94.0209)" stroke="white"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <div class="title">
                                            <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.425781" width="8" height="8" fill="#FCFCFC"/>
                                            </svg>
                                            <h4>in Bearbeitung</h4>
                                        </div>
                                        <div  class="chart-num">
                                            <h2>{{authUser()->appointments()->where('status', 5)->count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                            <div class="card">
                                <div class="card-header border-0 flex-wrap">
                                    <h2 class="heading">Alle Termine</h2>
                                    <div class="d-flex align-items-center">
                                        <select class="image-select default-select dashboard-select me-4" aria-label="Default">
                                            <option selected>Diesen Monat</option>
                                            <option value="1">Diese Woche</option>
                                            <option value="2">Dieses Jahr</option>
                                        </select>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn-link btn sharp tp-btn btn-primary pill" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.33319 9.99985C8.33319 10.9203 9.07938 11.6665 9.99986 11.6665C10.9203 11.6665 11.6665 10.9203 11.6665 9.99986C11.6665 9.07938 10.9203 8.33319 9.99986 8.33319C9.07938 8.33319 8.33319 9.07938 8.33319 9.99985Z" fill="#ffffff"/>
                                                    <path d="M8.33319 3.33329C8.33319 4.25376 9.07938 4.99995 9.99986 4.99995C10.9203 4.99995 11.6665 4.25376 11.6665 3.33329C11.6665 2.41282 10.9203 1.66663 9.99986 1.66663C9.07938 1.66663 8.33319 2.41282 8.33319 3.33329Z" fill="#ffffff"/>
                                                    <path d="M8.33319 16.6667C8.33319 17.5871 9.07938 18.3333 9.99986 18.3333C10.9203 18.3333 11.6665 17.5871 11.6665 16.6667C11.6665 15.7462 10.9203 15 9.99986 15C9.07938 15 8.33319 15.7462 8.33319 16.6667Z" fill="#ffffff"/>
                                                </svg>

                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{route('business.appointment.export.excel')}}">Excel</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="table-responsive">
                                        <table class="table-responsive-lg table display mb-4 order-table card-table text-black no-footer student-tbl" id="example3">
                                            <thead>
                                            <tr>
                                                <th>Name Nachname</th>
                                                <th style="max-width: 150px">Termin</th>
                                                <th class="text-left" style="max-width: 150px;">Status</th>
                                                <th style="text-align: left">Mitarbeiter</th>
                                                <th>Transaktionen</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(authUser()->appointments as $appointment)
                                                @if($appointment->customer)
                                                    <tr>
                                                        <td class="whitesp-no p-0">
                                                            <div class="d-flex py-sm-3 py-1 align-items-center trans-info">
														<span class="icon me-3">
															<img src="{{image($appointment->customer->image)}}" width="50px">
														</span>
                                                                <div >
                                                                    <h6 class="font-w500 fs-15 mb-0">{{$appointment->customer->name}}</h6>
                                                                    <span class="fs-14 font-w400"><a href="tel:{{$appointment->customer->phone}}"> {{$appointment->customer->phone}}</a></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="whitesp-no" style="max-width: 150px;">
                                                            <a href="#" class="tb-mail">
                                                                {{\Illuminate\Support\Carbon::parse($appointment->date)->format('d.m.Y')}}
                                                            </a>
                                                        </td>
                                                        <td class="text-left" style="max-width: 150px">
                                                            {!! $appointment->status("html") !!}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                @forelse($appointment->services as $service)
                                                                    <label class="form-label">
                                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-toggle="tooltip" data-placement="top" title="{{$service->personel->name}}">
                                                                            <img src="{{asset($service->personel->image)}}" style="object-fit: cover;height: 45px;width: 45px" class="rounded-circle">
                                                                        </button>
                                                                    </label>
                                                                @empty

                                                                @endforelse
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="basic-dropdown">
                                                                <div class="btn-group dropstart mb-1">
                                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                                            data-bs-toggle="dropdown">
                                                                            Transaktionen
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="{{route('business.appointment.show', $appointment->id)}}">Detail</a>
                                                                        @if($appointment->status != 8)
                                                                            <a class="dropdown-item" href="{{route('business.appointment.reject', $appointment->id)}}">Stornieren</a>
                                                                        @endif
                                                                        @if($appointment->status == 0)
                                                                            <a class="dropdown-item"
                                                                               href="{{route('business.appointment.accept', $appointment->id)}}">Termin bestätigen</a>
                                                                        @endif

                                                                        @if($appointment->status == 3)
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="{{route('business.appointment.complete', $appointment->id)}}">
                                                                                Abgeschlossen
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @empty
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="alert alert-warning"> Keine Termine gefunden </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- ----/column-- -->
                    </div>
                    <!-- /--row-- -->
                </div>
                <!-- ----/column-- -->

            </div>
        </div>
    </div>
    {{--
        <div class="modal fade bd-example-modal-lg" style="width: 90% !important;" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: 120% !important;">
                <div class="modal-header">
                    <h5 class="modal-title">Erstellen Sie einen Termin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form method="post" action="{{route('business.appointment.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kunde</label>
                                <select name="customer_id" class="form-control">
                                    <option>Wählen Sie Kunde aus</option>
                                    @forelse(auth('business')->user()->customers as $bCustomer)
                                        <option value="{{$bCustomer->customer->id}}">{{$bCustomer->customer->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mitarbeiterr</label>
                                <select name="personel_id" id="personel_id" class="form-control">
                                    <option>Mitarbeiterr Select</option>
                                    @forelse(auth('business')->user()->personel as $personel)
                                        <option value="{{$personel->id}}">{{$personel->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Dienstleistungen</label>
                                <select name="service_id" id="service_id" class="form-control">
                                    <option>Hizmet Seçiniz</option>
                                    @forelse(auth('business')->user()->service as $service)
                                        <option value="{{$service->id}}">{{$service->subCategory->name. "(". $service->gender->name . ")"}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Datum auswählen</label>
                                <input type="text" name="start_time" class="form-control" placeholder="2017-06-04"
                                       id="min-date">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Schließen</button>
                        <button type="submit" class="btn btn-primary">Speichern</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    --}}
@endsection
@section('scripts')

    <script src="/panel/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.ticketing-Swiper', {
            speed: 1500,
            slidesPerView: 4,
            spaceBetween: 40,
            parallax: true,
            loop:true,
            breakpoints: {

                300: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1600: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example3').DataTable();

                $('[data-toggle="tooltip"]').tooltip()

        });
        $("#checkAll").on("change", function () {
            $("td input, .custom-checkbox input").prop("checked", $(this).prop("checked"))
        })
    </script>
    <script>
        function clearPastAppointments() {
            var now = new Date();
            var currentHour = now.getHours();
            var currentMinute = now.getMinutes();

            var currentTime = currentHour.toString().padStart(2, '0') + ':' + currentMinute.toString().padStart(2, '0');

            $('div[start-time]').each(function() {
                var startTime = $(this).attr('start-time');
                if (startTime < currentTime) {
                    $(this).remove();
                }
            });
        }

        $(document).ready(function() {
            clearPastAppointments();
            setInterval(clearPastAppointments, 60000);
        });
    </script>
    <script>

    </script>
@endsection