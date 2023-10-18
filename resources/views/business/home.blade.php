@extends('business.layouts.master')
@section('title', 'Anasayfa')
@section('links')
    <style>
        .box-2 {
            padding: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titles style1">
                        <div class="d-flex align-items-center">
                            <h2 class="heading">
                                DASHBOARD
                            </h2>
                        </div>
                        <div id="datepicker" class="input-group date dz-calender" data-date-format="mm-dd-yyyy">
						<span class="input-group-addon d-flex align-items-center">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 14.0001C12.1978 14.0001 12.3911 13.9415 12.5556 13.8316C12.72 13.7217 12.8482 13.5655 12.9239 13.3828C12.9996 13.2001 13.0194 12.999 12.9808 12.805C12.9422 12.611 12.847 12.4329 12.7071 12.293C12.5673 12.1531 12.3891 12.0579 12.1951 12.0193C12.0011 11.9807 11.8 12.0005 11.6173 12.0762C11.4346 12.1519 11.2784 12.2801 11.1685 12.4445C11.0586 12.609 11 12.8023 11 13.0001C11 13.2653 11.1054 13.5197 11.2929 13.7072C11.4804 13.8947 11.7348 14.0001 12 14.0001ZM17 14.0001C17.1978 14.0001 17.3911 13.9415 17.5556 13.8316C17.72 13.7217 17.8482 13.5655 17.9239 13.3828C17.9996 13.2001 18.0194 12.999 17.9808 12.805C17.9422 12.611 17.847 12.4329 17.7071 12.293C17.5673 12.1531 17.3891 12.0579 17.1951 12.0193C17.0011 11.9807 16.8 12.0005 16.6173 12.0762C16.4346 12.1519 16.2784 12.2801 16.1685 12.4445C16.0586 12.609 16 12.8023 16 13.0001C16 13.2653 16.1054 13.5197 16.2929 13.7072C16.4804 13.8947 16.7348 14.0001 17 14.0001ZM12 18.0001C12.1978 18.0001 12.3911 17.9415 12.5556 17.8316C12.72 17.7217 12.8482 17.5655 12.9239 17.3828C12.9996 17.2001 13.0194 16.999 12.9808 16.805C12.9422 16.611 12.847 16.4328 12.7071 16.293C12.5673 16.1531 12.3891 16.0579 12.1951 16.0193C12.0011 15.9807 11.8 16.0005 11.6173 16.0762C11.4346 16.1519 11.2784 16.2801 11.1685 16.4445C11.0586 16.609 11 16.8023 11 17.0001C11 17.2653 11.1054 17.5197 11.2929 17.7072C11.4804 17.8947 11.7348 18.0001 12 18.0001ZM17 18.0001C17.1978 18.0001 17.3911 17.9415 17.5556 17.8316C17.72 17.7217 17.8482 17.5655 17.9239 17.3828C17.9996 17.2001 18.0194 16.999 17.9808 16.805C17.9422 16.611 17.847 16.4328 17.7071 16.293C17.5673 16.1531 17.3891 16.0579 17.1951 16.0193C17.0011 15.9807 16.8 16.0005 16.6173 16.0762C16.4346 16.1519 16.2784 16.2801 16.1685 16.4445C16.0586 16.609 16 16.8023 16 17.0001C16 17.2653 16.1054 17.5197 16.2929 17.7072C16.4804 17.8947 16.7348 18.0001 17 18.0001ZM7 14.0001C7.19778 14.0001 7.39112 13.9415 7.55557 13.8316C7.72002 13.7217 7.84819 13.5655 7.92388 13.3828C7.99957 13.2001 8.01937 12.999 7.98078 12.805C7.9422 12.611 7.84696 12.4329 7.70711 12.293C7.56725 12.1531 7.38907 12.0579 7.19509 12.0193C7.00111 11.9807 6.80004 12.0005 6.61732 12.0762C6.43459 12.1519 6.27841 12.2801 6.16853 12.4445C6.05865 12.609 6 12.8023 6 13.0001C6 13.2653 6.10536 13.5197 6.29289 13.7072C6.48043 13.8947 6.73478 14.0001 7 14.0001ZM19 4.00011H18V3.00011C18 2.73489 17.8946 2.48054 17.7071 2.293C17.5196 2.10546 17.2652 2.00011 17 2.00011C16.7348 2.00011 16.4804 2.10546 16.2929 2.293C16.1054 2.48054 16 2.73489 16 3.00011V4.00011H8V3.00011C8 2.73489 7.89464 2.48054 7.70711 2.293C7.51957 2.10546 7.26522 2.00011 7 2.00011C6.73478 2.00011 6.48043 2.10546 6.29289 2.293C6.10536 2.48054 6 2.73489 6 3.00011V4.00011H5C4.20435 4.00011 3.44129 4.31618 2.87868 4.87879C2.31607 5.4414 2 6.20446 2 7.00011V19.0001C2 19.7958 2.31607 20.5588 2.87868 21.1214C3.44129 21.684 4.20435 22.0001 5 22.0001H19C19.7956 22.0001 20.5587 21.684 21.1213 21.1214C21.6839 20.5588 22 19.7958 22 19.0001V7.00011C22 6.20446 21.6839 5.4414 21.1213 4.87879C20.5587 4.31618 19.7956 4.00011 19 4.00011ZM20 19.0001C20 19.2653 19.8946 19.5197 19.7071 19.7072C19.5196 19.8947 19.2652 20.0001 19 20.0001H5C4.73478 20.0001 4.48043 19.8947 4.29289 19.7072C4.10536 19.5197 4 19.2653 4 19.0001V10.0001H20V19.0001ZM20 8.00011H4V7.00011C4 6.73489 4.10536 6.48054 4.29289 6.293C4.48043 6.10546 4.73478 6.00011 5 6.00011H19C19.2652 6.00011 19.5196 6.10546 19.7071 6.293C19.8946 6.48054 20 6.73489 20 7.00011V8.00011ZM7 18.0001C7.19778 18.0001 7.39112 17.9415 7.55557 17.8316C7.72002 17.7217 7.84819 17.5655 7.92388 17.3828C7.99957 17.2001 8.01937 16.999 7.98078 16.805C7.9422 16.611 7.84696 16.4328 7.70711 16.293C7.56725 16.1531 7.38907 16.0579 7.19509 16.0193C7.00111 15.9807 6.80004 16.0005 6.61732 16.0762C6.43459 16.1519 6.27841 16.2801 6.16853 16.4445C6.05865 16.609 6 16.8023 6 17.0001C6 17.2653 6.10536 17.5197 6.29289 17.7072C6.48043 17.8947 6.73478 18.0001 7 18.0001Z" fill="var(--primary)"/>
							</svg>
						</span>
                            <div class="calender-picker">
                                <h6 class="fs-14 mb-0 ms-2 font-w600">Heute</h6>
                                <input class="form-control" type="text" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('business.layouts.component.alert')
            <div class="row">
                    <!-- ---swiper-slide--- -->
                    <div class="col-lg-3">
                        <div class="card counter">
                            <div class="card-body d-flex align-items-center">
                                <div class="card-box-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.8333 6.66667V7.16667H23.3333H28.3333C28.6428 7.16667 28.9395 7.28958 29.1583 7.50838C29.3771 7.72717 29.5 8.02391 29.5 8.33333V28.3333C29.5 28.6428 29.3771 28.9395 29.1583 29.1583C28.9395 29.3771 28.6428 29.5 28.3333 29.5H13.3333C13.0239 29.5 12.7272 29.3771 12.5084 29.1583C12.2896 28.9395 12.1667 28.6428 12.1667 28.3333C12.1667 28.0239 12.2896 27.7272 12.5084 27.5084C12.7272 27.2896 13.0239 27.1667 13.3333 27.1667H26.6667H27.1667V26.6667V18.3333V17.8333H26.6667H20H19.5V18.3333V20C19.5 20.3094 19.3771 20.6062 19.1583 20.825C18.9395 21.0438 18.6428 21.1667 18.3333 21.1667H11.6667C11.3572 21.1667 11.0605 21.0438 10.8417 20.825C10.6229 20.6062 10.5 20.3094 10.5 20V18.3333V17.8333H10H3.33333H2.83333V18.3333V26.6667V27.1667H3.33333H6.66667C6.97609 27.1667 7.27283 27.2896 7.49162 27.5084C7.71042 27.7272 7.83333 28.0239 7.83333 28.3333C7.83333 28.6428 7.71042 28.9395 7.49162 29.1583C7.27283 29.3771 6.97609 29.5 6.66667 29.5H1.66667C1.35725 29.5 1.0605 29.3771 0.841709 29.1583C0.622917 28.9395 0.5 28.6428 0.5 28.3333V8.33333C0.5 8.02391 0.622916 7.72717 0.841709 7.50838C1.0605 7.28958 1.35725 7.16667 1.66667 7.16667H6.66667H7.16667V6.66667V1.66667C7.16667 1.35725 7.28958 1.0605 7.50838 0.841709C7.72717 0.622916 8.02391 0.5 8.33333 0.5H21.6667C21.9761 0.5 22.2728 0.622916 22.4916 0.841709C22.7104 1.0605 22.8333 1.35725 22.8333 1.66667V6.66667ZM10 2.83333H9.5V3.33333V6.66667V7.16667H10H20H20.5V6.66667V3.33333V2.83333H20H10ZM16.6667 18.8333H17.1667V18.3333V15V14.5H16.6667H13.3333H12.8333V15V18.3333V18.8333H13.3333H16.6667ZM19.5 15V15.5H20H26.6667H27.1667V15V10V9.5H26.6667H3.33333H2.83333V10V15V15.5H3.33333H10H10.5V15V13.3333C10.5 13.0239 10.6229 12.7272 10.8417 12.5084C11.0605 12.2896 11.3572 12.1667 11.6667 12.1667H18.3333C18.6428 12.1667 18.9395 12.2896 19.1583 12.5084C19.3771 12.7272 19.5 13.0239 19.5 13.3333V15Z" fill="var(--primary)" stroke="var(--primary)"/>
                                    </svg>
                                </div>
                                <div  class="chart-num">
                                    <h2 class="font-w600 mb-0">{{$todayAppointments->count()}}</h2>
                                    <p>
                                        Termine Heute
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card counter">
                            <div class="card-body d-flex align-items-center">
                                <div class="card-box-icon">
                                    <i class="fa fa-users" style="font-size: 25px; color: red;"></i>
                                </div>
                                <div class="chart-num">
                                    <h2 class="font-w600 mb-0">{{auth('business')->user()->customers->count()}}</h2>
                                    <p>
                                        Gesamt Kunden Anzahl
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card counter">
                            <div class="card-body d-flex align-items-center">
                                <div class="card-box-icon">
                                    <i class="fa fa-user-circle" style="font-size: 25px; color: #0a58ca"></i>
                                </div>
                                <div class="chart-num">
                                    <h2 class="font-w600 mb-0">{{auth('business')->user()->personel->count()}}</h2>
                                    <p>
                                        Gesamt Mitarbetier
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card counter">
                            <div class="card-body d-flex align-items-center">
                                <div class="card-box-icon">
                                   <i class="fa fa-chart-pie" style="font-size: 25px; color: deeppink"></i>
                                </div>
                                <div class="chart-num">
                                    <h2 class="font-w600 mb-0">{{$earning}} €</h2>
                                    <p>
                                        Gesamt Gewinn
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                   <div class="row">
                       <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-6">
                           <a href="{{route('business.appointment.index')}}">
                               <div class="widget-stat card">
                                   <div class="card-body rounded bg-success p-4">
                                       <h1 class="text-white"><i class="fa fa-calendar-check"></i> TERMINE</h1>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-6">
                           <a href="{{route('business.customer.index')}}">
                               <div class="widget-stat card">
                                   <div class="card-body rounded bg-secondary p-4">
                                       <h1 class="text-white"><i class="fa fa-user-circle"></i> KUNDEN</h1>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-6">
                          <a href="{{route('business.personel.index')}}">
                              <div class="widget-stat card">
                                  <div class="card-body rounded bg-warning p-4">
                                      <h1 class="text-white"><i class="fa fa-person"></i> MITARBEITER</h1>
                                  </div>
                              </div>
                          </a>
                       </div>
                       <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-6">
                          <a href="{{route('business.businessService.index')}}">
                              <div class="widget-stat card">
                                  <div class="card-body rounded bg-primary p-4">
                                      <h1 class="text-white"><i class="fa fa-gear"></i> DIENSTLEISTUNGEN</h1>
                                  </div>
                              </div>
                          </a>
                       </div>
                       <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-6">
                          <a href="{{route('business.product.index')}}">
                              <div class="widget-stat card">
                                  <div class="card-body rounded bg-black p-4">
                                      <h1 class="text-white"><i class="fa fa-table"></i> PRODUKTE</h1>
                                  </div>
                              </div>
                          </a>
                       </div>
                       <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-6">
                           <a href="{{route('business.gallery.index')}}">
                               <div class="widget-stat card">
                                   <div class="card-body rounded bg-info p-4">
                                       <h1 class="text-white"><i class="fa fa-table"></i> GALERIE</h1>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12 wow fadeInUp">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">HEUTIGE TERMINE</h4>
                    {{--   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                            <i class="fa-solid fa-plus-circle me-2"></i>
                            Personal Hinzufügen
                            </button>
                            ---}}
                </div>
                <div class="card-body">
                    <div class="row">
                    @forelse($todayAppointments as $appointment)
                        <div class="col-md-6 col-xl-4" start-time="{{\Illuminate\Support\Carbon::parse($appointment->start_time)->format('H:i')}}" ap_id="{{$appointment->id}}">
                            <div class="card box-2">
                                <div class="flow mt-2"
                                    @if(\Illuminate\Support\Carbon::parse($appointment->start_time)->diffInMinutes(\Illuminate\Support\Carbon::now()) < 30)
                                       style="border: 1px solid rgba(179, 48, 61, 0.40)"
                                    @elseif(\Illuminate\Support\Carbon::parse($appointment->start_time)->diffInMinutes(\Illuminate\Support\Carbon::now()) < 60)
                                         style="border: 1px solid rgba(255, 239, 37, 0.40)"
                                    @elseif(\Illuminate\Support\Carbon::parse($appointment->start_time)->diffInMinutes(\Illuminate\Support\Carbon::now()) < 120)
                                         style="border: 1px solid rgba(1, 163, 255, 0.40)"
                                    @else
                                        style="border: 1px solid rgba(30, 186, 98, 0.40)"
                                    @endif
                                >
                                    <h4>{{$appointment->customer->name}}</h4>
                                    <p>{!! $appointment->status("html") !!}</p>
                                    <div class="dz-info">
                                        <ul>
                                            <li class="mb-2"><svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 14C12.1978 14 12.3911 13.9414 12.5556 13.8315C12.72 13.7216 12.8482 13.5654 12.9239 13.3827C12.9996 13.2 13.0194 12.9989 12.9808 12.8049C12.9422 12.6109 12.847 12.4327 12.7071 12.2929C12.5673 12.153 12.3891 12.0578 12.1951 12.0192C12.0011 11.9806 11.8 12.0004 11.6173 12.0761C11.4346 12.1518 11.2784 12.28 11.1685 12.4444C11.0587 12.6089 11 12.8022 11 13C11 13.2652 11.1054 13.5196 11.2929 13.7071C11.4804 13.8946 11.7348 14 12 14ZM17 14C17.1978 14 17.3911 13.9414 17.5556 13.8315C17.72 13.7216 17.8482 13.5654 17.9239 13.3827C17.9996 13.2 18.0194 12.9989 17.9808 12.8049C17.9422 12.6109 17.847 12.4327 17.7071 12.2929C17.5673 12.153 17.3891 12.0578 17.1951 12.0192C17.0011 11.9806 16.8 12.0004 16.6173 12.0761C16.4346 12.1518 16.2784 12.28 16.1685 12.4444C16.0587 12.6089 16 12.8022 16 13C16 13.2652 16.1054 13.5196 16.2929 13.7071C16.4804 13.8946 16.7348 14 17 14ZM12 18C12.1978 18 12.3911 17.9414 12.5556 17.8315C12.72 17.7216 12.8482 17.5654 12.9239 17.3827C12.9996 17.2 13.0194 16.9989 12.9808 16.8049C12.9422 16.6109 12.847 16.4327 12.7071 16.2929C12.5673 16.153 12.3891 16.0578 12.1951 16.0192C12.0011 15.9806 11.8 16.0004 11.6173 16.0761C11.4346 16.1518 11.2784 16.28 11.1685 16.4444C11.0587 16.6089 11 16.8022 11 17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18ZM17 18C17.1978 18 17.3911 17.9414 17.5556 17.8315C17.72 17.7216 17.8482 17.5654 17.9239 17.3827C17.9996 17.2 18.0194 16.9989 17.9808 16.8049C17.9422 16.6109 17.847 16.4327 17.7071 16.2929C17.5673 16.153 17.3891 16.0578 17.1951 16.0192C17.0011 15.9806 16.8 16.0004 16.6173 16.0761C16.4346 16.1518 16.2784 16.28 16.1685 16.4444C16.0587 16.6089 16 16.8022 16 17C16 17.2652 16.1054 17.5196 16.2929 17.7071C16.4804 17.8946 16.7348 18 17 18ZM7 14C7.19778 14 7.39112 13.9414 7.55557 13.8315C7.72002 13.7216 7.84819 13.5654 7.92388 13.3827C7.99957 13.2 8.01937 12.9989 7.98079 12.8049C7.9422 12.6109 7.84696 12.4327 7.70711 12.2929C7.56725 12.153 7.38907 12.0578 7.19509 12.0192C7.00111 11.9806 6.80004 12.0004 6.61732 12.0761C6.43459 12.1518 6.27841 12.28 6.16853 12.4444C6.05865 12.6089 6 12.8022 6 13C6 13.2652 6.10536 13.5196 6.29289 13.7071C6.48043 13.8946 6.73478 14 7 14ZM19 4H18V3C18 2.73478 17.8946 2.48043 17.7071 2.29289C17.5196 2.10536 17.2652 2 17 2C16.7348 2 16.4804 2.10536 16.2929 2.29289C16.1054 2.48043 16 2.73478 16 3V4H8V3C8 2.73478 7.89464 2.48043 7.70711 2.29289C7.51957 2.10536 7.26522 2 7 2C6.73478 2 6.48043 2.10536 6.29289 2.29289C6.10536 2.48043 6 2.73478 6 3V4H5C4.20435 4 3.44129 4.31607 2.87868 4.87868C2.31607 5.44129 2 6.20435 2 7V19C2 19.7957 2.31607 20.5587 2.87868 21.1213C3.44129 21.6839 4.20435 22 5 22H19C19.7957 22 20.5587 21.6839 21.1213 21.1213C21.6839 20.5587 22 19.7957 22 19V7C22 6.20435 21.6839 5.44129 21.1213 4.87868C20.5587 4.31607 19.7957 4 19 4ZM20 19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H5C4.73478 20 4.48043 19.8946 4.29289 19.7071C4.10536 19.5196 4 19.2652 4 19V10H20V19ZM20 8H4V7C4 6.73478 4.10536 6.48043 4.29289 6.29289C4.48043 6.10536 4.73478 6 5 6H19C19.2652 6 19.5196 6.10536 19.7071 6.29289C19.8946 6.48043 20 6.73478 20 7V8ZM7 18C7.19778 18 7.39112 17.9414 7.55557 17.8315C7.72002 17.7216 7.84819 17.5654 7.92388 17.3827C7.99957 17.2 8.01937 16.9989 7.98079 16.8049C7.9422 16.6109 7.84696 16.4327 7.70711 16.2929C7.56725 16.153 7.38907 16.0578 7.19509 16.0192C7.00111 15.9806 6.80004 16.0004 6.61732 16.0761C6.43459 16.1518 6.27841 16.28 6.16853 16.4444C6.05865 16.6089 6 16.8022 6 17C6 17.2652 6.10536 17.5196 6.29289 17.7071C6.48043 17.8946 6.73478 18 7 18Z" fill="#2A353A"></path>
                                                </svg>
                                                {{\Illuminate\Support\Carbon::parse($appointment->start_time)->translatedFormat('F d, Y')}}</li>
                                            <li><svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 6C11.8687 5.99997 11.7386 6.02581 11.6173 6.07605C11.4959 6.12629 11.3857 6.19995 11.2928 6.29282C11.2 6.38568 11.1263 6.49594 11.0761 6.61728C11.0258 6.73862 11 6.86867 11 7V11.3838L8.56934 12.6069C8.45206 12.6659 8.34755 12.7474 8.26178 12.8468C8.176 12.9462 8.11064 13.0615 8.06942 13.1861C8.0282 13.3108 8.01194 13.4423 8.02156 13.5733C8.03118 13.7042 8.0665 13.8319 8.12549 13.9492C8.18448 14.0665 8.26599 14.171 8.36538 14.2568C8.46476 14.3426 8.58006 14.4079 8.70471 14.4491C8.82935 14.4904 8.96089 14.5066 9.09182 14.497C9.22274 14.4874 9.35049 14.4521 9.46777 14.3931L12.4492 12.8931C12.6148 12.81 12.7541 12.6824 12.8513 12.5247C12.9486 12.367 13.0001 12.1853 13 12V7C13 6.86867 12.9742 6.73862 12.924 6.61728C12.8737 6.49594 12.8001 6.38568 12.7072 6.29282C12.6143 6.19995 12.5041 6.12629 12.3827 6.07605C12.2614 6.02581 12.1313 5.99997 12 6ZM12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C21.997 9.34877 20.9424 6.80699 19.0677 4.93228C17.193 3.05758 14.6512 2.00303 12 2ZM12 20C10.4178 20 8.87104 19.5308 7.55544 18.6518C6.23985 17.7727 5.21447 16.5233 4.60897 15.0615C4.00347 13.5997 3.84504 11.9911 4.15372 10.4393C4.4624 8.88743 5.22433 7.46197 6.34315 6.34315C7.46197 5.22433 8.88743 4.4624 10.4393 4.15372C11.9911 3.84504 13.5997 4.00346 15.0615 4.60896C16.5233 5.21447 17.7727 6.23985 18.6518 7.55544C19.5308 8.87103 20 10.4178 20 12C19.9976 14.121 19.1539 16.1544 17.6542 17.6542C16.1544 19.1539 14.121 19.9976 12 20Z" fill="#2A353A"></path>
                                                </svg>
                                                {{\Illuminate\Support\Carbon::parse($appointment->start_time)->format('H:i'). " - ". \Illuminate\Support\Carbon::parse($appointment->end_time)->format('H:i')}}</li>
                                        </ul>
                                        <div class="dz-media"><img src="{{image($appointment->customer->image)}}" alt=""></div>
                                    </div>
                                    @if(\Illuminate\Support\Carbon::parse($appointment->start_time)->diffInMinutes(\Illuminate\Support\Carbon::now()) < 30)
                                        <div class="side" style="background-color: #b3303d;"></div>
                                    @elseif(\Illuminate\Support\Carbon::parse($appointment->start_time)->diffInMinutes(\Illuminate\Support\Carbon::now()) < 60)
                                        <div class="side" style="background-color: #FFD125;"></div>
                                    @elseif(\Illuminate\Support\Carbon::parse($appointment->start_time)->diffInMinutes(\Illuminate\Support\Carbon::now()) < 120)
                                        <div class="side" style="background-color: #d59c4b;"></div>
                                    @else
                                        <div class="side" style="background-color: #1EBA62;"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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
@endsection
