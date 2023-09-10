<?php

namespace App\Services;

class GoogleCalender
{
    public static function setCalendar($appointments)
    {

        $client = new \Google_Client();
        $client->setAuthConfig([
            'web' => [
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
            ],
        ]);
        $client->setScopes([\Google_Service_Calendar::CALENDAR_EVENTS]);

        $service = new \Google_Service_Calendar($client);

        $event = new \Google_Service_Calendar_Event([
            'summary' => 'Etkinlik Başlığı',
            'description' => 'Etkinlik Açıklaması',
            'start' => [
                'dateTime' => '2023-09-15T10:00:00',
                'timeZone' => 'Europe/Istanbul',
            ],
            'end' => [
                'dateTime' => '2023-09-15T12:00:00',
                'timeZone' => 'Europe/Istanbul',
            ],
        ]);

        $calendarId = env('GOOGLE_CALENDAR_ID'); // Takvim ID'si, projenizde tanımladığınız bir değişken olarak kullanabilirsiniz.

        $event = $service->events->insert($calendarId, $event);

        return true;
    }


}