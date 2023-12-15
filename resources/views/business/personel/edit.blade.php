@extends('business.layouts.master')
@section('content')
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-titles">
                    <div class="d-flex align-items-center">
                        <h2 class="heading">
                            MITARBEITER BEARBEITEN
                        </h2>
                    </div>
                </div>
            </div>
            @include('business.layouts.component.alert')
            <div class="col-xl-3 col-lg-4">
                <div class="clearfix">
                    <div class="card card-bx profile-card author-profile m-b30">
                        <div class="card-body">
                            <div class="p-5">
                                <div class="author-profile">
                                    <div class="author-media">
                                        <img src="{{asset($personel->image)}}" alt="">
                                    </div>
                                    <div class="author-info">
                                        <h6 class="title">{{$personel->name}}</h6>
                                        <span>Mitarbeiter</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li>
                                        <a href="#">
                                            Termin Dauer
                                        </a>
                                        <span>{{$totalTime." min"}}</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Termin Anzahl
                                        </a>
                                        <span>{{$appointments->count()}}</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Gewinn
                                        </a>
                                        <span>{{$totalPrice}}€</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card your_balance">
                    <div class="card-header border-0">
                        <div>
                            <h2 class="heading mb-1">MITARBEITER DETAIL</h2>
                            <span>{{now()->format('d.m.Y H:i:s')}}</span>
                        </div>
                    </div>
                    <div class="card-body pt-0 custome-tooltip">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="mothly-income" style="background-color: #600ee4;padding: 20px 10px;border-radius: 18px;line-height: 2em">
                                    <span class="text-white fw-bold">Diesen Monat</span>
                                    <h4 class="text-white">{{$theMonthTotal}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="mothly-income" style="background-color: #ff7d10;padding: 20px 10px;border-radius: 18px;line-height: 2em">
                                    <span class="text-white fw-bold">Dieses Jahr</span>
                                    <h4 class="text-white">{{$theYearTotal}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="mothly-income" style="background-color: #4cb32b;padding: 20px 10px;border-radius: 18px;line-height: 2em">
                                    <span class="text-white fw-bold">Gesamt</span>
                                    <h4 class="text-white">{{$allTotal}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col-xl-12 col-sm-12">
                                <div id="barChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card profile-card card-bx m-b30">
                    <div class="custom-tab-1">
                        <div class="card-header">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#profile"><i class="la la-home me-2"></i>Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#appointments"><i class="la la-user me-2"></i> Termine</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#payments_order"><i class="la la-credit-card me-2"></i>Paket Verkauf </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#payments_packet"><i class="la la-credit-card me-2"></i> Produkt Verkauf </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#notification"><i class="la la-envelope me-2"></i> Nachrichten </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <div class="card-body" style="margin-top:-50px">
                                    <form class="profile-form" method="post" action="{{route('business.personel.update', $personel->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Name Nachname</label>
                                                    <input type="text" class="form-control" name="name" value="{{$personel->name}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">E-Mail</label>
                                                    <input type="email" class="form-control" name="email" value="{{$personel->email}}">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Passwort</label>
                                                    <input type="text" class="form-control" name="password" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Mobilnummer</label>
                                                    <input type="text" class="form-control" placeholder="+49 172 123 45 67" value="{{$personel->phone}}" name="phone">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Genehmigungserlaubnis</label>
                                                    <select name="accept" class="form-control">
                                                        <option value="1" @selected($personel->accept == 1)>İzin Ver</option>
                                                        <option value="0" @selected($personel->accept == 0)>İzin Verme</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Freier Tag
                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Hier wâhlen Sie den Tag andem ihr Mitarbeiter frei hat." title="Freiertag">
                                                            <i class="fa-solid fa-question-circle"></i>
                                                        </button></label>
                                                    <select name="off_day[]" multiple class="form-control">
                                                        @forelse($dayList as $list)
                                                            <option value="{{$list->id}}" @selected(in_array($list->id, $times))>{{$list->name}}</option>
                                                        @empty

                                                        @endforelse
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Dienstanfang
                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Hier werden die Arbeitszeiten Ihrer Mitarbeiter angezeigt.
Sie können Ihre Mitarbeiter für diese Zeiten einteilen." title="Arbeitszeit">
                                                            <i class="fa-solid fa-question-circle"></i>
                                                        </button>
                                                    </label>
                                                    <input type="time" class="form-control" name="start_time" value="{{$personel->start_time}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">

                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label"> Dienstende
                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Hier werden die Arbeitszeiten Ihrer Mitarbeiter angezeigt.
Sie können Ihre Mitarbeiter für diese Zeiten einteilen." title="Arbeitszeit">
                                                            <i class="fa-solid fa-question-circle"></i>
                                                        </button>
                                                    </label>
                                                    <input type="time" class="form-control" name="end_time" value="{{$personel->end_time}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Pausenanfang <span class="text-warning">(Optional)</span>
                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Hier werden die Pau enzeiten Ihrer Mitarbeiter eingetragen." title="Pausenanfang">
                                                            <i class="fa-solid fa-question-circle"></i>
                                                        </button>
                                                    </label>
                                                    <input type="time" class="form-control" name="food_start_time" value="{{$personel->food_start}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">

                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label"> Pausenende <span class="text-warning">(Optional)</span>
                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Hier werden die Pausenzeiten Ihrer Mitarbeiter eingetragen." title="Pausenende">
                                                            <i class="fa-solid fa-question-circle"></i>
                                                        </button>
                                                    </label>
                                                    <input type="time" class="form-control" name="food_end_time" value="{{$personel->food_end}}" min="{{auth('business')->user()->start_time}}" max="{{auth('business')->user()->end_time}}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                @if(auth('business')->user()->type_id == 3)
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label"> Geschlecht von Kunde
                                                            <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Hier werden die Geschlechter angezeigt, die Ihre Mitarbeiter bedienen. Sie können das gewünschte Geschlecht aus dieser Geschlechtsauswahl auswählen." title="Geschlechtsspezifische Einstellungen">
                                                                <i class="fa-solid fa-question-circle"></i>
                                                            </button>
                                                        </label>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="">Geschlecht Auswählen</option>
                                                            <option value="1" @selected($personel->gender == 1)>Frau</option>
                                                            <option value="2" @selected($personel->gender == 2)>Mann</option>
                                                            <option value="3" @selected($personel->gender == 3)>Beides</option>
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label"> Lohnart
                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Hier können Sie festlegen, wie Ihr Unternehmen mit den Mitarbeitern zusammenarbeitet, und den
Anteil auswählen, der seinem Anteil an den von ihm durchgeführten Transaktionen zugewiesen wird." title="Personalanteil">
                                                            <i class="fa-solid fa-question-circle"></i>
                                                        </button>
                                                    </label>
                                                    <select name="rate" class="form-control">
                                                        <option value="">Lohnart Auswählen</option>
                                                        @forelse($rates as $row)
                                                            <option value="{{$row->id}}" @selected($row->id == $personel->rate)>{{$row->rate == 0 ? "Angesteller". " %". $row->rate : "% ".$row->rate}}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Foto</label>
                                                    <input type="file" class="form-control" name="image" value="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label"> Dienstleistung Auswählen <span class="text-warning">(Mehrauswahl möglich)</span>
                                                        <button type="button" class="" style="width: 19px;background: none;border: none;font-size: 10px;border-radius: 50%;color: #01a3ff;padding: 2px;" data-bs-container="body"
                                                                data-bs-toggle="popover"
                                                                data-bs-placement="right"
                                                                data-bs-content="Hier werden die von Ihnen definierten Dienstleistungen angezeig, die das Personal Ihres Salons erbringen wird. Die angebotenen Dienstleistungen werden nach dem Geschlecht aufgelistet, das Sie im Feld Geschlecht ausgewâhlt haben."
                                                                title="Dienstleistung Auswählen">
                                                            <i class="fa-solid fa-question-circle"></i>
                                                        </button>
                                                    </label>
                                                    <select name="services[]" multiple id="service" class="form-control">
                                                        @forelse(auth('business')->user()->services as $service)
                                                            <option value="{{$service->id}}" @selected(in_array($service->id,$services))>{{$service->subCategory->name. "(". $service->gender->name. ")"}}</option>
                                                        @empty
                                                        @endforelse
                                                        @if(auth('business')->user()->services->count() > 2)
                                                            <option value="all">Aile Dienstleistungen</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label"> Dauer der Dienstleistung
                                                    </label>
                                                    <select name="range" class="form-control">
                                                        <option value="">Zeit Auswählen</option>
                                                        @for($i = 5; $i <= 120; $i+=5)
                                                            <option value="{{$i}}" @selected($personel->range == $i)>{{$i}} min.</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label"> Bemerkung
                                                    </label>
                                                    <textarea name="description" rows="5" class="form-control">{{$personel->description}}</textarea>
                                                </div>
                                            </div>
                                            {{--End Modal Body--}}
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Aktualisieren</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="appointments" role="tabpanel">
                                <div class="col-xl-12">
                                    <!-- Row -->
                                    <div class="row mx-4 my-4">

                                        @forelse($appointments as $appointment)

                                                <!-- ----column---- -->
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card contact_list">
                                                        <div class="card-body border-primary" style="border:1px solid;border-radius: 10px">
                                                            <div class="user-content">
                                                                <div class="user-info">
                                                                    <div class="user-img">
                                                                        <img src="{{image($appointment->appointment->customer->image)}}" alt="">
                                                                    </div>
                                                                    <div class="user-details">
                                                                        <h4 class="user-name">{{$appointment->appointment->customer->name}}</h4>
                                                                        <span class="number">{{$appointment->appointment->customer->phone}}</span>
                                                                        {!! $appointment->appointment->status('html') !!}

                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn-link btn sharp tp-btn btn-primary pill" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.33319 9.99985C8.33319 10.9203 9.07938 11.6665 9.99986 11.6665C10.9203 11.6665 11.6665 10.9203 11.6665 9.99986C11.6665 9.07938 10.9203 8.33319 9.99986 8.33319C9.07938 8.33319 8.33319 9.07938 8.33319 9.99985Z" fill="#ffffff"></path>
                                                                            <path d="M8.33319 3.33329C8.33319 4.25376 9.07938 4.99995 9.99986 4.99995C10.9203 4.99995 11.6665 4.25376 11.6665 3.33329C11.6665 2.41282 10.9203 1.66663 9.99986 1.66663C9.07938 1.66663 8.33319 2.41282 8.33319 3.33329Z" fill="#ffffff"></path>
                                                                            <path d="M8.33319 16.6667C8.33319 17.5871 9.07938 18.3333 9.99986 18.3333C10.9203 18.3333 11.6665 17.5871 11.6665 16.6667C11.6665 15.7462 10.9203 15 9.99986 15C9.07938 15 8.33319 15.7462 8.33319 16.6667Z" fill="#ffffff"></path>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                                        @if($appointment->status != 8)
                                                                            <a class="dropdown-item"
                                                                               href="{{route('business.appointment.reject', $appointment->appointment->id)}}">Stornieren</a>
                                                                        @endif
                                                                        @if($appointment->status == 0)
                                                                            <a class="dropdown-item"
                                                                               href="{{route('business.appointment.accept', $appointment->appointment->id)}}">Termin bestätigen
                                                                                </a>
                                                                        @endif
                                                                        @if($appointment->status== 3)
                                                                            <a class="dropdown-item" href="{{route('business.appointment.complete', $appointment->id)}}">Abgeschlossen</a>
                                                                        @endif


                                                                        <a class="dropdown-item btn btn-primary text-white" href="{{route('business.appointment.show', $appointment->id)}}"><i class="la la-info-circle"></i> Detay</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="contact-icon">
                                                                <a class="icon" href="tel:{{$appointment->appointment->customer->phone}}">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M19.973 14.7709C19.9394 14.6283 19.8749 14.4949 19.784 14.3799C19.6931 14.265 19.578 14.1715 19.447 14.1059L15.447 12.1059C15.2592 12.0122 15.0468 11.98 14.8397 12.0137C14.6325 12.0475 14.4413 12.1455 14.293 12.2939L12.618 13.9689C10.211 13.5819 6.418 9.78994 6.032 7.38294L7.707 5.70694C7.85545 5.55864 7.95349 5.36739 7.98723 5.16028C8.02097 4.95317 7.9887 4.7407 7.895 4.55294L5.895 0.552942C5.82953 0.421827 5.73604 0.306705 5.62115 0.215724C5.50625 0.124744 5.37277 0.0601275 5.23014 0.0264496C5.08751 -0.00722831 4.93922 -0.00914485 4.79577 0.0208356C4.65231 0.050816 4.5172 0.111961 4.4 0.199942L0.4 3.19994C0.275804 3.29309 0.175 3.41387 0.105573 3.55273C0.036145 3.69158 0 3.8447 0 3.99994C0 13.5699 6.43 19.9999 16 19.9999C16.1552 19.9999 16.3084 19.9638 16.4472 19.8944C16.5861 19.8249 16.7069 19.7241 16.8 19.5999L19.8 15.5999C19.8877 15.4828 19.9487 15.3479 19.9786 15.2047C20.0085 15.0614 20.0066 14.9134 19.973 14.7709ZM15.5 17.9929C7.569 17.7799 2.22 12.4309 2.007 4.49994L4.642 2.51894L5.783 4.79994L4.293 6.28994C4.19978 6.38314 4.1259 6.49384 4.07561 6.61569C4.02533 6.73754 3.99963 6.86813 4 6.99994C4 10.5329 9.467 15.9999 13 15.9999C13.2652 15.9999 13.5195 15.8945 13.707 15.7069L15.197 14.2169L17.481 15.3589L15.5 17.9929Z" fill="#01A3FF"></path>
                                                                    </svg>
                                                                </a>
                                                                @if($appointment->appointment->customer->custom_email)
                                                                    <a class="icon" type="button" data-bs-toggle="modal" data-bs-target="#bd-example-modal-mail" onclick="addCustomerId('{{$appointment->appointment->customer_id}}')">
                                                                        <svg width="20" height="20" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M21.5 1.87161C21.5066 1.79397 21.5066 1.71591 21.5 1.63828L21.395 1.41661C21.395 1.41661 21.395 1.33494 21.3367 1.29994L21.2783 1.24161L21.0917 1.08994C21.0406 1.03803 20.9815 0.994693 20.9167 0.961609L20.7183 0.891609H20.485H1.585H1.35167L1.15333 0.973276C1.08829 1.00101 1.02895 1.04056 0.978333 1.08994L0.791667 1.24161C0.791667 1.24161 0.791667 1.24161 0.791667 1.29994C0.791667 1.35828 0.791667 1.38161 0.733333 1.41661L0.628333 1.63828C0.62173 1.71591 0.62173 1.79397 0.628333 1.87161L0.5 1.99994V15.9999C0.5 16.3094 0.622916 16.6061 0.841709 16.8249C1.0605 17.0437 1.35725 17.1666 1.66667 17.1666H12.1667C12.4761 17.1666 12.7728 17.0437 12.9916 16.8249C13.2104 16.6061 13.3333 16.3094 13.3333 15.9999C13.3333 15.6905 13.2104 15.3938 12.9916 15.175C12.7728 14.9562 12.4761 14.8333 12.1667 14.8333H2.83333V4.33328L10.3 9.93328C10.5019 10.0847 10.7476 10.1666 11 10.1666C11.2524 10.1666 11.4981 10.0847 11.7 9.93328L19.1667 4.33328V14.8333H16.8333C16.5239 14.8333 16.2272 14.9562 16.0084 15.175C15.7896 15.3938 15.6667 15.6905 15.6667 15.9999C15.6667 16.3094 15.7896 16.6061 16.0084 16.8249C16.2272 17.0437 16.5239 17.1666 16.8333 17.1666H20.3333C20.6427 17.1666 20.9395 17.0437 21.1583 16.8249C21.3771 16.6061 21.5 16.3094 21.5 15.9999V1.99994C21.5 1.99994 21.5 1.91828 21.5 1.87161ZM11 7.54161L5.16667 3.16661H16.8333L11 7.54161Z" fill="#01A3FF"></path>
                                                                        </svg>
                                                                    </a>
                                                                @endif
                                                                <a class="icon" type="button" data-bs-toggle="modal" data-bs-target="#bd-example-modal-sms" onclick="addCustomerId('{{$appointment->appointment->customer_id}}')">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1.33333 19.75C1.19613 19.7503 1.0601 19.7246 0.932501 19.6742C0.73093 19.5939 0.558108 19.4549 0.436421 19.2753C0.314735 19.0957 0.24979 18.8836 0.250001 18.6667V1.33333C0.250001 1.04602 0.364137 0.770465 0.567301 0.567301C0.770466 0.364137 1.04602 0.25 1.33333 0.25H18.6667C18.954 0.25 19.2295 0.364137 19.4327 0.567301C19.6359 0.770465 19.75 1.04602 19.75 1.33333V4.58333C19.75 4.87065 19.6359 5.1462 19.4327 5.34937C19.2295 5.55253 18.954 5.66667 18.6667 5.66667C18.3793 5.66667 18.1038 5.55253 17.9006 5.34937C17.6975 5.1462 17.5833 4.87065 17.5833 4.58333V2.41667H2.41667V15.9367L4.58333 13.5967C4.68803 13.4837 4.81563 13.3943 4.9576 13.3345C5.09958 13.2747 5.25267 13.2459 5.40667 13.25H17.5833V8.91667C17.5833 8.62935 17.6975 8.3538 17.9006 8.15063C18.1038 7.94747 18.3793 7.83333 18.6667 7.83333C18.954 7.83333 19.2295 7.94747 19.4327 8.15063C19.6359 8.3538 19.75 8.62935 19.75 8.91667V14.3333C19.75 14.6207 19.6359 14.8962 19.4327 15.0994C19.2295 15.3025 18.954 15.4167 18.6667 15.4167H5.8725L2.12417 19.4033C2.02316 19.5122 1.90083 19.5992 1.76478 19.6589C1.62874 19.7185 1.48188 19.7495 1.33333 19.75Z" fill="#01A3FF"></path>
                                                                        <path d="M14.3335 6.75001H5.66683C5.37951 6.75001 5.10396 6.63587 4.9008 6.43271C4.69763 6.22954 4.5835 5.95399 4.5835 5.66668C4.5835 5.37936 4.69763 5.10381 4.9008 4.90064C5.10396 4.69748 5.37951 4.58334 5.66683 4.58334H14.3335C14.6208 4.58334 14.8964 4.69748 15.0995 4.90064C15.3027 5.10381 15.4168 5.37936 15.4168 5.66668C15.4168 5.95399 15.3027 6.22954 15.0995 6.43271C14.8964 6.63587 14.6208 6.75001 14.3335 6.75001ZM14.3335 11.0833H5.66683C5.37951 11.0833 5.10396 10.9692 4.9008 10.766C4.69763 10.5629 4.5835 10.2873 4.5835 10C4.5835 9.71269 4.69763 9.43714 4.9008 9.23398C5.10396 9.03081 5.37951 8.91668 5.66683 8.91668H14.3335C14.6208 8.91668 14.8964 9.03081 15.0995 9.23398C15.3027 9.43714 15.4168 9.71269 15.4168 10C15.4168 10.2873 15.3027 10.5629 15.0995 10.766C14.8964 10.9692 14.6208 11.0833 14.3335 11.0833Z" fill="#01A3FF"></path>
                                                                    </svg>

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ----/column---- -->

                                        @empty
                                            <div class="alert alert-warning text-center">Keine Termine gefunden</div>
                                        @endforelse
                                    </div>
                                    <div class="table-pagenation mb-3">
                                        <p class="ms-0"><span>{{$appointments->count()}}</span> Eintragungssatz</p>
                                        {!! $appointments->links() !!}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="payments_order" role="tabpanel">
                                <div class="col-xl-12">
                                    <div class="card lastest_trans">
                                        <div class="card-header border-0 flex-wrap pb-0">
                                            <div>
                                                <h2 class="heading">PAKET VERKÄUFE</h2>
                                            </div>

                                        </div>
                                        <div class="card-body px-4">
                                            <!-- --list- -->
                                            <div class="table-responsive">
                                                <table id="example3" class="display" style="min-width: 845px">
                                                    <thead>
                                                    <tr>
                                                        <th>Name Nachname</th>
                                                        <th>Dienstleistungen</th>
                                                        <th>Anzahl</th>
                                                        <th>Betrag</th>
                                                        <th>Datum</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($packageSales as $sale)
                                                            <tr class="trans-td-list">
                                                                <td>{{$sale->customer->name ?? "Kunden"}}</td>
                                                                <td>{{$sale->service->subCategory->name ?? "Dienstleistungen"}}</td>
                                                                <td>{{$sale->amount}}</td>
                                                                <td>
                                                                    <span class="doller"> € {{$sale->total}}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="date">{{$sale->seller_date->format('d.m.Y h:i:s')}}</span>
                                                                </td>

                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"> <div class="text-warning text-center">Keine Verkâufe gefunden</div> </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payments_packet" role="tabpanel">
                                <div class="col-xl-12">
                                    <div class="card lastest_trans">
                                        <div class="card-header border-0 flex-wrap pb-0">
                                            <div>
                                                <h2 class="heading">PRODUKT VERKÄUFE</h2>
                                            </div>

                                        </div>
                                        <div class="card-body px-4">
                                            <!-- --list- -->
                                            <div class="table-responsive">
                                                <table id="dataTableNew" class="display" style="min-width: 845px">
                                                    <thead>
                                                    <tr>
                                                        <th>Name Nachname</th>
                                                        <th>Produktname</th>
                                                        <th>Anzahl</th>
                                                        <th>Betrag</th>
                                                        <th>Datum</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($productSales as $sale)
                                                        <tr class="trans-td-list">
                                                            <td>{{$sale->customer->name ?? "Kunden"}}</td>
                                                            <td>{{$sale->product->name ?? "Product"}}</td>
                                                            <td>{{$sale->amount}}</td>
                                                            <td>
                                                                <span class="doller"> € {{$sale->total}}</span>
                                                            </td>
                                                            <td>
                                                                <span class="date">{{$sale->created_at->format('d.m.Y h:i:s')}}</span>
                                                            </td>

                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5"> <div class="text-warning text-center">Keine Verkâufe gefunden</div> </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="notification" role="tabpanel">
                                <div class="col-xxl-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card event-agenda  h-auto">
                                                <div class="card-header border-0 pb-0">
                                                    <div>
                                                        <h2 class="heading">Nachrıchten</h2>
                                                    </div>
                                                    <div class="add-icon">
                                                        <a href="#" class="add" data-bs-toggle="modal" data-bs-target="#personel-modal-notification">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12 3C7.05 3 3 7.05 3 12C3 16.95 7.05 21 12 21C16.95 21 21 16.95 21 12C21 7.05 16.95 3 12 3ZM12 19.125C8.1 19.125 4.875 15.9 4.875 12C4.875 8.1 8.1 4.875 12 4.875C15.9 4.875 19.125 8.1 19.125 12C19.125 15.9 15.9 19.125 12 19.125Z" fill="white"/>
                                                                <path d="M16.3503 11.0251H12.9753V7.65009C12.9753 7.12509 12.5253 6.67509 12.0003 6.67509C11.4753 6.67509 11.0253 7.12509 11.0253 7.65009V11.0251H7.65029C7.12529 11.0251 6.67529 11.4751 6.67529 12.0001C6.67529 12.5251 7.12529 12.9751 7.65029 12.9751H11.0253V16.3501C11.0253 16.8751 11.4753 17.3251 12.0003 17.3251C12.5253 17.3251 12.9753 16.8751 12.9753 16.3501V12.9751H16.3503C16.8753 12.9751 17.3253 12.5251 17.3253 12.0001C17.3253 11.4751 16.8753 11.0251 16.3503 11.0251Z" fill="white"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body loadmore-content  recent-activity-wrapper p-3 pt-0" id="RecentActivityContent">
                                                    @forelse($personel->notifications as $notification)
                                                        <div class="d-flex align-items-center event mx-3" style="border-bottom: 1px dashed #9568FF;">
                                                        <span class="event-date">
                                                            <h4>{{$notification->created_at->format('d')}}</h4>
                                                            <span>{{$notification->created_at->translatedFormat('F')}}</span>
                                                        </span>
                                                            <div class="event-info">
                                                                <h6>
                                                                    <a href="{{$notification->link}}" target="_blank">
                                                                        {{$notification->title}}
                                                                    </a>
                                                                </h6>
                                                                <span>
                                                                    {{$notification->message}}
                                                                </span>
                                                            </div>

                                                        </div>
                                                    @empty
                                                    @endforelse

                                                </div>
                                                @if($personel->notifications->count() >= 5)
                                                    <div class="card-footer text-center border-0 pt-0">
                                                        <a href="javascript:void(0);" class="btn btn-block light btn-secondary" id="RecentActivity">Daha Fazla</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('business.personel.profile.send_mail')
    @include('business.personel.profile.send_sms')
    @include('business.personel.profile.notification')


@endsection
@section('scripts')
    <script>
        var monthData = {!! $monthData !!};
    </script>
    <script src="/admin/assets/js/dashboard/banking.js"></script>
    <script>

        function addCustomerId(id){
            $('.customer_id').val(id);
        }
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTableNew').DataTable({
                searching: false,
                paging:true,
                select: false,
                lengthChange:false ,

            });

            function formatDateDay(dateStr){
                var date = new Date(dateStr);
                var formattedDate = date.getDate();
                return formattedDate;
            }
            function formatDateMonth(dateStr){
                var date = new Date(dateStr);
                var months = [
                    "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran",
                    "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"
                ];
                var formattedDate = months[date.getMonth()];
                return formattedDate;
            }
            var offset = 0; // getirilen son öğenin indeksi
            var isLoading = false; // AJAX çağrısı yapılırken true, yapılmazken false

            $('#RecentActivity').on('click',function() {
                    offset += 5;
                    getData(offset);
            });
            function getData(offset) {
                $.ajax({
                    url: "{{route('business.notification.get')}}",
                    type: "POST",
                    dataType: "json",
                    data:{
                        "_token": '{{csrf_token()}}',
                        "personel_id":'{{$personel->id}}',
                        "last_id": offset,
                    },
                    success: function(response) {

                        var data = response.data;
                        if(data.length > 0){
                            $.each(data, function(index, item) {

                                var div = document.createElement("div");
                                div.className = "d-flex align-items-center event mx-3";
                                div.style.borderBottom = "1px dashed #9568FF";

                                var span = document.createElement("span");
                                span.className = "event-date";

                                var h4 = document.createElement("h4");
                                h4.textContent = formatDateDay(item.created_at);

                                var span2 = document.createElement("span");
                                span2.textContent = formatDateMonth(item.created_at);

                                var div2 = document.createElement("div");
                                div2.className = "event-info";

                                var h6 = document.createElement("h6");

                                var a = document.createElement("a");
                                a.href = item.link;
                                a.target = "_blank";
                                a.textContent = item.title;

                                var span3 = document.createElement("span");
                                span3.textContent = item.message

                                h6.appendChild(a);
                                div2.appendChild(h6);
                                div2.appendChild(span3);

                                span.appendChild(h4);
                                span.appendChild(span2);

                                div.appendChild(span);
                                div.appendChild(div2);

                                document.getElementById('RecentActivityContent').appendChild(div);
                            });
                        }
                        else{
                            Swal.fire(
                                'Bilgi',
                                'Başka bildirim bulunamadı',
                                'info'
                            )
                        }


                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        isLoading = false;
                    }
                });
            }
        });
    </script>
@endsection