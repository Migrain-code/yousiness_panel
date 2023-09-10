<?php

namespace App\Services;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;

class GoogleCalender
{
    protected $client;
    protected $service;

    public function __construct()
    {
        // Google Client oluşturma ve kimlik doğrulama ayarları
        $this->client = new Client([
            'client_id' => env("GOOGLE_CLIENT_ID"),
            'client_secret' => env("GOOGLE_CLIENT_SECRET"),
            'redirect_uri' => env("GOOGLE_REDIRECT_URI"),
        ]);
        $this->client->setAuthConfig([
            "web" => [
                "client_id" => "449337264437-njtrb3c4t391i80dp0c72pm0sh88970l.apps.googleusercontent.com",
                "project_id" => "calendertest-398614",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_secret" => "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",
                "javascript_origins" => [
                    "http://127.0.0.1:8001",
                    "https://panel.yousiness.com"
                ]
            ]
        ]);
        $this->client->setScopes([Calendar::CALENDAR_EVENTS]);

        // Google Service oluşturma
        $this->service = new Calendar($this->client);
    }

    public function createEvent($summary, $description, $startDateTime, $endDateTime)
    {
        // Etkinlik nesnesi oluşturma
        $event = new Event([
            'summary' => $summary,
            'description' => $description,
            'start' => [
                'dateTime' => $startDateTime,
                'timeZone' => 'Europe/Istanbul',
            ],
            'end' => [
                'dateTime' => $endDateTime,
                'timeZone' => 'Europe/Istanbul',
            ],
        ]);

        // Takvim ID'sini ayarlama (örneğin, varsayılan takvim)
        $calendarId = 'primary';

        // Etkinliği eklemek
        $event = $this->service->events->insert($calendarId, $event);

        // Etkinlik ekledikten sonra başka bir işlem yapabilirsiniz
        return $event;
    }
}
