<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['booking_id', 'voucher_number', 'file_path'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

