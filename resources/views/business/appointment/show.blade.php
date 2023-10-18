@extends('business.layouts.master')
@section('content')
    <div class="container-fluid">

        <!-- Row -->
        <div class="row">
            <div class="col-xl-9 col-xxl-8">
                <!-- Row -->
                <div class="row">
                    <!-- ----column---- -->
                    <div class="col-xl-12">
                        <div class="user card ">
                            <div class="user-head">
                                <div class="user-info">
                                    <div class="user-photo" style="margin-top: 0px !important;">
                                        <img src="{{image($appointment->customer->image)}}" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div class="user-details">
                                        <div>
                                            <div class="profile-name">
                                                <h3 class="name">{{$appointment->customer->name}}</h3>
                                                <h5>Kunde</h5>
                                            </div>
                                            <div class="user-contact">
                                                <div class="user-number ">
                                                    <div class="dz-media">
                                                        <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M27.2974 20.3613C27.2526 20.1711 27.1666 19.9931 27.0454 19.8399C26.9242 19.6867 26.7708 19.562 26.5961 19.4746L21.2627 16.8079C21.0124 16.683 20.7291 16.64 20.453 16.685C20.1768 16.7299 19.9218 16.8607 19.7241 17.0586L17.4907 19.2919C14.2814 18.7759 9.22408 13.7199 8.70941 10.5106L10.9427 8.27593C11.1407 8.07819 11.2714 7.8232 11.3164 7.54705C11.3614 7.27091 11.3184 6.98761 11.1934 6.73727L8.52675 1.40393C8.43945 1.22911 8.3148 1.07562 8.16161 0.954309C8.00842 0.833002 7.83044 0.746847 7.64027 0.701943C7.45009 0.657039 7.25238 0.654484 7.06111 0.694458C6.86983 0.734431 6.68969 0.815957 6.53341 0.933266L1.20008 4.93327C1.03449 5.05746 0.900082 5.21851 0.807512 5.40365C0.714941 5.58879 0.666748 5.79294 0.666748 5.99993C0.666748 18.7599 9.24008 27.3333 22.0001 27.3333C22.2071 27.3333 22.4112 27.2851 22.5964 27.1925C22.7815 27.0999 22.9426 26.9655 23.0667 26.7999L27.0667 21.4666C27.1837 21.3105 27.265 21.1305 27.3049 20.9396C27.3447 20.7486 27.3422 20.5512 27.2974 20.3613ZM21.3334 24.6573C10.7587 24.3733 3.62675 17.2413 3.34275 6.6666L6.85608 4.02527L8.37741 7.0666L6.39075 9.05327C6.26645 9.17752 6.16795 9.32513 6.1009 9.4876C6.03386 9.65006 5.99959 9.82418 6.00008 9.99993C6.00008 14.7106 13.2894 21.9999 18.0001 21.9999C18.3537 21.9999 18.6928 21.8593 18.9427 21.6093L20.9294 19.6226L23.9748 21.1453L21.3334 24.6573Z" fill="#FCFCFC"></path>
                                                        </svg>
                                                    </div>
                                                    <h4 class="details"><a href="tel: {{$appointment->customer->phone}}">{{$appointment->customer->phone}}</a></h4>
                                                </div>
                                                <div class="user-email">
                                                    <div class="dz-media">
                                                        <svg width="20" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M24 1.85315C24.0075 1.76443 24.0075 1.67522 24 1.58649L23.88 1.33315C23.88 1.33315 23.88 1.23982 23.8133 1.19982L23.7467 1.13315L23.5333 0.95982C23.475 0.90049 23.4075 0.850965 23.3333 0.813154L23.1067 0.733154H22.84H1.24H0.973333L0.746667 0.826487C0.672327 0.85818 0.604514 0.903389 0.546667 0.95982L0.333333 1.13315C0.333333 1.13315 0.333333 1.13315 0.333333 1.19982C0.333333 1.26649 0.333333 1.29315 0.266667 1.33315L0.146667 1.58649C0.13912 1.67522 0.13912 1.76443 0.146667 1.85315L0 1.99982V17.9998C0 18.3534 0.140476 18.6926 0.390524 18.9426C0.640573 19.1927 0.979711 19.3332 1.33333 19.3332H13.3333C13.687 19.3332 14.0261 19.1927 14.2761 18.9426C14.5262 18.6926 14.6667 18.3534 14.6667 17.9998C14.6667 17.6462 14.5262 17.3071 14.2761 17.057C14.0261 16.807 13.687 16.6665 13.3333 16.6665H2.66667V4.66649L11.2 11.0665C11.4308 11.2396 11.7115 11.3332 12 11.3332C12.2885 11.3332 12.5692 11.2396 12.8 11.0665L21.3333 4.66649V16.6665H18.6667C18.313 16.6665 17.9739 16.807 17.7239 17.057C17.4738 17.3071 17.3333 17.6462 17.3333 17.9998C17.3333 18.3534 17.4738 18.6926 17.7239 18.9426C17.9739 19.1927 18.313 19.3332 18.6667 19.3332H22.6667C23.0203 19.3332 23.3594 19.1927 23.6095 18.9426C23.8595 18.6926 24 18.3534 24 17.9998V1.99982C24 1.99982 24 1.90649 24 1.85315ZM12 8.33315L5.33333 3.33315H18.6667L12 8.33315Z" fill="#FCFCFC"></path>
                                                        </svg>
                                                    </div>
                                                    <h4 class="details"><a href="mailto: {{$appointment->customer->email}}">{{$appointment->customer->email}}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- ----/column---- -->
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Yapılacak İşlemler
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>Personel</th>
                                    <th>Dienstleistung</th>
                                    <th>Başlangıç Saati</th>
                                    <th>Bitiş Saati</th>
                                </tr>
                                </thead>
                                <tbody style="font-size: 16px">
                                   @forelse($appointment->services as $service)
                                       <tr>
                                           <td><img src="{{asset($service->personel->image)}}" width="40px" class="rounded-circle"> {{$service->personel->name}}</td>
                                           <td>{{$service->service->subCategory->name}}</td>
                                           <td>{{$service->start_time}}</td>
                                           <td>{{$service->end_time}}</td>
                                       </tr>
                                   @empty

                                   @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----column---- -->
            <div class="col-xl-3 col-xxl-4">
                <!-- --row-- -->
                <div class="row">
                    <!-- ----column---- -->
                    <div class="col-xl-12">
                        <div class="clearfix">
                            <div class="card card-bx profile-card author-profile m-b30">
                                <div class="card-header">
                                    <div class="card-title">
                                        Randevu Özeti
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="p-3" style="text-align: left;font-size: 16px;line-height: 2.8em">
                                        <ul>
                                            <li class="border-top border-primary"><b>Başlangıç Saati :</b> {{$appointment->start_time->format('d.m.Y H:i')}}</li>
                                            <li class="border-top border-primary"><b>Bitiş Saati :</b> {{$appointment->end_time->format('d.m.Y H:i')}}</li>

                                            <li class="border-top border-primary"><b>Ödenecek Tutar :</b> <span class="text-success">{{$appointment->calculateTotal($appointment->services)}} €</span> </li>
                                            <li class="border-top border-primary">
                                                <b>Durumu : {!! $appointment->status('html') !!}</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="info-list border-top border-primary">
                                        @if($appointment->status==5)
                                            <a class="btn btn-primary my-2">Ödeme Al</a>
                                        @endif
                                        @if($appointment->status==6)
                                            <a class="btn btn-primary my-2">Ödeme Onayla</a>
                                        @endif
                                        @if($appointment->status==7)
                                            <span class="alert alert-warning">Randevu Tamamlandı. İşlem yapmazsınız</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ----/column---- -->

                </div>
                <!-- --row-- -->
            </div>
            <!-- ----/column---- -->
        </div>

    </div>
@endsection