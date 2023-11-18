<!DOCTYPE html>
<html lang="tr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title> {{setting('appy_site_title') . ' | ' }} @yield('title')  </title>

    <!-- Favicons -->

    <link rel="icon" type="image/x-icon" href="{{asset(setting('bussiness_main_favicon'))}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/business/setup//assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/business/setup//assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/business/setup//assets/plugins/fontawesome/css/all.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="/business/setup//assets/css/feather.css">

    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="/business/setup//assets/css/owl.carousel.min.css">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="/business/setup//assets/css/aos.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/business/setup//assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container {
            width: 100% !important;
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
        }
    </style>
    @yield('links')
</head>
<body class="home-five">

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->

    <!-- /Breadcrumb -->
    <div class="onboard-wrapper">
        <!---Left Panel----->
        <div class="left-panel mt-2 mb-3">
            <div class="onboarding-logo text-center">
                <h1 style="color: white">Account erstellen</h1>
            </div>
            <div class="onboard-img">
                <img src="/business/setup/assets/img/onboard-img/onb-slide-img.png" class="img-fluid" alt="">
            </div>
            <div class="onboarding-slider">
                <!-- Slider -->
                <div id="onboard-slider" class="owl-carousel owl-theme onboard-slider slider">
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>1.Schritt: Wählen Sie ihre Salon Kategorie(n) aus</h3>
                            <p>
                            Wir werden ihren Salon in Kategorien einteilen. Deshalb ist es wichtig, dass sie die entsprechende Salon Arten auswählen.

                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>2. Schritt: Salon Details angeben</h3>
                            <p>
                            Geben Sie die Informationen zu Ihrem Salon ein und stellen Sie sicher, dass Ihre Kunden Sie zu den richtigen Daten und Zeiten erreichen können.
                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>3.Schritt: Standort Informationen angeben</h3>
                            <p>
                            Damit Ihr Salon im System und im normalen Leben der Kunden leicht gefunden werden kann, geben Sie ihre Adressdaten vollständig an.
                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>4. Schritt: Yousiness Paket Auswählen</h3>
                            <p>
                            Wählen Sie das passende Paket aus, dass für Ihr System definiert werden soll. 
                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>5. Weiter zum Dashboard</h3>
                            <p>
                            Wenn Sie diesen Schritt erreicht haben, ist Ihre Installation abgeschlossen. Klicken Sie nun auf "Dashboard anzeigen", geben Sie Ihre autorisierten Informationen ein und starten Sie die Bearbeitung des Dashboards.                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->
                </div>
                <!-- /Slider -->
            </div>
        </div>
        <!---/Left Panel----->

        <div class="right-panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="right-panel-title text-center">
                            <a href="#" style="color: white;font-weight: bold">Unternehmensgründung</a>
                        </div>
                    </div>