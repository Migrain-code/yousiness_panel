<?php

namespace App\Services;

class GoogleCalender
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function createEvent($calendarId, $eventData)
    {
        $url = "https://www.googleapis.com/calendar/v3/calendars/{$calendarId}/events?key={$this->apiKey}";

        $headers = ['Content-Type: application/json'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($eventData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if ($response === false) {
            return false;
        } else {
            return json_decode($response, true);
        }
    }
}
