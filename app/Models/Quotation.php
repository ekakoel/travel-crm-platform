<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'code', 'pax', 'total_price',
        'currency', 'valid_until', 'status'
    ];

    protected $casts = [
        'valid_until' => 'date'
    ];

    public function customerable()
    {
        return $this->morphTo();
    }

    public function items()
    {
        return $this->hasMany(QuotationItem::class);
    }

    public function logs()
    {
        return $this->hasMany(QuotationLog::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}

