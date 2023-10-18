
@extends('business.layouts.master')
@section('links')
    <link href="/panel/assets/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet" type="text/css"/>
    <style>
        @media (max-width: 768px) {
            .swiper-slide {
                width: 100% !important;
            }
        }
        .fc .fc-daygrid-event {
            margin-top: 1px;
            background: #878780;
            z-index: 6;
            border-radius: 15px;
            align-items: center;
            justify-content: center;
        }
        .fc-event, .external-event {

            border: none;
            cursor: move;
            font-size: 0.8125rem;
            margin: 0.3125rem 0.4375rem;
            padding: 0.3125rem;
            text-align: center;
            min-height: 86px;
            background: #878780;
            border-radius: 15px;
        }
        .fc .fc-daygrid-day.fc-day-today {
            background-color: var(--fc-bg-event-color);
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
                            <h2 class="heading"> Randevular </h2>
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
                                            <h4>Toplam Randevu</h4>
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
                                            <h4>Tamamlanan</h4>
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
                                            <h4>İptal Edilen</h4>
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
                                            <h4>Ödemesi Alınmamış</h4>
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
                        <div class="card">
                            <div class="card-header">
                                <button id="authorize_button" class="btn btn-primary" onclick="handleAuthClick()">Google Takvime Bağlan</button>

                            </div>
                            <div class="card-body">
                                <div id="calendar" style="height: 600px;"></div>

                            </div>
                        </div>

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
                    <h5 class="modal-title">Randevu Oluştur</h5>
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
                                    <option>Kunde Auswählen</option>
                                    @forelse(auth('business')->user()->customers as $bCustomer)
                                        <option value="{{$bCustomer->customer->id}}">{{$bCustomer->customer->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Personel</label>
                                <select name="personel_id" id="personel_id" class="form-control">
                                    <option>Personel Seçiniz</option>
                                    @forelse(auth('business')->user()->personel as $personel)
                                        <option value="{{$personel->id}}">{{$personel->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Hizmetler</label>
                                <select name="service_id" id="service_id" class="form-control">
                                    <option>Dienstleistung Auswählen</option>
                                    @forelse(auth('business')->user()->service as $service)
                                        <option value="{{$service->id}}">{{$service->subCategory->name. "(". $service->gender->name . ")"}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tarih Seçin</label>
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

    <div class="modal fade" id="eventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header" style="border: none;">
                    <h5 class="modal-title" id="eventDetailsModalLabel">Randevu Detayları</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: transparent;border: none;padding-top: -15px !important;top: -6px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="align-items: center;text-align: center;display: flex;flex-direction: column;">
                    <img src="" id="customerImage" style="width: 83px; height: 83px;border: 1px solid #7d7a7a59;border-radius: 50%;box-shadow: 1px 3px 15px #0003;
}">
                    <span id="customerName" style="font-size: 18px;font-weight: bold"></span>
                    <div style="display: flex;align-items: center;">
                        <i class="fa fa-clock" style="margin-right: 5px;font-size: 15px;"></i><span id="appointmentClock" style="font-size: 18px;font-weight: bold">Saat</span>

                    </div>
                    <ul id="servicesList" style="list-style: disc; line-height: 1.5rem;"></ul>
                </div>

            </div>
        </div>
    </div>
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
    <!--<script>
        $(document).ready(function () {
            $('#example3').DataTable();
        });
        $("#checkAll").on("change", function () {
            $("td input, .custom-checkbox input").prop("checked", $(this).prop("checked"))
        })
    </script>-->
    <!--<script>
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
    </script>-->

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/locales/tr.js"></script>
    <script src="/business/assets/js/calender.js" ></script>
    <script>
        var allAppointments = [
                @forelse ($appointments as $appointment)
            {
                title: '{{$appointment->customer->name}}',
                start: '{{\Illuminate\Support\Carbon::parse($appointment->start_time)->toIso8601String()}}', // Başlangıç tarihi ve saat
                end: '{{\Illuminate\Support\Carbon::parse($appointment->end_time)->toIso8601String()}}',    // Bitiş tarihi ve saat
                customer: '{{$appointment->customer->name}}',
                clockRange: '{{\Illuminate\Support\Carbon::parse($appointment->start_time)->format('H:i'). '-'. \Illuminate\Support\Carbon::parse($appointment->end_time)->format('H:i')}}',
                statusText: '{{$appointment->status('text')}}',
                statusCode: '{{$appointment->status('code')}}',
                image: '{{image($appointment->customer->image)}}',
                services: [
                     @foreach($appointment->services as $service)
                    {
                        image: '{{storage($service->personel->image)}}',
                        personel: '{{$service->personel->name}}',
                        hizmet: '{{$service->service->subCategory->name}}'
                    },
                    @endforeach
                ]

            },
            @empty
            @endforelse

        ];
    </script>

    <script type="text/javascript">

        const CLIENT_ID = '449337264437-njtrb3c4t391i80dp0c72pm0sh88970l.apps.googleusercontent.com';
        const API_KEY = 'AIzaSyAESuQeot_Y76HEPqe1sx8vf2pgzfpuDVQ';

        // Discovery doc URL for APIs used by the quickstart
        const DISCOVERY_DOC = 'https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest';

        // Authorization scopes required by the API; multiple scopes can be
        // included, separated by spaces.
        const SCOPES = 'https://www.googleapis.com/auth/calendar';

        let tokenClient;
        let gapiInited = false;
        let gisInited = false;

        document.getElementById('authorize_button').style.visibility = 'hidden';
        //document.getElementById('signout_button').style.visibility = 'hidden';

        /**
         * Callback after api.js is loaded.
         */
        function gapiLoaded() {
            gapi.load('client', initializeGapiClient);
        }

        /**
         * Callback after the API client is loaded. Loads the
         * discovery doc to initialize the API.
         */
        async function initializeGapiClient() {
            await gapi.client.init({
                apiKey: API_KEY,
                discoveryDocs: [DISCOVERY_DOC],
            });
            gapiInited = true;
            maybeEnableButtons();
        }

        /**
         * Callback after Google Identity Services are loaded.
         */
        function gisLoaded() {
            tokenClient = google.accounts.oauth2.initTokenClient({
                client_id: CLIENT_ID,
                scope: SCOPES,
                callback: '', // defined later
            });
            gisInited = true;
            maybeEnableButtons();
        }

        /**
         * Enables user interaction after all libraries are loaded.
         */
        function maybeEnableButtons() {
            if (gapiInited && gisInited) {
                document.getElementById('authorize_button').style.visibility = 'visible';
            }
        }

        /**
         *  Sign in the user upon button click.
         */
        function handleAuthClick() {
            tokenClient.callback = async (resp) => {
                if (resp.error !== undefined) {
                    throw (resp);
                }

                document.getElementById('authorize_button').innerText = 'Takvime Ekle';
                if(document.getElementById('authorize_button').innerText == 'Takvime Ekle'){
                    addEventToCalendar();
                }
            };

            if (gapi.client.getToken() === null) {
                // Prompt the user to select a Google Account and ask for consent to share their data
                // when establishing a new session.
                tokenClient.requestAccessToken({prompt: 'consent'});

            } else {
                // Skip display of account chooser and consent dialog for an existing session.
                tokenClient.requestAccessToken({prompt: ''});

            }
        }

        /**
         *  Sign out the user upon button click.
         */
        function handleSignoutClick() {
            const token = gapi.client.getToken();
            if (token !== null) {
                google.accounts.oauth2.revoke(token.access_token);
                gapi.client.setToken('');
                document.getElementById('content').innerText = '';
                document.getElementById('authorize_button').innerText = 'Takvime Bağlan';
            }
        }

        async function addEventToCalendar() {
            const eventsToAdd = [
                @forelse ($appointments as $appointment)
                {
                    'summary': '{{$appointment->customer->name}}',
                    'location': '{{$appointment->business->name}}',
                    'description': '{{$appointment->note}}',
                    'start': {
                        'dateTime': '{{\Illuminate\Support\Carbon::parse($appointment->start_time)->toIso8601String()}}',
                        'timeZone': 'Europe/Istanbul'
                    },
                    'end': {
                        'dateTime': '{{\Illuminate\Support\Carbon::parse($appointment->end_time)->toIso8601String()}}',
                        'timeZone': 'Europe/Istanbul'
                    },
                    'recurrence': [],
                    'attendees': [
                        @foreach($appointment->services as $service)
                            {'email': '{{$service->personel->email}}'},
                        @endforeach
                    ],
                    'reminders': {
                        'useDefault': false,
                        'overrides': [
                            {'method': 'email', 'minutes': 120},
                            {'method': 'popup', 'minutes': 10}
                        ]
                    }
                },
                @empty
                @endforelse
            ];

            addMultipleEventsToCalendar(eventsToAdd);
        }
        async function addEventToCalendar() {
            const eventsToAdd = [
                    @forelse ($appointments as $appointment)
                {
                    'summary': '{{$appointment->customer->name}}',
                    'location': '{{$appointment->business->name}}',
                    'description': '{{$appointment->note}}',
                    'start': {
                        'dateTime': '{{\Illuminate\Support\Carbon::parse($appointment->start_time)->toIso8601String()}}',
                        'timeZone': 'Europe/Istanbul'
                    },
                    'end': {
                        'dateTime': '{{\Illuminate\Support\Carbon::parse($appointment->end_time)->toIso8601String()}}',
                        'timeZone': 'Europe/Istanbul'
                    },
                    'recurrence': [],
                    'attendees': [
                            @foreach($appointment->services as $service)
                        {'email': '{{$service->personel->email}}'},
                        @endforeach
                    ],
                    'reminders': {
                        'useDefault': false,
                        'overrides': [
                            {'method': 'email', 'minutes': 120},
                            {'method': 'popup', 'minutes': 10}
                        ]
                    }
                },
                @empty
                @endforelse
            ];

            // Eklenmiş olan randevuların ID'lerini tutmak için bir dizi oluşturun
            const addedEventIds = [];

            try {
                // Mevcut randevuları alın
                const existingEvents = await gapi.client.calendar.events.list({
                    'calendarId': 'primary',
                    'timeMin': (new Date()).toISOString(),
                    'showDeleted': false,
                    'singleEvents': true,
                    'maxResults': 100, // Gerekirse sayıyı artırın
                    'orderBy': 'startTime',
                });

                // Eklenmiş olan randevuların ID'lerini toplayın
                if (existingEvents.result.items) {
                    existingEvents.result.items.forEach((event) => {
                        addedEventIds.push(event.id);
                    });
                }

                // Yeni randevuları eklerken kontrol edin
                const batch = gapi.client.newBatch();
                eventsToAdd.forEach((event, index) => {
                    // Eğer bu randevu daha önce eklenmemişse, ekleyin
                    if (!addedEventIds.includes(index.toString())) {
                        batch.add(gapi.client.calendar.events.insert({
                            'calendarId': 'primary',
                            'resource': event,
                        }), {'id': index.toString()});
                    }
                });

                const response = await batch;
                alert('Takvime Eklendi', response);
            } catch (err) {
                console.error('Error adding events: ', err);
            }
        }
        async function addMultipleEventsToCalendar(events) {
            try {
                const batch = gapi.client.newBatch();
                events.forEach((event, index) => {
                    batch.add(gapi.client.calendar.events.insert({
                        'calendarId': 'primary',
                        'resource': event,
                    }), {'id': index.toString()});
                });

                const response = await batch;
                alert('Takvime Eklendi', response);
            } catch (err) {
                console.error('Error adding events: ', err);
            }
        }

    </script>
    <script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
    <script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>

@endsection