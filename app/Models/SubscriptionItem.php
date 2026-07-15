<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'stripe_id',
        'stripe_product',
        'stripe_price',
        'meter_id',
        'quantity',
        'meter_event_name',
    ];

    public function subscription()
    {
        return $this->belongsTo(
            Subscription::class,
            'subscription_id'
        );
    }
}