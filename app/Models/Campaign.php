<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    const STATUS_LIST=[
        0 => [
            'html' => '<span class="badge light badge-warning fw-bolder px-2 py-2">Onay Bekliyor</span>',
            'text' => 'Onay Bekliyor'
        ],
        1 => [
            'html' => '<span class="badge light badge-success fw-bolder px-2 py-2">Yayınlandı</span>',
            'text' => 'Yayınlandı'
        ],
        2 => [
            'html' => '<span class="badge light badge-danger fw-bolder px-2 py-2">Randevu Zamanı</span>',
            'text' => 'Reddedildi'
        ],

    ];

    public function status($type)
    {
        return self::STATUS_LIST[$this->status][$type] ?? null;
    }

    public function services()
    {
        return $this->hasMany(CampaignServices::class, 'campaign_id', 'id');
    }

    public function customers()
    {
        return $this->hasMany(CampaignCustomer::class, 'campaign_id', 'id');
    }

    public function business()
    {
        return $this->hasOne(Business::class, 'id', 'business_id');
    }
}
