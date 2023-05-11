<?php

namespace App\Providers;

use App\Services\NetgsmSMS;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class NetgsmServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(NetgsmSMS::class, function ($app) {
            $client = new Client([
                'base_uri' => config('services.netgsm.url'),
                'verify'=>false,
            ]);
            return new NetgsmSMS($client);
        });
    }
}