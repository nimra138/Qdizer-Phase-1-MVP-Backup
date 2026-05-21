<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Quotation extends Model
{
    protected $fillable = [
        'user_id',
        'client_id',
        'quotation_number',
        'date',
        'subtotal',
        'vat',
        'total',
        'notes',
        'pdf_path'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(QuotationItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}