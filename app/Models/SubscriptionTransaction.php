<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTransaction extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',

        'stripe_invoice_id',

        'stripe_payment_intent',

        'stripe_subscription_id',

        'amount',

        'vat',

        'total',

        'currency',

        'status',

        'payment_method',

        'paid_at',

        'payload',

    ];

    protected $casts = [

        'payload' => 'array',

        'paid_at' => 'datetime',

        'amount' => 'decimal:2',

        'vat' => 'decimal:2',

        'total' => 'decimal:2',

    ];

    /**
     * Transaction belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function owner()
{
    return $this->belongsTo(
        User::class,
        'user_id'
    );
}



public function items()
{
    return $this->hasMany(
        SubscriptionItem::class
    );
}
}