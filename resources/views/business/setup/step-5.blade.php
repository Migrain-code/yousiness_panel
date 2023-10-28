@extends('business.setup.layouts.master')
@section('content')
    @include('layouts.component.error')
    <div class="col-lg-4 col-md-12">
        <div class="on-board-wizard">
            <ul>
                <li>
                    <a href="#">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Salon Kategorie</h6>
                            <p>Wählen Sie Ihre Salonkategorie(n) aus.</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Salon Details angeben</h6>
                            <p>Fügen Sie Ihre Salondetails hinzu.</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Adresse</h6>
                            <p>Hallenadresse/Standortinformationen</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('business.setup.step4')}}">
                        <div class="onboarding-progress active">
                            <span><i class="fa fa-check-circle"></i></span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Bezahlvorgang</h6>
                            <p>Wählen Sie Servicepaket.</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('business.setup.step5')}}">
                        <div class="onboarding-progress active">
                            <span>5</span>
                        </div>
                        <div class="onboarding-list">
                            <h6>Wir sind bereit</h6>
                            <p>Unternehmensgründung abgeschlossen</p>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="onboarding-content-box content-wrap">
            <div class="onborad-set">
                <div class="onboarding-title" style="text-align: center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="175" height="175" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                </div>
                <div class="onboarding-content">
                @if(session('response'))
                    <div class="alert alert-{{session('response.status')}}">{{session('response.message')}}</div>
                @endif
                    <div class="row text-center">
                    Ihr Yousiness-Installationsprozess wurde erfolgreich abgeschlossen.
                        Sie können Ihr Panel jetzt mit der Schaltfläche „Panel anzeigen“ verwalten.
                        Sie können Ihre systemischen Fragen und Probleme an den Support-Bereich Ihres Panels senden.
                        Schulungsvideos wurden an Ihre E-Mail-Adresse gesendet.
                        <div class="onboarding-btn mt-2">
                            <a href="{{route('business.home')}}">Gehen Sie zum Panel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="row">
                    <div class="col-1 flex-row align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="#ffe99a" style="margin-top: 15px;color: #FFC700;">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <div class="col-11">
                        <strong>Brauchst du Hilfe?</strong> <br>Wenn Sie Hilfe benötigen, kontaktieren Sie uns.<br>  <a href="tel:{{config('settings.site_phone')}}" class="alert-link"><u>{{config('settings.site_phone')}}</u></a>.

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection