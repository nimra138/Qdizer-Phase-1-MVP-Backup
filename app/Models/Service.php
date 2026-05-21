<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'service_name',
        'unit_price',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}