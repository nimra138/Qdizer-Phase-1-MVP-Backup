<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class QuotationItem extends Model
{
    protected $fillable = [
        'quotation_id',
        'service_id',
        'quantity',
        'unit_price',
        'total'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
