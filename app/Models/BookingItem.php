<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    protected $fillable = ['qty'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function itemable()
    {
        return $this->morphTo();
    }
}

