<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['quotation_id', 'booking_code', 'status'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function items()
    {
        return $this->hasMany(BookingItem::class);
    }

    public function voucher()
    {
        return $this->hasOne(Voucher::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}

