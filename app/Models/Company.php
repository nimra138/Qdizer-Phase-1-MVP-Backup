<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $fillable = [
        'user_id',
        'company_name',
        'business_category',
        'logo',
        'phone_number',
        'email',
        'address',
        'vat_registered',
        'vat_number',
        'country',
        'currency',
        'vat_rate',
        'default_terms'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
