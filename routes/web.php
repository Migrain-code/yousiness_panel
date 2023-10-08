<?php

use Illuminate\Support\Facades\Route;

Route::get('/include', function (){
    /*$datas = [
        [
            "10",
            "",
            "3D-Seidenwimper"
        ],
        [
            "6",
            "",
            "Achsellaser (8 Sitzungen)"
        ],
        [
            "13",
            "",
            "Afrikanischer Zopf"
        ],
        [
            "11",
            "",
            "Aktive Aknereparatur Mit Fibroblasten"
        ],
        [
            "13",
            "",
            "Amerikanisches Föhnen"
        ],
        [
            "13",
            "",
            "Ammoniakfreie Farbe"
        ],
        [
            "11",
            "",
            "Andullationstherapie"
        ],
        [
            "13",
            "",
            "Anti-Cellulite-Massage"
        ],
        [
            "13",
            "",
            "Anti-Stress-Massage"
        ],
        [
            "13",
            "",
            "Aromamassage"
        ],
        [
            "13",
            "",
            "Aromatherapie-Massage"
        ],
        [
            "11",
            "",
            "Ästhetische Farbgebung"
        ],
        [
            "13",
            "",
            "Aufgeschweißte Extensions Entfernen "
        ],
        [
            "9",
            "",
            "Aufkleber Einzelner Nagel"
        ],
        [
            "8",
            "9",
            "Auftragen Von Nagellack"
        ],
        [
            "12",
            "",
            "Augenbrauen Färben"
        ],
        [
            "12",
            "",
            "Augenbrauen Färben (Vorübergehend)"
        ],
        [
            "12",
            "",
            "Augenbrauen Formen"
        ],
        [
            "12",
            "",
            "Augenbrauen Lifting"
        ],
        [
            "12",
            "",
            "Augenbrauen Pudern"
        ],
        [
            "12",
            "",
            "Augenbrauen Zupfen"
        ],
        [
            "12",
            "",
            "Augenbrauen- Und Schnurrbartentfernung"
        ],
        [
            "11",
            "",
            "Augenbrauen-Botox"
        ],
        [
            "12",
            "",
            "Augenbrauen-Design"
        ],
        [
            "12",
            "",
            "Augenbrauen-Design (Männlich)"
        ],
        [
            "12",
            "",
            "Augenbrauen-Vitamin-Laminierung"
        ],
        [
            "12",
            "",
            "Augenbrauendesign (Weiblich)"
        ],
        [
            "12",
            "",
            "Augenbrauendesign Im Goldenen Schnitt"
        ],
        [
            "12",
            "",
            "Augenbrauenentfernung"
        ],
        [
            "12",
            "",
            "Augenbrauenentfernung (Mit Rasierer)"
        ],
        [
            "12",
            "",
            "Augenbrauenkontur"
        ],
        [
            "12",
            "",
            "Augenbrauenlaminierung + Wimpernlifting"
        ],
        [
            "12",
            "",
            "Augenbrauenlift"
        ],
        [
            "11",
            "",
            "Augenbrauenlifting Mit Fibroblasten"
        ],
        [
            "12",
            "",
            "Augenbrauenpflege"
        ],
        [
            "12",
            "",
            "Augenbrauenvitamin"
        ],
        [
            "11",
            "",
            "Augenlidbehandlung"
        ],
        [
            "11",
            "",
            "Augenlidreparatur"
        ],
        [
            "11",
            "",
            "Ausschnitte Plasmapen"
        ],
        [
            "13",
            "",
            "Balayage"
        ],
        [
            "13",
            "",
            "Bart Rasieren Und Föhnen"
        ],
        [
            "13",
            "",
            "Bart Verdichtung"
        ],
        [
            "13",
            "",
            "Bart Wachsen"
        ],
        [
            "13",
            "",
            "Bart- Und Haarwäsche"
        ],
        [
            "13",
            "",
            "Bart+Ohrenkante Enthaarung"
        ],
        [
            "13",
            "",
            "Bartfarbcrusher"
        ],
        [
            "13",
            "",
            "Bartfärben"
        ],
        [
            "13",
            "",
            "Bartpflege"
        ],
        [
            "13",
            "",
            "Bartrasur Und Haarwäsche"
        ],
        [
            "13",
            "",
            "Bartschnitt + Maske"
        ],
        [
            "11",
            "",
            "Bauchfett Schmelzen (Medikamentös)"
        ],
        [
            "16",
            "",
            "Bbnes Dauerfundament"
        ],
        [
            "11",
            "",
            "Behandlung Von Blutergüssen Mit Magischen Nadeln"
        ],
        [
            "11",
            "",
            "Behandlung Von Blutergüssen Unter Den Augen (Magische Nadel)"
        ],
        [
            "11",
            "",
            "Behandlung Von Dehnungsstreifen"
        ],
        [
            "7",
            "",
            "Bein- Und Fußmassage"
        ],
        [
            "13",
            "",
            "Beweglicher Schnitt"
        ],
        [
            "13",
            "",
            "Biaform-Dauerwelle (Kurzes Haar)"
        ],
        [
            "13",
            "",
            "Biaform-Dauerwelle (Langes Haar)"
        ],
        [
            "11",
            "",
            "Botox"
        ],
        [
            "11",
            "",
            "Botox (Haare)"
        ],
        [
            "11",
            "",
            "Botox-Pflege"
        ],
        [
            "11",
            "",
            "Brasilianische Blowout-Pflege"
        ],
        [
            "13",
            "",
            "Brasilianisches Föhnen"
        ],
        [
            "13",
            "",
            "Brautfrisur"
        ],
        [
            "13",
            "",
            "Brautfrisur (Hijab)"
        ],
        [
            "13",
            "",
            "Brautjungfernhaar"
        ],
        [
            "16",
            "",
            ""
        ],
        [
            "16",
            "",
            ""
        ],
        [
            "16",
            "",
            ""
        ],
        [
            "12",
            "",
            "C1 Augenbrauenkontur"
        ],
        [
            "11",
            "",
            "C1 Goldnadel"
        ],
        [
            "16",
            "",
            "C1-Aufzug"
        ],
        [
            "11",
            "",
            "C1-Kohlenstoff-Peeling"
        ],
        [
            "12",
            "",
            "C2 Augenbrauenkontur"
        ],
        [
            "16",
            "",
            "C3 Augenbrauenkontur"
        ],
        [
            "11",
            "",
            "C3 Goldnadel"
        ],
        [
            "16",
            "",
            "C3-Dermapen"
        ],
        [
            "16",
            "",
            "C3-Dipliner"
        ],
        [
            "16",
            "",
            "C3-Eyeliner"
        ],
        [
            "16",
            "",
            "C3-Hautreinigung"
        ],
        [
            "16",
            "",
            "C3-Kohlenstoff-Peeling"
        ],
        [
            "16",
            "",
            "C4 Augenbrauenkontur"
        ],
        [
            "16",
            "",
            "C4 Goldnadel"
        ],
        [
            "16",
            "",
            "C4-Aufzug"
        ],
        [
            "16",
            "",
            "C4-Dermapen"
        ],
        [
            "16",
            "",
            "C4-Eyeliner"
        ],
        [
            "16",
            "",
            "C4-Hautpflege"
        ],
        [
            "16",
            "",
            "C4-Jugend"
        ],
        [
            "16",
            "",
            "C4-Kohlenstoff-Peeling"
        ],
        [
            "14",
            "",
            "Cardio"
        ],
        [
            "14",
            "",
            "Cardio (3 Monate)"
        ],
        [
            "14",
            "",
            "Cardio (Einzel Stunde)"
        ],
        [
            "14",
            "",
            "Cardio (Monatlich)"
        ],
        [
            "10",
            "",
            "Cashmere Lashes"
        ],
        [
            "11",
            "",
            "Cellulite-Behandlung"
        ],
        [
            "11",
            "",
            "Cr-Behandlung Zur Oberflächenerneuerung Chronischer Rötungen"
        ],
        [
            "14",
            "",
            "Crossfit"
        ],
        [
            "13",
            "",
            "Dauergewelltes Kurzes Haar"
        ],
        [
            "12",
            "",
            "Dauerhafte Augenbraue"
        ],
        [
            "12",
            "",
            "Dauerhafte Augenbrauenpflege"
        ],
        [
            "13",
            "",
            "Dauerhafte Haarglättung"
        ],
        [
            "13",
            "",
            "Dauerwelle"
        ],
        [
            "13",
            "",
            "Dauerwelle Europa"
        ],
        [
            "13",
            "",
            "Dauerwelle Gebürtig"
        ],
        [
            "13",
            "",
            "Dauerwelle Langes Haar"
        ],
        [
            "13",
            "",
            "Dauerwelle Wasserwelle"
        ],
        [
            "11",
            "",
            "Dehnungsstreifenbehandlung (Dipomed)"
        ],
        [
            "16",
            "",
            "Dicke Zange"
        ],
        [
            "6",
            "",
            "Diodenlaser (Am Finger)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Auf Dem Fuß)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Bauchbereich)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Bauchlinie)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Brust)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Brustspitze)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Dekolleté)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Doppelkinn)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Fleck)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Ganze Taille)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Ganzer Bauch)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Ganzes Bein)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Ganzes Gesicht)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Ganzkörper)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Genital)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Halbe Taille)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Halber Kern)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Halber Rücken)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Halbes Bein)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Halbgesicht)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Hals)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Handoberfläche)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Hüfte)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Intimebereich)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Kinn)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Nacken)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Po)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Schulter)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Sonderbereich Seitenteile)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Stirn)"
        ],
        [
            "6",
            "",
            "Diodenlaser (T-Zone)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Über Dem Po)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Über Der Augenbraue)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Über Der Lippe)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Unterarm)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Wange)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Zwischen Den Augenbrauen)"
        ],
        [
            "6",
            "",
            "Diodenlaser (Zwischen Der Brust)"
        ],
        [
            "16",
            "",
            "Dünne Zange"
        ],
        [
            "13",
            "",
            "Einen Hijab Binden"
        ],
        [
            "7",
            "",
            "Eingewachsener Nagel"
        ],
        [
            "7",
            "8",
            "Einzelner Gebrochener Nagel"
        ],
        [
            "6",
            "",
            "Eislaser (Am Finger)"
        ],
        [
            "6",
            "",
            "Eislaser (Am Po)"
        ],
        [
            "6",
            "",
            "Eislaser (Bauchbereich)"
        ],
        [
            "6",
            "",
            "Eislaser (Bauchlinie)"
        ],
        [
            "6",
            "",
            "Eislaser (Brust)"
        ],
        [
            "6",
            "",
            "Eislaser (Dekolleté)"
        ],
        [
            "6",
            "",
            "Eislaser (Doppelkinn)"
        ],
        [
            "6",
            "",
            "Eislaser (Fußrücken)"
        ],
        [
            "6",
            "",
            "Eislaser (Ganze Taille)"
        ],
        [
            "6",
            "",
            "Eislaser (Ganzer Arm)"
        ],
        [
            "6",
            "",
            "Eislaser (Ganzer Bauch)"
        ],
        [
            "6",
            "",
            "Eislaser (Ganzer Rücken)"
        ],
        [
            "6",
            "",
            "Eislaser (Ganzes Bein)"
        ],
        [
            "6",
            "",
            "Eislaser (Ganzes Gesicht)"
        ],
        [
            "6",
            "",
            "Eislaser (Ganzkörper)"
        ],
        [
            "6",
            "",
            "Eislaser (Genital)"
        ],
        [
            "6",
            "",
            "Eislaser (Halber Arm)"
        ],
        [
            "6",
            "",
            "Eislaser (Halber Bauch)"
        ],
        [
            "6",
            "",
            "Eislaser (Halber Rücken)"
        ],
        [
            "6",
            "",
            "Eislaser (Halbes Bein)"
        ],
        [
            "6",
            "",
            "Eislaser (Halbes Gesicht)"
        ],
        [
            "6",
            "",
            "Eislaser (Hals)"
        ],
        [
            "6",
            "",
            "Eislaser (Handrücken)"
        ],
        [
            "6",
            "",
            "Eislaser (Hinterkopf)"
        ],
        [
            "6",
            "",
            "Eislaser (Hüfte)"
        ],
        [
            "6",
            "",
            "Eislaser (Kinn)"
        ],
        [
            "6",
            "",
            "Eislaser (Nippel)"
        ],
        [
            "6",
            "",
            "Eislaser (Po)"
        ],
        [
            "6",
            "",
            "Eislaser (Schulter)"
        ],
        [
            "6",
            "",
            "Eislaser (Stirn)"
        ],
        [
            "6",
            "",
            "Eislaser (T-Zone)"
        ],
        [
            "6",
            "",
            "Eislaser (Über Der Augenbraue)"
        ],
        [
            "6",
            "",
            "Eislaser (Über Der Lippe)"
        ],
        [
            "6",
            "",
            "Eislaser (Unterarm)"
        ],
        [
            "6",
            "",
            "Eislaser (Wange)"
        ],
        [
            "6",
            "",
            "Eislaser (Zwischen Brust)"
        ],
        [
            "6",
            "",
            "Eislaser (Zwischen Den Augenbrauen)"
        ],
        [
            "13",
            "",
            "Entfernung Der Extensions"
        ],
        [
            "9",
            "",
            "Entfernung Des Gel-Sets"
        ],
        [
            "10",
            "",
            "Entfernung Von Falschen Wimpern"
        ],
        [
            "9",
            "",
            "Entfernung Von Gel Und Nagellacken "
        ],
        [
            "11",
            "",
            "Entfernung Von Gütegeschalteten Ndyag-Tätowierungen"
        ],
        [
            "6",
            "",
            "Epilation (Kinn)"
        ],
        [
            "11",
            "",
            "Erschlaffung Des Gesichts (Plasmapen)"
        ],
        [
            "13",
            "",
            "Extensions "
        ],
        [
            "11",
            "",
            "Eyecell Kit-Peeling-Anwendung Um Die Augen Herum"
        ],
        [
            "11",
            "",
            "Faltenentfernung Mit Plexiglas"
        ],
        [
            "11",
            "",
            "Faltenreparatur Im Stirn- Und Mittelstirnbereich"
        ],
        [
            "11",
            "",
            "Faltenreparatur Unter Und Um Die Augen"
        ],
        [
            "13",
            "",
            "Färben Des Haaransatzes"
        ],
        [
            "7",
            "",
            "Fersenstein"
        ],
        [
            "11",
            "",
            "Fibroblasten-Brust- Und Po-Lifting"
        ],
        [
            "11",
            "",
            "Fibroblasten-Bruststraffung"
        ],
        [
            "11",
            "",
            "Fibroblasten-Po-Lifting"
        ],
        [
            "14",
            "",
            "Fitness"
        ],
        [
            "13",
            "",
            "Flechten"
        ],
        [
            "13",
            "",
            "Föhnen (Verschweißtes Haar)"
        ],
        [
            "13",
            "",
            "Föhnfrisur"
        ],
        [
            "16",
            "",
            "Französisch"
        ],
        [
            "8",
            "",
            "Französischer Nagellack"
        ],
        [
            "9",
            "",
            "Französischer Permanenter Nagellack"
        ],
        [
            "13",
            "",
            "Frisur Für Besondere Anlässe"
        ],
        [
            "11",
            "",
            "Füllung"
        ],
        [
            "11",
            "",
            "Fusio-Dosis"
        ],
        [
            "7",
            "11",
            "Fußentgiftung"
        ],
        [
            "7",
            "",
            "Fußpflege"
        ],
        [
            "7",
            "",
            "Fußprothesennagel"
        ],
        [
            "7",
            "",
            "Fußreflexzonenmassage"
        ],
        [
            "6",
            "",
            "Ganzgesichts-Waxing"
        ],
        [
            "13",
            "",
            "Geflochtener Zopf"
        ],
        [
            "9",
            "",
            "Gel Nagel Einzelner Finger"
        ],
        [
            "9",
            "",
            "Gel Zum Entfernen Von Prothesennägeln"
        ],
        [
            "7",
            "",
            "Gel-Einzelner Fußnagel"
        ],
        [
            "9",
            "",
            "Gel-French-Komplettset"
        ],
        [
            "9",
            "",
            "Gel-French-Pflege"
        ],
        [
            "9",
            "",
            "Gel-Nagel"
        ],
        [
            "9",
            "",
            "Gel-Nagel-Komplettset"
        ],
        [
            "9",
            "",
            "Gel-Nagelpflege"
        ],
        [
            "9",
            "",
            "Gel-Verstärkung (Nägel)"
        ],
        [
            "12",
            "",
            "Gemessene Augenbrauenentfernung"
        ],
        [
            "6",
            "",
            "Genital Laser  Für Herren"
        ],
        [
            "6",
            "",
            "Genitalwachs"
        ],
        [
            "11",
            "",
            "Genosys Srs Chemisches Peeling"
        ],
        [
            "13",
            "",
            "Gerade Föhnen"
        ],
        [
            "11",
            "",
            "Gesichtsfüller"
        ],
        [
            "13",
            "",
            "Glänzende Haarfarbe"
        ],
        [
            "13",
            "",
            "Glitzer Frisur"
        ],
        [
            "11",
            "",
            "Glykolsäure-Hauterneuerungspeeling"
        ],
        [
            "13",
            "",
            "Goldener Schnitt-Henna"
        ],
        [
            "13",
            "",
            "Haar- + Bartpflege"
        ],
        [
            "13",
            "",
            "Haar- Und Bartwäsche"
        ],
        [
            "13",
            "",
            "Haar-Bart-Wäsche Und Maske"
        ],
        [
            "11",
            "",
            "Haar-Botox"
        ],
        [
            "13",
            "",
            "Haaraufhellung (Pflanzlicher Igora-Aufheller)"
        ],
        [
            "13",
            "",
            "Haare Aufhellen + Färben (Kurzes Haar)"
        ],
        [
            "13",
            "",
            "Haare Aufhellen + Färben (Langes Haar)"
        ],
        [
            "13",
            "",
            "Haare Bleichen + Färben"
        ],
        [
            "13",
            "",
            "Haare Färben"
        ],
        [
            "13",
            "",
            "Haare Färben (Kurzes Haar)"
        ],
        [
            "13",
            "",
            "Haare Föhnen"
        ],
        [
            "13",
            "",
            "Haare Glätten"
        ],
        [
            "13",
            "",
            "Haare Schneiden"
        ],
        [
            "13",
            "",
            "Haare Schneiden Und Waschen"
        ],
        [
            "13",
            "",
            "Haare Schneiden, Bart Rasieren, Haare Färben Und Waschen"
        ],
        [
            "13",
            "",
            "Haare Waschen"
        ],
        [
            "13",
            "",
            "Haare Waschen + Föhnen"
        ],
        [
            "13",
            "",
            "Haarfärbe Für Männer"
        ],
        [
            "13",
            "",
            "Haarfarbenbrecher"
        ],
        [
            "13",
            "",
            "Haarfärbung (Langes Haar)"
        ],
        [
            "13",
            "",
            "Haarmaske"
        ],
        [
            "13",
            "",
            "Haarmatrix-Kit Zur Haaranwendung"
        ],
        [
            "13",
            "",
            "Haarmesotherapie"
        ],
        [
            "11",
            "",
            "Haarnachbildung"
        ],
        [
            "13",
            "",
            "Haarpflege"
        ],
        [
            "13",
            "",
            "Haarpflege Für Männer"
        ],
        [
            "13",
            "",
            "Haarpflege Gegen Haarausfall"
        ],
        [
            "13",
            "",
            "Haarpolitur"
        ],
        [
            "11",
            "",
            "Haarprp"
        ],
        [
            "13",
            "",
            "Haarschnitt"
        ],
        [
            "13",
            "",
            "Haarschnitt (Manager)"
        ],
        [
            "13",
            "",
            "Haarschnitt Für Männer"
        ],
        [
            "13",
            "",
            "Haarschnitt Und Bartrasur"
        ],
        [
            "13",
            "",
            "Haarschnitt, Haare Waschen Und Bart Rasieren"
        ],
        [
            "13",
            "",
            "Haarsimulation (Microblading)"
        ],
        [
            "13",
            "",
            "Haarstyling"
        ],
        [
            "11",
            "13",
            "Haartransplantation"
        ],
        [
            "13",
            "",
            "Haarverlängerung"
        ],
        [
            "13",
            "",
            "Haarvitamin"
        ],
        [
            "13",
            "",
            "Haarvitamin Und Simulation"
        ],
        [
            "13",
            "",
            "Halb Offen"
        ],
        [
            "6",
            "",
            "Halbbauch-Waxing"
        ],
        [
            "6",
            "",
            "Halbbein-Waxing"
        ],
        [
            "6",
            "",
            "Halbgesichtswachs"
        ],
        [
            "11",
            "",
            "Hals Und Kinn (Estetik)"
        ],
        [
            "6",
            "",
            "Hals- Und Dekolletébehandlung"
        ],
        [
            "11",
            "",
            "Handerneuerungsbehandlung"
        ],
        [
            "8",
            "9",
            "Handnagelformung"
        ],
        [
            "9",
            "",
            "Handprothesennagel"
        ],
        [
            "11",
            "",
            "Handrücken Verjüngung Und Minderung Der Pigmentflecken "
        ],
        [
            "11",
            "",
            "Handverjüngung"
        ],
        [
            "11",
            "",
            "Handverjüngungstherapie"
        ],
        [
            "11",
            "",
            "Hautverjüngung Bei Rissen Und Cellulite"
        ],
        [
            "13",
            "",
            "Henna-Bart"
        ],
        [
            "13",
            "",
            "Henna-Haar"
        ],
        [
            "13",
            "",
            "Henna-Haare"
        ],
        [
            "13",
            "",
            "Henna-Haare + Make-Up"
        ],
        [
            "13",
            "",
            "Henna-Make-Up"
        ],
        [
            "11",
            "",
            "Hifu (Facelift)"
        ],
        [
            "13",
            "",
            "Highlight (Langes Haar)"
        ],
        [
            "13",
            "",
            "Highlight Und Schatten"
        ],
        [
            "13",
            "",
            "Highlights (Kräuter-Igora-Öffner)"
        ],
        [
            "13",
            "",
            "Highlights (Kurze Haare)"
        ],
        [
            "13",
            "",
            "Hijab-Design-Make-Up"
        ],
        [
            "11",
            "",
            "Hochdosiertes Vitamin C Pascorbin"
        ],
        [
            "11",
            "",
            "Hochfrequenz"
        ],
        [
            "13",
            "",
            "Hochsteckfrisur"
        ],
        [
            "13",
            "",
            "Hochzeitshaar"
        ],
        [
            "7",
            "",
            "Hornhautbehandlung"
        ],
        [
            "11",
            "",
            "Hyaluronpen-Lippenfüller"
        ],
        [
            "11",
            "",
            "Hyperpigmentierung Der Intimzone"
        ],
        [
            "13",
            "",
            "Indische Kopfmassage"
        ],
        [
            "11",
            "",
            "Infraform"
        ],
        [
            "11",
            "",
            "Jugendimpfstoff"
        ],
        [
            "11",
            "",
            "Kapillarpflege"
        ],
        [
            "13",
            "",
            "Katalog-Haarschnitte"
        ],
        [
            "13",
            "",
            "Keratin (Glättend)"
        ],
        [
            "11",
            "",
            "Keratin-Botox"
        ],
        [
            "13",
            "",
            "Keratin-Haarpflege"
        ],
        [
            "13",
            "",
            "Keratin-Haarpflege (Halb)"
        ],
        [
            "13",
            "",
            "Keratin-Maniküre"
        ],
        [
            "13",
            "",
            "Keratinpflege"
        ],
        [
            "13",
            "",
            "Kinderhaarschnitt"
        ],
        [
            "13",
            "",
            "Kinderrasur"
        ],
        [
            "6",
            "",
            "Kinn Wachsen"
        ],
        [
            "15",
            "",
            "Knorpelpiercing"
        ],
        [
            "11",
            "",
            "Koloskopie"
        ],
        [
            "13",
            "",
            "Kopfhautpflege"
        ],
        [
            "13",
            "",
            "Kopfvolumen (Stück)"
        ],
        [
            "11",
            "",
            "Körperdetox Mit Algen"
        ],
        [
            "16",
            "",
            "Körperform"
        ],
        [
            "11",
            "",
            "Krampfaderbehandlung (Und Yag-Venenbehandlung)"
        ],
        [
            "11",
            "",
            "Lachs-Dna (Gesicht)"
        ],
        [
            "11",
            "",
            "Lachs-Dna-Impfstoff"
        ],
        [
            "6",
            "",
            "Laser ( Fußrücken)"
        ],
        [
            "6",
            "",
            "Laser (3 Zonen)"
        ],
        [
            "6",
            "",
            "Laser (4 Zonen)"
        ],
        [
            "6",
            "",
            "Laser (Am Bart)"
        ],
        [
            "6",
            "",
            "Laser (Am Finger)"
        ],
        [
            "6",
            "",
            "Laser (Arm)"
        ],
        [
            "6",
            "",
            "Laser (Bart)"
        ],
        [
            "6",
            "",
            "Laser (Bauchbereich)"
        ],
        [
            "6",
            "",
            "Laser (Bauchlinie)"
        ],
        [
            "6",
            "",
            "Laser (Bein Komplett)"
        ],
        [
            "6",
            "",
            "Laser (Beinhälfte)"
        ],
        [
            "6",
            "",
            "Laser (Bikinizone)"
        ],
        [
            "6",
            "",
            "Laser (Brust)"
        ],
        [
            "6",
            "",
            "Laser (Brustspitze)"
        ],
        [
            "6",
            "",
            "Laser (Dekolleté)"
        ],
        [
            "6",
            "",
            "Laser (Doppelkinn)"
        ],
        [
            "6",
            "",
            "Laser (Favorit)"
        ],
        [
            "6",
            "",
            "Laser (Fleck)"
        ],
        [
            "6",
            "",
            "Laser (Ganze Taille)"
        ],
        [
            "6",
            "",
            "Laser (Ganzer Arm)"
        ],
        [
            "6",
            "",
            "Laser (Ganzer Bauch)"
        ],
        [
            "6",
            "",
            "Laser (Ganzer Rücken)"
        ],
        [
            "6",
            "",
            "Laser (Ganzes Bein)"
        ],
        [
            "6",
            "",
            "Laser (Ganzkörper-G.)"
        ],
        [
            "6",
            "",
            "Laser (Ganzkörper)"
        ],
        [
            "6",
            "",
            "Laser (Genital E)"
        ],
        [
            "6",
            "",
            "Laser (Genital)"
        ],
        [
            "6",
            "",
            "Laser (Gesicht Komplett)"
        ],
        [
            "6",
            "",
            "Laser (Gesicht)"
        ],
        [
            "6",
            "",
            "Laser (Halbe Taille)"
        ],
        [
            "6",
            "",
            "Laser (Halber Arm)"
        ],
        [
            "6",
            "",
            "Laser (Halber Bauch)"
        ],
        [
            "6",
            "",
            "Laser (Halber Rücken)"
        ],
        [
            "6",
            "",
            "Laser (Halbes Bein)"
        ],
        [
            "6",
            "",
            "Laser (Halbes Gesicht)"
        ],
        [
            "6",
            "",
            "Laser (Hals)"
        ],
        [
            "6",
            "",
            "Laser (Handrücken)"
        ],
        [
            "6",
            "",
            "Laser (Hüfte)"
        ],
        [
            "6",
            "",
            "Laser (Kinn)"
        ],
        [
            "6",
            "",
            "Laser (Nacken)"
        ],
        [
            "6",
            "",
            "Laser (Nackenbart)"
        ],
        [
            "6",
            "",
            "Laser (Ohr)"
        ],
        [
            "6",
            "",
            "Laser (Po)"
        ],
        [
            "6",
            "",
            "Laser (Rücken)"
        ],
        [
            "6",
            "",
            "Laser (Schulter)"
        ],
        [
            "6",
            "",
            "Laser (Sonderbereich Seitenteile)"
        ],
        [
            "6",
            "",
            "Laser (Stirn)"
        ],
        [
            "6",
            "",
            "Laser (T-Zone)"
        ],
        [
            "6",
            "",
            "Laser (Über Dem Po)"
        ],
        [
            "6",
            "",
            "Laser (Über Der Augenbraue)"
        ],
        [
            "6",
            "",
            "Laser (Über Der Lippe)"
        ],
        [
            "6",
            "",
            "Laser (Unterarm)"
        ],
        [
            "6",
            "",
            "Laser (Wange)"
        ],
        [
            "6",
            "",
            "Laser (Zwischen Brust)"
        ],
        [
            "6",
            "",
            "Laser (Zwischen Den Augenbrauen)"
        ],
        [
            "6",
            "",
            "Laser-Doppelbein (8 Sitzungen)"
        ],
        [
            "6",
            "",
            "Laser-Epilation (2 Zonen)"
        ],
        [
            "6",
            "",
            "Laser-Epilation (3 Zonen)"
        ],
        [
            "6",
            "",
            "Laser-Epilation (4 Zonen)"
        ],
        [
            "6",
            "",
            "Laser-Epilation (5 Zonen)"
        ],
        [
            "6",
            "",
            "Laser-Ganzkörper (Männlich)"
        ],
        [
            "6",
            "",
            "Laser-Ganzkörper (Weiblich)"
        ],
        [
            "6",
            "",
            "Laser-Haarentfernung (1-Zone)"
        ],
        [
            "6",
            "",
            "Laser-Haarentfernung (Bauchbereich)"
        ],
        [
            "6",
            "",
            "Laser-Haarentfernung (Halber Arm)"
        ],
        [
            "6",
            "",
            "Laser-Haarentfernung (Taille Und Po)"
        ],
        [
            "6",
            "",
            "Lasergespräch"
        ],
        [
            "6",
            "",
            "Lasersteuerung"
        ],
        [
            "6",
            "",
            "Laserversuch"
        ],
        [
            "6",
            "",
            "Lieblingswachs"
        ],
        [
            "11",
            "",
            "Lippenlift (Unten-Oben) Plasmapen"
        ],
        [
            "11",
            "",
            "Lippenverjüngung 1 Ml"
        ],
        [
            "11",
            "",
            "Lippenverjüngung 1,5 Ml"
        ],
        [
            "11",
            "",
            "Lippenverjüngung 2 Ml"
        ],
        [
            "13",
            "",
            "Lockenstab"
        ],
        [
            "13",
            "",
            "Lumilex - Politur"
        ],
        [
            "13",
            "",
            "Lumilex – Politur (Außer Föhn)"
        ],
        [
            "8",
            "",
            "Maniküre"
        ],
        [
            "8",
            "",
            "Maniküre Mit Milch"
        ],
        [
            "7",
            "8",
            "Maniküre Und Pediküre"
        ],
        [
            "8",
            "9",
            "Maniküre Und Permanenter Nagellack"
        ],
        [
            "15",
            "",
            "Maschinelles Bohren (Ohr Und Nase)"
        ],
        [
            "11",
            "",
            "Masseter-Botox"
        ],
        [
            "14",
            "",
            "Mat Pilates (Einzelstunde)"
        ],
        [
            "14",
            "",
            "Mat Pilates (Monatlich)"
        ],
        [
            "14",
            "",
            "Matten-Pilates (3 Monate)"
        ],
        [
            "11",
            "",
            "Medizinische Betreuung (Hals Und Dekolleté)"
        ],
        [
            "11",
            "",
            "Medizinische Fußpflege (Bodenkuperose)"
        ],
        [
            "11",
            "",
            "Medizinische Hautpflege"
        ],
        [
            "11",
            "",
            "Medizinische Maniküre"
        ],
        [
            "11",
            "",
            "Medizinische Massage"
        ],
        [
            "11",
            "",
            "Medizinische Pediküre"
        ],
        [
            "11",
            "",
            "Medizinische Pediküre (Unter Wasser)"
        ],
        [
            "11",
            "",
            "Medizinische Rückenmassage"
        ],
        [
            "11",
            "",
            "Medizinische Versorgung (Fuß)"
        ],
        [
            "16",
            "",
            "Meine Laminierung"
        ],
        [
            "11",
            "",
            "Mesobutton"
        ],
        [
            "11",
            "",
            "Mesotherapie"
        ],
        [
            "11",
            "",
            "Mesotherapie Der Haut"
        ],
        [
            "11",
            "",
            "Minderung Von Cellulite"
        ],
        [
            "11",
            "",
            "Muttermal Behandlung"
        ],
        [
            "11",
            "",
            "Muttermal Entfernung "
        ],
        [
            "11",
            "",
            "Muttermal Laser"
        ],
        [
            "11",
            "",
            "Nacken-Hautpflege"
        ],
        [
            "6",
            "",
            "Nackenrasur"
        ],
        [
            "6",
            "",
            "Nadelepilation"
        ],
        [
            "6",
            "",
            "Nadelepilation (Gesicht)"
        ],
        [
            "6",
            "",
            "Nadelepilation (Körper)"
        ],
        [
            "6",
            "",
            "Nadellaser (Am Finger)"
        ],
        [
            "6",
            "",
            "Nadellaser (Bauchbereich)"
        ],
        [
            "6",
            "",
            "Nadellaser (Bauchlinie)"
        ],
        [
            "6",
            "",
            "Nadellaser (Bikinizone)"
        ],
        [
            "6",
            "",
            "Nadellaser (Brust)"
        ],
        [
            "6",
            "",
            "Nadellaser (Brustspitze)"
        ],
        [
            "6",
            "",
            "Nadellaser (Doppelkinn)"
        ],
        [
            "6",
            "",
            "Nadellaser (Fußrücken)"
        ],
        [
            "6",
            "",
            "Nadellaser (Ganze Taille)"
        ],
        [
            "6",
            "",
            "Nadellaser (Ganzer Arm)"
        ],
        [
            "6",
            "",
            "Nadellaser (Ganzer Bauch)"
        ],
        [
            "6",
            "",
            "Nadellaser (Ganzer Rücken)"
        ],
        [
            "6",
            "",
            "Nadellaser (Ganzes Bein)"
        ],
        [
            "6",
            "",
            "Nadellaser (Ganzes Gesicht)"
        ],
        [
            "6",
            "",
            "Nadellaser (Ganzkörper)"
        ],
        [
            "6",
            "",
            "Nadellaser (Genital)"
        ],
        [
            "6",
            "",
            "Nadellaser (Halbe Taille)"
        ],
        [
            "6",
            "",
            "Nadellaser (Halber Arm)"
        ],
        [
            "6",
            "",
            "Nadellaser (Halber Kern)"
        ],
        [
            "6",
            "",
            "Nadellaser (Halber Rücken)"
        ],
        [
            "6",
            "",
            "Nadellaser (Halbes Bein)"
        ],
        [
            "6",
            "",
            "Nadellaser (Halbgesicht)"
        ],
        [
            "6",
            "",
            "Nadellaser (Hals)"
        ],
        [
            "6",
            "",
            "Nadellaser (Handrücken)"
        ],
        [
            "6",
            "",
            "Nadellaser (Hintern)"
        ],
        [
            "6",
            "",
            "Nadellaser (Hüfte)"
        ],
        [
            "6",
            "",
            "Nadellaser (Kinn)"
        ],
        [
            "6",
            "",
            "Nadellaser (Schulter)"
        ],
        [
            "6",
            "",
            "Nadellaser (Stirn)"
        ],
        [
            "6",
            "",
            "Nadellaser (T-Zone)"
        ],
        [
            "6",
            "",
            "Nadellaser (Über Dem Po)"
        ],
        [
            "6",
            "",
            "Nadellaser (Über Der Augenbraue)"
        ],
        [
            "6",
            "",
            "Nadellaser (Über Der Lippe)"
        ],
        [
            "6",
            "",
            "Nadellaser (Unterarm)"
        ],
        [
            "6",
            "",
            "Nadellaser (Wange)"
        ],
        [
            "6",
            "",
            "Nadellaser (Zwischen Den Augenbrauen)"
        ],
        [
            "6",
            "",
            "Nadellaser (Zwischen Der Brust)"
        ],
        [
            "16",
            "",
            "Nagelkausyndrom"
        ],
        [
            "9",
            "",
            "Nagelmodellage"
        ],
        [
            "8",
            "9",
            "Nailart (Nageldesign)"
        ],
        [
            "8",
            "9",
            "Nailart Einzelnagel (Nageldesign)"
        ],
        [
            "9",
            "",
            "Nailart Steinnagel"
        ],
        [
            "11",
            "",
            "Nasenformung"
        ],
        [
            "11",
            "",
            "Nasolabialfüller Mit Hyaluron-Stift"
        ],
        [
            "11",
            "",
            "Nasolobial"
        ],
        [
            "8",
            "",
            "Nasse Maniküre"
        ],
        [
            "7",
            "",
            "Nasse Pediküre"
        ],
        [
            "7",
            "",
            "Natürliche Fußpflege"
        ],
        [
            "8",
            "",
            "Natürliche Handpflege"
        ],
        [
            "10",
            "",
            "Nerzwimpern"
        ],
        [
            "13",
            "",
            "Oberteil Des Bartes + Buch Des Halses"
        ],
        [
            "16",
            "",
            "Ohrenschmalz"
        ],
        [
            "15",
            "",
            "Ohrlochstechen"
        ],
        [
            "13",
            "",
            "Olaplex-Pflege"
        ],
        [
            "13",
            "",
            "Ombre"
        ],
        [
            "13",
            "",
            "Ombre (Halb)"
        ],
        [
            "13",
            "",
            "Ombre (Kräuter-Igora-Aufheller)"
        ],
        [
            "13",
            "",
            "Ombre (Kurzes Haar)"
        ],
        [
            "13",
            "",
            "Ombre (Langes Haar)"
        ],
        [
            "9",
            "",
            "Ombre-Nagel"
        ],
        [
            "13",
            "",
            "Organische Ansatzfärbung"
        ],
        [
            "13",
            "",
            "Organische Komplettfärbung"
        ],
        [
            "11",
            "",
            "Papel Entfernung"
        ],
        [
            "8",
            "",
            "Pediküre"
        ],
        [
            "8",
            "",
            "Pediküre Mit Whirlpool"
        ],
        [
            "13",
            "",
            "Perlenpflege"
        ],
        [
            "13",
            "",
            "Perlenschweißen"
        ],
        [
            "13",
            "",
            "Perlenschweißen (100 Stück)"
        ],
        [
            "13",
            "",
            "Perlenschweißen (200 Stück)"
        ],
        [
            "9",
            "",
            "Permanenter Nagellack"
        ],
        [
            "9",
            "",
            "Permanenter Nagellack Ein Finger"
        ],
        [
            "7",
            "",
            "Permanenter Nagellack Für Die Füße"
        ],
        [
            "9",
            "",
            "Permanenter Nagellack Für Die Hand"
        ],
        [
            "9",
            "",
            "Permanenter Nagellack, Nageldesign Für Die Ganze Hand"
        ],
        [
            "9",
            "",
            "Permanenter Nagellack, Nagelzubehör Für Einen Finger"
        ],
        [
            "13",
            "",
            "Pferdeschwanz"
        ],
        [
            "13",
            "",
            "Pflanzliche Haarpflege"
        ],
        [
            "13",
            "",
            "Pflanzlicher Ansatz-Farbstoff"
        ],
        [
            "13",
            "",
            "Pflanzlicher Vollfarbstoff"
        ],
        [
            "8",
            "",
            "Pflege Für Die Nagelformung"
        ],
        [
            "11",
            "",
            "Pflege In Der Glasfaserklinik"
        ],
        [
            "8",
            "",
            "Pflege Maniküre"
        ],
        [
            "7",
            "",
            "Pflege Von Fersenrissen"
        ],
        [
            "11",
            "",
            "Philash-Lift"
        ],
        [
            "11",
            "14",
            "Physiotherapie"
        ],
        [
            "15",
            "",
            "Piercing"
        ],
        [
            "15",
            "",
            "Piercing (-Tragus)"
        ],
        [
            "15",
            "",
            "Piercing (Augenbraue)"
        ],
        [
            "15",
            "",
            "Piercing (Äußere Muschel)"
        ],
        [
            "15",
            "",
            "Piercing (Brücke)"
        ],
        [
            "15",
            "",
            "Piercing (Brustwarze)"
        ],
        [
            "15",
            "",
            "Piercing (Daith)"
        ],
        [
            "15",
            "",
            "Piercing (Eng)"
        ],
        [
            "15",
            "",
            "Piercing (Grübchen)"
        ],
        [
            "15",
            "",
            "Piercing (Helix)"
        ],
        [
            "15",
            "",
            "Piercing (Industriell)"
        ],
        [
            "15",
            "",
            "Piercing (Innere Muschel)"
        ],
        [
            "15",
            "",
            "Piercing (Knorpel)"
        ],
        [
            "15",
            "",
            "Piercing (Labret)"
        ],
        [
            "15",
            "",
            "Piercing (Lächeln)"
        ],
        [
            "15",
            "",
            "Piercing (Lippe)"
        ],
        [
            "15",
            "",
            "Piercing (Medusa)"
        ],
        [
            "15",
            "",
            "Piercing (Monroe)"
        ],
        [
            "15",
            "",
            "Piercing (Nabel)"
        ],
        [
            "15",
            "",
            "Piercing (Nase)"
        ],
        [
            "15",
            "",
            "Piercing (Obere Helix)"
        ],
        [
            "15",
            "",
            "Piercing (Oberlappen)"
        ],
        [
            "15",
            "",
            "Piercing (Orbital)"
        ],
        [
            "15",
            "",
            "Piercing (Querlappen)"
        ],
        [
            "15",
            "",
            "Piercing (Septum)"
        ],
        [
            "15",
            "",
            "Piercing (Standardlappen)"
        ],
        [
            "15",
            "",
            "Piercing (Tragus)"
        ],
        [
            "15",
            "",
            "Piercing (Tunnel)"
        ],
        [
            "15",
            "",
            "Piercing (Turm)"
        ],
        [
            "15",
            "",
            "Piercing (Zunge)"
        ],
        [
            "14",
            "",
            "Pilates"
        ],
        [
            "14",
            "",
            "Pilates (Wöchentlich)"
        ],
        [
            "11",
            "",
            "Pilzbehandlung"
        ],
        [
            "11",
            "",
            "Plasma-Augenlidstraffung"
        ],
        [
            "11",
            "",
            "Plasmaentfernung Von Falten Und Tränensäcken Unter Den Augen"
        ],
        [
            "16",
            "",
            "Polnisch (Wimlex)"
        ],
        [
            "8",
            "",
            "Professionelle Maniküre"
        ],
        [
            "7",
            "",
            "Professionelle Pediküre"
        ],
        [
            "9",
            "",
            "Prothesennagel Komplettes Set"
        ],
        [
            "13",
            "",
            "Prothetische Haaranwendung"
        ],
        [
            "13",
            "",
            "Prothetische Haaranwendung (Demo)"
        ],
        [
            "13",
            "",
            "Prothetische Haarfärbung"
        ],
        [
            "13",
            "",
            "Prothetische Haarpflege"
        ],
        [
            "13",
            "",
            "Prothetische Haarreparatur"
        ],
        [
            "9",
            "",
            "Prothetische Nagelpflege"
        ],
        [
            "9",
            "",
            "Prothetischer Einzelnagel"
        ],
        [
            "13",
            "",
            "Prothetischer Haarschnitt"
        ],
        [
            "9",
            "",
            "Prothetischer Nagel"
        ],
        [
            "9",
            "",
            "Prothetischer Nageleinsatz"
        ],
        [
            "9",
            "",
            "Prothetisches Nagelgel"
        ],
        [
            "11",
            "",
            "Prp"
        ],
        [
            "11",
            "",
            "Prp-Anwendung"
        ],
        [
            "11",
            "",
            "Prp-Hautpflege"
        ],
        [
            "11",
            "",
            "Qswich-Steuerung"
        ],
        [
            "16",
            "",
            "Quelle (Band)"
        ],
        [
            "13",
            "",
            "Quelle Haarmenge (Vom Kunden Gezüchtet)"
        ],
        [
            "10",
            "",
            "Quelle Wimpernpflege"
        ],
        [
            "11",
            "",
            "Rachiofrequenz-Gesichtsbügeln"
        ],
        [
            "11",
            "",
            "Radiofrequenz"
        ],
        [
            "13",
            "",
            "Rasieren Des Bartes"
        ],
        [
            "13",
            "",
            "Rasieren Des Bräutigams"
        ],
        [
            "8",
            "",
            "Raspel-Nagellack"
        ],
        [
            "11",
            "",
            "Regenerationstherapie (Vita C)"
        ],
        [
            "11",
            "",
            "Regionale Auffüllung"
        ],
        [
            "11",
            "",
            "Regionale Verdünnung"
        ],
        [
            "11",
            "",
            "Regionale Verdünnung (Lipone)"
        ],
        [
            "11",
            "",
            "Reparatur Von Blauen Flecken Am Augenring"
        ],
        [
            "11",
            "",
            "Reparatur Von Fettdepots Am Augenlid"
        ],
        [
            "11",
            "",
            "Reparatur Von Prellungen Und Tränensäcken Unter Den Augen"
        ],
        [
            "11",
            "",
            "Reparatur Von Tränensäcken Unter Den Augen"
        ],
        [
            "11",
            "",
            "Reparatur Von Warzen Und Muttermalen"
        ],
        [
            "11",
            "",
            "Rhinoplastik (Nasenästhetik)"
        ],
        [
            "11",
            "",
            "Rissbehandlung (Ohne Creme)"
        ],
        [
            "13",
            "",
            "Rollenform"
        ],
        [
            "6",
            "",
            "Schamhaarentfernung"
        ],
        [
            "13",
            "",
            "Schatten- Und Schimmerndes Haar"
        ],
        [
            "13",
            "",
            "Schnurrbartentfernung (Weiblich)"
        ],
        [
            "11",
            "",
            "Schröpfen"
        ],
        [
            "11",
            "",
            "Schröpfen Im Gesicht"
        ],
        [
            "11",
            "",
            "Schröpfen Verschiedener Körperzonen"
        ],
        [
            "13",
            "",
            "Schweisshaarmenge"
        ],
        [
            "10",
            "",
            "Schweißwimpern-Komplettset"
        ],
        [
            "10",
            "",
            "Seidene Wimpernpflege"
        ],
        [
            "10",
            "",
            "Seidenwimper (Einzeln)"
        ],
        [
            "10",
            "",
            "Seidenwimpern"
        ],
        [
            "10",
            "",
            "Seidenwimpern (Extra Volumen)"
        ],
        [
            "10",
            "",
            "Seidenwimpern (Mittleres Volumen)"
        ],
        [
            "10",
            "",
            "Seidenwimpern (Natürlich)"
        ],
        [
            "10",
            "",
            "Seidenwimpern (Russisches Volumen)"
        ],
        [
            "10",
            "",
            "Seidenwimpern (Volumen)"
        ],
        [
            "10",
            "",
            "Seidenwimpern 2D"
        ],
        [
            "10",
            "",
            "Seidenwimpern 4D"
        ],
        [
            "10",
            "",
            "Seidenwimpern 5D"
        ],
        [
            "8",
            "",
            "Spa-Maniküre"
        ],
        [
            "7",
            "",
            "Spa-Pediküre"
        ],
        [
            "9",
            "",
            "Spiegelpulver Einzelner Nagel"
        ],
        [
            "16",
            "",
            "Spur Der Liebe"
        ],
        [
            "11",
            "13",
            "Stärkung Der Haarwurzel"
        ],
        [
            "9",
            "",
            "Steindesign (Ein Finger)"
        ],
        [
            "16",
            "",
            "Stricken"
        ],
        [
            "8",
            "",
            "Täglicher Nagellack"
        ],
        [
            "15",
            "",
            "Tätowieren"
        ],
        [
            "15",
            "",
            " Tattoo"
        ],
        [
            "11",
            "",
            "Tattooentfernung"
        ],
        [
            "11",
            "",
            "Tca"
        ],
        [
            "11",
            "",
            "Therapeutische Hautpflege"
        ],
        [
            "11",
            "",
            "Therapie Zur Beseitigung Von Toxinen"
        ],
        [
            "11",
            "",
            "Thermo-Moosdecke"
        ],
        [
            "11",
            "",
            "Thin-Max-Schlankheitssitzung"
        ],
        [
            "8",
            "9",
            "Tipps Zur Nagelentfernung"
        ],
        [
            "14",
            "",
            "Training"
        ],
        [
            "8",
            "",
            "Trockene Kombi-Maniküre"
        ],
        [
            "7",
            "",
            "Trockene Kombi-Pediküre"
        ],
        [
            "8",
            "",
            "Trockene Maniküre"
        ],
        [
            "7",
            "",
            "Trockene Pediküre"
        ],
        [
            "13",
            "",
            "Turban-Design"
        ],
        [
            "11",
            "",
            "Vakuum-Hauttherapie"
        ],
        [
            "13",
            "",
            "Veränderung Der Haarfarbe"
        ],
        [
            "11",
            "",
            "Verdunkelung Am Ellenbogen"
        ],
        [
            "11",
            "",
            "Verdunkelung Des Knies"
        ],
        [
            "11",
            "",
            "Verdunkelung Des Körpers"
        ],
        [
            "11",
            "",
            "Verdunkelung Um Die Augen"
        ],
        [
            "11",
            "",
            "Verdunkelung Unter Den Achseln"
        ],
        [
            "11",
            "",
            "Verfärbungen Am Hinterkopf"
        ],
        [
            "13",
            "",
            "Verlobungshaar"
        ],
        [
            "11",
            "",
            "Verwicklung Frei"
        ],
        [
            "11",
            "",
            "Verwicklungsfreie Behandlung "
        ],
        [
            "13",
            "",
            "Vigo (Föhnen)"
        ],
        [
            "11",
            "",
            "Vitamin C (Mit Nadel)"
        ],
        [
            "6",
            "",
            "Vollständige Haarentfernung (Oral)"
        ],
        [
            "9",
            "",
            "Vollständige Lackierung"
        ],
        [
            "11",
            "",
            "Vordere Faltenreparatur"
        ],
        [
            "6",
            "",
            "Vorgespräch Zur Haarentfernung"
        ],
        [
            "6",
            "",
            "Wachsen (Regional)"
        ],
        [
            "6",
            "",
            "Wachsen Der Gesamten Taille"
        ],
        [
            "6",
            "",
            "Wachsen Der Halben Taille"
        ],
        [
            "6",
            "",
            "Wachsen Der Oberlippe"
        ],
        [
            "6",
            "",
            "Wachsen Des Ganzen Arms"
        ],
        [
            "6",
            "",
            "Wachsen Des Ganzen Beins"
        ],
        [
            "6",
            "",
            "Wachsen Des Halben Arms"
        ],
        [
            "6",
            "",
            "Wachsen Unter Den Achseln"
        ],
        [
            "6",
            "",
            "Wachsen Von Augenbrauen Und Schnurrbart"
        ],
        [
            "6",
            "",
            "Wangenwachs"
        ],
        [
            "6",
            "",
            "Wasserwelle"
        ],
        [
            "6",
            "",
            "Waxing (Ganzkörper)"
        ],
        [
            "6",
            "",
            "Waxing (Rücken)"
        ],
        [
            "6",
            "",
            "Waxing Bauch"
        ],
        [
            "13",
            "",
            "Wellig Föhnen"
        ],
        [
            "10",
            "",
            "Wimpern Färben"
        ],
        [
            "10",
            "",
            "Wimpern Kleben"
        ],
        [
            "10",
            "",
            "Wimpern- Und Augenbrauenserum"
        ],
        [
            "10",
            "",
            "Wimpern-Lifting"
        ],
        [
            "10",
            "",
            "Wimperndauerwelle"
        ],
        [
            "10",
            "",
            "Wimpernentfernung"
        ],
        [
            "10",
            "",
            "Wimpernlaminierung"
        ],
        [
            "10",
            "",
            "Wimpernlifting"
        ],
        [
            "10",
            "",
            "Wimpernpflege"
        ],
        [
            "10",
            "",
            "Wimpernpflege Aus Kaschmir"
        ],
        [
            "10",
            "",
            "Wimpernverlängerung Entfernen"
        ],
        [
            "10",
            "",
            "Wimpernvitamin"
        ],
        [
            "10",
            "",
            "Wöchentliche Wimpern"
        ],
        [
            "9",
            "",
            "Wöchentlicher Nagellack"
        ],
        [
            "14",
            "",
            "Yoga"
        ],
        [
            "10",
            "",
            "Yumi Lashes "
        ],
        [
            "10",
            "",
            "Yumilashes Wimpern"
        ],
        [
            "7",
            "",
            "Zehennagelformung"
        ],
        [
            "14",
            "",
            "Zumba"
        ],
        [
            "14",
            "",
            "Zumba (Einzelstunde)"
        ],
        [
            "12",
            "",
            "Zwischen Den Augenbrauen (Männlich)"
        ]
    ];
    $col2Sayac = 1;
    $col1Sayac = 1;
    foreach ($datas as $data){

        if($data[1] != ""){
            $serviceSubCategory= new \App\Models\ServiceSubCategory();

            $serviceSubCategory->category_id = $data[0];
            $serviceSubCategory->slug = \Illuminate\Support\Str::slug($data[2]);
            $serviceSubCategory->name =$data[2];
            $serviceSubCategory->save();

            $serviceSubCategory= new \App\Models\ServiceSubCategory();
            $serviceSubCategory->category_id = $data[1];
            $serviceSubCategory->slug = \Illuminate\Support\Str::slug($data[2]);
            $serviceSubCategory->name =$data[2];
            $serviceSubCategory->save();
            $col2Sayac++;
        }
        else {
            $serviceSubCategory= new \App\Models\ServiceSubCategory();
            $serviceSubCategory->category_id = $data[0];
            $serviceSubCategory->slug = \Illuminate\Support\Str::slug($data[2]);
            $serviceSubCategory->name =$data[2];
            $serviceSubCategory->save();

        }
        $col1Sayac++;
    }
    return $col1Sayac." tek veri eklendi". $col2Sayac. " çift veri eklendi". $col1Sayac+ $col2Sayac ." toplam veri eklendi";*/
    /*$s=1;
    $total=[];
    for($i = 17; $i <= 32; $i++){
        $serviceCategories = \App\Models\ServiceSubCategory::where('category_id', $s)->count();
        $serviceCategories2 = \App\Models\ServiceSubCategory::where('category_id', $i)->count();
        if ($serviceCategories == $serviceCategories2){
             $total[] = $s." category ". $i." kategorisine eşit";
        }
        else{
            $total[] = $s." category ". $i." kategorisine eşit değil";
        }
        $s++;
    }*/




});
Route::controller(\App\Http\Controllers\HomeController::class)->group(function (){
    Route::get('/', 'index')->name('welcome');
    Route::post('/bilgi-al', 'getInfo')->name('getInfo');
    Route::get('/kategori-detay/{slug}', 'categoryDetail')->name('categoryDetail');
    Route::get('/paketler', 'packages')->name('packages');
    Route::get('/destek', 'faq')->name('faq');
    Route::get('/iletisim', 'contact')->name('contact');
    Route::post('/iletisim', 'sendMessage')->name('contact.sendMessage');
    Route::get('/bloglar', 'blogs')->name('blog.index');
    Route::get('/blog/detay/{slug}', 'blogDetail')->name('blog.detail');
    Route::get('/ozellikler', 'proparties')->name('propartie.index');
    Route::get('ozellikler/detay/{slug}', 'propartie')->name('propartie.detail');
});
Route::group(['prefix' => 'business', 'as' => 'business.'], function () {
    Route::get('/login', [\App\Http\Controllers\Business\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Business\Auth\LoginController::class, 'login']);
    Route::get('/register', [\App\Http\Controllers\Business\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Business\Auth\RegisterController::class, 'register']);
    Route::get('/verify-phone', [\App\Http\Controllers\Business\Auth\VerifyController::class, 'index'])->name('verify');
    Route::get('/logout', [\App\Http\Controllers\Business\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/sifremi-unuttum', [\App\Http\Controllers\Business\Auth\VerifyController::class, 'showForgotView'])->name('showForgotView');
    Route::post('/sifremi-unuttum', [\App\Http\Controllers\Business\Auth\VerifyController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/verify/mobil', [\App\Http\Controllers\Business\Auth\VerifyController::class, 'verify'])->name('verifyPhone');
    Route::middleware(['auth:business', 'active', 'setup'])->group(function () {
        Route::controller(\App\Http\Controllers\SetupController::class)->prefix('isletme-kurulum')->as('setup.')->group(function (){
            Route::get('/adim-1', 'step1')->name('step1');
            Route::post('/adim-1', 'step1Form')->name('step1Form');
            Route::get('/adim-2', 'step2')->name('step2');
            Route::post('/adim-2', 'step2Form')->name('step2Form');
            Route::get('/adim-3', 'step3')->name('step3');
            Route::post('/adim-3', 'step3Form')->name('step3Form');
            Route::get('/adim-4', 'step4')->name('step4');
            Route::post('/adim-4', 'step4Form')->name('step4Form');
            Route::get('/adim-5', 'step5')->name('step5');
        });
        Route::controller(\App\Http\Controllers\PaymentController::class)->prefix('paket-odeme')->as('payment.')->group(function (){
            Route::get('/{slug}/odeme-formu', 'paymentForm')->name('form');
            Route::post('/odeme-yap', 'pay')->name('pay');
            Route::post('/odeme-yap-paypal', 'paypalPayment')->name('payPal');
            Route::get('/callback', 'paypalCallBack')->name('paypalCallBack');
            Route::get('/stripe', 'stripe')->name('stripe');
            Route::post('/stripe', 'stripeForm')->name('stripePost');

        });
        Route::get('/home', [\App\Http\Controllers\Business\HomeController::class, 'index'])->name('home');
        Route::post('/update-password', [\App\Http\Controllers\Business\HomeController::class,'resetPassword'])->name('resetPassword');
        Route::resource('gallery', \App\Http\Controllers\Business\BusinessGalleryController::class)->names('gallery');
        Route::resource('productSale', \App\Http\Controllers\Business\ProductSalesController::class);
        Route::post('product-price', [\App\Http\Controllers\Business\ProductSalesController::class, 'productPrice'])->name('product.price');
        Route::resource('packageSale', \App\Http\Controllers\Business\PackageSaleController::class);
        Route::resource('support', \App\Http\Controllers\SupportController::class);
        Route::resource('customer', \App\Http\Controllers\Business\CustomerController::class);
        Route::resource('appointment', \App\Http\Controllers\Business\AppointmentController::class);
        Route::get('appointment/reject/{id}', [\App\Http\Controllers\Business\AppointmentController::class, 'reject'])->name('appointment.reject');
        Route::get('appointment/accept/{id}', [\App\Http\Controllers\Business\AppointmentController::class, 'accept'])->name('appointment.accept');
        Route::resource('businessNote', \App\Http\Controllers\Business\BusinessNoteController::class);
        Route::post('personelService', [\App\Http\Controllers\Business\AppointmentController::class, 'personel'])->name('personelService');
        Route::post('businessCustomer/{id}', [\App\Http\Controllers\Business\CustomerController::class, 'delete'])->name('customer.delete');
        Route::post('packagePayments', [\App\Http\Controllers\Business\PackageSaleController::class, 'payments'])->name('package.payments');
        Route::post('packagePaymentsAdd', [\App\Http\Controllers\Business\PackageSaleController::class, 'paymentsAdd'])->name('package.payments.add');
        Route::post('package-usages', [\App\Http\Controllers\Business\PackageSaleController::class, 'usages'])->name('package.usages');
        Route::post('package-usages-add', [\App\Http\Controllers\Business\PackageSaleController::class, 'usagesAdd'])->name('package.usages.add');
        Route::resource('product', \App\Http\Controllers\Business\ProductController::class);
        Route::post('city', [\App\Http\Controllers\Business\HomeController::class, 'district'])->name('city');
        Route::post('subCategory', [\App\Http\Controllers\Business\HomeController::class, 'subCategory'])->name('subCategory');
        Route::resource('personel', \App\Http\Controllers\Business\PersonelController::class);
        Route::post('send/notification', [\App\Http\Controllers\Business\PersonelController::class, 'sendNotification'])->name('sendNotification');
        Route::post('/notification/get', [\App\Http\Controllers\Business\PersonelController::class, 'get'])->name('notification.get');
        Route::resource('businessNotification', \App\Http\Controllers\BusinessNotificationController::class);
        Route::post('gender', [\App\Http\Controllers\Business\PersonelController::class, 'gender'])->name('gender');
        Route::post('serviceGender', [\App\Http\Controllers\Business\BusinessServiceController::class, 'gender'])->name('service.gender');
        Route::post('category', [\App\Http\Controllers\Business\BusinessServiceController::class, 'category'])->name('service.category');
        Route::resource('businessService', \App\Http\Controllers\Business\BusinessServiceController::class);
        Route::post('subCategory', [\App\Http\Controllers\Business\HomeController::class, 'subCategory'])->name('subCategory');
        Route::get('google/export/calendr', [\App\Http\Controllers\Api\CalenderController::class, 'exportGoogle'])->name('exportGoogleCalender');
        Route::post('personel/send/sms', [\App\Http\Controllers\Business\PersonelController::class, 'sendSms'])->name('personel.sendSms');
        Route::post('personel/send/mail', [\App\Http\Controllers\Business\PersonelController::class, 'sendMail'])->name('personel.sendMail');
        Route::resource('businessComment', \App\Http\Controllers\BusinessCommentController::class);
        Route::get('customer/export/excel', [\App\Http\Controllers\Business\CustomerController::class, 'export'])->name('customer.export.excel');
        Route::controller(\App\Http\Controllers\Business\BusinessController::class)->prefix('profile')->as('profile.')->group(function () {
            Route::get('/', 'show')->name('show');
            Route::post('/update-general-setting', 'update')->name('updateGeneralSetting');
            Route::post('/update-owner-setting', 'updateOwner')->name('updateOwnerSetting');
            Route::post('/update-work-time', 'updateWorkTime')->name('updateWorkTime');
        });
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
    Route::middleware('cookieAccess')->group(function(){});
    Route::middleware('auth:admin')->group(function () {
        Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::resource('featuredCategorie', \App\Http\Controllers\Admin\FeaturedCategorieController::class);
        Route::resource('recommendedLink', \App\Http\Controllers\RecommendedLinkController::class);
        Route::resource('page', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('support', \App\Http\Controllers\Admin\SupportController::class);

        Route::resource('mainPageSection', \App\Http\Controllers\MainPageSectionController::class);
        Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('customer', \App\Http\Controllers\Admin\CustomerController::class);
        Route::resource('faq', \App\Http\Controllers\Admin\FaqController::class);
        Route::resource('sponsor', \App\Http\Controllers\Admin\SponsorController::class);
        Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);
        Route::resource('blogComment', \App\Http\Controllers\BlogCommentController::class);
        Route::resource('activity', \App\Http\Controllers\Admin\ActivityController::class);
        Route::resource('comment', \App\Http\Controllers\Admin\CommentController::class);
        Route::resource('faq', \App\Http\Controllers\Admin\FaqController::class);
        Route::resource('businessFaq', \App\Http\Controllers\Admin\BusinessFaqController::class);
        Route::resource('businessBlog', \App\Http\Controllers\Admin\BusinessBlogController::class);
        Route::resource('businessCategory', \App\Http\Controllers\BusinessCategoryController::class);
        Route::resource('socialMedia', \App\Http\Controllers\Admin\SocialMediaController::class);
        Route::resource('ads', \App\Http\Controllers\Admin\AdsController::class);
        Route::resource('page', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('businessInfo', \App\Http\Controllers\Admin\BusinessInfoController::class);
        Route::resource('swiper', \App\Http\Controllers\Admin\SwiperController::class);
        Route::resource('activitySponsor', \App\Http\Controllers\Admin\ActivitySponsorController::class);
        Route::resource('business', \App\Http\Controllers\Admin\BusinessController::class);
        Route::post('/business/add-service', [\App\Http\Controllers\Admin\BusinessController::class, 'addService'])->name('business.addService');
        Route::resource('propartie', \App\Http\Controllers\Admin\PropartieController::class);
        Route::resource('bussinessPackagePropartieList', \App\Http\Controllers\Admin\BussinessPackagePropartieListController::class);
        Route::resource('businessPackage', \App\Http\Controllers\Admin\BussinessPackageController::class);
        Route::resource('businnessType', \App\Http\Controllers\Admin\BusinnessTypeController::class);
        Route::resource('serviceCategory', \App\Http\Controllers\Admin\ServiceCategoryController::class);
        Route::resource('serviceSubCategory', \App\Http\Controllers\Admin\ServiceSubCategoryController::class);
        /*single form post start*/
        Route::post('activity/store/business', [\App\Http\Controllers\Admin\ActivityController::class, 'storeBusiness'])->name('activity.storeBusiness');
        /*single form post end*/
        Route::controller(\App\Http\Controllers\Admin\ForBusinessController::class)->prefix('forBusiness')->as('forBusiness.')->group(function (){
            Route::get('index', 'index')->name('index');
            Route::post('section-update', 'section_update')->name('section_update');
            Route::post('swiper-update', 'swiperUpdate')->name('swiper_update');
        });
        /*Ajax Post Url Start*/
        Route::post('info/update-status', [\App\Http\Controllers\Admin\BusinessInfoController::class, 'updateStatus'])->name('businessInfo.updateStatus');
        Route::post('page/update-status', [\App\Http\Controllers\Admin\PageController::class, 'updateStatus'])->name('page.updateStatus');
        Route::post('activity/cancelled', [\App\Http\Controllers\Admin\ActivityController::class, 'activityCancelled'])->name('activity.cancelledBusiness');
        Route::post('comment/update-status', [\App\Http\Controllers\Admin\CommentController::class, 'updateStatus'])->name('comment.updateStatus');
        Route::post('activity/update-status', [\App\Http\Controllers\Admin\ActivityController::class, 'updateStatus'])->name('activity.updateStatus');
        Route::post('blog/update-status', [\App\Http\Controllers\Admin\BlogController::class, 'updateStatus'])->name('blog.updateStatus');
        Route::post('business/blog/update-status', [\App\Http\Controllers\Admin\BusinessBlogController::class, 'updateStatus'])->name('businessBlog.updateStatus');

        Route::post('city', [\App\Http\Controllers\Admin\HomeController::class, 'district'])->name('city');
        Route::post('subCategory', [\App\Http\Controllers\Admin\HomeController::class, 'subCategory'])->name('subCategory');

        /*Ajax Post Url end*/
        Route::get('/update-category', [\App\Http\Controllers\Admin\SettingController::class, 'uCategory']);
        Route::get('/business-settings', [\App\Http\Controllers\Admin\SettingController::class, 'businessEdit'])->name('business.settings');
        Route::get('/user-settings', [\App\Http\Controllers\Admin\SettingController::class, 'userEdit'])->name('user.settings');

        Route::get('/business-main-page', [\App\Http\Controllers\Admin\MaingPageController::class, 'businessEdit'])->name('business.mainPage');

        Route::get('/anasayfa/guncelle', [\App\Http\Controllers\Admin\MaingPageController::class, 'userEdit'])->name('user.mainPage');

        Route::post('/main-page-update', [\App\Http\Controllers\Admin\MaingPageController::class, 'section_update'])->name('user.mainPage.update');

        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
});