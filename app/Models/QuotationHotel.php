<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\HotelRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuotationHotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id','hotel_room_id','rate',
        'nights','rooms','total'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(HotelRoom::class, 'hotel_room_id');
    }
}
