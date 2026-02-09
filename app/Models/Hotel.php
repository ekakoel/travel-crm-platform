<?php

namespace App\Models;

use App\Models\HotelRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class, 'hotel_id');
    }

}
