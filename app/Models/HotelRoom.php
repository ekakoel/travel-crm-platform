<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable = ['hotel_id', 'room_type', 'max_pax'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }
}

