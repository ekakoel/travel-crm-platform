<?php

namespace App\Models;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelRoom extends Model
{
    use HasFactory;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
